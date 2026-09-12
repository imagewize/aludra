---
name: code-review
description: Review a branch diff, or audit a block or path in place, for correctness, WordPress security/escaping, and the repo's block/pattern/version rules
user-invocable: true
---

# Code Review

Reviews this repository — a WordPress block plugin — either as a branch diff or as
an in-place audit of one block or path. The generic half of the review
(correctness, architecture) is ordinary; the half that actually catches
things here is the Aludra Checklist below, because most regressions in this repo are
rule violations, not logic bugs: a block style fixed without a `version` bump serves
stale CSS, a pattern without a direct-access guard fails Plugin Check, a new block
missing from one of the three enumerations silently never registers.

No tool may write to the working tree during a review. Report; do not fix.

## Modes

The skill runs in one of two modes, chosen from the first argument.

- **Branch mode** (default) — review what this branch changed against a base.
  Works from the diff; the unit of review is the added line.
- **Audit mode** — review a block, directory or file **as it stands**, with no
  base and no diff. This is the mode for "review the carousel block" while
  sitting on `main`. The unit of review is the whole file, and the checks that
  ask "did this change bump/update X" become "are X and Y consistent with each
  other right now".

## Instructions

### Phase 0: Preparation

1. **Fetch latest changes**:

```bash
git fetch origin
```

2. **Parse the argument and pick a mode.** Let `TOKEN` be the first argument.

   - No argument at all → **branch mode** against `origin/main`.
   - `TOKEN` is an existing path (`test -e "$TOKEN"`) → **audit mode** on that path.
   - `TOKEN` is a bare block name and `blocks/$TOKEN` exists → **audit mode** on
     `blocks/$TOKEN`. `/code-review carousel` audits `blocks/carousel/`.
   - `TOKEN` resolves as a git ref (`git rev-parse --verify --quiet "$TOKEN^{commit}"`)
     → **branch mode** against it.
   - `TOKEN` is **both** a path and a ref → ask which was meant. Do not guess.
   - `TOKEN` is neither → say so and stop; do not silently fall back to `origin/main`.

   Everything after the first token (or after `--`) is PR/review context: use it to
   judge intent and scope. When passing both a target and a description, put the
   target first or separate the description with `--`.

   ```
   /code-review                                   # branch mode vs origin/main
   /code-review origin/develop                    # branch mode vs origin/develop
   /code-review carousel                          # audit blocks/carousel/
   /code-review blocks/photo-grid                 # audit that directory
   /code-review patterns/page-homepage.php        # audit one file
   /code-review aludra.php -- why is slick still loading on rail pages
   /code-review Add Photo Grid and Instagram Embed blocks
   ```

   Only branch mode needs `git fetch origin` — skip step 1 in audit mode.

### Phase 1: Discover Files

3. **Branch mode — list changed files** (names only; do not pull full diffs yet):

```bash
git diff --name-status origin/main...HEAD     # or <branch>...HEAD
git diff --name-status                        # unstaged
git diff --cached --name-status               # staged
```

   If this yields nothing, the branch is identical to its base. Say so and stop —
   and point out that auditing a block in place is `/code-review <block-name>`.

3b. **Audit mode — enumerate tracked files under the target**:

```bash
git ls-files -- <target>
```

   Use `git ls-files`, not `find` or `ls -R`: it skips `node_modules/` and anything
   else untracked, which is most of the bytes under a block directory.

   Then gather the context a block cannot be judged without — in audit mode these
   files are part of the review even when they sit outside the target:

```bash
git grep -n "<block-name>" -- aludra.php includes/ tests/php/   # enumerations
git grep -ln "aludra/<block-name>" -- patterns/                 # patterns using it
git log --oneline -10 -- <target>                               # recent history
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

6. **Branch mode — diff each REVIEW file**:

```bash
git diff origin/main...HEAD -- <file_path>
```

   **Focus on added lines** (`+`). Review removed lines only for context. Open the
   full file only when the surrounding code is needed to judge the change.

7. **Audit mode — read each REVIEW file in full.** There is no diff to narrow the
   scope, so read `block.json`, `edit.js`, `save.jsx`, `view.js`, `render.php` and
   the stylesheets as a set and judge whether they agree with each other. Apply the
   **Audit Checklist** below in addition to the shared ones. Age is not a defect:
   do not report a deliberate old decision as a finding just because the code is
   not how you would write it today.

8. **Apply the Aludra Checklist and the General Checklist.** Surface only failing
   or attention-required items. If everything passes: "Checklist: no issues found."

### Phase 4: Architecture Review

9. **Branch mode** — assess the change as a whole: does it cohere as one feature/fix;
   does it duplicate an existing block, pattern or helper; does it respect the
   boundaries below (plugin bootstrap vs. block source vs. pattern markup); does it
   make the next change harder.

   **Audit mode** — assess the target's place in the plugin: is it reachable at all
   (registered, enabled, discoverable); does it duplicate another block's job; do the
   patterns that use it still match its `save()` output; is anything in it dead —
   an attribute nothing reads, a style variation no markup emits, a stylesheet rule
   for a class the block no longer renders.

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

In audit mode the header names the target rather than a branch pair
(`# Code Review: blocks/carousel (audit)`), "Files skipped" counts what was
enumerated and excluded, and the assessment reads `Healthy | Needs Work | Comment`
rather than the PR verbs.

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

## Audit Checklist (audit mode only)

In audit mode nothing "changed", so the version rules turn into consistency rules.
Check these against the block as it stands.

### Is it reachable

- `blocks/<block>/build/block.json` **exists**. Discovery scans for exactly that
  file; a block with only `src/` is never registered, no matter how good it is.
- The block appears in `aludra_get_default_settings()`, in
  `aludra_get_available_blocks()`, and in `includes/admin/settings-page.php`.
  Missing from any one of them is a finding, and `composer run test` should be
  failing on it already.
- A child block (`parent` in `block.json`) has its parent present and enabled, and
  the dependency rule is expressed in the settings logic.

### Is `src` and `build` in step

- `src/block.json` and `build/block.json` agree on `version`, `attributes`,
  `supports`, and the asset handles. Diff them directly:

```bash
diff <(python3 -m json.tool blocks/<block>/src/block.json) \
     <(python3 -m json.tool blocks/<block>/build/block.json)
```

- The committed `build/` output is not older than `src/`. If `git log -1` on `src/`
  is newer than on `build/`, the shipped plugin does not contain the newest source
  — a critical finding, since `build/` is what users get from Packagist.

### Does it agree with itself

- Every attribute declared in `block.json` is read somewhere (`edit.js`, `save.jsx`,
  `render.php`, `view.js`). An attribute nothing reads is dead weight or a missing
  feature — say which.
- Everything `save()` renders has a matching style rule, and every rule in
  `style.scss` targets a class the block can actually emit. Orphan CSS is the usual
  residue of a half-finished rename.
- Style variations registered in `block.json` have corresponding `is-style-*` rules.
- `editor.scss` carries only editor-specific overrides; anything the frontend also
  needs belongs in `style.scss`.

### Does it agree with the rest of the plugin

- Patterns that use the block (`git grep -l "aludra/<block>" patterns/`) emit
  markup matching the current `save()` output — wrapper class included. A mismatch
  invalidates the block for every editor that opens a page built from that pattern,
  while the frontend keeps rendering it fine, so nothing looks wrong until someone
  edits.
- Attributes the block has since gained or renamed have a `deprecated` entry
  covering content already saved on live sites.
- The block's frontend script is a `viewScript` only if it is needed for *every*
  configuration of the block; otherwise it belongs behind a gate in `aludra.php`.

Run the cheap mechanical checks rather than eyeballing them:

```bash
git grep -c "" blocks/<block>/src/block.json >/dev/null   # exists
git grep -n "<block>" aludra.php includes/admin/settings-page.php
git grep -n "viewScript\|script\|style" blocks/<block>/src/block.json
```

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

- Branch mode: run from the branch under review.
- Audit mode: `/code-review <block-name>` is the short form —
  `/code-review carousel`, `/code-review mega-menu`. It works from any branch,
  including a clean `main`.
- Keep PRs under ~20 files for a useful review.
- Pass the PR description as context — intent changes what counts as a defect.
- Re-run after addressing action items.
