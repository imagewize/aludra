<p align="center">
  <img src="assets/logos/f-sun.svg" alt="Aludra Logo" width="128" height="128">
</p>
<div align="center">
<h1>Aludra</h1>

Custom WordPress blocks that work with any theme.
</div>

## Description

Aludra is a WordPress plugin that provides custom Gutenberg blocks. It is a theme-neutral shared block library used across the Imagewize block themes — **Elayne** and the **Aviendha** e-commerce theme — but **the blocks work with any WordPress theme**: FSE (Full Site Editing) themes, block themes, or classic themes. (Many blocks were originally ported from the **Nynaeve** theme's native block library, but Nynaeve itself doesn't install Aludra — see `docs/PLAN-OF-ACTION.md`.)

This plugin was created to align with WordPress.org Theme Review requirements, which prohibit custom block registration in themes. The blocks are theme-agnostic and can be used in any WordPress site.

> **Lineage:** Aludra is the direct continuation of the [**Elayne Blocks**](https://github.com/imagewize/elayne-blocks) plugin (versions ≤ 2.7.1). It was renamed to a builder-themed name (Aludra — the inventor/engineer of the *dragons* in *The Wheel of Time*) and generalised into a shared library, since it now serves multiple themes rather than Elayne alone. See `CHANGELOG.md` for the migration notes.

## Included Blocks

- **About Section Block** (`aludra/about`) - Content section with heading, lead paragraph, offer list, and closing copy
- **Carousel Block** (`aludra/carousel`) - Responsive image/content carousel with Slick Carousel integration, thumbnails, and arrow customization
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
- **Stat Item Block** (`aludra/stat-item`) - Single big-number stat with a caption, used inside Stat Rail
- **Stat Rail Block** (`aludra/stat-rail`) - Full-width band of big-number stats, for the seam between a hero and the rest of the page
- **Testimonial Grid Block** (`aludra/testimonial-grid`) - Customer testimonial grid with metrics, using Slick Carousel on larger sets
- **Trust Bar Block** (`aludra/trust-bar`) - Inline bar of trust-signal items that wraps on mobile

Also included: three full **page patterns** that assemble these blocks into ready-made layouts, all available when creating a new page — a **homepage** (`patterns/page-homepage.php`, agency/service-business), a **service page** (`patterns/page-service.php`, hero + trust bar + capabilities + pricing + FAQ + CTA), and a **contact page** (`patterns/page-contact.php`, contact details + Contact Form 7 card).

See [docs/BLOCKS.md](docs/BLOCKS.md) for full feature details on every block.

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
- Logo: [Forkawesome sun](https://blade-ui-kit.com/blade-icons/forkawesome-sun) icon via [Blade UI Kit](https://github.com/driesvints/blade-icons) (MIT License), recoloured with Aludra's ember gradient. The earlier original "nightflower" mark — a nod to the fireworks ("Nightflowers") made by the Guild of Illuminators in *The Wheel of Time*, Aludra's namesake — remains in `assets/logos/` as alternate colourways.
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
