# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [2.36.2] - 2026-08-26

### Fixed
- **`aludra/hero-banner`:** The Ixian homepage hero's search-style button group squeezed into an ~88×116px blob on mobile, wrapping its "Browse Templates" label across multiple lines. A `.hero-banner__search` group nested inside `is-style-canvas` now stacks vertically at <= 768px with full-width buttons. The three-class selector already outranks the group's generated layout utility classes, so only `border-radius` and `padding` need `!important` — those two are set by the block's own border/spacing support as inline style on the element, which nothing but `!important` can override.

## [2.36.1] - 2026-08-25

### Changed
- **The distributed zip ships block source again.** `.distignore` excluded
  `blocks/*/src/*`, so the zip carried only webpack output — `blocks/hero-banner/build/index.js`
  is a single 2,498-byte line. WordPress.org guideline 4 requires the
  human-readable source of compiled JS/CSS to ship with it or live at a
  documented public location; the readme's GitHub link arguably qualifies, but
  reviewers ask often enough that it is not worth the round-trip. The src trees
  are ~18k lines / ~1MB and the per-block `package.json` files ~120KB, both
  negligible next to the 3MB dist; the 14MB of lockfiles stay out.
- **Root-only excludes are now anchored** (`/package.json`, not
  `package.json`). The two release paths use different dialects: `zip -x@`
  matches whole paths, while rsync's `--exclude-from` — used by
  `plugin-check.yml` and by wp-ops `rsync-package-to-site` — matches a
  slashless pattern against a *basename at any depth*, so the root entry was
  silently taking all 30 `blocks/*/package.json` with it. A leading slash
  anchors in rsync and is still matched by zip. Verified against both tools.
- **Readme tags:** `gutenberg` → `landing-page`. The directory discourages
  project names as tags, and the five-tag cap meant swapping rather than adding.
- **Ixian is named alongside Aviendha** in the theme section — it is the theme
  whose patterns depend on this plugin most heavily.

### Added
- **The uncompressed Slick Carousel source ships too.** `blocks/carousel/slick/`
  carried only `slick.min.js`, 42KB of minified third-party JavaScript with no
  source in the tree — guideline 4 covers vendored libraries as well as our own
  compiled output. `slick.js`, the uncompressed 1.8.1 build, now sits beside it;
  the enqueue still uses the minified file. Checked against the official
  `slick-carousel@1.8.1` package: `slick.min.js`, `slick.css` and all four font
  files are byte-identical, and `slick-theme.css` differs by exactly one line —
  the `.slick-loading .slick-list` rule drops upstream's
  `url('./ajax-loader.gif')` because that image is not vendored. That
  modification is now recorded in readme.txt rather than left for a reviewer to
  find.
- **A `== Source Code ==` section** in readme.txt, stating where every compiled
  file's source lives and how to build each block. Placed with Third-Party
  Libraries and Credits at the end rather than ahead of Installation: the
  directory renders unrecognised sections inline in the Details tab in file
  order (only Installation, FAQ, Screenshots, Changelog and Upgrade Notice get
  their own tabs), so hoisting it would have put build instructions directly
  under the pitch for every visitor. Of ~29 plugins sampled — Kadence, Otter,
  Stackable, Spectra, Getwid, Genesis Blocks among them — none carries such a
  section at all; the ones that disclose vendored code do it in trailing
  Credits/Copyright sections, which is the shape followed here. Reviewers read
  the raw readme and the zip, so placement costs nothing there.

### Notes
- Groundwork for submitting Aludra to the WordPress.org plugin directory. No
  runtime behaviour changes; blocks, patterns and PHP are untouched.

## [2.36.0] - 2026-08-23

### Added
- **Seven more section patterns**, closing the block/pattern coverage gap: every
  content block is now reachable as a finished section rather than as an empty
  block you have to work out how to fill. `section-split.php` (a two-pane band —
  load waterfall on one side, a numbered three-step process on the other),
  `section-service-details.php` (numbered service cards with per-card
  checklists), `section-icon-grid.php` (paired before/after icon grids, crosses
  on the left and checks on the right), `section-comparison.php` (the
  spec-sheet comparison table, three rows against three alternatives),
  `section-cta-columns.php` (two call-to-action cards under a shared heading),
  `section-testimonials.php` (three testimonial cards with result metrics), and
  `section-service-intro.php` (a constrained-width two-paragraph intro).
- Section patterns now total twenty-one, and patterns overall forty-two. The
  only blocks without one are `mega-menu` and `search-overlay-trigger`, which
  belong to a navigation template part rather than to a page — mega-menu already
  has its own eight template-part patterns.

### Changed
- **README, readme.txt and the plugin header now say "page builder".** The
  previous framing ("everything between the header and the footer") described
  the division of labour accurately but never named the category, so a reader
  scanning Packagist or the plugin directory had to infer what Aludra is for.
  It now claims the term and immediately distinguishes itself from the
  proprietary builders the term usually implies: native blocks edited in the
  editor you already have, no separate editing app, no shortcodes, no
  proprietary markup, and nothing that breaks when the plugin is switched off.
- Copy in the four patterns extracted from live demo pages was rewritten from
  the developer-platform voice those pages carry into the same generic
  service-business voice as the rest of the library. Shipping a specific
  client's positioning in a GPL plugin was never the intent, and two
  incompatible voices in one pattern library reads as an accident.
- No block markup, styles, or attributes changed — existing content is
  untouched.

### Fixed
- `aludra/comparison-row` and `aludra/comparison-cell` markup captured from
  pages saved before those blocks gained their `wp-block-aludra-*` wrapper
  classes fails block validation in the editor. The new comparison section
  carries the current classes. Any page still holding the older markup — the
  demo site's own comparison sections included — will show a block recovery
  prompt until it is re-saved.

## [2.35.0] - 2026-08-23

### Added
- **Fourteen section patterns** (`patterns/section-*.php`) — the single bands a
  page is built from, each pre-filled with plausible copy, the right style
  variation, and the surrounding layout host already in place: split hero, hero
  banner, stat rail, trust bar, client reviews, capability cards, services grid,
  feature list, about, client carousel, pricing tiers, FAQ, CTA banner, and
  contact. Until now the smallest thing a user could pick up was an empty block;
  the unit they actually shop for is a finished section. Every one is extracted
  verbatim from the markup already shipping in the four page patterns, so they
  round-trip through the editor unchanged.
- Section patterns are grouped into pattern categories mirroring the block
  categories in this same release — Heroes, Proof, Features & Services, Layout, and
  Convert — so a section sits under the same heading as the block it is built
  from. The inserter's Patterns tab renders each as a live preview of the real
  blocks, which is what makes a section browsable rather than merely listed.
- **Four more page patterns** — a **landing page** (split hero, stat rail,
  capabilities, pricing, reviews, FAQ, CTA), a **services overview page** (hero,
  trust bar, intro, services grid, capabilities, FAQ, CTA), a **pricing page**
  (hero, fixed-price tiers, what every price includes, FAQ, CTA), and a **team
  page** (hero, trust bar, studio story, the people, how we work, CTA). Eight
  full pages now cover the layouts a service business actually needs. Each is
  assembled from the section patterns above rather than authored fresh, so the
  markup is the same markup the editor has already round-tripped.
- Pattern coverage for Service Intro, which had no pattern of any kind.

### Changed
- **The single "Aludra" block category is split into six.** At thirty blocks one
  plugin-owned category had become its own haystack — the inserter listed every
  block in one undifferentiated panel. Blocks now sit under Aludra: Heroes,
  Proof, Features & Services, Layout, Convert, and Navigation. The categories
  are registered in the order a page gets built rather than alphabetically, so
  the inserter panel reads as a sequence: hero, proof, what you do, layout
  scaffolding, the ask — with Navigation last, since those two blocks belong to
  a header rather than to a page.
- Settings → Aludra now groups its block cards by the same six categories. It
  previously carried a second, unrelated taxonomy (Carousel / Interactive /
  Marketing & Content) that put 21 of the 30 blocks in one bucket and matched
  nothing the user saw in the editor.
- No block markup, styles, or attributes changed, so no block `version` is
  bumped and existing content is untouched — a category lives in the editor's
  block registry and is not a cache-busted asset.
- The `aludra` pattern category held carousel demos and whole page layouts in
  one bucket. It is split into **Aludra: Full Pages** (the four page patterns)
  and **Aludra: Carousels** (the five pre-configured carousel setups).
- Page and section patterns are now registered by one loader that reads
  `Categories` and `Block Types` from each file's own header, rather than having
  them hardcoded per loader. A new pattern file lands in the right place without
  touching `aludra.php`.
- Only page patterns declare `Block Types: core/post-content`. Section patterns
  deliberately declare none — a `blockTypes` entry would hijack the Site
  Editor's "choose a pattern" picker for a new page and bury the four real page
  layouts among fourteen fragments.
- **README.md, readme.txt and the plugin header now describe what Aludra is.**
  All three called it "a shared custom block library", which was accurate when
  it held three blocks and no patterns. They now lead with the division of
  labour instead: a theme gives you the palette, the type, the header and the
  footer, and Aludra gives you everything between them. Deliberately silent on
  what kind of site that is — the same bands build a portfolio, a services site
  or a plain business presence — and defined as "blocks and patterns" rather
  than as sections, so blocks that are not page sections still fit the
  description. The readme's tags change from
  `blocks, gutenberg, carousel, mega-menu, slider` to
  `patterns, page-builder, blocks, sections, gutenberg` to match how someone
  actually searches for this.
- **Aviendha is named as the companion theme.** The intended pairing — Aviendha
  for palette, type and templates, Aludra for the sections — appeared nowhere in
  the README despite being the setup the plugin is built against. It now has its
  own section, with the `composer require` line for both packages, and the
  theme-neutrality promise is kept explicit alongside it.

## [2.34.0] - 2026-08-22

### Added
- **"Light" style for CTA Banner** — the same banner on a white ground with
  Tertiary background and Contrast text, for themes whose pages are light
  throughout. The button stays keyed to Primary Alt/Main directly in both
  styles, since it reads as an accent against either ground. The dark banner
  is unchanged and remains the default.

### Changed
- CTA Banner's background/text colours route through custom properties
  declared once on the block, so a style variation is a palette swap rather
  than a second copy of the layout. The rendered dark banner is identical to
  2.33.0 and existing content needs no deprecation.

## [2.33.0] - 2026-08-22

### Added
- **"Light" style for Contact Section** — the same section on a white ground with
  Contrast headings, Secondary body/label copy, and a white form card bordered in
  Border Light, for themes whose pages are white and near-white throughout. The
  decorative glows behind the dark default are dropped rather than reused, since a
  low-opacity colour wash reads as atmospheric lighting against a dark ground but
  as a muddy tint against a light one. The dark section is unchanged and remains
  the default.

### Changed
- Contact Section's colours route through custom properties declared once on the
  block, so the new style is a palette swap rather than a second copy of the
  layout. The rendered dark section is identical to 2.32.1 and existing content
  serializes byte-identically and needs no deprecation.

## [2.32.1] - 2026-08-20

### Added
- **`icon-check-circle.svg`** — matches `icon-x-circle.svg`'s style (stroke-based
  outline, same viewBox and stroke colour), for "yes"/"included" markers
  alongside the existing "no"/"excluded" one.

## [2.32.0] - 2026-08-20

### Added
- **Comparison Table** — a filterable spec-sheet comparison: a centred eyebrow
  pill/heading/lead, a pill bar that filters the table by category, and a
  bordered table with your own column highlighted against up to three
  competitors. Ships as three blocks: `aludra/comparison-table` (the host),
  `aludra/comparison-row` (one structural parameter, tagged with a filter
  category), and `aludra/comparison-cell` (one vendor's answer — heading plus
  a short description). Every row carries a fixed four-cell template (yours,
  then three competitors), enforced by `templateLock`, so a row can never
  drift out of alignment with the header it has to line up under. The pill
  bar is built entirely on the front end from each row's `data-category` —
  with JavaScript disabled the table simply shows every row, which is already
  the correct "Full Spectrum" state, so there is no separate no-JS fallback
  to maintain.

## [2.31.0] - 2026-08-19

### Added
- **A "Light band" style for Stat Rail.** The same band on a light ground —
  `white` background, `contrast` type, `border-light` hairlines above *and*
  below the stats, and a `secondary` caption — for themes whose pages are white
  and near-white throughout and carry their contrast in the type rather than in
  blocks of dark background. The ground is `white` rather than `base` because
  `base` is the page background in those themes, which would leave the band
  invisible; the second hairline draws the edge that the slight lift off the
  page doesn't. Layout, type scale and responsive behaviour are the base
  block's, and the dark band is unchanged and remains the default.
- **Per-stat colour for Stat Item's number and caption.** A Color panel sets
  either independently from the theme palette (or a custom value), so a stat can
  depart from the band's own colours — needed as soon as the rail is light,
  where the dark band's inherited type colours no longer apply. Palette choices
  save as core's `has-{slug}-color` class, so they follow the theme and survive
  a style variation swapping the palette underneath them.
- **A heading level for Stat Item's number.** The number can now render as
  `h1`-`h6` where the rail is a real section of the page rather than a
  decorative band. It stays a `div` by default: three big figures in the
  document outline and the screen reader heading list is rarely what the page
  means.

### Changed
- Stat Rail's colours now route through four custom properties declared once on
  the block (`--aludra-stat-bg`, `-text`, `-rule`, `-caption`), so the light
  style is a palette swap rather than a second copy of the layout, including in
  the responsive block. The rendered dark band is identical to 2.30.0.
- Stat Rail's number and caption now zero their own margins, so a number
  promoted to a heading doesn't inherit the theme's heading spacing and break
  the band's rhythm.
- The hero-split adjacency that suppresses that block's decorative ember line
  now applies only to a *dark* Stat Rail. A light rail is exactly the lighter
  section that line was drawn for, so it keeps it.

Existing Stat Item content is unaffected and needs no deprecation: with no level
and no colours set, `save()` serializes byte-identically to 2.30.0.

## [2.30.0] - 2026-08-19

### Added
- **Load Waterfall's panel length is now editable.** A "Rows" control sets how
  many stages the waterfall lists, from 1 up to 12, and the block ships six more
  hand-authored rows continuing the original cascade — each stage starting later
  and running shorter — so a longer panel still reads as a designed artifact
  rather than a generated one. Useful wherever the panel sits beside a tall
  column and looked stranded at its old fixed height.

### Fixed
- **Load Waterfall silently ignored any `rowLabels` length other than six.**
  `save()` mapped over the fixed geometry constant and indexed the labels by
  position, so a shorter array left trailing rows with empty labels and a longer
  one dropped the surplus. The row count now follows the labels. Existing
  content is unaffected and needs no deprecation: `rowLabels` defaults to six
  entries and the editor previously offered no way to add or remove one, so
  every block saved to date resolves to the same six rows and serializes
  byte-identically.

### Changed
- Load Waterfall's `package.json` now declares the `@wordpress/i18n` and
  `@wordpress/components` it imports; both resolved transitively before.

## [2.29.0] - 2026-08-19

### Added
- **Split Section, a second layout host.** A page section with a centred
  eyebrow/heading/lead above two panes — media on one side, content on the
  other — collapsing to a single stacked column at 860px. Where Spine Section
  puts its header in a sticky left rail beside one content track, this one
  centres it above two. Both panes take any blocks, so a "how it works" section
  is now a composition (image + Service Detail Cards + buttons) rather than a
  block of its own. Media width is adjustable 30–70%, and the panes can be
  swapped so the media sits on the right; the header stays centred either way,
  and the media always leads once stacked. The width is published as a custom
  property rather than an inline `grid-template-columns`, so the collapse rule
  still wins on narrow screens. An optional "Reveal on scroll" toggle brings the
  two panes in from opposite sides as the section enters the viewport, using the
  shared scroll-reveal utility; stacked, both drift up instead, and
  reduced-motion disables it.
- **A "Numbered steps" style for Service Detail Cards.** Circular badge
  numerals in place of the default's large italic outline figures, for
  sequences a reader follows rather than a quiet index. The badge tint is mixed
  from the active palette's `primary`, so it stays correct under dark style
  variations. The block's existing look is unchanged and is now the explicit
  "Default" style.

### Fixed
- **Spine Section was missing from Settings → Aludra**, so it could not be
  toggled there and did not appear in the block list, even though the plugin's
  own defaults enabled it. Both of the settings page's arrays now carry it.

## [2.28.1] - 2026-08-19

### Fixed
- **Icons bound with `aludra/icon` rendered as a full-size placeholder in the
  editor.** The binding was registered in PHP only, via `get_value_callback`.
  That resolves URLs when a block renders on the front end, but the editor needs
  a JavaScript source of the same name, so bound attributes stayed empty while
  editing. Pattern markup saves icons as `<img src="" />` plus the binding, so
  the editor drew core/image's placeholder instead — and because a placeholder
  is not an `img`, the `width: 14px` cap never applied to it, inflating whatever
  contained it. Most visible as a hugely oversized hero eyebrow pill, but it
  affected every pattern using icon bindings, including trust-bar and
  feature-cards. `assets/js/editor-icon-binding.js` now registers the source
  editor-side, resolving from the `window.aludraIcons` map already printed on
  `enqueue_block_editor_assets`. Blocks inserted from the inserter were never
  affected — their `edit.js` templates seed `url` from that same map.

- **Hero Banner's editor styles forced a dark preview onto the `canvas` style.**
  `editor.scss` set a dark background and near-white text unconditionally, and
  those selectors outrank the colour classes inner blocks carry — so on the
  light canvas surface the eyebrow, lead and inner paragraphs were unreadable
  while editing, despite rendering correctly on the front end. The dark preview
  is now scoped to `:not(.is-style-canvas)`. The eyebrow's icon slot is also
  capped defensively, so an icon that fails to resolve degrades quietly instead
  of inflating the pill.

### Changed
- **Trimmed `readme.txt`'s changelog to the seven most recent releases.** At 56
  entries it had grown to roughly 34,000 characters, well past the 5,000
  WordPress.org supports, and the section was being truncated on parse
  (`readme_parser_warnings_trimmed_section_changelog`). The full history is
  unaffected and remains in this file, which reaches further back than
  readme.txt did; the trimmed section now points here.

## [2.28.0] - 2026-08-19

### Added
- **A `canvas` style variation for `aludra/hero-banner`.** The block had no style
  variations at all, and its stylesheet hardcodes a dark `main` background with
  coloured radial glows — so a light, centred hero was not expressible without a
  host theme fighting the block's own CSS. `canvas` is the light counterpart: a
  near-white surface ruled with a faint grid, the content column centred, and the
  eyebrow, title, lead and outline CTA recoloured for a light ground. Suits
  search-led heroes where a headline and an input sit centre stage rather than a
  left-aligned block of copy.

  Follows the convention `hero-split`'s `night` style already established —
  declared in `block.json`'s `styles` array, implemented as `&.is-style-canvas`
  in `style.scss`, and guarded with `:not(.has-background)` / `:not(.has-text-color)`
  so an author's own colour picks in the editor still win. Every colour resolves
  from the active theme's palette (`base`, `border-light`, `contrast`, `primary`,
  `secondary`) with neutral fallbacks, so a repaletted theme gets a matching hero
  without touching this block. The dark default is unchanged.

## [2.27.1] - 2026-08-19

### Fixed
- **Four blocks painted Aviendha's rose regardless of the active theme's palette.**
  `aludra/hero-banner`, `aludra/contact-section`, `aludra/pricing-tiers` and
  `aludra/testimonial-grid` mixed two patterns for colour: most declarations correctly
  read `var(--wp--preset--color--primary, #9f1239)`, but their decorative touches —
  eyebrow-badge fills, icon-chip backgrounds, focus rings, radial-gradient glows and
  hover shadows — wrote the fallback's raw value, `rgba(159, 18, 57, …)`, directly,
  bypassing the custom property entirely. On Aviendha, whose `primary` *is* `#9f1239`,
  this was invisible. Surfaced building Ixian's cool graphite-and-indigo palette: its
  hero-banner eyebrow pill, contact-section icon chips and "available" badge all stayed
  rose against a blue palette. Any other theme with a non-rose `primary` has the same
  defect.

  All 19 raw `rgba(159, 18, 57, …)` occurrences across the four blocks now derive from
  the theme's own primary: `color-mix(in srgb, var(--wp--preset--color--primary,
  #9f1239) <alpha>%, transparent)`, where `<alpha>` matches the original rgba alpha as
  a percentage. `color-mix` reproduces the identical rendered colour on Aviendha (a
  pure colour mixed with transparent at X% is the same as that colour at X% alpha), so
  this is a no-op there and a genuine fix everywhere else.

  `aludra/pricing-tiers`'s featured-card hover shadow was already flagged as this exact
  defect in Ixian's `docs/ixian/SETUP.md` §5 "worth doing while you are in there" — it
  turned out to be one instance of a wider pattern, not the whole of it.

  Block versions bumped for the CSS change: `hero-banner` 1.0.0 → 1.0.1,
  `contact-section` 1.0.1 → 1.0.2, `pricing-tiers` 1.0.0 → 1.0.1, `testimonial-grid`
  1.0.0 → 1.0.1.

## [2.27.0] - 2026-08-18

### Fixed
- **Four blocks hardcoded `white` where the theme's surface token belongs, breaking
  every dark style variation.** Two distinct symptoms, one root cause.

  `aludra/cta-banner`, `aludra/review-profiles` and the `.pricing-tag` flag in
  `aludra/pricing-tiers` painted white text on a `primary` background. Under a dark
  variation `primary` is a *light* colour, so that pairing fell to **2.69:1** on
  Aviendha's Twilight and **2.98:1** on Ixian's — both below the 4.5:1 WCAG 2.1 AA
  needs for body text.

  `aludra/pricing-tiers` (`is-style-spec-sheet`) and `aludra/spine-section` (via
  `--aludra-band-card`) painted white *surfaces*. Text on them inherits the page's
  `contrast`, which under a dark variation is near-white — white-on-white, unreadable.

  All five now use `base`. It is the page surface, so it inverts with the palette and
  stays readable in both schemes — the same pairing the themes' own button element
  already uses. Dark variations go to **6.26:1** (Aviendha Twilight) and **6.09:1**
  (Ixian Twilight).

  No palette can fix the text case on its own: with Twilight's `base` at 18.17:1
  against white, the best any single `primary` can do on *both* white text and `base`
  text is 4.26:1, short of 4.5:1. The two constraints are unsatisfiable, so the fix
  had to be here.

### Changed
- Light themes shift imperceptibly where `white` and `base` differ — on Aviendha a CTA
  banner's text goes from `#FFFFFF` to `#FAF7F2` (8.02:1 to 7.50:1), on Elayne it does
  not move at all. Every light theme and variation stays well clear of AA.

## [2.26.1] - 2026-07-24

### Changed
- README logo replaced with the Lucide flower icon (`assets/logos/g-flower.svg`), sourced
  from Blade UI Kit (Blade Icons, MIT License), drawn in a single flat ember orange
  (`#D9480F`) rather than the sun mark's gradient — a mid-tone that clears 4:1 contrast
  against both a white and a GitHub-dark backdrop, so the mark reads in either colour
  scheme. Same licensing as the Forkawesome sun mark it replaces, which remains in
  `assets/logos/` alongside the original "nightflower" colourways as alternates.
  Documentation only — no change to any block.

## [2.26.0] - 2026-07-24

Aludra's fourth page pattern, ported from the imagewize.com about page, plus the
repo-hygiene move that takes `docs/` and `designs/` out of the distributable plugin.

### Added
- `patterns/page-about.php` — an about page pattern (`aludra/page-about`) assembled from
  blocks the library already ships: `hero-banner`, `trust-bar`, then four `spine-section`
  bands wrapping `about` (who we are), `feature-cards` (five capability cards),
  `feature-list-grid` (the two client types), and `review-profiles` in its default avatar
  style, closing on `cta-banner`. Ported from the imagewize.com about page, with the
  theme-specific parts generalised: `imagewize/*` and `nynaeve/*` blocks map onto their
  `aludra/*` equivalents, the hard-coded `/app/themes/nynaeve/public/build/assets/*.svg`
  icon URLs become `aludra/icon` bindings that resolve at render time, the founder
  portrait and the JSON-LD `Person` block are dropped, and the copy is generic rather than
  first-person. Validated with `wp-pattern-sentinel` against the Aviendha demo subsite.

### Fixed
- `aludra/review-profiles` rendered white quote text on the section's light surface when
  nested in an `aludra/spine-section`. The spine strips a nested section block's band
  background (the spine *is* the band), but the block's paired `color: white` — chosen to
  read on its own `primary` fill — survived, leaving white on sand. The spine now resets
  the colour to `inherit` for that one child; the other nested blocks colour descendants
  rather than the root, or use a body colour that reads on any spine surface, so they are
  untouched. Only reachable via the block's default avatar style, which is why the
  homepage's `is-style-quotes` usage never showed it. (`spine-section` 1.0.1 → 1.0.2)

### Changed
- **`docs/` and `designs/` no longer live in this repo.** Planning documents, roadmaps, the
  palette/font/block contracts and the HTML design mockups moved to the private
  `imagewize/imagewize.com` repo under `docs/aludra/` and `designs/aludra/`, matching the
  layout Aviendha, Elayne and Nynaeve already use. This repo is public and distributable,
  so mockups carrying client names and roadmaps of unshipped work do not belong in it —
  and every file in the old `designs/aviendha/` was already byte-identical to a copy in
  that repo, which is exactly the drift the split prevents. `.distignore` and
  `.gitattributes` keep their `docs/`/`designs/` entries as a guard so a stray file never
  reaches a release zip. In-repo references that pointed at those paths (README.md,
  AGENTS.md, an `aludra.php` comment) were removed rather than re-pointed: the target repo
  is team-only, so no public file should cite a document its readers cannot open.
- `CLAUDE.md` and `AGENTS.md` now spell out that a block's own `version` in `block.json`
  must be bumped alongside any change to that block's markup, styles, or attributes — in
  both the `src/` and committed `build/` copies, since that value is what WordPress
  cache-busts the block's enqueued script and style with.

## [2.25.0] - 2026-07-23

Aludra's third page pattern, ported from the imagewize.com Nynaeve contact section.

### Added
- `patterns/page-contact.php` — a contact page pattern (`aludra/page-contact`) built on the
  existing `aludra/contact-section` block: intro, a two-column grid with contact details
  (email, response time, location) beside a Contact Form 7 card, and an "available for new
  projects" badge. Ported from the `nynaeve/contact-section` markup on imagewize.com, with
  the theme-specific parts generalised: `imagewize/theme-icon` bindings become `aludra/icon`
  ones, the absolute `imagewize.test` icon URLs are dropped (the binding resolves them at
  render time, so nothing site-specific is baked into the pattern), and the copy is generic.
  The form is a `core/shortcode` block carrying a `FORM_ID` placeholder for the site's own
  Contact Form 7 ID. Validated with `wp-pattern-sentinel` against the Aviendha demo subsite.

### Fixed
- `aludra/contact-section` form fields sized as `content-box` under any theme without a global
  `box-sizing` reset, so `width: 100%` plus 32px of padding and a 1px border made every field
  34px wider than its grid column. Two symptoms, one cause: the name and email inputs
  overlapped in the 16px gutter — the overlap reads as a stray vertical bar where the two
  translucent backgrounds stack — and the fields ran past the card's right padding to its
  border. Nynaeve, where the block was ported from, sets a global border-box reset and never
  showed it; Aviendha does not. The fields (and the submit button) now set `box-sizing`
  themselves rather than relying on the theme.

## [2.24.1] - 2026-07-23

### Changed
- **Demo-site syncing moved to [wp-ops](https://github.com/imagewize/wp-ops)**
  (`scripts/rsync-package-to-site.sh`), replacing the `bin/sync-demo.sh` that 2.24.0 added here.
  It does the same thing — rsyncs a dist-faithful tree (`--delete --delete-excluded`, honouring
  `.distignore`) into a local Bedrock site — but takes the package kind and slug as arguments and
  reads the destination from `SITE_ROOT`, so one script serves this plugin, Aviendha, Elayne and
  Nynaeve instead of a near-identical copy drifting in each repo. The paths in the old copy were
  personal configuration rather than plugin code. Aviendha's copy surfaced the wider problem: a
  `.sh` file committed to a theme fails WordPress Theme Check's `File_Check` outright, and Elayne
  and Nynaeve had already settled on keeping their copies untracked. `bin/sync-demo.sh` is
  gitignored here if you want a local shortcut.

## [2.24.0] - 2026-07-23

Aludra's second page pattern, ported from the imagewize.com Nynaeve service pages. See
[docs/SERVICES-PAGE-PATTERN-PLAN.md](docs/SERVICES-PAGE-PATTERN-PLAN.md) for the mapping
and the decisions behind it.

### Added
- `patterns/page-service.php` — a full service/landing page pattern (`aludra/page-service`):
  Hero Banner with dual CTAs, Trust Bar, six capability cards in a Spine Section, a
  why-us card grid, fixed-price tiers behind a `#pricing` anchor, an FAQ accordion, and a
  closing CTA band. Assembled entirely from shipped `aludra/*` and core blocks — no new
  block was needed. Validated end-to-end with `wp-pattern-sentinel` against the Aviendha
  demo subsite, and checked at 1440/1024/768/390px with no horizontal overflow and no
  jQuery on the page.
- `bin/sync-demo.sh` — pushes this working copy into the demo Bedrock site so unreleased
  changes can be tested and pattern-validated without cutting a release. Both Aludra and
  Aviendha are pinned Composer dependencies there; the theme ships its own copy of the
  script. Excluded from the distributed zip via `.distignore` and `.gitattributes`.
- `--aludra-band-card` — a surface token declared by `aludra/spine-section` and read by
  the card blocks nested in it (`feature-cards`, `feature-list-grid`), encoding the rule
  the Aviendha mockup already used: *a card sits one step lighter than the band it is on*
  (`white` on an untinted band, `base` on a tinted one). Cards read
  `var(--aludra-band-card, <their standalone colour>)`, so a block used outside a spine is
  unaffected. This is what keeps the two consecutive card sections on the service page
  legible as separate sections — they differ by inverting figure and ground rather than by
  introducing a third surface colour, which would have been a new palette slug for every
  hosting theme to define.
- `designs/aviendha/service-page-surfaces.html` — the surface ladder and both bands as
  plain HTML/CSS, documenting where each palette slug lands on a service page.

### Fixed
- `aludra/feature-cards` nested in an `aludra/spine-section` painted its own 88px-padded
  `tertiary` band, which inside the spine's content track rendered as a floating tinted box
  in the right-hand column instead of a full-width band — the spine *is* the section, so a
  block nested in it must not draw one. The existing shell-suppression rule stripped the
  nested block's max-width, inline padding and vertical padding but not its background;
  it now strips the background too, and `feature-cards`/`feature-list-grid` were added to
  the list it applies to.
- `aludra/feature-cards` — the card is a vertical flex layout, so core applied the *theme's*
  block gap between icon, heading and paragraph on top of the margins the block already
  sets (24px + 18px under the icon on Aviendha), pulling the card apart. The card now sets
  `gap: 0` and keeps the authored rhythm.
- `aludra/feature-list-grid` drew its checkmarks from an inline SVG with Nynaeve's blue
  (`#017cb6`) baked into the stroke and no palette fallback, so every hosting theme got an
  off-palette tick — the one place in the block that ignored
  [the palette contract](docs/PALETTE-CONTRACT.md). A `url()` background can't read a CSS
  custom property, so the tick is now a mask over
  `var(--wp--preset--color--primary, #9f1239)`.

## [2.23.1] - 2026-07-21

Step 13 of the Aviendha redesign — the last layout gap between the demo homepage and
the mockup. See `docs/AVIENDHA-REDESIGN.md` step 13 in the imagewize.com repo.

### Changed
- `patterns/page-homepage.php` — the client work rail now sits inside a tinted
  `aludra/spine-section` (label "Selected work"), matching the mockup's
  `.section.section-tint > .shell > .spine` treatment, and the carousel dropped
  `align: "full"`. Two visible symptoms had one cause here: at full viewport width all
  five cards fit side by side, so the rail-mode scroll-snap container had nothing to
  overflow and never scrolled — it read as a broken slider rather than a full-bleed
  layout. Constraining it to the ~820px spine content column fixes the proportions and
  restores the scrolling in the same move. The cards were always the mockup's
  `minmax(19rem, 22rem)`; they only looked undersized against 500px of dead space
  either side.
- `aludra/carousel` — rail mode gained a scroll affordance: a right-edge fade (a mask on
  the scroll container, which stays pinned to the edge where an absolutely positioned
  child would scroll away) that itself fades out at the end of the track via a
  scroll-driven animation, plus an `.aludra-rail-hint` class for a mono "Scroll for more"
  label, authored as a paragraph in the pattern so it stays translatable and removable.
  Rail mode draws no arrows and no dots, so the scrollbar was the only cue — and on macOS
  that is an overlay scrollbar reserving zero layout space and staying invisible until you
  already scrolled. Styling `::-webkit-scrollbar` did not override the platform default
  (measured `offsetHeight - clientHeight === 0` on the demo site), so the bar is now
  treated as a bonus rather than the affordance. Both cues are pure CSS; rail mode stays
  zero-JS.

### Fixed
- `aludra/carousel` — a rail-mode carousel threw `ReferenceError: Can't find variable:
  jQuery` on the frontend. `view.js` was declared as `viewScript` in block.json, and core
  enqueues a viewScript whenever the block is on the page — it cannot know the block came
  in rail mode. The script opens with `( function ( $ ) { … } )( jQuery )`, so it died on
  that line before ever reaching its own rail guard, and jQuery wasn't loaded because the
  generated view.asset.php declared no dependencies. It is now enqueued from `aludra.php`
  behind `aludra_blocks_have_slick_carousel()`, the same gate as the Slick vendor assets,
  which also finally delivers 2.21.1's stated promise: a rail-only page now loads no
  carousel JavaScript at all, not just no Slick. The file moved to
  `blocks/carousel/js/view.js` because dropping `viewScript` also drops it as a webpack
  entry point, and it needs no bundling — hand-written jQuery, no imports.
- `aludra/spine-section` — the single-column mobile layout used a bare `1fr` track,
  which is `minmax(auto, 1fr)`: its automatic minimum is the track's *min-content*
  width. A horizontally overflowing child therefore widened the track — and with it the
  document — rather than being cropped, so the work rail made the whole page scroll
  sideways on a phone. Now `minmax(0, 1fr)`, matching the desktop track, which had
  already been floored at 0 for this reason. Any wide child (a rail, a wide table, a
  `pre`) was affected, not just the carousel.

## [2.23.0] - 2026-07-21

Steps 7–10 of the Aviendha redesign — the four remaining homepage sections move into
`aludra/spine-section` and pick up the mockup's treatment. See
`docs/aludra/AVIENDHA-REDESIGN-BLOCKS.md` §§5–8 in the imagewize.com repo.

### Added
- `aludra/services-block` — new `is-style-list` style variant: a single-column list of
  hairline-separated rows (icon, heading + copy, mono two-digit index) instead of the default
  two-per-row cards. The index is a CSS counter rather than authored `01`/`02` text, so it
  cannot drift out of step when rows are reordered, added or removed; it is dropped below
  560px. The default `cards` style is unchanged, so Elayne and other consumers are unaffected.
- `aludra/pricing-tiers` — new `is-style-spec-sheet` style variant: one bordered, rounded
  container split by internal hairlines rather than three separately bordered cards, with no
  shadow and no hover lift. The featured tier is marked by a 3px accent bar (a `::before`,
  which is why this needs real CSS and not just column attributes) plus a background tint.
  Dividers switch from vertical to horizontal at 781px, matching where core stacks columns.
- `aludra/review-profiles` — new `is-style-quotes` style variant: bordered quote cards with a
  decorative quote glyph and a role + sector attribution footer, no avatar. Chosen over
  swapping the pattern to `aludra/testimonial-grid`, which renders a Slick carousel and would
  have put jQuery and Slick back on the page immediately after 2.21.1 removed them.
- `aludra/faq-tabs` — new `native` display mode rendering real `<details>`/`<summary>`
  elements: no JavaScript, CSS-only chevron, and find-in-page can expand a closed answer.
  `view.js` returns early for this mode. `aludra/faq-tab-answer` gains matching `displayMode`
  and `openByDefault` attributes; `displayMode` is duplicated onto each child (kept in sync by
  the parent's `edit.js`) because block context is not available inside `save()`.

### Changed
- `patterns/page-homepage.php` — pricing, services, reviews and FAQ are each now wrapped in
  `aludra/spine-section`, using the new style variants. Their standalone headings move into
  the spine column, and the pricing section's Nynaeve-specific font-size slugs (`3xl`, `lg`,
  `xs`) and per-element inline border/spacing styles are replaced by the shared scale and
  variant CSS. Pricing features are now a `core/list` with a CSS-drawn checkmark instead of
  paragraphs with a literal `✓` baked into the copy.
- `assets/placeholders/avatar.svg` — replaced the hand-drawn front-facing bust, which was
  drawn in cool greys (`#e5e7eb`/`#9ca3af`) that the palette contract set out to remove, with
  the eos-face icon from Blade UI Kit (MIT, credited in readme.txt) recoloured into Aludra's
  warm neutrals. No background disc, so the avatar takes on whatever surface it is dropped
  onto rather than stamping a fixed cream circle onto all of them.

### Fixed
- `.faq-tab-answer { display: none }` hid the entire FAQ in `native` mode: the rule exists so
  tabs/accordion can reveal one answer at a time via an `.active` class that `view.js` adds,
  and `view.js` deliberately never runs for native. Now scoped so `details.faq-tab-answer`
  stays visible.

## [2.22.0] - 2026-07-21

### Added
- `aludra/spine-section` — the editorial spine layout from the Aviendha redesign: a
  `minmax(0,15rem) minmax(0,1fr)` grid with a `position: sticky` label/heading/aside column
  on the left and section content on the right, collapsing to a single stacked column (sticky
  disabled) below 860px. Label/heading/aside are RichText attributes; content is InnerBlocks,
  so it wraps existing section blocks rather than replacing them. Optional `tint` background.
  The sticky offset is the `--aludra-spine-top` custom property (default 100px) rather than a
  hardcoded value, so a theme with a different masthead height can retune it.
  See `docs/aludra/AVIENDHA-REDESIGN-BLOCKS.md` §3 in the imagewize.com repo.

### Changed
- `patterns/page-homepage.php` — the "What We Do" section is now wrapped in
  `aludra/spine-section`, with its heading moved out of the `aludra/about` content and into
  the spine column.
- CLAUDE.md / AGENTS.md — running the pattern validator (`npm run validate`) is now a
  documented requirement for any PR touching `patterns/`, with the procedure for fixing a
  failure from the validator's own `savedContent` output. Neither file previously mentioned
  the validator, which is why mismatches accumulated unnoticed.
- `.gitignore` — ignore `sentinel-*.log.json` validator run logs.

### Fixed
- `patterns/page-homepage.php` failed block validation before this release (it fails on
  `main` as of 2.21.1). Accumulated mismatches: class ordering normalized by the editor
  (`alignfull is-style-night`), attributes explicitly set to their `block.json` defaults,
  `wp:image` `width`/`height` as numbers rather than `"26px"` strings plus stale `is-resized`
  classes, and paragraphs using the deprecated `"align":"center"` form instead of
  `"style":{"typography":{"textAlign":"center"}}`. The pattern body is now the editor's own
  serialization; all 9 patterns pass.

## [2.21.1] - 2026-07-21

Republish of 2.21.0 with no code changes. The `v2.21.0` tag was moved after
publication to include the carousel rail fixes, but Packagist does not follow a
moved tag — it kept serving the pre-fix commit, so `composer update` reported
"nothing to modify" while installing code without the fixes below. This tag
gives Packagist a version that resolves to the correct commit.

## [2.21.0] - 2026-07-21

### Added
- Carousel (`aludra/carousel`) gained an `engine` attribute (`slick` default / `rail`) — `rail`
  renders a zero-JS CSS scroll-snap track (`grid-auto-flow` + `scroll-snap-type: x mandatory`)
  instead of Slick's JS/data-attribute-driven slider. Part of the Aviendha redesign's carousel
  replacement (see `docs/aludra/AVIENDHA-REDESIGN-BLOCKS.md` §5 in the imagewize.com repo).
  Carousel block bumped to 1.1.0.

### Changed
- `patterns/page-homepage.php` — the "Our Clients" carousel now uses `engine: "rail"`.
- Slick Carousel assets (`slick.min.js`, `slick.css`, `slick-theme.css`) are no longer enqueued
  for pages whose only `aludra/carousel` blocks are in `rail` mode — the `wp_enqueue_scripts`
  gate now scans parsed post content (`aludra_blocks_have_slick_carousel()`) instead of just
  checking block presence via `has_block()`, so a rail-only page loads no jQuery/Slick at all.

### Fixed
- Carousel's frontend `view.js` unconditionally ran Slick's `JSON.parse()` on every carousel's
  `data-slick` attribute, which rail-mode carousels don't render — this threw and aborted
  jQuery's `.each()` loop, silently breaking any other Slick carousel on the same page. The
  script now skips Slick initialization for sliders with no `data-slick` attribute.

## [2.20.0] - 2026-07-21

### Added
- `aludra/load-waterfall` block — animated network load-time waterfall panel with an LCP
  marker, replacing the static desktop/mobile image pair in Hero Split's media slot.
  Site URL, badge, row labels, and the LCP label are editable via RichText; row
  timing/positions are fixed to match the reference design. Part of the Aviendha
  redesign (see `docs/aludra/AVIENDHA-REDESIGN-BLOCKS.md` §1 in the imagewize.com repo).
- `aludra/stat-rail` (parent) + `aludra/stat-item` (repeatable child) blocks — the dark
  full-width band of big-number stats sitting flush under the hero. Equal-width columns
  via CSS grid (`grid-auto-flow`) rather than a fixed `repeat(3, …)`, so the layout isn't
  locked to exactly 3 items. Hairline dividers use `color-mix` against the theme's base
  colour instead of `border-light`, which reads wrong on a dark band. Part of the
  Aviendha redesign (see `docs/aludra/AVIENDHA-REDESIGN-BLOCKS.md` §2).

### Changed
- `patterns/page-homepage.php` — hero-split's media slot now uses `aludra/load-waterfall`;
  `aludra/stat-rail` (3 default stats: `0.9s` good / `-71%` / `1 day`) added directly
  under the hero.
- `aludra/stat-rail` and `aludra/load-waterfall` no longer hardcode one-off
  `clamp()`/rem font sizes — both now reference Aviendha's named font-size scale
  (`var(--wp--preset--font-size--*)`, with a static rem fallback for themes missing a
  given slug), the same fallback-chain convention already used for colour and font-family
  presets. `stat-rail__num` in particular now resolves to the `base` tier (16px) instead
  of a large fluid clamp, matching the reference design's actual rendered size.

### Fixed
- `aludra/hero-split`'s `is-style-night` decorative bottom-edge "ember line" (`::after`)
  was designed for a lighter section following the dark hero; it read as a stray seam
  now that `aludra/stat-rail` sits flush underneath with the same dark background.
  Suppressed narrowly via `:has(+ .wp-block-aludra-stat-rail)` so other hero-split usages
  keep the line.

## [2.19.0] - 2026-07-21

### Added
- `docs/FONT-CONTRACT.md` — the font family slug contract (`primary`, `display`, `mono`)
  a theme must define to host Aludra, parallel to `docs/PALETTE-CONTRACT.md`.

### Changed
- Hero Split eyebrow now references the optional `mono` font family slug (falls back to
  a system mono stack on themes without it), matching the Aviendha redesign's
  eyebrow/label typography. Bumped to 1.3.0.

### Planned
- Continue importing the remaining Tier-A blocks from the Nynaeve theme (two-column-card, content-image-text-card, multi-column-content, related-articles, related-links, expect-list, case-studies), re-namespaced from `imagewize/*` to `aludra/*`. See `docs/PLAN-OF-ACTION.md` for the full gap analysis and import order.
- Roll the scroll-reveal utility and tilt attribute out to more blocks (`feature-cards`, `icon-grid`, `pricing-tiers`, `feature-list-grid`), then the gradient-overlay media card block. See `docs/CARD-EFFECTS-AND-SCROLL-ANIMATIONS.md` for the full phased plan.

## [2.18.0] - 2026-07-20

### Changed
- **Palette slug naming cleanup** — `primary-dark` renamed to `primary-alt` to match the
  `<family>-alt` tier naming used by other block themes (Ollie); updated in
  `hero-banner`, `cta-banner`, and `contact-section` block SCSS and `testimonial-grid`'s
  editor template defaults. `contrast-2` removed — it duplicated `secondary` (identical
  hex in both light and dark variations); the three mega-menu patterns
  (`mega-menu-image-links`, `mega-menu-featured-content`, `mega-menu-icon-features`) now
  reference `secondary` instead.
- `docs/PALETTE-CONTRACT.md` updated: required slug count 13 → 12, dark-variation
  reference table and notes updated to match. Elayne added alongside Aviendha as a
  maintained theme the contract applies to.
- **Dropped Nynaeve from Aludra's list of supported/maintained themes** (plugin
  description, README, CLAUDE.md, readme.txt). Nynaeve was never actually a live Aludra
  host — it has its own separate native block library and doesn't require the plugin —
  so this just corrects the docs to match reality. Nynaeve remains the historical source
  many blocks were ported from; see `docs/PLAN-OF-ACTION.md`.

## [2.16.0] - 2026-07-20

### Added
- **Hero Split content anatomy** (`aludra/hero-split`) — the hero's inner template and the Homepage
  pattern gained the remaining elements from the C2 "Night in the Waste" mockup: a small-caps
  eyebrow/kicker line with an accent dot (`hero-split__eyebrow`), a two-tone headline (`<em>` inside
  the title renders upright in `primary`, or a rose tint on the Night style), a secondary
  outline/ghost CTA (core `is-style-outline`, given usable defaults since core's outline style
  otherwise inherits light-on-light theme button colours), and a proof-point trust line
  (`hero-split__trust` with accent-coloured `hero-split__check` marks). Block version 1.2.0.

### Changed
- **Night style CTA contrast** — on the dark band the default button now brightens `primary` via
  `color-mix(in oklch, … 82%, white)` (hover settles back on solid `primary`), and the ghost CTA
  flips to a light translucent outline. Both respect author-picked colours via
  `:not(.has-background)` / `:not(.has-text-color)` guards.
- **Homepage pattern** (`aludra/page-homepage`) — hero now ships with the Night style
  (`is-style-night`) and the new eyebrow ("WordPress & WooCommerce"), highlighted headline
  ("Fast Sites. *Real Results.*"), "See Our Work" ghost CTA, and trust line.
- **Warm fallbacks** — `hero-split__lead` fallback changed from cool gray `#6b7280` to warm
  `#57534E` so the block degrades gracefully under themes that don't define `secondary`.

## [2.15.0] - 2026-07-20

### Added
- **"Night" block style for Hero Split** (`aludra/hero-split`) — a dark hero variant selectable from the editor's style picker. Dark `main` background with a soft radial glow mixed from `primary`, light `base` heading, translucent lead text, a primary-tinted glow on the CTA, stronger imagery shadow, and a thin "ember line" gradient along the bottom edge. All colours resolve from the active theme's palette via `color-mix()` (fallbacks are Aviendha's values), and `:not(.has-background)` / `:not(.has-text-color)` guards keep author-picked colours in charge. Block version bumped to 1.1.0.
- **Aviendha hero design mockups** (`designs/aviendha/`) — three self-contained HTML design explorations for the split hero (C1 "Sand & Rose", C2 "Night in the Waste" — the basis for the new Night style — and C3 "Threefold Land") plus a comparison index page.

## [2.14.0] - 2026-07-20

### Added
- **Shared scroll-reveal utility** (`assets/js/scroll-reveal.js`) — a small vanilla `IntersectionObserver` script that toggles `.is-revealed` on elements carrying `data-aludra-reveal`, fading/sliding them into view as they cross into the viewport. No jQuery, no Interactivity API — plain DOM + CSS classes. Enqueued conditionally in `aludra.php` (new `aludra_blocks_have_reveal_on_scroll()` helper recursively scans the current post's parsed blocks), so it's never loaded on pages without an opted-in block.
- **CTA Columns** (`aludra/cta-columns`) gained a "Reveal on scroll" Inspector toggle (`revealOnScroll` attribute) — the first block wired to the new utility, per Phase 1 of `docs/CARD-EFFECTS-AND-SCROLL-ANIMATIONS.md`. Motion respects `prefers-reduced-motion: reduce`.

## [2.13.0] - 2026-07-20

### Added
- **Service Intro** block (`aludra/service-intro`) — introductory text section for service pages with constrained-width editable paragraphs, ported and generalised from Nynaeve's `imagewize/service-intro`.
- **Service Detail Cards** block (`aludra/service-blocks`) — stacked, numbered service cards with a heading, description, and checklist, ported and generalised from Nynaeve's `imagewize/service-blocks`. Hardcoded colours (label blue, headings, body text, card borders) replaced with theme colour presets and fallbacks, matching the convention established by `feature-cards`/`icon-grid`; the source's `DM Serif Display` font reference was dropped in favour of `font-family: inherit` so the block stays theme-neutral.
- Both new blocks registered in the `aludra_enabled` defaults and the Settings → Aludra admin page.

### Documentation
- Split the root `README.md`'s long per-block "Block Details" section out into `docs/BLOCKS.md`; the README now keeps only the short one-line "Included Blocks" summary list and links out for full feature notes.
- Added `docs/README.md` as an index of the `docs/` directory, separating living documents (`PLAN-OF-ACTION.md`, `BLOCKS.md`, `BLOCK-CONSOLIDATION-AND-RENAMING.md`) from historical point-in-time notes (admin panel, mega menu, phase plans, translations, wp.org submission prep).
- Replaced the README logo with the Forkawesome sun icon (`assets/logos/f-sun.svg`), sourced from Blade UI Kit (Blade Icons, MIT License); the earlier "nightflower" mark colourways remain in `assets/logos/` as alternates. Credited in README.md/readme.txt.

## [2.12.0] - 2026-07-20

### Added
- Dedicated **"Aludra" block inserter category** (`block_categories_all` filter in `aludra.php`) — all 20 `aludra/*` blocks moved off the shared core `design`/`widgets` categories into their own group, so they're easy to find as a set in the inserter.
- Keywords added to `carousel`, `feature-list-grid`, `pricing-tiers`, `search-overlay-trigger`, and `slide` block.json files (previously empty, hurting inserter search discoverability).

### Changed
- **Pricing Tiers** block title changed from `"Pricing Tiers (3 Column)"` to `"Pricing Tiers"` — the column count was an implementation detail, not a user-facing distinction. Description updated to describe it as a multi-column comparison layout.

## [2.11.5] - 2026-07-19

### Fixed
- **Homepage pattern "Our Clients" carousel** (`patterns/page-homepage.php`) — the 2.11.4 fix used an inline `style="width:100%;height:auto"` on each client-mockup `<img>`, which is not an attribute Gutenberg's `core/image` `save()` produces, so the block failed validation the moment the pattern was re-inserted/re-saved in the editor. Replaced it with `"align":"full"` on the image blocks (`alignfull` class on the figure) — a first-class Gutenberg attribute that already carries the `width:100%;height:auto` CSS in core, and round-trips through the editor without a validation error. Verified with `wp-pattern-sentinel`.

## [2.11.4] - 2026-07-19

### Fixed
- **Homepage pattern "Our Clients" carousel** (`patterns/page-homepage.php`) — the five client-mockup SVG images had hardcoded `width`/`height` HTML attributes but no CSS forcing them to fill their slide, so they rendered at a fixed 320px wide regardless of the carousel's computed slide width, leaving large empty gaps next to each mockup. Added an inline `width:100%;height:auto` style to each image so it scales to fill the slide while keeping its aspect ratio.

## [2.11.3] - 2026-07-19

### Changed
- **Homepage pattern "Our Clients" carousel** (`patterns/page-homepage.php`) — replaced the five carousel slides, which all reused the same 6-petal Aludra logo mark recolored, with five distinct mini browser-window mockups of fictional client sites (spa, ecommerce store, design agency, bike shop, restaurant), each with its own palette, layout, and fake domain in the mocked url bar. New source SVGs live in `assets/clients/`. The bike shop and restaurant cards use the Tabler `bike` and Maki `restaurant-noodle` icons via Blade UI Kit (Blade Icons, MIT License) — see README/readme.txt Credits.

## [2.11.2] - 2026-07-19

### Changed
- **Hero Split placeholder art** (`assets/placeholders/photo.svg`) — replaced the generic gray "broken image" mountain icon with a signature illustration: a stylised browser/site card with a lightning badge and a rising result bar-chart, staying fully grayscale so it drops into any theme's palette without hardcoding brand colour. Used by `patterns/page-homepage.php` (desktop + mobile hero images).
- **Hero Split CTA button** (`blocks/hero-split`) — the button inside `.hero-split__ctas` now gets a directional arrow (CSS `mask`, `currentColor`, so it always matches the button's own text colour) that nudges on hover, plus a soft shadow and a 2px lift on hover/focus-visible. No new block attributes; existing patterns render the new styling automatically once rebuilt.

### Documentation
- **README.md** — added the five blocks introduced in 2.11.0 (`hero-split`, `about`, `services-block`, `review-profiles`, `cta-banner`) and the homepage page pattern to the "Included Blocks" list and "Block Details", none of which had been documented there.

## [2.11.1] - 2026-07-19

### Fixed
- **Homepage page pattern missing default margin styles** — `patterns/page-homepage.php`'s hand-authored markup omitted the `style="margin-top:0;margin-bottom:0"` inline style that `hero-split`, `about`, `cta-banner`, `services-block`, and `review-profiles` all default via `style.spacing.margin` in `block.json`. `wp pattern validate` (structural, PHP `parse_blocks()`) didn't catch this since it doesn't apply attribute defaults from `block.json`; a `wp-pattern-sentinel` Pass 3 run (real Gutenberg `save()`, browser-based) against the released v2.11.0 blocks did. See `docs/PLAN-OF-ACTION.md` §14 for the general lesson on hand-authoring pattern markup against block attribute defaults.

## [2.11.0] - 2026-07-19

### Added
- **Hero Split** (`aludra/hero-split`) — split-pane hero ported and generalised from imagewize.com's `acf/hero`, with heading, lead text, CTA button, and a desktop/mobile image pair. The desktop/mobile image swap is a pure CSS media-query toggle between two seeded `core/image` blocks — no JS — and both stay independently editable in the editor.
- **About Section** (`aludra/about`) — plain content block (heading, lead paragraph, offer list, closing paragraph) ported from Nynaeve's `nynaeve/about`, theme-adaptive.
- **Services Block** (`aludra/services-block`) — icon + heading + text card grid, two-per-row, ported from Nynaeve's `imagewize/services-block`. Icons resolve via the existing `aludra/icon` block-binding and bundled `assets/icons/*.svg`, the same mechanism as `feature-cards`/`icon-grid` — no dedicated SVG block needed.
- **Review Profiles** (`aludra/review-profiles`) — heading plus a three-up grid of round avatar photo and quote, ported and generalised from Nynaeve's `imagewize/review-profiles`. Hardcoded `#f97316` background replaced with `supports.color` and a preset-fallback chain; avatars ship as empty `core/image` placeholders with generic testimonial copy rather than real client photos/names.
- **CTA Banner** (`aludra/cta-banner`) — full-width call-to-action band (heading, lead text, button) ported and generalised from Nynaeve's `nynaeve/cta-block-blue`. Uses `supports.color.background`/`text` (native theme.json palette) plus a `var(--wp--preset--color--primary, #017cb6)`-style fallback chain, establishing the theme-adaptive colour convention the rest of this release's blocks reuse.
- **FAQ Tabs accordion mode** — `aludra/faq-tabs` gained a `displayMode: 'tabs' | 'accordion'` attribute with a `BlockControls` toolbar toggle and an `InspectorControls` panel. `'accordion'` runs the block's existing accordion layout (previously only the mobile fallback for the two-column tab layout) at every breakpoint instead of just below the mobile media-query threshold. Resolves the FAQ block-convergence decision from `docs/PLAN-OF-ACTION.md` §11.3 — no separate FAQ block needed.
- **Homepage page pattern** (`patterns/page-homepage.php`, slug `aludra/page-homepage`) — a full agency/service-business homepage assembled from this release's blocks (hero-split, about, carousel, cta-banner, pricing-tiers, services-block, review-profiles, faq-tabs in accordion mode), modelled on imagewize.com's homepage layout with generic placeholder copy. New `patterns/page-*.php` auto-discovery in `aludra.php`, mirroring the existing `mega-menu-*.php` loader, registers these with `blockTypes: ['core/post-content']` so they appear in the Site Editor's "choose a pattern" picker when creating a new page, in addition to the inserter.
- New `assets/placeholders/` directory (`photo.svg`, `avatar.svg`) — generic bundled placeholder art (no external image-service hotlinks) used by the homepage pattern's hero images and review avatars.
- `@imwz/wp-pattern-sentinel` added as a root dev dependency, with `validate`/`validate:new`/`validate:file`/`validate:clear-cache` npm scripts, for browser-based pattern validation against a local Trellis/Bedrock test site.

## [2.10.0] - 2026-07-14

### Added
- **Contact Section** (`aludra/contact-section`) — dark contact section ported from the Nynaeve theme (`imagewize/contact-section`), with an intro, a two-column info/details grid (email, response time, location via the `aludra/icon` binding), an "available for new projects" badge, and a Contact Form 7 shortcode card. Generalised to theme colour presets with fallbacks.
- **Hero Banner** (`aludra/hero-banner`) — dark full-width hero ported and generalised from Nynaeve's `imagewize/service-hero`, with an eyebrow badge, heading, lead text, and dual CTA buttons. Nynaeve's four hardcoded colour-scheme block styles (midnight/forest/violet/slate) were dropped in favour of theme colour presets with fallbacks, matching the rest of Aludra's ported blocks.
- New `icon-mail.svg` and `icon-search.svg` assets in `assets/icons/`, resolved via the existing `aludra/icon` binding.
- Both blocks registered in the `aludra_enabled` defaults and the Settings → Aludra admin page.

## [2.9.4] - 2026-07-13

### Fixed
- The Settings → Aludra page showed the "Settings saved." notice twice after saving. The page manually added its own notice on top of the one the Settings API already queues via `options.php`; the redundant manual notice has been removed.

### Security
- Added a direct-file-access guard (`if ( ! defined( 'ABSPATH' ) ) { exit; }`) to all eight `patterns/mega-menu-*.php` files, resolving the `missing_direct_file_access_protection` errors reported by Plugin Check. The pattern files ship in the distribution (mega-menu needs them), so excluding them from the check was not an option; the guard is a no-op when the files are loaded normally via `include`.

## [2.9.3] - 2026-07-13

### Changed
- Redesigned the Settings → Aludra page as a categorized, multi-column grid of block cards instead of a single-column checkbox list. Blocks are grouped into **Carousel**, **Interactive**, and **Marketing & Content** sections, each rendered in a responsive card grid with toggle switches, a function glyph, and the block's namespace.
- The page now renders its own markup rather than the Settings API `do_settings_sections()` form-table, while keeping the same `aludra_enabled[...]` field names so the save/sanitize path is unchanged.

### Added
- Live "enabled / total" counter in the settings header that updates as toggles change.
- Per-card dependency chips surfacing parent-child rules ("Requires Carousel" on Slide, "Requires FAQ Tabs" on FAQ Tab Answer); dependent toggles are disabled when their parent is off.
- `category` metadata on each block in `aludra_get_available_blocks()` and a new `aludra_get_block_categories()` helper defining category order and labels.

## [2.9.2] - 2026-07-13

### Fixed
- Settings → Aludra admin CSS/JS failed to enqueue because `plugins_url()` was called with a directory path instead of a file path, so the settings page rendered as an unstyled checkbox list.
- Child-block row indentation (Slide, FAQ Tab Answer) never applied because the CSS targeted `data-parent` on the table row instead of the checkbox.
- "Enable All" / "Disable All" skipped dependency/disabled-state styling for child block checkboxes.
- The frontend asset enqueue used an incomplete `aludra_enabled` default (only `carousel`), out of sync with the block-discovery default, so on a fresh install Testimonial Grid assets could fail to load before the option was saved.

### Changed
- Removed stale references to the unimplemented `aludra/nav-builder` block; Mega Menu can only be placed inside `core/navigation`.
- Updated `CLAUDE.md` and the plugin description header to reflect the full current block list (13 blocks, not 6).

## [2.9.1] - 2026-07-11

### Fixed
- Composer package description incorrectly read "Custom WordPress blocks for the Aludra theme"; Aludra is a theme-neutral shared block library used across Nynaeve, Elayne, and Aviendha (and any other WordPress theme), not tied to a single "Aludra theme". Description updated to match `aludra.php` and `readme.txt`.

## [2.9.0] - 2026-07-11

### Added
- Four more Tier-A blocks ported from the Nynaeve theme, re-namespaced `imagewize/*` → `aludra/*`:
  - **Pricing Tiers** (`aludra/pricing-tiers`) — three-column pricing comparison table with featured tier highlighting, built entirely from InnerBlocks and editable core blocks
  - **Testimonial Grid** (`aludra/testimonial-grid`) — grid of customer testimonials with metrics; automatically becomes a Slick Carousel on larger sets (4+ cards on desktop, 2+ on mobile), otherwise renders as a static grid
  - **CTA Columns** (`aludra/cta-columns`) — dual call-to-action cards with headings, descriptions, buttons, and a color-variant inspector control
  - **Feature List Grid** (`aludra/feature-list-grid`) — two-column grid of features with checkmarks and hover effects
- The four new blocks are registered in the `aludra_enabled` defaults and the Settings → Aludra admin page.

### Changed
- The conditional Slick Carousel asset loader (`wp_enqueue_scripts`) now fires for either `aludra/carousel` or `aludra/testimonial-grid`, so both blocks share the same vendored Slick library instead of loading it twice.
- Replaced the README logo with an original "nightflower" mark (a six-petal bloom in an ember-orange gradient) — a nod to the fireworks ("Nightflowers") made by the Guild of Illuminators in *The Wheel of Time*, Aludra's namesake. Five colourway variants are kept in `assets/logos/` for future swaps.

### Notes
- Continues the Tier-A import outlined in `docs/PLAN-OF-ACTION.md`; remaining Tier-A/B blocks will follow in later releases.

## [2.8.0] - 2026-07-10

### Added
- Three Tier-A blocks ported from the Nynaeve theme, re-namespaced `imagewize/*` → `aludra/*` and generalised for theme neutrality (theme colour presets referenced with fallbacks so any theme renders correctly):
  - **Feature Cards** (`aludra/feature-cards`) — responsive grid of feature highlight cards with icons, hover effects, and a section header
  - **Icon Grid** (`aludra/icon-grid`) — auto-fit grid of icon + text items with an eyebrow, title, and lead
  - **Trust Bar** (`aludra/trust-bar`) — inline bar of trust-signal items (icon + text) that wraps on mobile
- `aludra/icon` block binding source — resolves bundled SVG icons from `assets/icons/` at render time, so no absolute URLs are stored in content and icons survive site moves. Reusable by all current and future icon-based blocks.
- Bundled SVG icon set under `assets/icons/`, exposed to the block editor via `window.aludraIcons`.
- The three new blocks are registered in the `aludra_enabled` defaults and the Settings → Aludra admin page.

### Changed
- Upgraded `@wordpress/scripts` to `^32.6.0` across all blocks (ESLint 8 → 9 flat config, updated build tooling).
- Adopted the canonical block setup used by the current `@wordpress/create-block` scaffold: each block now declares the `@wordpress/*` packages it imports as dependencies (still externalised at build, so no bundle bloat), which is how ESLint resolves those imports without custom configuration.

### Fixed
- Resolved all lint violations surfaced by the ESLint 9 toolchain across existing blocks — duplicate imports, unused variables, shadowed variables, JSDoc parameter types, a forced-reflow expression, mega-menu interactivity global usage, and an editor accessibility fix in FAQ Tabs.

### Notes
- Continues the Tier-A import outlined in `docs/PLAN-OF-ACTION.md`; further Tier-A/B blocks will follow in later releases.

## [2.7.2] - 2026-07-10

### Changed
- Renamed the plugin from **Elayne Blocks** to **Aludra** — a theme-neutral shared block library for the Imagewize block themes (Nynaeve, Elayne, and the new Aviendha e-commerce theme). Block namespace changed from `elayne-blocks/*` to `aludra/*`; text domain (`aludra`), constants (`ALUDRA_*`), PHP namespace (`Aludra`), and language files updated to match.

### Notes
- Aludra is the direct continuation of the **Elayne Blocks** plugin (versions ≤ 2.7.1); the full history lives in that repository. Existing sites rendering `elayne-blocks/*` blocks will need a namespace migration — see `docs/PLAN-OF-ACTION.md`.

## [2.7.1] - 2026-03-17

### Fixed
- Block validation errors in all 5 built-in carousel patterns — carousel div classes and `data-*` attributes now match the `save` function output exactly
- Slide blocks in the Portfolio Showcase pattern had inline `style="width:Npx"` attributes that the save function never outputs
- Incorrect `speed:500` in pattern data-slick JSON; correct default is `300`
- Missing `lazyLoad:"ondemand"`, `data-dots-top`, `data-dots-bottom`, and all `data-arrow-*` attributes in carousel pattern HTML

## [2.7.0] - 2026-02-15

### Added
- Admin settings page under Settings → Aludra for block management
- Ability to selectively enable/disable individual blocks
- Checkbox controls for all 6 blocks (Carousel, Slide, Mega Menu, FAQ Tabs, FAQ Tab Answer, Search Overlay Trigger)
- Parent-child block dependency enforcement (Carousel→Slide, FAQ Tabs→FAQ Tab Answer)
- Bulk actions: "Enable All" and "Disable All" buttons
- Real-time JavaScript dependency handling in settings UI
- Confirmation dialogs when disabling parent blocks with dependencies
- Block descriptions and dependency warnings in settings UI
- Admin CSS and JavaScript for enhanced settings page interactivity

### Changed
- Block registration now respects admin settings (disabled blocks won't register)
- Carousel asset loading now checks both settings and block presence for optimization
- Settings stored persistently in WordPress options (`aludra_enabled`)

### Security
- Proper capability checks (`manage_options`) for settings access
- WordPress Settings API integration with automatic nonce handling
- Input sanitization and validation for all settings
- PHPCS WordPress coding standards compliance

### Documentation
- Added `docs/ADMIN-PANEL-PLAN.md` - Complete implementation plan
- Added `docs/ADMIN-PANEL-TESTING.md` - Comprehensive testing guide
- Added `docs/ADMIN-PANEL-IMPLEMENTATION.md` - Implementation summary

## [2.6.0] - 2026-02-15

### Changed
- Updated minimum WordPress version requirement from 6.7 to 6.9
- Updated minimum PHP version requirement from 7.3 to 7.4
- Fixed text domain consistency across all blocks (carousel, mega-menu, slide) from `aludra` to `aludra`

### Added
- Dutch translation files (nl_NL)
  - Added `languages/aludra-nl_NL.po` with complete Dutch translations
  - Added `languages/aludra.pot` template file for translation support
- Translation extraction script added to `.gitignore`
- Comprehensive documentation in `/docs` directory
  - Language files creation guide
  - Dutch translation summary
  - Plugin issues documentation

### Fixed
- Text domain consistency ensures proper translation loading across all blocks
- All blocks now correctly use `aludra` text domain for WordPress.org compatibility
- **WordPress.org compliance improvements:**
  - Security check now placed before namespace declaration (WordPress.org requirement)
  - `@package` tag moved outside main plugin header comment block
  - Plugin constants now defined immediately after security check

## [2.5.8] - 2026-01-21

### Changed
**Menu Template Part Patterns:**
- Register menu template part patterns without `templateTypes`, keeping menu categories and block type targeting intact for broader compatibility.

### Fixed
**Pattern Registration Compatibility:**
- Avoids using `templateTypes` in pattern registration for menu template parts to reduce editor compatibility issues.",

## [2.5.7] - 2026-01-21

### Fixed
**Mega Menu Mobile Responsiveness:**
- Fixed horizontal overflow on mobile using proper full-width positioning (left: 0, right: 0, width: 100%)
- Added box-sizing: border-box to ensure padding is included in width calculation
- Fixed close button positioning on mobile devices - now properly anchored at top-right corner
- Added overflow-y scrolling for mega menu panels on mobile to prevent content cutoff
- Improved z-index layering to ensure close button remains accessible above panel content
- Removed horizontal padding from services showcase pattern to prevent overflow",

## [2.5.6] - 2026-01-21

### Fixed
**Mega Menu Overlay Mode:**
- Fixed close button positioning in overlay mode - now anchored to bottom-right corner (20px from edges) instead of top-right
- Improved close button visibility and user experience on mobile devices

### Technical
- Optimized variable alignment in render.php for improved code readability
- Regenerated CSS build files with updated close button positioning",

## [2.5.5] - 2026-01-21

### Added
**Menu Template Part Area Registration:**
- Added plugin-level registration of 'menu' template part area for mega menu support
- Removes dependency on Aludra theme for mega menu functionality
- Allows template parts with area 'menu' to be created in any theme
- Makes mega menu block fully self-contained and theme-independent

**Mega Menu Pattern:**
- Added Services Showcase pattern (aludra/mega-menu-services-showcase)
- Three-column grid layout with nested card components
- Features service categories (Consulting, Development, Support) with sub-service links
- Sophisticated design with custom icons, rounded corners, and contrasting colors
- Responsive grid layout with minimum column width of 19rem",

## [2.5.4] - 2026-01-20

### Changed
**Pattern Separator Blocks:**
- Updated all mega menu patterns to use WordPress 6.7+ compatible separator format
- Removed inline opacity styles and custom background colors that caused block validation errors
- Separators now use `has-alpha-channel-opacity` class and inherit theme colors automatically

### Technical
**Documentation Updates:**
- Added Pattern Development Guidelines section to CLAUDE.md with separator block best practices
- Added Pattern Development section to AGENTS.md with WordPress 6.7+ compatibility notes
- Documented correct vs. incorrect separator formats to prevent future validation errors",

## [2.5.3] - 2026-01-20

### Added
**Mega Menu Icon Features Pattern:**
- Introduced a new "Icon Features" mega menu pattern with styled icon badges, headings, and short descriptions for feature highlights.

### Changed
**Mega Menu Pattern Styling Enhancements:**
- Refined list-based navigation patterns to use theme spacing presets, no-indent list styles, and consistent link colors for cleaner, more modern layouts.
- Added separators, heading size tweaks, and improved typography hierarchy across simple, three-column, multi-column, image-links, and featured-content patterns.
- Enhanced promotional blocks with bordered cards, padded containers, rounded images, and full-width buttons for stronger visual emphasis.

### Technical
**Pattern Documentation Updates:**
- Updated the mega menu pattern guidance to emphasize semantic list usage for navigation and reserve special content layouts for promotional sections.
- Clarified list styling recommendations and expanded notes on featured content use cases.

**Release Workflow:**
- Added the release script to `.gitignore` to keep local release tooling out of version control.",

## [2.5.2] - 2026-01-19

### Added
- PHP CodeSniffer (PHPCS) configuration with WordPress coding standards
- GitHub Actions workflow for automated WPCS checks on pull requests
- Composer scripts for code quality: `composer lint`, `composer wpcs:scan`, `composer wpcs:fix`
- PHP parallel lint for syntax validation
- PHPCompatibility checks for PHP version compatibility

### Changed
- Added `phpcs.xml.dist` with WordPress coding standards configuration
- Updated composer.json with development dependencies: php-parallel-lint, phpcompatibility-wp
- Added phpcs.xml to .gitignore to allow local configuration overrides

### Fixed
- WordPress coding standards compliance in mega-menu render.php (equals sign alignment, comment punctuation)
- PHPCS workflow now properly excludes patterns directory from checks

## [2.5.1] - 2026-01-19

### Documentation
- Updated credits in README.md and readme.txt to accurately reflect substantial enhancements to both Mega Menu and Carousel blocks
- Clarified that Mega Menu implementation is approximately 181% larger than original HM Mega Menu Block with extensive additional features
- Clarified that Carousel block is completely reimplemented using Slick Carousel (vs original Swiper.js) with distinct feature set

## [2.5.0] - 2026-01-19

### Added
- Mega menu dropdown spacing control with configurable range (0-48px, default 16px)
- Mega menu dropdown maximum width control with slider (300-1600px range, default 600px)
- Mega menu "Use Full Width" option to align dropdown with navigation container width
- Mega menu JavaScript-based automatic positioning for full-width dropdowns

### Changed
- Mega menu default dropdown spacing increased from 8px to 16px for better visual separation
- Mega menu dropdown width now uses CSS variables for flexible, theme-agnostic control (desktop only, mobile remains full-width)
- Mega menu full-width mode uses JavaScript to automatically calculate position based on navigation container
- Mega menu full-width dropdowns now use `position: fixed` for consistent viewport positioning

### Fixed
- Mega menu full-width dropdown positioning now automatically aligns with navigation container without manual offset adjustments
- Mega menu full-width dropdowns properly position on window resize
- Mega menu full-width dropdowns recalculate position when menu opens to account for page scroll

## [2.4.1] - 2026-01-19

### Changed
- Mega menu block now only supports dropdown and overlay layout modes (removed sidebar and grid modes)
- Mega menu dropdown positioning improved with minimum width of 600px for better content display
- Mega menu documentation updated to reflect simplified layout options
- Backdrop blur effect now only available for overlay mode

### Fixed
- Mega menu dropdown width calculation now uses `min-width` instead of `max-content` for consistent sizing
- Mega menu mobile positioning improved to handle viewport constraints better

### Documentation
- Updated mega menu README with accurate layout mode descriptions
- Added comprehensive mega menu pattern improvements proposal document
- Simplified CLAUDE.md to reflect current layout mode support

## [2.4.0] - 2026-01-18

### Added
- Mega menu block now supports multiple layout modes: dropdown, overlay, sidebar, and grid
- Mega menu template part integration using WordPress template parts for content management
- Six pre-built mega menu patterns (simple list, three column, icon grid, featured content, image links, multi-column)
- Mega menu animation controls with fade, slide, scale, and slide-fade effects
- Mega menu icon support with Dashicons picker and custom SVG options
- Mega menu hover activation option for dropdown and grid modes
- Mega menu styling controls including box shadow, border radius, border width/color, and backdrop blur
- Mega menu responsive controls with customizable mobile breakpoint and mobile mode toggle
- Mega menu dropdown alignment options (left, right, center)
- Mega menu README documentation for usage and theme integration

### Changed
- Mega menu block enhanced with additional layout modes, patterns, and improved editor controls
- Mega menu editor interface reorganized with improved layout picker and animation controls
- Mega menu now requires theme integration with 'menu' template part area registration
- Mega menu positioning system improved with better dropdown, overlay, sidebar, and grid calculations
- Mega menu mobile behavior enhanced with responsive breakpoint support

### Fixed
- Mega menu mobile positioning now correctly handles viewport constraints
- Mega menu template part selection properly scoped to theme namespace
- Mega menu Interactivity API initialization improved for reliable state management

### Documentation
- Added comprehensive mega menu README with usage guide and theme integration requirements
- Updated CLAUDE.md with detailed mega menu architecture and template part workflow
- Added multiple planning documents for mega menu enhancement phases

## [2.3.1] - 2026-01-16

### Documentation
- Added CONTRIBUTING.md with build, linting, and testing guidance
- Simplified README by removing build instructions and duplicate changelog content

## [2.3.0] - 2026-01-16

### Added
- Advanced carousel features: thumbnail navigation, center mode with peek, variable width slides, lazy loading, and expanded adaptive height controls
- Carousel arrow customization with multiple SVG styles, background shapes, sizes, and custom SVG support
- Five carousel block patterns (Hero, Testimonial, Product Gallery, Portfolio, Team Members)
- Unique block icons for Carousel and Slide
- Slick font assets for carousel UI compatibility

### Changed
- Carousel styling for thumbnails, dots, RTL layouts, and responsive behavior
- Carousel editor controls reorganized with toolbar toggles and grouped panels

### Fixed
- Active dot visibility now remains filled when not hovered
- Thumbnail navigation edge cases (enable checks, arrows off)

### Documentation
- Added Hybrid Enhancement Strategy documentation
- Updated carousel enhancement progress and feature details
- Updated README with carousel feature highlights (thumbnails, arrow customization, patterns)

## [2.2.3] - 2026-01-16

### Documentation
- Added proper attribution for Carousel Block plugin by Virgiliu Diaconu to Credits section in README.md and readme.txt
- Acknowledged original work from https://wordpress.org/plugins/carousel-block/ that the carousel block is based on

## [2.2.2] - 2026-01-15

### Fixed
- WordPress.org plugin repository compliance
  - Fixed text domain consistency: all blocks now use `aludra` instead of mixed `imagewize`, `aludra`, etc.
  - Added ABSPATH security check to mega-menu render.php
  - Updated `load_plugin_textdomain()` hook from `plugins_loaded` to `init` (best practice)
  - Added proper function prefixes: `aludra_allow_additional_mime_types` and `aludra_fix_media_display`
  - Added `@package Aludra` tag to main plugin file header
  - Fixed PHP opening tag formatting in mega-menu render.php
  - Created `/languages/` folder for translation files
  - Removed deprecated `load_plugin_textdomain()` call (WordPress 4.6+ auto-loads translations for WordPress.org plugins)
  - Fixed global function prefix: `moiraine_mega_menu_block_init` → `aludra_mega_menu_block_init`
- Updated carousel block ALLOWED_BLOCKS constant from `imagewize/slide` to `aludra/slide`

### Changed
- All text strings now use consistent `aludra` text domain for proper translation support
- Function names now properly prefixed to avoid conflicts
- `.distignore` file updated to exclude `AGENTS.md` from WordPress.org distribution
- Plugin Check workflow now builds distribution directory before checking to respect `.distignore` exclusions

### Documentation
- Added Git Commit Guidelines to CLAUDE.md (never mention AI tools in commits)
- Added Version Management section to CLAUDE.md (synchronize CHANGELOG.md, readme.txt, and aludra.php)

## [2.2.1] - 2026-01-15

### Added
- WordPress.org plugin repository infrastructure
  - `readme.txt` file following WordPress.org plugin readme standards
  - `.distignore` file for excluding development files from distribution
  - GitHub Actions workflow for automated plugin release zip creation
  - GitHub Actions workflow for WordPress plugin quality checks
  - Comprehensive plugin documentation including FAQ, installation, and third-party library credits

### Changed
- Plugin now ready for WordPress.org submission and distribution
- Automated release process via GitHub releases

## [2.2.0] - 2026-01-07

### Added
- Search Overlay Trigger block (`aludra/search-overlay-trigger`)
  - Clickable search icon that opens full-screen search overlay
  - Customizable overlay background color (with alpha transparency support)
  - Customizable search bar border color
  - Customizable close button color
  - Smooth fade-in/scale animations for overlay appearance
  - Auto-focus on search input when opened
  - Close via X button, backdrop click, or Escape key
  - Body scroll lock when overlay is active
  - Responsive design with mobile-optimized layout
  - Backdrop blur effect for visual depth
  - Vanilla JavaScript (no dependencies)
  - Accessibility features (ARIA labels, keyboard support)

## [2.1.11] - 2025-12-31

### Added
- Repository logo with golden gradient (matching Aludra's lily sigil theme from Wheel of Time)
- Logo displayed in README header

### Changed
- Updated README with centered logo at top
- Added icon credit to Blade UI Kit in README credits section

## [2.1.10] - 2025-12-24

### Fixed
- Carousel block frontend initialization now uses correct CSS class selector `.wp-block-aludra-carousel` (was incorrectly using `.wp-block-imagewize-carousel`)
- Carousel slides now properly initialize and function on frontend (sliding, arrows, dots navigation)

## [2.1.9] - 2025-12-24

### Changed
- FAQ Tabs block now uses different arrow icons for desktop vs mobile layouts
- Desktop tabs use right-pointing arrow (indicates content appears to the right)
- Mobile accordion uses down chevron when closed and up chevron when open (standard accordion pattern)

### Fixed
- Improved visual communication of FAQ Tabs block interaction patterns
- Arrow directions now match UI conventions (tabs vs accordions)

## [2.1.8] - 2025-12-24

### Fixed
- FAQ Tabs block arrow direction now matches content layout on desktop (points right instead of down)
- Desktop tabs maintain right-pointing arrow when active, indicating content direction
- Mobile accordion arrows still rotate down when expanded for proper accordion UX

## [2.1.7] - 2025-12-24

### Added
- FAQ Tabs block now includes default demo content for answers
- FAQ Tab Answer block template includes two paragraphs of professional placeholder text
- Three default FAQ questions now pre-populate with comprehensive demo content about services, project timelines, and unique approach

### Changed
- FAQ Tab Answer InnerBlocks template updated from placeholder-only to content-populated paragraphs

## [2.1.6] - 2025-12-24

### Changed
- FAQ Tabs block now defaults to wide alignment

### Fixed
- Corrected default alignment implementation to explicitly set align attribute via useEffect hook in Edit component, working around WordPress Gutenberg limitation where default attribute values don't get serialized to block markup (previous implementations in 2.1.4 and 2.1.5 relied on block.json defaults which don't force attribute serialization)

## [2.1.5] - 2025-12-24

### Changed
- FAQ Tabs block alignment default (reverted - incorrect implementation using supports.default)

## [2.1.4] - 2025-12-24

### Changed
- FAQ Tabs block alignment default (reverted - incorrect implementation)

## [2.1.3] - 2025-12-24

### Changed
- FAQ Tabs block now uses mobile accordion layout on viewports ≤ 781px
- Answers now appear directly below their questions on mobile (instead of in separate column)
- Mobile accordion allows independent expand/collapse for each FAQ item
- Desktop maintains two-column tab layout with answers on the right
- Added smooth slide-down animation for mobile accordion expansion
- Viewport resize automatically switches between desktop tabs and mobile accordion

### Fixed
- Mobile UX improved: users no longer need to scroll past all questions to see answers

## [2.1.2] - 2025-12-23

### Added
- Contributor guidelines in `AGENTS.md`

### Changed
- FAQ Tabs editor questions are now inline-editable with RichText
- FAQ Tabs layout spacing and mobile overflow handling improved

## [2.1.1] - 2025-12-23

### Changed
- **BREAKING:** Restructured FAQ Tabs block to use parent-child InnerBlocks pattern
  - FAQ Tabs block (`aludra/faq-tabs`) now uses InnerBlocks instead of attribute-based storage
  - Content is now stored in child blocks rather than block attributes
  - Users will need to recreate existing FAQ Tabs blocks with the new structure

### Added
- FAQ Tab Answer block (`aludra/faq-tab-answer`)
  - Child block for individual FAQ answers with InnerBlocks support
  - Accepts any block content (paragraphs, images, buttons, etc.) for rich FAQ answers
  - Editable question text and answer title
  - Parent constraint (only works inside FAQ Tabs block)
  - Full formatting control over answer content

### Fixed
- FAQ Tabs frontend JavaScript rewritten to work with block-based content structure
- Tab navigation now dynamically generated from child blocks on page load

## [2.1.0] - 2025-12-23

### Added
- FAQ Tabs block (`aludra/faq-tabs`)
  - Interactive FAQ section with vertical tab navigation
  - Dynamic content display with smooth transitions
  - Configurable questions, titles, and descriptions
  - Customizable call-to-action button
  - Responsive design with mobile-optimized layout
  - Frontend interactivity powered by vanilla JavaScript
  - Supports WordPress color and spacing controls

## [2.0.0] - 2025-12-23

### Changed
- **BREAKING:** Renamed project from "Moiraine Blocks" to "Aludra"
- **BREAKING:** Updated all block namespaces from `moiraine/` and `imagewize/` to `aludra/`
  - `moiraine/mega-menu` → `aludra/mega-menu`
  - `imagewize/carousel` → `aludra/carousel`
  - `imagewize/slide` → `aludra/slide`
- **BREAKING:** Updated text domain from `moiraine-blocks` to `aludra`
- **BREAKING:** Updated PHP namespace from `MoiraineBlocks` to `Aludra`
- Updated composer package name from `imagewize/moiraine-blocks` to `imagewize/aludra`
- Updated all CSS class names to use `aludra` instead of `moiraine` or `imagewize`
- Updated plugin file name from `moiraine-blocks.php` to `aludra.php`
- Updated GitHub repository URLs to point to `aludra`
- Updated all references to "Moiraine theme" to "Aludra theme"

### Migration Guide
This is a major breaking release. Sites using the previous version will need to:
1. Deactivate and delete the old `moiraine-blocks` plugin
2. Install and activate `aludra`
3. Update any theme template parts that reference the old block names
4. Update custom CSS that uses the old class names

## [1.2.0] - 2025-11-16

### Added
- Adaptive Height option in carousel block to automatically adjust carousel height to match current slide height
- ToggleControl for Adaptive Height in carousel block editor settings with helpful description

### Changed
- Updated carousel block to include adaptiveHeight attribute in Slick carousel configuration

## [1.1.0] - 2025-11-14

### Added
- Carousel block frontend view script for Slick initialization
- Slick Carousel library files (CSS and JS) vendored in carousel block directory
- ViewScript support in carousel block.json for proper frontend asset loading

### Changed
- Improved carousel block asset loading with dedicated view.js file
- Excluded PR creation script from repository

### Fixed
- Carousel block now properly initializes Slick on the frontend with custom arrow colors and dot positioning

## [1.0.1] - 2025-11-14

### Added
- GPL-3.0 LICENSE.md file with full license text

### Changed
- Updated carousel block namespace from `moiraine/carousel` to `imagewize/carousel` for consistency
- Updated package namespace to `imagewize/moiraine-blocks` in composer.json
- Updated composer package type and metadata for better Packagist compatibility

## [1.0.0] - 2025-11-14

### Added
- Initial release of Moiraine Blocks plugin
- Mega Menu block (`moiraine/mega-menu`)
  - WordPress Interactivity API integration
  - Template part support for dynamic menu content
  - Keyboard navigation support (Escape key to close)
  - Outside-click dismissal
  - Focus management
  - Customizable styling options
- Carousel block (`imagewize/carousel`)
  - Slick Carousel integration
  - Responsive breakpoint configuration
  - Customizable slides to show/scroll
  - Arrow and dot navigation options
  - Custom arrow color support
  - Touch/swipe support
- Slide block (`imagewize/slide`)
  - InnerBlocks support for flexible content
  - Parent constraint (only works inside Carousel block)
  - Unique slide ID generation
- Conditional asset loading (Slick Carousel only loads when carousel block is used)
- SVG and WebP upload support in media library
- Translation support with text domain `moiraine-blocks`
- Composer support for installation via Packagist

### Changed
- Migrated blocks from Moiraine theme to standalone plugin (WordPress.org theme review compliance)
