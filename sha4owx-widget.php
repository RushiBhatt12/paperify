<?php
// Only inject into HTML responses, not AJAX/asset requests
$accept = isset($_SERVER['HTTP_ACCEPT']) ? $_SERVER['HTTP_ACCEPT'] : '';
$isHtml = strpos($accept, 'text/html') !== false || strpos($accept, '*/*') !== false;
$isAsset = preg_match('/\.(css|js|png|jpg|jpeg|gif|svg|ico|woff|woff2|ttf|eot|json|xml|txt)$/i', $_SERVER['REQUEST_URI'] ?? '');
if (!$isHtml || $isAsset) return;
?>
<script>
(function () {
  /* ── Only show when visitor came from sha4owx.in portfolio ── */
  var SK = 'sha4owx_ref';
  try {
    if (new URLSearchParams(location.search).get('ref') === 'sha4owx' ||
        document.referrer.includes('sha4owx.in')) {
      sessionStorage.setItem(SK, '1');
    }
    if (!sessionStorage.getItem(SK)) return;
  } catch (e) { return; }

  /* ── Rewrite all same-origin links to carry ?ref=sha4owx forward ── */
  function rewriteLinks() {
    var links = document.querySelectorAll('a[href]');
    for (var i = 0; i < links.length; i++) {
      try {
        var url = new URL(links[i].href, location.href);
        if (url.hostname === location.hostname && url.searchParams.get('ref') !== 'sha4owx') {
          url.searchParams.set('ref', 'sha4owx');
          links[i].href = url.toString();
        }
      } catch (e) {}
    }
  }
  rewriteLinks();
  if (typeof MutationObserver !== 'undefined') {
    new MutationObserver(rewriteLinks).observe(document.documentElement, { childList: true, subtree: true });
  }

  var wa = {
    phone:   "916358006660",
    message: "Hi! I'm interested in your software/web development services. Can we connect?",
    eyebrow: "Have a project in mind?",
    label:   "Chat on WhatsApp"
  };
  var fm = {
    url:    "https://sha4owx.in/contact",
    eyebrow: "Let\u2019s build something great.",
    label:   "Start a Project"
  };

  /* ── Styles ── */
  var css = [
    "@import url('https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600&display=swap');",
    "#cta-root{position:fixed;left:28px;bottom:36px;z-index:999999;display:flex;flex-direction:column;gap:12px;align-items:flex-start;font-family:'Sora',sans-serif}",
    ".cta-card{display:flex;align-items:stretch;border-radius:16px;overflow:hidden;text-decoration:none;cursor:pointer;box-shadow:0 1px 3px rgba(0,0,0,.12),0 6px 24px rgba(0,0,0,.14),0 0 0 1px rgba(255,255,255,.06) inset;opacity:0;transform:translateX(-72px);transition:opacity .38s ease,transform .42s cubic-bezier(.34,1.56,.64,1),box-shadow .22s ease}",
    ".cta-card.cta-in{opacity:1;transform:translateX(0)}",
    ".cta-card:hover{transform:translateY(-4px) scale(1.03);box-shadow:0 2px 6px rgba(0,0,0,.12),0 12px 36px rgba(0,0,0,.18),0 0 0 1px rgba(255,255,255,.08) inset}",
    ".cta-card:active{transform:scale(.975);transition-duration:.1s}",
    ".cta-icon-col{width:56px;display:flex;align-items:center;justify-content:center;flex-shrink:0;position:relative}",
    ".cta-sep{width:1px;background:rgba(255,255,255,.08);align-self:stretch}",
    ".cta-text-col{display:flex;flex-direction:column;justify-content:center;gap:3px;padding:12px 20px 12px 14px}",
    ".cta-eyebrow{font-size:10px;font-weight:500;letter-spacing:.09em;text-transform:uppercase;line-height:1}",
    ".cta-label{font-size:13.5px;font-weight:600;letter-spacing:-.015em;line-height:1.25}",
    ".cta-wa{background:linear-gradient(145deg,#0d1f10 0%,#0a1a0d 100%)}",
    ".cta-wa .cta-icon-col{background:#128C7E}",
    ".cta-wa .cta-eyebrow{color:#86c99a}",
    ".cta-wa .cta-label{color:#e2f2e8}",
    ".cta-wa:hover .cta-icon-col{background:#0e7a6d}",
    ".cta-gf{background:linear-gradient(145deg,#0e1b2e 0%,#0b1622 100%)}",
    ".cta-gf .cta-icon-col{background:#1a6fe8}",
    ".cta-gf .cta-eyebrow{color:#80aef0}",
    ".cta-gf .cta-label{color:#d8e8fd}",
    ".cta-gf:hover .cta-icon-col{background:#155ecc}",
    ".cta-pulse-ring{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;pointer-events:none}",
    ".cta-pulse-ring::after{content:'';width:26px;height:26px;border-radius:50%;border:1.5px solid rgba(56,216,150,.55);animation:ctaPulse 2.6s ease-out infinite}",
    "@keyframes ctaPulse{0%{transform:scale(.8);opacity:1}65%{transform:scale(2);opacity:0}100%{transform:scale(.8);opacity:0}}",
    "@media(max-width:520px){.cta-text-col,.cta-sep{display:none}#cta-root{gap:10px}.cta-card{border-radius:14px}.cta-icon-col{width:52px;height:52px;border-radius:14px}}"
  ].join('');

  var styleEl = document.createElement('style');
  styleEl.textContent = css;
  document.head.appendChild(styleEl);

  /* ── SVGs ── */
  var svgWa = '<svg width="22" height="22" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg"><path d="M20.52 3.48A11.93 11.93 0 0 0 12 0C5.37 0 0 5.37 0 12c0 2.11.55 4.16 1.6 5.97L0 24l6.2-1.63A11.94 11.94 0 0 0 12 24c6.63 0 12-5.37 12-12 0-3.21-1.25-6.22-3.48-8.52zM12 22c-1.85 0-3.66-.5-5.24-1.44l-.38-.22-3.68.97.98-3.6-.25-.37A9.93 9.93 0 0 1 2 12C2 6.48 6.48 2 12 2s10 4.48 10 10-4.48 10-10 10zm5.47-7.4c-.3-.15-1.77-.87-2.04-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.95 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.89-.79-1.49-1.77-1.67-2.07-.17-.3-.02-.46.13-.6.14-.14.3-.35.45-.52.15-.18.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48s1.07 2.88 1.21 3.08c.15.2 2.1 3.21 5.1 4.5.71.31 1.27.49 1.7.63.71.23 1.36.19 1.87.12.57-.09 1.77-.72 2.02-1.42.25-.7.25-1.3.17-1.42-.07-.12-.27-.2-.57-.35z"/></svg>';

  var svgGf = '<svg width="20" height="22" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 1H3a2 2 0 0 0-2 2v18a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8L12 1z" stroke="white" stroke-width="1.7" stroke-linejoin="round"/><path d="M12 1v7h7" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/><line x1="5" y1="13" x2="15" y2="13" stroke="white" stroke-width="1.7" stroke-linecap="round"/><line x1="5" y1="17" x2="15" y2="17" stroke="white" stroke-width="1.7" stroke-linecap="round"/><line x1="5" y1="21" x2="10" y2="21" stroke="white" stroke-width="1.7" stroke-linecap="round"/></svg>';

  /* ── Build cards ── */
  var root = document.createElement('div');
  root.id = 'cta-root';

  var gfCard = document.createElement('a');
  gfCard.className = 'cta-card cta-gf';
  gfCard.href = fm.url;
  gfCard.target = '_blank';
  gfCard.rel = 'noopener noreferrer';
  gfCard.setAttribute('aria-label', fm.label);
  gfCard.innerHTML = '<div class="cta-icon-col">' + svgGf + '</div><div class="cta-sep"></div><div class="cta-text-col"><span class="cta-eyebrow">' + fm.eyebrow + '</span><span class="cta-label">' + fm.label + '</span></div>';

  var waCard = document.createElement('a');
  waCard.className = 'cta-card cta-wa';
  waCard.href = 'https://wa.me/' + wa.phone + '?text=' + encodeURIComponent(wa.message);
  waCard.target = '_blank';
  waCard.rel = 'noopener noreferrer';
  waCard.setAttribute('aria-label', wa.label);
  waCard.innerHTML = '<div class="cta-icon-col"><div class="cta-pulse-ring"></div>' + svgWa + '</div><div class="cta-sep"></div><div class="cta-text-col"><span class="cta-eyebrow">' + wa.eyebrow + '</span><span class="cta-label">' + wa.label + '</span></div>';

  root.appendChild(gfCard);
  root.appendChild(waCard);
  document.body.appendChild(root);

  /* ── Staggered entrance ── */
  setTimeout(function () { gfCard.classList.add('cta-in'); }, 700);
  setTimeout(function () { waCard.classList.add('cta-in'); }, 950);
})();
</script>
