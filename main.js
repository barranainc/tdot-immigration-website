/* Design Philosophy: Canadian Editorial Gravitas. */
document.addEventListener('DOMContentLoaded', () => {

  // ── Sticky header ────────────────────────────────────────────────────────────
  const siteHeader = document.querySelector('[data-site-header]');
  const syncHeaderState = () => {
    if (!siteHeader) return;
    siteHeader.classList.toggle('scrolled', window.scrollY > 80);
  };
  syncHeaderState();
  window.addEventListener('scroll', syncHeaderState, { passive: true });

  // ── Mobile overlay ───────────────────────────────────────────────────────────
  const menuToggle    = document.querySelector('[data-menu-toggle]');
  const mobileOverlay = document.querySelector('[data-mobile-overlay]');
  const mobileClose   = document.querySelector('[data-mobile-close]');

  function openMobileMenu() {
    if (!mobileOverlay) return;
    mobileOverlay.classList.add('open');
    mobileOverlay.setAttribute('aria-hidden', 'false');
    document.body.classList.add('menu-open');
    if (menuToggle) menuToggle.setAttribute('aria-expanded', 'true');
    // Focus close button for accessibility
    if (mobileClose) mobileClose.focus();
  }
  function closeMobileMenu() {
    if (!mobileOverlay) return;
    mobileOverlay.classList.remove('open');
    mobileOverlay.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('menu-open');
    if (menuToggle) menuToggle.setAttribute('aria-expanded', 'false');
  }

  if (menuToggle) menuToggle.addEventListener('click', openMobileMenu);
  if (mobileClose) mobileClose.addEventListener('click', closeMobileMenu);

  // Close on overlay background click, Escape key, or link click
  if (mobileOverlay) {
    mobileOverlay.querySelectorAll('a').forEach(a => a.addEventListener('click', closeMobileMenu));
    document.addEventListener('keydown', e => { if (e.key === 'Escape') closeMobileMenu(); });
  }

  // ── Mobile sub-menu accordions ───────────────────────────────────────────────
  document.querySelectorAll('[data-mobile-toggle]').forEach(btn => {
    btn.addEventListener('click', () => {
      const sub = document.getElementById(btn.dataset.mobileToggle);
      if (!sub) return;
      const open = sub.classList.toggle('open');
      btn.classList.toggle('expanded', open);
      btn.setAttribute('aria-expanded', String(open));
    });
  });

  // ── FAQ accordion ────────────────────────────────────────────────────────────
  document.querySelectorAll('.faq-item').forEach(item => {
    item.addEventListener('toggle', () => {
      if (item.open) {
        item.closest('.faq-list')
            ?.querySelectorAll('.faq-item')
            .forEach(sibling => { if (sibling !== item) sibling.open = false; });
      }
    });
  });

  // ── Contact form — Formspree async submit ────────────────────────────────────
  const form = document.querySelector('[data-contact-form]');
  if (form) {
    const feedback  = form.querySelector('[data-form-feedback]');
    const submitBtn = form.querySelector('[type="submit"]');
    const action    = form.getAttribute('action') || '';
    const isConfigured = action.includes('formspree.io/f/') && !action.includes('YOUR_FORMSPREE_ID');

    if (isConfigured) {
      form.addEventListener('submit', async (e) => {
        e.preventDefault();
        if (submitBtn) { submitBtn.disabled = true; submitBtn.textContent = 'Sending\u2026'; }
        try {
          const res = await fetch(action, {
            method: 'POST', body: new FormData(form),
            headers: { Accept: 'application/json' },
          });
          if (res.ok) {
            form.reset();
            if (feedback) { feedback.hidden = false; feedback.scrollIntoView({ behavior: 'smooth', block: 'nearest' }); }
          } else {
            if (submitBtn) submitBtn.textContent = 'Error \u2014 please try again';
          }
        } catch {
          if (submitBtn) submitBtn.textContent = 'Error \u2014 please try again';
        } finally {
          if (submitBtn) submitBtn.disabled = false;
        }
      });
    } else {
      form.addEventListener('submit', (e) => {
        e.preventDefault();
        if (feedback) { feedback.hidden = false; feedback.textContent = 'Form not yet connected. Set your Formspree ID to enable submissions.'; }
      });
    }
  }

  // ═══════════════════════════════════════════════════════════════
  //  SCROLL REVEAL ANIMATIONS
  // ═══════════════════════════════════════════════════════════════
  const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      const el = entry.target;
      const delay = el.dataset.delay ? parseInt(el.dataset.delay) : 0;
      setTimeout(() => el.classList.add('visible'), delay);
      revealObserver.unobserve(el);
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });

  document.querySelectorAll('[data-anim]').forEach((el, i) => {
    // Auto-stagger siblings inside [data-stagger] parents
    const staggerParent = el.closest('[data-stagger]');
    if (staggerParent && !el.dataset.delay) {
      const siblings = [...staggerParent.querySelectorAll(':scope > [data-anim]')];
      const idx = siblings.indexOf(el);
      if (idx >= 0) el.dataset.delay = idx * 110;
    }
    revealObserver.observe(el);
  });

  // ═══════════════════════════════════════════════════════════════
  //  STAT COUNTER ANIMATION
  // ═══════════════════════════════════════════════════════════════
  const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      const el     = entry.target;
      const target = parseFloat(el.dataset.counter);
      const suffix = el.dataset.suffix || '';
      const dur    = 2000;
      const start  = performance.now();

      const tick = (now) => {
        const t = Math.min((now - start) / dur, 1);
        // ease-out expo
        const eased = t === 1 ? 1 : 1 - Math.pow(2, -10 * t);
        const val   = target * eased;
        const disp  = target >= 1000
          ? Math.round(val).toLocaleString()
          : (Number.isInteger(target) ? Math.round(val) : val.toFixed(0));
        el.textContent = disp + suffix;
        if (t < 1) requestAnimationFrame(tick);
      };
      requestAnimationFrame(tick);
      counterObserver.unobserve(el);
    });
  }, { threshold: 0.5 });

  document.querySelectorAll('[data-counter]').forEach(el => counterObserver.observe(el));

  // ═══════════════════════════════════════════════════════════════
  //  TESTIMONIAL AUTO-ROTATOR
  // ═══════════════════════════════════════════════════════════════
  const TESTIMONIALS = [
    {
      text: '\u201cShafoli Kapur and her team guided us through our PR application from start to finish. They were always available and never left us confused. We got our approval in 8 months.\u201d',
      attr: '\u2014 Priya R., Express Entry Client',
    },
    {
      text: '\u201cI was declared inadmissible due to a past issue and felt hopeless. TDOT Immigration built a case I did not think was possible. I am now a permanent resident.\u201d',
      attr: '\u2014 Arjun M., Inadmissibility Client',
    },
    {
      text: '\u201cGauri was incredible \u2014 so responsive and thorough. Our family sponsorship went through without a single hiccup.\u201d',
      attr: '\u2014 Fatima A., Family Sponsorship Client',
    },
    {
      text: '\u201cThe TDOT team made our Express Entry process completely stress-free. Their attention to detail and clear communication set them apart from anyone else we spoke to.\u201d',
      attr: '\u2014 Rajiv S., Express Entry Client',
    },
  ];

  const stage = document.querySelector('[data-t-stage]');
  if (stage) {
    const tText = stage.querySelector('[data-t-text]');
    const tAttr = stage.querySelector('[data-t-attr]');
    const dots  = stage.querySelectorAll('.t-dot');
    let   cur   = 0;
    let   timer;

    function goTo(idx) {
      tText.classList.add('out');
      tAttr.classList.add('out');
      setTimeout(() => {
        cur = (idx + TESTIMONIALS.length) % TESTIMONIALS.length;
        tText.textContent = TESTIMONIALS[cur].text;
        tAttr.textContent = TESTIMONIALS[cur].attr;
        tText.classList.remove('out');
        tAttr.classList.remove('out');
        dots.forEach((d, i) => d.classList.toggle('active', i === cur));
      }, 350);
    }

    dots.forEach((dot, i) => {
      dot.addEventListener('click', () => { clearInterval(timer); goTo(i); startTimer(); });
    });

    function startTimer() { timer = setInterval(() => goTo(cur + 1), 5500); }
    startTimer();
  }

  // ═══════════════════════════════════════════════════════════════
  //  PROCESS TIMELINE ANIMATION
  // ═══════════════════════════════════════════════════════════════
  const processObs = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        processObs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.35 });
  document.querySelectorAll('.process-track').forEach(el => processObs.observe(el));

  // ═══════════════════════════════════════════════════════════════
  //  HERO PARALLAX
  // ═══════════════════════════════════════════════════════════════
  const heroMedia = document.querySelector('.hero-media img');
  if (heroMedia && window.matchMedia('(min-width: 900px)').matches) {
    window.addEventListener('scroll', () => {
      const y = window.scrollY;
      heroMedia.style.transform = `translateY(${y * 0.28}px) scale(1.05)`;
    }, { passive: true });
    heroMedia.style.transform = 'translateY(0px) scale(1.05)';
  }

  // ═══════════════════════════════════════════════════════════════
  //  MAGNETIC BUTTONS
  // ═══════════════════════════════════════════════════════════════
  document.querySelectorAll('.btn-magnetic').forEach(btn => {
    btn.addEventListener('mousemove', (e) => {
      const r = btn.getBoundingClientRect();
      const x = (e.clientX - r.left - r.width  / 2) * 0.22;
      const y = (e.clientY - r.top  - r.height / 2) * 0.22;
      btn.style.transform = `translate(${x}px, ${y}px) translateY(-3px)`;
    });
    btn.addEventListener('mouseleave', () => {
      btn.style.transform = '';
    });
  });

});
