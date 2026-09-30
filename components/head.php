<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo isset($page_title) ? htmlspecialchars($page_title) . ' | ' . SITE_NAME : SITE_NAME; ?></title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
  
  <style>
    @layer base {
      html, body { margin: 0; padding: 0; }
      body { overscroll-behavior: none; }
      main > :first-child { margin-top: 0 !important; }
      main > :last-child { margin-bottom: 0 !important; }
    }
    .site-header { position: fixed; top: 0; right: 0; left: 0; z-index: 50; box-shadow: 0 1px 8px rgba(0, 0, 0, 0.04); }
    .site-header > div:first-child { background: #283044; color: #eef0ff; padding: 8px 0; }
    .site-header > div:nth-child(2) { background: rgba(250, 248, 255, 0.95); border-bottom: 1px solid rgba(226, 231, 255, 0.4); }
    .site-header > div:nth-child(2) > div:first-child { display: flex; align-items: center; justify-content: space-between; gap: 16px; height: 80px; max-width: 1280px; margin: 0 auto; padding: 0 16px; }
    .site-header nav { display: none; }
    .site-header .site-header-action { display: inline-flex; align-items: center; justify-content: center; }
    .site-header #mobile-menu-btn { display: block; }
    @media (min-width: 1024px) {
      .site-header nav { display: flex; align-items: center; gap: 24px; }
      .site-header #mobile-menu-btn { display: none; }
    }
    ::-webkit-scrollbar { display: none; }
  </style>

  <script src="https://cdn.tailwindcss.com"></script>
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "on-primary-container": "#f5fff7",
            "on-secondary-fixed": "#002117",
            "surface-dim": "#d2d9f4",
            "on-primary-fixed": "#002114",
            "secondary": "#2b6954",
            "primary-container": "#00855d",
            "primary-fixed": "#85f8c4",
            "on-background": "#131b2e",
            "on-error": "#ffffff",
            "on-primary-fixed-variant": "#005137",
            "on-tertiary": "#ffffff",
            "tertiary-fixed-dim": "#ffb95f",
            "on-tertiary-fixed-variant": "#653e00",
            "surface-container": "#eaedff",
            "secondary-fixed-dim": "#95d3ba",
            "surface-tint": "#006c4a",
            "on-primary": "#ffffff",
            "on-surface-variant": "#3d4a42",
            "tertiary-fixed": "#ffddb8",
            "outline-variant": "#bccac0",
            "surface-container-lowest": "#ffffff",
            "error-container": "#ffdad6",
            "on-secondary": "#ffffff",
            "surface-container-highest": "#dae2fd",
            "tertiary": "#825100",
            "primary": "#006948",
            "on-surface": "#131b2e",
            "surface-bright": "#faf8ff",
            "inverse-primary": "#68dba9",
            "surface": "#faf8ff",
            "inverse-on-surface": "#eef0ff",
            "error": "#ba1a1a",
            "on-secondary-container": "#306d58",
            "secondary-fixed": "#b0f0d6",
            "on-secondary-fixed-variant": "#0b513d",
            "tertiary-container": "#a36700",
            "surface-variant": "#dae2fd",
            "surface-container-high": "#e2e7ff",
            "secondary-container": "#adedd3",
            "inverse-surface": "#283044",
            "on-tertiary-fixed": "#2a1700",
            "outline": "#6d7a72",
            "background": "#faf8ff",
            "primary-fixed-dim": "#68dba9",
            "surface-container-low": "#f2f3ff",
            "on-tertiary-container": "#fffbff",
            "on-error-container": "#93000a"
          },
          borderRadius: {
            "DEFAULT": "0.25rem",
            "lg": "0.5rem",
            "xl": "0.75rem",
            "full": "9999px"
          },
          spacing: {
            "space-xs": "0.25rem",
            "space-xl": "2.5rem",
            "margin-desktop": "5rem",
            "space-sm": "0.5rem",
            "space-md": "1rem",
            "gutter": "1.5rem",
            "gutter-desktop": "2rem",
            "space-lg": "1.5rem",
            "margin": "1.5rem"
          },
          fontFamily: {
            "body-md": ["Plus Jakarta Sans"],
            "headline-md": ["Plus Jakarta Sans"],
            "metric-counter-mobile": ["Plus Jakarta Sans"],
            "headline-lg": ["Plus Jakarta Sans"],
            "display-hero": ["Plus Jakarta Sans"],
            "label-caps": ["Plus Jakarta Sans"],
            "label-pill": ["Plus Jakarta Sans"],
            "metric-counter": ["Plus Jakarta Sans"],
            "headline-xl": ["Plus Jakarta Sans"],
            "headline-xl-mobile": ["Plus Jakarta Sans"],
            "body-sm": ["Plus Jakarta Sans"],
            "body-lg": ["Plus Jakarta Sans"],
            "headline-sm": ["Plus Jakarta Sans"],
            "display-hero-mobile": ["Plus Jakarta Sans"],
            "label-lg": ["JetBrains Mono"],
            "label-sm": ["Plus Jakarta Sans"],
            "metric-display": ["JetBrains Mono"]
          },
          fontSize: {
            "body-md": ["15px", { lineHeight: "24px", fontWeight: "400" }],
            "headline-md": ["22px", { lineHeight: "30px", fontWeight: "600" }],
            "metric-counter-mobile": ["32px", { lineHeight: "36px", fontWeight: "800" }],
            "headline-lg": ["30px", { lineHeight: "38px", fontWeight: "700" }],
            "display-hero": ["56px", { lineHeight: "64px", fontWeight: "800" }],
            "label-caps": ["11px", { lineHeight: "16px", fontWeight: "700" }],
            "label-pill": ["13px", { lineHeight: "18px", fontWeight: "600" }],
            "metric-counter": ["44px", { lineHeight: "48px", fontWeight: "800" }],
            "headline-xl": ["40px", { lineHeight: "48px", fontWeight: "700" }],
            "headline-xl-mobile": ["28px", { lineHeight: "36px", fontWeight: "700" }],
            "body-sm": ["13px", { lineHeight: "20px", fontWeight: "400" }],
            "body-lg": ["18px", { lineHeight: "28px", fontWeight: "400" }],
            "headline-sm": ["22px", { lineHeight: "30px", fontWeight: "600" }],
            "display-hero-mobile": ["36px", { lineHeight: "44px", fontWeight: "700" }],
            "label-lg": ["14px", { lineHeight: "20px", fontWeight: "500" }],
            "label-sm": ["11px", { lineHeight: "16px", fontWeight: "500" }],
            "metric-display": ["32px", { lineHeight: "40px", fontWeight: "600" }]
          }
        }
      }
    };
  </script>
  <link rel="stylesheet" href="assets/css/main.css?v=<?php echo time(); ?>">
</head>
<body class="bg-background font-body-md text-on-surface antialiased" data-page="<?php echo isset($active_page) ? htmlspecialchars($active_page) : 'home'; ?>">
