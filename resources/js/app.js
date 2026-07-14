// ── CURTAIN — skip if navigating between pages ──
(function () {
    const curtain = document.getElementById('curtain');
    if (!curtain) return;
    const ref = document.referrer;
    const sameOrigin = ref && ref.startsWith(window.location.origin);
    if (sameOrigin) {
        curtain.style.display = 'none';
    } else {
        setTimeout(() => curtain.classList.add('hidden'), 80);
        setTimeout(() => { curtain.style.display = 'none'; }, 650);
    }
})();

// ── PROJECT DETAIL — copy palette color to clipboard ──
function copyToClipboard(text) {
    if (navigator.clipboard) return navigator.clipboard.writeText(text);
    const helper = document.createElement('textarea');
    helper.value = text;
    helper.style.position = 'fixed';
    helper.style.opacity = '0';
    document.body.appendChild(helper);
    helper.select();
    document.execCommand('copy');
    helper.remove();
    return Promise.resolve();
}

document.querySelectorAll('.proj-swatch').forEach(swatch => {
    const hexEl = swatch.querySelector('.proj-swatch-hex');
    const hex = swatch.dataset.color;
    const label = hexEl?.textContent;
    swatch.addEventListener('click', () => {
        copyToClipboard(hex).then(() => {
            swatch.classList.add('copied');
            if (hexEl) hexEl.textContent = 'Copié !';
            setTimeout(() => {
                swatch.classList.remove('copied');
                if (hexEl) hexEl.textContent = label;
            }, 1200);
        });
    });
});

// ── CUSTOM CURSOR ──
// Safari mishandles the trailing circle's animated transform (stutter/teleporting),
// so it's simply dropped there — the small dot cursor still works fine.
const isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
if (isSafari) document.documentElement.classList.add('is-safari');

const cur = document.getElementById('cursor');
const trail = document.getElementById('cursor-trail');
if (cur && trail) {
    document.addEventListener('mousedown', () => cur.classList.add('click'));
    document.addEventListener('mouseup', () => cur.classList.remove('click'));
}

const HOVER_SELECTOR = 'a, button, input, textarea, .proj-img, .tech-row, .exp-card, .proj, .review-card, .skill-card, .who-value, .tl-item';

function bindCursorHover(el) {
    if (!cur) return;
    el.addEventListener('mouseenter', () => { cur.classList.add('hover'); trail.classList.add('hover'); });
    el.addEventListener('mouseleave', () => { cur.classList.remove('hover'); trail.classList.remove('hover'); });
}

// ── MAGNETIC BUTTONS ──
// ── 3D TILT ──
function bindTilt(card) {
    card.addEventListener('mousemove', e => {
        const r = card.getBoundingClientRect();
        const x = (e.clientX - r.left) / r.width - .5;
        const y = (e.clientY - r.top) / r.height - .5;
        card.style.transform = `perspective(1000px) rotateY(${x * 4}deg) rotateX(${-y * 4}deg) translateY(-2px)`;
    });
    card.addEventListener('mouseleave', () => { card.style.transform = 'perspective(1000px) rotateY(0) rotateX(0) translateY(0)'; });
}

// ── SCROLL REVEAL ──
const revObs = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); revObs.unobserve(e.target); } });
}, { threshold: 0.1 });

const zoomObs = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); zoomObs.unobserve(e.target); } });
}, { threshold: 0.08 });

function initInteractions(root = document) {
    if (!root) return;
    root.querySelectorAll(HOVER_SELECTOR).forEach(bindCursorHover);
    root.querySelectorAll('.tilt-card').forEach(bindTilt);

    root.querySelectorAll('.reveal').forEach(el => {
        if (el.closest('#hero') || el.closest('.reveal-line')) { el.classList.add('visible'); return; }
        revObs.observe(el);
    });
    root.querySelectorAll('.reveal-line').forEach(el => el.classList.add('visible'));
    root.querySelectorAll('.sec-inner-zoom').forEach(el => zoomObs.observe(el));
}

initInteractions(document);

// Livewire swaps (filter change, slider page, form submit) insert new DOM
// nodes after the initial page load — reveal them immediately (no need for
// a scroll-triggered fade, the user just triggered the change) and wire up
// their interactions.
const liveMutations = new MutationObserver(mutations => {
    mutations.forEach(m => {
        m.addedNodes.forEach(node => {
            if (node.nodeType !== 1) return;
            if (node.matches?.('.reveal, .sec-inner-zoom')) node.classList.add('visible');
            node.querySelectorAll?.('.reveal, .sec-inner-zoom').forEach(el => el.classList.add('visible'));
            initInteractions(node.matches?.(HOVER_SELECTOR) || node.matches?.('.tilt-card') ? node.parentElement : node);
        });
    });
});
liveMutations.observe(document.body, { childList: true, subtree: true });

// ── NAV ──
const navLinksWrap = document.getElementById('navLinks');
const navPillBg = document.getElementById('navPillBg');
if (navLinksWrap) {
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('mouseenter', () => {
            const r = link.getBoundingClientRect();
            const wrapR = navLinksWrap.getBoundingClientRect();
            navPillBg.style.left = (r.left - wrapR.left) + 'px';
            navPillBg.style.width = r.width + 'px';
        });
    });
}

// ── BURGER / DRAWER ──
const burger = document.getElementById('navBurger');
const drawer = document.getElementById('nav-drawer');
const overlay = document.getElementById('nav-overlay');
window.closeDrawer = function closeDrawer() {
    burger?.classList.remove('open');
    burger?.setAttribute('aria-expanded', 'false');
    drawer?.classList.remove('open');
    overlay?.classList.remove('show');
    document.body.style.overflow = '';
};
if (burger) {
    burger.addEventListener('click', () => {
        const isOpen = drawer.classList.contains('open');
        if (isOpen) {
            closeDrawer();
        } else {
            burger.classList.add('open'); drawer.classList.add('open'); overlay.classList.add('show');
            burger.setAttribute('aria-expanded', 'true');
            document.body.style.overflow = 'hidden';
        }
    });
}

// ── SCROLL DOTS (home only) ──
const dots = document.querySelectorAll('.sd');
const sections = Array.from(dots).map(d => document.getElementById(d.dataset.target));
dots.forEach(d => d.addEventListener('click', () => document.getElementById(d.dataset.target)?.scrollIntoView({ behavior: 'smooth' })));
function updateScrollDots() {
    if (!dots.length) return;
    let activeIdx = 0;
    sections.forEach((sec, i) => { if (sec && sec.getBoundingClientRect().top <= window.innerHeight * .5) activeIdx = i; });
    dots.forEach((d, i) => d.classList.toggle('active', i === activeIdx));
}

// ── COUNT-UP (home hero stats) ──
const countEls = document.querySelectorAll('[data-count]');
if (countEls.length) {
    let counted = false;
    const countObs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting && !counted) {
                counted = true;
                countEls.forEach(el => {
                    const target = parseInt(el.dataset.count, 10);
                    let n = 0;
                    const step = Math.max(1, Math.round(target / 30));
                    const iv = setInterval(() => { n += step; if (n >= target) { n = target; clearInterval(iv); } el.textContent = n; }, 35);
                });
            }
        });
    }, { threshold: 0.5 });
    countObs.observe(countEls[0].closest('.hero-stats'));
}

// ── PARALLAX (home hero only) ──
const heroGrid = document.getElementById('hero-grid');
const heroOrbs = document.getElementById('hero-orbs');
const heroCode = document.getElementById('hero-code');
function updateParallax() {
    const y = window.scrollY;
    if (y < window.innerHeight * 1.2) {
        if (heroGrid) heroGrid.style.transform = `translateY(${y * .15}px)`;
        if (heroOrbs) heroOrbs.style.transform = `translateY(${y * .3}px)`;
        if (heroCode) heroCode.style.transform = `translateY(${y * .45}px)`;
    }
}

// ── SCROLL EVENTS ──
const navEl = document.getElementById('mainnav');
window.addEventListener('scroll', () => {
    navEl?.classList.toggle('scrolled', window.scrollY > 40);
    updateScrollDots(); updateParallax();
});
updateScrollDots(); updateParallax();

// ── BACK TO TOP ──
const backToTop = document.getElementById('back-to-top');
if (backToTop) {
    window.addEventListener('scroll', () => backToTop.classList.toggle('show', window.scrollY > window.innerHeight * .6));
    backToTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
}

// ── CURSOR + ROBOTS EYE-FOLLOW — batched into a single rAF loop ──
// Both track the raw mouse position continuously. Updating them straight from
// the 'mousemove' event (as before) runs this DOM work — including a
// layout-forcing getBoundingClientRect() per robot — at however often the
// browser fires the event, which on Safari can be far more often than the
// screen actually redraws, causing visible lag. Capping the work to one
// rAF tick per frame fixes that everywhere, Safari included.
const bots = Array.from(document.querySelectorAll('.hero-bot, .sec-bot')).map(bot => ({
    el: bot,
    eye: bot.querySelector('.robot-eye'),
})).filter(bot => bot.eye);

let mouseX = 0;
let mouseY = 0;
document.addEventListener('mousemove', e => { mouseX = e.clientX; mouseY = e.clientY; });

function trackPointer() {
    if (cur) {
        const pos = `translate(${mouseX}px, ${mouseY}px) translate(-50%, -50%)`;
        cur.style.transform = pos;
        if (trail) trail.style.transform = pos;
    }

    bots.forEach(({ el, eye }) => {
        const r = el.getBoundingClientRect();
        const dx = (mouseX - (r.left + r.width / 2)) / window.innerWidth;
        const dy = (mouseY - (r.top + r.height / 2)) / window.innerHeight;
        eye.style.transform = `translate(${dx * 3}px, ${dy * 2}px)`;
    });

    requestAnimationFrame(trackPointer);
}
requestAnimationFrame(trackPointer);
