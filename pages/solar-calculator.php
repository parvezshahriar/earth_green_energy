<main id="solar-calculator-app" class="w-full pt-28 bg-background min-h-screen" data-page-key="solar-calculator" data-page-title="<?php echo htmlspecialchars($page_title); ?>">
<div class="flex flex-col w-full">
<!-- Top Ambient Glow Gradient Container -->
<div class="relative w-full overflow-hidden bg-eco-neutral bg-solar-grid-faint border-b border-slate-200/60">
<!-- Section: Header Block -->
<div class="max-w-7xl mx-auto px-6 lg:px-12 pt-6 pb-10">
<div class="flex flex-col items-center text-center max-w-4xl mx-auto">
<!-- Trust badge pill -->
<div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-surface-container-high shadow-sm mb-6">
<span class="material-symbols-outlined text-secondary text-[18px]">verified</span>
<span class="font-label-sm text-label-sm text-primary font-medium tracking-wide">
            Updated with official 2026 BERC Tariffs &amp; SREDA Net Metering Guidelines
          </span>
</div>
<h1 class="font-headline-lg text-headline-lg lg:text-display-hero text-primary tracking-tight mb-4">
          <span class="hero-typewriter-text" data-typewriter-text="Interactive Solar Bill &amp; Savings Calculator">Interactive Solar Bill &amp; Savings Calculator</span>
        </h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl leading-relaxed">
          Calculate how much money your enterprise can save each month, your recommended solar plant size, and your payback timeline in under 60 seconds.
        </p>
<!-- Dynamic Live Benchmark Bar -->
<div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-3 w-full max-w-3xl">
<div class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-lg bg-surface-container-lowest shadow-sm border border-surface-container-high/60 hover:bg-primary hover:border-primary hover:shadow-md transition-all duration-300 ease-in-out transform hover:-translate-y-1 group cursor-pointer">
<span class="material-symbols-outlined text-secondary text-[20px] group-hover:text-primary-fixed group-hover:scale-110 transition-all">bolt</span>
<div class="text-left">
<span class="block font-label-sm text-label-sm text-on-surface-variant group-hover:text-white/80 transition-colors">Grid Offsetting</span>
<span class="font-label-lg text-label-lg text-primary group-hover:text-white font-semibold transition-colors">Up to 72%</span>
</div>
</div>
<div class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-lg bg-surface-container-lowest shadow-sm border border-surface-container-high/60 hover:bg-primary hover:border-primary hover:shadow-md transition-all duration-300 ease-in-out transform hover:-translate-y-1 group cursor-pointer">
<span class="material-symbols-outlined text-tertiary text-[20px] group-hover:text-primary-fixed group-hover:scale-110 transition-all">currency_exchange</span>
<div class="text-left">
<span class="block font-label-sm text-label-sm text-on-surface-variant group-hover:text-white/80 transition-colors">Avg. Payback</span>
<span class="font-label-lg text-label-lg text-primary group-hover:text-white font-semibold transition-colors">3.2 - 3.8 Yrs</span>
</div>
</div>
<div class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-lg bg-surface-container-lowest shadow-sm border border-surface-container-high/60 hover:bg-primary hover:border-primary hover:shadow-md transition-all duration-300 ease-in-out transform hover:-translate-y-1 group cursor-pointer">
<span class="material-symbols-outlined text-secondary text-[20px] group-hover:text-primary-fixed group-hover:scale-110 transition-all">solar_power</span>
<div class="text-left">
<span class="block font-label-sm text-label-sm text-on-surface-variant group-hover:text-white/80 transition-colors">Tier-1 Modules</span>
<span class="font-label-lg text-label-lg text-primary group-hover:text-white font-semibold transition-colors">N-Type TOPCon</span>
</div>
</div>
<div class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-lg bg-surface-container-lowest shadow-sm border border-surface-container-high/60 hover:bg-primary hover:border-primary hover:shadow-md transition-all duration-300 ease-in-out transform hover:-translate-y-1 group cursor-pointer">
<span class="material-symbols-outlined text-primary text-[20px] group-hover:text-primary-fixed group-hover:scale-110 transition-all">shield</span>
<div class="text-left">
<span class="block font-label-sm text-label-sm text-on-surface-variant group-hover:text-white/80 transition-colors">Tier-1 Yield</span>
<span class="font-label-lg text-label-lg text-primary group-hover:text-white font-semibold transition-colors">25-Yr Linear</span>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Section: Main Interactive Horizontal Workbench -->
<div class="max-w-7xl mx-auto px-6 lg:px-12 pb-16 w-full">
  <!-- Horizontal Input Steps Container -->
  <div class="flex flex-col gap-6 w-full bg-surface-container-lowest/60 p-6 lg:p-8 rounded-2xl border border-surface-container-high shadow-sm">
    <div class="border-b border-surface-container pb-4 mb-2 text-center">
      <h2 class="font-headline-md text-headline-md text-primary font-bold">Configure Your Solar Parameters</h2>
      <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Select your category, discom, bill amount, rooftop space, and CAPEX financing model.</p>
    </div>

    <!-- Steps 1 & 2 Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      <!-- Step 1: Customer Type -->
      <div class="bg-surface-container-lowest rounded-xl p-6 shadow-sm flex flex-col justify-between">
        <div class="flex items-center justify-between mb-4">
          <div class="flex items-center gap-3">
            <span class="w-7 h-7 rounded-full bg-primary-container text-on-primary font-label-sm text-label-sm flex items-center justify-center font-bold">1</span>
            <h3 class="font-headline-sm text-[18px] text-primary">Select Your Customer Type</h3>
          </div>
          <span class="font-label-sm text-label-sm text-on-surface-variant">BERC Category</span>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3" id="customerTypeGroup">
          <!-- Option 1: Industrial (Selected by default) -->
          <button class="customer-btn active-type text-left p-4 rounded-xl bg-primary text-white shadow-md flex flex-col justify-between transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg active:scale-95" data-type="industrial" type="button">
            <div class="flex items-center justify-between w-full mb-3">
              <span class="material-symbols-outlined text-[24px] text-white icon-main transition-colors duration-300">factory</span>
              <span class="material-symbols-outlined text-[18px] text-white check-icon transition-colors duration-300">check_circle</span>
            </div>
            <div>
              <p class="font-body-md text-body-md font-semibold text-white title-text transition-colors duration-300">Industrial Factory</p>
              <p class="font-body-sm text-body-sm text-white/90 sub-text transition-colors duration-300 mt-0.5">RMG, Textile, Steel, FMCG Mills</p>
            </div>
          </button>
          <!-- Option 2: Commercial -->
          <button class="customer-btn text-left p-4 rounded-xl bg-surface-container text-on-surface flex flex-col justify-between hover:bg-surface-container-high transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-md active:scale-95" data-type="commercial" type="button">
            <div class="flex items-center justify-between w-full mb-3">
              <span class="material-symbols-outlined text-[24px] text-primary icon-main transition-colors duration-300">domain</span>
              <span class="material-symbols-outlined text-[18px] text-outline-variant check-icon transition-colors duration-300">radio_button_unchecked</span>
            </div>
            <div>
              <p class="font-body-md text-body-md font-semibold text-primary title-text transition-colors duration-300">Commercial Complex</p>
              <p class="font-body-sm text-body-sm text-on-surface-variant sub-text transition-colors duration-300 mt-0.5">High-Rise, Mall, Tech Park</p>
            </div>
          </button>
          <!-- Option 3: Agriculture / Irrigation -->
          <button class="customer-btn text-left p-4 rounded-xl bg-surface-container text-on-surface flex flex-col justify-between hover:bg-surface-container-high transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-md active:scale-95" data-type="agriculture" type="button">
            <div class="flex items-center justify-between w-full mb-3">
              <span class="material-symbols-outlined text-[24px] text-primary icon-main transition-colors duration-300">agriculture</span>
              <span class="material-symbols-outlined text-[18px] text-outline-variant check-icon transition-colors duration-300">radio_button_unchecked</span>
            </div>
            <div>
              <p class="font-body-md text-body-md font-semibold text-primary title-text transition-colors duration-300">Agro / Irrigation</p>
              <p class="font-body-sm text-body-sm text-on-surface-variant sub-text transition-colors duration-300 mt-0.5">Cold Storage &amp; Pumps</p>
            </div>
          </button>
        </div>
      </div>

      <!-- Step 2: Utility DisCom Provider -->
      <div class="bg-surface-container-lowest rounded-xl p-6 shadow-sm flex flex-col justify-between">
        <div class="flex items-center justify-between mb-4">
          <div class="flex items-center gap-3">
            <span class="w-7 h-7 rounded-full bg-primary-container text-on-primary font-label-sm text-label-sm flex items-center justify-center font-bold">2</span>
            <h3 class="font-headline-sm text-[18px] text-primary">Electricity Distribution Company</h3>
          </div>
          <span class="font-label-sm text-label-sm text-secondary font-medium flex items-center gap-1">
            <span class="w-2 h-2 rounded-full bg-secondary"></span> Net Metering Enabled
          </span>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3" id="discomGroup">
          <button class="discom-btn p-3 rounded-lg bg-surface-container text-on-surface text-center font-body-sm text-body-sm font-semibold hover:bg-surface-container-high transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-md active:scale-95" data-discom="DESCO" type="button">
            <span class="block font-headline-sm text-[15px] text-primary title-text transition-colors duration-300">DESCO</span>
            <span class="block font-label-sm text-label-sm text-on-surface-variant sub-text transition-colors duration-300">Dhaka North / Uttara</span>
          </button>
          <button class="discom-btn active-discom p-3 rounded-lg bg-primary text-white text-center font-body-sm text-body-sm font-semibold shadow-md transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg active:scale-95" data-discom="DPDC" type="button">
            <span class="block font-headline-sm text-[15px] text-white title-text transition-colors duration-300">DPDC</span>
            <span class="block font-label-sm text-label-sm text-white/90 sub-text transition-colors duration-300">Dhaka South / Narayanganj</span>
          </button>
          <button class="discom-btn p-3 rounded-lg bg-surface-container text-on-surface text-center font-body-sm text-body-sm font-semibold hover:bg-surface-container-high transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-md active:scale-95" data-discom="BREB" type="button">
            <span class="block font-headline-sm text-[15px] text-primary title-text transition-colors duration-300">BREB / PBS</span>
            <span class="block font-label-sm text-label-sm text-on-surface-variant sub-text transition-colors duration-300">Gazipur &amp; Ashulia</span>
          </button>
          <button class="discom-btn p-3 rounded-lg bg-surface-container text-on-surface text-center font-body-sm text-body-sm font-semibold hover:bg-surface-container-high transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-md active:scale-95" data-discom="BPDB" type="button">
            <span class="block font-headline-sm text-[15px] text-primary title-text transition-colors duration-300">BPDB</span>
            <span class="block font-label-sm text-label-sm text-on-surface-variant sub-text transition-colors duration-300">Chattogram &amp; Urban</span>
          </button>
          <button class="discom-btn p-3 rounded-lg bg-surface-container text-on-surface text-center font-body-sm text-body-sm font-semibold hover:bg-surface-container-high transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-md active:scale-95" data-discom="NESCO" type="button">
            <span class="block font-headline-sm text-[15px] text-primary title-text transition-colors duration-300">NESCO</span>
            <span class="block font-label-sm text-label-sm text-on-surface-variant sub-text transition-colors duration-300">Rajshahi &amp; Rangpur</span>
          </button>
          <button class="discom-btn p-3 rounded-lg bg-surface-container text-on-surface text-center font-body-sm text-body-sm font-semibold hover:bg-surface-container-high transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-md active:scale-95" data-discom="WZPDCL" type="button">
            <span class="block font-headline-sm text-[15px] text-primary title-text transition-colors duration-300">WZPDCL</span>
            <span class="block font-label-sm text-label-sm text-on-surface-variant sub-text transition-colors duration-300">Khulna &amp; Barishal</span>
          </button>
        </div>
      </div>
    </div>

    <!-- Steps 3 & 4 Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      <!-- Step 3: Average Monthly Bill Input & Slider -->
      <div class="bg-surface-container-lowest rounded-xl p-6 shadow-sm flex flex-col justify-between">
        <div class="flex items-center justify-between mb-4">
          <div class="flex items-center gap-3">
            <span class="w-7 h-7 rounded-full bg-primary-container text-on-primary font-label-sm text-label-sm flex items-center justify-center font-bold">3</span>
            <h3 class="font-headline-sm text-[18px] text-primary">Average Monthly Electricity Bill</h3>
          </div>
          <span class="font-label-sm text-label-sm text-on-surface-variant">BDT (৳) Gross / Month</span>
        </div>
        <div class="flex items-center justify-between bg-surface-container-low rounded-xl p-4 mb-4">
          <div>
            <span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant block">Selected Bill Volume</span>
            <span class="font-body-sm text-body-sm text-primary font-medium" id="billInLakhsText">৳ 10.00 Lakhs Per Month</span>
          </div>
          <div class="flex items-center gap-1.5 bg-surface-container-lowest px-4 py-2 rounded-lg shadow-sm">
            <span class="font-headline-sm text-headline-sm text-primary font-bold">৳</span>
            <input aria-label="Monthly Bill Amount in Taka" class="w-36 font-metric-display text-[24px] text-primary font-semibold text-right bg-transparent focus:outline-none" id="billInputDisplay" type="text" value="10,00,000">
          </div>
        </div>
        <div class="space-y-2">
          <input class="w-full h-2.5 bg-surface-container rounded-lg appearance-none cursor-pointer accent-secondary focus:outline-none" id="billRangeSlider" max="5000000" min="50000" step="25000" type="range" value="1000000">
          <div class="flex justify-between font-label-sm text-label-sm text-on-surface-variant">
            <span>৳ 50,000 (Small Unit)</span>
            <span>৳ 25,00,000</span>
            <span>৳ 50,00,000+ (Heavy Plant)</span>
          </div>
        </div>
      </div>

      <!-- Step 4: Usable Rooftop Space (Sq. Ft.) -->
      <div class="bg-surface-container-lowest rounded-xl p-6 shadow-sm flex flex-col justify-between">
        <div class="flex items-center justify-between mb-4">
          <div class="flex items-center gap-3">
            <span class="w-7 h-7 rounded-full bg-primary-container text-on-primary font-label-sm text-label-sm flex items-center justify-center font-bold">4</span>
            <h3 class="font-headline-sm text-[18px] text-primary">Usable Rooftop Space</h3>
          </div>
          <span class="font-label-sm text-label-sm text-on-surface-variant">Sq. Ft. Available</span>
        </div>
        <div class="flex items-center justify-between bg-surface-container-low rounded-xl p-4 mb-4">
          <div>
            <span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant block">Available Roof Footprint</span>
            <span class="font-body-sm text-body-sm text-primary font-medium">Clear Tin / Concrete Roof</span>
          </div>
          <div class="flex items-center gap-1.5 bg-surface-container-lowest px-4 py-2 rounded-lg shadow-sm">
            <input aria-label="Usable Roof Area in Square Feet" class="w-28 font-metric-display text-[24px] text-primary font-semibold text-right bg-transparent focus:outline-none" id="roofAreaDisplay" type="text" value="5,000">
            <span class="font-headline-sm text-body-md text-primary font-bold">Sq.Ft</span>
          </div>
        </div>
        <div class="space-y-2">
          <input class="w-full h-2.5 bg-surface-container rounded-lg appearance-none cursor-pointer accent-secondary focus:outline-none" id="roofAreaSlider" max="50000" min="200" step="50" type="range" value="5000">
          <div class="flex justify-between font-label-sm text-label-sm text-on-surface-variant">
            <span>200 Sq.Ft (Compact)</span>
            <span>25,000 Sq.Ft</span>
            <span>50,000+ Sq.Ft (Massive Array)</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Step 5 Row: CAPEX Investment Model -->
    <div class="bg-surface-container-lowest rounded-xl p-6 shadow-sm w-full">
      <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-3">
          <span class="w-7 h-7 rounded-full bg-primary-container text-on-primary font-label-sm text-label-sm flex items-center justify-center font-bold">5</span>
          <h3 class="font-headline-sm text-[18px] text-primary">Preferred CAPEX Model</h3>
        </div>
        <span class="font-label-sm text-label-sm text-secondary font-semibold flex items-center gap-1">
          <span class="material-symbols-outlined text-[16px]">verified</span> 100% Asset Ownership
        </span>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4" id="modelSelection">
        <!-- CAPEX Turnkey Purchase (Selected Default) -->
        <button class="model-btn active-model text-left p-4 rounded-xl bg-primary text-white shadow-md transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg active:scale-95 flex flex-col justify-between" data-model="capex_direct" type="button">
          <div class="flex items-center justify-between mb-3">
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded bg-white/20 text-white font-semibold badge-pill transition-colors duration-300">Direct Turnkey CAPEX</span>
            <span class="material-symbols-outlined text-white model-check transition-colors duration-300">check_circle</span>
          </div>
          <div>
            <p class="font-headline-sm text-[16px] text-white font-bold title-text transition-colors duration-300">Turnkey Direct Purchase</p>
            <p class="font-body-sm text-body-sm text-white/90 mt-1 sub-text transition-colors duration-300">100% upfront asset ownership. Receive 100% of generated energy cost savings from Day 1 with maximum 25-year ROI.</p>
            <div class="mt-3 flex items-center gap-1.5 font-label-sm text-label-sm text-white/90 font-medium note-text transition-colors duration-300">
              <span class="material-symbols-outlined text-[16px]">check</span> 100% Bill Offset &bull; Max Lifetime ROI
            </div>
          </div>
        </button>
        <!-- CAPEX Commercial Bank Loan -->
        <button class="model-btn text-left p-4 rounded-xl bg-surface-container text-on-surface flex flex-col justify-between hover:bg-surface-container-high transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-md active:scale-95" data-model="capex_bank" type="button">
          <div class="flex items-center justify-between mb-3">
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded bg-surface-container-high text-primary font-semibold badge-pill transition-colors duration-300">Commercial Bank Credit</span>
            <span class="material-symbols-outlined text-outline-variant model-check transition-colors duration-300">radio_button_unchecked</span>
          </div>
          <div>
            <p class="font-headline-sm text-[16px] text-primary font-bold title-text transition-colors duration-300">Commercial Bank Solar Loan</p>
            <p class="font-body-sm text-body-sm text-on-surface-variant mt-1 sub-text transition-colors duration-300">Pay 20% down payment. Finance remaining 80% through commercial green solar loan financing over 5â€“7 years.</p>
            <div class="mt-3 flex items-center gap-1.5 font-label-sm text-label-sm text-primary font-medium note-text transition-colors duration-300">
              <span class="material-symbols-outlined text-[16px]">account_balance</span> 20% Down &bull; Bank Solar Financing
            </div>
          </div>
        </button>
      </div>
    </div>

    <!-- Submit Button Row -->
    <div class="flex flex-col items-center justify-center pt-4 border-t border-surface-container mt-2">
      <button id="calculateSolarBtn" type="button" class="px-10 py-4 rounded-xl bg-primary hover:bg-primary/90 text-white font-headline-sm text-[18px] font-bold shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out transform hover:-translate-y-1 active:scale-95 flex items-center gap-3">
        <span class="material-symbols-outlined text-[24px]">calculate</span>
        <span>Calculate Solar ROI</span>
      </button>
      <p class="font-label-sm text-label-sm text-on-surface-variant mt-2">Click to calculate your customized solar plant capacity, savings &amp; 25-year financial graph</p>
    </div>
  </div>

  <!-- Dynamic Results Display Panel (Hidden by default, shown on Submit button click) -->
  <div id="calculatorResultsPanel" class="hidden mt-10 w-full transition-all duration-500">
    <div class="bg-surface-container-lowest rounded-2xl p-6 lg:p-8 shadow-lg border border-primary/20">
      <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between pb-6 border-b border-surface-container gap-4 mb-6">
        <div>
          <span class="font-label-sm text-label-sm text-secondary font-bold uppercase tracking-wider block">Calculation Output</span>
          <h2 class="font-headline-lg text-headline-lg text-primary font-bold">Your Solar ROI &amp; Financial Feasibility Summary</h2>
        </div>
        <span class="font-label-sm text-label-sm px-3.5 py-1.5 rounded-full bg-secondary-container text-on-primary font-semibold flex items-center gap-1.5 shadow-sm">
          <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span> BERC 2026 Verified
        </span>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
        <!-- LEFT COLUMN: Master Green Savings & 4 Bento Cards & Roof Note (6 cols) -->
        <div class="lg:col-span-6 flex flex-col justify-between gap-5 bg-surface-container-low/40 p-6 rounded-2xl border border-surface-container-high/60">
          <div class="flex flex-col gap-5">
            <!-- Master Green Savings Box -->
            <div class="relative overflow-hidden bg-primary rounded-2xl p-6 text-on-primary shadow-lg flex flex-col justify-between">
              <div class="absolute -right-6 -bottom-6 w-44 h-44 opacity-10 pointer-events-none">
                <svg fill="currentColor" viewBox="0 0 100 100">
                  <circle cx="50" cy="50" fill="none" r="35" stroke="currentColor" stroke-width="4"></circle>
                  <path d="M50 5 L50 20 M50 80 L50 95 M5 50 L20 50 M80 50 L95 50 M18 18 L29 29 M71 71 L82 82 M18 82 L29 71 M71 29 L82 18" stroke="currentColor" stroke-width="4"></path>
                </svg>
              </div>
              <div>
                <div class="flex items-center justify-between mb-2">
                  <span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary-container font-semibold">Estimated Net Savings</span>
                  <span class="font-label-sm text-label-sm px-2.5 py-0.5 rounded-full bg-primary-container text-on-primary flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-secondary-container animate-pulse"></span> Net Metering
                  </span>
                </div>
                <div class="flex items-baseline gap-1 my-2">
                  <span class="font-headline-lg text-[28px] text-secondary-container font-bold">৳</span>
                  <span class="font-display-hero text-headline-lg text-on-primary tracking-tight font-bold" id="monthlySavingsVal">2,50,000</span>
                  <span class="font-body-md text-body-md text-on-primary/80 font-normal ml-1">/ month</span>
                </div>
              </div>
              <div class="bg-primary-container/80 rounded-xl p-3 flex items-center justify-between mt-3">
                <div class="flex items-center gap-2">
                  <span class="material-symbols-outlined text-secondary-container text-[18px]">calendar_month</span>
                  <span class="font-body-sm text-body-sm text-on-primary">Annual Operational Savings</span>
                </div>
                <span class="font-label-lg text-label-lg font-bold text-secondary-container" id="annualSavingsVal">৳ 30.0 Lakhs / Yr</span>
              </div>
            </div>

            <!-- 4 Key Metrics in Clear Bento Cards -->
            <div class="grid grid-cols-2 gap-3.5">
              <!-- Metric 1: Capacity -->
              <div class="bg-surface-container-lowest rounded-xl p-4 shadow-sm flex flex-col justify-between border border-surface-container-high/50">
                <div class="flex items-center justify-between mb-2">
                  <span class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-[18px]">solar_power</span>
                  </span>
                  <span class="font-label-sm text-[10px] uppercase font-semibold text-secondary px-2 py-0.5 rounded bg-surface-container-low">Capacity</span>
                </div>
                <div>
                  <span class="font-metric-display text-[22px] text-primary font-bold block" id="plantSizeVal">457</span>
                  <span class="font-label-sm text-label-sm text-on-surface-variant block mt-0.5 font-medium">Recommended kWp</span>
                </div>
              </div>
              <!-- Metric 2: ROI Period -->
              <div class="bg-surface-container-lowest rounded-xl p-4 shadow-sm flex flex-col justify-between border border-surface-container-high/50">
                <div class="flex items-center justify-between mb-2">
                  <span class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-tertiary">
                    <span class="material-symbols-outlined text-[18px]">timelapse</span>
                  </span>
                  <span class="font-label-sm text-[10px] uppercase font-semibold text-tertiary px-2 py-0.5 rounded bg-tertiary-fixed/30">ROI Period</span>
                </div>
                <div>
                  <span class="font-metric-display text-[22px] text-primary font-bold block" id="paybackVal">3.5</span>
                  <span class="font-label-sm text-label-sm text-on-surface-variant block mt-0.5 font-medium" id="paybackUnit">Years (Full Plant Payback)</span>
                </div>
              </div>
              <!-- Metric 3: ESG Target -->
              <div class="bg-surface-container-lowest rounded-xl p-4 shadow-sm flex flex-col justify-between border border-surface-container-high/50">
                <div class="flex items-center justify-between mb-2">
                  <span class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-secondary">
                    <span class="material-symbols-outlined text-[18px]">co2</span>
                  </span>
                  <span class="font-label-sm text-[10px] uppercase font-semibold text-secondary px-2 py-0.5 rounded bg-surface-container-low">ESG Target</span>
                </div>
                <div>
                  <span class="font-metric-display text-[22px] text-primary font-bold block" id="carbonVal">461</span>
                  <span class="font-label-sm text-label-sm text-on-surface-variant block mt-0.5 font-medium">Tons COâ‚‚e Avoided/Yr</span>
                </div>
              </div>
              <!-- Metric 4: Footprint -->
              <div class="bg-surface-container-lowest rounded-xl p-4 shadow-sm flex flex-col justify-between border border-surface-container-high/50">
                <div class="flex items-center justify-between mb-2">
                  <span class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-[18px]">roofing</span>
                  </span>
                  <span class="font-label-sm text-[10px] uppercase font-semibold text-primary px-2 py-0.5 rounded bg-surface-container-low">Footprint</span>
                </div>
                <div>
                  <span class="font-metric-display text-[22px] text-primary font-bold block" id="roofVal">~31,990</span>
                  <span class="font-label-sm text-label-sm text-on-surface-variant block mt-0.5 font-medium">Sq. Ft. Tin / Concrete</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Roof Constraint Note -->
          <div class="p-3.5 rounded-xl bg-surface-container-lowest shadow-sm border border-surface-container-high/60 flex items-start gap-2.5">
            <span class="material-symbols-outlined text-secondary text-[20px] shrink-0 mt-0.5">info</span>
            <p class="font-body-sm text-body-sm text-on-surface-variant leading-snug" id="roofConstraintNote">
              Your bill-driven system size comfortably fits your available roof area.
            </p>
          </div>
        </div>

        <!-- RIGHT COLUMN: 25-Year 5-Interval Graph (6 cols) -->
        <div class="lg:col-span-6 flex flex-col justify-between gap-5 bg-surface-container-low/40 p-6 rounded-2xl border border-surface-container-high/60">
          <div class="flex flex-col gap-4">
            <!-- Sleek Header with total badge -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b border-surface-container-high/60">
              <div class="flex items-center gap-2.5">
                <div class="w-9 h-9 rounded-lg bg-primary-container/30 flex items-center justify-center text-primary shrink-0">
                  <span class="material-symbols-outlined text-[22px]">savings</span>
                </div>
                <div>
                  <h3 class="font-headline-sm text-[17px] font-bold text-primary leading-tight">25-Year Cumulative Lifecycle Value</h3>
                  <span class="font-label-sm text-[11px] text-on-surface-variant block mt-0.5">Projected Net Savings Over Plant Lifetime</span>
                </div>
              </div>
              <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-primary text-white shadow-sm shrink-0 self-start sm:self-auto">
                <span class="font-label-sm text-[10px] uppercase tracking-wider text-white/80 font-medium">Total:</span>
                <span class="font-headline-sm text-[16px] font-bold text-white tracking-tight" id="twentyFiveYearTotal">৳ 11.7+ Crore</span>
              </div>
            </div>

            <!-- 5-Year Interval Bar Graph with Accurate Heights and Separated Labels -->
            <div class="w-full bg-surface-container-lowest p-4 rounded-xl border border-surface-container-high shadow-sm">
              <div class="grid grid-cols-5 gap-2 w-full">
                <!-- Bar 1: Yr 5 -->
                <div class="flex flex-col items-center">
                  <div class="h-7 flex items-center justify-center">
                    <span class="font-label-sm text-[10px] sm:text-[11px] font-bold text-primary text-center leading-none" id="barYr5Val">৳ 1.5 L</span>
                  </div>
                  <div class="h-44 w-full flex items-end justify-center bg-surface-container-low/50 rounded-lg p-1">
                    <div class="w-full bg-primary-container/60 hover:bg-primary-container rounded-t transition-all duration-500 ease-out" id="barYr5Height" style="height: 20%;"></div>
                  </div>
                  <div class="pt-2 flex justify-center">
                    <span class="font-label-sm text-label-sm text-on-surface-variant font-semibold">Yr 5</span>
                  </div>
                </div>

                <!-- Bar 2: Yr 10 -->
                <div class="flex flex-col items-center">
                  <div class="h-7 flex items-center justify-center">
                    <span class="font-label-sm text-[10px] sm:text-[11px] font-bold text-primary text-center leading-none" id="barYr10Val">৳ 3.0 L</span>
                  </div>
                  <div class="h-44 w-full flex items-end justify-center bg-surface-container-low/50 rounded-lg p-1">
                    <div class="w-full bg-primary-container/80 hover:bg-primary-container rounded-t transition-all duration-500 ease-out" id="barYr10Height" style="height: 40%;"></div>
                  </div>
                  <div class="pt-2 flex justify-center">
                    <span class="font-label-sm text-label-sm text-on-surface-variant font-semibold">Yr 10</span>
                  </div>
                </div>

                <!-- Bar 3: Yr 15 -->
                <div class="flex flex-col items-center">
                  <div class="h-7 flex items-center justify-center">
                    <span class="font-label-sm text-[10px] sm:text-[11px] font-bold text-secondary text-center leading-none" id="barYr15Val">৳ 4.5 L</span>
                  </div>
                  <div class="h-44 w-full flex items-end justify-center bg-surface-container-low/50 rounded-lg p-1">
                    <div class="w-full bg-secondary/70 hover:bg-secondary rounded-t transition-all duration-500 ease-out" id="barYr15Height" style="height: 60%;"></div>
                  </div>
                  <div class="pt-2 flex justify-center">
                    <span class="font-label-sm text-label-sm text-on-surface-variant font-semibold">Yr 15</span>
                  </div>
                </div>

                <!-- Bar 4: Yr 20 -->
                <div class="flex flex-col items-center">
                  <div class="h-7 flex items-center justify-center">
                    <span class="font-label-sm text-[10px] sm:text-[11px] font-bold text-secondary text-center leading-none" id="barYr20Val">৳ 6.0 L</span>
                  </div>
                  <div class="h-44 w-full flex items-end justify-center bg-surface-container-low/50 rounded-lg p-1">
                    <div class="w-full bg-secondary hover:bg-secondary/90 rounded-t transition-all duration-500 ease-out" id="barYr20Height" style="height: 80%;"></div>
                  </div>
                  <div class="pt-2 flex justify-center">
                    <span class="font-label-sm text-label-sm text-on-surface-variant font-semibold">Yr 20</span>
                  </div>
                </div>

                <!-- Bar 5: Yr 25 -->
                <div class="flex flex-col items-center">
                  <div class="h-7 flex items-center justify-center">
                    <span class="font-label-sm text-[10px] sm:text-[11px] font-bold text-primary text-center leading-none" id="barYr25Val">৳ 7.5 L</span>
                  </div>
                  <div class="h-44 w-full flex items-end justify-center bg-surface-container-low/50 rounded-lg p-1">
                    <div class="w-full bg-primary rounded-t shadow-sm hover:bg-primary/90 transition-all duration-500 ease-out" id="barYr25Height" style="height: 100%;"></div>
                  </div>
                  <div class="pt-2 flex justify-center">
                    <span class="font-label-sm text-label-sm text-primary font-bold">Yr 25</span>
                  </div>
                </div>
              </div>

              <p class="font-label-sm text-[11px] text-on-surface-variant mt-3 flex items-center justify-between pt-2 border-t border-surface-container">
                <span>*Assumes 0.5%/yr degradation &amp; June 2026 BERC rate.</span>
                <span class="text-secondary font-medium">Equiv: ~18,500 trees</span>
              </p>
            </div>
          </div>

          <!-- Bottom Action: Calculate Again Button -->
          <div class="pt-2 flex justify-center">
            <button id="recalculateAgainBtn" type="button" class="w-full py-3.5 px-6 rounded-xl bg-primary hover:bg-primary/90 text-white font-headline-sm text-[15px] font-bold shadow-md hover:shadow-lg transition-all duration-300 ease-in-out flex items-center justify-center gap-2 transform hover:-translate-y-0.5 active:scale-95">
              <span class="material-symbols-outlined text-[20px]">refresh</span>
              <span>Calculate Again / Adjust Parameters</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Section: Technical Methodology & Frequently Asked Questions -->
<div class="max-w-7xl mx-auto px-6 lg:px-12 pb-20 w-full">
<div class="bg-surface-container-low rounded-2xl p-8 lg:p-12 shadow-sm">
<div class="text-center max-w-3xl mx-auto mb-12">
<div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-secondary-container text-on-secondary-fixed text-label-caps font-label-caps tracking-widest uppercase shadow-sm mb-3">
<span class="material-symbols-outlined text-[18px]">verified</span>
<span>Transparency &amp; Methodology</span>
</div>
<h2 class="font-headline-xl text-3xl md:text-4xl text-primary font-bold tracking-tight mb-3">
        How EarthGreenEnergy Calculates Your Solar ROI
      </h2>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
        Our upgraded v2 calculation engine incorporates official June 2026 BERC retail energy rates, DisCom-specific bulk export buy-back tariffs (BPDB, BREB, DESCO, DPDC, NESCO, WZPDCL), time-limited government export incentives, dual-ceiling rooftop area constraints (100 sq.ft/kWp), and 0.5% annual panel output degradation over a 25-year lifecycle projection.
      </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="bg-primary p-6 rounded-xl shadow-md border border-white/10 hover:bg-primary/95 hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 ease-in-out group cursor-pointer flex flex-col justify-between">
<div>
<h4 class="font-headline-sm text-[16px] text-white font-bold mb-3 flex items-center gap-3">
<div class="w-9 h-9 rounded-lg bg-white/15 text-primary-fixed flex items-center justify-center shrink-0 shadow-sm group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-[20px]">speed</span>
</div>
<span>How accurate is this online estimator?</span>
</h4>
<p class="font-body-sm text-body-sm text-white/90 leading-relaxed">
            Within &plusmn;5% of a full 3D LiDAR and shadow simulation. It converts your monthly bill to real kWh units based on category tariffs (+5% VAT) and cross-references your available rooftop space to find the optimal system capacity.
          </p>
</div>
</div>
<div class="bg-primary p-6 rounded-xl shadow-md border border-white/10 hover:bg-primary/95 hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 ease-in-out group cursor-pointer flex flex-col justify-between">
<div>
<h4 class="font-headline-sm text-[16px] text-white font-bold mb-3 flex items-center gap-3">
<div class="w-9 h-9 rounded-lg bg-white/15 text-primary-fixed flex items-center justify-center shrink-0 shadow-sm group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-[20px]">bolt</span>
</div>
<span>Can my factory export excess power to the national grid?</span>
</h4>
<p class="font-body-sm text-body-sm text-white/90 leading-relaxed">
            Yes. Under Bangladesh Net Metering Guidelines, surplus generation exported to grid is credited at your DisCom's bulk purchase rate (4.37 - 6.45 ৳/kWh). Installs completed before Feb 2027 unlock the special 10.50 ৳/kWh incentive export rate.
          </p>
</div>
</div>
<div class="bg-primary p-6 rounded-xl shadow-md border border-white/10 hover:bg-primary/95 hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 ease-in-out group cursor-pointer flex flex-col justify-between">
<div>
<h4 class="font-headline-sm text-[16px] text-white font-bold mb-3 flex items-center gap-3">
<div class="w-9 h-9 rounded-lg bg-white/15 text-primary-fixed flex items-center justify-center shrink-0 shadow-sm group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-[20px]">roofing</span>
</div>
<span>How does usable rooftop space impact my system sizing?</span>
</h4>
<p class="font-body-sm text-body-sm text-white/90 leading-relaxed">
            The engine evaluates two ceilings: your bill load offset requirement and your available clear roof space (100 Sq.Ft per kWp). The calculator automatically caps plant capacity to whichever constraint is smaller to ensure realistic feasibility.
          </p>
</div>
</div>
<div class="bg-primary p-6 rounded-xl shadow-md border border-white/10 hover:bg-primary/95 hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 ease-in-out group cursor-pointer flex flex-col justify-between">
<div>
<h4 class="font-headline-sm text-[16px] text-white font-bold mb-3 flex items-center gap-3">
<div class="w-9 h-9 rounded-lg bg-white/15 text-primary-fixed flex items-center justify-center shrink-0 shadow-sm group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-[20px]">account_balance</span>
</div>
<span>What CAPEX investment &amp; financing models are available?</span>
</h4>
<p class="font-body-sm text-body-sm text-white/90 leading-relaxed">
            Choose from Direct Turnkey CAPEX Purchase (100% asset ownership with maximum lifetime ROI) or custom Turnkey investment models.
          </p>
</div>
</div>
</div>
</div>
</div>
<!-- Interactive JavaScript Engine for Real-Time Recalculation -->

<script src="assets/js/solar-calculator.js" onload="if(typeof window.initSolarCalculator==='function')window.initSolarCalculator();"></script>
</main>
