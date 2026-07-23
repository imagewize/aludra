#!/usr/bin/env bash
#
# Sync this working copy of Aludra into the demo Bedrock site so unreleased
# changes can be tested — and pattern-validated — without cutting a release.
#
# Aludra is a pinned Composer dependency on the demo site, so a `composer
# update` there will overwrite whatever this pushes. That is the intended way
# back to released code.
#
# The theme has its own copy of this script: ~/code/aviendha/bin/sync-demo.sh.
#
# Usage:
#   bin/sync-demo.sh
#
# Override paths with ALUDRA_SRC / DEMO_ROOT if your checkouts live elsewhere.

set -euo pipefail

ALUDRA_SRC="${ALUDRA_SRC:-$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)}"
DEMO_ROOT="${DEMO_ROOT:-$HOME/code/imagewize.com/demo/web/app}"

dest="$DEMO_ROOT/plugins/aludra"
[ -d "$dest" ] || { echo "✗ $dest not found — is the demo site installed?" >&2; exit 1; }

# Mirrors .distignore: push the built plugin, not the dev tree.
rsync -a --delete --delete-excluded \
	--exclude '.git/' \
	--exclude '.github/' \
	--exclude '.claude/' \
	--exclude '.vscode/' \
	--exclude 'node_modules/' \
	--exclude 'blocks/*/node_modules/' \
	--exclude 'blocks/*/src/' \
	--exclude 'vendor/' \
	--exclude 'docs/' \
	--exclude 'designs/' \
	--exclude 'tests/' \
	--exclude 'bin/' \
	--exclude 'sentinel-*.log.json' \
	--exclude '.gitignore' \
	--exclude '.gitattributes' \
	--exclude '.distignore' \
	--exclude '.editorconfig' \
	--exclude '.DS_Store' \
	"$ALUDRA_SRC/" "$dest/"

echo "✓ aludra → $dest ($(grep -m1 'Version:' "$dest/aludra.php" | tr -d ' *'))"
