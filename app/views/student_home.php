<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home</title>
    <style>
        /* =========================
   GENERAL
   ========================= */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
    background: #ffffff;
    color: #3f4635;
}


/* =========================
   MAIN CONTAINER
   ========================= */

.container {
    width: 94%;
    max-width: 1400px;
    min-height: 600px;

    margin: 40px auto;

    background: #f4efdf;

    border: 12px solid #c8a46b;

    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.12);
}


/* =========================
   MAIN CONTENT
   ========================= */

.content {
    padding: 35px;
}


/* SMALL HEADER */

.small-title {
    
      color: #a88d60;
    font-family: Georgia, serif;

    font-size: 25px;

    font-weight: normal;


    
}


/* PAGE TITLE */

h1 {
    color: #394536;
  
    font-size: 9px;

    letter-spacing: 2px;

    text-transform: uppercase;

    margin-bottom: 5px;
}


/* =========================
   SEARCH AND FILTERS
   ========================= */

.tools {
    display: flex;

    justify-content: flex-end;

    gap: 8px;

    margin-top: -25px;
    margin-bottom: 25px;
}


/* SEARCH INPUT */

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


/* SELECT */

select {
    padding: 10px 12px;

    border: 1px solid #ddd4be;

    background: #faf7ed;

    color: #777;

    font-size: 11px;

    outline: none;
}


/* =========================
   STUDENT GRID
   ========================= */

.student-grid {
    display: grid;
    grid-template-columns: 1fr;
    justify-items: center;
    gap: 25px;
}


/* =========================
   STUDENT CARD
   ========================= */

.student-card {
    position: relative;
    margin: 0 auto;
    min-height: 250px;
    padding: 28px;
    background: #faf7ed;
    border: 1px solid #e1d8c3;
    box-shadow: 0 5px 12px rgba(0, 0, 0, 0.08);
}


/* STUDENT ID LABEL */

.student-id {
    color: #aa9065;

    font-size: 9px;

    letter-spacing: 2px;

    margin-bottom: 8px;
}


/* STUDENT NAME */

.student-name {
    font-family: Georgia, serif;

    font-size: 21px;

    color: #394536;

    margin-bottom: 5px;
}


/* COURSE */

.course {
    color: #777363;

    font-size: 11px;

    margin-top: 10px;

    margin-bottom: 20px;
}


/* STATUS */

.status {
    position: absolute;

    right: 20px;
    top: 20px;

    border: 2px solid #9c4c3e;

    color: #9c4c3e;

    padding: 4px 9px;

    transform: rotate(-8deg);

    font-size: 8px;

    font-weight: bold;
}


/* =========================
   STUDENT CONTACT
   ========================= */

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



/* =========================
   FILING NOTE
   ========================= */

.note-card {
    position: relative;

    min-height: 250px;

    padding: 28px;

    background: #faf7ed;

    border: 1px solid #e1d8c3;

    box-shadow: 0 5px 12px rgba(0, 0, 0, 0.08);
}


/* NOTE TITLE */

.note-card h3 {
    color: #a88d60;

    font-size: 9px;

    letter-spacing: 2px;

    margin-bottom: 15px;
}


/* NOTE TEXT */

.note-card p {
    font-family: Georgia, serif;

    font-size: 12px;

    line-height: 1.7;

    color: #666052;

    max-width: 90%;
}


/* NOTE FOOTER */

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


/* =========================
   RESPONSIVE DESIGN
   ========================= */

@media (max-width: 900px) {

    .student-grid {
        grid-template-columns: 1fr;
    }

    .tools {
        margin-top: 20px;

        justify-content: flex-start;

        flex-wrap: wrap;
    }

    .navbar {
        height: auto;

        flex-wrap: wrap;
    }

    .brand {
        width: 100%;
    }

    .nav-item {
        padding: 15px;
    }

    .enroll-btn {
        margin: 10px;
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

    .search {
        width: 100%;
    }

    .tools {
        flex-direction: column;
    }

    select {
        width: 100%;
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
             backdrop-filter: blur(12px);
            color: #1f2937;
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
        .page {
            max-width: 1100px;
            margin: 42px auto;
            padding: 0 18px 40px;
        }
        .hero {
            background: #fff;
            border: 1px solid rgba(15, 23, 42, 0.06);
            border-radius: 26px;
            padding: 32px;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.04);
            margin-bottom: 24px;
        }
        .hero h1 {
            margin: 0 0 10px;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
            letter-spacing: -0.04em;
            color: #111827;
        }
        .hero p {
            margin: 0;
            color: #6b7280;
            font-size: 1rem;
        }
        .grid {
            display: grid;
            gap: 18px;
        }
        .card {
            background: #fff;
            border: 1px solid rgba(15, 23, 42, 0.06);
            border-radius: 18px;
            padding: 22px 20px;
            box-shadow: 0 10px 22px rgba(15, 23, 42, 0.03);
        }
        .combined-card {
            display: grid;
            gap: 16px;
        }
        .combined-card > div {
            width: 100%;
        }
        .mini-row {
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
        }
        .mini-row > div {
            flex: 1 1 140px;
        }
        .label {
            display: block;
            font-size: 0.72rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #6b7280;
            margin-bottom: 8px;
        }
        .value {
            display: block;
            font-size: 1.16rem;
            font-weight: 700;
            color: #111827;
        }
        .panel {
            margin-top: 24px;
            background: #fff;
            border: 1px solid rgba(15, 23, 42, 0.06);
            border-radius: 22px;
            padding: 24px 22px;
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

        <!-- MAIN CONTENT -->
        <main class="content">

            <div class="small-title">
               Hello, welcome to your student dashboard!
            </div>

            <h1>
                Here's a quick overview of your student dashboard
            </h1>


            <!-- SEARCH AND FILTERS -->
            <div class="tools">

                <input
                    type="text"
                    class="search"
                    placeholder="🔍 Search by name or ID..."
                >

                <select>
                    <option>All Grades</option>
                    <option>1st Year</option>
                    <option>2nd Year</option>
                    <option>3rd Year</option>
                    <option>4th Year</option>
                </select>


            </div>


            <!-- STUDENT INFORMATION -->
            <div class="student-grid">

                <!-- STUDENT CARD -->
                <div class="student-card">

                    <div class="student-id">
                        STUDENT ID
                    </div>

                    <div class="student-name">
                        MCC2024-00127
                    </div>

                    <div class="student-name">
                        Khate Lyn M. De Leon
                    </div>

                    <div class="course">
                        BS Information Technology – 3rd Year, Section F3
                    </div>

                    <!-- CONTACT INFORMATION -->
                    <div class="student-info">

                        <div>
                            <strong>Email:</strong>
                            khatelyndeleon@gmail.com
                        </div>

                        <div>
                            <strong>Contact No:</strong>
                            +63 912 996 3316
                        </div>

                    </div>

                    <div class="note-card" style="margin-top: 18px; min-height: 0; padding: 18px;">
                        <h3>
                            Profile Description
                        </h3>

                        <p>
                           A creative and curious IT student who enjoys turning ideas into something meaningful through technology and design. Passionate about video editing, content creation, and UI/UX design, with a love for discovering new places, watching movies, and exploring new experiences. Always eager to learn, create, and take on new challenges that inspire growth and
                        </p>
                    </div>

                </div>

            </div>

        </main>

    </div>

    </div>
</body>
</html>