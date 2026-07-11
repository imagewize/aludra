<p align="center">
  <img src="assets/icon.svg" alt="Aludra Logo" width="128" height="128">
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

- **Mega Menu Block** (`aludra/mega-menu`) - Advanced navigation menu with mega menu functionality (works best with FSE/block themes)
- **Carousel Block** (`aludra/carousel`) - Responsive image/content carousel with Slick Carousel integration, thumbnails, and arrow customization
- **Slide Block** (`aludra/slide`) - Individual carousel slides with InnerBlocks support
- **FAQ Tabs Block** (`aludra/faq-tabs`) - Interactive FAQ with vertical tab navigation and dynamic content display
- **FAQ Tab Answer Block** (`aludra/faq-tab-answer`) - Individual answer child block for FAQ Tabs
- **Search Overlay Trigger Block** (`aludra/search-overlay-trigger`) - Search icon that opens a full-screen search overlay
- **Feature Cards Block** (`aludra/feature-cards`) - Responsive grid of feature highlight cards with icons
- **Icon Grid Block** (`aludra/icon-grid`) - Auto-fit grid of icon + text items with a section header
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

## License

GPL v3 or later - https://www.gnu.org/licenses/gpl-3.0.html

## Credits

- Based on blocks originally developed for the Imagewize block themes
- Feature Cards, Icon Grid, and Trust Bar blocks ported from the **Nynaeve** theme and generalised for theme neutrality
- Icon: [IconPark Block One](https://blade-ui-kit.com/blade-icons/iconpark-blockone-o) from [Blade UI Kit](https://blade-ui-kit.com/blade-icons)
- Mega Menu block originally inspired by [Human Made's HM Mega Menu Block](https://github.com/humanmade/hm-mega-menu-block) and substantially enhanced with multiple layout modes, advanced positioning, focus management, and accessibility features
- Carousel block originally inspired by the [Carousel Block Plugin](https://wordpress.org/plugins/carousel-block/) by Virgiliu Diaconu, but completely reimplemented using Slick Carousel with a different feature set, extensive customization options, and distinct functionality
- Built with `@wordpress/scripts`
- Uses [Slick Carousel](https://kenwheeler.github.io/slick/) library for carousel functionality

## Support

For issues and feature requests, please visit:
https://github.com/imagewize/aludra

## Author

Jasper Frumau - https://github.com/imagewize
