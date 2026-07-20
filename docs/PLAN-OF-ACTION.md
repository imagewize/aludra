# Aludra — Plan of Action

_Last updated: 2026-07-20 (homepage pattern carousel/validation fixes 2.11.2–2.11.5; Aludra
block inserter category + block.json title/keyword cleanup 2.12.0; Service Intro + Service
Detail Cards ported, Tier B fully resolved 2.13.0)_

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

## 2. Current state (v2.13.0)

- Forked from `elayne-blocks` (files only, no git history), fresh `git init`.
- Full identifier rename: `elayne-blocks/*` → `aludra/*`, text domain `aludra`, constants
  `ALUDRA_*`, PHP namespace `Aludra`, files `aludra.php` / `languages/aludra.pot` /
  `languages/aludra-nl_NL.po`. Zero `elayne` references remain.
- Version: **2.13.0** (current stable).
- GitHub target: **`imagewize/aludra`** (published and active).
- All 22 blocks now register under a dedicated **`Aludra` inserter category** (`block_categories_all`
  filter in `aludra.php`) instead of sharing core's `design`/`widgets` categories — see
  [BLOCK-CONSOLIDATION-AND-RENAMING.md](./BLOCK-CONSOLIDATION-AND-RENAMING.md) for the naming/category
  audit this came out of, and §"Recent milestones" below (v2.12.0).
- Tier B (theme/colour-specific Nynaeve blocks) is now **fully resolved** — `service-intro` and
  `service-blocks` (v2.13.0) were the last two; `page-heading-blue` was dropped as not worth
  generalising (too outdated). See §3.

### Blocks shipped today (22)

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
| Hero Split | `aludra/hero-split` | imagewize.com (`acf/hero`, Tier B generalised) | 2.11.0 |
| About Section | `aludra/about` | Nynaeve (`nynaeve/about`) | 2.11.0 |
| Services Block | `aludra/services-block` | Nynaeve (`imagewize/services-block`) | 2.11.0 |
| Review Profiles | `aludra/review-profiles` | Nynaeve (`imagewize/review-profiles`, Tier B generalised) | 2.11.0 |
| CTA Banner | `aludra/cta-banner` | Nynaeve (`nynaeve/cta-block-blue`, Tier B generalised) | 2.11.0 |
| Service Intro | `aludra/service-intro` | Nynaeve (`imagewize/service-intro`, Tier B generalised) | 2.13.0 |
| Service Detail Cards | `aludra/service-blocks` | Nynaeve (`imagewize/service-blocks`, Tier B generalised) | 2.13.0 |

### Recent milestones
- **2.7.2** (2026-07-10): Rename from Elayne Blocks → Aludra
- **2.8.0** (2026-07-10): First Tier-A import batch (Feature Cards, Icon Grid, Trust Bar)
- **2.9.0** (2026-07-11): Second Tier-A import batch (Pricing Tiers, Testimonial Grid, CTA Columns, Feature List Grid)
- **2.9.1** (2026-07-11): Fixed composer description
- **2.9.2** (2026-07-13): Fixed settings page assets and styling
- **2.9.3** (2026-07-13): Redesigned Settings → Aludra page as categorized block-card grid
- **2.9.4** (2026-07-13): Added ABSPATH guards to mega-menu pattern files, fixed duplicate settings notice
- **2.10.0** (2026-07-14): Ported Contact Section (Tier A) and Hero Banner (Tier B `service-hero`, generalised — first Tier B block ported; hardcoded colour-scheme block styles dropped in favour of theme color presets with fallbacks)
- **2.11.0** (2026-07-19): Ported Hero Split, About, Services Block, Review Profiles, and CTA Banner (completing the imagewize.com homepage gap analysis from §13); added `displayMode: 'tabs' | 'accordion'` to FAQ Tabs; shipped the homepage as an Aludra page pattern (`patterns/page-homepage.php`), assembled end-to-end and validated with `wp pattern validate` (structural) and `wp-pattern-sentinel` (browser-based, real Gutenberg round-trip)
- **2.11.1** (2026-07-19): Fixed missing default `margin:0` inline style on five of the homepage pattern's block wrappers, caught by re-running `wp-pattern-sentinel` against the real released v2.11.0 blocks (the local Pass 3 run during 2.11.0 development predated the demo site's Composer update, so it couldn't fully validate against released code — see §14)
- **2.11.2** (2026-07-19): New Hero Split placeholder illustration (signature browser-card/chart art replacing the generic gray "broken image" icon); Hero Split CTA button gained a hover arrow + lift; README caught up with the five 2.11.0 blocks it was missing
- **2.11.3** (2026-07-19): Homepage pattern "Our Clients" carousel — replaced five repeated/recolored logo-mark slides with distinct fictional client-site browser mockups (`assets/clients/`)
- **2.11.4** (2026-07-19): Fixed the 2.11.3 client-mockup images not filling their carousel slide width (fixed `width`/`height` attributes with no scaling CSS)
- **2.11.5** (2026-07-19): Fixed the 2.11.4 fix itself — an inline `width:100%;height:auto` style isn't an attribute `core/image`'s `save()` produces, so it failed re-validation; replaced with the first-class `"align":"full"` attribute
- **2.12.0** (2026-07-20): Registered a dedicated **`Aludra` block inserter category** so all 20 blocks group together instead of sharing core's `design`/`widgets` categories; fixed the **Pricing Tiers** block title (dropped the implementation-detail `"(3 Column)"` suffix); added missing `keywords` to `carousel`, `feature-list-grid`, `pricing-tiers`, `search-overlay-trigger`, and `slide`. First (non-breaking) pass of the Phase 1 items from [BLOCK-CONSOLIDATION-AND-RENAMING.md](./BLOCK-CONSOLIDATION-AND-RENAMING.md)
- **2.13.0** (2026-07-20): Ported the last two Tier B blocks — **Service Intro** (`aludra/service-intro`, plain intro-text section) and **Service Detail Cards** (`aludra/service-blocks`, stacked numbered service cards with a checklist), both generalised from Nynaeve with theme colour-preset fallbacks and genericised placeholder copy. `page-heading-blue` dropped from the Tier B list as too outdated to be worth porting. Tier B is now fully resolved.

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
- [x] `faq` — **resolved, not a separate block** (§11.3): added `displayMode` accordion toggle to
  `aludra/faq-tabs` instead (2026-07-19, v2.11.0).
- [ ] `related-articles`
- [ ] `related-links`
- [x] `contact-section` (v2.10.0)
- [ ] `two-column-card`
- [ ] `content-image-text-card`
- [ ] `multi-column-content`
- [ ] `expect-list`
- [x] `about` → ported as `aludra/about` (2026-07-19, v2.11.0)
- [ ] `case-studies`
- [x] `services-block` → ported as `aludra/services-block` (2026-07-19, v2.11.0). Icons use
  Aludra's existing `aludra/icon` block-binding + bundled `assets/icons/*.svg` (same mechanism
  as `feature-cards`/`icon-grid`), not a dedicated svg block — see §13's `svg-block` note.

### Tier B — theme/colour-specific → generalise before importing
`elayne-hero`, `cta-block-blue` (hardcoded "blue"), `service-intro`, `service-blocks`,
`review-profiles`. (`page-heading-blue` dropped from this list — see note below.)
→ Replace hardcoded colours with `theme.json` preset references so they work across themes.

- [x] `service-hero` → ported as `aludra/hero-banner` (v2.10.0). Dropped the four hardcoded
  colour-scheme block styles (midnight/forest/violet/slate); uses theme color presets with
  fallbacks instead, matching the rest of Aludra's generalised blocks.
- [x] `cta-block-blue` → ported as `aludra/cta-banner`. Uses `supports.color.background`/`text`
  (native theme.json palette picker) plus a `var(--wp--preset--color--primary, #017cb6)`-style
  fallback chain in the stylesheet, same convention as `hero-banner`.
- [x] `review-profiles` → ported as `aludra/review-profiles` (2026-07-19, v2.11.0). Hardcoded
  `#f97316` background replaced with `supports.color.background`/`text` + a
  `var(--wp--preset--color--primary, #f97316)`-style fallback chain.
- [x] `elayne-hero` / split-pane hero (imagewize.com's `acf/hero`) → ported as `aludra/hero-split`
  (2026-07-19, v2.11.0). Structurally different from `hero-banner` (dark full-width CTA
  hero, no image pane) so it's its own block, not a variant. The desktop/mobile image swap is
  a pure CSS media-query toggle between two seeded `core/image` blocks — no JS, both images
  stay editable in the editor via an `editor.scss` override.
- [x] `service-intro` → ported as `aludra/service-intro` (2026-07-20, v2.13.0). Plain intro-text
  section (InnerBlocks-seeded paragraphs); hardcoded white background and Nynaeve-specific
  preset slugs replaced with `var(--wp--preset--color--base/main-accent/main, ...)` fallback
  chains, same convention as `feature-cards`/`icon-grid`.
- [x] `service-blocks` → ported as `aludra/service-blocks` (2026-07-20, v2.13.0). Stacked,
  numbered service cards with a checklist; hardcoded label/heading/body colours and the
  `DM Serif Display` font reference replaced with theme colour presets (fallbacks) and
  `font-family: inherit`, so it stays theme-neutral. Placeholder copy genericised (the
  Nynaeve source had Imagewize's own SEO-service copy baked in).
- [~] `page-heading-blue` — **not ported.** Judged too outdated/superseded relative to
  Aludra's current hero blocks (`hero-banner`, `hero-split`) to be worth generalising;
  dropped from the Tier B list rather than carried forward as a future task.

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
   (2026-07-14, implemented 2026-07-19):** converge on `aludra/faq-tabs`. Its `view.js` already
   implemented a full accordion (used previously only as the mobile fallback for the desktop tab
   layout via `initMobileAccordion()`). Added a `displayMode: 'tabs' | 'accordion'` attribute +
   `BlockControls` toolbar toggle + `InspectorControls` panel so accordion mode can run at all
   breakpoints in a single-column layout (`.is-display-mode-accordion` on the frontend and in the
   editor), instead of porting Nynaeve's `faq` as a separate block. No new block needed.
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
- [x] Port Hero Split, About, Services Block, Review Profiles, and CTA Banner → **2.11.0**.
- [x] Port remaining Tier B blocks `service-intro` and `service-blocks` → **2.13.0**. (`page-heading-blue`
  dropped — judged too outdated to be worth generalising; see the Tier B section above.) Tier B is
  now fully resolved.
- [ ] Port remaining Tier-A blocks: `two-column-card`, `content-image-text-card`, `multi-column-content`, `related-articles`, `related-links`, `expect-list`, `case-studies`. (`pricing`, `faq`, and `about` resolved per §11.6, §11.3, and the Tier A table above)
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
| Split-pane hero (heading/sub-heading + desktop/mobile image) | `acf/hero` | ✅ ported as `aludra/hero-split` (CSS-only desktop/mobile image toggle) |
| About section | `nynaeve/about` | ✅ ported as `aludra/about` (theme-adaptive) |
| "We are here to help" CTA band | `nynaeve/cta-block-blue` | ✅ ported as `aludra/cta-banner` (theme-adaptive) |
| Services list (icon + heading + text, 2-per-row) | `imagewize/services-block` | ✅ ported as `aludra/services-block` |
| Service icons | `imagewize/svg-block` | ✅ resolved as **not needed** — see below |
| Client review cards | `imagewize/review-profiles` | ✅ ported as `aludra/review-profiles` (theme-adaptive) |
| FAQ accordion | `imagewize/faq` | ✅ resolved as a `displayMode` addition to `aludra/faq-tabs` (§11.3), implemented 2026-07-19 |

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

1. ~~Resolve open decisions §11.3 (FAQ) and §11.6 (Pricing)~~ **Done (2026-07-14, FAQ implemented
   2026-07-19):** `pricing-tiers` covers the pricing grid as-is, no new block; FAQ converges on
   `faq-tabs` with a `displayMode: 'tabs' | 'accordion'` attribute — implemented across
   `block.json`/`edit.js`/`save.jsx`/`view.js`/`style.scss` in `blocks/faq-tabs/`.
2. ~~**`aludra/cta-banner`** (generalised `cta-block-blue`)~~ **Done (2026-07-14, v2.11.0):**
   establishes the theme.json-adaptive colour convention (`supports.color` + preset fallback)
   the remaining blocks reuse.
3. ~~**`aludra/about`** (Tier A, already tracked)~~ **Done (2026-07-19, v2.11.0):** plain
   content block (heading, lead, offer list, closing paragraph), high reuse for about/services
   pages too.
4. ~~**`aludra/services-block`** (new Tier A item)~~ **Done (2026-07-19, v2.11.0):**
   icon+heading+text card grid, 2-per-row; icons via the existing `aludra/icon` binding
   (same mechanism as `feature-cards`/`icon-grid`), no new icon block needed.
5. ~~**`aludra/review-profiles`** (Tier B)~~ **Done (2026-07-19, v2.11.0):** heading + 3-up
   grid of round avatar + quote, generalised colours (avatars ship with an empty `core/image`
   placeholder — no theme-specific photo paths baked in).
6. ~~**`aludra/hero-split`** (new block, not a `hero-banner` variant)~~ **Done (2026-07-19,
   v2.11.0):** split-pane hero with desktop/mobile image swap via CSS media query, no JS.
7. ~~Once the above exist, assemble the imagewize.com homepage as an Aludra **page pattern**~~
   **Done (2026-07-19, v2.11.0):** `patterns/page-homepage.php` (slug `aludra/page-homepage`),
   assembled from all of the above blocks with generic placeholder copy (not imagewize.com's real
   business content — see §14). Validated structurally with `wp pattern validate` and, once the
   ABSPATH-guard extraction bug in `wp-pattern-sentinel` was patched (v1.0.3), with a full
   browser-based Pass 3 sentinel run against a real Aviendha-themed subsite — proving the "block
   library + patterns" model end-to-end.
8. Extend the same pattern-building work to services/about/contact page patterns for Aviendha,
   per the plugin's broader pattern-library goal.

## 14. Homepage page pattern: authoring, content, and validation notes (2026-07-19)

Recorded while shipping `patterns/page-homepage.php` (v2.11.0), for the next page pattern:

- **Generic placeholder content, not imagewize.com's real copy.** The pattern mirrors
  imagewize.com's homepage *section layout* (hero → about → client logos → CTA band → pricing →
  services → reviews → FAQ) but uses placeholder pricing, generic testimonials, and stock-style
  client logos rather than real prices, real client quotes, or real client links — consistent with
  how `review-profiles` and the other ported blocks already ship generic defaults. A shared GPL
  plugin shouldn't bake in one business's live pricing/testimonials.
- **Placeholder art is bundled, not hotlinked.** `assets/placeholders/photo.svg` (hero images) and
  `assets/placeholders/avatar.svg` (review avatars) ship as base64 data-URIs directly in the
  pattern markup — no `placehold.co` or other third-party image-service dependency. The carousel's
  five client-logo slides reuse the pre-existing (previously unused) `assets/logos/*.svg` abstract
  marks, also inlined as data URIs.
- **`patterns/page-*.php` auto-discovery** was added to `aludra.php` (mirrors the existing
  `mega-menu-*.php` loader) registering with `blockTypes: ['core/post-content']`, so page patterns
  show up in the Site Editor's "choose a pattern" picker when creating a new page.
- **Hand-authoring block markup is error-prone even when structurally valid.** `wp pattern validate`
  (PHP `parse_blocks()`/`serialize_blocks()` round-trip) passed cleanly on the first attempt, but
  that only proves the comment delimiters and JSON parse correctly — it does **not** catch missing
  default block classes. The real Gutenberg editor's `save()` — checked via `wp-pattern-sentinel`
  (Pass 3, browser-based) — caught 9 genuine mismatches `wp pattern validate` missed: the top-level
  wrapper of every custom Aludra block must carry **both** its default `wp-block-aludra-{name}`
  class **and** any classes implied by attribute *defaults* declared in `block.json` (not just
  attributes explicitly set in the pattern's comment JSON) — e.g. `aludra/faq-tabs` defaults
  `align` to `"wide"`, so its wrapper needs `alignwide` even though the pattern's `<!-- wp:aludra/faq-tabs -->`
  comment never mentions `align`; `aludra/pricing-tiers` similarly defaults `backgroundColor` to
  `"base"` and a `style.spacing.margin` of `0`, both of which must appear in the static markup.
  **Lesson: when hand-authoring pattern markup for a block, always check every attribute default in
  that block's `block.json`, not just the attributes named in the pattern comment — omitted
  defaults still apply and still affect the serialized class/style output.**
- **`wp-pattern-sentinel` required a fix for Aludra's pattern shape.** Its `extractBlockContent()`
  assumed a pattern header is `<?php` + docblock + `?>` and stripped those in three separate
  anchored regex passes; Aludra's patterns insert a mandatory ABSPATH guard between the docblock
  and `?>` (see the "Pattern Development Guidelines" section above), which the old three-pass strip
  didn't handle, producing a false `extraction_error`. Fixed upstream in `wp-pattern-sentinel`
  v1.0.3 (single-pass strip of everything up to the first `?>`, handling both shapes identically).
  `~/code/wp-pattern-sentinel` is a sibling checkout to `~/code/aludra`; the fix needs releasing
  there before other Aludra patterns can run Pass 3 against a published version.
- **One real Pass 3 diff was a test-environment version-skew artifact, not a pattern bug:** the
  `demo.imagewize.com` / Aviendha subsite runs the last *released* `aludra/faq-tabs` (pre-`displayMode`,
  confirmed by grepping its deployed `build/index.js` for `is-display-mode` — absent), so it can't
  fully validate the `data-display-mode` attribute this same v2.11.0 release adds. Resolves itself
  once this version is tagged, released, and the demo site's Composer dependency is updated.
- **Local test setup, added this session:** a new `/aviendha` subsite on `demo.imagewize.com`
  running the Aviendha theme (previously only Elayne-themed subsites existed there — Aludra's
  primary target theme had no test site). `imagewize/aviendha` added to that Bedrock site's
  `composer.json` as a regular Packagist dependency (not a path repo — deliberately, so the test
  environment always reflects released versions, same as a real user's install). Root `package.json`
  gained `@imwz/wp-pattern-sentinel` as a dev dependency with `validate`/`validate:new`/
  `validate:file`/`validate:clear-cache` npm scripts targeting that subsite via `--trellis`.
