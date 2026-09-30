<?php
/**
 * Header Component with Responsive Navigation
 */
$current_page = isset($active_page) ? $active_page : 'home';
?>
<header class="site-header fixed top-0 left-0 w-full z-50 shadow-[0_1px_8px_rgba(0,0,0,0.04)]">
  <!-- Top Announcement Bar -->
  <div class="bg-inverse-surface text-inverse-on-surface py-2">
    <div class="w-full max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-gutter-desktop flex items-center justify-between gap-space-sm">
      <div class="flex items-center gap-space-md flex-wrap text-body-sm font-body-sm">
        <div class="flex items-center gap-1.5">
          <span class="material-symbols-outlined text-[16px] text-primary-fixed">support_agent</span>
          <span>24/7 Hotline:</span>
          <a class="font-headline-sm text-body-sm text-surface-container-lowest hover:text-primary-fixed transition-colors" href="tel:<?php echo HOTLINE_MAIN_TEL; ?>"><?php echo HOTLINE_MAIN; ?></a>
          <span class="opacity-40">|</span>
          <a class="font-headline-sm text-body-sm text-surface-container-lowest hover:text-primary-fixed transition-colors" href="tel:<?php echo HOTLINE_SHORT; ?>"><?php echo HOTLINE_SHORT; ?></a>
        </div>
        <span class="opacity-40 hidden sm:inline">|</span>
        <div class="flex items-center gap-1.5">
          <span class="material-symbols-outlined text-[16px] text-primary-fixed">mail</span>
          <span>Email:</span>
          <a class="font-headline-sm text-body-sm text-surface-container-lowest hover:text-primary-fixed transition-colors" href="mailto:<?php echo EMAIL_CONTACT; ?>"><?php echo EMAIL_CONTACT; ?></a>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Navigation Bar -->
  <div class="bg-surface/95 backdrop-blur-xl border-b border-surface-container-high/40">
    <div class="h-20 w-full max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-gutter-desktop flex items-center justify-between gap-space-md">
      <!-- Brand Title / Logo -->
      <a class="flex items-center gap-2.5 group" href="home">
        <div class="w-9 h-9 rounded-xl bg-primary flex items-center justify-center text-on-primary shadow-md group-hover:bg-primary-container transition-colors">
          <span class="material-symbols-outlined text-[22px]">solar_power</span>
        </div>
      </a>

      <!-- Desktop Navbar Component -->
      <?php 
        $is_mobile_menu = false;
        require __DIR__ . '/navbar.php'; 
      ?>

      <!-- Action Buttons & Mobile Hamburger Toggle -->
      <div class="flex items-center gap-2 sm:gap-3">
        <!-- Download Brochure Button -->
        <a class="site-header-action hidden sm:inline-flex items-center justify-center px-4 py-2.5 rounded-full bg-secondary-container/80 text-primary font-headline-sm text-body-sm font-semibold border border-primary/20 hover:bg-secondary hover:text-white hover:border-secondary shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5 gap-1.5 group cursor-pointer" href="#" onclick="alert('EarthGreenEnergy Company Brochure will be available for download shortly.'); return false;">
          <span class="material-symbols-outlined text-[18px] group-hover:animate-bounce">download</span>
          <span>Download Brochure</span>
        </a>

        <!-- Get Free Site Audit Button -->
        <a class="site-header-action inline-flex items-center justify-center px-4 sm:px-5 py-2.5 rounded-full bg-primary text-on-primary font-headline-sm text-body-sm font-bold shadow-[0_4px_16px_-4px_rgba(0,105,72,0.3)] hover:bg-primary-container hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 transform gap-1.5 group" href="contact">
          <span>Contact Us</span>
          <span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
        </a>

        <button id="mobile-menu-btn" class="lg:hidden p-2 rounded-lg text-on-surface hover:bg-surface-container-high transition-colors" type="button" aria-label="Toggle navigation menu">
          <span class="material-symbols-outlined text-[24px]">menu</span>
        </button>
      </div>
    </div>

    <!-- Mobile Drawer Menu -->
    <div id="mobile-menu" class="hidden lg:hidden bg-surface-container-lowest border-t border-surface-container-high px-4 py-4 space-y-3 shadow-lg">
      <?php 
        $is_mobile_menu = true;
        require __DIR__ . '/navbar.php'; 
      ?>

      <div class="pt-2 border-t border-surface-container flex flex-col gap-2">
        <a class="w-full inline-flex items-center justify-center px-4 py-2.5 rounded-full bg-secondary-container/80 text-primary font-headline-sm text-body-sm font-semibold border border-primary/20 hover:bg-secondary hover:text-white transition-all gap-1.5" href="#" onclick="alert('EarthGreenEnergy Company Brochure will be available for download shortly.'); return false;">
          <span class="material-symbols-outlined text-[18px]">download</span>
          <span>Download Brochure</span>
        </a>
      </div>
    </div>
  </div>
</header>
