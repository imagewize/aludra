# Aludra Block Consolidation and Renaming Proposal

*Last updated: 2026-07-14*  
*Status: Draft for review*  
*Related: See [PLAN-OF-ACTION.md](./PLAN-OF-ACTION.md) for import strategy*

---

## Overview

This document proposes **merger, renaming, and consolidation opportunities** for the current Aludra block library (15 blocks as of v2.10.0) to:

1. **Eliminate functional duplicates** — blocks that solve the same user need
2. **Clarify naming** — make purpose immediately obvious from the block name
3. **Reduce maintenance burden** — fewer blocks with more flexible configuration
4. **Improve discoverability** — consistent, intuitive naming conventions

---

## Current Block Inventory (v2.10.0)

| Block Name | Namespace | Category | Description |
|------------|-----------|----------|-------------|
| Carousel | `aludra/carousel` | design | Customizable slideshow container |
| Slide | `aludra/slide` | design | Child slide for Carousel |
| FAQ Tabs | `aludra/faq-tabs` | widgets | Interactive FAQ with vertical navigation |
| FAQ Tab Answer | `aludra/faq-tab-answer` | widgets | Child answer for FAQ Tabs |
| Mega Menu | `aludra/mega-menu` | design | Dynamic dropdown/overlay navigation |
| Search Overlay Trigger | `aludra/search-overlay-trigger` | widgets | Icon triggering full-screen search |
| Feature Cards | `aludra/feature-cards` | design | Responsive grid of feature cards with icons |
| Icon Grid | `aludra/icon-grid` | design | Auto-fit grid of icon + text items |
| Trust Bar | `aludra/trust-bar` | design | Inline bar of trust-signal items (icon + text) |
| Pricing Tiers | `aludra/pricing-tiers` | design | 3-column pricing comparison table |
| Testimonial Grid | `aludra/testimonial-grid` | design | 3-column testimonial grid **with carousel attributes** |
| CTA Columns | `aludra/cta-columns` | design | Dual call-to-action cards |
| Feature List Grid | `aludra/feature-list-grid` | design | 2-column grid with checkmarks and hover effects |
| Contact Section | `aludra/contact-section` | design | Dark contact section with CF7 form |
| Hero Banner | `aludra/hero-banner` | design | Dark full-width hero with eyebrow, heading, CTA buttons |

---

## Proposed Changes

### 1. Critical: Testimonial Grid vs Carousel Overlap

**Issue:** `testimonial-grid` block.json includes **full carousel attributes** (`slidesToShow`, `slidesToScroll`, `arrows`, `dots`, `infinite`, `autoplay`, `autoplaySpeed`, `speed`, etc.). This creates:
- Code duplication with `aludra/carousel`
- Maintenance burden (two carousel implementations)
- User confusion (when to use Carousel vs Testimonial Grid)

**Proposed Solutions (choose one):**

| Option | Approach | Pros | Cons |
|--------|----------|------|------|
| **A. Remove carousel from Testimonial Grid** | Strip carousel attributes, make it a static grid only | Cleaner separation, single carousel source of truth | Loses carousel functionality for testimonials |
| **B. Make Testimonial Grid use Carousel internally** | Refactor to nest `aludra/slide` blocks inside, use Carousel's JS | DRY, consistent carousel behavior | Complex refactor, may break existing sites |
| **C. Deprecate Testimonial Grid, use Carousel + pattern** | Remove block, provide a "Testimonial Grid" pattern using Carousel + Slide | Maximally DRY, most flexible | Breaking change, migration needed |
| **D. Extract shared carousel logic** | Create a shared carousel utility, both blocks use it | Shared maintenance | Still two carousel implementations |

**Recommendation: Option A** (Remove carousel from Testimonial Grid)
- Rationale: Testimonial Grid should be a **static grid layout**. Users who need carousel behavior can use `aludra/carousel` with `aludra/slide` blocks containing testimonial content.
- Action: Remove carousel-related attributes from `testimonial-grid/block.json`, update edit/save/view.js to remove slider logic, keep only the grid layout CSS.
- Impact: **Breaking change** for sites using testimonial carousel features. Include in v3.0.0 with migration notes.

---

### 2. Feature Blocks Consolidation

**Issue:** Three similar feature-related blocks with overlapping use cases:
- `feature-cards` — grid of cards with icons, hover effects, section header
- `icon-grid` — auto-fit grid of icon + text items with eyebrow, title, lead
- `feature-list-grid` — 2-column grid with checkmarks and hover effects

All three essentially display **features/benefits** in different layouts. This creates:
- User confusion about which to choose
- Maintenance overhead for similar functionality
- Inconsistent styling patterns across blocks

**Proposed Solution:**

**Merge into a single `Feature Grid` block with layout modes:**

```
aludra/feature-grid
├── Layout options:
│   ├── cards (current feature-cards)
│   ├── icons (current icon-grid)
│   └── checklist (current feature-list-grid)
├── Shared features:
│   ├── Section header (eyebrow, title, description)
│   ├── Icon support
│   ├── Hover effects
│   ├── Color controls (background, text)
│   └── Spacing controls
└── Per-item customization
```

**Migration path:**
- Keep all three existing blocks but mark as deprecated
- New `aludra/feature-grid` block with layout selector
- Provide automatic migration in v3.0.0

**Alternative (less breaking):**
- Rename blocks to be more distinct:
  - `feature-cards` → keep (grid of rich cards)
  - `icon-grid` → `feature-icons` (simpler, icon-focused)
  - `feature-list-grid` → `feature-checklist` (2-col with checkmarks)
- Add shared utilities for common styling

**Recommendation:** Rename for clarity first, then consider merging in a future major version. The blocks serve distinct enough purposes to justify separate existence.

---

### 3. CTA Blocks Naming Clarification

**Issue:** CTA-related blocks have unclear distinctions:
- `cta-banner` — Full-width call-to-action band with heading, text, button (colors adapt to theme)
- `cta-columns` — Dual call-to-action cards with headings, descriptions, buttons
- `hero-banner` — Dark full-width hero with eyebrow, heading, lead text, **dual CTA buttons**

Problems:
- `cta-banner` and `hero-banner` both handle full-width CTA sections
- Naming doesn't clarify the difference in visual treatment
- `hero-banner` includes "CTA" functionality but is named as a hero

**Proposed Solution:**

| Current | Proposed | Rationale |
|---------|----------|-----------|
| `cta-banner` | `cta-band` | More accurate — it's a horizontal band, not a banner in the traditional sense |
| `cta-columns` | `cta-cards` | Better describes the visual treatment (cards, not just columns) |
| `hero-banner` | `hero-cta` or `cta-hero` | Clarifies it's a hero-style CTA, or keep as-is since "hero" is standard terminology |

**Alternative approach:**
- `cta-banner` → Keep name, update description to clarify it's a "full-width CTA strip"
- `cta-columns` → `cta-dual` or `cta-two-up` — emphasizes the two-column layout
- `hero-banner` → Keep, but add "with CTA buttons" to description

**Recommendation:** Keep current names but **improve descriptions** to clarify the difference:
- `cta-banner`: "Full-width horizontal call-to-action strip" 
- `cta-columns`: "Side-by-side call-to-action cards"
- `hero-banner`: "Full-width hero section with call-to-action buttons"

This is the least disruptive while improving clarity.

---

### 4. Pricing Tiers Title Cleanup

**Issue:** Block title is `"Pricing Tiers (3 Column)"` — parentheses in block titles are unusual and the column count is an implementation detail, not a user-facing feature.

**Proposed Solution:**
- Change title to: `"Pricing Tiers"`
- Add to description: "Display pricing options in a multi-column comparison layout (default: 3 columns)"
- This allows future flexibility (could support 2, 3, or 4 columns via configuration)

**Action:** Update `pricing-tiers/src/block.json` title field.

---

### 5. Trust Bar vs Icon Grid vs Feature List Grid Overlap

**Issue:** All three blocks deal with **horizontal/inline lists of items with icons + text**:
- `trust-bar` — "Inline bar of trust-signal items (icon + text) that wraps on mobile"
- `icon-grid` — "Responsive auto-fit grid of icon + text items"
- `feature-list-grid` — "2-column grid with checkmarks and hover effects"

The difference is primarily **layout orientation** (inline bar vs grid) and **styling** (trust signals vs features).

**Proposed Solution:**

**Option A: Merge into `Items Grid` with layout modes**
```
aludra/items-grid
├── Layout: inline (trust-bar) | grid (icon-grid) | two-column (feature-list-grid)
├── Style presets: trust, features, checklist
├── Shared: icon + text, hover effects, spacing
```

**Option B: Rename for clarity**
- `trust-bar` → keep (clear purpose: trust badges/logos)
- `icon-grid` → `icon-features` (for feature highlighting with icons)
- `feature-list-grid` → `checklist` (simpler, focuses on the checkmark style)

**Recommendation:** **Option B** — These blocks serve different semantic purposes:
- Trust Bar: Social proof/trust indicators (logos, badges, guarantees)
- Icon Grid: Visual feature highlights
- Feature List Grid: Text-heavy features with checkmarks

Renaming makes intent clearer without merging.

---

### 6. Search Overlay Trigger Naming

**Issue:** Name `"Search Overlay Trigger"` is accurate but verbose. The block is a simple icon button that opens a search overlay.

**Proposed Solution:**
- Rename to `"Search Trigger"` (shorter, still clear)
- Or keep current name for explicitness

**Recommendation:** Keep current name. The explicitness helps users understand exactly what the block does.

---

### 7. Contact Section Specificity

**Issue:** `contact-section` is named very specifically — it's a "Dark contact section with info column and Contact Form 7 form card." This creates:
- Overly specific for a general block library
- Dependency on CF7 plugin
- Limited reusability for non-CF7 contact forms

**Proposed Solution:**

**Option A: Generalize the block**
- Rename to `contact-section` or `contact-form-section`
- Make form type configurable: CF7, WPForms, Gravity Forms, or custom HTML
- Remove hardcoded CF7 dependency

**Option B: Keep as CF7-specific**
- Rename to `cf7-contact-section` to make dependency explicit
- Keep current functionality

**Recommendation:** **Option A** — Aludra should be theme/plugin-agnostic where possible. Generalize to support any form plugin or custom content, with CF7 as the default/preset.

---

## Summary Table of Proposed Changes

| Current Block | Issue | Proposed Action | Priority | Breaking? |
|---------------|-------|-----------------|----------|-----------|
| Testimonial Grid | Duplicate carousel logic | Remove carousel attributes, make static grid only | **High** | Yes (v3.0.0) |
| Feature Cards / Icon Grid / Feature List Grid | Overlapping purpose | Rename for clarity | Medium | No |
| CTA Banner / CTA Columns / Hero Banner | Unclear distinctions | Improve descriptions | Medium | No |
| Pricing Tiers | Title includes implementation detail | Rename title to "Pricing Tiers" | Low | No |
| Trust Bar / Icon Grid / Feature List Grid | Similar item display | Rename for semantic clarity | Medium | No |
| Contact Section | CF7 dependency, too specific | Generalize to support any form | Medium | Yes (v3.0.0) |

---

## Implementation Roadmap

### Phase 1: Non-Breaking Improvements (v2.11.0)
These can be done immediately without affecting existing sites:

1. **Update Pricing Tiers title** — Remove "(3 Column)" from block title
2. **Improve CTA block descriptions** — Clarify the difference between cta-banner, cta-columns, hero-banner
3. **Update block keywords** — Add more descriptive keywords to help with discoverability

### Phase 2: Breaking Changes (v3.0.0)
These require major version bump and migration notes:

1. **Testimonial Grid refactor** — Remove carousel attributes, make static grid
   - Provide migration guide for users who need carousel functionality
   - Recommend using `aludra/carousel` + `aludra/slide` for carousel testimonials

2. **Contact Section generalization** — Remove CF7 dependency
   - Add form type selector
   - Maintain CF7 as default for backward compatibility

3. **Feature blocks renaming** (optional for v3.0.0):
   - `icon-grid` → `feature-icons`
   - `feature-list-grid` → `feature-checklist`

### Phase 3: Future Consideration (v4.0.0+)

1. **Merge feature-related blocks** into a single `feature-grid` with layout options
2. **Merge item display blocks** (trust-bar, icon-grid, feature-list-grid) into `items-grid` with layout modes
3. **Consider block aliases** for backward compatibility if merging

---

## Migration Strategy

### For Testimonial Grid Users

**If you're using Testimonial Grid with carousel features:**

Before (v2.10.0):
```html
<!-- wp:aludra/testimonial-grid {"slidesToShow":2,"arrows":true,"dots":true,"autoplay":true} -->
<div class="wp-block-aludra-testimonial-grid">...</div>
<!-- /wp:aludra/testimonial-grid -->
```

After (v3.0.0+):
```html
<!-- wp:aludra/carousel {"slidesToShow":2,"arrows":true,"dots":true,"autoplay":true} -->
  <!-- wp:aludra/slide --><div class="wp-block-aludra-slide">Testimonial 1</div><!-- /wp:aludra/slide -->
  <!-- wp:aludra/slide --><div class="wp-block-aludra-slide">Testimonial 2</div><!-- /wp:aludra/slide -->
<!-- /wp:aludra/carousel -->
```

**If you're using Testimonial Grid as a static grid:**
No action needed — the block will continue to work with the same grid layout, just without carousel options.

### For Contact Section Users

**If you're using CF7:**
No action needed — CF7 will remain the default.

**If you want to use a different form plugin:**
In v3.0.0+, select your form plugin from the block settings panel.

---

## Naming Convention Guidelines

To prevent future confusion, adopt these conventions:

1. **Be specific about layout** — Prefer "Grid", "List", "Cards", "Columns" over generic terms
2. **Lead with purpose, not implementation** — "Pricing Tiers" not "3 Column Pricing"
3. **Use standard terminology** — "Hero", "CTA", "Testimonial" are widely understood
4. **Avoid plugin dependencies in names** — Don't reference CF7, WPForms, etc. in block names
5. **Keep it short** — 2-3 words maximum for block titles

---

## Open Questions

1. **Should Testimonial Grid carousel be removed or extracted?**
   - Remove entirely (Option A)?
   - Or extract shared carousel logic for both Carousel and Testimonial Grid to use (Option D)?

2. **How aggressive should merging be?**
   - Conservative: Only rename and clarify existing blocks
   - Moderate: Merge obviously overlapping blocks (testimonial + carousel)
   - Aggressive: Consolidate all similar blocks (feature blocks, item display blocks)

3. **Block deprecation policy?**
   - Should deprecated blocks remain registered with a deprecation notice?
   - Or should they be completely removed?
   - What's the support timeline for deprecated blocks?

4. **Should we add a "layout mode" pattern?**
   - Many blocks could benefit from shared layout utilities
   - Consider creating shared React components for common layout patterns

---

## Decision Log

| Date | Decision | Rationale |
|------|----------|-----------|
| 2026-07-14 | Document created | Initial analysis of v2.10.0 blocks |
| 2026-07-14 | Testimonial Grid identified as highest priority | Carousel duplication is clear technical debt |
| 2026-07-14 | Pricing vs Pricing Tiers resolved per PLAN-OF-ACTION.md | Skip `pricing`, keep `pricing-tiers` |
| 2026-07-14 | FAQ vs FAQ Tabs resolved per PLAN-OF-ACTION.md | Converge on `faq-tabs` with displayMode |

---

## Next Steps

1. **Review this document** — Get feedback from the team on proposed changes
2. **Prioritize** — Decide which changes to implement in v2.11.0 vs v3.0.0
3. **Implement non-breaking changes** — Start with description/keyword improvements
4. **Plan migration tools** — For breaking changes, create migration scripts or documentation
5. **Update PLAN-OF-ACTION.md** — Incorporate consolidation decisions into the roadmap

---

*This document is a living proposal. Update as decisions are made and new blocks are added.*
