<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Product Manager</title>
    <style>
    * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #febcdf;
            color: #1f2937;
            min-height: 100vh;
        }
        .topbar {
            background: #fe9bcf;
            border-bottom: 1px solid rgba(15, 23, 42, .06);
            padding: 18px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
        }
        .brand {
            font-size: .8rem;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: #4b5563;
            font-weight: 700;
        }
        .nav { display: flex; gap: 12px; flex-wrap: wrap; }
        .nav a {
            text-decoration: none;
            color: #1f2937;
            font-weight: 600;
            padding: 10px 14px;
            border-radius: 999px;
            transition: background .2s ease;
        }
        .nav a:hover { background: #5a826d; }
        .page {
            max-width: 700px;
            margin: 42px auto;
            padding: 0 18px 40px;
        }
        .hero, .card {
            background: #fff;
            border: 1px solid rgba(15, 23, 42, .06);
            border-radius: 22px;
            padding: 30px 28px;
            box-shadow: 0 12px 28px rgba(15, 23, 42, .04);
        }
        .hero { margin-bottom: 18px; }
        .hero h1 {
            margin: 0 0 10px;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
            letter-spacing: -.04em;
            color: #111827;
        }
        .hero p { margin: 0; color: #6b7280; font-size: 1rem; }
        .card { border-radius: 18px; }
        label {
            display: block;
            font-size: .72rem;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: #6b7280;
            margin-bottom: 8px;
        }
        input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            background: #fafafa;
            color: #111827;
            font-size: .95rem;
            margin-bottom: 18px;
        }
        input:focus { outline: none; border-color: #5a826d; }
        button {
            width: 100%;
            padding: 12px;
            border: 0;
            border-radius: 10px;
            background: #5a826d;
            color: #fff;
            cursor: pointer;
            font-size: .95rem;
            font-weight: 600;
        }
        button:hover { background: #486b59; }
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
            color: #6b7280;
        }
        .footer-link a { color: #5a826d; text-decoration: none; font-weight: 600; }
        @media (max-width: 600px) {
            .topbar { padding: 16px 18px; align-items: flex-start; flex-direction: column; }
            .brand { width: 100%; margin-bottom: 8px; }
            .page { margin: 24px auto; }
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
