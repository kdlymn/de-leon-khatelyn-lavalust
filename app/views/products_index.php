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
        .role-badge {
            display: inline-block;
            padding: 4px 9px;
            border-radius: 999px;
            font-size: .7rem;
            font-weight: 700;
            letter-spacing: .05em;
            text-transform: uppercase;
        }
        .role-badge.admin { background: #f7dfb0; color: #805b18; }
        .role-badge.student { background: #e3f1e6; color: #356247; }
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
        <p>
            Welcome back, <?= htmlspecialchars($_SESSION['username'] ?? 'student'); ?>.
            You are signed in as
            <span class="role-badge <?= $is_admin ? 'admin' : 'student'; ?>">
                <?= $is_admin ? 'Admin' : 'Student'; ?>
            </span>.
        </p>
    </section>

    <section class="panel">
        <div class="topbar" style="background: transparent; border: 0; padding: 0 0 20px;">
            <div>
                <div class="brand">Registered student records</div>
                <div style="margin-top: 6px; color: #6b7280; font-size: .9rem;">
                    Students who have logged in or registered are listed below.
                </div>
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
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Registered</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($students)): ?>
                    <?php foreach ($students as $registered_student): ?>
                        <tr>
                            <td>#<?= htmlspecialchars($registered_student['id'] ?? ''); ?></td>
                            <td><?= htmlspecialchars($registered_student['username'] ?? ''); ?></td>
                            <td class="desc"><?= htmlspecialchars($registered_student['email'] ?? ''); ?></td>
                            <?php $registered_role = ($registered_student['role'] ?? 'user') === 'user' ? 'Student' : ($registered_student['role'] ?? ''); ?>
                            <td><span class="role-badge <?= strtolower($registered_role) === 'admin' ? 'admin' : 'student'; ?>"><?= htmlspecialchars($registered_role); ?></span></td>
                            <td><?= !empty($registered_student['is_active']) ? 'Active' : 'Inactive'; ?></td>
                            <td><?= htmlspecialchars($registered_student['created_at'] ?? ''); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="6" class="empty">
                        No students have registered yet.
                    </td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    </section>
</main>
</body>
</html>
