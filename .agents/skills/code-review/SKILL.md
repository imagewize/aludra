---
name: code-review
description: Review the current branch against its base for correctness, WordPress security/escaping, and the repo's block/pattern/version rules
user-invocable: true
---

# Code Review

Reviews a branch of this repository — a WordPress block plugin. The generic half of
the review (correctness, architecture) is ordinary; the half that actually catches
things here is the Aludra Checklist below, because most regressions in this repo are
rule violations, not logic bugs: a block style fixed without a `version` bump serves
stale CSS, a pattern without a direct-access guard fails Plugin Check, a new block
missing from one of the three enumerations silently never registers.

No tool may write to the working tree during a review. Report; do not fix.

## Instructions

### Phase 0: Preparation

1. **Fetch latest changes**:

```bash
git fetch origin
```

2. **Arguments**:
   - Default base branch: `origin/main` when none is given.
   - Optional base branch: the first token after the command (e.g. `origin/develop`).
   - PR description/context: any further text (or anything after `--`) is review
     context — use it to judge intent and scope.
   - When passing both, put the branch first or separate the description with `--`.

   ```
   /code-review
   /code-review origin/develop
   /code-review Add Photo Grid and Instagram Embed blocks
   /code-review origin/main -- Add Photo Grid and Instagram Embed blocks
   ```

### Phase 1: Discover Changed Files

3. **List changed files** (names only — do not pull full diffs yet):

```bash
git diff --name-status origin/main...HEAD     # or <branch>...HEAD
git diff --name-status                        # unstaged
git diff --cached --name-status               # staged
```

### Phase 2: Filter and Prioritize

4. **Categorize every file as REVIEW or SKIP.**

**SKIP:**
- `blocks/*/build/**` — webpack output, except `build/block.json`, which is
  committed metadata and **must** be reviewed (see version rule below).
- `blocks/carousel/slick/**` — vendored third-party Slick, unmodified by policy.
  Flag any diff here as a finding rather than reviewing it line by line.
- Lockfiles: `package-lock.json`, `blocks/*/package-lock.json`, `composer.lock`.
- Binaries: images, fonts, `.zip`.
- `sentinel-*.log.json` — validator run logs; these are gitignored and should
  never appear in a diff. If one does, that is a finding.
- Deleted files (status `D`) — note them, don't diff them.

**REVIEW:**
- PHP: `aludra.php`, `includes/**`, `blocks/*/src/render.php`, `patterns/*.php`, `tests/php/**`.
- JS/JSX: `blocks/*/src/**.js`, `**.jsx`, and `blocks/carousel/js/view.js`.
- Styles: `blocks/*/src/*.scss`.
- Metadata: `blocks/*/src/block.json` **and** `blocks/*/build/block.json`.
- Config: `composer.json`, `phpcs.xml.dist`, `phpunit.xml`, `.distignore`,
  `.gitattributes`, `.github/workflows/*`.
- Docs: `README.md`, `readme.txt`, `CHANGELOG.md`, `CLAUDE.md`, `AGENTS.md`, `CONTRIBUTING.md`.

5. **Print the categorization** before reviewing:

```
FILES TO REVIEW (X):
- blocks/photo-grid/src/edit.js (Modified)
- patterns/section-photo-grid.php (Added)

FILES SKIPPED (Y):
- blocks/photo-grid/build/index.js (build output)
- composer.lock (lock file)
```

### Phase 3: Correctness Review

6. **Diff each REVIEW file**:

```bash
git diff origin/main...HEAD -- <file_path>
```

7. **Focus on added lines** (`+`). Review removed lines only for context. Open the
   full file only when the surrounding code is needed to judge the change.

8. **Apply the Aludra Checklist and the General Checklist.** Surface only failing
   or attention-required items. If everything passes: "Checklist: no issues found."

### Phase 4: Architecture Review

9. Assess the change as a whole: does it cohere as one feature/fix; does it duplicate
   an existing block, pattern or helper; does it respect the boundaries below
   (plugin bootstrap vs. block source vs. pattern markup); does it make the next
   change harder.

### Phase 5: Summary Report

10. **Report** in this shape. No per-file narration unless asked.

```
REVIEW SUMMARY
==============
Files reviewed: X
Files skipped: Y

CRITICAL ACTION ITEMS:
- file:line — what is wrong, and what breaks because of it

IMPORTANT:
- ...

ARCHITECTURE OBSERVATIONS:
- ...

OVERALL ASSESSMENT: Approve | Request Changes | Comment
```

Every action item names a file and, where it exists, a line. An item with no
concrete failure behind it is noise — drop it.

---

## Aludra Checklist

These are the repo's own rules. Check them first; they are the ones that bite.

### Block versioning

- A block whose **markup, styles or attributes** changed must have its `version`
  bumped in `blocks/<block>/src/block.json` — patch for a style/rendering fix,
  minor for a new attribute or style variation.
- The bump must appear in **both** `src/block.json` and the committed
  `build/block.json`. If the two disagree, that is a finding: WordPress reads the
  build copy and cache-busts the block's script and style with it, so a style fix
  without the bump keeps serving stale CSS from browser and CDN caches.
- Any change under `blocks/<block>/src/` that affects output should be accompanied
  by regenerated `blocks/<block>/build/` output. `src` moving without `build` means
  the shipped plugin does not contain the change.

### Plugin versioning

If the plugin version moved, all three must agree, or none should have changed:

- `aludra.php` — `Version:` header **and** the `ALUDRA_VERSION` constant.
- `readme.txt` — `Stable tag` **and** a matching changelog entry.
- `CHANGELOG.md` — a new section for that version.

### Adding a block

A new block under `blocks/` must also appear in:

- `aludra_get_default_settings()` in `aludra.php`,
- `aludra_get_available_blocks()`,
- the admin settings page (`includes/admin/settings-page.php`).

The PHPUnit suite (`composer run test`) asserts these enumerations do not drift —
a missing entry fails it. Parent/child blocks (carousel→slide, faq-tabs→
faq-tab-answer) additionally need their dependency rules honored: a child cannot be
enabled without its parent.

### Patterns (`patterns/`)

- **Direct-access guard required** in every pattern file, after the header
  doc-block and before the closing `?>`:
  `if ( ! defined( 'ABSPATH' ) ) { exit; }`. Pattern files ship in the
  distribution and are `include`d at runtime, so Plugin Check scans them and flags
  any without it.
- **`section-*.php` must not carry a `Block Types` header.** `core/post-content`
  there would put a single page band into the Site Editor's new-page pattern
  picker, which is for whole-page layouts only.
- `page-*.php` carries `Categories: aludra-pages` and `Block Types: core/post-content`.
- `Categories` on a section pattern is one of `aludra-hero`, `aludra-proof`,
  `aludra-features`, `aludra-layout`, `aludra-convert`.
- **Separator blocks** use the WP 6.7+ format —
  `<!-- wp:separator {"className":"is-style-wide"} -->` with
  `class="wp-block-separator has-alpha-channel-opacity is-style-wide"` — never
  inline `opacity` or a custom background color, which fail block validation.
- **The validator must have been run.** Any PR touching `patterns/` must pass
  `npm run validate`. Ask whether it was run if the PR gives no sign of it; a
  frontend screenshot cannot show a block-validation mismatch.
- Pattern markup extracted from a live page or inserted via WP-CLI has never been
  through the editor's `save()` and may have been invalid from the day it was
  written. Treat "it renders fine" as no evidence.
- Watch for absolute URLs and attachment IDs baked into pattern markup taken from
  a live site — they will not resolve on anyone else's install.

### Asset loading

- **A frontend script must not be registered as `viewScript` if it is only needed
  for some configurations of the block.** Core enqueues a `viewScript` whenever
  the block is present, regardless of attributes — this is exactly how jQuery came
  back on carousel pages using the zero-JS `rail` engine. Per-engine or
  per-attribute assets are enqueued from `aludra.php` behind a gate
  (see `aludra_blocks_have_slick_carousel()`), and `blocks/carousel/js/view.js`
  deliberately lives outside `src/`.
- Conditional assets stay conditional: gated on both the block being enabled in
  settings and `has_block()` finding it on the page.

### WordPress security and correctness (PHP)

- Every output escaped at the point of output: `esc_html()`, `esc_attr()`,
  `esc_url()`, `wp_kses_post()`. Never echo an attribute raw in `render.php`.
- Every input sanitized; option writes go through the sanitize callback.
- Admin actions check capability **and** nonce.
- `ABSPATH` guard at the top of every directly-reachable PHP file.
- Text domain is `aludra` everywhere, and translatable strings are literals — not
  variables or concatenations.
- PHP 7.4 compatible: no arrow-function-only-in-8 syntax, no named arguments, no
  `match`, no constructor property promotion, no nullsafe operator.
- `composer run lint` and `composer run wpcs:scan` should pass; flag obvious WPCS
  violations (Yoda conditions, spacing, missing translators comments) rather than
  re-running the linter mentally.

### Block editor (JS)

- `src/index.js` registers from `metadata` imported out of `block.json` — metadata
  stays the single source of truth; attributes are not redeclared in JS.
- `save()` output and the markup in any pattern that uses the block must match, or
  the block invalidates for every editor that opens the page. A new
  `wp-block-aludra-<block>` wrapper class or a support-generated class
  (`has-custom-font-size` and friends) is the usual culprit.
- Deprecations: changing an existing block's `save()` output without a
  `deprecated` entry invalidates content already saved on live sites. This is a
  critical finding, not a nit.
- Parent/child constraints (`parent` in `block.json`) still hold.
- Frontend interactivity in `view.js`; mega-menu uses the Interactivity API
  (`data-wp-*` attributes bound to a `store()`), not ad-hoc listeners.

### Repo hygiene

- No `docs/` or `designs/` directory, and no planning document or design mockup
  added anywhere in this repo — those live in the private `imagewize.com` repo.
  Nothing in this repo may reference a file there as something a reader can open.
- New root-level `.distignore` entries are anchored with a leading slash
  (`/package.json`), since rsync matches an unanchored pattern as a basename at
  any depth.
- Commit messages mention no AI tool and carry no AI co-authorship or attribution
  trailer. Commits are atomic and titles short.

---

## General Checklist

**Correctness**
- Null/undefined and empty-array paths handled; off-by-one and boundary cases.
- Error paths return something callers can act on.
- No regression in behavior the diff did not intend to change.

**Duplication and boundaries**
- No copy of a block, pattern or helper that already exists.
- Plugin bootstrap logic stays in `aludra.php`/`includes/`; block logic stays in
  the block.

**Dependencies**
- No new npm or Composer dependency without a reason; block `node_modules` stay
  isolated per block.
- Vendored code (`blocks/carousel/slick/`) is not modified.

**Accessibility**
- Keyboard operable, focus managed on open/close (mega menu, search overlay, FAQ
  tabs), ARIA roles and labels present and correct, images carry alt text.

**Tests**
- `tests/php/` is a plain PHPUnit suite with no WordPress bootstrap — anything
  needing the DB or block registry cannot be tested there. A test that stubs its
  way to a green result proves nothing; say so.
- New settings/enumeration logic has a test.

**Docs**
- User-facing change reflected in `readme.txt` and `CHANGELOG.md`.
- A new repo rule or workflow belongs in `CLAUDE.md`/`AGENTS.md`, not only in a
  commit message.

---

## Output Example

```markdown
# Code Review: feature/photo-grid → origin/main

## Files Reviewed (4)
- aludra.php (Modified)
- blocks/photo-grid/src/block.json (Added)
- blocks/photo-grid/src/save.jsx (Added)
- patterns/section-photo-grid.php (Added)

## Files Skipped (3)
- blocks/photo-grid/build/index.js (build output)
- blocks/photo-grid/package-lock.json (lock file)
- assets/photo-grid.png (binary)

---

## Action Items

### Critical
1. **patterns/section-photo-grid.php:1** — No `ABSPATH` guard. Pattern files ship
   and are scanned by Plugin Check; this fails `missing_direct_file_access_protection`.
2. **blocks/photo-grid/src/block.json:4** — `version` bumped in `src/` but
   `build/block.json` still reads 1.0.0. WordPress reads the build copy, so the
   new stylesheet will be served under the old cache key.

### Important
1. **aludra.php:212** — `photo-grid` added to `aludra_get_default_settings()` but
   not to the settings page enumeration; `composer run test` will fail on drift.

---

## Architecture Observations
- `section-photo-grid.php` duplicates the grid markup in `page-homepage.php`;
  extracting it from that page verbatim would keep one source and a validated
  round-trip.

---

## Overall Assessment: REQUEST CHANGES
```

## Tips

- Run from the branch under review.
- Keep PRs under ~20 files for a useful review.
- Pass the PR description as context — intent changes what counts as a defect.
- Re-run after addressing action items.
