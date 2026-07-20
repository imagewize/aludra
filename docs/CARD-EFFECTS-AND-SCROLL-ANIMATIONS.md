# Card Effects & Scroll Animations — Investigation & Plan

_Status: proposal, not yet implemented._

## 1. Source

Reference: a modern marketing landing page built as a Vite + React SPA (not
WordPress — see "Why we're not copying code" below), reviewed for card and motion
treatment on both its homepage and a paid-traffic landing page. Screenshots captured
2026-07-20; the site itself is not named here since this is a public repo — the
patterns below are genre-common on current marketing/SaaS landing pages, not unique
to one source.

Four things on that page are worth borrowing as **effects**, not as code:

1. **Scroll-entrance animation on cards** — feature/benefit cards are invisible/offset
   on load and animate into place (translate up + fade in, slightly bouncy easing) as
   they cross into the viewport while scrolling.
2. **Slight skew/tilt on cards** — cards aren't perfectly flat/square; they sit with a
   subtle rotation that reads as "hand-placed" rather than a rigid grid, and settle
   further or lift on hover.
3. **Dark gradient-overlay image cards** — background-image cards (e.g. a mock
   product-UI card, category imagery) use a navy-to-transparent gradient overlay so
   text stays legible over a photo/mock UI, e.g.:
   ```css
   .from-\[\#1A2F5F\]\/80 { --tw-gradient-from: rgb(26 47 95 / .8); }
   .to-\[\#0A1C3F\]\/60   { --tw-gradient-to: rgb(10 28 63 / .6); }
   ```
   (Tailwind arbitrary-value gradient-stop utilities — translates directly to a CSS
   `linear-gradient` over a background image.)
4. **Fast, snappy micro-transitions** on hover/focus states:
   ```css
   .transition-all {
     transition-property: all;
     transition-timing-function: cubic-bezier(.4,0,.2,1);
     transition-duration: .15s;
   }
   ```
   This is Tailwind's default `transition` utility (`ease-in-out`-ish curve, 150ms) —
   noticeably snappier than what Aludra uses today (see §2).

Not in scope here: third-party floating chat widgets (not a content block) and generic
page analytics/tracking tooling — none of that is relevant to Aludra's block library.

**Why we're not copying code:** the reference is a Vite-bundled React app (hashed
chunk filenames, Tailwind's JIT-compiled arbitrary-value classes, a common icon-library
chunk set) — there's no server-rendered markup or plugin-style CSS to lift. What's
portable is the *design pattern* (skewed entrance cards, gradient-overlay media cards,
a fast transition curve), reimplemented natively for WordPress blocks.

## 2. Current state in Aludra

Grepping `blocks/*/src/style.scss` for existing hover/transition treatment:

| Block | Effect today | Timing |
|---|---|---|
| `pricing-tiers` | `translateY(-5px)` / `-10px` (featured) / `-15px` (featured+hover) on hover | `0.3s ease` |
| `cta-columns` | `translateY(-4px)` on card hover, `-2px` on buttons | `0.3s ease` |
| `hero-split` | `translateY(-2px)` on link hover, arrow `translateX(3px)` | `0.18s ease` |
| `icon-grid` | `:hover` state present (color/border only, no transform) | n/a |

Gaps:

- **No scroll-triggered entrance animation anywhere in the plugin.** Every block
  renders fully visible on load; nothing observes viewport intersection.
- **No skew/tilt treatment** on any card — all card grids are axis-aligned.
- **No gradient-overlay image-card pattern.** The closest thing is `hero-split`
  (image + text in a two-column layout, not a repeatable card), and `testimonial-grid`
  (text cards, no background image). Nothing does "background photo + dark gradient +
  overlaid text" as a repeatable grid item.
- **Transition speed is inconsistent and slower** than the reference (180–300ms `ease`
  vs. 150ms `cubic-bezier(.4,0,.2,1)`).
- Frontend JS patterns already in the plugin are a mix of **jQuery** (`testimonial-grid/view.js`,
  gated by Slick) and presumably vanilla/Interactivity API elsewhere (mega-menu,
  faq-tabs, search-overlay-trigger). A new scroll-reveal utility should **not** pull in
  jQuery as a new dependency for blocks that don't already need it.

## 3. Proposed additions

### A. Shared scroll-reveal utility (new capability, cross-block)

A small vanilla `IntersectionObserver` helper, not tied to any one block, that toggles
a class when an element enters the viewport:

```js
// e.g. shared/scroll-reveal.js — no jQuery, no Interactivity API dependency
const io = new IntersectionObserver( ( entries ) => {
  entries.forEach( ( entry ) => {
    if ( entry.isIntersecting ) {
      entry.target.classList.add( 'is-revealed' );
      io.unobserve( entry.target );
    }
  } );
}, { threshold: 0.15, rootMargin: '0px 0px -10% 0px' } );

document
  .querySelectorAll( '[data-aludra-reveal]' )
  .forEach( ( el ) => io.observe( el ) );
```

CSS does the actual motion (kept in each block's `style.scss`, not the shared script):

```scss
[data-aludra-reveal] {
  opacity: 0;
  transform: translateY(24px);
  transition: opacity 0.5s cubic-bezier(0.34, 1.56, 0.64, 1),
              transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);

  &.is-revealed {
    opacity: 1;
    transform: translateY(0);
  }
}

@media (prefers-reduced-motion: reduce) {
  [data-aludra-reveal] {
    opacity: 1;
    transform: none;
    transition: none;
  }
}
```

**Where it lives:** a small standalone script (its own `blocks/scroll-reveal/` build,
or bundled into `aludra.php` as a plugin-level asset — not a registered block) enqueued
once, conditionally, only when a page contains a block with a `revealOnScroll`
attribute set. Mirrors the existing conditional-Slick pattern in `aludra.php`
(`has_block( 'aludra/carousel' )` → only enqueue when needed).

**Per-block opt-in:** add a boolean attribute (e.g. `revealOnScroll`, default `false`)
to the target block's `block.json`, exposed as an Inspector toggle. `save.jsx` adds
`data-aludra-reveal` (and optionally `data-aludra-reveal-delay` for staggered grids)
to each card wrapper when enabled.

### B. Card skew/tilt (CSS-only, per-block attribute)

No JS needed — a `transform: rotate()` on idle state, straightened on hover or on
scroll-reveal:

```scss
.some-card {
  transform: rotate(-1.5deg);
  transition: transform 0.15s cubic-bezier(0.4, 0, 0.2, 1);

  &:hover { transform: rotate(0deg) translateY(-4px); }
}
```

Expose as an Inspector "Tilt style" `SelectControl` (`None` / `Alternating` / `Left` /
`Right`), similar in spirit to the carousel's existing toolbar toggles
(Center Mode, Thumbnail Navigation). `Alternating` flips sign by card index (even/odd)
for a hand-placed look across a grid — this is what makes the reference site's card
rows feel organic rather than uniform.

### C. Gradient-overlay media card (new block)

None of the existing card blocks are built around "background photo + dark gradient +
overlaid text/stat." Recommend a new block rather than overloading `feature-cards` or
`cta-columns` (both are icon/text-first, not media-first):

- **Working name:** `aludra/media-card-grid` (or fold into `feature-list-grid` as a
  new "media" card style if the layout logic can share InnerBlocks structure — needs a
  closer look at `feature-list-grid`'s current attribute shape before deciding).
- Each card: background image (via `MediaUpload`, same pattern as other blocks'
  image controls) + configurable gradient overlay (two color-picker attributes for
  from/to stops + opacity, defaulting to the reference's navy tones but themeable via
  `var(--wp--preset--color--*)` fallbacks like every other Aludra block) + InnerBlocks
  or fixed heading/text fields for the overlaid copy.
- Gradient CSS (native, no Tailwind JIT needed):
  ```scss
  .media-card__overlay {
    background: linear-gradient(
      180deg,
      rgba(var(--overlay-from-rgb, 26 47 95), 0.8) 0%,
      rgba(var(--overlay-to-rgb, 10 28 63), 0.6) 100%
    );
  }
  ```
- Combine with (A) and (B) as opt-in attributes so a grid of these cards can also
  skew-in on scroll.

### D. Shared fast-transition token (polish, low priority)

Introduce `--aludra-transition-fast: 150ms cubic-bezier(0.4, 0, 0.2, 1)` as a CSS
custom property (set once, e.g. on `:root` or `.wp-block-aludra-*` via each block's
`style.scss`), and migrate `pricing-tiers`, `cta-columns`, `hero-split` hover
transitions to reference it instead of their current hardcoded `0.18s`/`0.3s ease`.
Purely a consistency/snappiness pass — not blocking on A–C, can land independently.

## 4. Block-by-block recommendation

| Block | Scroll-reveal (A) | Tilt (B) | Media-overlay (C) | Notes |
|---|---|---|---|---|
| `feature-cards` | Add attribute | Add attribute | — | Icon-first cards; tilt reads well here |
| `icon-grid` | Add attribute | Skip | — | Dense grid; entrance stagger only |
| `trust-bar` | Skip | Skip | — | Logo strip, motion would be noisy |
| `pricing-tiers` | Add attribute | Skip | — | Already has strong hover-lift; don't stack too much motion |
| `cta-columns` | Add attribute | Add attribute | — | Good fit, mirrors reference "What It Unlocks" cards closely |
| `feature-list-grid` | Add attribute | Evaluate | Evaluate as home for (C) | Needs a read of current attributes first |
| `testimonial-grid` | Skip (carousel mode conflicts with reveal-once behavior) | Skip | — | Static-grid mode only, if added later |
| new `media-card-grid` | Default on | Default on | Core feature | New block per §3C |

## 5. Suggested phasing

1. **Phase 1 — shared utility + one pilot block.** Build the scroll-reveal script and
   wire it into `cta-columns` only (closest existing analog to the reference cards).
   Validate the `has_block`-gated enqueue pattern and `prefers-reduced-motion` handling
   end-to-end before touching more blocks.
2. **Phase 2 — tilt attribute on `feature-cards` and `cta-columns`.** CSS-only, no new
   JS surface; fast to ship once (A) is proven.
3. **Phase 3 — roll reveal + tilt out to `icon-grid`, `pricing-tiers`,
   `feature-list-grid`** per the table above.
4. **Phase 4 — new gradient-overlay media card block**, reusing (A)/(B) as opt-in
   attributes from day one.
5. **Phase 5 (polish) — shared fast-transition token**, migrate existing hardcoded
   hover timings.

Each phase is an independent version bump per the versioning rules in `CLAUDE.md`
(update `CHANGELOG.md`, `readme.txt`, `aludra.php` together).

## 6. Technical notes / constraints

- **Respect `prefers-reduced-motion: reduce`** everywhere motion is added — reveal
  animations and tilt must both degrade to a static, fully-visible state.
- **No new global JS dependency.** The scroll-reveal utility must be vanilla
  `IntersectionObserver`, not jQuery (avoid coupling to `testimonial-grid`'s Slick/jQuery
  requirement) and not the Interactivity API (adds store/context overhead for something
  that's a one-way, fire-once reveal — plain DOM + CSS classes is sufficient and matches
  the plugin's existing mix of approaches per block).
- **Conditional asset loading.** Follow the existing `has_block()` gating in
  `aludra.php` (see the carousel/testimonial-grid Slick-loading logic) so the
  scroll-reveal script and any new block's assets are never enqueued on pages that
  don't use them.
- **Isolated per-block `node_modules` / build.** Any new block (`media-card-grid`)
  follows the standard block scaffold in `CLAUDE.md` §"Adding a New Block"; the shared
  scroll-reveal script, if not tied to a single block, should still get its own small
  build step or be hand-written (it's tiny — no bundler strictly required).
- **Theming.** Gradient/overlay colors must fall back through
  `var(--wp--preset--color--*, <hex fallback>)` like every other Aludra block, so
  Nynaeve/Elayne/Aviendha each render sensible defaults without extra theme work.
