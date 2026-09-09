<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$is_admin = (($_SESSION['role'] ?? null) === 'admin');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
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
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
            background: #fe9bcf;
            border-bottom: 1px solid rgba(15, 23, 42, .06);
            padding: 18px 28px;
        }
        .brand {
            font-size: .8rem;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: #4b5563;
            font-weight: 700;
        }
        .nav { display: flex; gap: 12px; flex-wrap: wrap; align-items: center; }
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
            max-width: 1100px;
            margin: 42px auto;
            padding: 0 18px 40px;
        }
        .hero {
            background: #fff;
            border: 1px solid rgba(15, 23, 42, .06);
            border-radius: 26px;
            padding: 32px;
            box-shadow: 0 12px 28px rgba(15, 23, 42, .04);
            margin-bottom: 24px;
        }
        .hero h1 {
            margin: 0 0 10px;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
            letter-spacing: -.04em;
            color: #111827;
        }
        .hero p { margin: 0; color: #6b7280; font-size: 1rem; }
        .actions { display: flex; gap: .6rem; align-items: center; flex-wrap: wrap; }
        .btn {
            display: inline-block;
            padding: .65rem 1rem;
            border-radius: 10px;
            font-size: .85rem;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }
        .btn-primary { background: #5a826d; color: #fff; }
        .btn-primary:hover { background: #486b59; }
        .btn-muted { background: #f3f4f6; color: #1f2937; }
        .btn-muted:hover { background: #e5e7eb; }
        .btn-danger { background: #9c4c3e; color: #fff; }
        .btn-danger:hover { background: #803d33; }
        .btn-sm { padding: .4rem .75rem; font-size: .8rem; }
        .msg { padding: .75rem .9rem; border-radius: 10px; font-size: .85rem; margin-bottom: 1.25rem; }
        .msg.success { background: #e3f1e6; color: #356247; }
        .msg.error { background: #fee2e2; color: #991b1b; }
        .panel {
            background: #fff;
            border: 1px solid rgba(15, 23, 42, .06);
            border-radius: 22px;
            padding: 24px 22px;
            box-shadow: 0 10px 22px rgba(15, 23, 42, .03);
            overflow: hidden;
        }
        .student-account {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 24px;
        }
        .account-item {
            background: #fff;
            border: 1px solid rgba(15, 23, 42, .06);
            border-radius: 18px;
            padding: 20px;
            box-shadow: 0 10px 22px rgba(15, 23, 42, .03);
        }
        .account-label {
            display: block;
            color: #6b7280;
            font-size: .72rem;
            letter-spacing: .08em;
            text-transform: uppercase;
            margin-bottom: 8px;
        }
        .account-value {
            color: #111827;
            font-size: 1.05rem;
            font-weight: 700;
            overflow-wrap: anywhere;
        }
        .table-wrap { overflow-x: auto; }
        table { width: 100%; min-width: 780px; border-collapse: collapse; }
        th, td { padding: .9rem 1rem; text-align: left; font-size: .9rem; }
        th {
            background: #faf7ed;
            color: #777363;
            font-size: .72rem;
            letter-spacing: .08em;
            text-transform: uppercase;
            font-weight: 700;
            border-bottom: 1px solid #e1d8c3;
        }
        tbody tr:nth-child(even) { background: #fffdf8; }
        tbody tr:hover { background: #fff7f4; }
        td { border-bottom: 1px solid #f1ece1; color: #394536; }
        td.desc { max-width: 260px; color: #777363; }
        td.numeric { text-align: right; white-space: nowrap; }
        .row-actions { display: flex; gap: .5rem; }
        .empty { padding: 2rem; text-align: center; color: #6b7280; }
        form.inline { display: inline; }
        @media (max-width: 600px) {
            .topbar { padding: 16px 18px; align-items: flex-start; flex-direction: column; }
            .brand { width: 100%; }
            .page { margin: 24px auto; }
            .hero, .panel { padding: 24px 20px; }
            .actions { width: 100%; }
            .student-account { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
<div class="topbar">
    <div class="brand">Student Portal</div>
    <nav class="nav">
        <a href="<?= base_url('student'); ?>">Home</a>
        <a href="<?= base_url('student/profile'); ?>">Student Profile</a>
        <a href="<?= base_url('logout'); ?>">Logout</a>
    </nav>
</div>

<main class="page">
    <section class="hero">
        <h1>Student Portal dashboard</h1>
        <p>Welcome back, <?= htmlspecialchars($_SESSION['username'] ?? 'student'); ?>. Here are your portal resources.</p>
    </section>

    <section class="student-account" aria-label="Logged-in student details">
        <div class="account-item">
            <span class="account-label">Student username</span>
            <span class="account-value"><?= htmlspecialchars($student['username'] ?? $_SESSION['username'] ?? ''); ?></span>
        </div>
        <div class="account-item">
            <span class="account-label">Registered email</span>
            <span class="account-value"><?= htmlspecialchars($student['email'] ?? 'Not available'); ?></span>
        </div>
        <div class="account-item">
            <span class="account-label">Account status</span>
            <span class="account-value"><?= !empty($student['is_active']) ? 'Active student' : 'Inactive account'; ?></span>
        </div>
    </section>

    <section class="panel">
        <div class="topbar" style="background: transparent; border: 0; padding: 0 0 20px;">
            <div>
                <div class="brand">Portal product records</div>
                <div style="margin-top: 6px; color: #6b7280; font-size: .9rem;">
                    Portal account: <strong><?= htmlspecialchars($_SESSION['username'] ?? ''); ?></strong>
                    <?php if (!$is_admin): ?>
                        <span style="background:#f3ead9;color:#5f5648;padding:.15rem .5rem;border-radius:6px;font-size:.75rem;margin-left:.4rem;">view only</span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="actions">
            <?php if ($is_admin): ?>
                <a class="btn btn-primary" href="<?= base_url('products/create'); ?>">+ Add Portal Product</a>
            <?php endif; ?>
            </div>
        </div>

    <?php if (!empty($success)): ?>
        <div class="msg success"><?= htmlspecialchars($success); ?></div>
    <?php endif; ?>
    <?php if (!empty($error)): ?>
        <div class="msg error"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Created</th>
                    <?php if ($is_admin): ?><th>Actions</th><?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td>#<?= htmlspecialchars($product['id']); ?></td>
                            <td><?= htmlspecialchars($product['product_name']); ?></td>
                            <td class="desc"><?= htmlspecialchars($product['description']); ?></td>
                            <td class="numeric">₱<?= number_format((float) $product['price'], 2); ?></td>
                            <td class="numeric"><?= htmlspecialchars($product['quantity']); ?></td>
                            <td><?= htmlspecialchars($product['created_at'] ?? ''); ?></td>
                            <?php if ($is_admin): ?>
                            <td>
                                <div class="row-actions">
                                    <a class="btn btn-muted btn-sm" href="<?= base_url('products/edit/' . $product['id']); ?>">Edit</a>
                                    <form class="inline" method="post" action="<?= base_url('products/delete/' . $product['id']); ?>" onsubmit="return confirm('Delete this product?');">
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="<?= $is_admin ? 7 : 6; ?>" class="empty">
                        <?= $is_admin ? 'No portal products yet. Click "Add Portal Product" to create one.' : 'No portal products yet.'; ?>
                    </td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    </section>
</main>
</body>
</html>
