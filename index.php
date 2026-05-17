<?php session_start();
$serverUser = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] ? ['name' => $_SESSION['username'], 'email' => ''] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>XuluBrands Co — Home & Office Upgrade</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet"/>
<style>
  /* ── WELCOME SCREEN ───────────────────────── */

.welcome-overlay {
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.96);
  z-index: 5000;

  display: flex;
  align-items: center;
  justify-content: center;

  padding: 2rem;
}

.welcome-box {
  max-width: 500px;
  width: 100%;

  background: #161616;
  border: 1px solid rgba(201,149,42,0.3);

  padding: 3rem 2rem;
  text-align: center;
}

.welcome-box h1 {
  font-size: 3rem;
  color: white;
  margin-bottom: 1rem;
}

.welcome-box p {
  color: #aaa;
  line-height: 1.7;
  margin-bottom: 2rem;
}

.welcome-buttons {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}
  :root {
    --charcoal: #1a1a1a;
    --dark: #111111;
    --gold: #c9952a;
    --gold-light: #e8b84b;
    --wood: #8b5e3c;
    --cream: #f5f0e8;
    --muted: #888;
    --red: #cc2200;
    --white: #ffffff;
  }

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  html { scroll-behavior: smooth; }

  body {
    background: var(--dark);
    color: var(--cream);
    font-family: 'DM Sans', sans-serif;
    font-weight: 300;
    overflow-x: hidden;
  }

  h1, h2, h3, h4 { font-family: 'Bebas Neue', sans-serif; letter-spacing: 0.04em; }

  /* ── NAV ── */
  nav {
    position: fixed; top: 0; left: 0; right: 0; z-index: 100;
    display: flex; align-items: center; justify-content: space-between;
    padding: 1rem 2rem;
    background: rgba(17,17,17,0.92);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(201,149,42,0.2);
  }

  .nav-logo {
    display: flex; align-items: center; gap: 0.6rem;
  }

  .nav-logo .logo-box {
    background: var(--red);
    color: white;
    font-family: 'Bebas Neue', sans-serif;
    font-size: 1.1rem;
    padding: 0.2rem 0.5rem;
    letter-spacing: 0.1em;
  }

  .nav-logo .logo-sub {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 0.75rem;
    color: var(--gold);
    letter-spacing: 0.15em;
    line-height: 1.1;
    text-transform: uppercase;
  }

  .nav-links {
    display: flex; gap: 2rem; list-style: none;
  }

  .nav-links a {
    color: var(--cream);
    text-decoration: none;
    font-size: 0.85rem;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    transition: color 0.2s;
  }

  .nav-links a:hover { color: var(--gold); }

  .nav-actions { display: flex; gap: 0.8rem; }

  .btn {
    padding: 0.5rem 1.2rem;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.8rem;
    font-weight: 500;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    border: none;
    cursor: pointer;
    transition: all 0.2s;
    text-decoration: none;
    display: inline-block;
  }

  .btn-outline {
    background: transparent;
    color: var(--gold);
    border: 1px solid var(--gold);
  }
  .btn-outline:hover { background: var(--gold); color: var(--dark); }

  .btn-solid {
    background: var(--gold);
    color: var(--dark);
  }
  .btn-solid:hover { background: var(--gold-light); }

  .btn-red {
    background: var(--red);
    color: white;
  }
  .btn-red:hover { background: #e62a00; }

  .hamburger { display: none; flex-direction: column; gap: 5px; cursor: pointer; }
  .hamburger span { width: 24px; height: 2px; background: var(--cream); transition: all 0.3s; }

  /* ── HERO ── */
  #hero {
    min-height: 100vh;
    display: flex; align-items: center;
    padding: 8rem 2rem 4rem;
    position: relative;
    overflow: hidden;
  }

  .hero-bg {
    position: absolute; inset: 0;
    background:
      linear-gradient(135deg, rgba(17,17,17,0.97) 40%, rgba(139,94,60,0.15) 100%);
    z-index: 0;
  }

  .hero-pattern {
    position: absolute; inset: 0;
    background-image:
      repeating-linear-gradient(0deg, transparent, transparent 60px, rgba(201,149,42,0.04) 60px, rgba(201,149,42,0.04) 61px),
      repeating-linear-gradient(90deg, transparent, transparent 60px, rgba(201,149,42,0.04) 60px, rgba(201,149,42,0.04) 61px);
    z-index: 0;
  }

  .hero-content {
    position: relative; z-index: 1;
    max-width: 1100px; margin: 0 auto; width: 100%;
    display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;
  }

  .hero-text .tag {
    display: inline-block;
    background: var(--red);
    color: white;
    font-size: 0.7rem;
    font-weight: 500;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    padding: 0.3rem 0.8rem;
    margin-bottom: 1.5rem;
  }

  .hero-text h1 {
    font-size: clamp(3.5rem, 7vw, 6rem);
    line-height: 0.95;
    color: var(--white);
    margin-bottom: 1.5rem;
  }

  .hero-text h1 span { color: var(--gold); }

  .hero-text p {
    color: #aaa;
    font-size: 1rem;
    line-height: 1.7;
    margin-bottom: 2rem;
    max-width: 420px;
  }

  .hero-btns { display: flex; gap: 1rem; flex-wrap: wrap; }

  .hero-stats {
    display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;
  }

  .stat-card {
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(201,149,42,0.2);
    padding: 1.5rem;
    position: relative;
    overflow: hidden;
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.6s, transform 0.6s;
  }

  .stat-card.visible { opacity: 1; transform: translateY(0); }

  .stat-card::before {
    content: '';
    position: absolute; top: 0; left: 0;
    width: 3px; height: 100%;
    background: var(--gold);
  }

  .stat-card .num {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 2.8rem;
    color: var(--gold);
    line-height: 1;
    display: block;
  }

  .stat-card .label {
    font-size: 0.75rem;
    color: #888;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-top: 0.3rem;
  }

  .scroll-indicator {
    position: absolute; bottom: 2rem; left: 50%; transform: translateX(-50%);
    display: flex; flex-direction: column; align-items: center; gap: 0.5rem;
    color: #555; font-size: 0.7rem; letter-spacing: 0.2em; text-transform: uppercase;
    animation: bounce 2s infinite;
  }

  .scroll-indicator::after {
    content: '';
    width: 1px; height: 40px;
    background: linear-gradient(to bottom, var(--gold), transparent);
  }

  @keyframes bounce {
    0%, 100% { transform: translateX(-50%) translateY(0); }
    50% { transform: translateX(-50%) translateY(6px); }
  }

  /* ── SECTIONS ── */
  section { padding: 6rem 2rem; }

  .section-inner { max-width: 1100px; margin: 0 auto; }

  .section-label {
    font-size: 0.7rem;
    letter-spacing: 0.3em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 0.8rem;
    display: block;
  }

  .section-title {
    font-size: clamp(2.5rem, 5vw, 4rem);
    color: var(--white);
    line-height: 1;
    margin-bottom: 1rem;
  }

  .section-divider {
    width: 60px; height: 3px;
    background: var(--gold);
    margin-bottom: 3rem;
  }

  /* ── ABOUT ── */
  #about { background: #141414; }

  .about-grid {
    display: grid; grid-template-columns: 1fr 1.2fr; gap: 5rem; align-items: center;
  }

  .about-visual {
    position: relative;
  }

  .about-img-frame {
    width: 100%;
    aspect-ratio: 4/3;
    background: var(--charcoal);
    border: 1px solid rgba(201,149,42,0.2);
    display: flex; align-items: center; justify-content: center;
    overflow: hidden;
    position: relative;
  }

  .about-img-frame img {
    width: 100%; height: 100%; object-fit: cover; opacity: 0.85;
  }

  .about-img-frame .frame-corner {
    position: absolute;
    width: 20px; height: 20px;
    border-color: var(--gold);
    border-style: solid;
  }
  .frame-corner.tl { top: -1px; left: -1px; border-width: 2px 0 0 2px; }
  .frame-corner.tr { top: -1px; right: -1px; border-width: 2px 2px 0 0; }
  .frame-corner.bl { bottom: -1px; left: -1px; border-width: 0 0 2px 2px; }
  .frame-corner.br { bottom: -1px; right: -1px; border-width: 0 2px 2px 0; }

  .about-badge {
    position: absolute; bottom: -1.5rem; right: -1.5rem;
    background: var(--gold);
    color: var(--dark);
    width: 100px; height: 100px;
    border-radius: 50%;
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    text-align: center;
  }

  .about-badge .big { font-family: 'Bebas Neue', sans-serif; font-size: 1.8rem; line-height: 1; }
  .about-badge .small { font-size: 0.55rem; letter-spacing: 0.1em; text-transform: uppercase; }

  .about-text p {
    color: #aaa; line-height: 1.8; margin-bottom: 1.5rem;
  }

  .about-highlights {
    display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-top: 2rem;
  }

  .highlight {
    display: flex; align-items: center; gap: 0.6rem;
    font-size: 0.85rem; color: #ccc;
  }

  .highlight::before {
    content: '▸';
    color: var(--gold);
    flex-shrink: 0;
  }

  /* ── SERVICES ── */
  #services { background: var(--dark); }

  .services-grid {
    display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;
  }

  .service-card {
    background: #141414;
    border: 1px solid rgba(255,255,255,0.06);
    overflow: hidden;
    position: relative;
    cursor: pointer;
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.6s, transform 0.6s, border-color 0.3s;
  }

  .service-card.visible { opacity: 1; transform: translateY(0); }
  .service-card:hover { border-color: var(--gold); }

  .service-card:hover .service-img img { transform: scale(1.05); }

  .service-img {
    width: 100%; height: 220px;
    overflow: hidden;
    background: #222;
    display: flex; align-items: center; justify-content: center;
  }

  .service-img img {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.5s;
    opacity: 0.85;
  }

  .service-img .service-placeholder {
    font-size: 3rem; color: #333;
  }

  .service-body { padding: 1.5rem; }

  .service-body h3 {
    font-size: 1.4rem;
    color: var(--white);
    margin-bottom: 0.5rem;
  }

  .service-body p {
    font-size: 0.85rem;
    color: #888;
    line-height: 1.6;
    margin-bottom: 1rem;
  }

  .service-tag {
    display: inline-block;
    background: rgba(201,149,42,0.12);
    color: var(--gold);
    font-size: 0.7rem;
    padding: 0.2rem 0.7rem;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    border: 1px solid rgba(201,149,42,0.3);
  }

  /* ── COURSE ── */
  #course { background: #141414; }

  .course-card {
    background: var(--dark);
    border: 1px solid rgba(201,149,42,0.3);
    display: grid; grid-template-columns: 1fr 1fr; gap: 0;
    overflow: hidden;
    max-width: 900px;
    margin: 0 auto;
  }

  .course-details { padding: 3rem; }

  .course-details .price {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 3rem;
    color: var(--gold);
    margin: 1rem 0;
  }

  .course-details .price span {
    font-size: 1.2rem;
    color: #888;
  }

  .course-meta {
    display: flex; flex-direction: column; gap: 0.8rem;
    margin: 1.5rem 0; padding: 1.5rem 0;
    border-top: 1px solid rgba(255,255,255,0.06);
    border-bottom: 1px solid rgba(255,255,255,0.06);
  }

  .meta-item {
    display: flex; align-items: center; gap: 0.8rem;
    font-size: 0.85rem; color: #ccc;
  }

  .meta-icon { color: var(--gold); font-size: 1rem; width: 20px; }

  .course-visual {
    background: #1a1a1a;
    display: flex; align-items: center; justify-content: center;
    flex-direction: column;
    padding: 3rem 2rem;
    text-align: center;
    border-left: 1px solid rgba(201,149,42,0.2);
  }

  .course-visual .big-num {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 8rem;
    color: var(--gold);
    line-height: 1;
    opacity: 0.15;
  }

  .course-visual .course-icon-text {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 1.8rem;
    color: white;
    margin-top: -2rem;
    position: relative;
    z-index: 1;
  }

  .course-visual p {
    color: #888; font-size: 0.8rem; margin-top: 0.5rem; line-height: 1.6;
  }

  /* ── GALLERY ── */
  #gallery { background: var(--dark); }

  .gallery-grid {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    grid-template-rows: 250px 250px;
    gap: 0.5rem;
  }

  .gallery-item {
    overflow: hidden;
    background: #1a1a1a;
    cursor: pointer;
    position: relative;
  }

  .gallery-item.large { grid-row: span 2; }

  .gallery-item img {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.5s, filter 0.3s;
    filter: grayscale(20%);
  }

  .gallery-item:hover img { transform: scale(1.08); filter: grayscale(0%); }

  .gallery-overlay {
    position: absolute; inset: 0;
    background: rgba(0,0,0,0);
    display: flex; align-items: center; justify-content: center;
    transition: background 0.3s;
  }

  .gallery-item:hover .gallery-overlay { background: rgba(201,149,42,0.15); }

  /* ── CONTACT ── */
  #contact { background: #141414; }

  .contact-grid {
    display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: start;
  }

  .contact-info h3 {
    font-size: 1.2rem;
    color: var(--white);
    margin-bottom: 1.5rem;
  }

  .contact-items {
    display: flex; flex-direction: column; gap: 1.2rem;
  }

  .contact-item {
    display: flex; align-items: flex-start; gap: 1rem;
  }

  .contact-item .icon {
    width: 40px; height: 40px;
    background: rgba(201,149,42,0.1);
    border: 1px solid rgba(201,149,42,0.3);
    display: flex; align-items: center; justify-content: center;
    font-size: 1rem;
    flex-shrink: 0;
    color: var(--gold);
  }

  .contact-item .info .label {
    font-size: 0.7rem;
    color: #666; letter-spacing: 0.1em;
    text-transform: uppercase; margin-bottom: 0.2rem;
  }

  .contact-item .info .value {
    color: var(--cream); font-size: 0.95rem;
  }

  .whatsapp-btn {
    display: flex; align-items: center; gap: 0.8rem;
    background: #25D366;
    color: white;
    padding: 1rem 1.5rem;
    text-decoration: none;
    font-weight: 500;
    font-size: 0.95rem;
    margin-top: 2rem;
    transition: background 0.2s;
    width: fit-content;
  }

  .whatsapp-btn:hover { background: #1ebe5d; }

  /* ── CONTACT FORM ── */
  .contact-form { display: flex; flex-direction: column; gap: 1rem; }

  .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

  .form-group {
    display: flex; flex-direction: column; gap: 0.4rem;
  }

  .form-group label {
    font-size: 0.72rem;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: #888;
  }

  .form-group input,
  .form-group select,
  .form-group textarea {
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.1);
    color: var(--cream);
    padding: 0.75rem 1rem;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.9rem;
    outline: none;
    transition: border-color 0.2s;
  }

  .form-group input:focus,
  .form-group select:focus,
  .form-group textarea:focus {
    border-color: var(--gold);
  }

  .form-group select option { background: #1a1a1a; }

  .form-group textarea { resize: vertical; min-height: 120px; }

  /* ── FOOTER ── */
  footer {
    background: #0a0a0a;
    padding: 3rem 2rem;
    border-top: 1px solid rgba(201,149,42,0.15);
  }

  .footer-inner {
    max-width: 1100px; margin: 0 auto;
    display: flex; justify-content: space-between; align-items: center;
    flex-wrap: wrap; gap: 1.5rem;
  }

  .footer-copy { color: #555; font-size: 0.8rem; }
  .footer-copy span { color: var(--gold); }

  /* ── MODAL ── */
  .modal-overlay {
    position: fixed; inset: 0;
    background: rgba(0,0,0,0.85);
    backdrop-filter: blur(6px);
    z-index: 1000;
    display: flex; align-items: center; justify-content: center;
    opacity: 0; pointer-events: none;
    transition: opacity 0.3s;
  }

  .modal-overlay.active { opacity: 1; pointer-events: all; }

  .modal {
    background: #161616;
    border: 1px solid rgba(201,149,42,0.3);
    width: 100%;
    max-width: 440px;
    padding: 2.5rem;
    position: relative;
    transform: translateY(20px);
    transition: transform 0.3s;
  }

  .modal-overlay.active .modal { transform: translateY(0); }

  .modal-close {
    position: absolute; top: 1rem; right: 1rem;
    background: none; border: none;
    color: #666; font-size: 1.5rem;
    cursor: pointer; line-height: 1;
    transition: color 0.2s;
  }
  .modal-close:hover { color: var(--gold); }

  .modal-tabs {
    display: flex; border-bottom: 1px solid rgba(255,255,255,0.08);
    margin-bottom: 2rem;
  }

  .modal-tab {
    background: none; border: none;
    color: #666; font-family: 'Bebas Neue', sans-serif;
    font-size: 1.2rem; letter-spacing: 0.1em;
    padding: 0.5rem 1.5rem 0.8rem;
    cursor: pointer; position: relative;
    transition: color 0.2s;
  }

  .modal-tab.active {
    color: var(--gold);
  }

  .modal-tab.active::after {
    content: '';
    position: absolute; bottom: -1px; left: 0; right: 0;
    height: 2px; background: var(--gold);
  }

  .modal-form { display: flex; flex-direction: column; gap: 1rem; }

  .modal-form .form-group input {
    width: 100%;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.1);
    color: var(--cream);
    padding: 0.75rem 1rem;
    font-family: 'DM Sans', sans-serif;
  }

  .modal-msg {
    font-size: 0.82rem;
    padding: 0.6rem 1rem;
    border-left: 3px solid;
    margin-top: 0.5rem;
    display: none;
  }

  .modal-msg.success { color: #4caf50; border-color: #4caf50; background: rgba(76,175,80,0.08); }
  .modal-msg.error { color: #f44; border-color: #f44; background: rgba(255,68,68,0.08); }

  .user-greeting {
    font-size: 0.8rem; color: var(--gold);
    letter-spacing: 0.05em;
  }

  /* ── REVEAL ANIMATIONS ── */
  .reveal {
    opacity: 0; transform: translateY(30px);
    transition: opacity 0.7s, transform 0.7s;
  }
  .reveal.visible { opacity: 1; transform: translateY(0); }

  /* ── RESPONSIVE ── */
  @media (max-width: 900px) {
    .nav-links { display: none; }
    .hamburger { display: flex; }
    .hero-content { grid-template-columns: 1fr; }
    .hero-stats { display: none; }
    .about-grid { grid-template-columns: 1fr; }
    .about-badge { bottom: 0; right: 0; }
    .course-card { grid-template-columns: 1fr; }
    .course-visual { display: none; }
    .gallery-grid { grid-template-columns: 1fr 1fr; grid-template-rows: auto; }
    .gallery-item.large { grid-row: span 1; }
    .contact-grid { grid-template-columns: 1fr; }
    .form-row { grid-template-columns: 1fr; }
  }

  @media (max-width: 600px) {
    nav { padding: 1rem; }
    section { padding: 4rem 1.2rem; }
    .gallery-grid { grid-template-columns: 1fr; }
    .modal { margin: 1rem; padding: 1.5rem; }
  }
</style>
</head>
<body>
<script>
const serverUser = <?php echo json_encode($serverUser); ?>;
if (!serverUser) {
  localStorage.removeItem('xb_current');
}
</script>
  <input type="text" id="regName">
<input type="email" id="regEmail">
<input type="password" id="regPass">

<!-- WELCOME SCREEN -->
<div id="welcomeOverlay" class="welcome-overlay" style="display: <?php echo $serverUser ? 'none' : 'flex'; ?>;">
  <div class="welcome-box">
    <h1>Welcome to XuluBrands</h1>
    <p>
      Continue to access our services, training courses,
      and home upgrade solutions.
    </p>

    <div class="welcome-buttons">
      <a href="php/register.php" class="btn btn-solid">Sign Up</a>
      <a href="php/login.php" class="btn btn-outline">Sign In</a>
      <button class="btn btn-red" onclick="continueGuest()">Continue as Guest</button>
    </div>
  </div>
</div>
<!-- NAV -->
<nav>
  <div class="nav-logo">
    <div class="logo-box">GTN</div>
    <div>
      <div style="font-family:'Bebas Neue',sans-serif;font-size:1.1rem;color:white;letter-spacing:0.08em;">XuluBrands</div>
      <div class="logo-sub">Home &amp; Office Upgrade</div>
    </div>
  </div>
  <ul class="nav-links">
    <li><a href="#about">About</a></li>
    <li><a href="#services">Services</a></li>
    <li><a href="#course">Courses</a></li>
    <li><a href="#gallery">Gallery</a></li>
    <li><a href="#contact">Contact</a></li>
  </ul>
  <div class="nav-actions">
    <span class="user-greeting" id="greetingText"></span>
    <a href="php/login.php" class="btn btn-outline" id="signInBtn">Sign In</a>
    <a href="php/register.php" class="btn btn-solid" id="signUpBtn">Sign Up</a>
    <a href="php/logout.php" class="btn btn-red" id="logoutBtn" style="display:none">Logout</a>
  </div>
  <div class="hamburger" onclick="toggleMobileMenu()">
    <span></span><span></span><span></span>
  </div>
</nav>

<!-- HERO -->
<section id="hero">
  <div class="hero-bg"></div>
  <div class="hero-pattern"></div>
  <div class="hero-content">
    <div class="hero-text reveal">
      <span class="tag">Greytown, KwaZulu-Natal</span>
      <h1>Build.<br/><span>Design.</span><br/>Upgrade.</h1>
      <p>Custom cabinetry, bespoke furniture, and professional training — transforming homes and offices across KZN with quality craftsmanship.</p>
      <div class="hero-btns">
        <a href="#services" class="btn btn-solid">Our Services</a>
        <a href="#contact" class="btn btn-outline">Book Now</a>
      </div>
    </div>
    <div class="hero-stats">
      <div class="stat-card">
        <span class="num">5+</span>
        <div class="label">Years Experience</div>
      </div>
      <div class="stat-card" style="transition-delay:0.1s">
        <span class="num">200+</span>
        <div class="label">Projects Completed</div>
      </div>
      <div class="stat-card" style="transition-delay:0.2s">
        <span class="num">R2500</span>
        <div class="label">Course Fee</div>
      </div>
      <div class="stat-card" style="transition-delay:0.3s">
        <span class="num">5</span>
        <div class="label">Day Short Course</div>
      </div>
    </div>
  </div>
  <div class="scroll-indicator">Scroll</div>
</section>

<!-- ABOUT -->
<section id="about">
  <div class="section-inner">
    <div class="about-grid">
      <div class="about-visual reveal">
        <div class="about-img-frame">
          <img src="images/training1.jpg" alt="Training class" id="aboutImg" />
          <div class="frame-corner tl"></div>
          <div class="frame-corner tr"></div>
          <div class="frame-corner bl"></div>
          <div class="frame-corner br"></div>
        </div>
        <div class="about-badge">
          <span class="big">GTN</span>
          <span class="small">Certified</span>
        </div>
      </div>
      <div class="about-text reveal" style="transition-delay:0.2s">
        <span class="section-label">Who We Are</span>
        <h2 class="section-title">Crafting Quality, Building Skills</h2>
        <div class="section-divider"></div>
        <p>XuluBrands Co is a Greytown-based home and office upgrade company delivering premium custom cabinetry, kitchen installations, and bespoke furniture solutions across KwaZulu-Natal.</p>
        <p>Beyond our manufacturing services, we run practical short courses that equip aspiring carpenters and entrepreneurs with hands-on cabinet making skills — transforming livelihoods one workshop at a time.</p>
        <div class="about-highlights">
          <div class="highlight">Custom Kitchen Cabinets</div>
          <div class="highlight">Bedroom Furniture</div>
          <div class="highlight">Office Upgrades</div>
          <div class="highlight">Carpentry Training</div>
          <div class="highlight">Business Consulting</div>
          <div class="highlight">Project Management</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SERVICES -->
<section id="services">
  <div class="section-inner">
    <span class="section-label reveal">What We Offer</span>
    <h2 class="section-title reveal">Our Services</h2>
    <div class="section-divider"></div>
    <div class="services-grid">
      <div class="service-card" style="transition-delay:0s">
        <div class="service-img">
          <img src="images/training2.jpg" alt="Training class" id="aboutImg" />
        </div>
        <div class="service-body">
          <h3>Kitchen Cabinets</h3>
          <p>Modern fitted kitchens tailored to your space — from charcoal matte to high-gloss finishes with quartz countertops.</p>
          <span class="service-tag">Most Popular</span>
        </div>
      </div>
      <div class="service-card" style="transition-delay:0.1s">
        <div class="service-img">
          <img src="images/training3.jpg" alt="Training class" id="aboutImg" />
        </div>
        <div class="service-body">
          <h3>Bedroom Furniture</h3>
          <p>Custom pedestals, wardrobes, and bedroom units combining natural wood tones with sleek modern hardware.</p>
          <span class="service-tag">Bespoke</span>
        </div>
      </div>
      <div class="service-card" style="transition-delay:0.2s">
        <div class="service-img">
          <img src="images/training4.jpg" alt="Training class" id="aboutImg" />
        </div>
        <div class="service-body">
          <h3>Home Upgrade</h3>
          <p>Complete office fitouts — reception desks, storage units, and workstations that reflect professionalism.</p>
          <span class="service-tag">Commercial</span>
        </div>
      </div>
      <div class="service-card" style="transition-delay:0.3s">
        <div class="service-img">
          <img src="images/training5.jpg" alt="Training class" id="aboutImg" />
        </div>
        <div class="service-body">
          <h3>Carpentry Training</h3>
          <p>5-day hands-on short course teaching practical cabinet making skills for entrepreneurs and job-seekers.</p>
          <span class="service-tag">Enroll Now</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- COURSE -->
<section id="course">
  <div class="section-inner">
    <span class="section-label reveal">Upskill Yourself</span>
    <h2 class="section-title reveal">Cabinet Making Course</h2>
    <div class="section-divider"></div>
    <div class="course-card reveal">
      <div class="course-details">
        <h3 style="font-family:'Bebas Neue';font-size:1.8rem;color:white;">5-Day Carpentry Short Course</h3>
        <div class="price">R2500 <span>per person</span></div>
        <div class="course-meta">
          <div class="meta-item">
            <span class="meta-icon">📍</span>
            1 Scott Street, Greytown
          </div>
          <div class="meta-item">
            <span class="meta-icon">📅</span>
            29 Jun – 03 Jul 2026 (5 Days)
          </div>
          <div class="meta-item">
            <span class="meta-icon">🕘</span>
            09:00 AM – 13:00 PM daily
          </div>
          <div class="meta-item">
            <span class="meta-icon">⏰</span>
            Closing date: Fri, 26 Jun 2026
          </div>
        </div>
        <a href="https://wa.me/27739095533?text=Hi%2C%20I%20want%20to%20book%20the%205-Day%20Cabinet%20Making%20Course" class="whatsapp-btn" target="_blank" rel="noopener">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
          Book via WhatsApp: 073 909 5533
        </a>
      </div>
      <div class="course-visual">
        <div class="big-num">5</div>
        <div class="course-icon-text">DAYS TO<br/>A NEW SKILL</div>
        <p>Learn cabinet making from scratch. Build your first cabinet by day 5.</p>
      </div>
    </div>
  </div>
</section>

<!-- GALLERY -->
<section id="gallery">
  <div class="section-inner">
    <span class="section-label reveal">Our Work</span>
    <h2 class="section-title reveal">Project Gallery</h2>
    <div class="section-divider"></div>
    <div class="gallery-grid reveal">
      <div class="gallery-item large">
          <img src="images/training6.jpg" alt="Training class" id="aboutImg" />
        <div class="gallery-overlay"></div>
      </div>
      <div class="gallery-item">
          <img src="images/training7.jpg" alt="Training class" id="aboutImg" />
        <div class="gallery-overlay"></div>
      </div>
      <div class="gallery-item">
          <img src="images/training8.jpg" alt="Training class" id="aboutImg" />
        <div class="gallery-overlay"></div>
      </div>
      <div class="gallery-item">
          <img src="images/training10.jpg" alt="Training class" id="aboutImg" />
        <div class="gallery-overlay"></div>
      </div>
      <div class="gallery-item">
          <img src="images/training9.jpg" alt="Training class" id="aboutImg" />
        <div class="gallery-overlay"></div>
      </div>
    </div>
    <p style="color:#555;font-size:0.8rem;margin-top:1rem;text-align:center;">← Photos from your uploaded images can replace these placeholders →</p>
  </div>
</section>

<!-- CONTACT -->
<section id="contact">
  <div class="section-inner">
    <span class="section-label reveal">Get In Touch</span>
    <h2 class="section-title reveal">Book a Service</h2>
    <div class="section-divider"></div>
    <div class="contact-grid">
      <div class="contact-info reveal">
        <h3>Let's Work Together</h3>
        <div class="contact-items">
          <div class="contact-item">
            <div class="icon">📍</div>
            <div class="info">
              <div class="label">Location</div>
              <div class="value">1 Scott Street, Greytown, KwaZulu-Natal</div>
            </div>
          </div>
          <div class="contact-item">
            <div class="icon">📞</div>
            <div class="info">
              <div class="label">Phone / WhatsApp</div>
              <div class="value">073 909 5533</div>
            </div>
          </div>
          <div class="contact-item">
            <div class="icon">🕐</div>
            <div class="info">
              <div class="label">Hours</div>
              <div class="value">Monday – Saturday, 08:00 – 17:00</div>
            </div>
          </div>
        </div>
        <a href="https://wa.me/27739095533" class="whatsapp-btn" target="_blank" rel="noopener">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
          Chat on WhatsApp
        </a>
      </div>
      <div class="reveal" style="transition-delay:0.2s">
        <form class="contact-form" onsubmit="submitEnquiry(event)">
          <div class="form-row">
            <div class="form-group">
              <label>First Name</label>
              <input type="text" placeholder="Sipho" required/>
            </div>
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" placeholder="Dlamini" required/>
            </div>
          </div>
          <div class="form-group">
            <label>Phone / WhatsApp</label>
            <input type="tel" placeholder="073 xxx xxxx" required/>
          </div>
          <div class="form-group">
            <label>Service Interested In</label>
            <select>
              <option value="">Select a service...</option>
              <option>Kitchen Cabinets</option>
              <option>Bedroom Furniture</option>
              <option>Office Upgrades</option>
              <option>5-Day Carpentry Course</option>
              <option>Business Consulting</option>
              <option>Other</option>
            </select>
          </div>
          <div class="form-group">
            <label>Message</label>
            <textarea placeholder="Tell us about your project..."></textarea>
          </div>
          <button type="submit" class="btn btn-solid" style="padding:0.9rem 2rem;font-size:0.85rem;">Send Enquiry</button>
          <div id="contactMsg" class="modal-msg"></div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="footer-inner">
    <div class="footer-copy">
      © 2026 <span>XuluBrands Co</span> — Greytown, KwaZulu-Natal. All rights reserved.
    </div>
    <div style="display:flex;gap:1.5rem;align-items:center;">
      <a href="#hero" style="color:#555;text-decoration:none;font-size:0.8rem;letter-spacing:0.1em;text-transform:uppercase;transition:color 0.2s" onmouseover="this.style.color='#c9952a'" onmouseout="this.style.color='#555'">Back to Top ↑</a>
    </div>
  </div>
</footer>

<!-- AUTH MODAL -->
<div class="modal-overlay" id="authModal">
  <div class="modal">
    <button class="modal-close" onclick="closeModal()">×</button>
    <div class="modal-tabs">
      <button class="modal-tab active" id="tabLogin" onclick="switchTab('login')">Sign In</button>
      <button class="modal-tab" id="tabRegister" onclick="switchTab('register')">Sign Up</button>
    </div>

    <!-- LOGIN -->
    <div id="loginForm">
      <form class="modal-form" onsubmit="login(event)">
        <div class="form-group">
          <label>Email Address</label>
          <input type="email" id="loginEmail" placeholder="your@email.com" required/>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" id="loginPass" placeholder="••••••••" required/>
        </div>
        <button type="submit" class="btn btn-solid" style="padding:0.85rem;font-size:0.85rem;width:100%;">Sign In</button>
        <div id="loginMsg" class="modal-msg"></div>
      </form>
    </div>

    <!-- REGISTER -->
     <form class="modal-form" id="registerForm" onsubmit="register(event)">

  <div class="form-group">
    <label>Full Name</label>
    <input type="text" id="regName" required>
  </div>

  <div class="form-group">
    <label>Email</label>
    <input type="email" id="regEmail" required>
  </div>

  <div class="form-group">
    <label>Password</label>
    <input type="password" id="regPass" required>
  </div>

  <button type="submit"
  class="btn btn-solid"
  style="padding:0.85rem;width:100%;">
    Create Account
  </button>

  <div id="regMsg" class="modal-msg"></div>
</form>

<script>

  // ── WELCOME SCREEN ─────────────────────────

function startSignup() {
  document.getElementById('welcomeOverlay').style.display = 'none';
  openModal('register');
}

function startSignin() {
  document.getElementById('welcomeOverlay').style.display = 'none';
  openModal('login');
}

function continueGuest() {
  document.getElementById('welcomeOverlay').style.display = 'none';
}

function clearRegisterFields() {
  document.getElementById('regName').value = '';
  document.getElementById('regEmail').value = '';
  document.getElementById('regPass').value = '';
}

function clearLoginFields() {
  document.getElementById('loginEmail').value = '';
  document.getElementById('loginPass').value = '';
}

// ── AUTH (localStorage) ──────────────────────────────────────────────────────

function getUsers() {
  try { return JSON.parse(localStorage.getItem('xb_users') || '[]'); } catch { return []; }
}

function saveUsers(u) {
  localStorage.setItem('xb_users', JSON.stringify(u));
}

function getCurrentUser() {
  if (typeof serverUser !== 'undefined' && serverUser) return serverUser;
  try { return JSON.parse(localStorage.getItem('xb_current') || 'null'); } catch { return null; }
}

function setCurrentUser(u) {
  localStorage.setItem('xb_current', JSON.stringify(u));
}

function solveSimpleChallenge()
{
    console.log("Function works!");
}

function updateNavAuth() {
  const user = getCurrentUser();
  const greeting = document.getElementById('greetingText');
  const signIn = document.getElementById('signInBtn');
  const signUp = document.getElementById('signUpBtn');
  const logout = document.getElementById('logoutBtn');
  const overlay = document.getElementById('welcomeOverlay');

  if (user) {
    overlay.style.display = 'none';
    greeting.textContent = 'Welcome, ' + user.name.split(' ')[0];
    signIn.style.display = 'none';
    signUp.style.display = 'none';
    logout.style.display = 'inline-block';
  } else {
    overlay.style.display = 'flex';
    greeting.textContent = '';
    signIn.style.display = 'inline-block';
    signUp.style.display = 'inline-block';
    logout.style.display = 'none';
  }
}

function register(e) {
  e.preventDefault();
  const name = document.getElementById('regName').value.trim();
  const email = document.getElementById('regEmail').value.trim().toLowerCase();
  const pass = document.getElementById('regPass').value;
  const msg = document.getElementById('regMsg');
  const users = getUsers();

  if (!name) {
    showMsg(msg, 'Please enter your full name.', 'error');
    clearRegisterFields();
    return;
  }

  if (!email) {
    showMsg(msg, 'Email address is required.', 'error');
    clearRegisterFields();
    return;
  }

  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    showMsg(msg, 'Please enter a valid email address.', 'error');
    clearRegisterFields();
    return;
  }

  if (!pass) {
    showMsg(msg, 'Password is required.', 'error');
    clearRegisterFields();
    return;
  }

  if (pass.length < 6) {
    showMsg(msg, 'Password must be at least 6 characters.', 'error');
    clearRegisterFields();
    return;
  }

  if (users.find(u => u.email === email)) {
    showMsg(msg, 'This email is already registered. Please use another email or sign in.', 'error');
    clearRegisterFields();
    return;
  }

  const newUser = { name, email, pass, joined: new Date().toISOString() };
  users.push(newUser);
  saveUsers(users);
  setCurrentUser({ name, email });
  showMsg(msg, 'Account created! Welcome to XuluBrands.', 'success');
  clearRegisterFields();

  setTimeout(() => {
    closeModal();
    updateNavAuth();
    document.getElementById('welcomeOverlay').style.display = 'none';
    window.location.hash = '#hero';
  }, 1200);
}

function login(e) {
  e.preventDefault();
  const email = document.getElementById('loginEmail').value.trim().toLowerCase();
  const pass = document.getElementById('loginPass').value;
  const msg = document.getElementById('loginMsg');
  const users = getUsers();

  if (!email) {
    showMsg(msg, 'Please enter your email address.', 'error');
    clearLoginFields();
    return;
  }

  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    showMsg(msg, 'Please enter a valid email address.', 'error');
    clearLoginFields();
    return;
  }

  if (!pass) {
    showMsg(msg, 'Please enter your password.', 'error');
    clearLoginFields();
    return;
  }

  const user = users.find(u => u.email === email && u.pass === pass);
  if (!user) {
    const emailExists = users.some(u => u.email === email);
    if (emailExists) {
      showMsg(msg, 'Password is incorrect. Please try again.', 'error');
    } else {
      showMsg(msg, 'No account found with that email. Please register first.', 'error');
    }
    clearLoginFields();
    return;
  }

  setCurrentUser({ name: user.name, email: user.email });
  showMsg(msg, 'Welcome back, ' + user.name.split(' ')[0] + '!', 'success');
  clearLoginFields();

  setTimeout(() => {
    closeModal();
    updateNavAuth();
    document.getElementById('welcomeOverlay').style.display = 'none';
    window.location.hash = '#hero';
  }, 1000);
}

function logout() {
  localStorage.removeItem('xb_current');
  updateNavAuth();
}

// ── MODAL ────────────────────────────────────────────────────────────────────

function openModal(tab) {
  document.getElementById('authModal').classList.add('active');
  switchTab(tab || 'login');
  document.body.style.overflow = 'hidden';
}

function closeModal() {
  document.getElementById('authModal').classList.remove('active');
  document.body.style.overflow = '';
}

document.getElementById('authModal').addEventListener('click', function(e) {
  if (e.target === this) closeModal();
});

function switchTab(tab) {
  document.getElementById('loginForm').style.display = tab === 'login' ? 'block' : 'none';
  document.getElementById('registerForm').style.display = tab === 'register' ? 'block' : 'none';
  document.getElementById('tabLogin').classList.toggle('active', tab === 'login');
  document.getElementById('tabRegister').classList.toggle('active', tab === 'register');
  document.getElementById('loginMsg').style.display = 'none';
  document.getElementById('regMsg').style.display = 'none';
}

function showMsg(el, text, type) {
  el.textContent = text;
  el.className = 'modal-msg ' + type;
  el.style.display = 'block';
}

// ── CONTACT FORM ──────────────────────────────────────────────────────────────

function submitEnquiry(e) {
  e.preventDefault();
  const msg = document.getElementById('contactMsg');
  showMsg(msg, '✓ Enquiry sent! We\'ll contact you on WhatsApp shortly.', 'success');
  e.target.reset();
  setTimeout(() => { msg.style.display = 'none'; }, 5000);
}

// ── MOBILE NAV ────────────────────────────────────────────────────────────────

function toggleMobileMenu() {
  const links = document.querySelector('.nav-links');
  if (links.style.display === 'flex') {
    links.style.display = 'none';
    links.style.cssText = '';
  } else {
    links.style.display = 'flex';
    links.style.flexDirection = 'column';
    links.style.position = 'absolute';
    links.style.top = '100%';
    links.style.left = '0';
    links.style.right = '0';
    links.style.background = '#111';
    links.style.padding = '1rem 2rem';
    links.style.gap = '1rem';
    links.style.borderBottom = '1px solid rgba(201,149,42,0.2)';
  }
}

// ── SCROLL REVEAL ─────────────────────────────────────────────────────────────

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
    }
  });
}, { threshold: 0.1 });

document.querySelectorAll('.reveal, .stat-card, .service-card').forEach(el => {
  observer.observe(el);
});

// ── INIT ──────────────────────────────────────────────────────────────────────

updateNavAuth();

// Hero reveal on load
setTimeout(() => {
  document.querySelectorAll('#hero .reveal').forEach(el => el.classList.add('visible'));
}, 200);
</script>
</body>
</html>
