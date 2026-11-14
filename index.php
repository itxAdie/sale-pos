<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#172b4d" />
  <meta name="description" content="Sign in to your retail point of sale and inventory workspace." />
  <title>Sign in | Nomi Shopping Mall</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="css/adminlte.css" />

  <style>
    :root {
      --login-navy: #172b4d;
      --login-navy-deep: #10213d;
      --login-blue: #3568c8;
      --login-ink: #182538;
      --login-muted: #718096;
      --login-border: #e4e9f0;
    }

    * { box-sizing: border-box; }

    body.login-shell {
      min-height: 100vh;
      margin: 0;
      display: flex;
      align-items: stretch;
      background: #f5f7fb;
      color: var(--login-ink);
      font-family: "DM Sans", sans-serif;
    }

    .login-layout {
      width: 100%;
      min-height: 100vh;
      display: grid;
      grid-template-columns: minmax(360px, 0.92fr) minmax(460px, 1.08fr);
    }

    .login-brand-panel {
      position: relative;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: clamp(36px, 5vw, 72px);
      color: #fff;
      background:
        radial-gradient(circle at 15% 85%, rgba(69, 126, 221, .28), transparent 34%),
        radial-gradient(circle at 90% 12%, rgba(73, 112, 184, .24), transparent 30%),
        linear-gradient(145deg, var(--login-navy), var(--login-navy-deep));
    }

    .login-brand-panel::before,
    .login-brand-panel::after {
      content: "";
      position: absolute;
      border: 1px solid rgba(255,255,255,.09);
      border-radius: 50%;
      pointer-events: none;
    }

    .login-brand-panel::before {
      width: 560px;
      height: 560px;
      right: -250px;
      bottom: -230px;
    }

    .login-brand-panel::after {
      width: 390px;
      height: 390px;
      right: -165px;
      bottom: -145px;
    }

    .brand-lockup,
    .brand-message,
    .brand-footnote { position: relative; z-index: 1; }

    .brand-lockup {
      display: inline-flex;
      align-items: center;
      gap: 13px;
      color: #fff;
      text-decoration: none;
      width: fit-content;
    }

    .brand-mark {
      width: 46px;
      height: 46px;
      display: grid;
      place-items: center;
      border: 1px solid rgba(255,255,255,.2);
      border-radius: 13px;
      background: rgba(255,255,255,.12);
      font-size: 23px;
    }

    .brand-name {
      display: block;
      font-family: "Manrope", sans-serif;
      font-size: 18px;
      font-weight: 800;
      letter-spacing: -.45px;
    }

    .brand-caption {
      display: block;
      margin-top: 1px;
      color: rgba(255,255,255,.65);
      font-size: 11px;
      letter-spacing: 1.25px;
      text-transform: uppercase;
    }

    .brand-message { max-width: 520px; margin: 70px 0 80px; }

    .brand-eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 22px;
      color: #c5d7f7;
      font-size: 12px;
      font-weight: 700;
      letter-spacing: 1.5px;
      text-transform: uppercase;
    }

    .brand-eyebrow::before {
      content: "";
      width: 22px;
      height: 2px;
      background: #8db4ff;
    }

    .brand-message h1 {
      max-width: 510px;
      margin: 0;
      color: #fff;
      font-family: "Manrope", sans-serif;
      font-size: clamp(34px, 4.1vw, 58px);
      font-weight: 800;
      line-height: 1.12;
      letter-spacing: -2px;
    }

    .brand-message p {
      max-width: 430px;
      margin: 22px 0 0;
      color: rgba(255,255,255,.72);
      font-size: 16px;
      line-height: 1.8;
    }

    .brand-highlights {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 34px;
    }

    .brand-highlight {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 9px 12px;
      border: 1px solid rgba(255,255,255,.14);
      border-radius: 9px;
      background: rgba(255,255,255,.06);
      color: rgba(255,255,255,.86);
      font-size: 12px;
    }

    .brand-highlight i { color: #9fc1ff; }

    .brand-footnote {
      color: rgba(255,255,255,.48);
      font-size: 12px;
    }

    .login-main {
      display: grid;
      place-items: center;
      padding: 48px 28px;
      background:
        radial-gradient(circle at 100% 0%, rgba(53,104,200,.055), transparent 28%),
        #fff;
    }

    .login-card {
      width: 100%;
      max-width: 430px;
    }

    .mobile-brand { display: none; }

    .login-heading { margin-bottom: 34px; }

    .login-heading .eyebrow {
      margin-bottom: 10px;
      color: var(--login-blue);
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 1.5px;
      text-transform: uppercase;
    }

    .login-heading h2 {
      margin: 0;
      color: var(--login-ink);
      font-family: "Manrope", sans-serif;
      font-size: 32px;
      font-weight: 800;
      letter-spacing: -1.1px;
    }

    .login-heading p {
      margin: 10px 0 0;
      color: var(--login-muted);
      font-size: 14px;
      line-height: 1.7;
    }

    .login-field { margin-bottom: 21px; }

    .login-field label {
      display: block;
      margin-bottom: 9px;
      color: #344258;
      font-size: 13px;
      font-weight: 700;
    }

    .login-input-wrap { position: relative; }

    .login-input-wrap > i {
      position: absolute;
      top: 50%;
      left: 16px;
      z-index: 2;
      color: #8794a8;
      font-size: 17px;
      transform: translateY(-50%);
    }

    .login-input {
      width: 100%;
      height: 52px;
      padding: 0 16px 0 46px;
      border: 1px solid var(--login-border);
      border-radius: 10px;
      outline: none;
      background: #fff;
      color: var(--login-ink);
      font: inherit;
      font-size: 14px;
      transition: border-color .2s, box-shadow .2s;
    }

    .login-input::placeholder { color: #a2adbb; }

    .login-input:focus {
      border-color: #7da4e8;
      box-shadow: 0 0 0 4px rgba(53,104,200,.10);
    }

    .login-options {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      margin: 3px 0 26px;
      color: #637187;
      font-size: 13px;
    }

    .remember-option {
      display: inline-flex;
      align-items: center;
      gap: 9px;
      cursor: pointer;
    }

    .remember-option input {
      width: 15px;
      height: 15px;
      accent-color: var(--login-blue);
    }

    .login-submit {
      width: 100%;
      min-height: 52px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      border: 0;
      border-radius: 10px;
      background: var(--login-blue);
      color: #fff;
      font-family: "DM Sans", sans-serif;
      font-size: 14px;
      font-weight: 700;
      box-shadow: 0 8px 18px rgba(53,104,200,.18);
      transition: background .2s, transform .2s, box-shadow .2s;
    }

    .login-submit:hover {
      background: #2859b3;
      box-shadow: 0 10px 22px rgba(53,104,200,.24);
      transform: translateY(-1px);
    }

    .demo-notice {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      margin-top: 22px;
      padding: 13px 14px;
      border: 1px solid #e8edf5;
      border-radius: 9px;
      background: #f7f9fc;
      color: #6a778b;
      font-size: 12px;
      line-height: 1.6;
    }

    .demo-notice i {
      margin-top: 1px;
      color: #557fc4;
      font-size: 15px;
    }

    .login-bottom {
      margin-top: 42px;
      color: #9aa5b4;
      font-size: 11px;
      text-align: center;
    }

    @media (max-width: 900px) {
      .login-layout { grid-template-columns: minmax(290px, .8fr) minmax(400px, 1.2fr); }
      .login-brand-panel { padding: 38px 30px; }
      .brand-message h1 { font-size: 38px; }
    }

    @media (max-width: 700px) {
      .login-layout { display: block; }
      .login-brand-panel { display: none; }
      .login-main {
        min-height: 100vh;
        padding: 34px 24px;
        align-content: center;
      }
      .login-card { max-width: 440px; }
      .mobile-brand {
        display: flex;
        align-items: center;
        gap: 11px;
        margin-bottom: 48px;
        color: var(--login-navy);
      }
      .mobile-brand .brand-mark {
        border-color: #e1e9f5;
        background: #edf3fc;
        color: var(--login-blue);
      }
      .mobile-brand .brand-name { color: var(--login-navy); }
      .mobile-brand .brand-caption { color: #8190a5; }
      .login-heading h2 { font-size: 29px; }
    }

    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after { scroll-behavior: auto !important; transition-duration: .01ms !important; }
    }
  </style>
</head>
<body class="login-shell">
  <main class="login-layout">
    <section class="login-brand-panel" aria-label="Application introduction">
      <a class="brand-lockup" href="index.php" aria-label="Nomi Shopping Mall home">
        <span class="brand-mark"><i class="bi bi-shop-window" aria-hidden="true"></i></span>
        <span>
          <span class="brand-name">Nomi Shopping Mall</span>
          <span class="brand-caption">Retail management system</span>
        </span>
      </a>

      <div class="brand-message">
        <div class="brand-eyebrow">Your store, in control</div>
        <h1>Run your retail business with confidence.</h1>
        <p>One workspace for your sales, inventory, purchases and daily store operations.</p>
        <div class="brand-highlights" aria-label="Platform features">
          <span class="brand-highlight"><i class="bi bi-upc-scan" aria-hidden="true"></i> Barcode &amp; POS</span>
          <span class="brand-highlight"><i class="bi bi-box-seam" aria-hidden="true"></i> Inventory</span>
          <span class="brand-highlight"><i class="bi bi-graph-up" aria-hidden="true"></i> Business reports</span>
        </div>
      </div>

      <div class="brand-footnote">Simple operations. Clear numbers. Better decisions.</div>
    </section>

    <section class="login-main" aria-label="Sign in">
      <div class="login-card">
        <div class="mobile-brand">
          <span class="brand-mark"><i class="bi bi-shop-window" aria-hidden="true"></i></span>
          <span>
            <span class="brand-name">Nomi Shopping Mall</span>
            <span class="brand-caption">Retail management system</span>
          </span>
        </div>

        <header class="login-heading">
          <div class="eyebrow">Welcome back</div>
          <h2>Sign in to your account</h2>
          <p>Enter your account details to continue to your store workspace.</p>
        </header>

        <form action="pages/dashboard.php" method="post">
          <div class="login-field">
            <label for="loginEmail">Email address</label>
            <div class="login-input-wrap">
              <i class="bi bi-envelope" aria-hidden="true"></i>
              <input
                class="login-input"
                id="loginEmail"
                name="email"
                type="email"
                placeholder="you@yourstore.com"
                autocomplete="username"
                required
              />
            </div>
          </div>

          <div class="login-field">
            <label for="loginPassword">Password</label>
            <div class="login-input-wrap">
              <i class="bi bi-lock" aria-hidden="true"></i>
              <input
                class="login-input"
                id="loginPassword"
                name="password"
                type="password"
                placeholder="Enter your password"
                autocomplete="current-password"
                required
              />
            </div>
          </div>

          <div class="login-options">
            <label class="remember-option" for="rememberMe">
              <input id="rememberMe" name="remember" type="checkbox" value="1" />
              <span>Remember me</span>
            </label>
          </div>

          <button class="login-submit" type="submit">
            Continue to dashboard <i class="bi bi-arrow-right" aria-hidden="true"></i>
          </button>
        </form>

        <div class="demo-notice" role="note">
          <i class="bi bi-info-circle" aria-hidden="true"></i>
          <span><strong>Demo mode:</strong> Account authentication and password recovery will be connected during backend development. This screen currently opens the dashboard preview.</span>
        </div>

        <div class="login-bottom">&copy; <?= date('Y') ?> Nomi Shopping Mall. All rights reserved.</div>
      </div>
    </section>
  </main>
</body>
</html>
