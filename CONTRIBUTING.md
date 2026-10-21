# Contributing

Thanks for your interest in improving Aludra.

## Project Structure

- Root plugin entry: `aludra.php`.
- Blocks live in `blocks/<block-name>/`.
- Source files live in `blocks/<block-name>/src/`.
- Compiled assets live in `blocks/<block-name>/build/` and are committed.
- Mega menu template parts live in `parts/` and are registered via `get_block_templates` filter.

## Development Setup

Each block has its own `package.json`, but the repo is an npm workspace: install once from the repo root and all blocks share a single `node_modules`.

```bash
npm ci
```

## Build

```bash
npm run build --workspace=blocks/carousel
```

For watch mode:

```bash
npm start --workspace=blocks/carousel
```

To build every block: `npm run build --workspaces --if-present`. Running the scripts from inside a block directory works too.

## Linting and Formatting

```bash
npm run lint:js --workspace=blocks/carousel
npm run lint:css --workspace=blocks/carousel
npm run format --workspace=blocks/carousel
```

## Testing

There is no automated test runner. Please validate changes manually in WordPress (editor and frontend).

## Theme Integration

The mega menu block requires the Aludra theme to register the 'menu' template part area for proper Site Editor integration. Without theme registration, template parts will still function but won't appear in the Site Editor's sidebar navigation.

See `CLAUDE.md` for the required theme code.

## Releases

See `CHANGELOG.md` for release notes and version history.
