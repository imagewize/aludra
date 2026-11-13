# Patterns

Blocks are the raw components; **patterns** are what you actually build a page from. Both appear in the editor's Patterns tab as live previews of the real blocks.

**Section patterns** (`patterns/section-*.php`) — the single bands a page is made of, each pre-filled with plausible copy, the right style variation, and its layout host already in place. Grouped into the same categories as the blocks:

| Category | Sections |
| --- | --- |
| Heroes | Split Hero, Hero Banner |
| Proof | Stat Rail, Trust Bar, Client Reviews, Comparison Table, Testimonial Grid |
| Features & Services | Capability Cards, Services Grid, Feature List, Service Detail Cards, Before and After Icon Grids |
| Layout | About, Client Carousel, Split with Steps, Service Intro |
| Convert | Pricing Tiers, FAQ, CTA Banner, Contact, CTA Columns |

**Store patterns** (`aludra-store` category, only when WooCommerce is active) — Store Hero, Shop Categories, Newest Products, Store Story and Store Testimonials, plus a Store Homepage page pattern that assembles them with the Trust Bar, Stat Rail and CTA Banner.

Every content block is reachable as one of these. The two that are not — Mega Menu and Search Overlay Trigger — belong to a navigation template part rather than to a page; Mega Menu has its own eight template-part patterns below.

**Header and footer patterns** (`patterns/header-*.php`, `patterns/footer-*.php`) — offered under **Replace** when you select a theme's header or footer template part in the Site Editor, in any block theme. They paint with the theme's own palette and fonts, and switch layouts per screen size with WordPress's built-in per-viewport block visibility (WordPress 7.0+), so nothing extra loads.

| Pattern | What it holds | Responsive behaviour |
| --- | --- | --- |
| Header: Mega Menu | Logo, navigation with a full-width Mega Menu item, CTA button | CTA hidden on phones; the mega menu opens inside the mobile overlay |
| Header: Search and Social | Dark bar (Invert scheme): title, navigation, social icons, Search Overlay Trigger | Social icons hidden on phones and tablets |
| Header: Store | Top offer bar, logo, navigation, account, mini cart (WooCommerce only) | Top bar's contact line hidden on phones |
| Footer: Link Columns | Dark footer, four headed link columns, bottom bar | Columns stack on phones |
| Footer: Call to Action | CTA Banner above a compact footer with tagline and navigation | — |

The Mega Menu item ships without a template part selected: pick one in its block settings (see the mega-menu patterns below to create it). Any header or footer can be switched dark or tinted with the **Section colours** control on its group.

**Page patterns** (`patterns/page-*.php`) — eight full layouts assembled from those sections, offered when you create a new page:

| Page | Composition |
| --- | --- |
| Homepage | Split hero, about, client carousel, CTA, pricing, services, reviews, FAQ |
| Landing | Split hero, stat rail, capabilities, pricing, reviews, FAQ, CTA |
| Service | Hero, trust bar, capabilities, why-us, pricing, FAQ, CTA |
| Services Overview | Hero, trust bar, intro, services grid, capabilities, FAQ, CTA |
| Pricing | Hero, pricing tiers, what's included, FAQ, CTA |
| About | Hero, trust bar, studio story, capabilities, client types, reviews, CTA |
| Team | Hero, trust bar, studio story, the people, how we work, CTA |
| Contact | Contact details + Contact Form 7 card |

**Carousel patterns** — five pre-configured carousel setups (hero, testimonials, product gallery, portfolio, team), plus eight **mega menu patterns** for building menu template parts.
