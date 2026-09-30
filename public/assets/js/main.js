/**
 * EarthGreenEnergy Bangladesh - Main JavaScript Interactions & SPA Router
 */

// Force scroll to top on page refresh/reload
if ('scrollRestoration' in history) {
  history.scrollRestoration = 'manual';
}
window.addEventListener('beforeunload', () => {
  window.scrollTo(0, 0);
});

document.addEventListener('DOMContentLoaded', () => {
  window.scrollTo(0, 0);

  // ----------------------------------------------------
  // 1. MOBILE MENU DRAWER TOGGLE
  // ----------------------------------------------------
  const mobileMenuBtn = document.getElementById('mobile-menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');

  if (mobileMenuBtn && mobileMenu) {
    mobileMenuBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      mobileMenu.classList.toggle('hidden');
    });

    document.addEventListener('click', (e) => {
      if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
        mobileMenu.classList.add('hidden');
      }
    });
  }

  // ----------------------------------------------------
  // 2. RE-INITIALIZABLE ANIMATION FUNCTIONS
  // ----------------------------------------------------
  
  // Hero Typewriter Effect
  function initTypewriter() {
    const typewriterElems = document.querySelectorAll('#hero-typewriter-text, .hero-typewriter-text, [data-typewriter-text]');
    typewriterElems.forEach((typewriterElem) => {
      const fullText = typewriterElem.getAttribute('data-typewriter-text') || typewriterElem.textContent.trim();
      typewriterElem.textContent = '';
      typewriterElem.classList.remove('typing-done');
      typewriterElem.classList.add('typing-cursor');

      let idx = 0;
      const typingSpeed = 30; // 30ms per character

      function typeChar() {
        if (idx < fullText.length) {
          typewriterElem.textContent += fullText.charAt(idx);
          idx++;
          setTimeout(typeChar, typingSpeed);
        } else {
          typewriterElem.classList.remove('typing-cursor');
          typewriterElem.classList.add('typing-done');
        }
      }

      setTimeout(typeChar, 300);
    });
  }

  // 5-Step Process Card Observer
  function initProcessCards() {
    const processCards = document.querySelectorAll('.process-card');
    if (processCards.length > 0) {
      const processObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const cards = entry.target.querySelectorAll('.process-card');
            cards.forEach((card, i) => {
              setTimeout(() => {
                card.classList.add('pop-down');
              }, i * 150);
            });
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.15 });

      const processSection = document.getElementById('engineering-process-section');
      if (processSection) {
        processObserver.observe(processSection);
      }
    }
  }

  // Stats Counter Count-Up Animation
  function initStatsCounters() {
    const counterElems = document.querySelectorAll('.counter-val');
    if (counterElems.length > 0) {
      const counterObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const el = entry.target;
            const targetNum = parseFloat(el.getAttribute('data-target'));
            const suffix = el.getAttribute('data-suffix') || '';
            const decimals = parseInt(el.getAttribute('data-decimals') || '0', 10);
            const duration = 2000;
            const startTime = performance.now();

            function updateCounter(currentTime) {
              const elapsed = currentTime - startTime;
              const progress = Math.min(elapsed / duration, 1);
              const easeProgress = 1 - Math.pow(1 - progress, 3);
              const currentVal = (targetNum * easeProgress).toFixed(decimals);

              el.textContent = currentVal + suffix;

              if (progress < 1) {
                requestAnimationFrame(updateCounter);
              } else {
                el.textContent = targetNum.toFixed(decimals) + suffix;
              }
            }

            requestAnimationFrame(updateCounter);
            observer.unobserve(el);
          }
        });
      }, { threshold: 0.3 });

      counterElems.forEach(elem => counterObserver.observe(elem));
    }
  }

  // FAQ Accordion Listeners
  function initFaqAccordions() {
    const faqToggles = document.querySelectorAll('.faq-toggle');
    faqToggles.forEach(button => {
      button.addEventListener('click', () => {
        const content = button.nextElementSibling;
        const icon = button.querySelector('.faq-icon');
        const isOpen = content.classList.contains('is-open');

        document.querySelectorAll('.faq-content').forEach(el => {
          el.classList.remove('is-open');
        });
        document.querySelectorAll('.faq-icon').forEach(ic => {
          ic.style.transform = 'rotate(0deg)';
        });
        document.querySelectorAll('.faq-toggle').forEach(toggle => {
          toggle.setAttribute('aria-expanded', 'false');
        });

        if (!isOpen) {
          content.classList.add('is-open');
          if (icon) icon.style.transform = 'rotate(180deg)';
          button.setAttribute('aria-expanded', 'true');
        }
      });
    });
  }

  // Hero Slider (4 Slides, 5s Interval, 4 Unique Transitions)
  let heroTimer = null;

  function initHeroSlider() {
    const slides = document.querySelectorAll('.hero-slide');
    const indicatorBtns = document.querySelectorAll('.hero-indicator-btn');
    const heroSection = document.getElementById('hero-slider-section') || document.querySelector('.home-section-hero');

    if (!slides.length) return;

    if (heroTimer) {
      clearInterval(heroTimer);
      heroTimer = null;
    }

    let currentSlide = 0;
    const interval = 5000; // 5 seconds

    function goToSlide(n) {
      slides.forEach(slide => slide.classList.remove('active'));
      indicatorBtns.forEach(btn => btn.classList.remove('active'));

      currentSlide = (n + slides.length) % slides.length;

      slides[currentSlide].classList.add('active');
      if (indicatorBtns[currentSlide]) {
        indicatorBtns[currentSlide].classList.add('active');
      }
    }

    function startTimer() {
      stopTimer();
      heroTimer = setInterval(() => {
        goToSlide(currentSlide + 1);
      }, interval);
    }

    function stopTimer() {
      if (heroTimer) {
        clearInterval(heroTimer);
        heroTimer = null;
      }
    }

    indicatorBtns.forEach((btn, idx) => {
      btn.onclick = (e) => {
        e.stopPropagation();
        goToSlide(idx);
        startTimer();
      };
    });

    goToSlide(0);
    startTimer();
  }

  function reinitAllBehaviors() {
    initHeroSlider();
    initTypewriter();
    initProcessCards();
    initStatsCounters();
    initFaqAccordions();
    if (typeof window.initSolarCalculator === 'function') {
      window.initSolarCalculator();
    }
  }

  // Initial run on initial page load
  reinitAllBehaviors();

  // ----------------------------------------------------
  // 3. HEADER NAV ACTIVE STATE UPDATER
  // ----------------------------------------------------
  function updateActiveNavLinks(pageKey) {
    if (!pageKey) return;
    const desktopLinks = document.querySelectorAll('header nav a.nav-link');
    const mobileLinks = document.querySelectorAll('#mobile-menu a.mobile-nav-link');

    desktopLinks.forEach(link => {
      const linkKey = link.getAttribute('data-page');
      if (linkKey === pageKey) {
        link.setAttribute('aria-current', 'page');
        link.className = 'nav-link px-3 py-2 rounded-lg text-primary font-bold bg-primary-container/10 transition-colors';
      } else {
        link.removeAttribute('aria-current');
        link.className = 'nav-link px-3 py-2 rounded-lg text-on-surface-variant hover:text-on-surface text-label-pill font-label-pill transition-colors';
      }
    });

    mobileLinks.forEach(link => {
      const linkKey = link.getAttribute('data-page');
      if (linkKey === pageKey) {
        link.setAttribute('aria-current', 'page');
        link.className = 'mobile-nav-link block px-4 py-2.5 rounded-lg text-body-md font-bold text-primary bg-primary-container/10';
      } else {
        link.removeAttribute('aria-current');
        link.className = 'mobile-nav-link block px-4 py-2.5 rounded-lg text-body-md font-medium text-on-surface-variant hover:bg-surface-container hover:text-primary';
      }
    });
  }

  // Helper to re-execute scripts inside dynamically loaded content
  function executeScriptsIn(container) {
    const scripts = container.querySelectorAll('script');
    scripts.forEach(oldScript => {
      const newScript = document.createElement('script');
      Array.from(oldScript.attributes).forEach(attr => newScript.setAttribute(attr.name, attr.value));
      if (oldScript.src) {
        newScript.src = oldScript.src;
      } else {
        newScript.textContent = oldScript.textContent;
      }
      oldScript.parentNode.replaceChild(newScript, oldScript);
    });
  }

  // ----------------------------------------------------
  // 4. AJAX SPA ROUTER & DYNAMIC CONTENT SWAPPER
  // ----------------------------------------------------
  let isNavigating = false;

  async function loadPage(url, pushToHistory = true) {
    if (isNavigating) return;
    isNavigating = true;

    const currentMain = document.querySelector('main');
    if (currentMain) {
      currentMain.style.opacity = '0.5';
      currentMain.style.transition = 'opacity 0.15s ease-out';
    }

    try {
      const response = await fetch(url, {
        headers: {
          'X-Requested-With': 'XMLHttpRequest'
        }
      });

      if (!response.ok) {
        window.location.href = url;
        return;
      }

      const html = await response.text();
      const parser = new DOMParser();
      const doc = parser.parseFromString(html, 'text/html');

      // Update Document Title
      const titleElem = doc.querySelector('title');
      if (titleElem) {
        document.title = titleElem.textContent;
      }

      // Extract new <main>
      const newMain = doc.querySelector('main');
      if (newMain && currentMain) {
        // Swap attributes & inner HTML
        Array.from(newMain.attributes).forEach(attr => {
          currentMain.setAttribute(attr.name, attr.value);
        });
        currentMain.innerHTML = newMain.innerHTML;
        currentMain.style.opacity = '1';

        // Update Nav Active State
        const pageKey = newMain.getAttribute('data-page-key');
        if (pageKey) {
          updateActiveNavLinks(pageKey);
        }

        // Push History State
        if (pushToHistory) {
          history.pushState({ url: url, pageKey: pageKey }, '', url);
        }

        // Scroll to top
        window.scrollTo(0, 0);

        // Hide mobile menu if open
        if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
          mobileMenu.classList.add('hidden');
        }

        // Re-execute scripts and re-init animations
        executeScriptsIn(currentMain);
        reinitAllBehaviors();
      } else {
        window.location.href = url;
      }
    } catch (err) {
      console.error('SPA Navigation Error:', err);
      window.location.href = url;
    } finally {
      if (currentMain) {
        currentMain.style.opacity = '1';
      }
      isNavigating = false;
    }
  }

  // Intercept all internal link clicks
  document.addEventListener('click', (e) => {
    const link = e.target.closest('a');
    if (!link) return;

    const href = link.getAttribute('href');
    if (!href) return;

    // Ignore anchor links, external links, mailto/tel, target="_blank", or downloads
    if (
      href.startsWith('#') ||
      href.startsWith('mailto:') ||
      href.startsWith('tel:') ||
      href.startsWith('javascript:') ||
      link.getAttribute('target') === '_blank' ||
      link.hasAttribute('download')
    ) {
      return;
    }

    // Check same origin
    const url = new URL(href, window.location.href);
    if (url.origin !== window.location.origin) {
      return;
    }

    e.preventDefault();
    if (url.href !== window.location.href) {
      loadPage(url.href, true);
    }
  });

  // Handle browser back/forward buttons
  window.addEventListener('popstate', (e) => {
    loadPage(window.location.href, false);
  });
});
