=== Aludra ===
Contributors: rhand
Tags: patterns, page-builder, blocks, sections, landing-page
Requires at least: 6.9
Tested up to: 7.1
Requires PHP: 7.4
Stable tag: 2.38.3
License: GPL v3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

A page builder made of real blocks: 32 blocks and 42 patterns for everything between the header and the footer. Any block theme.

== Description ==

Aludra is a page builder for the WordPress block editor — not a separate editing app bolted on top of it. 32 native blocks, 21 ready-made sections and 8 whole page layouts, built and edited in the editor you already have. No shortcodes, no proprietary markup, and nothing that turns into a wall of broken tags the day you switch it off.

A theme gives you the palette, the type, the header and the footer; Aludra gives you everything between them — the bands a page is actually made of: heroes, stat rails, trust bars, feature grids, pricing tiers, comparison tables, FAQs, reviews, contact sections and CTA bands.

That holds whatever the site is for. The same sections build a portfolio, a services site, a one-page launch, or a straightforward online presence for a business — the bands are the same, the copy is not.

You rarely start from an empty block. You pick a section — a hero that already has its eyebrow, heading, lead and buttons, in the right style variation — drop it in and replace the copy. Or you pick a whole page pattern and delete the parts you do not need.

= What you get =

* **21 section patterns** — one page band each, grouped into Heroes, Proof, Features & Services, Layout and Convert. Every content block has one
* **8 page patterns** — homepage, landing, service, services overview, pricing, about, team and contact, offered when you create a new page
* **32 blocks** — grouped into six inserter categories that follow the order a page gets built in, and individually enable/disable-able under Settings → Aludra
* **13 more patterns** — five pre-configured carousels and eight mega menu layouts for menu template parts

= Building a site with Aludra =

That division is the whole idea, and **Aviendha** (https://github.com/imagewize/aviendha) is the theme built to it — a starter FSE theme developed alongside this plugin that ships no blocks or patterns of its own and composes its pages entirely from Aludra sections. **Ixian** (https://github.com/imagewize/ixian) is the opinionated sibling: forked from Aviendha, with finished page patterns for service businesses and SaaS, every one of them built from Aludra blocks.

None of that is required. Aludra is theme-neutral — blocks resolve colours from the active theme's palette with fallbacks, so they render correctly on any FSE, block, or classic theme.

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

= What blocks are included, and how are they built? =

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

**Key Features**

* **Theme Neutral** - Works with any WordPress theme; uses theme color presets with fallbacks
* **Performance Optimized** - Conditional asset loading (Slick Carousel only loads when needed)
* **WordPress Interactivity API** - Modern reactive frontend for mega menu
* **Parent-Child Relationships** - Carousel → Slide hierarchy enforced for better UX
* **Dynamic Block Discovery** - Automatically discovers and registers all blocks at runtime
* **Translation Ready** - Full internationalization support with text domain

**Technical Highlights**

* Follows WordPress block development best practices
* Each block has isolated dependencies for independent versioning
* Block metadata in block.json is single source of truth
* Build tooling via @wordpress/scripts (Webpack, Babel, etc.)
* Server-side rendering support (mega-menu)

**Requirements**

* WordPress 6.9 or higher
* PHP 7.4 or higher
* Works with any WordPress theme (FSE, block, or classic)

**Block Structure**

Each block follows standard WordPress block structure:
* `src/block.json` - Block metadata and configuration
* `src/index.js` - Registration entry point
* `src/edit.js` - React editor component
* `src/save.jsx` - Frontend output markup
* `src/view.js` - Frontend interactivity (optional)
* `src/render.php` - Server-side rendering (optional)
* `src/editor.scss` - Editor-only styles
* `src/style.scss` - Frontend + editor styles

== Screenshots ==

1. Hero Split section with a Stat Rail directly beneath it
2. Pricing Tiers section — three plans with the featured tier highlighted
3. Services section — numbered, icon-led service rows beside a sticky heading
4. Client reviews section — three testimonial cards
5. FAQ section with the first answer expanded

== Changelog ==

= 2.38.3 =
* Fixed: a stray hidden file no longer ships in the zip, as WordPress.org requires
* Fixed: the translation template now covers all translatable strings, and the Dutch translation file is repaired

= 2.38.2 =
* Added: WordPress.org directory assets — plugin icon and banners
* Changed: new fireworks logo and plugin icon, a nod to the Nightflowers of The Wheel of Time; credits updated

= 2.38.1 =
* Removed: the SVG and WebP upload filter. Core has handled WebP since 5.8, and enabling SVG uploads site-wide without sanitization was a security risk
* Changed: the carousel patterns, team pattern and two mega menu patterns now use bundled SVG placeholder images instead of linking to external image hosts
* Fixed: the Hero Carousel and Portfolio Showcase patterns no longer trigger a block-validation (deprecation migration) notice in the editor
* Changed: the carousel patterns now live in `patterns/carousel-*.php` like the other patterns; slugs and titles are unchanged

= 2.38.0 =
* Added: store patterns for WooCommerce sites — a store hero, shop categories, newest products, a brand story, star-rated testimonials and a full store homepage. They appear in their own "Aludra: Store" category, and only when WooCommerce is active.
* Fixed: text contrast in dark style variations (store patterns, CTA banner button, night hero accents, stat rail highlight), and the Testimonial Grid layout with three cards on wide screens.
* Fixed: five mega menu patterns and the About page pattern no longer trigger block-validation warnings on WordPress 7.1.

= 2.37.5 =
* Fixed: a Carousel or Testimonial Grid that came from a pattern, template or template part rather than being saved in the page itself showed as an unstyled, non-sliding list.

= 2.37.4 =
* Fixed: a Split Section or CTA Columns block with Reveal on Scroll turned on stayed invisible when it came from a pattern, template or template part rather than being saved in the page itself.

= 2.37.3 =
* Fixed: a Carousel in rail mode inside a Spine Section or Split Section stuck out past the edge of the screen on laptop and tablet widths, giving the whole page a horizontal scrollbar.

= 2.37.2 =
* Fixed: Spine Section, Split Section, and Comparison Table used a different gutter token than the rest of the section blocks, leaving their content edges misaligned with neighbouring sections between roughly 768px and 1366px.

= 2.37.1 =
* Fixed: CTA Columns block (`aludra/cta-columns`) — the "Light Gray" background option had no matching CSS rule, so selecting it had no visible effect on the frontend.

= 2.37.0 =
* Added: Photo Grid block (`aludra/photo-grid`) — heading, follow line, and a tight square photo grid for an Instagram-style feed section. Fully static and theme-neutral: authors drop in their own photos via `core/image`, no API key or live connection to maintain.
* Added: Instagram Embed block (`aludra/instagram-embed`) — a live feed of a public Instagram profile via Instagram's own public embed iframe (`instagram.com/username/embed`). No developer app or API key needed, unlike the official oEmbed route Meta locked down in October 2020. The rendered markup ships only a "Load Instagram feed" button and a profile-link fallback; the iframe itself is only injected client-side after a visitor clicks it, so nothing loads from instagram.com — and no consent question is raised — until they opt in. This is an unofficial, undocumented endpoint: it could change or stop working without notice, so keep a plain profile link as a fallback.
* Fixed: Settings → Aludra no longer silently disables blocks introduced by an update. The screen read the saved `aludra_enabled` option without merging in the defaults, so a block added after you last saved that screen showed up unchecked — and because saving writes "off" for every box not submitted, toggling one unrelated block then disabled those blocks for real, removing them from the inserter. Block registration always read a missing entry as enabled, so only the admin screen was affected; if this caught you, just re-enable them there.

= 2.36.3 =
* Security: Bumped the `@imwz/wp-pattern-sentinel` dev dependency to 1.1.1, which pulls in a `js-yaml` fix for GHSA-5p4m-2wfm-xmqj, a quadratic CPU consumption (DoS) bug in `!!omap` YAML resolution. `js-yaml` is only used by sentinel's `--trellis` auto-discovery of `wordpress_sites.yml`; nothing in this plugin's own runtime is affected.

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

== External Services ==

The Instagram Embed block (`aludra/instagram-embed`) is the only part of Aludra that connects to a third-party service. No other block, pattern or admin screen makes outside requests, and Aludra does not track visitors or send data to its authors.

**Instagram (Meta Platforms, Inc.)**

* **What it is used for:** showing a live feed of a public Instagram profile through Instagram's own embed page, `https://www.instagram.com/<username>/embed`.
* **When it loads:** only after a visitor clicks the "Load feed" button. Until then the page contains no iframe and makes no request to instagram.com, so the block can sit behind your own consent flow.
* **What is sent:** the Instagram username you entered in the block, in the iframe address. Once the iframe loads, Instagram receives the visitor's IP address, browser details and any Instagram cookies, as with any Instagram embed.
* **In the editor:** the same gate applies. The block editor loads the feed preview only when an editor clicks "Load Instagram feed". The plugin's own server never contacts Instagram and stores nothing.
* **Availability:** this is an undocumented Instagram endpoint that Meta may change or remove. Each block shows a plain link to the profile as a fallback.
* Instagram Terms of Use: https://help.instagram.com/581066165581870
* Meta Privacy Policy: https://privacycenter.meta.com/policy

If you do not use the Instagram Embed block, nothing is ever sent to Instagram. You can also turn the block off under Settings → Aludra.

== Source Code ==

This plugin ships no obfuscated or minified-only code.

Every block ships its human-readable source in `blocks/<block>/src/` next to the compiled output the plugin actually loads in `blocks/<block>/build/`, along with the `package.json` carrying its exact scripts and dependency versions. The build is standard `@wordpress/scripts`; each block has isolated dependencies and is built from its own directory:

`cd blocks/<block-name> && npm install && npm run build`

The mega-menu block additionally passes `--experimental-modules` to `wp-scripts`.

The one third-party compiled asset is Slick Carousel, vendored under `blocks/carousel/slick/`. Its uncompressed source (`slick.js`) ships beside the `slick.min.js` the plugin enqueues — see == Third-Party Libraries == below for version, license and the one local modification.

The full development repository is public: https://github.com/imagewize/aludra

== Third-Party Libraries ==

= Slick Carousel =
* Version: 1.8.1
* License: MIT License
* Source: https://kenwheeler.github.io/slick/
* Used in: Carousel block
* Files: blocks/carousel/slick/
* Purpose: Powers the carousel/slider functionality
* Source included: `slick.js`, the uncompressed 1.8.1 build, ships beside the `slick.min.js` that is enqueued. `slick.css` is upstream's uncompressed stylesheet
* Local modification: one line of `slick-theme.css` — the `.slick-loading .slick-list` rule drops upstream's `url('./ajax-loader.gif')` background, as that image is not vendored. Every other file is byte-identical to the official 1.8.1 release

The MIT License is GPL-compatible.

== Credits ==

= Plugin Icon and Logo =
The plugin icon (.wordpress-org/icon.svg) and the logo displayed in README.md (assets/logos/h-fireworks.svg) are the Hugeicons fireworks icon from Blade UI Kit (Blade Icons) — a nod to the Nightflower fireworks of the Illuminators in The Wheel of Time, Aludra's namesake. The icon is drawn in an ember gradient on a dark tile; the README logo is a flat ember orange (#D9480F).
* Fireworks icon source: https://blade-ui-kit.com/blade-icons/hugeicons-fireworks
* Blade Icons license: https://github.com/driesvints/blade-icons/blob/main/LICENSE.md (MIT License)

= Homepage Pattern Client Icons =
The bike and noodle-bowl icons used in the homepage pattern's "Our Clients" carousel are from Blade UI Kit (Blade Icons), sourced from the Tabler Icons and Maki Icons sets respectively.
* Bike icon source: https://blade-ui-kit.com/blade-icons/tabler-bike
* Restaurant icon source: https://blade-ui-kit.com/blade-icons/maki-restaurant-noodle
* Blade Icons license: https://github.com/driesvints/blade-icons/blob/main/LICENSE.md (MIT License)

= Review Avatar Placeholder =
The bundled review-avatar placeholder (assets/placeholders/avatar.svg) is the eos-face icon from Blade UI Kit (Blade Icons), sourced from the EOS Icons set and recoloured into Aludra's warm sand/terracotta neutrals.
* Face icon source: https://blade-ui-kit.com/blade-icons/eos-face
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
