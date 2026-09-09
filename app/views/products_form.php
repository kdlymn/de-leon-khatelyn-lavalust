<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$is_edit = ($mode === 'edit');
$form_action = $is_edit ? base_url('products/edit/' . $product['id']) : base_url('products/create');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $is_edit ? 'Edit Product' : 'Add Product'; ?> | Product Manager</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background-color: #fff4f7;
            background-image: linear-gradient(rgba(194, 85, 122, .035) 1px, transparent 1px), linear-gradient(90deg, rgba(194, 85, 122, .035) 1px, transparent 1px);
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
            gap: 16px;
        }
        .brand {
            color: #172033;
            font-size: .8rem;
            font-weight: 700;
            letter-spacing: .14em;
            text-transform: uppercase;
        }
        .brand::before { content: ''; display: inline-block; width: 9px; height: 9px; margin-right: 9px; background: #d28b55; border-radius: 2px; }
        .nav { display: flex; gap: 12px; flex-wrap: wrap; }
        .nav a {
            color: #1f2937;
            font-weight: 600;
            padding: 10px 14px;
            border-radius: 8px;
            text-decoration: none;
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
        .hero p { margin: 0; color: #627083; font-size: 1rem; }
        .topline { display: flex; align-items: center; justify-content: space-between; gap: 12px; margin-bottom: 1.5rem; }
        .topline h2 { margin: 0; color: #172033; font-size: 1.2rem; }
        a.back { font-size: .85rem; color: #c2557a; text-decoration: none; font-weight: 600; }
        label {
            display: block;
            font-size: .72rem;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: #627083;
            margin-bottom: 8px;
        }
        input, textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d9e0e8;
            border-radius: 8px;
            background: #ffffff;
            color: #172033;
            font-size: .95rem;
            margin-bottom: 18px;
            font-family: inherit;
        }
        textarea { resize: vertical; min-height: 110px; }
        input:focus, textarea:focus { outline: none; border-color: #c2557a; box-shadow: 0 0 0 3px rgba(194, 85, 122, .1); }
        .row { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }
        button {
            width: 100%;
            padding: 12px 16px;
            background: #c2557a;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: .95rem;
            font-weight: 600;
            cursor: pointer;
        }
        button:hover { background: #a94465; }
        .msg.error, .msg.success { padding: 12px 14px; border-radius: 10px; font-size: .85rem; margin-bottom: 18px; }
        .msg.error { background: #fee2e2; color: #991b1b; }
        .msg.success { background: #e3f1e6; color: #356247; }
        @media (max-width: 600px) {
            .topbar { align-items: flex-start; flex-direction: column; padding: 16px 18px; }
            .page { margin: 24px auto; }
            .hero, .card { padding: 24px 20px; }
            .topline, .row { grid-template-columns: 1fr; flex-direction: column; align-items: flex-start; }
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
    <div style="color:#c2557a;font-size:.72rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;margin-bottom:12px;">Inventory workspace</div>
    <h1><?= $is_edit ? 'Update product' : 'Add a product'; ?></h1>
    <p><?= $is_edit ? 'Keep the product inventory details current.' : 'Add a new item to the product inventory.'; ?></p>
</section>

<section class="card">
    <div class="topline">
        <h2><?= $is_edit ? 'Edit Product' : 'Product details'; ?></h2>
        <a class="back" href="<?= base_url('products'); ?>">&larr; Back to list</a>
    </div>

    <?php if (!empty($error)): ?>
        <div class="msg error"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div class="msg success"><?= htmlspecialchars($success); ?></div>
        <?php endif; ?>

    <form method="post" action="<?= $form_action; ?>">
        <label for="product_name">Product Name</label>
        <input type="text" id="product_name" name="product_name" maxlength="100" required
               value="<?= htmlspecialchars($product['product_name'] ?? ''); ?>" autofocus>

        <label for="description">Description</label>
        <textarea id="description" name="description"><?= htmlspecialchars($product['description'] ?? ''); ?></textarea>

        <div class="row">
            <div>
                <label for="price">Price</label>
                <input type="number" id="price" name="price" step="0.01" min="0" required
                       value="<?= htmlspecialchars($product['price'] ?? ''); ?>">
            </div>
            <div>
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" step="1" min="0" required
                       value="<?= htmlspecialchars($product['quantity'] ?? ''); ?>">
            </div>
        </div>

        <button type="submit"><?= $is_edit ? 'Save Changes' : 'Add Product'; ?></button>
    </form>
</div>
</section>
</main>
</body>
</html>
