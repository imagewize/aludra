# Code review rules — Aludra

Aludra is a WordPress block plugin: blocks under `blocks/`, patterns under
`patterns/`, and a settings screen that enables and disables blocks. It ships as
a zip and through Packagist from git, so the committed `blocks/*/build/` output is
what users install. These rules are read by the `code-review` skill
(`.agents/skills/code-review/SKILL.md`) and checked before its generic checklists.
They stand on their own; `CLAUDE.md` has more background but is not required.

## Facts

- Build output is committed (`blocks/*/build/`), and `aludra.php` registers each
  block from `blocks/<block>/build/block.json`.
- `npm run build` rewrites `build/block.json` with different formatting, so a
  plain `diff` against `src/block.json` shows every line. Compare with `jq -S`.
  The formatting difference itself is expected and is never a finding.
- A build rewrites only the files whose sources changed, so the files in one
  `build/` directory normally carry different commit dates.

## Audit targets

- `blocks/` — `/code-review carousel` audits `blocks/carousel/`. Block names are
  ordinary words (`about`, `slide`, `trust-bar`, `load-waterfall`); they are still
  block names.

## Skip

- `blocks/carousel/slick/**` — vendored Slick, unmodified by policy apart from one
  documented line of `slick-theme.css`. Any other diff here is a finding.
- `sentinel-*.log.json` — pattern validator run logs. They are gitignored, so one
  appearing in a diff is a finding.

## Review

- `blocks/carousel/js/view.js` — Slick front-end initialisation, deliberately
  outside `src/` (see Asset loading).
- `tests/php/**`.

## Commands

```bash
composer run lint                                         # parallel-lint, whole repo
vendor/bin/phpcs --standard=phpcs.xml.dist <changed php files>
composer run test                                         # PHPUnit
```

`npm run validate` checks pattern markup against a local Trellis site and cannot
run inside a review. For any change to `patterns/`, ask whether it was run; a
front-end screenshot cannot show a block-validation mismatch.

## Disable core rules

- None. Known exception: the `Categories` and `Block Types` headers of
  `patterns/mega-menu-*.php` are ignored. Their loader in `aludra.php` registers
  every one with category `menus` and block type `core/template-part/menu`, so
  `Categories: aludra` in those files is not a finding.

## Rules

### Block versioning

- A block whose markup, styles or attributes changed has its `version` bumped in
  `blocks/<block>/src/block.json` — patch for a style or rendering fix, minor for
  a new attribute or style variation.
  Why: WordPress uses that `version` for the block's stylesheet URL, so a style
  fix without a bump keeps serving the old CSS from browser and CDN caches.
- Metadata-only changes — `category`, `keywords`, `title`, `description`,
  `icon` — need no bump. The category split in `0f728d7` changed no block
  versions, and that is correct.
- The bump appears in **both** `src/block.json` and `build/block.json`.
  Why: `register_block_type()` reads the build copy; a bump only in `src/` never
  reaches WordPress.
- A change under `blocks/<block>/src/` that affects output ships with regenerated
  `blocks/<block>/build/` output.
  Why: `build/` is what users install; `src/` moving without it means the release
  does not contain the change.

### Plugin versioning

If the plugin version moved, all of these agree — or none changed:

- `aludra.php` — the `Version:` header **and** the `ALUDRA_VERSION` constant.
- `readme.txt` — `Stable tag` **and** a matching `= x.y.z =` changelog entry.
- `CHANGELOG.md` — a `## [x.y.z]` section.

Why: each is read by a different consumer (WordPress, the readme parser, people
reading the changelog); a partial bump ships a release that disagrees with itself.

### Adding, renaming or removing a block

A block folder under `blocks/` is listed in:

1. `aludra_get_default_settings()` in `includes/admin/settings-page.php`.
2. `aludra_get_available_blocks()` in the same file — label, description,
   category, and `parent` for child blocks.
3. Both `get_option( 'aludra_enabled', array( … ) )` fallback lists in
   `aludra.php` — one in the `init` registration callback, one in the Slick
   enqueue callback.
4. `aludra_get_block_glyph()` in `includes/admin/settings-page.php` — the
   settings-screen icon.

Why: 1 and 2 are checked by `composer run test` (`tests/php/SettingsTest.php`);
a missing entry fails it. 3 is not tested. Registration treats a missing key as
enabled, but the Slick enqueue checks `! empty( $enabled_blocks['carousel'] )`
and `['testimonial-grid']`, where a missing key means disabled. 4 falls back to a
generic square icon — report a gap there as an observation, not an action item.

`CLAUDE.md`'s "Adding a New Block" section lists only the build steps; this list
is the complete requirement.

### Parent and child blocks

- The settings dependencies are the `parent` entries in
  `aludra_get_available_blocks()`: carousel → slide, faq-tabs → faq-tab-answer,
  stat-rail → stat-item, comparison-table → comparison-row → comparison-cell.
  `aludra_validate_dependencies()` disables a child whose parent is disabled.
- A child's `parent` in `block.json` and its `parent` in
  `aludra_get_available_blocks()` agree.
  Why: `SettingsTest` covers only the carousel and faq-tabs pairs; the other pairs
  rely on these two declarations staying in step.
- `mega-menu` has `parent` `core/navigation` and `aludra/nav-builder` in
  `block.json`; that is an editor constraint, not a settings dependency.

### Patterns (`patterns/`)

`aludra.php` registers pattern files from their own headers, in three families:

- **`section-*.php`** — one page band. `Categories` is one of `aludra-hero`,
  `aludra-proof`, `aludra-features`, `aludra-layout`, `aludra-convert`.
  **No `Block Types` header.**
  Why: `core/post-content` would put a single band into the Site Editor's
  new-page pattern picker, which is for whole-page layouts only.
- **`page-*.php`** — a complete page. `Categories: aludra-pages` and
  `Block Types: core/post-content`.
- **`mega-menu-*.php`** — menu template-part content; see the exception under
  Disable core rules.
- Carousel demo patterns are registered in PHP in `aludra.php` under
  `aludra-carousel`.

For every pattern file:

- A **direct-access guard** after the header doc-block:
  `if ( ! defined( 'ABSPATH' ) ) { exit; }`.
  Why: pattern files ship and are `include`d at runtime, so Plugin Check scans
  them and flags any without it. Check all at once:
  `git grep -L "defined( 'ABSPATH' )" -- 'patterns/*.php'` prints nothing today.
- **Separator blocks** use the WP 6.7+ form —
  `<!-- wp:separator {"className":"is-style-wide"} -->` with
  `class="wp-block-separator has-alpha-channel-opacity is-style-wide"` — never an
  inline `opacity` or custom background colour.
  Why: the other forms fail block validation.
- Markup extracted from a live page or inserted via WP-CLI has never been through
  the editor's `save()`; "it renders fine" is no evidence. New section patterns
  are safest when extracted verbatim from an existing, validated page pattern.
- No absolute URLs or attachment IDs from a live site.
  Why: they do not resolve on anyone else's install.

### Asset loading

- A front-end script needed only for some configurations of a block is **not** a
  `viewScript`. Slick is enqueued from `aludra.php` only when
  `aludra_blocks_have_slick_carousel()` finds a Slick-engine carousel, or when
  `testimonial-grid` is on the page; `blocks/carousel/js/view.js` lives outside
  `src/` for that reason.
  Why: core enqueues a `viewScript` whenever the block is present, regardless of
  attributes — this is how jQuery came back on carousel pages using the zero-JS
  `rail` engine.
- Conditional assets are gated on **both** the block being enabled in settings
  and the block being on the page.
- Current `viewScript` users:
  `git grep -n "viewScript" -- 'blocks/*/src/block.json'`.

### Mega menu (Interactivity API)

- `blocks/mega-menu` declares `supports.interactivity` and a `viewScriptModule`;
  `src/render.php` binds `data-wp-*` directives to the `aludra/mega-menu` store in
  `src/view.js`. New behaviour uses that store, not ad-hoc event listeners.

### Block editor (JS)

- `src/index.js` registers from the `metadata` imported out of `block.json`;
  attributes are not redeclared in JS.
- `save()` output and the markup in every pattern that uses the block match —
  a new `wp-block-aludra-<block>` wrapper class or a support-generated class
  (`has-custom-font-size` and friends) is the usual culprit.
  Why: a mismatch invalidates the block for every editor who opens the page.

### Tests

- `tests/php/` is a plain PHPUnit suite with `bootstrap.php` and `stubs.php` and
  no WordPress bootstrap. Anything needing the database or the block registry
  cannot be tested there; a test that stubs its way to green proves nothing.
- New settings, enumeration or dependency logic has a test in `SettingsTest.php`.

### Repository hygiene

- No `docs/` or `designs/` directory, and no planning document or design mockup
  anywhere in this repo — those live in the private `imagewize.com` repo. Nothing
  here references a file there as something a reader can open.
- New root-level `.distignore` entries are anchored with a leading slash
  (`/package.json`).
  Why: `plugin-check.yml` and the wp-ops rsync use rsync `--exclude-from`, where
  an unanchored pattern matches a basename at any depth — a bare `package.json`
  once excluded every `blocks/*/package.json`.
- `.gitattributes` `export-ignore` entries stay in step with `.distignore`.
- Commit messages mention no AI tool and carry no AI co-authorship or attribution
  trailer. Commits are atomic with short titles.
- User-facing changes are reflected in `readme.txt` and `CHANGELOG.md`.

## Audit rules

- `blocks/<block>/build/block.json` exists. Discovery looks for exactly that file;
  a block with only `src/` is never registered.
- The block is in all four places under "Adding, renaming or removing a block".
- A child block's parent is present, and both `parent` declarations agree.
- `src/block.json` and `build/block.json` agree semantically on `version`,
  `attributes`, `supports` and the asset fields.
- Each build file is in step with its own source (pairs in the skill's Audit
  Checklist): no commit changed a source file without also changing the build
  file compiled from it. Different commit dates across `build/` are normal.
- Past commits that changed the block's markup, styles or attributes bumped its
  `version`. One that did not is reported with its commit hash; the fix is a
  patch bump in the next release.
- Patterns that use the block emit markup matching the current `save()` output.
- The block's front-end script is a `viewScript` only if every configuration
  needs it.

## Audit context

```bash
git grep -n "'<block>'" -- aludra.php includes/admin/settings-page.php tests/php/
git grep -ln "aludra/<block>" -- patterns/ aludra.php
git grep -n '"version"\|"parent"\|viewScript' -- blocks/<block>/src/block.json blocks/<block>/build/block.json
diff <(jq -S . blocks/<block>/src/block.json) <(jq -S . blocks/<block>/build/block.json)
git log --format='%h %cs %s' --name-only -- blocks/<block>/
```
