#!/bin/bash
# Post-build patch for vercel-php launcher.launcher bug
# Vercel's Rust bootstrap (Aug 2026) broke the AWS-style module.export handler convention.
# This patches the generated .vc-config.json AFTER vercel build, so it's not cached.
set -e

FUNCTIONS_DIR=".vercel/output/functions"

if [ ! -d "$FUNCTIONS_DIR" ]; then
  echo "[post-build-patch] No functions dir found at $FUNCTIONS_DIR, skipping"
  exit 0
fi

PATCHED=0
for CONFIG in $(find "$FUNCTIONS_DIR" -name ".vc-config.json"); do
  echo "[post-build-patch] Processing: $CONFIG"

  # Check if it uses the broken handler
  if grep -q '"launcher.launcher"' "$CONFIG"; then
    # Add launcherType and awsLambdaHandler, fix handler to file path
    node -e "
      const fs = require('fs');
      const cfg = JSON.parse(fs.readFileSync('$CONFIG', 'utf8'));
      if (cfg.handler === 'launcher.launcher') {
        cfg.awsLambdaHandler = 'launcher.launcher';
        cfg.handler = 'launcher.js';
        cfg.launcherType = 'Nodejs';
      }
      fs.writeFileSync('$CONFIG', JSON.stringify(cfg, null, 2));
      console.log('[post-build-patch] Patched:', '$CONFIG');
    "
    PATCHED=$((PATCHED + 1))
  else
    echo "[post-build-patch] Already patched or different format, skipping"
  fi
done

echo "[post-build-patch] Done. Patched $PATCHED config(s)."
