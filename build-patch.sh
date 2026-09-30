#!/bin/bash
# Patch vercel-php to fix "Cannot find module '/var/task/launcher.launcher'"
# caused by Vercel's new Rust bootstrap (rolled out Aug 2026) treating
# the handler string as an ESM path instead of AWS-style module.export.
set -e

PHP_INDEX=$(find /vercel -name "index.js" -path "*vercel-php*" 2>/dev/null | head -1)

if [ -z "$PHP_INDEX" ]; then
  echo "[build-patch] vercel-php index.js not found, skipping patch"
  exit 0
fi

echo "[build-patch] Found vercel-php at: $PHP_INDEX"

# Fix 1: change handler from 'launcher.launcher' -> 'launcher.js'
sed -i "s/handler: 'launcher\.launcher'/handler: 'launcher.js'/g" "$PHP_INDEX"

# Fix 2: inject launcherType and awsLambdaHandler so the new bootstrap
# can correctly dispatch via the CommonJS named export
sed -i "s/handler: 'launcher\.js'/handler: 'launcher.js', launcherType: 'Nodejs', awsLambdaHandler: 'launcher.launcher'/g" "$PHP_INDEX"

echo "[build-patch] Patch applied successfully"
