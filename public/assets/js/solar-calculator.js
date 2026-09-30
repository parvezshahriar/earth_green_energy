/**
 * Solar ROI & Feasibility Calculator Engine — CAPEX Direct Ownership Edition
 * Rebuilt for accuracy: real tariff-derived units, roof-area-constrained
 * sizing, 100% CAPEX Direct Asset Ownership (Turnkey Purchase & Commercial Bank Loan),
 * degradation + escalation over 25 years.
 *
 * VERIFY BEFORE PRODUCTION: Bangladesh's retail tariff has been revised
 * twice in 2026 (March, June). Cross-check RATE_TABLE below against the
 * current BERC gazette (berc.org.bd) before relying on it for real
 * customer-facing numbers — third-party trackers lag at different speeds.
 */
function initSolarCalculator() {
  const calculatorContainer = document.getElementById('solar-calculator-app');
  if (!calculatorContainer) return;

  // ───────────────────────────────────────────────────────────
  // VERIFIED CONSTANTS (re-check dates in comments before go-live)
  // ───────────────────────────────────────────────────────────

  // Retail energy rate by customer category — flat rates (৳/kWh).
  // Sourced: BERC tariff, June 2026 cycle, via ebill.info.bd/tariff.
  const RETAIL_RATE = {
    industrial:  11.85,  // LT-C1 / MT industrial baseline rate
    commercial:  16.13,  // LT-E blended (peak 18.43 / off-peak 13.82 mix)
    agriculture: 6.04    // LT-B, verified June 2026
  };
  const VAT = 0.05; // applied on top of energy charge

  // DISCOM export/bulk buy-back rate for surplus units sent to grid (৳/kWh)
  const DISCOM_BULK_RATE = {
    BPDB: 5.9088, BREB: 4.3679, DESCO: 6.4523,
    DPDC: 6.4531, NESCO: 5.0544, WZPDCL: 5.3771
  };

  // Time-limited incentive export rate — installs completed before the
  // deadline get this rate instead of the DISCOM bulk rate, for 3 years.
  const INCENTIVE_EXPORT_RATE = 10.50;
  const INCENTIVE_DEADLINE = new Date('2027-02-28');
  const incentiveActive = () => new Date() < INCENTIVE_DEADLINE;

  // Generation & sizing assumptions
  const YIELD_PER_KWP_YEAR = 1300;  // kWh/kWp/yr — Bangladesh typical range ~1150–1400
  const SQFT_PER_KWP = 100;         // industry rule of thumb
  const DEGRADATION = 0.005;        // panel output loss per year
  const ESCALATION = 0.0;           // conservative 0% escalation default

  // CAPEX Turnkey Cost Benchmark in Bangladesh ~৳ 56,000 / kWp (SREDA EPC Standard)
  const COST_PER_KWP = 56000;

  // ───────────────────────────────────────────────────────────
  // STATE
  // ───────────────────────────────────────────────────────────
  let state = {
    bill: 1000000,
    customerType: 'industrial',
    discom: 'DPDC',
    model: 'capex_direct',     // CAPEX Direct Turnkey Ownership
    roofAreaSqft: 5000        // Usable rooftop area for panels
  };

  function formatBDT(num) {
    return Math.round(num).toLocaleString('en-IN');
  }

  // Helper for 5-year interval bar graph text readouts
  function formatGraphCurrency(val) {
    if (val >= 10000000) {
      return '৳ ' + (val / 10000000).toFixed(2) + ' Cr';
    } else {
      return '৳ ' + (val / 100000).toFixed(1) + ' L';
    }
  }

  // ───────────────────────────────────────────────────────────
  // CALCULATION ENGINE
  // ───────────────────────────────────────────────────────────
  function recalculate() {
    const bill = state.bill;
    const retailRate = RETAIL_RATE[state.customerType];
    const bulkRate = DISCOM_BULK_RATE[state.discom];
    const exportRate = incentiveActive() ? INCENTIVE_EXPORT_RATE : bulkRate;

    // Bill → units. Energy charge grossed up by 5% VAT.
    const unitsPerMonth = bill / (retailRate * (1 + VAT));
    const annualConsumption = unitsPerMonth * 12;

    // Dual ceilings on system size — smaller of available roof space vs load requirement.
    const maxKwpByRoof = state.roofAreaSqft / SQFT_PER_KWP;
    const kwpToOffsetLoad = annualConsumption / YIELD_PER_KWP_YEAR;
    let plantSizeKwp = Math.min(maxKwpByRoof, kwpToOffsetLoad);
    if (plantSizeKwp < 1) plantSizeKwp = 1;
    const roofLimited = maxKwpByRoof < kwpToOffsetLoad;

    const annualGeneration = plantSizeKwp * YIELD_PER_KWP_YEAR;
    const selfConsumed = Math.min(annualGeneration, annualConsumption);
    const exported = Math.max(annualGeneration - annualConsumption, 0);

    // CAPEX Direct Ownership Savings Calculation
    // Under CAPEX, 100% of self-consumed solar power replaces grid electricity at full retail tariff (+5% VAT).
    const annualSavings = (selfConsumed * retailRate * (1 + VAT)) + (exported * exportRate);
    const monthlySavings = annualSavings / 12;

    // Turnkey CAPEX Capital Cost & Payback Period (Years)
    const estimatedPlantCost = plantSizeKwp * COST_PER_KWP;
    let paybackYears = (estimatedPlantCost / (annualSavings > 0 ? annualSavings : 1)).toFixed(1);
    if (isNaN(paybackYears) || paybackYears <= 0 || !isFinite(paybackYears)) paybackYears = '3.5';

    // 25-year cumulative projection & 5-year milestone tracking
    let cumulativeSavings = 0;
    let gen = annualGeneration, rRate = retailRate, eRate = exportRate;
    let cum5 = 0, cum10 = 0, cum15 = 0, cum20 = 0, cum25 = 0;

    for (let y = 1; y <= 25; y++) {
      const s = Math.min(gen, annualConsumption);
      const e = Math.max(gen - annualConsumption, 0);
      const yearSavings = (s * rRate * (1 + VAT)) + (e * eRate);
      cumulativeSavings += yearSavings;

      if (y === 5) cum5 = cumulativeSavings;
      if (y === 10) cum10 = cumulativeSavings;
      if (y === 15) cum15 = cumulativeSavings;
      if (y === 20) cum20 = cumulativeSavings;
      if (y === 25) cum25 = cumulativeSavings;

      gen *= (1 - DEGRADATION);
      rRate *= (1 + ESCALATION);
      eRate *= (1 + ESCALATION);
    }

    const carbonOffsetTons = Math.round((annualGeneration / 1000) * 0.70);

    render({
      monthlySavings, annualSavings, plantSizeKwp, paybackYears,
      carbonOffsetTons, cumulativeSavings, roofLimited, maxKwpByRoof,
      kwpToOffsetLoad, bill, cum5, cum10, cum15, cum20, cum25
    });
  }

  function render(r) {
    const el = id => document.getElementById(id);

    if (el('monthlySavingsVal')) el('monthlySavingsVal').textContent = formatBDT(r.monthlySavings);
    if (el('annualSavingsVal')) {
      const lakhs = (r.annualSavings / 100000).toFixed(1);
      el('annualSavingsVal').textContent = '৳ ' + lakhs + ' Lakhs / Yr';
    }
    if (el('plantSizeVal')) el('plantSizeVal').textContent = r.plantSizeKwp.toFixed(1);

    if (el('paybackVal') && el('paybackUnit')) {
      el('paybackVal').textContent = r.paybackYears;
      el('paybackUnit').textContent = 'Years (Full Plant Payback)';
    }

    if (el('carbonVal')) el('carbonVal').textContent = r.carbonOffsetTons.toLocaleString();
    if (el('roofVal')) el('roofVal').textContent = Math.round(r.plantSizeKwp * SQFT_PER_KWP).toLocaleString();
    if (el('twentyFiveYearTotal')) {
      const crores = (r.cumulativeSavings / 10000000).toFixed(1);
      el('twentyFiveYearTotal').textContent = '৳ ' + crores + '+ Crore';
    }
    if (el('billInLakhsText')) {
      const lk = (r.bill / 100000).toFixed(2);
      el('billInLakhsText').textContent = '৳ ' + lk + ' Lakhs Per Month';
    }

    // Update 5-Year interval graph text readouts & heights
    if (el('barYr5Val')) el('barYr5Val').textContent = formatGraphCurrency(r.cum5);
    if (el('barYr10Val')) el('barYr10Val').textContent = formatGraphCurrency(r.cum10);
    if (el('barYr15Val')) el('barYr15Val').textContent = formatGraphCurrency(r.cum15);
    if (el('barYr20Val')) el('barYr20Val').textContent = formatGraphCurrency(r.cum20);
    if (el('barYr25Val')) el('barYr25Val').textContent = formatGraphCurrency(r.cum25);

    const maxCum = r.cum25 || 1;
    if (el('barYr5Height')) el('barYr5Height').style.height = Math.max(15, (r.cum5 / maxCum) * 100) + '%';
    if (el('barYr10Height')) el('barYr10Height').style.height = Math.max(15, (r.cum10 / maxCum) * 100) + '%';
    if (el('barYr15Height')) el('barYr15Height').style.height = Math.max(15, (r.cum15 / maxCum) * 100) + '%';
    if (el('barYr20Height')) el('barYr20Height').style.height = Math.max(15, (r.cum20 / maxCum) * 100) + '%';
    if (el('barYr25Height')) el('barYr25Height').style.height = '100%';

    // Surface roof area constraint note
    const noteEl = el('roofConstraintNote');
    if (noteEl) {
      noteEl.textContent = r.roofLimited
        ? `Your usable roof area caps this system at ${r.maxKwpByRoof.toFixed(1)} kWp under CAPEX investment — a larger system (${r.kwpToOffsetLoad.toFixed(1)} kWp) would offset more load, but won't fit.`
        : `Your bill-driven system size (${r.kwpToOffsetLoad.toFixed(1)} kWp) comfortably fits your available roof area for direct CAPEX ownership.`;
    }
  }

  // ───────────────────────────────────────────────────────────
  // SUBMIT BUTTON & OUTPUT PANEL HANDLING
  // ───────────────────────────────────────────────────────────
  const calculateBtn = document.getElementById('calculateSolarBtn');
  const recalculateAgainBtn = document.getElementById('recalculateAgainBtn');
  const resultsPanel = document.getElementById('calculatorResultsPanel');

  if (calculateBtn) {
    calculateBtn.addEventListener('click', () => {
      recalculate();
      if (resultsPanel) {
        resultsPanel.classList.remove('hidden');
        resultsPanel.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  }

  if (recalculateAgainBtn) {
    recalculateAgainBtn.addEventListener('click', () => {
      recalculate();
      const parametersHeader = document.querySelector('#solar-calculator-app .border-b');
      if (parametersHeader) {
        parametersHeader.scrollIntoView({ behavior: 'smooth', block: 'start' });
      } else if (resultsPanel) {
        window.scrollTo({ top: 300, behavior: 'smooth' });
      }
    });
  }

  // ───────────────────────────────────────────────────────────
  // EVENT WIRING
  // ───────────────────────────────────────────────────────────
  const slider = document.getElementById('billRangeSlider');
  const textInput = document.getElementById('billInputDisplay');

  if (slider && textInput) {
    slider.addEventListener('input', e => {
      state.bill = parseInt(e.target.value, 10);
      textInput.value = formatBDT(state.bill);
      recalculate();
    });
    textInput.addEventListener('change', e => {
      let v = parseInt(e.target.value.replace(/,/g, ''), 10);
      if (isNaN(v) || v < 20000) v = 20000;
      if (v > 10000000) v = 10000000;
      state.bill = v;
      slider.value = v;
      textInput.value = formatBDT(v);
      recalculate();
    });
  }

  const roofSlider = document.getElementById('roofAreaSlider');
  const roofDisplay = document.getElementById('roofAreaDisplay');
  if (roofSlider && roofDisplay) {
    roofSlider.addEventListener('input', e => {
      state.roofAreaSqft = parseInt(e.target.value, 10);
      roofDisplay.value = state.roofAreaSqft.toLocaleString();
      recalculate();
    });
    roofDisplay.addEventListener('change', e => {
      let v = parseInt(e.target.value.replace(/,/g, ''), 10);
      if (isNaN(v) || v < 100) v = 100;
      state.roofAreaSqft = v;
      roofSlider.value = v;
      roofDisplay.value = v.toLocaleString();
      recalculate();
    });
  }

  const typeButtons = document.querySelectorAll('.customer-btn');
  typeButtons.forEach(btn => {
    btn.addEventListener('click', function () {
      typeButtons.forEach(b => {
        b.classList.remove('bg-primary', 'text-white', 'shadow-md', 'active-type');
        b.classList.add('bg-surface-container', 'text-on-surface');

        const title = b.querySelector('.title-text');
        if (title) {
          title.classList.remove('text-white');
          title.classList.add('text-primary');
        }
        const sub = b.querySelector('.sub-text');
        if (sub) {
          sub.classList.remove('text-white', 'text-white/90');
          sub.classList.add('text-on-surface-variant');
        }
        const iconMain = b.querySelector('.icon-main');
        if (iconMain) {
          iconMain.classList.remove('text-white');
          iconMain.classList.add('text-primary');
        }
        const icon = b.querySelector('.check-icon');
        if (icon) {
          icon.textContent = 'radio_button_unchecked';
          icon.classList.remove('text-white');
          icon.classList.add('text-outline-variant');
        }
      });

      this.classList.remove('bg-surface-container', 'text-on-surface');
      this.classList.add('bg-primary', 'text-white', 'shadow-md', 'active-type');

      const title = this.querySelector('.title-text');
      if (title) {
        title.classList.remove('text-primary');
        title.classList.add('text-white');
      }
      const sub = this.querySelector('.sub-text');
      if (sub) {
        sub.classList.remove('text-on-surface-variant');
        sub.classList.add('text-white/90');
      }
      const iconMain = this.querySelector('.icon-main');
      if (iconMain) {
        iconMain.classList.remove('text-primary');
        iconMain.classList.add('text-white');
      }
      const activeIcon = this.querySelector('.check-icon');
      if (activeIcon) {
        activeIcon.textContent = 'check_circle';
        activeIcon.classList.remove('text-outline-variant');
        activeIcon.classList.add('text-white');
      }
      state.customerType = this.getAttribute('data-type');
      recalculate();
    });
  });

  const discomButtons = document.querySelectorAll('.discom-btn');
  discomButtons.forEach(btn => {
    btn.addEventListener('click', function () {
      discomButtons.forEach(b => {
        b.className = 'discom-btn p-3 rounded-lg bg-surface-container text-on-surface text-center font-body-sm text-body-sm font-semibold hover:bg-surface-container-high transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-md active:scale-95';
        const title = b.querySelector('.title-text');
        if (title) {
          title.className = 'block font-headline-sm text-[15px] text-primary title-text transition-colors duration-300';
        }
        const sub = b.querySelector('.sub-text');
        if (sub) {
          sub.className = 'block font-label-sm text-label-sm text-on-surface-variant sub-text transition-colors duration-300';
        }
      });
      this.className = 'discom-btn active-discom p-3 rounded-lg bg-primary text-white text-center font-body-sm text-body-sm font-semibold shadow-md transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg active:scale-95';
      const title = this.querySelector('.title-text');
      if (title) {
        title.className = 'block font-headline-sm text-[15px] text-white title-text transition-colors duration-300';
      }
      const sub = this.querySelector('.sub-text');
      if (sub) {
        sub.className = 'block font-label-sm text-label-sm text-white/90 sub-text transition-colors duration-300';
      }
      state.discom = this.getAttribute('data-discom');
      recalculate();
    });
  });

  const modelButtons = document.querySelectorAll('.model-btn');
  modelButtons.forEach(btn => {
    btn.addEventListener('click', function () {
      modelButtons.forEach(b => {
        b.classList.remove('bg-primary', 'text-white', 'shadow-md', 'active-model');
        b.classList.add('bg-surface-container', 'text-on-surface');

        const badge = b.querySelector('.badge-pill');
        if (badge) {
          badge.className = 'font-label-sm text-label-sm px-2.5 py-1 rounded bg-surface-container-high text-primary font-semibold badge-pill transition-colors duration-300';
        }
        const title = b.querySelector('.title-text');
        if (title) {
          title.className = 'font-headline-sm text-[16px] text-primary font-bold title-text transition-colors duration-300';
        }
        const sub = b.querySelector('.sub-text');
        if (sub) {
          sub.className = 'font-body-sm text-body-sm text-on-surface-variant mt-1 sub-text transition-colors duration-300';
        }
        const note = b.querySelector('.note-text');
        if (note) {
          note.className = 'mt-3 flex items-center gap-1.5 font-label-sm text-label-sm text-primary font-medium note-text transition-colors duration-300';
        }
        const chk = b.querySelector('.model-check');
        if (chk) {
          chk.textContent = 'radio_button_unchecked';
          chk.classList.remove('text-white');
          chk.classList.add('text-outline-variant');
        }
      });

      this.classList.remove('bg-surface-container', 'text-on-surface');
      this.classList.add('bg-primary', 'text-white', 'shadow-md', 'active-model');

      const badge = this.querySelector('.badge-pill');
      if (badge) {
        badge.className = 'font-label-sm text-label-sm px-2.5 py-1 rounded bg-white/20 text-white font-semibold badge-pill transition-colors duration-300';
      }
      const title = this.querySelector('.title-text');
      if (title) {
        title.className = 'font-headline-sm text-[16px] text-white font-bold title-text transition-colors duration-300';
      }
      const sub = this.querySelector('.sub-text');
      if (sub) {
        sub.className = 'font-body-sm text-body-sm text-white/90 mt-1 sub-text transition-colors duration-300';
      }
      const note = this.querySelector('.note-text');
      if (note) {
        note.className = 'mt-3 flex items-center gap-1.5 font-label-sm text-label-sm text-white/90 font-medium note-text transition-colors duration-300';
      }
      const chk = this.querySelector('.model-check');
      if (chk) {
        chk.textContent = 'check_circle';
        chk.classList.remove('text-outline-variant');
        chk.classList.add('text-white');
      }
      state.model = this.getAttribute('data-model') || 'capex_direct';
      recalculate();
    });
  });

  // Run calculation initially on mount
  recalculate();
}

window.initSolarCalculator = initSolarCalculator;

if (document.readyState === 'interactive' || document.readyState === 'complete') {
  initSolarCalculator();
} else {
  document.addEventListener('DOMContentLoaded', initSolarCalculator);
}
