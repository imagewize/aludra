<p align="center">
  <img src="assets/logos/g-flower.svg" alt="Aludra Logo" width="128" height="128">
</p>
<div align="center">
<h1>Aludra</h1>

[![Total Downloads](https://img.shields.io/packagist/dt/imagewize/aludra.svg)](https://packagist.org/packages/imagewize/aludra)
[![Latest Stable Version](https://img.shields.io/packagist/v/imagewize/aludra.svg)](https://packagist.org/packages/imagewize/aludra)
[![License](https://img.shields.io/packagist/l/imagewize/aludra.svg)](https://packagist.org/packages/imagewize/aludra)

Everything between the header and the footer.
</div>

## Description

Aludra builds the middle of the page. A theme gives you the palette, the type, the header and the footer; Aludra gives you what goes between them — **30 blocks and 35 patterns** for the bands a page is actually made of: heroes, stat rails, trust bars, feature grids, pricing tiers, comparison tables, FAQs, reviews, contact sections and CTA bands.

That holds whatever the site is for. The same sections build a portfolio, a services site, a one-page launch, or a straightforward online presence for a business — the bands are the same, the copy is not.

You rarely start from an empty block. You pick a **section** — a hero that already has its eyebrow, heading, lead and buttons, in the right style variation — drop it in, and replace the copy. Or you pick a whole **page pattern** and delete the parts you don't need. Everything is grouped into six categories (Heroes, Proof, Features & Services, Layout, Convert, Navigation) that follow the order a page gets built in, so both the block inserter and the Patterns tab read as a sequence rather than an inventory.

### Building a site with Aludra

The division above is the whole idea, and **[Aviendha](https://github.com/imagewize/aviendha)** is the theme built to that division — a starter FSE theme developed alongside this plugin, which ships no blocks or patterns of its own and composes its pages entirely from `aludra/*`:

```bash
composer require imagewize/aviendha imagewize/aludra
```

Then activate Aviendha, activate Aludra, and create a page — the eight page patterns are offered in the Site Editor's pattern picker, and the fourteen section patterns are in the inserter's Patterns tab.

**None of this is required.** Aludra is theme-neutral: blocks resolve colours from the active theme's palette with fallbacks, so they render correctly on **Elayne**, on **Ixian**, or on any other FSE, block, or classic theme. Blocks are individually enable/disable-able under Settings → Aludra.

> The plugin exists in the first place because WordPress.org Theme Review prohibits themes from registering custom blocks. Many blocks were originally ported from the **Nynaeve** theme's native block library, generalised for theme neutrality.

> **Lineage:** Aludra is the direct continuation of the [**Elayne Blocks**](https://github.com/imagewize/elayne-blocks) plugin (versions ≤ 2.7.1). It was renamed to a builder-themed name (Aludra — the inventor/engineer of the *dragons* in *The Wheel of Time*) and generalised into a shared library, since it now serves multiple themes rather than Elayne alone. See `CHANGELOG.md` for the migration notes.

## Included Blocks

- **About Section Block** (`aludra/about`) - Content section with heading, lead paragraph, offer list, and closing copy
- **Carousel Block** (`aludra/carousel`) - Responsive image/content carousel with Slick Carousel integration, thumbnails, and arrow customization
- **Comparison Table Block** (`aludra/comparison-table`) - Filterable spec-sheet comparison: a centred eyebrow/heading/lead, pill filters, and a bordered table with your column highlighted against up to three competitors; composed of Comparison Row and Comparison Cell children
- **Contact Section Block** (`aludra/contact-section`) - Dark contact section with info column and Contact Form 7 form card
- **CTA Banner Block** (`aludra/cta-banner`) - Full-width call-to-action band with heading, lead text, and button
- **CTA Columns Block** (`aludra/cta-columns`) - Dual call-to-action cards with headings, descriptions, and buttons
- **FAQ Tab Answer Block** (`aludra/faq-tab-answer`) - Individual answer child block for FAQ Tabs
- **FAQ Tabs Block** (`aludra/faq-tabs`) - Interactive FAQ with vertical tab navigation and dynamic content display
- **Feature Cards Block** (`aludra/feature-cards`) - Responsive grid of feature highlight cards with icons
- **Feature List Grid Block** (`aludra/feature-list-grid`) - Two-column grid of features with checkmarks and hover effects
- **Hero Banner Block** (`aludra/hero-banner`) - Dark full-width hero with an eyebrow badge, heading, lead text, and dual CTA buttons
- **Hero Split Block** (`aludra/hero-split`) - Split-pane hero with heading, lead text, CTA button, and a desktop/mobile image pair
- **Icon Grid Block** (`aludra/icon-grid`) - Auto-fit grid of icon + text items with a section header
- **Load Waterfall Block** (`aludra/load-waterfall`) - Animated network load-time waterfall panel with an LCP marker, for hero sections
- **Mega Menu Block** (`aludra/mega-menu`) - Advanced navigation menu with mega menu functionality (works best with FSE/block themes)
- **Pricing Tiers Block** (`aludra/pricing-tiers`) - Three-column pricing comparison table with featured tier highlighting
- **Review Profiles Block** (`aludra/review-profiles`) - Heading plus a row of round avatar photos with client quotes
- **Search Overlay Trigger Block** (`aludra/search-overlay-trigger`) - Search icon that opens a full-screen search overlay
- **Service Detail Cards Block** (`aludra/service-blocks`) - Stacked, numbered service cards with a heading, description, and checklist
- **Service Intro Block** (`aludra/service-intro`) - Introductory text section for service pages with constrained-width editable paragraphs
- **Services Block** (`aludra/services-block`) - Section header with a two-per-row grid of icon, heading, and text service cards
- **Slide Block** (`aludra/slide`) - Individual carousel slides with InnerBlocks support
- **Spine Section Block** (`aludra/spine-section`) - Page section with a sticky label/heading column beside its content, collapsing to one column on narrow screens
- **Split Section Block** (`aludra/split-section`) - Page section with a centred header above two panes, media on one side and content on the other, collapsing to one column on narrow screens
- **Stat Item Block** (`aludra/stat-item`) - Single big-number stat with a caption, used inside Stat Rail; number and caption colours are set independently, and the number can render as a heading
- **Stat Rail Block** (`aludra/stat-rail`) - Full-width band of big-number stats, for the seam between a hero and the rest of the page, in a dark or light band style
- **Testimonial Grid Block** (`aludra/testimonial-grid`) - Customer testimonial grid with metrics, using Slick Carousel on larger sets
- **Trust Bar Block** (`aludra/trust-bar`) - Inline bar of trust-signal items that wraps on mobile

## Patterns

Blocks are the raw components; **patterns** are what you actually build a page from. Both appear in the editor's Patterns tab as live previews of the real blocks.

**Section patterns** (`patterns/section-*.php`) — the single bands a page is made of, each pre-filled with plausible copy, the right style variation, and its layout host already in place. Grouped into the same categories as the blocks:

| Category | Sections |
| --- | --- |
| Heroes | Split Hero, Hero Banner |
| Proof | Stat Rail, Trust Bar, Client Reviews |
| Features & Services | Capability Cards, Services Grid, Feature List |
| Layout | About, Client Carousel |
| Convert | Pricing Tiers, FAQ, CTA Banner, Contact |

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

## Requirements

- WordPress 6.9 or higher
- PHP 7.4 or higher
- Works with any WordPress theme (FSE, block, or classic)

## Installation

1. Upload the `aludra` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. The blocks will be available in the block editor

## Contributing

See `CONTRIBUTING.md` for development workflow and build instructions.

## License

GPL v3 or later - https://www.gnu.org/licenses/gpl-3.0.html

## Credits

- Based on blocks originally developed for the Imagewize block themes
- Feature Cards, Icon Grid, Trust Bar, Pricing Tiers, Testimonial Grid, CTA Columns, Feature List Grid, Contact Section, Hero Banner, About Section, Services Block, Review Profiles, CTA Banner, Service Intro, and Service Detail Cards blocks ported from the **Nynaeve** theme and generalised for theme neutrality
- Logo: [Lucide flower](https://blade-ui-kit.com/blade-icons/lucide-flower) icon via [Blade UI Kit](https://github.com/driesvints/blade-icons) (MIT License), drawn in a flat ember orange that holds up on both light and dark backgrounds. The earlier Forkawesome sun mark and the original "nightflower" mark — a nod to the fireworks ("Nightflowers") made by the Guild of Illuminators in *The Wheel of Time*, Aludra's namesake — remain in `assets/logos/` as alternates.
- Homepage pattern "Our Clients" carousel: the bike and noodle-bowl icons are [Tabler](https://blade-ui-kit.com/blade-icons/tabler-bike) and [Maki](https://blade-ui-kit.com/blade-icons/maki-restaurant-noodle) icons via [Blade UI Kit](https://blade-ui-kit.com/blade-icons) (MIT License). The five client-site mockups themselves live in `assets/clients/`.
- Mega Menu block originally inspired by [Human Made's HM Mega Menu Block](https://github.com/humanmade/hm-mega-menu-block) and substantially enhanced with multiple layout modes, advanced positioning, focus management, and accessibility features
- Carousel block originally inspired by the [Carousel Block Plugin](https://wordpress.org/plugins/carousel-block/) by Virgiliu Diaconu, but completely reimplemented using Slick Carousel with a different feature set, extensive customization options, and distinct functionality
- Built with `@wordpress/scripts`
- Uses [Slick Carousel](https://kenwheeler.github.io/slick/) library for carousel functionality

## Support

For issues and feature requests, please visit:
https://github.com/imagewize/aludra

## Author

Jasper Frumau - https://github.com/imagewize
