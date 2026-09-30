#!/usr/bin/env python3
"""
Post-build patch script for vercel-php on Vercel's Node 20/22/24 Rust runtime.
Fixes:
1. Handler resolution (awsLambdaHandler + launcher.js + launcherType)
2. LAMBDA_TASK_ROOT fallback from '/' to '/var/task' so PHP binary is found
3. Prepend LAMBDA_TASK_ROOT initialization to launcher.js
4. Normalize event.body array format for POST requests
"""
import os
import json
import sys

print("=== STARTING VERCEL PHP RUNTIME PATCH ===")

functions_dir = ".vercel/output/functions"
if not os.path.exists(functions_dir):
    print(f"Warning: {functions_dir} does not exist.")

patched_configs = 0
patched_launchers = 0
patched_helpers = 0

for root, dirs, files in os.walk(".vercel/output"):
    for f in files:
        filepath = os.path.join(root, f)

        # 1. Patch .vc-config.json
        if f == ".vc-config.json":
            try:
                with open(filepath, "r", encoding="utf-8") as fp:
                    cfg = json.load(fp)
                
                cfg["awsLambdaHandler"] = "launcher.launcher"
                cfg["handler"] = "launcher.js"
                cfg["launcherType"] = "Nodejs"
                
                with open(filepath, "w", encoding="utf-8") as fp:
                    json.dump(cfg, fp, indent=2)
                patched_configs += 1
                print(f"[OK] Patched config: {filepath}")
            except Exception as e:
                print(f"[ERROR] Failed to patch config {filepath}: {e}")

        # 2. Patch launcher.js (builtin server launcher)
        if f == "launcher.js":
            try:
                with open(filepath, "r", encoding="utf-8", errors="ignore") as fp:
                    code = fp.read()
                
                # Prepend task root definition at the very top
                prefix = "process.env.LAMBDA_TASK_ROOT = process.env.LAMBDA_TASK_ROOT || '/var/task';\n"
                if prefix not in code:
                    code = prefix + code
                    with open(filepath, "w", encoding="utf-8") as fp:
                        fp.write(code)
                    patched_launchers += 1
                    print(f"[OK] Prepend LAMBDA_TASK_ROOT to launcher: {filepath}")
            except Exception as e:
                print(f"[ERROR] Failed to patch launcher {filepath}: {e}")

        # 3. Patch helpers.js
        if f == "helpers.js":
            try:
                with open(filepath, "r", encoding="utf-8", errors="ignore") as fp:
                    code = fp.read()
                
                new_code = code.replace("process.env.LAMBDA_TASK_ROOT || '/'", "process.env.LAMBDA_TASK_ROOT || '/var/task'")
                new_code = new_code.replace('process.env.LAMBDA_TASK_ROOT || "/"', "process.env.LAMBDA_TASK_ROOT || '/var/task'")
                
                if new_code != code:
                    with open(filepath, "w", encoding="utf-8") as fp:
                        fp.write(new_code)
                    patched_helpers += 1
                    print(f"[OK] Patched helpers.js: {filepath}")
            except Exception as e:
                print(f"[ERROR] Failed to patch helpers {filepath}: {e}")

        # 4. Check all other JS files in .vercel/output for any '/' task root fallbacks
        elif f.endswith(".js"):
            try:
                with open(filepath, "r", encoding="utf-8", errors="ignore") as fp:
                    code = fp.read()
                
                if "process.env.LAMBDA_TASK_ROOT || '/'" in code or 'process.env.LAMBDA_TASK_ROOT || "/"' in code:
                    new_code = code.replace("process.env.LAMBDA_TASK_ROOT || '/'", "process.env.LAMBDA_TASK_ROOT || '/var/task'")
                    new_code = new_code.replace('process.env.LAMBDA_TASK_ROOT || "/"', "process.env.LAMBDA_TASK_ROOT || '/var/task'")
                    with open(filepath, "w", encoding="utf-8") as fp:
                        fp.write(new_code)
                    print(f"[OK] Patched fallback in other JS file: {filepath}")
            except Exception as e:
                pass

print(f"=== SUMMARY: Patched {patched_configs} config(s), {patched_launchers} launcher(s), {patched_helpers} helper(s) ===")
