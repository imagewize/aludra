# Aludra Palette Contract

Every theme that hosts Aludra blocks **must define the 13 color slugs below** in its
`theme.json` palette (and in every style variation under `styles/`). Aludra block
stylesheets and patterns reference these slugs via `var(--wp--preset--color--<slug>)`
and `textColor`/`backgroundColor` attributes. A missing slug does not error — it
silently falls back to the hardcoded fallback color (blocks) or to inherited text
color (patterns), which is how off-palette colors leak into a page.

## Required slugs

| Slug | Role | Referenced by | Aviendha value |
|---|---|---|---|
| `base` | Page/section background (light) | blocks + patterns (most-used) | `#FAF7F2` |
| `tertiary` | Alternate section band, subtle surface | section backgrounds, cards | `#F0E9DD` |
| `border-light` | Hairline borders, dividers | cards, inputs, separators | `#E5DED2` |
| `contrast` | Primary text (near-black) | headings, body | `#211C1A` |
| `contrast-2` | Secondary/muted text | lead paragraphs, captions | `#57534E` |
| `main` | Dark brand tone | dark sections, dark text accents | `#2B1A20` |
| `primary` | Brand color — buttons, links, fills | 34 refs across blocks | `#9F1239` |
| `accent` | Second accent (green) | icon fills, highlights | `#4D7C0F` |
| `secondary` | Muted body text in blocks/patterns | hero-split lead, services, about, 11 pattern refs | `#57534E` |
| `main-accent` | Muted text on cards | feature-cards, icon-grid, service-* | `#78716C` |
| `primary-accent` | Pale tint of `primary` — card/badge **backgrounds** | feature-cards, icon-grid, services, testimonial-grid, cta-columns | `#FDE8EC` |
| `primary-dark` | Darker `primary` — hover states | cta-banner, hero-banner, contact-section | `#7F0F2E` |
| `white` | True white — text on dark/brand fills | cta-banner, review-profiles, patterns | `#FFFFFF` |

Notes:

- `secondary` intentionally duplicates `contrast-2` in Aviendha. Both must exist:
  block SCSS and the homepage pattern reference `secondary`; theme-level styles use
  `contrast-2`.
- `primary-accent` is a **background tint**, not a text color. It must stay legible
  as a surface under `contrast` text and must contrast with `base`. Never use it
  for text.
- `white` must be defined explicitly even though WP core's default palette currently
  emits a `white` preset despite `defaultPalette: false` — that is accidental
  behavior, not a contract.

## Optional slugs

These slugs are **optional**: Aludra references them only through a fallback chain
to a required slug, so themes that skip them lose nothing.

| Slug | Role | Used by | Fallback chain | Aviendha | Twilight |
|---|---|---|---|---|---|
| `terracotta` | Second warm accent — eyebrow/kicker text | hero-split eyebrow, icon-grid label | `terracotta → primary → #9f1239` | `#C2410C` | `#FB923C` |
| `sand-deep` | Deeper sand surface for section fades | (theme-side only) | — | `#D6C7AE` | `#3D3532` |

When referencing an optional slug in block SCSS, always chain through a required
slug: `var(--wp--preset--color--terracotta, var(--wp--preset--color--primary, #9f1239))`.

## Dark variations

Dark style variations (e.g. Aviendha `styles/twilight.json`) must redefine **all 13
slugs**, inverting roles, not values — e.g. `base` becomes the dark background,
`contrast` the light text, `primary-accent` a dark rose surface tint. Reference:

| Slug | Twilight value | | Slug | Twilight value |
|---|---|---|---|---|
| `base` | `#211C1A` | | `secondary` | `#C9C0B8` |
| `tertiary` | `#2B2422` | | `main-accent` | `#A8A29E` |
| `border-light` | `#3D3532` | | `primary-accent` | `#3B1F28` |
| `contrast` | `#FAF7F2` | | `primary-dark` | `#F43F5E` |
| `contrast-2` | `#C9C0B8` | | `white` | `#FFFFFF` |
| `main` | `#FDA4AF` | | `accent` | `#84CC16` |
| `primary` | `#FB7185` | | | |

## Fallback policy

Since Aludra 2.17.0 every `var(--wp--preset--color--…)` reference in block SCSS
carries a **warm neutral fallback** matching Aviendha's values (e.g.
`var(--wp--preset--color--secondary, #57534e)`), so a theme that misses a slug
degrades to the Aviendha look instead of the legacy blue/cool-gray palette.
Hardcoded accent colors (shadows, glows, focus rings) use burgundy-based
`rgba(159, 18, 57, …)`.

Rules for new/edited block styles:

1. Never introduce a new slug without adding it to this contract and to every
   maintained theme (Aviendha `theme.json` + `styles/*.json`).
2. Every `var(--wp--preset--color--<slug>)` gets a fallback matching the
   Aviendha value from the table above.
3. No raw cool grays or blues (`#6b7280`, `#555`, `#017cb6`, …) — use the slug
   vars with warm fallbacks.

## History

- **2026-07:** Contract formalized. Aviendha 1.0.0 added the five slugs it was
  missing (`secondary`, `main-accent`, `primary-accent`, `primary-dark`, `white`);
  Aludra 2.17.0 replaced all legacy blue/cool-gray fallbacks with warm ones.
  Background: `imagewize.com` repo, `docs/aviendha/COLOR-AND-HERO-REDESIGN.md`.
