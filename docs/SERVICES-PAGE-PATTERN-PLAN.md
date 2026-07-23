# Services Page Pattern — Plan

_Status: **done**, shipped in **2.24.0** (2026-07-23) as `patterns/page-service.php`, alongside
`patterns/page-homepage.php`. Written and executed 2026-07-23. Outcomes are recorded in §10._

## 1. Goal

Aludra ships exactly one page pattern today — `aludra/page-homepage`, live on
`http://demo.imagewize.test/aviendha/`. There is **no services/landing page pattern**.

This plan covers porting imagewize.com's secondary service-page layout
(`http://imagewize.test/services/speed-optimization/`, Nynaeve theme, `~/code/imagewize.com/site`)
into a **theme-neutral Aludra page pattern** that renders correctly on **Aviendha**
(`~/code/aviendha`) using only `aludra/*` and core blocks.

Two things are explicitly **not** goals:

- Shipping Imagewize's own speed-optimization sales copy. Aludra is a GPL plugin for
  wp.org; its patterns carry generic placeholder copy. Precedent: `service-blocks` (v2.13.0)
  had the Nynaeve source's SEO-service copy genericised on import — see
  [PLAN-OF-ACTION.md](./PLAN-OF-ACTION.md) §3 Tier B.
- Porting Nynaeve's visual design. Nynaeve's look (blue `#017cb6`, Montserrat/Open Sans,
  `3xl`/`xl`/`lg` size slugs) is not Aviendha's. We port **structure and section order**,
  and re-dress it in Aviendha's design language — same treatment the homepage pattern got.

## 2. Source of truth

| Thing | Location |
|---|---|
| Reference page markup | `wp post get <id> --field=post_content` on `imagewize.com` (VM), route `/services/speed-optimization/` |
| Reference render | `http://imagewize.test/services/speed-optimization/` |
| Target theme | `~/code/aviendha` (`theme.json`, `styles/twilight.json`) |
| Target site | `http://demo.imagewize.test/aviendha/` |
| House style for page patterns | `patterns/page-homepage.php` |
| Design direction | `designs/aviendha/aviendha-redesign.html` (commit `7433120`) |

## 3. Block mapping — source → target

The reference page uses 8 section blocks. Seven map onto blocks Aludra already ships:

| Nynaeve source block | Aludra target | Status |
|---|---|---|
| `imagewize/service-hero` | `aludra/hero-banner` | ✅ ported v2.10.0 (this block *is* `service-hero`, generalised) |
| `imagewize/trust-bar` | `aludra/trust-bar` | ✅ ported v2.8.0 |
| `imagewize/feature-cards` | `aludra/feature-cards` | ✅ ported v2.8.0 |
| `imagewize/two-column-card` | — | ❌ **gap** — see §4.1 |
| `imagewize/pricing-tiers` | `aludra/pricing-tiers` | ✅ ported v2.9.0 |
| `imagewize/faq` (accordion) | `aludra/faq-tabs` + `aludra/faq-tab-answer`, `displayMode: "native"` | ✅ resolved v2.11.0 (accordion is a display mode, not a separate block) |
| `nynaeve/cta-block-blue` | `aludra/cta-banner` | ✅ ported v2.11.0 |
| `core/html` (JSON-LD `Service` schema) | — | ⚠️ decision needed — see §4.2 |

So the pattern is **one gap and one decision away** from being assemblable from shipped blocks.
No new block work is strictly required if §4.1 resolves as "reuse".

## 4. Gaps and decisions

### 4.1 `two-column-card` → reuse `aludra/feature-list-grid` (recommended)

The "Why Choose Imagewize" section is: a centered `h2`, then two columns, each holding two
stacked cards of `h4` + paragraph. `two-column-card` is listed as an unported Tier A candidate
in [PLAN-OF-ACTION.md](./PLAN-OF-ACTION.md) §3.

`aludra/feature-list-grid` (v2.9.0) is structurally the same thing: a thin `InnerBlocks`
wrapper whose stylesheet renders `.feature-list-grid__card` (base background, `border-light`
hairline, `0.75rem` radius, `2.5rem` padding) inside `.feature-list-grid__columns`. Its cards
carry an `h4` + body and an optional checklist `ul`.

**Recommendation: reuse `feature-list-grid`, don't port `two-column-card`.** Two blocks that
both mean "grid of headed text cards" is exactly the duplication
[BLOCK-CONSOLIDATION-AND-RENAMING.md](./BLOCK-CONSOLIDATION-AND-RENAMING.md) is trying to
avoid. Cost: the section heading has to sit outside the block (as a `core/heading`, or as the
`spine-section` heading — see §6), because `feature-list-grid` has no heading slot.

If side-by-side comparison on the demo site shows the two genuinely differ, the fallback is to
port `two-column-card` as its own block, which is a separate work item and would push this
pattern behind a minor version bump.

**Pre-existing bug to fix while we are here:** `blocks/feature-list-grid/src/style.scss:56`
hardcodes the checkmark SVG stroke as `%23017cb6` — Nynaeve blue, with no palette fallback
chain. This violates [PALETTE-CONTRACT.md](./PALETTE-CONTRACT.md) §"Fallback policy" and will
put a blue tick on an Aviendha burgundy page. Inline SVG in a `url()` cannot read a CSS custom
property, so the fix is either a `mask-image` + `background-color:
var(--wp--preset--color--primary, #9f1239)`, or an `::before` glyph. Do this as a **separate
commit before** the pattern lands.

### 4.2 JSON-LD schema block — omit from the pattern

The source page closes with a `core/html` block containing a `Service` JSON-LD blob (org name,
email, prices in EUR). Three reasons to leave it out:

1. It is Imagewize's own business data — wrong thing to ship in a GPL plugin.
2. `core/html` content is `kses`-filtered for users without `unfiltered_html`; on a multisite
   like the demo, non-super-admins would silently lose the `<script>`, giving different output
   for different editors.
3. A structured-data blob is a site-owner concern, not a layout concern.

**Recommendation: omit.** Note in the pattern's `Description` header that site owners should add
their own `Service` schema. If we later want this, it belongs in a theme/SEO integration, not a
pattern.

### 4.3 Icons

The source references theme build assets (`/app/themes/nynaeve/public/build/assets/icon-*.svg`)
which do not exist under Aviendha. Aludra already solves this: the `aludra/icon` **block
bindings source** (`aludra.php:55`) resolves `metadata.bindings.url.args.path` against
`assets/icons/`, with `window.aludraIcons` seeding the editor preview. Used today by
`feature-cards`, `icon-grid`, and `services-block`.

All eight icons the source page needs are already bundled:

| Source asset | Bundled as |
|---|---|
| `icon-performance` | `assets/icons/icon-performance.svg` |
| `icon-bar-chart` | `assets/icons/icon-bar-chart.svg` |
| `icon-users` | `assets/icons/icon-users.svg` |
| `icon-clock` | `assets/icons/icon-clock.svg` |
| `icon-responsive` | `assets/icons/icon-responsive.svg` |
| `icon-shield` | `assets/icons/icon-shield.svg` |
| `icon-code` | `assets/icons/icon-code.svg` |
| `icon-link` | `assets/icons/icon-link.svg` |

Copy the binding markup verbatim from `patterns/page-homepage.php:273` — note the empty
`src=""` in the saved HTML is correct and intentional; the binding fills it at render.

### 4.4 Copy

Rewrite all copy to generic service-business placeholder text, matching the homepage pattern's
register ("A short paragraph introducing what makes your business different…"). Specifically
drop: PageSpeed/Core Web Vitals specifics, `€149/€350/€450`, "200+ sites optimized since 2009",
"Trellis", "Imagewize", and the `?source=` UTM-ish query strings on every CTA (`/contact/?source=speed-hero`
→ `#`, matching homepage convention). Keep the `#pricing` in-page anchor — it demonstrates the
`anchor` support that every Aludra section block declares.

## 5. Style translation rules

The source markup is heavily inline-styled; the homepage pattern is almost entirely *not*
(zero `fontFamily` attributes, zero `fontSize` attributes, three `textColor`, three
`backgroundColor`). Blocks carry their own typography and colour via SCSS with palette
fallbacks. Match that.

| Source attribute | Action |
|---|---|
| `"fontFamily":"montserrat"` / `"open-sans"` / `"serif"` | **Delete.** Aviendha defines `primary`, `display`, `mono` only ([FONT-CONTRACT.md](./FONT-CONTRACT.md)); `display` applies itself via `styles.elements.heading`. |
| `"fontSize":"3xl"` / `"xl"` / `"lg"` | **Delete** (or map to Aviendha's scale: `xx-small … base … display`). `3xl`/`xl`/`lg` do not exist in Aviendha and fall back silently. |
| `"textColor":"contrast"` / `"secondary"` / `"main"` / `"white"` | Keep — all are required slugs. |
| `"backgroundColor":"base"` / `"primary-accent"` / `"white"` | Keep — all required slugs. |
| `"backgroundColor":"bggray"`, `has-ash-gray-color`, `text-black` | **Delete** — Nynaeve-only slugs, not in the contract. |
| Hardcoded `#cbcbcb`, `#98999a`, `rgba(1,124,182,0.3)`, `rgba(0,0,0,0.1)` | **Delete.** Card borders/prices are the block stylesheet's job. |
| `style.typography.fontWeight/lineHeight` on every heading | **Delete** unless the block genuinely needs it (homepage keeps only `lineHeight:1.15` on the hero `h1` and `1.2` on the CTA `h2`). |
| Per-feature `border-bottom: 2px dotted` inline paragraphs in pricing | **Delete** — use `aludra/pricing-tiers` `is-style-spec-sheet` with a plain `.pricing-features` `ul`, as the homepage does. |

## 6. Proposed structure

Follow the homepage's editorial shell: full-bleed hero, then content sections wrapped in
`aludra/spine-section` (sticky label + heading + aside on the left, block content on the right),
alternating `tint: true` for banding. That is the current Aviendha redesign direction (see
`designs/aviendha/aviendha-redesign.html` and commits `06c4dc7`, `ddacff9`).

```
aludra/hero-banner            — eyebrow, h1, lead, dual CTA (full-bleed, no spine)
aludra/trust-bar              — 4 icon+text trust items (full-bleed seam, no spine)
aludra/spine-section          — label "What we do" → aludra/feature-cards (6 icon cards)
aludra/spine-section {tint}   — label "Why us"     → aludra/feature-list-grid (2×2 cards)
aludra/spine-section          — label "Pricing"    → aludra/pricing-tiers (is-style-spec-sheet, id="pricing")
aludra/spine-section {tint}   — label "Questions"  → aludra/faq-tabs {displayMode:"native"} + 5 answers
aludra/cta-banner             — closing CTA (full-bleed, no spine)
```

Alternative worth a look during assembly: `aludra/service-blocks` (stacked numbered cards with
checklists, v2.13.0) instead of `feature-cards` for the "what we do" section — it was ported
from this exact family of pages and may suit a service page better than the homepage's card
grid. Decide visually on the demo site.

Every section block wrapper needs the default `margin-top:0;margin-bottom:0` inline style —
omitting it was the v2.11.1 bug.

## 7. Implementation steps

1. **Fix `feature-list-grid`'s hardcoded blue tick** (§4.1), rebuild the block
   (`cd blocks/feature-list-grid && npm install && npm run build`), commit separately.
2. **Pull the reference markup** from the VM:
   `trellis vm shell --workdir /srv/www/imagewize.com/current -- wp post get <id> --field=post_content`
   (find the ID via `wp post list --post_type=page --name=speed-optimization`).
3. **Author `patterns/page-service.php`** — header doc-block (`Title: Service Page`,
   `Slug: aludra/page-service`, `Categories: aludra`, `Block Types: core/post-content`,
   `Description: …`), then the ABSPATH guard, then the markup. Both are required: `page-*.php`
   files are auto-registered by the glob at `aludra.php:463`, and Plugin Check flags any
   pattern file without the guard ([CLAUDE.md](../CLAUDE.md) § Direct-File-Access Guard).
   No registration code to write.
4. **Assemble section by section**, copying wrapper markup verbatim from
   `patterns/page-homepage.php` rather than hand-writing it — the saved HTML of each Aludra
   block (including `source: "html"` attributes rendered into the markup and omitted from the
   comment) has to match what the block's `save()` produces.
5. **Validate:** `npm run validate:file patterns/page-service.php`. This round-trips through the
   real editor on the aviendha subsite — the only thing that catches block-validation
   mismatches, which never show up in a screenshot. On failure, do **not** hand-edit; take
   `results[0].savedContent` from the newest `sentinel-*.log.json` and replace the pattern body,
   per the recipe in [CLAUDE.md](../CLAUDE.md).
6. **Visual check** on `http://demo.imagewize.test/aviendha/` in both the default style and
   `styles/twilight.json` (dark) — the palette contract requires all 12 slugs to invert cleanly,
   and a services page is a good stress test of that.

   ⚠️ Aludra is a **pinned Composer dependency** on the demo site, not a symlink, and sentinel
   reads patterns from the *installed* plugin. Sync before validating, with wp-ops'
   `scripts/rsync-package-to-site.sh plugin aludra` (`theme aviendha` for the theme). This was
   `bin/sync-demo.sh` in 2.24.0; 2.24.1 moved it to wp-ops — see §10.

## 8. Release checklist

- `composer run lint` and `composer run wpcs:scan` pass.
- `npm run validate` (full run, a few minutes) passes — not just `validate:file`, since the
  homepage pattern must not regress.
- Version bumped in **all three** files in sync: `CHANGELOG.md`, `readme.txt` (`Stable tag` +
  changelog entry), `aludra.php` (header `Version` + `ALUDRA_VERSION`). Target: **2.15.0**
  (new pattern + a block style fix = minor).
- `docs/PLAN-OF-ACTION.md` updated: mark `two-column-card` resolved-by-reuse in the §3 Tier A
  list, add the release to "Recent milestones".
- `README.md` / `readme.txt` pattern list mentions the new pattern.

## 9. Risks and open questions

| # | Item | Notes |
|---|---|---|
| 1 | `feature-list-grid` may not visually match `two-column-card` | Resolve by comparison on the demo site before committing to reuse (§4.1). Falling back to porting the block adds a block-build cycle. |
| 2 | Pinned-dependency testing loop | Every validation round needs a release or a manual sync (§7.6). Budget for it — this is what made the v2.11.0→2.11.1 fix necessary. |
| 3 | Dark variation | `pricing-tiers`' featured column and `trust-bar` icons are the likeliest twilight offenders; SVG icons are single-colour files and won't invert. |
| 4 | Pattern naming | `page-service.php` (generic, reusable for any service page) vs `page-service-speed.php` (specific). Recommendation: generic — the whole point of the copy genericisation. |
| 5 | Should this pattern also ship as an Aviendha page template? | Out of scope here. Aviendha has `page.html` / `page-dark-header.html` / `page-with-title.html`; the pattern targets `core/post-content` and works inside any of them. |

## 10. Outcome (2026-07-23)

Built on branch `feature/services-page-pattern`, released as **2.24.0**.

**What the plan got right.** No new block was needed. `feature-list-grid` stood in for
`two-column-card` without visual compromise (§4.1) — the "Why Clients Stay" section reads as
four bordered cards with hairline-underlined headings and checkmark lists, which is what the
Nynaeve section was reaching for. The pattern **passed `wp-pattern-sentinel` on the first run**
(61s), so the hand-authored markup round-tripped through the real editor unchanged and no
`savedContent` substitution was needed.

**Verified on `demo.imagewize.test/aviendha/service-page-preview/`:**

- No horizontal overflow at 1440 / 1024 / 768 / 390px, and no element extending past the
  document width at any of them.
- All 11 `aludra/icon` bindings resolve to bundled `assets/icons/*.svg` on the frontend.
- The `#pricing` anchor lands (`id` on the pricing Spine Section).
- No jQuery on the page, and a clean console.

**Changed versus the plan:**

- **§7.6's release-or-hand-sync loop was replaced by tooling.** A sync script now rsyncs a
  dist-faithful tree (`--delete --delete-excluded`, honouring `.distignore`) into the demo site,
  and Aviendha got the `.distignore` / `.gitattributes` / release workflow it was missing.
  Documented in `CLAUDE.md` and `AGENTS.md` in both repos. Risk #2 is closed.
  *(2.24.1: the script shipped as `bin/sync-demo.sh` in each repo, then moved to wp-ops as
  `scripts/rsync-package-to-site.sh` — a `.sh` file committed to a theme fails Theme Check.)*
- **Version target was 2.15.0 in the original draft; shipped as 2.24.0** — the draft was written
  against a stale `PLAN-OF-ACTION.md` that predated the Aviendha redesign releases.
- The hero eyebrow uses `icon-search.svg` rather than a service-specific mark, matching the
  Hero Banner block's own default template.

**Known follow-up (not done here):** `blocks/feature-list-grid/src/edit.js`'s default InnerBlocks
template still seeds Nynaeve-era `fontFamily: 'montserrat'` and `fontSize: '3xl'`/`'xl'` values,
which exist in no maintained theme. That is an editor-insertion concern, not a pattern one — the
pattern seeds none of them — but it should be cleaned up alongside the other blocks' templates.
