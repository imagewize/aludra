=== Aludra ===
Contributors: Rhand
Tags: blocks, gutenberg, carousel, mega-menu, slider
Requires at least: 6.9
Tested up to: 7.0
Requires PHP: 7.4
Stable tag: 2.19.0
License: GPL v3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

A theme-neutral shared library of custom Gutenberg blocks for the Imagewize block themes (Elayne, Aviendha) — and any other WordPress theme.

== Description ==

Aludra is a theme-neutral shared block library for the Imagewize block themes (Elayne and the Aviendha e-commerce theme). The blocks work with any WordPress theme — FSE, block, or classic — and are individually enable/disable-able under Settings → Aludra. It provides the following custom Gutenberg blocks:

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

= 2.19.0 =
* Added: docs/FONT-CONTRACT.md — the font family slug contract (`primary`, `display`, `mono`) a theme must define to host Aludra
* Changed: Hero Split eyebrow references the optional `mono` font family slug (falls back to a system mono stack); block bumped to 1.3.0

= 2.18.0 =
* Changed: `primary-dark` palette slug renamed to `primary-alt` to match the `<family>-alt` naming tier used by other block themes (Ollie); all block SCSS fallbacks and testimonial-grid editor defaults updated
* Changed: `contrast-2` palette slug removed — it was a duplicate of `secondary` (same hex in both light and dark variations); mega-menu patterns now reference `secondary`
* Changed: docs/PALETTE-CONTRACT.md — required slug count 13 → 12, contract updated to match the renamed/removed slugs; Elayne added alongside Aviendha as a maintained theme
* Changed: dropped Nynaeve from the plugin description and docs as a supported/maintained theme — it was never a live Aludra host (has its own native block library, doesn't require the plugin); it remains the historical source many blocks were ported from

= 2.17.0 =
* Changed: All legacy blue/cool-gray fallback colours in block styles replaced with warm equivalents matching the Aviendha palette (#017cb6/#2563eb → #9f1239, #015a80 → #7f0f2e, #6b7280/#98999a → #57534e, #555 → #78716c, light blues → #fde8ec); blue rgba shadows/glows warmed to burgundy rgba(159, 18, 57, …). Themes missing a palette slug now degrade to the warm look instead of the old blue palette
* Changed: cta-columns and testimonial-grid primary-accent backgrounds gained an explicit #fde8ec fallback (previously resolved to transparent on themes without the slug)
* Fixed: Contact Section CF7 response message used primary-accent (a pale background tint) as text colour — now uses primary
* Changed: Hero Split eyebrow and Icon Grid label opt into an optional terracotta palette slug (falls back to primary on themes without it)
* Added: docs/PALETTE-CONTRACT.md — the 13 required (and 2 optional) palette slugs a theme must define to host Aludra, with dark-variation reference values and fallback policy

= 2.16.0 =
* Added: Hero Split content anatomy — eyebrow/kicker line with accent dot, two-tone headline (em highlight in the primary colour), secondary outline/ghost CTA with usable defaults, and a proof-point trust line with accent check marks; all seeded in the block's inner template and the Homepage pattern
* Changed: Homepage pattern hero now ships with the Night style, the new eyebrow, highlighted headline, ghost CTA, and trust line
* Changed: Night style CTA contrast — default button brightens the primary colour on the dark band (hover returns to solid primary); ghost CTA flips to a light translucent outline
* Changed: Hero lead fallback colour warmed from #6b7280 to #57534E for themes without a secondary palette slug

= 2.15.0 =
* Added: "Night" block style for the Hero Split block (aludra/hero-split) — a dark hero variant selectable from the editor's style picker, with a dark main background, soft radial glow from the primary colour, light heading and lead text, a glowing CTA, and a thin "ember line" along the bottom edge; all colours resolve from the active theme's palette with sensible fallbacks
* Added: Aviendha hero design mockups (designs/aviendha/) — three HTML design explorations for the split hero plus a comparison index; the "Night in the Waste" mockup is the basis for the new block style

= 2.14.0 =
* Added: Shared scroll-reveal utility — a small vanilla IntersectionObserver script (assets/js/scroll-reveal.js) that fades/slides elements into view as they enter the viewport, enqueued only on pages containing a block with its "Reveal on scroll" option enabled
* Added: "Reveal on scroll" toggle on the CTA Columns block (aludra/cta-columns), the first block wired up to the new utility
* Respects prefers-reduced-motion: reduce (no motion, content stays fully visible)

= 2.13.0 =
* Added: Service Intro block (aludra/service-intro) — introductory text section for service pages with constrained-width editable paragraphs, ported and generalised from Nynaeve's imagewize/service-intro
* Added: Service Detail Cards block (aludra/service-blocks) — stacked, numbered service cards with a heading, description, and checklist, ported and generalised from Nynaeve's imagewize/service-blocks
* Both new blocks registered in the aludra_enabled defaults and the Settings → Aludra admin page
* Documentation: split README.md's per-block "Block Details" section out into docs/BLOCKS.md, and added docs/README.md indexing the docs/ directory (living docs vs. historical notes)
* Replaced the README logo with the Forkawesome sun icon (assets/logos/f-sun.svg), sourced from Blade UI Kit (Blade Icons, MIT License); the earlier "nightflower" mark colourways remain in assets/logos/ as alternates

= 2.12.0 =
* Added: Dedicated "Aludra" block inserter category — all 20 aludra/* blocks moved off the shared core design/widgets categories into their own group.
* Added: Keywords added to carousel, feature-list-grid, pricing-tiers, search-overlay-trigger, and slide blocks (previously empty).
* Changed: Pricing Tiers block title changed from "Pricing Tiers (3 Column)" to "Pricing Tiers"; description updated to describe it as a multi-column comparison layout.

= 2.11.5 =
* Fixed: Homepage pattern "Our Clients" carousel (patterns/page-homepage.php) — the 2.11.4 fix used an inline style="width:100%;height:auto" on each client-mockup img, which is not an attribute Gutenberg's core/image save() produces, so the block failed validation the moment the pattern was re-inserted/re-saved in the editor. Replaced it with "align":"full" on the image blocks (alignfull class on the figure) — a first-class Gutenberg attribute that already carries the width:100%;height:auto CSS in core, and round-trips through the editor without a validation error. Verified with wp-pattern-sentinel.

= 2.11.4 =
* Fixed: Homepage pattern "Our Clients" carousel (patterns/page-homepage.php) — the five client-mockup SVG images had hardcoded width/height HTML attributes but no CSS forcing them to fill their slide, so they rendered at a fixed 320px wide regardless of the carousel's computed slide width, leaving large empty gaps next to each mockup. Added an inline width:100%;height:auto style to each image so it scales to fill the slide while keeping its aspect ratio.

= 2.11.3 =
* Changed: Homepage pattern "Our Clients" carousel (patterns/page-homepage.php) — replaced the five carousel slides, which all reused the same 6-petal Aludra logo mark recolored, with five distinct mini browser-window mockups of fictional client sites (spa, ecommerce store, design agency, bike shop, restaurant), each with its own palette, layout, and fake domain in the mocked url bar. New source SVGs live in assets/clients/. The bike shop and restaurant cards use the Tabler bike and Maki restaurant-noodle icons via Blade UI Kit (Blade Icons, MIT License) — see Credits section.

= 2.11.2 =
* Changed: Hero Split placeholder art (assets/placeholders/photo.svg) — replaced the generic gray mountain icon with a signature illustration (browser/site card, lightning badge, rising result chart), kept fully grayscale so it works with any theme's palette
* Changed: Hero Split CTA button (blocks/hero-split) — added a directional arrow (CSS mask, currentColor) that nudges on hover, plus a soft shadow and lift on hover/focus-visible
* Documentation: README.md was missing the five blocks added in 2.11.0 (hero-split, about, services-block, review-profiles, cta-banner) and the homepage page pattern — added them to the block list and details sections

= 2.11.1 =
* Fixed: Homepage page pattern (patterns/page-homepage.php) was missing the default margin:0 inline style on the hero-split, about, cta-banner, services-block, and review-profiles wrapper elements — each block defaults style.spacing.margin to 0/0 in block.json, caught by a wp-pattern-sentinel browser validation run against the released blocks

= 2.11.0 =
* Added: Hero Split block (aludra/hero-split) — split-pane hero with heading, lead text, CTA button, and a CSS-only desktop/mobile image toggle, ported and generalised from imagewize.com's acf/hero
* Added: About Section block (aludra/about) — heading, lead paragraph, offer list, and closing paragraph, ported from Nynaeve's nynaeve/about
* Added: Services Block (aludra/services-block) — icon + heading + text card grid, two-per-row, ported from Nynaeve's imagewize/services-block, using the existing aludra/icon binding for icons
* Added: Review Profiles block (aludra/review-profiles) — heading plus a three-up grid of round avatar and quote, ported and generalised from Nynaeve's imagewize/review-profiles
* Added: CTA Banner block (aludra/cta-banner) — full-width call-to-action band, ported and generalised from Nynaeve's nynaeve/cta-block-blue, establishing the theme-adaptive colour convention
* Added: FAQ Tabs displayMode attribute ('tabs' | 'accordion') with a toolbar toggle and inspector control, letting the accordion layout run at every breakpoint instead of only as the mobile fallback
* Added: Homepage page pattern (patterns/page-homepage.php) assembling this release's blocks into a full agency/service-business homepage, modelled on imagewize.com's layout with generic placeholder copy; new patterns/page-*.php auto-discovery registers these for the Site Editor's page-creation pattern picker
* Added: assets/placeholders/ directory with bundled placeholder SVGs (no external image-service hotlinks) used by the homepage pattern

= 2.10.0 =
* Added: Contact Section block (aludra/contact-section) — dark contact section with an intro, a two-column info/details grid, an "available for new projects" badge, and a Contact Form 7 form card, ported from the Nynaeve theme
* Added: Hero Banner block (aludra/hero-banner) — dark full-width hero with an eyebrow badge, heading, lead text, and dual CTA buttons, ported and generalised from Nynaeve's service-hero block
* Added: Both new blocks registered in the aludra_enabled defaults and the Settings → Aludra admin page

= 2.9.4 =
* Fixed: Settings → Aludra showed the "Settings saved." notice twice after saving; removed the redundant manual notice on top of the one the Settings API already queues
* Security: Added a direct-file-access guard to all eight mega-menu pattern files, resolving the `missing_direct_file_access_protection` errors from Plugin Check while keeping the patterns in the distributed plugin

= 2.9.3 =
* Changed: Redesigned the Settings → Aludra page as a categorized grid of block cards (Carousel, Interactive, Marketing & Content) with toggle switches, replacing the single-column checkbox list
* Added: Live "enabled / total" counter in the settings header, plus per-card dependency chips ("Requires Carousel", "Requires FAQ Tabs")

= 2.9.2 =
* Fixed: Settings → Aludra admin CSS/JS failed to enqueue because `plugins_url()` was called with a directory path instead of a file path, so the settings page rendered as an unstyled checkbox list
* Fixed: Child-block row indentation (Slide, FAQ Tab Answer) never applied because the CSS targeted `data-parent` on the table row instead of the checkbox
* Fixed: "Enable All" / "Disable All" skipped dependency/disabled-state styling for child block checkboxes
* Fixed: The frontend asset enqueue used an incomplete `aludra_enabled` default (only `carousel`), out of sync with the block-discovery default, so on a fresh install Testimonial Grid assets could fail to load before the option was saved
* Changed: Removed stale references to the unimplemented `aludra/nav-builder` block; Mega Menu can only be placed inside `core/navigation`

= 2.9.1 =
* Fixed: Composer package description incorrectly described Aludra as blocks "for the Aludra theme" — corrected to reflect that Aludra is a theme-neutral block library usable with any WordPress theme

= 2.9.0 =
* Added: Pricing Tiers, Testimonial Grid, CTA Columns, and Feature List Grid blocks ported from the Nynaeve theme
* Added: Testimonial Grid shares the Carousel block's vendored Slick Carousel assets — the plugin now loads Slick whenever either block is present on the page
* Added: The four new blocks are registered in the aludra_enabled defaults and the Settings → Aludra admin page

= 2.8.0 =
* Added: Feature Cards, Icon Grid, and Trust Bar blocks ported from the Nynaeve theme and generalised for theme neutrality (theme color presets with fallbacks)
* Added: aludra/icon block binding that resolves bundled SVG icons at render time, so no absolute URLs are stored in content — reusable across all icon-based blocks
* Added: Bundled SVG icon set under assets/icons, and registration of the new blocks in the Settings → Aludra admin page
* Changed: Upgraded @wordpress/scripts to 32.6.0 across all blocks and adopted the canonical setup of declaring imported @wordpress/* packages as dependencies
* Fixed: Resolved lint violations surfaced by the ESLint 9 toolchain (accessibility, JSDoc parameter types, shadowed variables, duplicate imports, and more)

= 2.7.2 =
* Changed: Renamed the plugin from Elayne Blocks to Aludra — a theme-neutral shared block library for the Imagewize block themes. Block namespace elayne-blocks/* changed to aludra/*; text domain, constants, PHP namespace, and language files updated to match

= 2.7.1 =
* Fixed: Block validation errors in all 5 carousel patterns — carousel div classes and data attributes now match the save function output exactly
* Fixed: Slide blocks in portfolio-showcase pattern had inline style attributes that the save function never outputs
* Fixed: speed attribute defaulting to 500 in patterns instead of the correct default of 300
* Fixed: Missing lazyLoad, data-dots-top/bottom, data-arrow-* attributes in carousel pattern HTML

= 2.7.0 =
* Added: Admin settings page under Settings → Aludra for block management
* Added: Ability to selectively enable/disable individual blocks
* Added: Checkbox controls for all 6 blocks (Carousel, Slide, Mega Menu, FAQ Tabs, FAQ Tab Answer, Search Overlay Trigger)
* Added: Parent-child block dependency enforcement (Carousel→Slide, FAQ Tabs→FAQ Tab Answer)
* Added: Bulk actions "Enable All" and "Disable All" buttons
* Added: Real-time dependency handling with confirmation dialogs
* Added: Block descriptions and dependency warnings in settings UI
* Changed: Block registration now respects admin settings (disabled blocks won't register)
* Changed: Carousel asset loading optimized to check both settings and block presence
* Security: Proper capability checks and WordPress Settings API integration
* Security: PHPCS WordPress coding standards compliance

= 2.6.0 =
* Changed: Updated minimum WordPress version requirement from 6.7 to 6.9
* Changed: Updated minimum PHP version requirement from 7.3 to 7.4
* Changed: Fixed text domain consistency across all blocks (carousel, mega-menu, slide) from `aludra` to `aludra`
* Added: Dutch translation files (nl_NL) with complete translations
* Added: Translation template file (aludra.pot) for translation support
* Added: Comprehensive documentation in /docs directory
* Fixed: Text domain consistency ensures proper translation loading across all blocks for WordPress.org compatibility

= 2.5.8 =
* Changed: Menu template part patterns now register without templateTypes for broader compatibility
* Fixed: Pattern registration no longer depends on templateTypes for menu template parts"


= 2.5.7 =
* Fixed: Mega menu horizontal overflow on mobile with proper full-width positioning
* Fixed: Mega menu close button positioning and scrolling on mobile devices
* Fixed: Services showcase pattern horizontal padding removed to prevent overflow"


= 2.5.6 =
* Fixed: Mega Menu overlay close button positioning - moved to bottom-right corner for better mobile UX
* Technical: Code formatting improvements in render.php"


= 2.5.5 =
* Added: Menu template part area registration in plugin (removes theme dependency)
* Added: Services Showcase mega menu pattern with three-column nested card layout"


= 2.5.4 =
* Changed: Updated mega menu patterns to use WordPress 6.7+ compatible separator format
* Fixed: Block validation errors caused by inline opacity styles in separator blocks
* Added: Pattern Development Guidelines documentation for separator block compatibility"


= 2.5.3 =
* Added: Mega Menu Icon Features pattern with styled icon badges and feature descriptions
* Changed: Mega menu patterns now use improved spacing presets, list styling, separators, and refined typography across layouts
* Changed: Promotional mega menu layouts updated with bordered cards, padded containers, rounded images, and full-width buttons
* Changed: Mega menu pattern documentation clarified semantic list usage and special content guidance
* Changed: Release script ignored in git for cleaner release workflow"


= 2.5.2 =
* Added: PHP CodeSniffer (PHPCS) configuration with WordPress coding standards
* Added: GitHub Actions workflow for automated WPCS checks on pull requests
* Added: Composer scripts for code quality (lint, wpcs:scan, wpcs:fix)
* Added: PHP parallel lint for syntax validation
* Added: PHPCompatibility checks for PHP version compatibility
* Changed: Added phpcs.xml.dist with WordPress coding standards configuration
* Changed: Updated composer.json with development dependencies (php-parallel-lint, phpcompatibility-wp)
* Fixed: WordPress coding standards compliance in mega-menu render.php (equals sign alignment, comment punctuation)
* Fixed: PHPCS workflow now properly excludes patterns directory from checks

= 2.5.1 =
* Documentation: Updated credits to accurately reflect substantial enhancements to Mega Menu and Carousel blocks
* Documentation: Clarified Mega Menu is approximately 181% larger than original with extensive additional features
* Documentation: Clarified Carousel is completely reimplemented using Slick Carousel vs original Swiper.js

= 2.5.0 =
* Added: Mega menu dropdown spacing control with configurable range (0-48px, default 16px)
* Added: Mega menu dropdown maximum width control with slider (300-1600px range, default 600px)
* Added: Mega menu "Use Full Width" option to align dropdown with navigation container width
* Added: Mega menu JavaScript-based automatic positioning for full-width dropdowns
* Changed: Mega menu default dropdown spacing increased from 8px to 16px for better visual separation
* Changed: Mega menu dropdown width now uses CSS variables for flexible, theme-agnostic control (desktop only, mobile remains full-width)
* Changed: Mega menu full-width mode uses JavaScript to automatically calculate position based on navigation container
* Fixed: Mega menu full-width dropdown positioning now automatically aligns with navigation container
* Fixed: Mega menu full-width dropdowns properly position on window resize and when menu opens

= 2.4.1 =
* Changed: Mega menu now only supports dropdown and overlay layout modes (removed sidebar and grid modes)
* Changed: Mega menu dropdown positioning improved with minimum width of 600px
* Changed: Backdrop blur effect now only available for overlay mode
* Fixed: Mega menu dropdown width calculation for consistent sizing
* Fixed: Mega menu mobile positioning improvements
* Documentation: Updated mega menu README and added pattern improvements proposal

= 2.4.0 =
* Added multiple layout modes for mega menu: dropdown, overlay, sidebar, and grid
* Added template part integration for mega menu content management
* Added six pre-built mega menu patterns (simple list, three column, icon grid, featured content, image links, multi-column)
* Added animation controls with fade, slide, scale, and slide-fade effects
* Added icon support with Dashicons picker and custom SVG options
* Added hover activation option for dropdown and grid modes
* Added styling controls including box shadow, border radius, border width/color, and backdrop blur
* Added responsive controls with customizable mobile breakpoint
* Mega menu block enhanced with additional layout modes, patterns, and improved editor controls
* Improved mega menu positioning system for all layout modes
* Fixed mega menu mobile positioning and viewport constraints
* Documentation: Added comprehensive mega menu README with usage guide and theme integration requirements

= 2.3.1 =
* Documentation: Moved build/development instructions to CONTRIBUTING.md
* Documentation: Simplified README and removed duplicate changelog content

= 2.3.0 =
* Added advanced carousel features: thumbnail navigation, center mode with peek, variable width slides, lazy loading, and adaptive height controls
* Added carousel arrow customization with multiple SVG styles, background shapes, sizes, and custom SVG support
* Added five carousel block patterns (Hero, Testimonial, Product Gallery, Portfolio, Team Members)
* Updated carousel styling for thumbnails, dots, RTL, and responsive behavior
* Fixed active dot visibility and thumbnail behavior edge cases
* Documentation: Updated README with carousel feature highlights (thumbnails, arrow customization, patterns)

= 2.2.3 =
* Documentation: Added proper attribution for Carousel Block plugin by Virgiliu Diaconu in Credits section
* Documentation: Acknowledged original work from https://wordpress.org/plugins/carousel-block/ that the carousel block is based on

= 2.2.2 =
* Fixed WordPress.org plugin repository compliance issues
* Fixed text domain consistency: all blocks now use aludra text domain
* Added ABSPATH security check to mega-menu render.php
* Updated load_plugin_textdomain() hook from plugins_loaded to init
* Added proper function prefixes to prevent naming conflicts
* Added @package tag to main plugin file header
* Fixed PHP opening tag formatting in mega-menu render.php
* Created /languages/ folder for translation files
* Removed deprecated load_plugin_textdomain() call (WordPress 4.6+ auto-loads translations)
* Fixed global function prefix: moiraine_mega_menu_block_init renamed to aludra_mega_menu_block_init
* Updated .distignore file to exclude AGENTS.md from WordPress.org distribution
* Updated carousel block ALLOWED_BLOCKS constant from imagewize/slide to aludra/slide
* Improved Plugin Check workflow to build distribution directory before checking (respects .distignore)
* Documentation: Added Git Commit Guidelines and Version Management section to CLAUDE.md

= 2.2.1 =
* Added WordPress.org plugin repository infrastructure
* Added readme.txt file following WordPress.org standards
* Added .distignore for distribution builds
* Added GitHub Actions for automated releases and plugin checks
* Plugin now ready for WordPress.org submission

= 2.2.0 =
* Initial public release
* Three blocks: Mega Menu, Carousel, and Slide
* WordPress Interactivity API integration for mega menu
* Conditional asset loading for Slick Carousel
* Dynamic block discovery system
* Full translation support

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

= README Logo =
The Aludra logo displayed in README.md (assets/logos/f-sun.svg) is the Forkawesome sun icon from Blade UI Kit (Blade Icons), recoloured with Aludra's ember gradient. The earlier "nightflower" mark colourways remain in assets/logos/ as alternates.
* Sun icon source: https://blade-ui-kit.com/blade-icons/forkawesome-sun
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
