# Themes

A theme sets the palette, the type, the header and the footer; Aludra provides everything between them. **[Aviendha](https://github.com/imagewize/aviendha)** is the theme built to that division — a starter FSE theme developed alongside this plugin, which ships no blocks or patterns of its own and composes its pages entirely from `aludra/*`:

```bash
composer require imagewize/aviendha imagewize/aludra
```

Then activate Aviendha, activate Aludra, and open **Settings → Aludra** — the Start tab creates a draft page from any of the eight layouts. The same layouts are offered when you add a new page, and the twenty-one section patterns are in the inserter's Patterns tab.

**None of this is required.** Aludra is theme-neutral: blocks resolve colours from the active theme's palette with fallbacks, so they render correctly on **[Elayne](https://github.com/imagewize/elayne)**, on **[Ixian](https://github.com/imagewize/ixian)**, or on any other FSE, block, or classic theme. Blocks are individually enable/disable-able under Settings → Aludra.

**For WooCommerce stores, pair it with [Winespring](https://github.com/imagewize/winespring)**, the store theme built alongside Aludra's store blocks and patterns. With Winespring active, Aludra adds the Free Shipping Progress bar to the announcement bar and the Sticky Add to Cart bar to product pages on its own, through the WordPress Block Hooks API, so the theme stays free of plugin blocks as WordPress.org requires. Both can be switched off for the active theme under **Settings → Aludra → Store**, and other themes can be switched on there or by default with the `aludra_store_block_hooks_themes` filter. The store patterns work on any theme with WooCommerce active.

> The plugin exists in the first place because WordPress.org Theme Review prohibits themes from registering custom blocks. Many blocks were originally ported from the **[Nynaeve](https://github.com/imagewize/nynaeve)** theme's native block library, generalised for theme neutrality.

> **Lineage:** Aludra is the direct continuation of the [**Elayne Blocks**](https://github.com/imagewize/elayne-blocks) plugin (versions ≤ 2.7.1). It was renamed to a builder-themed name (Aludra — the inventor/engineer of the *dragons* in *The Wheel of Time*) and generalised into a shared library, since it now serves multiple themes rather than Elayne alone. See `CHANGELOG.md` for the migration notes.
