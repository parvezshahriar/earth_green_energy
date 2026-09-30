<?php
/**
 * Floating WhatsApp Contact Button
 */
?>
<aside class="fixed bottom-6 right-6 z-50">
  <div class="relative group">
    <!-- Continuous ambient pulse ring -->
    <span class="whatsapp-ping-ring pointer-events-none"></span>
    <a class="whatsapp-float-btn relative z-10 flex items-center gap-3 px-5 py-3.5 rounded-full bg-[#25d366] text-white shadow-[0_12px_28px_-6px_rgba(37,211,102,0.6)]  transition-all transform active:scale-95 cursor-pointer" href="https://wa.me/<?php echo WHATSAPP_NUM; ?>" rel="noopener noreferrer" target="_blank" aria-label="Contact Us on WhatsApp">
      <svg class="w-6 h-6 shrink-0 fill-current text-white" viewBox="0 0 24 24" aria-hidden="true">
        <path d="M12 2a9.9 9.9 0 0 0-8.58 14.85L2 22l5.3-1.39A10 10 0 1 0 12 2Zm0 18a8 8 0 0 1-4.08-1.12l-.3-.18-3.14.83.84-3.06-.2-.31A8 8 0 1 1 12 20Zm4.4-5.98c-.24-.12-1.43-.71-1.65-.79-.22-.08-.38-.12-.54.12-.16.24-.62.79-.76.95-.14.16-.28.18-.52.06-1.42-.71-2.35-1.27-3.29-2.87-.25-.43.25-.4.72-1.32.08-.16.04-.3-.02-.42-.06-.12-.54-1.3-.74-1.78-.2-.47-.4-.4-.54-.41h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2s.86 2.31.98 2.47c.12.16 1.69 2.58 4.1 3.62 1.52.66 2.12.72 2.88.61.46-.07 1.43-.58 1.63-1.14.2-.56.2-1.04.14-1.14-.06-.1-.22-.16-.46-.28Z" />
      </svg>
      <div class="flex flex-col text-left leading-tight">
        <span class="text-xs font-extrabold uppercase tracking-wider text-white">Contact Us</span>
      </div>
    </a>
  </div>
</aside>
