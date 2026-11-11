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
