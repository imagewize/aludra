# Building pages with a coding agent

Aludra registers five abilities with the WordPress **Abilities API** (WordPress 6.9+). They let a
coding agent such as Claude Code, Codex or Mistral Vibe build a page from Aludra's patterns over
the REST API.

Why abilities, and not `POST /wp/v2/pages` with block markup? An agent that writes Aludra block
HTML from memory produces markup that looks right on the front end but fails block validation as
soon as someone opens the page in the editor. With these abilities the agent picks patterns and
supplies only the copy. The server assembles the markup from the registered patterns, which have
already passed the pattern validator.

| Ability | Method | What it does |
| --- | --- | --- |
| `aludra/list-patterns` | GET | Pattern slugs, titles, kinds (`page`, `section`, `carousel`, `header`, `footer`, `mega-menu`), categories, descriptions. Optional `kind` filter. |
| `aludra/get-pattern` | GET | One pattern: its markup, the exact `texts` and `links` you can replace, its `styles`, and whether it takes a section colour `scheme`. |
| `aludra/list-blocks` | GET | Aludra block types: attributes, parent/ancestor rules, style variations. |
| `aludra/compose-page` | POST | Creates a page, or replaces an existing page's content when given `page_id`, from an ordered list of patterns. |
| `aludra/check-page` | GET | Structural check of a page's blocks. |

## Authentication

Create an **application password** (Users → Profile → Application Passwords) for a user who can
edit pages, and use HTTP basic auth. The abilities run with that user's capabilities:

- the read abilities need `edit_posts`
- `compose-page` needs `edit_pages` for a new page, or `edit_post` on the page it updates; `publish` and `private` need `publish_pages`
- `check-page` needs `edit_post` on the page

```bash
export WP=https://example.com/wp-json/wp-abilities/v1/abilities
export AUTH='user:abcd efgh ijkl mnop qrst uvwx'
```

## Workflow

**1. Pick sections.**

```bash
curl -su "$AUTH" "$WP/aludra/list-patterns/run?input%5Bkind%5D=section"
```

**2. Read each pattern's replaceable text.** `texts` lists every run of text, and `links` every
link target, exactly as the pattern has them. Use these strings verbatim as `find` values.

```bash
curl -su "$AUTH" "$WP/aludra/get-pattern/run?input%5Bslug%5D=aludra/section-hero-split"
```

**3. Compose.** Pages are created as drafts unless you set `status`.

```bash
curl -su "$AUTH" -X POST "$WP/aludra/compose-page/run" \
  -H 'Content-Type: application/json' -d '{
  "input": {
    "title": "Natural wines",
    "sections": [
      {
        "pattern": "aludra/section-hero-split",
        "style": "default",
        "texts": [
          { "find": "Fast Sites.", "replace": "Good Wine." },
          { "find": "Real Results.", "replace": "Honest Prices." }
        ],
        "links": [ { "find": "#", "replace": "https://example.com/shop" } ]
      },
      { "pattern": "aludra/section-faq", "scheme": "tint" }
    ]
  }
}'
```

The response gives `page_id`, `edit_url`, `link`, and a `warnings` list naming any `find` that
matched nothing.

**4. Check.**

```bash
curl -su "$AUTH" "$WP/aludra/check-page/run?input%5Bpage_id%5D=123"
```

## Rules the server enforces

- **Text is replaced per whole run.** A `find` must equal one entry of `texts`; a substring does
  not match. A heading such as `Fast Sites. <em>Real Results.</em>` is two runs. Every
  occurrence of a run in the section is replaced, in the markup and in block attributes alike
  (an FAQ question, a stat caption), so the two always agree.
- **Replacements are plain text and URLs.** Text goes through `sanitize_text_field()` and is
  escaped; HTML is stripped. Links go through `esc_url_raw()`. Class names, layout and other
  structural attributes are never touched.
- **`style`** must be one of the pattern's `styles`, or `default` to clear the style variation.
  **`scheme`** (`tint`, `invert`, `brand`, or `page` to clear it) works only where `get-pattern`
  reports `scheme: true`.
- **Only `page`, `section` and `carousel` patterns** go into a page. Header, footer and mega-menu
  patterns belong in template parts.
- A pattern that uses a block the site has not registered (disabled under Settings → Aludra, or
  WooCommerce inactive) is refused.

## Limits

`check-page` cannot confirm that each block's markup matches its `save()` output. Only the block
editor can, so a clean result is necessary but not sufficient. Pages built only with
`compose-page` stay valid because pattern markup is round-tripped unchanged apart from the
replaced text, links and classes. Markup you write by hand, outside `compose-page`, is not covered.

## MCP

The [MCP Adapter](https://github.com/WordPress/mcp-adapter) plugin exposes registered abilities
as MCP tools. With it installed, the same five abilities are available to MCP clients without
going through REST.

## Turning it off

```php
add_filter( 'aludra_abilities_enabled', '__return_false' );
```
