<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #febcdf;
            color: #3f4635;
        }

        .container {
            width: 94%;
            max-width: 1400px;
            min-height: 600px;
            margin: 40px auto;
            background: #f4efdf;
            border: 12px solid #c8a46b;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.12);
        }

        .content {
            padding: 35px;
        }

        .small-title {
            color: #a88d60;
            font-family: Georgia, serif;
            font-size: 25px;
            font-weight: normal;
        }

        h1 {
            color: #394536;
            font-size: 28px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 18px;
            margin-top: 8px;
        }

        .tools {
            display: flex;
            justify-content: flex-end;
            gap: 8px;
            margin-top: -5px;
            margin-bottom: 25px;
        }

        .search {
            width: 250px;
            padding: 10px 12px;
            border: 1px solid #ddd4be;
            background: #faf7ed;
            color: #555;
            outline: none;
            font-size: 11px;
        }

        .search:focus {
            border-color: #a88d60;
        }

        select {
            padding: 10px 12px;
            border: 1px solid #ddd4be;
            background: #faf7ed;
            color: #777;
            font-size: 11px;
            outline: none;
        }

        .table-panel {
            background: #faf7ed;
            border: 1px solid #e1d8c3;
            box-shadow: 0 5px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            background: #efe5d3;
            color: #7c6d4d;
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-align: left;
            padding: 16px 18px;
            border-bottom: 1px solid #ddcfb0;
        }

        tbody td {
            padding: 18px;
            border-bottom: 1px solid #eee6d5;
            color: #4e4d47;
            font-size: 13px;
        }

        tbody tr:nth-child(even) {
            background: rgba(255, 255, 255, 0.2);
        }

        tbody tr:hover {
            background: rgba(200, 164, 107, 0.06);
        }

        .status-badge {
            display: inline-block;
            padding: 6px 10px;
            border: 1px solid #9c4c3e;
            color: #9c4c3e;
            background: rgba(156, 76, 62, 0.05);
            font-size: 9px;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            font-weight: bold;
        }

        .empty {
            text-align: center;
            padding: 30px 18px;
            color: #666052;
            font-style: italic;
        }

        @media (max-width: 900px) {
            .tools {
                justify-content: flex-start;
                flex-wrap: wrap;
            }

            .search {
                width: 100%;
            }

            select {
                width: 100%;
            }
        }

        @media (max-width: 600px) {
            .container {
                width: 98%;
                border-width: 6px;
                margin: 15px auto;
            }

            .content {
                padding: 20px;
            }

            .small-title {
                font-size: 20px;
            }

            h1 {
                font-size: 18px;
                letter-spacing: 1px;
            }

            thead {
                display: none;
            }

            table, tbody, tr, td {
                display: block;
                width: 100%;
            }

            tbody tr {
                padding: 14px 12px;
                border-bottom: 1px solid #e7dcc1;
            }

            tbody td {
                padding: 8px 0;
                border-bottom: none;
            }

            tbody td::before {
                content: attr(data-label);
                display: block;
                font-size: 10px;
                letter-spacing: 1.5px;
                text-transform: uppercase;
                color: #8a7b60;
                margin-bottom: 4px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="content">
        <div class="small-title">Registered Users</div>
        <h1>Member Directory</h1>

        <div class="tools">
            <input class="search" type="text" placeholder="Search users...">
            <select>
                <option>All Roles</option>
                <option>Admin</option>
                <option>Student</option>
            </select>
        </div>

        <div class="table-panel">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td data-label="ID"><?= html_escape($user['id'] ?? ''); ?></td>
                                <td data-label="First Name"><?= html_escape($user['firstname'] ?? ''); ?></td>
                                <td data-label="Last Name"><?= html_escape($user['lastname'] ?? ''); ?></td>
                                <td data-label="Email"><?= html_escape($user['email'] ?? ''); ?></td>
                                <td data-label="Username"><?= html_escape($user['username'] ?? ''); ?></td>
                                <td data-label="Status"><span class="status-badge">Active</span></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="empty">No users found in the database.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>

