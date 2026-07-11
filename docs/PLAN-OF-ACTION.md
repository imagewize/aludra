# Aludra — Plan of Action

_Last updated: 2026-07-11_

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

## 2. Current state (post-rename, v2.7.2)

- Forked from `elayne-blocks` (files only, no git history), fresh `git init`.
- Full identifier rename: `elayne-blocks/*` → `aludra/*`, text domain `aludra`, constants
  `ALUDRA_*`, PHP namespace `Aludra`, files `aludra.php` / `languages/aludra.pot` /
  `languages/aludra-nl_NL.po`. Zero `elayne` references remain.
- Version bumped **2.7.1 → 2.7.2** (rename only, no functional change).
- GitHub target: **`imagewize/aludra`**.

### Blocks shipped today (6)

| Block | Namespace | Origin |
|-------|-----------|--------|
| Carousel | `aludra/carousel` | shared |
| Slide | `aludra/slide` | shared |
| FAQ Tabs | `aludra/faq-tabs` | Elayne |
| FAQ Tab Answer | `aludra/faq-tab-answer` | Elayne |
| Mega Menu | `aludra/mega-menu` | Elayne |
| Search Overlay Trigger | `aludra/search-overlay-trigger` | Elayne |

## 3. Block gap analysis — what to import

**Nynaeve** ships **27 native React blocks** (`apiVersion: 3`, namespace `imagewize/*`,
**zero ACF dependency** — verified, so they port cleanly). Only `carousel` and `slide`
already exist in Aludra. The rest are import candidates, re-namespaced `imagewize/*` → `aludra/*`.

Triage (do **not** import all 27 blindly — some are hardcoded to a theme's look):

### Tier A — generic, high reuse → import & generalise first
`feature-cards`, `pricing-tiers`, `pricing`, `testimonial-grid`, `cta-columns`,
`icon-grid`, `trust-bar`, `feature-list-grid`, `faq`, `related-articles`, `related-links`,
`contact-section`, `two-column-card`, `content-image-text-card`, `multi-column-content`,
`expect-list`, `about`, `case-studies`.

### Tier B — theme/colour-specific → generalise before importing
`elayne-hero`, `page-heading-blue`, `cta-block-blue` (hardcoded "blue"),
`service-hero`, `service-intro`, `service-blocks`, `review-profiles`.
→ Replace hardcoded colours with `theme.json` preset references so they work across themes.

### Tier C — already present / superseded
`carousel`, `slide` (present); Nynaeve `faq` vs Aludra `faq-tabs` — decide whether to keep
both or converge on one.

**Import lands as v2.8.0** (minor bump — new features). Suggested order: do 3–4 Tier-A blocks
end-to-end (block.json → edit.js → save/render → four-pass) to establish the porting pattern,
then batch the rest.

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
- **Plugin readme:** `readme.txt` already wp.org-formatted (Stable tag 2.7.2).
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
| **2.8.0** | Import batch of native blocks from Nynaeve (Tier A) |
| **2.9.0** | Tier B generalised blocks + de/fr translations |
| **3.0.0** | Aviendha cycling/e-commerce blocks; possible namespace/back-compat cleanup |

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
3. **Faq convergence** — keep both Nynaeve `faq` and Elayne `faq-tabs`, or merge?
4. **Slick carousel** — keep (verify GPL-compat) or replace with a dependency-free carousel?
5. **Cycling sub-focus** — road / gravel / e-bike / MTB, or broad "cycling & outdoor"? Affects demo content and the specialised blocks.

## 12. Immediate next steps

- [ ] First commit of the renamed plugin (`imagewize/aludra`).
- [ ] Decide §11.1 (back-compat) and §11.2 (display name).
- [ ] Port 3–4 Tier-A blocks end-to-end to establish the pattern → tag **2.8.0**.
- [ ] Scaffold `~/code/aviendha` theme with its own plan.
