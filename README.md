<p align="center">
  <img src="assets/logos/e-ember-gradient.svg" alt="Aludra Logo" width="128" height="128">
</p>
<div align="center">
<h1>Aludra</h1>

Custom WordPress blocks that work with any theme.
</div>

## Description

Aludra is a WordPress plugin that provides custom Gutenberg blocks. It is a theme-neutral shared block library used across the Imagewize block themes — **Nynaeve**, **Elayne**, and the **Aviendha** e-commerce theme — but **the blocks work with any WordPress theme**: FSE (Full Site Editing) themes, block themes, or classic themes.

This plugin was created to align with WordPress.org Theme Review requirements, which prohibit custom block registration in themes. The blocks are theme-agnostic and can be used in any WordPress site.

> **Lineage:** Aludra is the direct continuation of the [**Elayne Blocks**](https://github.com/imagewize/elayne-blocks) plugin (versions ≤ 2.7.1). It was renamed to a builder-themed name (Aludra — the inventor/engineer of the *dragons* in *The Wheel of Time*) and generalised into a shared library, since it now serves multiple themes rather than Elayne alone. See `CHANGELOG.md` for the migration notes.

## Included Blocks

- **Carousel Block** (`aludra/carousel`) - Responsive image/content carousel with Slick Carousel integration, thumbnails, and arrow customization
- **Contact Section Block** (`aludra/contact-section`) - Dark contact section with info column and Contact Form 7 form card
- **CTA Columns Block** (`aludra/cta-columns`) - Dual call-to-action cards with headings, descriptions, and buttons
- **FAQ Tab Answer Block** (`aludra/faq-tab-answer`) - Individual answer child block for FAQ Tabs
- **FAQ Tabs Block** (`aludra/faq-tabs`) - Interactive FAQ with vertical tab navigation and dynamic content display
- **Feature Cards Block** (`aludra/feature-cards`) - Responsive grid of feature highlight cards with icons
- **Feature List Grid Block** (`aludra/feature-list-grid`) - Two-column grid of features with checkmarks and hover effects
- **Hero Banner Block** (`aludra/hero-banner`) - Dark full-width hero with an eyebrow badge, heading, lead text, and dual CTA buttons
- **Icon Grid Block** (`aludra/icon-grid`) - Auto-fit grid of icon + text items with a section header
- **Mega Menu Block** (`aludra/mega-menu`) - Advanced navigation menu with mega menu functionality (works best with FSE/block themes)
- **Pricing Tiers Block** (`aludra/pricing-tiers`) - Three-column pricing comparison table with featured tier highlighting
- **Search Overlay Trigger Block** (`aludra/search-overlay-trigger`) - Search icon that opens a full-screen search overlay
- **Slide Block** (`aludra/slide`) - Individual carousel slides with InnerBlocks support
- **Testimonial Grid Block** (`aludra/testimonial-grid`) - Customer testimonial grid with metrics, using Slick Carousel on larger sets
- **Trust Bar Block** (`aludra/trust-bar`) - Inline bar of trust-signal items that wraps on mobile

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

## Block Details

### Mega Menu Block

Advanced navigation block with template part integration for creating dynamic mega menus.

**Features:**
- WordPress Interactivity API integration
- Template part support
- Responsive design
- Keyboard navigation support

### Carousel Block

Create responsive image/content carousels using Slick Carousel.

**Features:**
- Slick Carousel integration
- Thumbnail navigation (above/below/left/right)
- Center mode with configurable peek
- Variable width slides
- Lazy loading options
- Adaptive height support
- Arrow customization (SVG styles, backgrounds, sizes, custom SVG)
- Block patterns for common use cases
- Responsive breakpoints
- Touch/swipe support

### Contact Section Block

Dark contact section with info column and Contact Form 7 form card.

**Features:**
- Full-width dark background section
- Info column for contact details
- Contact Form 7 integration
- Responsive design

### Slide Block

Companion block for the Carousel block.

**Features:**
- InnerBlocks support for flexible content
- Works seamlessly with Carousel parent block

### FAQ Tabs Block

Interactive FAQ block with vertical tab navigation and dynamic content display.

**Features:**
- Vertical tab navigation with questions
- Dynamic content area showing answers
- Customizable button with configurable text and URL
- WordPress Interactivity API integration
- Editable questions, titles, and descriptions via block inspector
- Responsive design with flexible layout

### Search Overlay Trigger Block

A clickable search icon that opens a full-screen search overlay with smooth animations.

**Features:**
- Full-screen search overlay with backdrop blur
- Smooth fade-in/scale animations
- Auto-focus on search input when opened
- Multiple close methods (X button, backdrop click, Escape key)
- Body scroll lock when overlay active
- Responsive design optimized for mobile
- Vanilla JavaScript (no dependencies)
- ARIA labels and keyboard accessibility

### FAQ Tab Answer Block

Child block for individual FAQ answers, used inside the FAQ Tabs block.

**Features:**
- InnerBlocks support for rich answer content
- Editable question (tab label) and answer title
- Parent constraint (only valid inside the FAQ Tabs block)

### Feature Cards Block

Responsive grid of feature highlight cards with SVG icons and a section header.

**Features:**
- Auto-fit card grid with hover effects
- Icons resolved via the reusable `aludra/icon` binding
- Theme colour presets with sensible fallbacks (renders correctly on any theme)

### Icon Grid Block

Auto-fit grid of icon + text items with an eyebrow, title, and lead.

**Features:**
- Responsive auto-fit grid layout
- Icons resolved via the `aludra/icon` binding
- Theme colour presets with fallbacks

### Trust Bar Block

Inline bar of trust-signal items (icon + text) that wraps on mobile.

**Features:**
- Flex row of icon + label items
- Icons resolved via the `aludra/icon` binding
- Theme colour presets with fallbacks

### Pricing Tiers Block

Three-column pricing comparison table with featured tier highlighting.

**Features:**
- Built entirely from InnerBlocks — every price, feature line, and button is directly editable
- Featured (middle) tier visually raised with its own accent border
- Responsive: columns stack on mobile

### Testimonial Grid Block

Grid of customer testimonials with metrics.

**Features:**
- Automatically becomes a Slick Carousel on larger sets (4+ cards on desktop, 2+ on mobile); renders as a static grid otherwise
- Shares the Carousel block's vendored Slick Carousel assets — no duplicate library loaded when both blocks are used
- Arrow and dot styling configurable via the block inspector (colour, hover states, spacing)

### CTA Columns Block

Dual call-to-action cards with headings, descriptions, and buttons.

**Features:**
- Color variant control via the block inspector
- Built from InnerBlocks for full content flexibility

### Feature List Grid Block

Two-column grid of features with checkmarks and hover effects.

**Features:**
- Responsive two-column layout that stacks on mobile
- Hover effects on each feature item

### Hero Banner Block

Dark full-width hero with an eyebrow badge, heading, lead text, and dual CTA buttons.

**Features:**
- Full-width dark background hero section
- Eyebrow badge for category/tag
- Heading and lead text content
- Dual CTA buttons
- Responsive design

## License

GPL v3 or later - https://www.gnu.org/licenses/gpl-3.0.html

## Credits

- Based on blocks originally developed for the Imagewize block themes
- Feature Cards, Icon Grid, Trust Bar, Pricing Tiers, Testimonial Grid, CTA Columns, Feature List Grid, Contact Section, and Hero Banner blocks ported from the **Nynaeve** theme and generalised for theme neutrality
- Logo: original "nightflower" mark — a nod to the fireworks ("Nightflowers") made by the Guild of Illuminators in *The Wheel of Time*, Aludra's namesake. Alternate colourways live in `assets/logos/`.
- Mega Menu block originally inspired by [Human Made's HM Mega Menu Block](https://github.com/humanmade/hm-mega-menu-block) and substantially enhanced with multiple layout modes, advanced positioning, focus management, and accessibility features
- Carousel block originally inspired by the [Carousel Block Plugin](https://wordpress.org/plugins/carousel-block/) by Virgiliu Diaconu, but completely reimplemented using Slick Carousel with a different feature set, extensive customization options, and distinct functionality
- Built with `@wordpress/scripts`
- Uses [Slick Carousel](https://kenwheeler.github.io/slick/) library for carousel functionality

## Support

For issues and feature requests, please visit:
https://github.com/imagewize/aludra

## Author

Jasper Frumau - https://github.com/imagewize
