#!/usr/bin/env bash
#
# Prepare a WordPress.org SVN layout (trunk / tags / assets) for aludra.
# Produces a staging folder you copy into a real `svn co` checkout.
#
# Adapted from warder-cookie-consent's bin/prepare-svn.sh. Marketing assets are
# read from .wordpress-org/ in the repo (version-controlled, excluded from the
# plugin zip via .distignore). No build step: blocks/*/build/ is committed.
#
#   bash bin/prepare-svn.sh [STAGING_DIR]
#
set -euo pipefail

# Repo root = parent of this script's bin/ dir.
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
REPO="$(cd "$SCRIPT_DIR/.." && pwd)"
ASSETS="$REPO/.wordpress-org"
STAGING="${1:-$REPO/../aludra-svn-staging}"

cd "$REPO"

# Canonical version from the plugin header (what WordPress.org reads).
VERSION="$(grep -m1 -E '^\s*\*\s*Version:' aludra.php \
  | sed -E 's/.*Version:[[:space:]]*//' | tr -d '[:space:]')"
echo "==> Plugin version: $VERSION"

# The three version places must agree (see CLAUDE.md "Version Management").
STABLE_TAG="$(grep -m1 -E '^Stable tag:' readme.txt | sed -E 's/Stable tag:[[:space:]]*//' | tr -d '[:space:]')"
CONSTANT="$(grep -m1 "define( 'ALUDRA_VERSION'" aludra.php | sed -E "s/.*'ALUDRA_VERSION', '([^']+)'.*/\1/")"
if [ "$STABLE_TAG" != "$VERSION" ] || [ "$CONSTANT" != "$VERSION" ]; then
  echo "!! Version mismatch: header $VERSION, readme Stable tag $STABLE_TAG, ALUDRA_VERSION $CONSTANT" >&2
  exit 1
fi
grep -q "^## \[$VERSION\]" CHANGELOG.md \
  || echo "!! Warning: no '## [$VERSION]' section in CHANGELOG.md" >&2

# The payload is zipped from the working copy, so make sure it is the release.
if [ -n "$(git status --porcelain --untracked-files=no)" ]; then
  echo "!! Warning: uncommitted changes to tracked files will end up in trunk/" >&2
fi
if [ "$(git rev-parse HEAD)" != "$(git rev-parse -q --verify "v$VERSION^{commit}" || true)" ]; then
  echo "!! Warning: HEAD is not tag v$VERSION" >&2
fi

# Clean staging.
rm -rf "$STAGING"
mkdir -p "$STAGING/trunk" "$STAGING/tags" "$STAGING/assets"
STAGING="$(cd "$STAGING" && pwd)"
SVN_DIR="$(dirname "$STAGING")/aludra-svn"

# Build the filtered plugin payload the SAME way the release workflow does
# (zip with -x@.distignore), then expand it into trunk/.
echo "==> Assembling trunk/ via .distignore filter ..."
TMPDIR="$(mktemp -d)"
zip -r -q "$TMPDIR/payload.zip" . -x@.distignore
unzip -q "$TMPDIR/payload.zip" -d "$STAGING/trunk"
rm -rf "$TMPDIR"

# Frozen release tag = exact copy of trunk.
echo "==> Copying trunk/ -> tags/$VERSION/ ..."
cp -R "$STAGING/trunk" "$STAGING/tags/$VERSION"

# Marketing assets (banners, icon, screenshots) live in the top-level assets/,
# NOT in trunk and NOT in the plugin zip.
echo "==> Copying marketing assets from .wordpress-org/ ..."
cp "$ASSETS"/*.png "$STAGING/assets/"
[ -f "$ASSETS/icon.svg" ] && cp "$ASSETS/icon.svg" "$STAGING/assets/"

echo
echo "==> Layout ready at: $STAGING"
echo
( cd "$STAGING" && find . -maxdepth 2 -mindepth 1 | sort )
echo
cat <<EOF
=== Next steps ===

  svn co https://plugins.svn.wordpress.org/aludra "$SVN_DIR"   # or: svn up "$SVN_DIR"

  rsync -a --delete --exclude=.svn "$STAGING/trunk/"  "$SVN_DIR/trunk/"
  rsync -a --delete --exclude=.svn "$STAGING/assets/" "$SVN_DIR/assets/"
  cp -R "$STAGING/tags/$VERSION" "$SVN_DIR/tags/"

  cd "$SVN_DIR"
  svn add --force trunk tags assets
  svn status | awk '/^!/ {print \$2}' | xargs svn rm   # files removed since last release
  svn propset svn:mime-type image/png assets/*.png
  svn propset svn:mime-type image/svg+xml assets/icon.svg
  svn status                     # sanity-check what will be committed
  svn ci -m "Release $VERSION" --username YOUR_WP_ORG_USERNAME
EOF
