/* =============================================
   PORTFOLIO SCRIPT.JS
   ============================================= */

// ── Navbar Scroll Effect ──────────────────────
const navbar = document.querySelector('.navbar');
if (navbar) {
  window.addEventListener('scroll', () => {
    if (window.scrollY > 40) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });
}

// ── Mobile Nav Toggle ─────────────────────────
const navToggle = document.querySelector('.nav-toggle');
const navLinks = document.querySelector('.nav-links');
if (navToggle && navLinks) {
  navToggle.addEventListener('click', () => {
    navLinks.classList.toggle('open');
    const spans = navToggle.querySelectorAll('span');
    navLinks.classList.contains('open')
      ? (spans[0].style.transform = 'rotate(45deg) translate(5px, 5px)',
         spans[1].style.opacity = '0',
         spans[2].style.transform = 'rotate(-45deg) translate(5px, -5px)')
      : (spans[0].style.transform = '',
         spans[1].style.opacity = '',
         spans[2].style.transform = '');
  });

  navLinks.querySelectorAll('a').forEach(a => {
    a.addEventListener('click', () => {
      navLinks.classList.remove('open');
      const spans = navToggle.querySelectorAll('span');
      spans[0].style.transform = '';
      spans[1].style.opacity = '';
      spans[2].style.transform = '';
    });
  });
}

// ── Active Nav Link ───────────────────────────
const currentPage = window.location.pathname.split('/').pop() || 'index.html';
document.querySelectorAll('.nav-links a').forEach(link => {
  const href = link.getAttribute('href');
  if (href === currentPage || (currentPage === '' && href === 'index.html')) {
    link.classList.add('active');
  }
});

// ── Scroll Reveal ─────────────────────────────
const revealElements = document.querySelectorAll('.reveal');
const revealObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
    }
  });
}, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

revealElements.forEach(el => revealObserver.observe(el));

// Form submission logic is now handled by the Laravel backend

// ── Toast Notification ────────────────────────
function showToast(msg) {
  const existing = document.querySelector('.toast');
  if (existing) existing.remove();
  const toast = document.createElement('div');
  toast.className = 'toast';
  toast.innerHTML = `<i class="fas fa-check-circle"></i> ${msg}`;
  toast.style.cssText = `
    position:fixed; bottom:2rem; right:2rem; z-index:9999;
    background:#3D2B1F; color:#F8F5F0;
    padding:1rem 1.5rem; border-radius:12px;
    font-family:'DM Sans',sans-serif; font-size:0.85rem;
    display:flex; align-items:center; gap:0.6rem;
    box-shadow:0 8px 32px rgba(0,0,0,0.2);
    transform:translateY(20px); opacity:0;
    transition:all 0.3s cubic-bezier(0.4,0,0.2,1);
  `;
  document.body.appendChild(toast);
  requestAnimationFrame(() => {
    toast.style.transform = 'translateY(0)';
    toast.style.opacity = '1';
  });
  setTimeout(() => {
    toast.style.transform = 'translateY(20px)';
    toast.style.opacity = '0';
    setTimeout(() => toast.remove(), 300);
  }, 3500);
}

// Login is now handled by Laravel

// ── Reply Modal ───────────────────────────────
const modalOverlay = document.getElementById('replyModal');

let currentMessageId = null;

function openModal(id, name, email, message) {
  if (!modalOverlay) return;
  currentMessageId = id;
  document.getElementById('modal-from-name').textContent = name;
  document.getElementById('modal-from-email').textContent = email;
  document.getElementById('modal-message').textContent = message;
  modalOverlay.classList.add('active');
  document.body.style.overflow = 'hidden';
}

function closeModal() {
  if (!modalOverlay) return;
  currentMessageId = null;
  modalOverlay.classList.remove('active');
  document.body.style.overflow = '';
}

if (modalOverlay) {
  modalOverlay.addEventListener('click', e => {
    if (e.target === modalOverlay) closeModal();
  });

  const replyForm = document.getElementById('replyForm');
  if (replyForm) {
    replyForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const email = document.getElementById('modal-from-email').textContent;
      const message = document.getElementById('reply-text').value;
      const subject = encodeURIComponent('Re: Your inquiry — Meghana Acharya');
      const body = encodeURIComponent(message);
      
      // 1. Mark as read in our database first (AJAX)
      fetch('/admin/reply', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        },
        body: JSON.stringify({ id: currentMessageId, email, message: '[Replied via Mail App]' })
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          // 2. Open the user's default mail app
          window.location.href = `mailto:${email}?subject=${subject}&body=${body}`;
          
          closeModal();
          showToast('Opening your email app...');
          replyForm.reset();
          
          // Reload dashboard to update status after a delay
          setTimeout(() => window.location.reload(), 2000);
        } else {
          showToast('Error updating status.');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        showToast('An error occurred.');
      });
    });
  }
}

document.addEventListener('keydown', e => {
  if (e.key === 'Escape') closeModal();
});

// ── Dashboard Sidebar Toggle (mobile) ─────────
const sidebarToggle = document.getElementById('sidebarToggle');
const sidebar = document.querySelector('.sidebar');
if (sidebarToggle && sidebar) {
  sidebarToggle.addEventListener('click', () => {
    sidebar.classList.toggle('open');
  });
}

// ── Animate Chart Bars ────────────────────────
const chartBars = document.querySelectorAll('.chart-bar-fill');
if (chartBars.length) {
  const chartObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const target = entry.target;
        const width = target.getAttribute('data-width') || '0';
        target.style.width = width + '%';
        chartObserver.unobserve(target);
      }
    });
  }, { threshold: 0.5 });

  chartBars.forEach(bar => {
    const w = bar.style.width;
    bar.setAttribute('data-width', parseInt(w));
    bar.style.width = '0';
    chartObserver.observe(bar);
  });
}

// ── Smooth Scroll for same-page anchors ───────
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    const href = this.getAttribute('href');
    if (href === '#') return;
    const target = document.querySelector(href);
    if (target) {
      e.preventDefault();
      const top = target.getBoundingClientRect().top + window.scrollY - 80;
      window.scrollTo({ top, behavior: 'smooth' });
    }
  });
});

// ── Number Count Animation ────────────────────
function animateCount(el, target, duration = 1500) {
  let start = 0;
  const step = Math.ceil(target / (duration / 16));
  const timer = setInterval(() => {
    start += step;
    if (start >= target) {
      el.textContent = target;
      clearInterval(timer);
    } else {
      el.textContent = start;
    }
  }, 16);
}

const countEls = document.querySelectorAll('[data-count]');
if (countEls.length) {
  const countObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const el = entry.target;
        const target = parseInt(el.getAttribute('data-count'));
        animateCount(el, target);
        countObserver.unobserve(el);
      }
    });
  }, { threshold: 0.5 });
  countEls.forEach(el => countObserver.observe(el));
}
