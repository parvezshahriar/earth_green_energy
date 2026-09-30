<main class="w-full pt-20 bg-background min-h-screen" data-page-key="contact"
  data-page-title="<?php echo htmlspecialchars($page_title); ?>">

  <!-- Split-Screen Contact Section (Zero Distractions: Warm Sand #F5F2EB for Office Details + Pure Flat White #FFFFFF for Form) -->
  <section class="w-full min-h-[calc(100vh-80px)] grid grid-cols-1 lg:grid-cols-12">

    <!-- LEFT SIDE: Flat Warm Sand (#F5F2EB) for Office Details & Map -->
    <div class="lg:col-span-6 bg-contact-details p-8 sm:p-12 lg:p-16 flex flex-col justify-between space-y-8 border-r border-amber-900/10">
      
      <!-- Top Title & Badge -->
      <div class="space-y-4 max-w-xl">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-900/10 text-amber-900 font-label-caps text-label-caps uppercase tracking-wider font-extrabold">
          <span class="material-symbols-outlined text-[18px]">location_on</span>
          <span>Corporate Head Office &amp; Engineering Support</span>
        </div>
        <h1 class="font-headline-xl text-3xl md:text-5xl text-slate-900 font-black tracking-tight leading-tight">
          Get in Touch with EarthGreenEnergy
        </h1>
        <p class="font-body-lg text-body-lg text-slate-700 leading-relaxed">
          Visit our corporate headquarters in Dhaka or reach out directly to our senior engineering desk for feasibility audits and tariff filings.
        </p>
      </div>

      <!-- Emergency Hotlines & Direct Desks -->
      <div class="space-y-4 max-w-xl">
        <h3 class="text-xs font-extrabold text-amber-900 uppercase tracking-widest">Direct Engineering Desks</h3>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <a href="tel:<?php echo HOTLINE_MAIN_TEL; ?>" class="flex items-center gap-3.5 p-4 rounded-2xl bg-white shadow-sm hover:shadow-md border border-amber-900/10 transition-all group">
            <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-800 flex items-center justify-center shrink-0">
              <span class="material-symbols-outlined text-[20px]">call</span>
            </div>
            <div>
              <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">Primary Hotline</span>
              <span class="font-bold text-slate-900 text-sm group-hover:text-emerald-700 transition-colors"><?php echo HOTLINE_MAIN; ?></span>
            </div>
          </a>

          <a href="mailto:<?php echo EMAIL_CONTACT; ?>" class="flex items-center gap-3.5 p-4 rounded-2xl bg-white shadow-sm hover:shadow-md border border-amber-900/10 transition-all group">
            <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-800 flex items-center justify-center shrink-0">
              <span class="material-symbols-outlined text-[20px]">mail</span>
            </div>
            <div class="min-w-0">
              <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">Corporate Email</span>
              <span class="font-bold text-slate-900 text-sm truncate block group-hover:text-emerald-700 transition-colors"><?php echo EMAIL_CONTACT; ?></span>
            </div>
          </a>
        </div>
      </div>

      <!-- Google Map Container & Address Card -->
      <div class="space-y-4 max-w-xl">
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-amber-900/10 space-y-4">
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-2 text-slate-900 font-bold">
              <span class="material-symbols-outlined text-emerald-700">corporate_fare</span>
              <h3 class="text-base">Malek Mansion (6th Floor)</h3>
            </div>
            <span class="text-xs px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-800 font-bold">Motijheel C/A, Dhaka</span>
          </div>

          <p class="text-sm text-slate-600 leading-relaxed">
            128 Motijheel Commercial Area, Dhaka-1000, Bangladesh.<br>
            <span class="text-xs text-slate-500">Business Hours: Sat–Thu (9:00 AM - 6:00 PM)</span>
          </p>

          <!-- Embedded Map -->
          <div class="w-full h-56 rounded-xl overflow-hidden shadow-inner border border-slate-200 relative bg-slate-100">
            <iframe title="EarthGreenEnergy Head Office Map - Malek Mansion Motijheel Dhaka"
              class="w-full h-full border-0"
              src="https://maps.google.com/maps?q=23.7297613,90.4168468&amp;hl=en&amp;z=17&amp;output=embed"
              allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>

          <a href="https://maps.google.com/maps?q=23.7297613,90.4168468" target="_blank" rel="noopener noreferrer"
            class="inline-flex items-center gap-2 text-xs font-bold text-emerald-800 hover:text-emerald-950 transition-colors">
            <span class="material-symbols-outlined text-[16px]">open_in_new</span>
            <span>Open Location in Google Maps</span>
          </a>
        </div>
      </div>

    </div>

    <!-- RIGHT SIDE: Pure Flat White (#FFFFFF) for Contact & Technical Inquiry Form -->
    <div class="lg:col-span-6 bg-contact-form p-8 sm:p-12 lg:p-16 flex flex-col justify-center">
      <div class="max-w-xl mx-auto w-full space-y-6">
        
        <div>
          <div class="inline-flex items-center gap-2 text-emerald-700 text-xs font-bold uppercase tracking-wider mb-2">
            <span class="material-symbols-outlined text-[18px]">send</span>
            <span>Technical Audit &amp; Inquiry Form</span>
          </div>
          <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">
            Request A Commercial Feasibility Proposal
          </h2>
          <p class="text-sm text-slate-600 mt-1">
            Fill out your facility details below. Our certified engineering corps will deliver a preliminary 3D LiDAR roof shading report within 48 hours.
          </p>
        </div>

        <form action="#" method="POST" onsubmit="alert('Thank you! Your solar inquiry has been logged. Our engineering desk will contact you within 24 hours.'); return false;" class="space-y-4">
          
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Full Name -->
            <div class="space-y-1.5">
              <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Your Full Name *</label>
              <input type="text" required placeholder="e.g. Engr. Rafiqul Islam" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 text-slate-900 text-sm outline-none transition-all">
            </div>

            <!-- Phone Number -->
            <div class="space-y-1.5">
              <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Mobile Number *</label>
              <input type="tel" required placeholder="+8801700-000000" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 text-slate-900 text-sm outline-none transition-all">
            </div>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Email Address -->
            <div class="space-y-1.5">
              <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Work Email *</label>
              <input type="email" required placeholder="name@company.com" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 text-slate-900 text-sm outline-none transition-all">
            </div>

            <!-- Project Type -->
            <div class="space-y-1.5">
              <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Facility Type *</label>
              <select required class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 text-slate-900 text-sm outline-none transition-all bg-white">
                <option value="">Select Facility Category</option>
                <option value="textile">Textile / Garments Factory Rooftop</option>
                <option value="cold_storage">Industrial Cold Storage Solar Architecture</option>
                <option value="agro">Agro-Processing &amp; Grain Silo Array</option>
                <option value="utility">Utility-Scale Ground Mount</option>
                <option value="hybrid">Battery Storage &amp; Hybrid Microgrid</option>
              </select>
            </div>
          </div>

          <!-- Monthly Bill Estimate -->
          <div class="space-y-1.5">
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Approximate Monthly Electricity Bill (BDT)</label>
            <input type="text" placeholder="e.g. 5,00,000 BDT / month" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 text-slate-900 text-sm outline-none transition-all">
          </div>

          <!-- Inquiry Details -->
          <div class="space-y-1.5">
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Project / Facility Details</label>
            <textarea rows="4" placeholder="Mention available roof area (sq. ft), transformer capacity, or specific Net-Metering requirements..." class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 text-slate-900 text-sm outline-none transition-all resize-none"></textarea>
          </div>

          <!-- Submit Button -->
          <button type="submit" class="w-full py-4 px-8 rounded-xl bg-emerald-700 hover:bg-emerald-800 text-white font-bold text-base shadow-md hover:shadow-lg transition-all duration-300 flex items-center justify-center gap-2 group">
            <span>Submit Technical Inquiry</span>
            <span class="material-symbols-outlined text-[20px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
          </button>

        </form>

      </div>
    </div>

  </section>

</main>
