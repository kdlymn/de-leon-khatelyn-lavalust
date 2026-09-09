<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$is_admin = (($_SESSION['role'] ?? null) === 'admin');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | Product Manager</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f4f6f8;
            color: #1f2937;
            min-height: 100vh;
        }
        .topbar {
            background: #ffffff;
            border-bottom: 1px solid #e5e9ef;
            padding: 18px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }
        .brand {
            color: #172033;
            font-size: .8rem;
            font-weight: 700;
            letter-spacing: .14em;
            text-transform: uppercase;
        }
        .nav { display: flex; gap: 12px; flex-wrap: wrap; }
        .nav a {
            color: #1f2937;
            font-weight: 600;
            padding: 10px 14px;
            border-radius: 8px;
            text-decoration: none;
        }
        .nav a:hover { background: #eef3f2; color: #0f766e; }
        .page { max-width: 1100px; margin: 48px auto; padding: 0 20px 40px; }
        .hero, .panel {
            background: #fff;
            border: 1px solid #e3e8ee;
            border-radius: 12px;
            box-shadow: 0 12px 32px rgba(23, 32, 51, .06);
        }
        .hero { padding: 30px 28px; margin-bottom: 18px; }
        .hero h1 { margin: 0 0 10px; font-size: clamp(1.9rem, 4vw, 2.5rem); color: #172033; letter-spacing: -.02em; }
        .hero p { margin: 0; color: #627083; font-size: 1rem; }
        .actions { display: flex; gap: .6rem; align-items: center; }
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
        .btn-primary { background: #0f766e; color: #fff; }
        .btn-primary:hover { background: #0b5f59; }
        .btn-muted { background: #f3f4f6; color: #1f2937; }
        .btn-muted:hover { background: #e5e7eb; }
        .btn-danger { background: #9c4c3e; color: #fff; }
        .btn-danger:hover { background: #803d33; }
        .btn-sm { padding: .4rem .75rem; font-size: .8rem; }
        .msg { padding: .7rem .9rem; border-radius: 8px; font-size: .85rem; margin-bottom: 1.25rem; }
        .msg.success { background: #dcfce7; color: #166534; }
        .msg.error { background: #fee2e2; color: #991b1b; }
        .panel {
            padding: 24px 22px;
            overflow: hidden;
        }
        .panel-header { display: flex; justify-content: space-between; align-items: center; gap: 16px; margin-bottom: 20px; }
        .panel-title { color: #172033; font-size: .8rem; font-weight: 700; letter-spacing: .14em; text-transform: uppercase; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: .85rem 1.1rem; text-align: left; font-size: .9rem; }
        th { background: #faf7ed; color: #777363; font-size: .72rem; letter-spacing: .08em; text-transform: uppercase; border-bottom: 1px solid #e1d8c3; }
        tbody tr:nth-child(even) { background: #fffdf8; }
        tbody tr:hover { background: #fff7f4; }
        td { border-bottom: 1px solid #e8edf2; color: #263247; }
        td.desc { max-width: 260px; color: #627083; }
        td.numeric { text-align: right; white-space: nowrap; }
        .row-actions { display: flex; gap: .5rem; }
        .empty { padding: 2rem; text-align: center; color: #6b7280; }
        form.inline { display: inline; }
        @media (max-width: 600px) {
            .topbar { padding: 16px 20px; align-items: flex-start; flex-direction: column; }
            .page { margin: 24px auto; }
            .hero, .panel { padding: 24px 20px; }
            .panel-header { align-items: flex-start; flex-direction: column; }
        }
    </style>
</head>
<body>
<div class="topbar">
    <div class="brand">Product Manager</div>
    <nav class="nav">
        <a href="<?= base_url('products'); ?>">Products</a>
        <a href="<?= base_url('logout'); ?>">Logout</a>
    </nav>
</div>

<main class="page">
    <section class="hero">
        <h1>Product inventory</h1>
        <p>Manage products and keep your inventory details up to date.</p>
    </section>

    <section class="panel">
        <div class="panel-header">
            <div>
                <div class="panel-title">Product records</div>
                <div style="margin-top: 6px; color: #6b7280; font-size: .9rem;">
                    Signed in as <strong><?= htmlspecialchars($_SESSION['username'] ?? ''); ?></strong>
                    <?php if (!$is_admin): ?>
                        <span style="background:#f3ead9;color:#5f5648;padding:.15rem .5rem;border-radius:6px;font-size:.75rem;margin-left:.4rem;">view only</span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="actions">
            <span style="font-size:.85rem;color:#6b7280;">
            </span>
            <?php if ($is_admin): ?>
                <a class="btn btn-primary" href="<?= base_url('products/create'); ?>">+ Add Product</a>
            <?php endif; ?>
            </div>
        </div>

    <?php if (!empty($success)): ?>
        <div class="msg success"><?= htmlspecialchars($success); ?></div>
    <?php endif; ?>
    <?php if (!empty($error)): ?>
        <div class="msg error"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>

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
                        <?= $is_admin ? 'No products yet. Click "Add Product" to create one.' : 'No products yet.'; ?>
                    </td></tr>
                <?php endif; ?>
            </tbody>
        </table>
</section>
</main>
</body>
</html>
