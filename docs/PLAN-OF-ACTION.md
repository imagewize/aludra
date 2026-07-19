# Aludra — Plan of Action

_Last updated: 2026-07-14 (contact-section and hero-banner ported, v2.10.0)_

## 1. What Aludra is

**Aludra** is a theme-neutral, GPL-v3 shared **block library plugin** for the Imagewize
block themes. It is the direct continuation of the old **Elayne Blocks** plugin
(≤ 2.7.1), renamed and generalised because it now serves multiple themes rather than
Elayne alone.

The name comes from _The Wheel of Time_: **Aludra**, the Illuminator who reverse-engineers
gunpowder and invents the "dragons" (artillery) — i.e. the series' **inventor/engineer**.
That fits a plugin whose job is to _build_ the pieces the themes assemble. The themes keep
their Aes Sedai women's names (Nynaeve, Elayne, **Aviendha**); the shared builder library
sits one level above them.

### Why a separate plugin at all (the wp.org constraint)

WordPress.org theme review **prohibits custom block registration in themes** — anything that
should survive a theme switch is "plugin territory." So the sustainable, wp.org-eligible
architecture is **two GPL products**:

| Repo | Role | Distribution |
|------|------|--------------|
| **aludra** (this repo) | React/JSON custom blocks (`@wordpress/scripts`, `block.json`) | wp.org **plugin** directory |
| **aviendha** (theme, to be scaffolded) | `theme.json` design system, WooCommerce templates, style variations | wp.org **theme** directory |

This mirrors every mature ecosystem (Astra + Spectra, Kadence + Kadence Blocks,
Neve + Otter). It also gives us the DX we actually want: **heavy logic lives in maintainable
React blocks; patterns become one-liners** (`<!-- wp:aludra/feature-cards /-->`) instead of
300-line block-markup walls that are painful to maintain and hostile to AI authoring.

> **Graceful degradation rule:** the theme must function without this plugin. Patterns that
> depend on `aludra/*` blocks are registered **conditionally** (only when Aludra is active);
> baseline templates use core blocks. WooCommerce is the one accepted "required plugin"
> exception.

## 2. Current state (v2.10.0)

- Forked from `elayne-blocks` (files only, no git history), fresh `git init`.
- Full identifier rename: `elayne-blocks/*` → `aludra/*`, text domain `aludra`, constants
  `ALUDRA_*`, PHP namespace `Aludra`, files `aludra.php` / `languages/aludra.pot` /
  `languages/aludra-nl_NL.po`. Zero `elayne` references remain.
- Version: **2.10.0** (current stable).
- GitHub target: **`imagewize/aludra`** (published and active).

### Blocks shipped today (15)

| Block | Namespace | Origin | Version Added |
|-------|-----------|--------|---------------|
| Carousel | `aludra/carousel` | shared | 2.7.2 |
| Slide | `aludra/slide` | shared | 2.7.2 |
| FAQ Tabs | `aludra/faq-tabs` | Elayne | 2.7.2 |
| FAQ Tab Answer | `aludra/faq-tab-answer` | Elayne | 2.7.2 |
| Mega Menu | `aludra/mega-menu` | Elayne | 2.7.2 |
| Search Overlay Trigger | `aludra/search-overlay-trigger` | Elayne | 2.7.2 |
| Feature Cards | `aludra/feature-cards` | Nynaeve | 2.8.0 |
| Icon Grid | `aludra/icon-grid` | Nynaeve | 2.8.0 |
| Trust Bar | `aludra/trust-bar` | Nynaeve | 2.8.0 |
| Pricing Tiers | `aludra/pricing-tiers` | Nynaeve | 2.9.0 |
| Testimonial Grid | `aludra/testimonial-grid` | Nynaeve | 2.9.0 |
| CTA Columns | `aludra/cta-columns` | Nynaeve | 2.9.0 |
| Feature List Grid | `aludra/feature-list-grid` | Nynaeve | 2.9.0 |
| Contact Section | `aludra/contact-section` | Nynaeve | 2.10.0 |
| Hero Banner | `aludra/hero-banner` | Nynaeve (`service-hero`, Tier B generalised) | 2.10.0 |

### Recent milestones
- **2.7.2** (2026-07-10): Rename from Elayne Blocks → Aludra
- **2.8.0** (2026-07-10): First Tier-A import batch (Feature Cards, Icon Grid, Trust Bar)
- **2.9.0** (2026-07-11): Second Tier-A import batch (Pricing Tiers, Testimonial Grid, CTA Columns, Feature List Grid)
- **2.9.1** (2026-07-11): Fixed composer description
- **2.9.2** (2026-07-13): Fixed settings page assets and styling
- **2.9.3** (2026-07-13): Redesigned Settings → Aludra page as categorized block-card grid
- **2.9.4** (2026-07-13): Added ABSPATH guards to mega-menu pattern files, fixed duplicate settings notice
- **2.10.0** (2026-07-14): Ported Contact Section (Tier A) and Hero Banner (Tier B `service-hero`, generalised — first Tier B block ported; hardcoded colour-scheme block styles dropped in favour of theme color presets with fallbacks)

## 3. Block gap analysis — what to import

**Nynaeve** ships **27 native React blocks** (`apiVersion: 3`, namespace `imagewize/*`,
**zero ACF dependency** — verified, so they port cleanly). Only `carousel` and `slide`
already exist in Aludra. The rest are import candidates, re-namespaced `imagewize/*` → `aludra/*`.

Triage (do **not** import all 27 blindly — some are hardcoded to a theme's look):

### Tier A — generic, high reuse → import & generalise first
- [x] `feature-cards` (v2.8.0)
- [x] `pricing-tiers` (v2.9.0)
- [ ] `pricing` — **NOTE:** Nynaeve `pricing` is a 2-column pricing table; `pricing-tiers` (already imported) is 3-column. Decide: import both as separate blocks, or skip `pricing` since `pricing-tiers` covers most use cases?
- [x] `testimonial-grid` (v2.9.0)
- [x] `cta-columns` (v2.9.0)
- [x] `icon-grid` (v2.8.0)
- [x] `trust-bar` (v2.8.0)
- [x] `feature-list-grid` (v2.9.0)
- [ ] `faq` — **resolved, not a separate block** (§11.3): add `displayMode` accordion toggle to `aludra/faq-tabs` instead.
- [ ] `related-articles`
- [ ] `related-links`
- [x] `contact-section` (v2.10.0)
- [ ] `two-column-card`
- [ ] `content-image-text-card`
- [ ] `multi-column-content`
- [ ] `expect-list`
- [x] `about` → ported as `aludra/about` (2026-07-19, unreleased)
- [ ] `case-studies`
- [ ] `services-block` (imagewize.com: icon-badge + heading + text row, 2-per-row) — **new
  addition**, not in original Nynaeve 27; surfaced by the imagewize.com homepage port (§13).
  Icon rendering needs no dedicated block — see §13's `svg-block` note.

### Tier B — theme/colour-specific → generalise before importing
`elayne-hero`, `page-heading-blue`, `cta-block-blue` (hardcoded "blue"),
`service-intro`, `service-blocks`, `review-profiles`.
→ Replace hardcoded colours with `theme.json` preset references so they work across themes.

- [x] `service-hero` → ported as `aludra/hero-banner` (v2.10.0). Dropped the four hardcoded
  colour-scheme block styles (midnight/forest/violet/slate); uses theme color presets with
  fallbacks instead, matching the rest of Aludra's generalised blocks.
- [x] `cta-block-blue` → ported as `aludra/cta-banner`. Uses `supports.color.background`/`text`
  (native theme.json palette picker) plus a `var(--wp--preset--color--primary, #017cb6)`-style
  fallback chain in the stylesheet, same convention as `hero-banner`.
- [ ] `review-profiles` → generalise colours (currently hardcoded `#f97316` background); needed
  for imagewize.com homepage port (§13).
- [ ] `elayne-hero` / split-pane hero (imagewize.com's `acf/hero`: heading/sub-heading +
  desktop/mobile image pane) — **structurally different from `hero-banner`** (which is a dark
  full-width CTA hero, no image pane). Needs its own block, e.g. `aludra/hero-split`, not a
  variant of `hero-banner`. Surfaced by §13.

### Tier C — already present / superseded
`carousel`, `slide` (present); Nynaeve `faq` vs Aludra `faq-tabs` — **resolved (§11.3):**
converge on `faq-tabs` with an accordion `displayMode`.

**Import lands as v2.8.0+** (minor bump — new features). Suggested order: do 3–4 Tier-A blocks
end-to-end (block.json → edit.js → save/render → four-pass) to establish the porting pattern,
then batch the rest. **v2.8.0 and v2.9.0 completed this pattern establishment.**

## 4. New blocks for the Aviendha e-commerce / cycling vertical

Aviendha targets **cycling & outdoor gear** for the EU (de/nl/en/fr — the biggest cycling
markets: NL, DE, FR, BE). Beyond the ported general blocks, likely **new** Aludra blocks:

- `aludra/product-hero` — split hero with product image + CTA
- `aludra/spec-table` — bike/gear specification table
- `aludra/geometry-table` — frame geometry (cycling-specific)
- `aludra/size-finder` — size/fit selector
- `aludra/comparison` — product comparison grid

WooCommerce-specific templates (archive, single product, cart/checkout blocks) live in the
**aviendha theme**, not here.

## 5. wp.org strategy

- **License:** GPL v3 (already in `LICENSE.md`) — clean for both repos.
- **Build:** ship compiled `blocks/*/build/` assets; `src/` + build config included so reviewers
  can rebuild. Build tools are fine; no runtime framework (this is why we avoided Sage/Acorn).
- **Plugin readme:** `readme.txt` already wp.org-formatted (Stable tag 2.9.4).
- **No "phone home", no bundled premium libs** beyond GPL-compatible ones (Slick carousel — verify license, consider replacing with a dependency-free carousel long-term).

## 6. Four-pass pattern validation (carry over from Elayne)

Reuse the Elayne validation harness ([reference](https://imagewize.com/elayne-four-pass-pattern-validation/))
so AI-authored patterns are reliable:

1. **Structural** — `wp pattern validate` (`parse_blocks()`): braces, nesting, attributes.
2. **Compliance** — `pt-cli` / `composer check`: semantic presets, i18n wrappers, attribute order.
3. **Runtime** — Playwright: inserts patterns in a real browser, catches JS serialization drift.
4. **Templates** — `pt-cli check:templates`: `.html` templates/parts, Woo wrappers, taxQuery.

Thin patterns (one custom block per pattern) shrink the surface each pass must check → faster loop.

## 7. Internationalisation

Target locales: **de_DE, nl_NL, en_US, fr_FR**. Today `languages/` has `aludra.pot` and
`aludra-nl_NL.po`. To do:
- Regenerate `aludra.pot` after imports (`wp i18n make-pot`).
- Add `de_DE` and `fr_FR` `.po`/`.mo`; keep `nl_NL` updated.
- Ensure every user-facing string in ported blocks uses `__()/_e()` with text domain `aludra`.

## 8. Versioning roadmap

| Version | Scope |
|---------|-------|
| **2.7.2** | Rename `elayne-blocks` → `aludra` (done) |
| **2.8.0** | Import first Tier-A batch from Nynaeve (Feature Cards, Icon Grid, Trust Bar) — done |
| **2.9.0** | Import second Tier-A batch (Pricing Tiers, Testimonial Grid, CTA Columns, Feature List Grid) — done |
| **2.9.x** | Settings page redesign, bug fixes — done |
| **3.0.0** | Remaining Tier-A blocks + Tier B generalised blocks + de/fr translations |
| **3.1.0** | Aviendha cycling/e-commerce blocks; possible namespace/back-compat cleanup |

## 9. Back-compat / migration for existing elayne-blocks sites

Renaming the namespace `elayne-blocks/*` → `aludra/*` **breaks saved content** on any live site
using Elayne Blocks (blocks render as "unrecognized"). Options, to decide before public release:

- **A. Clean break** — Aludra is a new plugin/slug; Elayne Blocks stays as-is for existing sites.
  Simplest; no migration path. (Fine if elayne-blocks has little/no install base.)
- **B. Block aliasing** — register `elayne-blocks/*` as deprecated aliases of `aludra/*` so old
  content keeps rendering. Most user-friendly; more code.
- **C. Migration script** — WP-CLI command to rewrite post content namespaces on activation.

**Decision needed** (see §11).

## 10. Companion theme: Aviendha (next repo)

Separate from this plan, `~/code/aviendha` will be scaffolded as a **solid FSE theme, no
`patterns/`**: `theme.json`, `templates/`, `parts/`, `styles/` variations, `woocommerce/`
templates, `languages/` (de/nl/en/fr), `readme.txt`. WooCommerce template files are structural
FSE templates, not optional, so they're in from the start rather than deferred.

Unlike Elayne, Aviendha ships **no theme-level patterns** — composition happens directly with
`aludra/*` blocks (block-first, not pattern-first). It will **recommend** (not hard-require)
Aludra, and require WooCommerce for the store templates.

## 11. Open decisions

1. **Back-compat** for elayne-blocks sites — A, B, or C above?
2. **Plugin display name** — "Aludra" alone, or "Aludra Blocks" for wp.org discoverability?
3. ~~**Faq convergence** — keep both Nynaeve `faq` and Elayne `faq-tabs`, or merge?~~ **Resolved
   (2026-07-14):** converge on `aludra/faq-tabs`. Its `view.js` already implements a full
   accordion (used today only as the mobile fallback for the desktop tab layout via
   `initMobileAccordion()`). Add a `displayMode: 'tabs' | 'accordion'` attribute + toolbar
   toggle so accordion mode can run at all breakpoints in a single-column layout, instead of
   porting Nynaeve's `faq` as a separate block. No new block needed.
4. **Slick carousel** — keep (verify GPL-compat) or replace with a dependency-free carousel?
5. **Cycling sub-focus** — road / gravel / e-bike / MTB, or broad "cycling & outdoor"? Affects demo content and the specialised blocks.
6. ~~**Pricing vs Pricing Tiers** — Nynaeve has both `pricing` (2-column) and `pricing-tiers` was
   already imported as 3-column. Import both, or skip `pricing`?~~ **Resolved (2026-07-14):**
   skip `pricing`. `aludra/pricing-tiers` is a thin wrapper that seeds an `InnerBlocks` template
   of pure core blocks (`core/columns` → `core/column` → `core/heading`/`paragraph`/`buttons`),
   fully editable per tier — functionally equivalent to what imagewize.com's `imagewize/pricing`
   does. No new block needed.
7. **SVG icon block** — resolved, no block needed. Aludra already whitelists SVG/WebP uploads
   plugin-wide (`aludra_allow_additional_mime_types()` in `aludra.php`, theme-agnostic), so
   icons are real `core/image` uploads; the coloured/rounded icon-badge container is native
   `core/group` supports (background, border-radius, padding). See §13.

## 12. Immediate next steps

- [x] First commit of the renamed plugin (`imagewize/aludra`).
- [ ] Decide §11.1 (back-compat) and §11.2 (display name).
- [x] Port 3–4 Tier-A blocks end-to-end to establish the pattern → tagged **2.8.0**.
- [x] Port second batch of Tier-A blocks → tagged **2.9.0**.
- [x] Settings page redesign and bug fixes → **2.9.3-2.9.4**.
- [x] Port Contact Section (Tier A) and Hero Banner (Tier B `service-hero`, generalised) → **2.10.0**.
- [ ] Port remaining Tier-A blocks: `two-column-card`, `content-image-text-card`, `multi-column-content`, `related-articles`, `related-links`, `expect-list`, `about`, `case-studies`. (Decide on `pricing` and `faq` per §11.6 and §11.3)
- [ ] Generalise and import remaining Tier B blocks: `elayne-hero`, `page-heading-blue`, `cta-block-blue`, `service-intro`, `service-blocks`, `review-profiles`.
- [ ] Add de_DE and fr_FR translations.
- [ ] Decide on back-compat approach for elayne-blocks sites (A, B, or C).
- [ ] Scaffold `~/code/aviendha` theme with its own plan.
- [ ] Design and implement Aviendha-specific blocks: `product-hero`, `spec-table`, `geometry-table`, `size-finder`, `comparison`.

## 13. Case study: porting the imagewize.com homepage

The imagewize.com homepage is a useful concrete test of "can Aludra build a real marketing
site yet?" — it mixes ACF blocks, old `imagewize/*` custom blocks, and `nynaeve/*` blocks.
Auditing it against the current Aludra block set (v2.10.0) surfaced gaps and two scope
corrections worth recording.

### Gap analysis (against Aludra v2.10.0)

| Section on imagewize.com | Source block | Aludra status |
|---|---|---|
| Client-logo carousel | `imagewize/carousel` + `imagewize/slide` | ✅ covered by `aludra/carousel` + `aludra/slide` |
| Pricing grid (3 cards) | `imagewize/pricing` | ✅ covered by `aludra/pricing-tiers` — no separate block needed (§11.6, resolved) |
| Split-pane hero (heading/sub-heading + desktop/mobile image) | `acf/hero` | ❌ no equivalent — `aludra/hero-banner` is a different shape (dark full-width CTA hero, no image pane). Needs a new block. |
| About section | `nynaeve/about` | ✅ ported as `aludra/about` (theme-adaptive) |
| "We are here to help" CTA band | `nynaeve/cta-block-blue` | ✅ ported as `aludra/cta-banner` (theme-adaptive) |
| Services list (icon + heading + text, 2-per-row) | `imagewize/services-block` | ❌ not tracked before this audit — added as new Tier A item |
| Service icons | `imagewize/svg-block` | ✅ resolved as **not needed** — see below |
| Client review cards | `imagewize/review-profiles` | ❌ not ported (Tier B, hardcoded `#f97316` background) |
| FAQ accordion | `imagewize/faq` | ⏳ resolved as a `displayMode` addition to `aludra/faq-tabs` (§11.3), not yet implemented |

### Two scope corrections from this audit

1. **No `svg-block` needed.** Nynaeve's `svg-block` exists only because raw SVG uploads and
   background-badge styling weren't otherwise available. Aludra already solves both natively:
   `aludra_allow_additional_mime_types()` in `aludra.php` whitelists SVG/WebP uploads
   plugin-wide (theme-agnostic — works regardless of active theme), so icons are real
   `core/image` media-library uploads; the coloured/rounded badge behind them is just
   `core/group` block supports (background color, border-radius, padding — no custom code).
   Removed from the port list entirely. A reusable "icon badge" **pattern** (Group + Image) can
   ship instead of a block, if consistency across authors is wanted.
2. **CTA block must be theme-adaptive, not "-blue".** Per §1, Aludra is meant to be
   theme-neutral (Elayne/Nynaeve/Aviendha primarily, but degrade gracefully on other FSE
   themes). `cta-block-blue`'s hardcoded colour doesn't fit that. Target block:
   `aludra/cta-banner`, using `supports.color.background`/`text` so it natively reads the
   *active* theme's `theme.json` palette in the editor, plus a
   `var(--wp--preset--color--primary, #017cb6)`-style fallback chain in `style.scss` — the same
   convention `hero-banner` already validated in v2.10.0.

### Suggested port order

1. ~~Resolve open decisions §11.3 (FAQ) and §11.6 (Pricing)~~ **Done (2026-07-14):** `pricing-tiers`
   covers the pricing grid as-is, no new block; FAQ converges on `faq-tabs` with a new
   `displayMode: 'tabs' | 'accordion'` attribute (not yet implemented — small, contained change
   to `block.json`/`edit.js`/`save.jsx`/`view.js`/`style.scss` in `blocks/faq-tabs/`).
2. ~~**`aludra/cta-banner`** (generalised `cta-block-blue`)~~ **Done (2026-07-14, unreleased):**
   establishes the theme.json-adaptive colour convention (`supports.color` + preset fallback)
   the remaining blocks reuse.
3. ~~**`aludra/about`** (Tier A, already tracked)~~ **Done (2026-07-19, unreleased):** plain
   content block (heading, lead, offer list, closing paragraph), high reuse for about/services
   pages too.
4. **`aludra/services-block`** (new Tier A item) — icon+text row layout; icons via `core/image`,
   no dependency on a new icon block.
5. **`aludra/review-profiles`** (Tier B) — port + generalise colours.
6. **`aludra/hero-split`** (new block, not a `hero-banner` variant) — split-pane hero with
   desktop/mobile image swap.
7. Once the above exist, assemble the imagewize.com homepage as an Aludra **page pattern**
   (validated via the four-pass harness, §6) — proving the "block library + patterns" model
   end-to-end.
8. Extend the same pattern-building work to services/about/contact page patterns for Aviendha,
   per the plugin's broader pattern-library goal.
