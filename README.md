<p align="center">
  <img src="assets/logos/aludra-mark.svg" alt="Aludra" width="128" height="128">
</p>
<div align="center">
<h1>Aludra</h1>

[![Total Downloads](https://img.shields.io/packagist/dt/imagewize/aludra.svg)](https://packagist.org/packages/imagewize/aludra)
[![Latest Stable Version](https://img.shields.io/packagist/v/imagewize/aludra.svg)](https://packagist.org/packages/imagewize/aludra)
[![License](https://img.shields.io/packagist/l/imagewize/aludra.svg)](https://packagist.org/packages/imagewize/aludra)

Everything a page builder gives you,<br>inside the editor you already have.
</div>

## What it is

Aludra gives you what people install a page builder like Elementor for (ready-made sections, whole page layouts, per-device control) without the second editor, the heavy front end or the lock-in. **34 blocks, 21 sections, 8 page layouts and 5 headers and footers**, built and edited in the block editor WordPress already has.

Your theme sets the colours and fonts and ships a default header and footer. Aludra provides everything between them: heroes, stat rails, trust bars, feature grids, pricing tiers, comparison tables, FAQs, reviews, contact sections and CTA bands. It also adds headers and footers you can swap in, with a mega menu, a full-screen search or a shop bar.

- **One editor.** Every section is a normal block you can move, copy, style and reuse.
- **No lock-in.** Content is standard block markup. Switch Aludra off and nothing turns into shortcodes.
- **Light on the front end.** Assets load per block, only where the block is used. Carousels start as a CSS scroll-snap rail with no JavaScript; jQuery and Slick load only for the Slider engine.
- **Per-device control.** Hide any section on mobile, tablet or desktop (WordPress 7.0+), and give it its own spacing, colours and typography per device (WordPress 7.1+), with the block editor's own controls.
- **Start from a layout.** Settings → Aludra → Start creates a draft page from any layout in one click.
- **Any theme.** Built alongside [Aviendha](https://github.com/imagewize/aviendha), so themes that use the same colour names fit as they are. On other themes, Twenty Twenty-Five and its dark variations included, Aludra maps its colours onto the theme's own palette, and you can pick the brand colour on the Start tab. See [Themes](docs/themes.md#colours-on-any-theme).

It is not a free-form drag-and-drop canvas with styling on every element. You get the block editor's controls plus each block's settings: the parts of a page builder most sites use, without the rest.

## Getting started

1. Install from the WordPress.org plugin directory, or with Composer: `composer require imagewize/aludra`
2. Activate it, then click **Get started** on the Plugins screen (or open **Settings → Aludra**).
3. On the **Start** tab, create a page from a layout and replace the copy. Add more sections from the inserter's Patterns tab.

Requires WordPress 7.0+ and PHP 7.4+. WooCommerce is optional and enables the store blocks and patterns.

## Documentation

- [Blocks](docs/blocks.md): every block and what it does
- [Patterns](docs/patterns.md): sections, page layouts, headers and footers, store, carousel and mega menu patterns
- [Agents](docs/agents.md): build pages from patterns over the REST API with Claude Code, Codex or Mistral Vibe
- [Themes](docs/themes.md): Aviendha, Elayne, Ixian and Winespring, store block hooks, and where Aludra came from
- [Credits](docs/credits.md): ported blocks, icons and libraries
- [Changelog](CHANGELOG.md)
- [Contributing](CONTRIBUTING.md): development workflow and build instructions

## License

GPL v3 or later. See https://www.gnu.org/licenses/gpl-3.0.html

## Support

Issues and feature requests: https://github.com/imagewize/aludra/issues

Built by [Imagewize](https://github.com/imagewize).
