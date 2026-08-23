=== Aludra ===
Contributors: Rhand
Tags: patterns, page-builder, blocks, sections, gutenberg
Requires at least: 6.9
Tested up to: 7.1
Requires PHP: 7.4
Stable tag: 2.35.0
License: GPL v3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Everything between the header and the footer: 30 blocks and 35 patterns — heroes, stats, pricing, FAQs, CTAs. Works with any block theme.

== Description ==

Aludra builds the middle of the page. A theme gives you the palette, the type, the header and the footer; Aludra gives you what goes between them — 30 blocks and 35 patterns for the bands a page is actually made of: heroes, stat rails, trust bars, feature grids, pricing tiers, comparison tables, FAQs, reviews, contact sections and CTA bands.

That holds whatever the site is for. The same sections build a portfolio, a services site, a one-page launch, or a straightforward online presence for a business — the bands are the same, the copy is not.

You rarely start from an empty block. You pick a section — a hero that already has its eyebrow, heading, lead and buttons, in the right style variation — drop it in and replace the copy. Or you pick a whole page pattern and delete the parts you do not need.

= What you get =

* **14 section patterns** — one page band each, grouped into Heroes, Proof, Features & Services, Layout and Convert
* **8 page patterns** — homepage, landing, service, services overview, pricing, about, team and contact, offered when you create a new page
* **30 blocks** — grouped into six inserter categories that follow the order a page gets built in, and individually enable/disable-able under Settings → Aludra
* **13 more patterns** — five pre-configured carousels and eight mega menu layouts for menu template parts

= Building a site with Aludra =

That division is the whole idea, and **Aviendha** (https://github.com/imagewize/aviendha) is the theme built to it — a starter FSE theme developed alongside this plugin that ships no blocks or patterns of its own and composes its pages entirely from Aludra sections.

None of that is required. Aludra is theme-neutral — blocks resolve colours from the active theme's palette with fallbacks, so they render correctly on any FSE, block, or classic theme.

= Blocks Included =

**Mega Menu Block**
* Create dropdown mega menus with rich content
* Can only be placed inside a core/navigation block
* Uses WordPress Interactivity API for frontend state management
* Features click/keyboard navigation, outside-click dismissal, and focus management
* Supports template part integration for complex menu layouts
* Server-side rendering for dynamic content

**Carousel Block**
* Build beautiful, responsive image and content carousels
* Powered by Slick Carousel library (1.8.1)
* Parent block that only accepts Slide blocks as children
* Assets loaded conditionally only when carousel is present on page
* Fully customizable carousel settings

**Slide Block**
* Individual slides for use within Carousel blocks
* Uses InnerBlocks to accept any block content
* Can only exist inside Carousel parent (enforced via parent constraint)
* Flexible content options - images, text, buttons, or any WordPress blocks

**FAQ Tabs Block**
* Interactive FAQ section with vertical tab navigation and dynamic content display
* Inline-editable questions via RichText, responsive mobile accordion layout
* Three display modes: tabs (desktop tabs / mobile accordion), accordion (stacked everywhere), and native (real <details>/<summary> elements — no JavaScript, and browser find-in-page can expand a closed answer)
* Parent of the FAQ Tab Answer block

**FAQ Tab Answer Block**
* Individual answer child block for FAQ Tabs, with InnerBlocks for rich content
* Editable question (tab label) and answer title
* Only valid inside the FAQ Tabs block

**Search Overlay Trigger Block**
* Search icon that opens a full-screen search overlay with smooth animations
* Customizable overlay, search-bar, and close-button colors
* Auto-focus, body scroll lock, and multiple close methods (X, backdrop, Escape)

**Feature Cards Block**
* Responsive grid of feature highlight cards with SVG icons and a section header
* Icons resolved via the reusable aludra/icon binding
* Theme color presets with fallbacks, so it renders correctly on any theme

**Icon Grid Block**
* Auto-fit grid of icon + text items with an eyebrow, title, and lead
* Icons resolved via the aludra/icon binding
* Theme color presets with fallbacks

**Trust Bar Block**
* Inline bar of trust-signal items (icon + text) that wraps on mobile
* Icons resolved via the aludra/icon binding
* Theme color presets with fallbacks

**Pricing Tiers Block**
* Three-column pricing comparison table with featured tier highlighting
* Built from InnerBlocks so every price, feature, and button is fully editable
* Two styles: separate cards (default) or a single bordered spec sheet split by internal hairlines, with the featured tier marked by a thin accent bar

**Testimonial Grid Block**
* Grid of customer testimonials with metrics
* Automatically becomes a Slick Carousel on larger sets (4+ cards on desktop, 2+ on mobile), otherwise renders as a static grid
* Shares the same Slick Carousel assets as the Carousel block — no duplicate library loaded

**CTA Columns Block**
* Dual call-to-action cards with headings, descriptions, and buttons
* Color variant control via the block inspector
* Optional "Reveal on scroll" entrance animation, fading and sliding the section into view

**Feature List Grid Block**
* Two-column grid of features with checkmarks and hover effects

**Contact Section Block**
* Dark contact section with an intro, a two-column info/details grid, and a Contact Form 7 form card
* Contact details (email, response time, location) rendered via the aludra/icon binding
* Theme color presets with fallbacks, so it renders correctly on any theme

**Hero Banner Block**
* Dark full-width hero with an eyebrow badge, heading, lead text, and dual CTA buttons
* Theme color presets with fallbacks, so it renders correctly on any theme

**Load Waterfall Block**
* Animated network load-time waterfall panel with an LCP marker, for hero sections that need to show off site speed
* Site URL, badge, row labels, and the LCP label are editable via RichText; row timing/positions are fixed to match the reference design
* Respects prefers-reduced-motion

**Stat Rail Block**
* Full-width band of big-number stats with captions, for the seam between a hero and the rest of the page
* Equal-width columns via CSS grid, so the layout isn't locked to a fixed item count
* Dark band by default, with a "Light band" style for light-ground themes — both draw their colors from the active palette
* Built from InnerBlocks — add or remove stat items freely; parent of the Stat Item block

**Stat Item Block**
* Single big-number stat with a caption, used inside Stat Rail
* Optional "highlight" toggle to render the number in the theme's accent color
* Number and caption colors set independently from the theme palette, or a custom value
* The number can render as a heading (H1-H6) where the rail is a real section of the page, or as plain text (the default)
* Only valid inside the Stat Rail block

**Spine Section Block**
* Page section with a sticky label/heading/aside column on the left and its content on the right
* Wraps any block as its content — nested Aludra section blocks have their own page shell suppressed so both columns align
* Collapses to a single stacked column (sticky disabled) below 860px
* Optional tinted background, and a tunable sticky offset via the --aludra-spine-top custom property

= Key Features =

* **Theme Neutral** - Works with any WordPress theme; uses theme color presets with fallbacks
* **Performance Optimized** - Conditional asset loading (Slick Carousel only loads when needed)
* **WordPress Interactivity API** - Modern reactive frontend for mega menu
* **Parent-Child Relationships** - Carousel → Slide hierarchy enforced for better UX
* **Dynamic Block Discovery** - Automatically discovers and registers all blocks at runtime
* **Translation Ready** - Full internationalization support with text domain

= Technical Highlights =

* Follows WordPress block development best practices
* Each block has isolated dependencies for independent versioning
* Block metadata in block.json is single source of truth
* Build tooling via @wordpress/scripts (Webpack, Babel, etc.)
* Server-side rendering support (mega-menu)
* SVG and WebP upload support

= Requirements =

* WordPress 6.9 or higher
* PHP 7.4 or higher
* Works with any WordPress theme (FSE, block, or classic)

= Block Structure =

Each block follows standard WordPress block structure:
* `src/block.json` - Block metadata and configuration
* `src/index.js` - Registration entry point
* `src/edit.js` - React editor component
* `src/save.jsx` - Frontend output markup
* `src/view.js` - Frontend interactivity (optional)
* `src/render.php` - Server-side rendering (optional)
* `src/editor.scss` - Editor-only styles
* `src/style.scss` - Frontend + editor styles

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/aludra` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Blocks will be automatically available in the Gutenberg editor.
4. For Mega Menu: Place inside a Navigation block to use the mega menu functionality.
5. For Carousel: Add a Carousel block, then add Slide blocks inside it.

== Frequently Asked Questions ==

= Does this plugin work with any theme? =

Yes. Aludra is a theme-neutral block library and works with any WordPress theme — FSE, block, or classic. It is used across the Imagewize block themes (Elayne, Aviendha), and blocks reference theme color presets with fallbacks so they render correctly everywhere.

= How do I build the blocks from source? =

Each block has isolated dependencies and must be built separately:

```
cd blocks/carousel && npm install && npm run build
cd blocks/mega-menu && npm install && npm run build
cd blocks/slide && npm install && npm run build
```

For development mode with watch: `cd blocks/[block-name] && npm start`

= Are the build files included? =

Yes, the `build/` directories are committed to the repository for Packagist distribution, so users get working blocks without needing to run build commands.

= Can I customize the carousel settings? =

Yes, the carousel block uses Slick Carousel which is highly customizable. You can extend the block to add additional Slick settings through the block attributes.

= Does the Mega Menu work with keyboard navigation? =

Yes, the mega menu block includes full keyboard navigation support, outside-click dismissal, and proper focus management for accessibility.

= What is the WordPress Interactivity API? =

It's WordPress's official frontend reactivity system. The mega menu block uses it for modern, reactive user interactions without heavy JavaScript frameworks.

== Screenshots ==

1. Carousel block with multiple slides in the editor
2. Mega menu block configuration panel
3. Slide block with InnerBlocks content
4. Frontend carousel display
5. Mega menu dropdown with rich content

== Changelog ==

= 2.35.0 =
* Added: Fourteen section patterns — the single bands a page is built from (split hero, hero banner, stat rail, trust bar, reviews, capability cards, services grid, feature list, about, client carousel, pricing, FAQ, CTA banner, contact), each pre-filled with plausible copy and the right style variation. Previously the smallest unit available was an empty block; these are finished sections, extracted verbatim from the markup already shipping in the four page patterns
* Added: Section patterns are grouped into pattern categories mirroring the block categories — Heroes, Proof, Features & Services, Layout, Convert — so a section sits under the same heading as the block it is built from, and the inserter renders each as a live preview
* Changed: The "aludra" pattern category, which held carousel demos and whole page layouts together, is split into "Aludra: Full Pages" and "Aludra: Carousels"
* Changed: Page and section patterns are registered by one loader reading Categories and Block Types from each file's own header. Only page patterns declare core/post-content, so section patterns no longer risk crowding the new-page pattern picker
* Added: Four more page patterns — landing, services overview, pricing and team. Eight full pages now cover the layouts a service business actually needs, each assembled from the section patterns rather than authored fresh
* Changed: README, readme.txt and the plugin header now lead with the division of labour rather than "a shared custom block library" — a theme gives you the palette, type, header and footer; Aludra gives you everything between them. Deliberately silent on what kind of site that is, and defined as "blocks and patterns" rather than as sections. Aviendha is named as the companion starter theme it is built against, and the tags updated to match how people search for this
* Changed: The single "Aludra" block category is split into six — Heroes, Proof, Features & Services, Layout, Convert, and Navigation. At thirty blocks one category had become its own haystack. They are registered in the order a page gets built rather than alphabetically, so the inserter panel reads as a sequence rather than an inventory
* Changed: Settings → Aludra groups its block cards by those same six categories, replacing a second unrelated taxonomy that put 21 of the 30 blocks in one bucket and matched nothing shown in the editor
* Changed: No block markup, styles, or attributes changed — existing content is untouched

= 2.34.0 =
* Added: A "Light" style for CTA Banner — the same banner on a white ground with Tertiary background and Contrast text, for themes whose pages are light throughout. The button stays keyed to Primary Alt/Main directly in both styles, since it reads as an accent against either ground. The dark banner is unchanged and remains the default
* Changed: CTA Banner's background/text colours route through custom properties declared once on the block, so a style variation is a palette swap rather than a second copy of the layout. The rendered dark banner is identical to 2.33.0 and existing content needs no deprecation

= 2.33.0 =
* Added: A "Light" style for Contact Section — the same section on a white ground with Contrast headings, Secondary body/label copy, and a white form card bordered in Border Light, for themes whose pages are white and near-white throughout. The decorative background glows are dropped on this style rather than reused, since they read as atmospheric lighting against a dark ground but as a muddy tint against a light one. The dark section is unchanged and remains the default
* Changed: Contact Section's colours route through custom properties declared once on the block, so a style variation is a palette swap rather than a second copy of the layout. The rendered dark section is identical to 2.32.1 and existing content needs no deprecation

= 2.32.1 =
* Added: A check-circle icon (`icon-check-circle.svg`), matching `icon-x-circle.svg`'s style — a stroke-based outline check mark in a circle, for "yes"/"included" markers alongside the existing "no"/"excluded" one

Older entries are trimmed to keep this section within the 5000-character
limit WordPress.org enforces. The complete history is in CHANGELOG.md:
https://github.com/imagewize/aludra/blob/main/CHANGELOG.md

== Upgrade Notice ==

= 2.4.1 =
Simplified mega menu layout modes to dropdown and overlay only. Improved dropdown width handling and mobile positioning. Breaking change: sidebar and grid modes removed.

= 2.4.0 =
Major mega menu enhancements with multiple layout modes, template part integration, animations, and improved positioning. Breaking change: mega menu now requires theme integration for template part area registration. See documentation.

= 2.3.1 =
Documentation cleanup only. No functional changes.

= 2.3.0 =
Major carousel enhancements with new navigation modes, arrow customization, and block patterns. Testing complete.

= 2.2.2 =
Important WordPress.org compliance fixes including consistent text domains and security improvements. Recommended update for all users.

= 2.2.1 =
Adds WordPress.org distribution infrastructure. No functional changes to blocks.

= 2.2.0 =
Initial public release with three custom blocks optimized for the Aludra theme.

== Third-Party Libraries ==

= Slick Carousel =
* Version: 1.8.1
* License: MIT License
* Source: https://kenwheeler.github.io/slick/
* Used in: Carousel block
* Files: blocks/carousel/slick/
* Purpose: Powers the carousel/slider functionality

The MIT License is GPL-compatible.

== Credits ==

= Plugin Icon =
The plugin icon is based on IconPark Block One from Blade UI Kit.
* Source: https://blade-ui-kit.com/blade-icons/iconpark-blockone-o
* License: MIT License

= Homepage Pattern Client Icons =
The bike and noodle-bowl icons used in the homepage pattern's "Our Clients" carousel are from Blade UI Kit (Blade Icons), sourced from the Tabler Icons and Maki Icons sets respectively.
* Bike icon source: https://blade-ui-kit.com/blade-icons/tabler-bike
* Restaurant icon source: https://blade-ui-kit.com/blade-icons/maki-restaurant-noodle
* Blade Icons license: https://github.com/driesvints/blade-icons/blob/main/LICENSE.md (MIT License)

= Review Avatar Placeholder =
The bundled review-avatar placeholder (assets/placeholders/avatar.svg) is the eos-face icon from Blade UI Kit (Blade Icons), sourced from the EOS Icons set and recoloured into Aludra's warm sand/terracotta neutrals.
* Face icon source: https://blade-ui-kit.com/blade-icons/eos-face
* Blade Icons license: https://github.com/driesvints/blade-icons/blob/main/LICENSE.md (MIT License)

= README Logo =
The Aludra logo displayed in README.md (assets/logos/g-flower.svg) is the Lucide flower icon from Blade UI Kit (Blade Icons), drawn in a flat ember orange (#D9480F) that reads on both light and dark backgrounds. The earlier Forkawesome sun mark and the "nightflower" mark colourways remain in assets/logos/ as alternates.
* Flower icon source: https://blade-ui-kit.com/blade-icons/lucide-flower
* Blade Icons license: https://github.com/driesvints/blade-icons/blob/main/LICENSE.md (MIT License)

= Mega Menu Implementation =
The mega menu block was originally inspired by the HM Mega Menu Block by Human Made and substantially enhanced.
* Original Source: https://github.com/humanmade/hm-mega-menu-block
* License: GPL v2 or later
* Enhancements: Added multiple layout modes (dropdown/overlay), advanced JavaScript-based positioning for full-width panels, mobile responsive state management, comprehensive focus trap and keyboard navigation, body scroll lock, animation controls, and extensive accessibility improvements. The implementation is approximately 181% larger with substantially different functionality.

= Carousel Block Implementation =
The carousel block was originally inspired by the Carousel Block Plugin by Virgiliu Diaconu but completely reimplemented.
* Original Source: https://wordpress.org/plugins/carousel-block/
* License: GPL v2 or later
* Reimplementation: Completely rebuilt using Slick Carousel library (vs original Swiper.js), with distinct features including thumbnail navigation, center mode with peek, variable width slides, lazy loading, adaptive height, advanced arrow customization with multiple SVG styles, custom SVG support, 5 block patterns, and extensive styling controls. Different codebase and functionality from the original.

== Developer Information ==

= Block Registration =

The plugin uses dynamic block discovery. At runtime:
1. Scans `/blocks` directory during `init` action
2. Looks for `build/block.json` in each subdirectory
3. Auto-registers all discovered blocks via `register_block_type()`

This means blocks are auto-discovered - no manual registration needed when adding new blocks.

= GitHub Repository =

* Repository: https://github.com/imagewize/aludra
* Issues: https://github.com/imagewize/aludra/issues
* Documentation: See CLAUDE.md in repository for detailed development guide

== Copyright ==

Aludra WordPress Plugin, Copyright 2025 Jasper Frumau
Aludra is distributed under the terms of the GNU GPL v3 or later.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
