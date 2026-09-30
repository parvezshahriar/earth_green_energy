#!/bin/bash
# Post-build patch for vercel-php compatibility with Vercel's Rust bootstrap (Node 20/22/24)
# Addresses:
# 1. AWS module.export handler syntax resolution ('launcher.launcher' -> 'launcher.js')
# 2. Missing LAMBDA_TASK_ROOT causing 'spawn php ENOENT'
# 3. Array-based event.body causing ERR_INVALID_ARG_TYPE on requests with bodies
set -e

FUNCTIONS_DIR=".vercel/output/functions"

if [ ! -d "$FUNCTIONS_DIR" ]; then
  echo "[post-build-patch] No functions directory found at $FUNCTIONS_DIR, skipping"
  exit 0
fi

PATCHED=0
for CONFIG in $(find "$FUNCTIONS_DIR" -name ".vc-config.json"); do
  FUNC_DIR=$(dirname "$CONFIG")
  echo "[post-build-patch] Processing function: $FUNC_DIR"

  # 1. Patch .vc-config.json
  node -e "
    const fs = require('fs');
    const cfg = JSON.parse(fs.readFileSync('$CONFIG', 'utf8'));
    if (cfg.handler === 'launcher.launcher' || cfg.handler === 'launcher.js') {
      cfg.awsLambdaHandler = 'launcher.launcher';
      cfg.handler = 'launcher.js';
      cfg.launcherType = 'Nodejs';
      fs.writeFileSync('$CONFIG', JSON.stringify(cfg, null, 2));
      console.log('[post-build-patch] Patched .vc-config.json in $FUNC_DIR');
    }
  "

  # 2. Create bridge launcher.js and preserve original launcher as launcher-orig.js
  if [ -f "$FUNC_DIR/launcher.js" ] && [ ! -f "$FUNC_DIR/launcher-orig.js" ]; then
    mv "$FUNC_DIR/launcher.js" "$FUNC_DIR/launcher-orig.js"
    cat << 'EOF' > "$FUNC_DIR/launcher.js"
process.env.LAMBDA_TASK_ROOT = process.env.LAMBDA_TASK_ROOT || '/var/task';
const orig = require('./launcher-orig.js');
exports.launcher = async (event, context) => {
  const e = { ...event };
  if (Array.isArray(e.body)) {
    e.body = Buffer.from(e.body);
  } else if (typeof e.body === 'string') {
    e.body = Buffer.from(e.body, e.isBase64Encoded ? 'base64' : 'utf8');
  } else if (e.body === null || e.body === undefined) {
    e.body = undefined;
  }
  const h = e.headers || {};
  e.host = e.host || h['x-forwarded-host'] || h.host;
  return orig.launcher(e, context);
};
EOF
    echo "[post-build-patch] Created launcher bridge wrapper in $FUNC_DIR"
  fi

  PATCHED=$((PATCHED + 1))
done

echo "[post-build-patch] Successfully patched $PATCHED function(s)."
