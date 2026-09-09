<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Student Portal</title>
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
            border-bottom: 1px solid rgba(15, 23, 42, 0.06);
            padding: 18px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .brand {
            font-size: .8rem;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: #4b5563;
            font-weight: 700;
        }
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
        .hero p {
            margin: 0;
            color: #6b7280;
            font-size: 1rem;
        }
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
            background: #5a826d;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: .95rem;
            font-weight: 600;
            cursor: pointer;
        }
        button:hover { background: #486b59; }
        .msg.error {
            padding: 12px 14px;
            border-radius: 10px;
            font-size: .85rem;
            margin-bottom: 18px;
            background: #fee2e2;
            color: #991b1b;
        }
        .footer-link { text-align: center; margin-top: 1.25rem; font-size: .85rem; color: #6b7280; }
        .footer-link a { color: #5a826d; text-decoration: none; font-weight: 600; }
        @media (max-width: 600px) {
            .topbar { padding: 16px 18px; }
            .brand { width: 100%; margin-bottom: 8px; }
            .topbar { align-items: flex-start; flex-direction: column; }
            .page { margin: 24px auto; }
            .hero, .card { padding: 24px 20px; }
        }
    </style>
</head>
<body>
<div class="topbar">
    <div class="brand">Student Portal</div>
    <nav class="nav">
        <a href="<?= base_url('login'); ?>">Log in</a>
    </nav>
</div>

<main class="page">
    <section class="hero">
        <h1>Create an account</h1>
        <p>Join the student portal to manage your account and products.</p>
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
