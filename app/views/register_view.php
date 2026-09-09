<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Product Manager</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background-color: #fff4f7;
            background-image: radial-gradient(circle at 12% 18%, rgba(218, 117, 148, .22), transparent 24%), radial-gradient(circle at 88% 82%, rgba(234, 177, 112, .16), transparent 22%), linear-gradient(135deg, rgba(255, 255, 255, .5), transparent 52%);
            color: #1f2937;
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
        }
        .brand {
            font-size: .8rem;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: #172033;
            font-weight: 700;
        }
        .brand::before { content: ''; display: inline-block; width: 9px; height: 9px; margin-right: 9px; background: #d28b55; border-radius: 2px; }
        .nav {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }
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
            max-width: 700px;
            margin: 64px auto;
            padding: 0 18px 40px;
        }
        .hero, .card {
            background: #fff;
            border: 1px solid #e3e8ee;
            border-radius: 12px;
            padding: 30px 28px;
            box-shadow: 0 12px 32px rgba(23, 32, 51, .06);
        }
        .hero { border-top: 3px solid #c2557a; }
        .hero { margin-bottom: 18px; }
        .hero h1 {
            margin: 0 0 10px;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
            letter-spacing: -.02em;
            color: #172033;
        }
        .hero p {
            margin: 0;
            color: #627083;
            font-size: 1rem;
        }
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
            background: #c2557a;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: .95rem;
            font-weight: 600;
            cursor: pointer;
        }
        button:hover { background: #a94465; }
        .msg.error {
            padding: 12px 14px;
            border-radius: 10px;
            font-size: .85rem;
            margin-bottom: 18px;
            background: #fee2e2;
            color: #991b1b;
        }
        .footer-link { text-align: center; margin-top: 1.25rem; font-size: .85rem; color: #6b7280; }
        .footer-link a { color: #c2557a; text-decoration: none; font-weight: 600; }
        @media (max-width: 600px) {
            .topbar { padding: 16px 20px; }
            .brand { width: 100%; margin-bottom: 8px; }
            .topbar { align-items: flex-start; flex-direction: column; }
            .page { margin: 24px auto; }
            .hero, .card { padding: 24px 20px; }
        }
    </style>
</head>
<body>
<div class="topbar">
    <div class="brand">Product Manager</div>
    <nav class="nav">
        <a href="<?= base_url('login'); ?>">Log in</a>
    </nav>
</div>

<main class="page">
    <section class="hero">
        <div style="color:#c2557a;font-size:.72rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;margin-bottom:12px;">Team access</div>
        <h1>Create an account</h1>
        <p>Create an account to manage your product inventory.</p>
    </section>

    <section class="card">

    <?php if (!empty($error)): ?>
        <div class="msg error"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('register'); ?>">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" autocomplete="username" required autofocus>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" autocomplete="email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" autocomplete="new-password" minlength="6" required>

        <button type="submit">Register</button>
    </form>

    <div class="footer-link">
        Already have an account? <a href="<?= base_url('login'); ?>">Log in</a>
    </div>
    </section>
</main>
</body>
</html>
