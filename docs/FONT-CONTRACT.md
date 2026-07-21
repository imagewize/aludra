# Aludra Font Contract

Parallel to [`PALETTE-CONTRACT.md`](PALETTE-CONTRACT.md): themes that host Aludra
blocks may define additional font family slugs beyond the required `primary` body
font. Aludra block stylesheets reference these via
`var(--wp--preset--font-family--<slug>)`. A missing slug does not error — it
silently falls back to a system font stack, so a theme that skips an optional slug
just doesn't get that typographic voice, nothing breaks.

## Required slug

| Slug | Role | Aviendha value |
|---|---|---|
| `primary` | Body text, and the default for everything else absent a more specific slug | `-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif` |

Every Aludra-hosting theme must define `primary` — this has always been true (it's
`theme.json`'s baseline font family) and isn't new with this contract.

## Optional slugs

| Slug | Role | Used by | Fallback chain | Aviendha value |
|---|---|---|---|---|
| `display` | Headings, large numbers/stats | `styles.elements.heading` (theme-side), any block wanting a display treatment | `display → theme's heading default → system sans` | `'Bricolage Grotesque', 'Segoe UI', system-ui, sans-serif` |
| `mono` | Eyebrows/labels, metrics, prices' unit text | hero-split eyebrow | `mono → system mono stack` (hardcoded in block SCSS, not chained through another preset slug — there's no other mono-ish required slug to fall back to) | `'JetBrains Mono', ui-monospace, SFMono-Regular, Menlo, monospace` |

When referencing `mono` in block SCSS, always include a literal system-mono
fallback so themes without the slug still get *a* monospace font rather than
falling through to the theme's proportional `primary`:

```scss
font-family: var(--wp--preset--font-family--mono, "JetBrains Mono", ui-monospace, SFMono-Regular, Menlo, monospace);
```

`display` is applied at the theme level (`styles.elements.heading`), not
per-block, so blocks generally don't need to reference `display` directly —
headings inherit it automatically. Reference it directly only for non-heading
display treatments (e.g. a large stat number in a future metric-rail block).

## Self-hosting variable fonts

Both of Aviendha's optional-slug fonts (Bricolage Grotesque, JetBrains Mono) are
variable fonts on Google Fonts — requesting several discrete weights
(`wght@400;600;800`) still resolves to **one file per family** covering the full
weight range, not one file per weight. Confirmed via `fontTools`
(`font['fvar'].axes` shows a single `wght` axis spanning the requested range).
Prefer a single `fontFace` entry with a weight *range* over one entry per
static weight:

```json
{
  "fontFamily": "Bricolage Grotesque",
  "fontWeight": "200 800",
  "fontStyle": "normal",
  "src": [ "file:./assets/fonts/bricolage-grotesque-variable.woff2" ]
}
```

This halves (or more) the number of font files and requests versus assuming
static per-weight instances. Both fonts are SIL Open Font License 1.1
(GPL-compatible) — see the hosting theme's `readme.txt` Third-Party Libraries
section for the attribution this requires.

## Theme status

| Theme | `display` | `mono` | Notes |
|---|---|---|---|
| Aviendha | ✅ 1.3.0+ | ✅ 1.3.0+ | Both self-hosted as variable-font files under `assets/fonts/`. |
| Elayne | ❌ | ❌ | Defines `primary` (Mona Sans) and `open-sans` only. Not a gap unless/until Elayne adopts a display/mono treatment — hero-split's `mono` reference falls back cleanly to a system mono stack on Elayne today. |

Rules for new/edited block styles:

1. Never assume `display` or `mono` exist — always fall back to a system stack
   for `mono`, and let `display` apply itself via the heading element rather
   than hardcoding it into block SCSS.
2. Adding a new optional slug: add it to this contract's table, and note which
   maintained themes (Aviendha, Elayne) define it or intentionally don't.

## History

- **2026-07:** Contract introduced alongside Aviendha 1.3.0 (added `display` and
  `mono`) and Aludra 2.19.0 (hero-split eyebrow references `mono`). Background:
  `imagewize.com` repo, `docs/aviendha/REDESIGN-THEME.md` and
  `docs/aludra/AVIENDHA-REDESIGN-BLOCKS.md`.
