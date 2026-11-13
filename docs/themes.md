# Themes

A theme sets the palette, the type, the header and the footer; Aludra provides everything between them. **[Aviendha](https://github.com/imagewize/aviendha)** is the theme built to that division — a starter FSE theme developed alongside this plugin, which ships no blocks or patterns of its own and composes its pages entirely from `aludra/*`:

```bash
composer require imagewize/aviendha imagewize/aludra
```

Then activate Aviendha, activate Aludra, and open **Settings → Aludra** — the Start tab creates a draft page from any of the eight layouts. The same layouts are offered when you add a new page, and the twenty-one section patterns are in the inserter's Patterns tab.

**None of this is required.** Aludra works on **[Elayne](https://github.com/imagewize/elayne)**, on **[Ixian](https://github.com/imagewize/ixian)**, or on any other FSE, block, or classic theme; see [Colours on any theme](#colours-on-any-theme) for how it takes on a theme's colours. Blocks are individually enable/disable-able under Settings → Aludra.

**For WooCommerce stores, pair it with [Winespring](https://github.com/imagewize/winespring)**, the store theme built alongside Aludra's store blocks and patterns. With Winespring active, Aludra adds the Free Shipping Progress bar to the announcement bar and the Sticky Add to Cart bar to product pages on its own, through the WordPress Block Hooks API, so the theme stays free of plugin blocks as WordPress.org requires. Both can be switched off for the active theme under **Settings → Aludra → Store**, and other themes can be switched on there or by default with the `aludra_store_block_hooks_themes` filter. The store patterns work on any theme with WooCommerce active.

## Colours on any theme

Aludra's blocks and patterns name their colours with the slugs of Aviendha's palette, the same convention as the [Ollie](https://olliewp.com/docs/theme/ollie-color-palette/) family of themes: `base` (page background), `contrast` (text), `primary` (brand), `primary-alt`, `primary-accent`, `main`, `secondary`, `main-accent`, `tertiary`, `border-light`, `accent`, `terracotta`, `sand-deep` and `white`. A theme that defines these, such as Aviendha, Ixian, Winespring or an Ollie-based theme, fits as it is: Aludra adds nothing, and every colour comes from the theme.

WordPress has no colour names that every theme shares, so other themes miss some or all of these. Twenty Twenty-Five, for one, names its colours `base`, `contrast` and `accent-1` to `accent-6`. For each missing slug, Aludra defines the CSS variable and its `has-*-color`, `has-*-background-color` and `has-*-border-color` classes from the theme's own palette, in the editor and on the front end (`includes/palette.php`):

- **`base` and `contrast`**: the theme's own, or else its lightest and darkest colours.
- **`primary`, the brand colour**: the first saturated colour in the palette that the `base` colour reads well on as text (4.5:1, else 3:1). Text on the brand colour is `base` throughout Aludra, so on a light theme this is a darker colour (Twenty Twenty-Five: the purple `accent-3`, skipping the pale yellow and pink accents), and on a dark style variation a light one. With no such colour, `contrast`.
- **Everything else** is a `color-mix()` of those: tints, borders and muted text are blends of `contrast` into `base`, hover states a darker `primary`. They follow the theme's style variations, dark ones included.

Colours the theme defines are never overridden.

**Choosing the brand colour.** On a theme without its own `primary`, **Settings → Aludra → Start** lists the theme's colours under **Brand colour**, marks the ones with low contrast, and lets an administrator pick one instead of the automatic choice. The choice is a palette slug saved per theme, so it follows the theme's style variations; a theme that defines `primary` shows its own instead.

**For developers.** The `aludra_palette_fallbacks` filter receives the map of slug to CSS value after the Start tab choice is applied; change any entry, or return an empty array to turn the fallbacks off:

```php
add_filter( 'aludra_palette_fallbacks', function ( $map ) {
	$map['primary'] = 'var(--wp--preset--color--accent-2)';
	return $map;
} );
```

### Section colours

Any section block, or a Group around several, can take one of four schemes from **Section colours** in the block's Styles tab:

| Scheme | Ground | Text | Class |
| --- | --- | --- | --- |
| Page | as designed | as designed | none |
| Alternate | `tertiary` (cards keep `base`) | `contrast` | `is-aludra-scheme-alternate` |
| Inverted | `main` | `base` | `is-aludra-scheme-inverted` |
| Brand | `primary` | `base` | `is-aludra-scheme-brand` |

A scheme redefines the colour slugs above inside the section (`assets/css/section-schemes.css`), so everything in it that uses them follows: Aludra's blocks, core's `has-*-color` classes, and the theme's buttons and links. Tints, borders and muted text become `color-mix()` blends of the new ground and text colours. Schemes are built from the page's palette, so on a dark style variation Inverted gives a light band, and on a theme that relies on the fallbacks above they use those. Blocks with their own Dark/Light styles (stat rail, CTA banner, contact section, both heroes) are left out, and keep the page's palette when placed inside a scheme.

The scheme is a class in the block's Additional CSS class(es), not a block style, so it combines with a block's own styles. A theme can retune a scheme by overriding the `--wp--preset--color--*` properties on its class; the page's original colours are available as `--aludra-o-<slug>`.

Page layouts created from the Start tab use the theme's title-less page template (`page-no-title` on Twenty Twenty-Five) when the default page template prints the post title, because every layout opens with its own hero. The `aludra_layout_page_templates` filter adds other template slugs to try.

Fonts and spacing do not have fallbacks of this kind yet: on a theme without Aviendha's font and spacing presets, blocks use their built-in values.

> The plugin exists in the first place because WordPress.org Theme Review prohibits themes from registering custom blocks. Many blocks were originally ported from the **[Nynaeve](https://github.com/imagewize/nynaeve)** theme's native block library, generalised for theme neutrality.

> **Lineage:** Aludra is the direct continuation of the [**Elayne Blocks**](https://github.com/imagewize/elayne-blocks) plugin (versions ≤ 2.7.1). It was renamed to a builder-themed name (Aludra — the inventor/engineer of the *dragons* in *The Wheel of Time*) and generalised into a shared library, since it now serves multiple themes rather than Elayne alone. See `CHANGELOG.md` for the migration notes.
