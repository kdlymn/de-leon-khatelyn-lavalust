<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
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
            background-color: #f9b5c7;
            background-image: radial-gradient(circle at 12% 18%, rgba(218, 117, 148, .22), transparent 24%), radial-gradient(circle at 88% 82%, rgba(234, 177, 112, .16), transparent 22%), linear-gradient(135deg, rgba(255, 255, 255, .5), transparent 52%);
            color: #172033;
            min-height: 100vh;
        }
        .topbar {
            background: rgba(255, 250, 252, .88);
            border-bottom: 1px solid #f0dce3;
            box-shadow: 0 4px 18px rgba(150, 64, 91, .05);
            padding: 18px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
        }
        .brand {
            font-size: .8rem;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: #172033;
            font-weight: 700;
        }
        .brand::before { content: ''; display: inline-block; width: 9px; height: 9px; margin-right: 9px; background: #d28b55; border-radius: 2px; }
        .nav { display: flex; gap: 12px; flex-wrap: wrap; }
        .nav a {
            text-decoration: none;
            color: #1f2937;
            font-weight: 600;
            padding: 10px 14px;
            border-radius: 8px;
            transition: background .2s ease;
        }
        .nav a:hover { background: #fff0f4; color: #c2557a; }
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
        .hero { border-top: 3px solid #c2557a; }
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
        input:focus { outline: none; border-color: #c2557a; box-shadow: 0 0 0 3px rgba(194, 85, 122, .1); }
        button {
            width: 100%;
            padding: 12px;
            border: 0;
            border-radius: 8px;
            background: #c2557a;
            color: #fff;
            cursor: pointer;
            font-size: .95rem;
            font-weight: 600;
        }
        button:hover { background: #a94465; }
        .msg {
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 18px;
            font-size: .85rem;
        }
        .msg.error { background: #fee2e2; color: #991b1b; }
        .msg.info { background: #e4eef8; color: #315b7d; }
        .msg.success { background: #e3f1e6; color: #356247; }
        .footer-link {
            text-align: center;
            margin-top: 1.25rem;
            font-size: .85rem;
            color: #627083;
        }
        .footer-link a { color: #c2557a; text-decoration: none; font-weight: 600; }
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
        <a href="<?= base_url('register'); ?>">Register</a>
        <a href="<?= base_url('products'); ?>">Products</a>
    </nav>
</div>

<main class="page">
<section class="hero">
    <div style="color:#c2557a;font-size:.72rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;margin-bottom:12px;">Workspace access</div>
    <h1>Welcome back</h1>
    <p>Sign in to manage your product inventory.</p>
</section>

<section class="card">

    <?php if (!empty($denied)): ?>
        <div class="msg info">Please log in to continue.</div>
    <?php endif; ?>
    <?php if (!empty($registered)): ?>
        <div class="msg success">Account created. You can now log in.</div>
    <?php endif; ?>
    <?php if (!empty($error)): ?>
        <div class="msg error"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('login'); ?>">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" autocomplete="username" required autofocus>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" autocomplete="current-password" required>

        <button type="submit">Log In</button>
    </form>

    <div class="footer-link">
        Don't have an account? <a href="<?= base_url('register'); ?>">Register</a>
    </div>
</section>
</main>
</body>
</html>
