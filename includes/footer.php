<?php
/**
 * Footer Component - Structured 3-Section Layout
 */
?>
<footer class="w-full bg-[#0D233A] text-slate-200 mt-0 border-t border-white/10">
  <div class="w-full max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-gutter-desktop pt-14 pb-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12 mb-12">

      <!-- SECTION 1 (Left): Company Logo, Intro & Social Media Icons -->
      <div class="space-y-4">
        <a class="flex items-center gap-3 group" href="index.php">
          <div class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center text-white shadow-md group-hover:bg-primary-container transition-colors">
            <span class="material-symbols-outlined text-[24px]">solar_power</span>
          </div>
          <span class="font-headline-md text-2xl text-white font-extrabold tracking-tight">EarthGreenEnergy</span>
        </a>
        <p class="text-surface-dim font-body-sm text-body-sm leading-relaxed">
          Bangladesh's premier Engineering, Procurement, and Construction (EPC) authority delivering institutional-grade C&amp;I rooftop solar arrays, Turnkey CAPEX investments, and BERC-certified Net-Metering utility interconnections.
        </p>
        <div class="flex flex-wrap gap-2 pt-1">
          <span class="px-2.5 py-1 rounded bg-surface-variant/10 text-primary-fixed-dim text-label-caps font-label-caps">SREDA &amp; BERC CERTIFIED</span>
          <span class="px-2.5 py-1 rounded bg-surface-variant/10 text-primary-fixed-dim text-label-caps font-label-caps">CERTIFIED STRUCTURAL TESTED</span>
        </div>
        
        <!-- Social Media Icons -->
        <div class="pt-2">
          <span class="block text-xs uppercase tracking-wider text-surface-dim mb-3 font-semibold">Connect With Us</span>
          <div class="flex items-center gap-3">
            <!-- Facebook -->
            <a class="w-9 h-9 rounded-full bg-surface-variant/15 text-surface-container-lowest hover:bg-primary hover:text-white flex items-center justify-center transition-all duration-300 transform hover:scale-110 shadow-sm" href="https://facebook.com" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
              <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
            </a>
            <!-- LinkedIn -->
            <a class="w-9 h-9 rounded-full bg-surface-variant/15 text-surface-container-lowest hover:bg-primary hover:text-white flex items-center justify-center transition-all duration-300 transform hover:scale-110 shadow-sm" href="https://linkedin.com" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
              <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
            </a>
            <!-- YouTube -->
            <a class="w-9 h-9 rounded-full bg-surface-variant/15 text-surface-container-lowest hover:bg-red-600 hover:text-white flex items-center justify-center transition-all duration-300 transform hover:scale-110 shadow-sm" href="https://youtube.com" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
              <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
            </a>
            <!-- WhatsApp -->
            <a class="w-9 h-9 rounded-full bg-surface-variant/15 text-surface-container-lowest hover:bg-[#25d366] hover:text-white flex items-center justify-center transition-all duration-300 transform hover:scale-110 shadow-sm" href="https://wa.me/<?php echo WHATSAPP_NUM; ?>" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
              <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2a9.9 9.9 0 0 0-8.58 14.85L2 22l5.3-1.39A10 10 0 1 0 12 2Zm0 18a8 8 0 0 1-4.08-1.12l-.3-.18-3.14.83.84-3.06-.2-.31A8 8 0 1 1 12 20Zm4.4-5.98c-.24-.12-1.43-.71-1.65-.79-.22-.08-.38-.12-.54.12-.16.24-.62.79-.76.95-.14.16-.28.18-.52.06-1.42-.71-2.35-1.27-3.29-2.87-.25-.43.25-.4.72-1.32.08-.16.04-.3-.02-.42-.06-.12-.54-1.3-.74-1.78-.2-.47-.4-.4-.54-.41h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2s.86 2.31.98 2.47c.12.16 1.69 2.58 4.1 3.62 1.52.66 2.12.72 2.88.61.46-.07 1.43-.58 1.63-1.14.2-.56.2-1.04.14-1.14-.06-.1-.22-.16-.46-.28Z"/></svg>
            </a>
          </div>
        </div>
      </div>

      <!-- SECTION 2 (Middle): Quick Links (All Header Pages) -->
      <div class="space-y-4">
        <h3 class="font-headline-sm text-lg text-white font-bold tracking-wide uppercase text-label-caps border-b border-surface-variant/20 pb-2">Quick Links</h3>
        <ul class="space-y-2.5 text-body-sm font-body-sm text-surface-dim">
          <?php foreach ($nav_menu as $key => $item): ?>
            <li>
              <a class="hover:text-primary-fixed transition-colors flex items-center gap-2 group" href="<?php echo htmlspecialchars($item['url']); ?>">
                <span class="material-symbols-outlined text-[16px] text-primary-fixed opacity-70 group-hover:translate-x-1 transition-transform">chevron_right</span>
                <span><?php echo htmlspecialchars($item['title']); ?></span>
              </a>
            </li>
          <?php endforeach; ?>
          <li>
            <a class="hover:text-primary-fixed transition-colors flex items-center gap-2 group" href="contact.php">
              <span class="material-symbols-outlined text-[16px] text-primary-fixed opacity-70 group-hover:translate-x-1 transition-transform">chevron_right</span>
              <span>Contact Us</span>
            </a>
          </li>
        </ul>
      </div>

      <!-- SECTION 3 (Right): Contact Us Section -->
      <div class="space-y-4">
        <h3 class="font-headline-sm text-lg text-white font-bold tracking-wide uppercase text-label-caps border-b border-surface-variant/20 pb-2">Contact Us</h3>
        <div class="space-y-3 text-body-sm font-body-sm text-surface-dim">
          <div class="flex items-start gap-3">
            <span class="material-symbols-outlined text-[20px] text-primary-fixed shrink-0 mt-0.5">call</span>
            <div>
              <strong class="text-surface-container-lowest block font-bold">24/7 Hotline:</strong>
              <a class="hover:text-primary-fixed transition-colors block" href="tel:<?php echo HOTLINE_MAIN_TEL; ?>"><?php echo HOTLINE_MAIN; ?></a>
              <a class="hover:text-primary-fixed transition-colors text-xs text-surface-dim/80" href="tel:<?php echo HOTLINE_SHORT; ?>">Short Code: <?php echo HOTLINE_SHORT; ?></a>
            </div>
          </div>
          <div class="flex items-start gap-3">
            <span class="material-symbols-outlined text-[20px] text-primary-fixed shrink-0 mt-0.5">mail</span>
            <div>
              <strong class="text-surface-container-lowest block font-bold">Email Address:</strong>
              <a class="hover:text-primary-fixed transition-colors" href="mailto:<?php echo EMAIL_CONTACT; ?>"><?php echo EMAIL_CONTACT; ?></a>
            </div>
          </div>
          <div class="flex items-start gap-3">
            <span class="material-symbols-outlined text-[20px] text-tertiary-fixed shrink-0 mt-0.5">business</span>
            <div>
              <strong class="text-surface-container-lowest block font-bold">Head Office:</strong>
              Malek Mansion (6th floor), 128 Motijheel Commercial Area, Dhaka-1000, Bangladesh
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Bottom Copyright & Legal Line -->
    <div class="pt-6 border-t border-surface-variant/15 flex flex-col md:flex-row items-center justify-between gap-4 text-surface-dim font-body-sm text-body-sm">
      <div>© <?php echo date('Y'); ?> <?php echo SITE_NAME; ?> Ltd. All rights reserved. Registered under SREDA Act &amp; RJSC Bangladesh.</div>
      <div class="flex items-center gap-4 text-label-caps font-label-caps text-xs">
        <a class="hover:text-primary-fixed transition-colors" href="contact.php">Privacy Policy</a>
        <span>•</span>
        <a class="hover:text-primary-fixed transition-colors" href="contact.php">Terms of Service</a>
        <span>•</span>
        <a class="hover:text-primary-fixed transition-colors" href="contact.php">Net Metering Guidelines</a>
      </div>
    </div>
  </div>
</footer>
<script src="assets/js/main.js"></script>
</body>
</html>
