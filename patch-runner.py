#!/usr/bin/env python3
"""
Comprehensive post-build patch script for vercel-php on Vercel's Node 20/22/24 Rust runtime.
1. Patches .vc-config.json (handler, launcherType, awsLambdaHandler)
2. Recursively searches and patches helpers.js, builtin.js, and launcher.js across:
   - .vercel/output (with followlinks=True)
   - /home/runner (builder cache where FileFsRef targets reside)
   - /tmp
3. Injects LAMBDA_TASK_ROOT='/var/task' fallback so PHP binary is found (/var/task/php/php)
"""
import os
import json
import sys

print("=== STARTING VERCEL PHP RUNTIME PATCH ===")

# 1. Inspect and patch .vc-config.json
functions_dir = ".vercel/output/functions"
if os.path.exists(functions_dir):
    for root, dirs, files in os.walk(functions_dir, followlinks=True):
        print(f"Scanning function dir: {root} -> Files: {files}")
        for f in files:
            if f == ".vc-config.json":
                config_path = os.path.join(root, f)
                try:
                    with open(config_path, "r", encoding="utf-8") as fp:
                        cfg = json.load(fp)
                    print(f"Original config content: {cfg}")
                    cfg["awsLambdaHandler"] = "launcher.launcher"
                    cfg["handler"] = "launcher.js"
                    cfg["launcherType"] = "Nodejs"
                    with open(config_path, "w", encoding="utf-8") as fp:
                        json.dump(cfg, fp, indent=2)
                    print(f"[OK] Patched config: {config_path}")
                except Exception as e:
                    print(f"[ERROR] Failed to patch config {config_path}: {e}")

# 2. Patch all JS files across .vercel, /home/runner, and /tmp
search_paths = [".vercel", "/home/runner", "/tmp"]
patched_files = 0

for base_path in search_paths:
    if not os.path.exists(base_path):
        continue
    print(f"Searching for PHP runtime files in: {base_path}")
    for root, dirs, files in os.walk(base_path, followlinks=True):
        for f in files:
            if f in ["helpers.js", "builtin.js", "launcher.js"] or f.endswith(".js"):
                filepath = os.path.join(root, f)
                try:
                    # Resolve symlink if needed
                    real_path = os.path.realpath(filepath)
                    for target_file in set([filepath, real_path]):
                        if not os.path.isfile(target_file):
                            continue
                        with open(target_file, "r", encoding="utf-8", errors="ignore") as fp:
                            code = fp.read()
                        
                        modified = False
                        
                        # Replace LAMBDA_TASK_ROOT || '/' with '/var/task'
                        if "process.env.LAMBDA_TASK_ROOT || '/'" in code:
                            code = code.replace("process.env.LAMBDA_TASK_ROOT || '/'", "process.env.LAMBDA_TASK_ROOT || '/var/task'")
                            modified = True
                        if 'process.env.LAMBDA_TASK_ROOT || "/"' in code:
                            code = code.replace('process.env.LAMBDA_TASK_ROOT || "/"', "process.env.LAMBDA_TASK_ROOT || '/var/task'")
                            modified = True
                            
                        # If this is builtin.js or launcher.js, prepend the task root initialization
                        if (f in ["builtin.js", "launcher.js"] or "Spawning: PHP Built-In Server" in code):
                            prefix = "process.env.LAMBDA_TASK_ROOT = process.env.LAMBDA_TASK_ROOT || '/var/task';\n"
                            if prefix not in code:
                                code = prefix + code
                                modified = True
                        
                        if modified:
                            with open(target_file, "w", encoding="utf-8") as fp:
                                fp.write(code)
                            patched_files += 1
                            print(f"[OK] Patched runtime file: {target_file}")
                except Exception as e:
                    pass

print(f"=== SUMMARY: Successfully patched {patched_files} runtime file(s) ===")
