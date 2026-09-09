<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in | Product Manager</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background-color: #f4f6f8;
            background-image: linear-gradient(rgba(15, 118, 110, .035) 1px, transparent 1px), linear-gradient(90deg, rgba(15, 118, 110, .035) 1px, transparent 1px);
            background-size: 32px 32px;
            color: #1f2937;
            min-height: 100vh;
        }
        .topbar {
            background: #ffffff;
            border-bottom: 1px solid #e5e9ef;
            padding: 18px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .brand {
            font-size: .8rem;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: #172033;
            font-weight: 700;
        }
        .brand::before { content: ''; display: inline-block; width: 9px; height: 9px; margin-right: 9px; background: #d99a3d; border-radius: 2px; }
        .nav { display: flex; gap: 12px; flex-wrap: wrap; }
        .nav a {
            text-decoration: none;
            color: #1f2937;
            font-weight: 600;
            padding: 10px 14px;
            border-radius: 8px;
            transition: background .2s ease;
        }
        .nav a:hover { background: #eef3f2; color: #0f766e; }
        .page {
            max-width: 560px;
            margin: 64px auto;
            padding: 0 20px 40px;
        }
        .hero, .card {
            background: #fff;
            border: 1px solid #e3e8ee;
            border-radius: 12px;
            padding: 28px;
            box-shadow: 0 12px 32px rgba(23, 32, 51, .06);
        }
        .hero { border-top: 3px solid #0f766e; }
        .hero { margin-bottom: 18px; }
        .hero h1 {
            margin: 0 0 10px;
            font-size: clamp(1.9rem, 4vw, 2.5rem);
            font-weight: 700;
            letter-spacing: -.02em;
            color: #172033;
        }
        .hero p { margin: 0; color: #6b7280; font-size: 1rem; }
        .card { border-radius: 12px; }
        label {
            display: block;
            font-size: .72rem;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: #627083;
            margin-bottom: 8px;
        }
        input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d9e0e8;
            border-radius: 8px;
            background: #ffffff;
            color: #172033;
            font-size: .95rem;
            margin-bottom: 18px;
        }
        input:focus { outline: none; border-color: #0f766e; box-shadow: 0 0 0 3px rgba(15, 118, 110, .1); }
        button {
            width: 100%;
            padding: 12px;
            border: 0;
            border-radius: 8px;
            background: #0f766e;
            color: #fff;
            cursor: pointer;
            font-size: .95rem;
            font-weight: 600;
        }
        button:hover { background: #0b5f59; }
        .error {
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 18px;
            background: #fee2e2;
            color: #991b1b;
            font-size: .85rem;
        }
        .footer-link {
            text-align: center;
            margin-top: 1.25rem;
            font-size: .85rem;
            color: #627083;
        }
        .footer-link a { color: #0f766e; text-decoration: none; font-weight: 600; }
        @media (max-width: 600px) {
            .topbar { padding: 16px 20px; align-items: flex-start; flex-direction: column; }
            .brand { width: 100%; margin-bottom: 8px; }
            .page { margin: 32px auto; }
            .hero, .card { padding: 24px 20px; }
        }
    </style>
</head>
<body>
<div class="topbar">
    <div class="brand">Product Manager</div>
    <nav class="nav">
        <a href="<?= site_url('register'); ?>">Register</a>
    </nav>
</div>

<main class="page">
    <section class="hero">
        <div style="color:#0f766e;font-size:.72rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;margin-bottom:12px;">Workspace access</div>
        <h1>Welcome back</h1>
        <p>Sign in to manage your product inventory.</p>
    </section>

    <section class="card">
        <?php if (!empty($error)): ?><div class="error" role="alert"><?= htmlspecialchars($error); ?></div><?php endif; ?>
        <form method="post" action="<?= site_url('login'); ?>">
            <label for="username">Username</label>
            <input id="username" name="username" type="text" required autocomplete="username" autofocus>
            <label for="password">Password</label>
            <input id="password" name="password" type="password" required autocomplete="current-password">
            <button type="submit">Sign in</button>
        </form>
        <div class="footer-link">
            Need an account? <a href="<?= site_url('register'); ?>">Register</a>
        </div>
    </section>
</main>
</body>
</html>