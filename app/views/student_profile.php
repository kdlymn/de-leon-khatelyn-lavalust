<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <style>
       

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
            font-size: 9px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .student-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            margin-top: 20px;
        }

        .student-card {
            position: relative;
            min-height: 250px;
            padding: 28px;
            background: #faf7ed;
            border: 1px solid #e1d8c3;
            box-shadow: 0 5px 12px rgba(0, 0, 0, 0.08);
        }

        .student-id {
            color: #aa9065;
            font-size: 9px;
            letter-spacing: 2px;
            margin-bottom: 8px;
        }

        .student-name {
            font-family: Georgia, serif;
            font-size: 21px;
            color: #394536;
            margin-bottom: 5px;
        }

        .course {
            color: #777363;
            font-size: 11px;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .student-info {
            border-top: 1px dashed #cfc5ae;
            padding-top: 15px;
            line-height: 2;
            font-size: 11px;
            color: #555448;
        }

        .student-info strong {
            color: #777363;
        }

        .note-card {
            position: relative;
            min-height: 250px;
            padding: 28px;
            background: #faf7ed;
            border: 1px solid #e1d8c3;
            box-shadow: 0 5px 12px rgba(0, 0, 0, 0.08);
        }

        .note-card h3 {
            color: #a88d60;
            font-size: 9px;
            letter-spacing: 2px;
            margin-bottom: 15px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            padding: 8px 0;
            border-bottom: 1px dashed #d5cab0;
            font-size: 11px;
            color: #555448;
        }

        .detail-row strong {
            color: #777363;
        }

        .tag-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 12px;
        }

        .tag {
            padding: 6px 10px;
            background: #f3ead9;
            border: 1px solid #dccaa3;
            border-radius: 999px;
            color: #5f5648;
            font-size: 10px;
            font-weight: bold;
        }

        .note-footer {
            position: absolute;
            bottom: 20px;
            left: 28px;
            width: calc(100% - 56px);
            padding-top: 12px;
            border-top: 1px dashed #cfc5ae;
            font-size: 9px;
            color: #88816f;
        }

        .social-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            color: #fff;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            margin-left: 8px;
        }

        .social-link.facebook {
            background: #1877f2;
        }

        .social-link.instagram {
            background: linear-gradient(135deg, #f58529, #dd2a7b, #8134af, #515bd4);
        }

        .social-link.email {
            background: #b9a67a;
        }

        .social-link.github {
            background: #1f2937;
        }

        @media (max-width: 900px) {
            .student-grid {
                grid-template-columns: 1fr;
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

            .student-card,
            .note-card {
                padding: 20px;
            }
        }

        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #febcdf;
            color: #111827;
        }
        .topbar {
            background: #fe9bcf;
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(15, 23, 42, 0.06);
            padding: 18px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
         .brand {
            font-size: 0.8rem;
            letter-spacing: 0.14em;
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
            transition: 0.2s ease;
        }
        .nav a:hover {
            background: #5a826d;
        }
       
    </style>
</head>
<body>
    <div class="topbar">
        <div class="brand">Student Portal</div>
        <nav class="nav">
            <a href="<?=site_url('student');?>">Home</a>
            <a href="<?=site_url('student/profile');?>">Student Profile</a>
        </nav>
    </div>

   <div class="container">
        <div class="content">
            <div class="small-title">Student Information</div>
            <h1></h1>

            <div class="student-grid">
                <div class="student-card">
                
                    <div class="student-name"><?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></div>
                    <div class="student-info">
                        <div><strong>Student ID:</strong> <?php echo htmlspecialchars($student_id, ENT_QUOTES, 'UTF-8'); ?></div>
                    </div>

                    <h3 style="color: #a88d60; font-size: 9px; letter-spacing: 2px; margin: 18px 0 12px;">Academic Record</h3>

                    <div class="detail-row">
                        <span><strong>Course</strong></span>
                        <span><?php echo htmlspecialchars($course, ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>
                    <div class="detail-row">
                        <span><strong>Year</strong></span>
                        <span><?php echo htmlspecialchars($year, ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>
                    <div class="detail-row">
                        <span><strong>Section</strong></span>
                        <span><?php echo htmlspecialchars($section, ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>
                    <div class="detail-row">
                        <span><strong>Skills</strong></span>
                        <span><?php echo count($skills); ?> listed</span>
                    </div>

                    <div class="tag-list">
                        <?php foreach ($skills as $skill): ?>
                            <span class="tag"><?php echo htmlspecialchars($skill, ENT_QUOTES, 'UTF-8'); ?></span>
                        <?php endforeach; ?>
                    </div>

                    <div class="detail-row" style="margin-top: 18px;">
                        <span><strong>Hobbies</strong></span>
                        <span><?php echo count($hobbies); ?> listed</span>
                    </div>

                    <div class="tag-list">
                        <?php foreach ($hobbies as $hobby): ?>
                            <span class="tag"><?php echo htmlspecialchars($hobby, ENT_QUOTES, 'UTF-8'); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="note-card">
                    <h3>Contact Information</h3>

                    <div class="detail-row">
                        <span><strong>Email</strong></span>
                        <span><?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>
                    <div class="detail-row">
                        <span><strong>Contact</strong></span>
                        <span><?php echo htmlspecialchars($contact_number, ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>
                    <div class="detail-row">
                        <span><strong>Address</strong></span>
                        <span><?php echo htmlspecialchars($address, ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>

                    <div class="detail-row" style="margin-top: 18px; align-items: center;">
                        <span><strong>Social Media</strong></span>
                        <span style="display: flex; align-items: center; gap: 8px;">
                            <a class="social-link email" href="mailto:khatelyndeleon@gmail.com" aria-label="Email">@</a>
                            <a class="social-link facebook" href="https://www.facebook.com/share/1LkCUPYtTT/" target="_blank" rel="noopener noreferrer" aria-label="Facebook">f</a>
                            <a class="social-link instagram" href="https://www.instagram.com/kdlynm_?igsi=MXJxdTl6NjhuNDVtbg==" target="_blank" rel="noopener noreferrer" aria-label="Instagram">◎</a>
                            <a class="social-link github" href="https://github.com/kdlymn" target="_blank" rel="noopener noreferrer" aria-label="GitHub">G</a>
                        </span>
                    </div>
                </div>
            </div>
</body>
</html>