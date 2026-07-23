# Repository Guidelines

## Project Structure & Module Organization
- Root plugin entry: `aludra.php`.
- Block packages live in `blocks/<block-name>/`.
- Source files live in `blocks/<block-name>/src/` (edit, save, styles, block.json).
- Compiled assets live in `blocks/<block-name>/build/` and are committed for distribution.
- Third-party assets for the carousel are vendored in `blocks/carousel/slick/`.

## Build, Test, and Development Commands
Run commands from each block directory (they are isolated):
- `npm install`: install block dependencies.
- `npm run build`: production build to `build/`.
- `npm start`: dev build with watch mode.
- `npm run lint:js`: JS linting via `@wordpress/scripts`.
- `npm run lint:css`: style linting via `@wordpress/scripts`.
- `npm run format`: format code via `@wordpress/scripts`.

Note: `blocks/mega-menu` uses `--experimental-modules` in its build/start scripts.

## Coding Style & Naming Conventions
- Follow WordPress block conventions and existing patterns in `blocks/*/src/`.
- Keep block metadata in `blocks/*/src/block.json` as the source of truth.
- Naming: block names use `aludra/<block-name>`; directory names are kebab-case.
- Formatting and linting should be done with `npm run format` and lint scripts above.

## Testing Guidelines
- No unit test runner is configured; validate block behavior manually in WordPress (editor and frontend).
- **Patterns have an automated validator and PRs touching `patterns/` must pass it:**
  `npm run validate` (all) or `npm run validate:file patterns/<file>.php` (one).
  It round-trips each pattern through the real block editor and diffs the result, catching
  block-validation mismatches that a frontend screenshot cannot show. ~60s per pattern.
- Run linting commands before opening a PR.

### Local WordPress environment (Trellis + Bedrock)
Manual/visual testing of Aludra happens against a local **Trellis** (Roots) VM running **Bedrock**
sites, in the sibling `~/code/imagewize.com` checkout. This is the Imagewize maintainer's own
setup, not a project requirement — other contributors test against whatever local WordPress/Bedrock
install they have Aludra installed on; adjust paths and site names accordingly.
- Trellis root: `~/code/imagewize.com/trellis`. The VM is **Lima-based**, not Vagrant — commands
  run via `trellis vm shell`, which shells out to `limactl`.
- Site definitions: `~/code/imagewize.com/trellis/group_vars/development/wordpress_sites.yml`.
- `demo.imagewize.com` (host `demo.imagewize.test`, Bedrock root `~/code/imagewize.com/demo`) is
  the site **Aludra itself is installed and tested on** — a multisite with subsites at `/`,
  `/spa/`, `/legal/`, `/kafe/`, `/plumbing/`, `/nail-salon/`, `/store/` (all on the **Elayne**
  theme), plus **`/aviendha/`**, running Aludra's primary target theme
  **[Aviendha](https://github.com/imagewize/aviendha)** (`imagewize/aviendha` on Packagist; local
  checkout `~/code/aviendha`). Both plugin and theme are regular pinned Composer dependencies
  (`imagewize/aludra`, `imagewize/aviendha`), installed from Packagist — **not** symlinked to these
  working copies.
- **Testing unreleased changes: sync, don't release.** `bin/sync-demo.sh` rsyncs this working copy
  into `~/code/imagewize.com/demo/web/app/plugins/aludra`; the theme has its own copy at
  `~/code/aviendha/bin/sync-demo.sh`. Both push a dist-faithful tree (`--delete --delete-excluded`,
  mirroring `.distignore`), so what you test is what ships, and a `composer update` on the demo site
  puts the released code back. Run the sync **before** `npm run validate` — the pattern validator
  reads patterns from the installed plugin, not from this repo.
- `imagewize.com` (host `imagewize.test`, Bedrock root `~/code/imagewize.com/site`) is the
  **production content clone** running the Nynaeve theme's blocks (`imagewize/*`/`nynaeve/*`) —
  Aludra's blocks (and the homepage page pattern) are ported/cloned from this site's content. Used
  as the layout/content reference when porting real imagewize.com sections into Aludra
  blocks/patterns, not for plugin testing.
- Run one-off commands non-interactively: `trellis vm shell --workdir /srv/www/<site-key>/current -- <command>`
  (site key is the `wordpress_sites.yml` key, e.g. `demo.imagewize.com` or `imagewize.com`; the VM
  path is always `/srv/www/<site-key>/current`). Chain multiple commands with `&&`/`;` inside a
  single quoted string, not as separate `--` args — the shell parses them literally.
  Example: `wp post get <ID> --field=post_content`.
- 2FA (`wp-2fa` plugin) guards wp-admin on these sites. It can lock you out locally if the TOTP
  code doesn't match (stale secret, clock skew) — safe to `wp plugin deactivate wp-2fa` via the
  VM shell for local dev; leave it active on staging/production.

## Commit & Pull Request Guidelines
- **Atomic commits:** Commit per file or per logical file group. Do not bundle unrelated changes.
- **No AI attribution:** Commit messages must NOT mention Mistral Vibe, AI, or any co-authorship.
- Commits are short, descriptive summaries (e.g., "FAQ Tabbed Questions").
- PRs should include:
  - A clear description of the block change and motivation.
  - Screenshots or screen recordings for UI changes.
  - Notes on any updated `build/` assets and how they were generated.

## Architecture Notes
- Blocks are auto-discovered at runtime by scanning `blocks/*/build/block.json`.
- Carousel only allows Slide children; Slide is constrained to Carousel.
- Mega Menu uses the WordPress Interactivity API for frontend state.

## Theme Compatibility
- **Aludra is designed to be used with the [Aviendha theme](https://github.com/imagewize/aviendha)**. Aviendha is a lean Full Site Editing (FSE) WooCommerce theme and the companion to the Aludra block library.
- **Nynaeve theme is NOT used with Aludra**. Blocks needed from Nynaeve (located at `~/code/nynaeve`) must be ported to Aludra. See [docs/PLAN-OF-ACTION.md](docs/PLAN-OF-ACTION.md) for the import strategy and gap analysis.

## Pattern Development
- **Validate before opening a PR:** `npm run validate`. On failure, rebuild the pattern body
  from the editor's own serialization (`savedContent` in the `sentinel-*.log.json` the run
  writes) rather than hand-editing markup — see CLAUDE.md "Validate Patterns Before Opening
  a PR" for the procedure and the usual causes (sourced attributes duplicated in the block
  comment, attributes equal to defaults, class order, deprecated attribute forms).
- **Separator blocks:** Use WordPress 6.7+ compatible format without inline opacity styles:
  - Correct: `<!-- wp:separator {"className":"is-style-wide"} --><hr class="wp-block-separator has-alpha-channel-opacity is-style-wide"/><!-- /wp:separator -->`
  - Avoid: Custom background colors and opacity in inline styles (causes validation errors)
- Patterns in `patterns/` are used by users to create template parts in the Site Editor.
