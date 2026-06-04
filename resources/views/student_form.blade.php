<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Southern de Oro Philippines College Student  — Add Student</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,200;0,9..40,400;0,9..40,500;0,9..40,700;1,9..40,400&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.1/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.1/js/all.min.js"></script>
    <style>
        :root {
            --bg: #0a0f0d;
            --bg-panel: #0f1a15;
            --card: #121f19;
            --card-hover: #17281f;
            --border: #1e3a2c;
            --border-focus: #2dd4a0;
            --fg: #e8f5ee;
            --fg-muted: #7a9e8c;
            --accent: #2dd4a0;
            --accent-dim: rgba(45, 212, 160, 0.12);
            --accent-glow: rgba(45, 212, 160, 0.25);
            --gold: #e8c468;
            --gold-dim: rgba(232, 196, 104, 0.12);
            --error: #f87171;
            --error-dim: rgba(248, 113, 113, 0.1);
            --success: #34d399;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--fg);
            min-height: 100vh;
            overflow-x: hidden;
        }
        .font-display { font-family: 'Playfair Display', serif; }

        .blob {
            position: absolute; border-radius: 50%; filter: blur(100px); opacity: 0.4;
            animation: blobFloat 12s ease-in-out infinite alternate;
        }
        .blob-1 { width: 400px; height: 400px; background: radial-gradient(circle, rgba(45,212,160,0.3), transparent); top: -100px; left: -100px; }
        .blob-2 { width: 300px; height: 300px; background: radial-gradient(circle, rgba(232,196,104,0.2), transparent); bottom: -50px; right: -50px; animation-delay: -4s; }
        .blob-3 { width: 250px; height: 250px; background: radial-gradient(circle, rgba(45,212,160,0.15), transparent); top: 50%; left: 30%; animation-delay: -8s; }
        @keyframes blobFloat {
            0% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -20px) scale(1.05); }
            66% { transform: translate(-20px, 30px) scale(0.95); }
            100% { transform: translate(15px, 15px) scale(1.02); }
        }

        .grid-pattern {
            position: absolute; inset: 0;
            background-image: linear-gradient(rgba(45,212,160,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(45,212,160,0.03) 1px, transparent 1px);
            background-size: 60px 60px;
            mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 30%, transparent 70%);
        }

        .particle {
            position: absolute; width: 3px; height: 3px; background: var(--accent); border-radius: 50%; opacity: 0;
            animation: particleRise 6s ease-in-out infinite;
        }
        @keyframes particleRise {
            0% { opacity: 0; transform: translateY(0) scale(0); }
            20% { opacity: 0.8; transform: translateY(-30px) scale(1); }
            80% { opacity: 0.4; transform: translateY(-120px) scale(0.6); }
            100% { opacity: 0; transform: translateY(-160px) scale(0); }
        }

        .form-input {
            width: 100%; background: var(--card); border: 1.5px solid var(--border); color: var(--fg);
            padding: 13px 16px; border-radius: 12px; font-size: 15px; font-family: 'DM Sans', sans-serif;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); outline: none;
        }
        .form-input::placeholder { color: var(--fg-muted); opacity: 0.6; }
        .form-input:hover { border-color: rgba(45,212,160,0.3); background: var(--card-hover); }
        .form-input:focus { border-color: var(--border-focus); box-shadow: 0 0 0 3px var(--accent-dim), 0 0 20px var(--accent-dim); background: var(--card-hover); }
        .form-input.error { border-color: var(--error); box-shadow: 0 0 0 3px var(--error-dim); }
        .form-input.error:focus { border-color: var(--error); box-shadow: 0 0 0 3px var(--error-dim), 0 0 20px var(--error-dim); }

        .form-label {
            display: block; font-size: 13px; font-weight: 500; color: var(--fg-muted);
            margin-bottom: 8px; letter-spacing: 0.5px; text-transform: uppercase; transition: color 0.3s;
        }
        .form-group:focus-within .form-label { color: var(--accent); }
        .form-group.has-error .form-label { color: var(--error); }

        .error-msg {
            font-size: 12px; color: var(--error); display: flex; align-items: center; gap: 4px;
            opacity: 0; transform: translateY(-4px); transition: all 0.25s ease; height: 0; overflow: hidden;
        }
        .error-msg.visible { opacity: 1; transform: translateY(0); height: auto; margin-top: 6px; }

        .optional-badge {
            font-size: 10px; font-weight: 400; text-transform: lowercase; letter-spacing: 0.5px;
            background: var(--accent-dim); color: var(--accent); padding: 2px 8px; border-radius: 20px; margin-left: 6px;
        }

        .btn-submit {
            width: 100%; padding: 16px 24px; background: linear-gradient(135deg, var(--accent), #1aac82); color: var(--bg);
            font-family: 'DM Sans', sans-serif; font-size: 16px; font-weight: 700; letter-spacing: 0.5px;
            border: none; border-radius: 12px; cursor: pointer; position: relative; overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .btn-submit::before {
            content: ''; position: absolute; inset: 0;
            background: linear-gradient(135deg, transparent, rgba(255,255,255,0.15));
            opacity: 0; transition: opacity 0.3s;
        }
        .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 8px 30px rgba(45,212,160,0.3), 0 0 60px rgba(45,212,160,0.1); }
        .btn-submit:hover::before { opacity: 1; }
        .btn-submit:active { transform: translateY(0); box-shadow: 0 4px 15px rgba(45,212,160,0.2); }
        .btn-submit:disabled { opacity: 0.6; cursor: not-allowed; transform: none; box-shadow: none; }

        .spinner {
            display: inline-block; width: 18px; height: 18px;
            border: 2.5px solid rgba(10,15,13,0.3); border-top-color: var(--bg);
            border-radius: 50%; animation: spin 0.7s linear infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        .toast-container { position: fixed; top: 24px; right: 24px; z-index: 9999; display: flex; flex-direction: column; gap: 12px; }
        .toast {
            background: var(--card); border: 1px solid var(--border); border-radius: 14px; padding: 16px 20px;
            display: flex; align-items: center; gap: 12px; box-shadow: 0 20px 60px rgba(0,0,0,0.5);
            transform: translateX(120%); transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1); min-width: 320px;
        }
        .toast.show { transform: translateX(0); }
        .toast.success { border-left: 3px solid var(--success); }
        .toast.error { border-left: 3px solid var(--error); }

        .deco-line { width: 40px; height: 3px; border-radius: 3px; background: linear-gradient(90deg, var(--accent), var(--gold)); }

        /* Course cards */
        .course-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; }
        .course-card {
            padding: 12px 8px; background: var(--card); border: 1.5px solid var(--border); border-radius: 10px;
            text-align: center; cursor: pointer; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative; overflow: hidden;
        }
        .course-card::before {
            content: ''; position: absolute; inset: 0;
            background: linear-gradient(135deg, var(--accent-dim), transparent);
            opacity: 0; transition: opacity 0.3s;
        }
        .course-card:hover { border-color: rgba(45,212,160,0.3); transform: translateY(-2px); }
        .course-card:hover::before { opacity: 1; }
        .course-card.selected { border-color: var(--accent); background: var(--accent-dim); box-shadow: 0 0 20px var(--accent-dim); }
        .course-card.selected::before { opacity: 1; }
        .course-card .course-code { font-size: 13px; font-weight: 700; color: var(--fg); position: relative; z-index: 1; }
        .course-card .course-full { font-size: 9px; color: var(--fg-muted); margin-top: 3px; position: relative; z-index: 1; line-height: 1.2; }
        .course-card.selected .course-code { color: var(--accent); }
        .course-card .check-icon {
            position: absolute; top: 6px; right: 6px; width: 16px; height: 16px; border-radius: 50%;
            background: var(--accent); display: flex; align-items: center; justify-content: center;
            opacity: 0; transform: scale(0); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); z-index: 2;
        }
        .course-card.selected .check-icon { opacity: 1; transform: scale(1); }

        /* Year level cards */
        .year-grid { display: flex; gap: 10px; flex-wrap: wrap; }
        .year-card {
            flex: 1 1 calc(25% - 10px); min-width: 70px; padding: 12px 6px; background: var(--card);
            border: 1.5px solid var(--border); border-radius: 10px; text-align: center; cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden;
        }
        .year-card::before {
            content: ''; position: absolute; inset: 0;
            background: linear-gradient(135deg, var(--gold-dim), transparent);
            opacity: 0; transition: opacity 0.3s;
        }
        .year-card:hover { border-color: rgba(232,196,104,0.3); transform: translateY(-2px); }
        .year-card:hover::before { opacity: 1; }
        .year-card.selected { border-color: var(--gold); background: var(--gold-dim); box-shadow: 0 0 20px rgba(232,196,104,0.1); }
        .year-card.selected::before { opacity: 1; }
        .year-card .year-label { font-size: 13px; font-weight: 700; color: var(--fg); position: relative; z-index: 1; }
        .year-card.selected .year-label { color: var(--gold); }
        .year-card .year-sub { font-size: 9px; color: var(--fg-muted); margin-top: 2px; position: relative; z-index: 1; }
        .year-card .check-icon {
            position: absolute; top: 5px; right: 5px; width: 14px; height: 14px; border-radius: 50%;
            background: var(--gold); display: flex; align-items: center; justify-content: center;
            opacity: 0; transform: scale(0); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); z-index: 2;
        }
        .year-card.selected .check-icon { opacity: 1; transform: scale(1); }

        .year-placeholder {
            padding: 20px; text-align: center; color: var(--fg-muted); font-size: 13px;
            border: 1.5px dashed var(--border); border-radius: 12px;
        }

        .floating-shape {
            position: absolute; border: 1.5px solid rgba(45,212,160,0.15); border-radius: 12px;
            animation: shapeFloat 8s ease-in-out infinite alternate;
        }
        @keyframes shapeFloat { 0% { transform: rotate(0deg) translateY(0); } 100% { transform: rotate(5deg) translateY(-15px); } }

        .success-overlay {
            position: fixed; inset: 0; background: rgba(10,15,13,0.92); backdrop-filter: blur(10px);
            display: flex; align-items: center; justify-content: center; z-index: 9998;
            opacity: 0; pointer-events: none; transition: opacity 0.4s ease;
        }
        .success-overlay.visible { opacity: 1; pointer-events: all; }
        .success-content { text-align: center; transform: scale(0.9); transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
        .success-overlay.visible .success-content { transform: scale(1); }
        .success-icon-ring {
            width: 100px; height: 100px; border-radius: 50%; border: 3px solid var(--accent);
            display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;
            animation: ringPulse 2s ease-in-out infinite;
        }
        @keyframes ringPulse { 0%, 100% { box-shadow: 0 0 0 0 var(--accent-glow); } 50% { box-shadow: 0 0 0 15px transparent; } }

        /* Section divider */
        .section-divider { display: flex; align-items: center; gap: 12px; margin: 28px 0 20px; }
        .section-divider::before, .section-divider::after { content: ''; flex: 1; height: 1px; background: var(--border); }
        .section-divider .section-icon {
            width: 28px; height: 28px; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;
        }
        .section-divider .section-text { font-size: 13px; font-weight: 600; white-space: nowrap; letter-spacing: 0.3px; }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--bg); }
        ::-webkit-scrollbar-thumb { background: var(--border); border-radius: 3px; }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20% { transform: translateX(-8px); }
            40% { transform: translateX(8px); }
            60% { transform: translateX(-4px); }
            80% { transform: translateX(4px); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(16px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 1024px) {
            .split-layout { flex-direction: column !important; }
            .left-panel { display: none !important; }
            .right-panel { min-height: 100vh !important; }
        }
        @media (max-width: 640px) {
            .course-grid { grid-template-columns: repeat(2, 1fr); }
            .year-card { flex: 1 1 calc(50% - 10px); }
            .name-row { flex-direction: column !important; }
        }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { animation-duration: 0.01ms !important; transition-duration: 0.01ms !important; }
        }
    </style>
</head>
<body>

    <!-- Toast Container -->
    <div class="toast-container" id="toastContainer"></div>

    <!-- Success Overlay -->
    <div class="success-overlay" id="successOverlay">
        <div class="success-content">
            <div class="success-icon-ring">
                <i class="fas fa-check" style="font-size: 40px; color: var(--accent);"></i>
            </div>
            <h2 class="font-display" style="font-size: 32px; font-weight: 900; color: var(--fg); margin-bottom: 8px;">Student Added</h2>
            <p style="color: var(--fg-muted); font-size: 15px; max-width: 360px; margin: 0 auto 8px;" id="successMsg"></p>
            <p style="color: var(--gold); font-size: 13px; margin-bottom: 32px;" id="successCourse"></p>
            <div style="display:flex; gap:12px; justify-content:center;">
                <button onclick="resetForm()" style="padding: 12px 32px; background: var(--accent-dim); border: 1.5px solid var(--accent); color: var(--accent); border-radius: 10px; font-family: 'DM Sans', sans-serif; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.3s;">
                    Add Another Student
                </button>
                <a href="{{ route('students.index') }}" style="padding: 12px 32px; background: linear-gradient(135deg, var(--accent), #1aac82); color: var(--bg); border-radius: 10px; font-family: 'DM Sans', sans-serif; font-size: 14px; font-weight: 700; display:inline-flex; align-items:center; gap:8px; text-decoration:none;">
                    <i class="fas fa-list"></i> View Students
                </a>
            </div>
        </div>
    </div>

    <!-- Main Layout -->
    <div class="split-layout" style="display: flex; min-height: 100vh;">

        <!-- Left Decorative Panel -->
        <aside class="left-panel" style="width: 40%; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; padding: 48px; background: var(--bg-panel);">
            <div class="blob blob-1"></div>
            <div class="blob blob-2"></div>
            <div class="blob blob-3"></div>
            <div class="grid-pattern"></div>
            <div class="floating-shape" style="width: 80px; height: 80px; top: 15%; left: 12%; animation-delay: -2s;"></div>
            <div class="floating-shape" style="width: 50px; height: 50px; bottom: 25%; right: 18%; animation-delay: -5s; border-radius: 50%;"></div>
            <div class="floating-shape" style="width: 120px; height: 60px; bottom: 15%; left: 20%; animation-delay: -3s;"></div>
            <div id="particleContainer" style="position: absolute; inset: 0; pointer-events: none;"></div>

            <div style="position: relative; z-index: 2; max-width: 400px;">
                <div style="width: 56px; height: 56px; border-radius: 14px; background: linear-gradient(135deg, var(--accent), #1aac82); display: flex; align-items: center; justify-content: center; margin-bottom: 32px; box-shadow: 0 8px 30px rgba(45,212,160,0.25);">
                    <i class="fas fa-graduation-cap" style="font-size: 24px; color: var(--bg);"></i>
                </div>
                <div class="deco-line" style="margin-bottom: 24px;"></div>
                <h1 class="font-display" style="font-size: 46px; font-weight: 900; line-height: 1.1; margin-bottom: 20px;">
                    Begin Your<br>
                    <span style="background: linear-gradient(135deg, var(--accent), var(--gold)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Academic Journey</span>
                </h1>
                <p style="font-size: 16px; color: var(--fg-muted); line-height: 1.7; margin-bottom: 40px;">
                    Enroll students and manage academic records with ease. Add a new student to get started.
                </p>
                <div style="display: flex; gap: 32px;">
                    <div style="display: grid; gap: 8px; align-items: center; justify-items: center; text-align: center;">
                        <i class="fas fa-layer-group" style="font-size: 20px; color: var(--accent);"></i>
                        <div style="font-size: 28px; font-weight: 700; color: var(--accent);" class="font-display">6</div>
                        <div style="font-size: 12px; color: var(--fg-muted); text-transform: uppercase; letter-spacing: 1px;">Programs</div>
                    </div>
                    <div style="display: grid; gap: 8px; align-items: center; justify-items: center; text-align: center;">
                        <i class="fas fa-users" style="font-size: 20px; color: var(--gold);"></i>
                        <div style="font-size: 28px; font-weight: 700; color: var(--gold);" class="font-display">12K+</div>
                        <div style="font-size: 12px; color: var(--fg-muted); text-transform: uppercase; letter-spacing: 1px;">Students</div>
                    </div>
                    <div style="display: grid; gap: 8px; align-items: center; justify-items: center; text-align: center;">
                        <i class="fas fa-chart-line" style="font-size: 20px; color: var(--fg);"></i>
                        <div style="font-size: 28px; font-weight: 700; color: var(--fg);" class="font-display">98%</div>
                        <div style="font-size: 12px; color: var(--fg-muted); text-transform: uppercase; letter-spacing: 1px;">Rate</div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Right Form Panel -->
        <main class="right-panel" style="flex: 1; position: relative; display: flex; align-items: flex-start; justify-content: center; padding: 48px 24px; overflow-y: auto;">
            <div style="position: absolute; inset: 0; background: radial-gradient(ellipse at 70% 20%, rgba(45,212,160,0.04), transparent 60%); pointer-events: none;"></div>

            <div style="position: relative; z-index: 1; width: 100%; max-width: 600px;">

                <!-- Mobile logo -->
                <div style="display: none; align-items: center; gap: 12px; margin-bottom: 32px;" id="mobileLogo">
                    <div style="width: 40px; height: 40px; border-radius: 10px; background: linear-gradient(135deg, var(--accent), #1aac82); display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-graduation-cap" style="font-size: 18px; color: var(--bg);"></i>
                    </div>
                    <span style="font-weight: 700; font-size: 18px;">Enrollment Portal</span>
                </div>

                <!-- Header -->
                <div style="margin-bottom: 32px; animation: fadeInUp 0.5s ease both;">
                    <h2 class="font-display" style="font-size: 32px; font-weight: 900; margin-bottom: 8px;">Southern de Oro Philippines College Student</h2>
                    <div style="display:flex; align-items:center; gap:12px; justify-content:space-between;">
                        <p style="color: var(--fg-muted); font-size: 14px; margin:0;">Enter student details to add them to the enrollment system</p>
                        <div>
                            <a href="{{ route('students.index') }}" class="btn-submit" style="padding:10px 14px; width:auto; font-size:14px;">
                                <i class="fas fa-list" style="margin-right:8px;"></i>View Students
                            </a>
                        </div>
                    </div>
                </div>

                <form id="enrollForm" method="POST" action="{{ route('student.store') }}" novalidate autocomplete="off">
                    @csrf
                    <input type="hidden" name="course" id="course" value="{{ old('course') }}">
                    <input type="hidden" name="year_level" id="year_level" value="{{ old('year_level') }}">

                    <!-- ═══════════ SECTION: Personal Info ═══════════ -->
                    <div class="section-divider" style="animation: fadeInUp 0.5s ease 0.05s both;">
                        <div class="section-icon" style="background: var(--accent-dim);">
                            <i class="fas fa-user" style="font-size: 12px; color: var(--accent);"></i>
                        </div>
                        <span class="section-text" style="color: var(--accent);">Personal Information</span>
                    </div>

                    <!-- First Name + Last Name -->
                    <div style="display: flex; gap: 16px; margin-bottom: 16px; animation: fadeInUp 0.5s ease 0.1s both;" class="name-row">
                        <div class="form-group" style="flex: 1;">
                            <label class="form-label" for="firstName">First Name <span style="color: var(--error);">*</span></label>
                            <div style="position: relative;">
                                <input type="text" id="firstName" name="first_name" class="form-input" placeholder="First name" style="padding-left: 42px;" aria-required="true">
                                <i class="fas fa-user" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); font-size: 13px; color: var(--fg-muted); pointer-events: none;"></i>
                            </div>
                            <div class="error-msg" id="firstNameError"><i class="fas fa-exclamation-circle" style="font-size: 11px;"></i><span>First name is required</span></div>
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label class="form-label" for="lastName">Last Name <span style="color: var(--error);">*</span></label>
                            <div style="position: relative;">
                                <input type="text" id="lastName" name="last_name" class="form-input" placeholder="Last name" style="padding-left: 42px;" aria-required="true">
                                <i class="fas fa-user" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); font-size: 13px; color: var(--fg-muted); pointer-events: none;"></i>
                            </div>
                            <div class="error-msg" id="lastNameError"><i class="fas fa-exclamation-circle" style="font-size: 11px;"></i><span>Last name is required</span></div>
                        </div>
                    </div>

                    <!-- Middle Name -->
                    <div class="form-group" style="margin-bottom: 16px; animation: fadeInUp 0.5s ease 0.15s both;">
                        <label class="form-label" for="middleName">Middle Name <span class="optional-badge">optional</span></label>
                        <div style="position: relative;">
                            <input type="text" id="middleName" name="middle_name" class="form-input" placeholder="Enter your middle name" style="padding-left: 42px;">
                            <i class="fas fa-id-badge" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); font-size: 13px; color: var(--fg-muted); pointer-events: none;"></i>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group" style="margin-bottom: 16px; animation: fadeInUp 0.5s ease 0.2s both;">
                        <label class="form-label" for="email">Email Address <span style="color: var(--error);">*</span></label>
                        <div style="position: relative;">
                            <input type="email" id="email" name="email" class="form-input" placeholder="you@example.com" style="padding-left: 42px;" aria-required="true">
                            <i class="fas fa-envelope" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); font-size: 13px; color: var(--fg-muted); pointer-events: none;"></i>
                        </div>
                        <div class="error-msg" id="emailError"><i class="fas fa-exclamation-circle" style="font-size: 11px;"></i><span>Please enter a valid email address</span></div>
                    </div>

                    <!-- ═══════════ SECTION: Academic Program ═══════════ -->
                    <div class="section-divider" style="animation: fadeInUp 0.5s ease 0.25s both;">
                        <div class="section-icon" style="background: var(--gold-dim);">
                            <i class="fas fa-book" style="font-size: 12px; color: var(--gold);"></i>
                        </div>
                        <span class="section-text" style="color: var(--gold);">Academic Program</span>
                    </div>

                    <!-- Course Selection -->
                    <div class="form-group" style="margin-bottom: 20px; animation: fadeInUp 0.5s ease 0.3s both;">
                        <label class="form-label">Course / Program <span style="color: var(--error);">*</span></label>
                        <div class="course-grid" id="courseGrid">
                            <div class="course-card" data-course="BSIT" onclick="selectCourse(this)" tabindex="0" role="radio" aria-checked="false" aria-label="BSIT">
                                <div class="check-icon"><i class="fas fa-check" style="font-size: 9px; color: var(--bg);"></i></div>
                                <div class="course-code">BSIT</div>
                                <div class="course-full">Information Technology</div>
                            </div>
                            <div class="course-card" data-course="CTE" onclick="selectCourse(this)" tabindex="0" role="radio" aria-checked="false" aria-label="CTE">
                                <div class="check-icon"><i class="fas fa-check" style="font-size: 9px; color: var(--bg);"></i></div>
                                <div class="course-code">CTE</div>
                                <div class="course-full">Teacher Education</div>
                            </div>
                            <div class="course-card" data-course="CBAE" onclick="selectCourse(this)" tabindex="0" role="radio" aria-checked="false" aria-label="CBAE">
                                <div class="check-icon"><i class="fas fa-check" style="font-size: 9px; color: var(--bg);"></i></div>
                                <div class="course-code">CBAE</div>
                                <div class="course-full">Business Admin & Entrep</div>
                            </div>
                            <div class="course-card" data-course="BSCRIM" onclick="selectCourse(this)" tabindex="0" role="radio" aria-checked="false" aria-label="BSCRIM">
                                <div class="check-icon"><i class="fas fa-check" style="font-size: 9px; color: var(--bg);"></i></div>
                                <div class="course-code">BSCRIM</div>
                                <div class="course-full">Criminology</div>
                            </div>
                            <div class="course-card" data-course="CHTM" onclick="selectCourse(this)" tabindex="0" role="radio" aria-checked="false" aria-label="CHTM">
                                <div class="check-icon"><i class="fas fa-check" style="font-size: 9px; color: var(--bg);"></i></div>
                                <div class="course-code">CHTM</div>
                                <div class="course-full">Hospitality & Tourism</div>
                            </div>
                            <div class="course-card" data-course="SHS" onclick="selectCourse(this)" tabindex="0" role="radio" aria-checked="false" aria-label="SHS">
                                <div class="check-icon"><i class="fas fa-check" style="font-size: 9px; color: var(--bg);"></i></div>
                                <div class="course-code">SHS</div>
                                <div class="course-full">Senior High School</div>
                            </div>
                        </div>
                        <div class="error-msg" id="courseError"><i class="fas fa-exclamation-circle" style="font-size: 11px;"></i><span>Please select a course</span></div>
                    </div>

                    <!-- Year Level (Dynamic) -->
                    <div class="form-group" style="margin-bottom: 16px; animation: fadeInUp 0.5s ease 0.35s both;">
                        <label class="form-label">Year Level <span style="color: var(--error);">*</span></label>
                        <div id="yearContainer">
                            <div class="year-placeholder">
                                <i class="fas fa-arrow-up" style="margin-right: 6px; font-size: 11px;"></i>
                                Select a course first to see year level options
                            </div>
                        </div>
                        <div class="error-msg" id="yearError"><i class="fas fa-exclamation-circle" style="font-size: 11px;"></i><span>Please select a year level</span></div>
                    </div>

                    <!-- Submit Button -->
                    <div style="margin-top: 32px; animation: fadeInUp 0.5s ease 0.4s both;">
                        <button type="submit" class="btn-submit" id="submitBtn">
                            <span id="submitText"><i class="fas fa-user-plus" style="margin-right: 8px; font-size: 14px;"></i>Add Student</span>
                            <span id="submitSpinner" style="display: none;"><span class="spinner"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        // ==========================================
        // State
        // ==========================================
        let selectedCourse = '';
        let selectedYear = '';
        let selectedYearLabel = '';

        const courseNames = {
            'BSIT': 'Bachelor of Science in Information Technology',
            'CTE': 'College of Teacher Education',
            'CBAE': 'College of Business Administration and Entrepreneurship',
            'BSCRIM': 'Bachelor of Science in Criminology',
            'CHTM': 'College of Hospitality and Tourism Management',
            'SHS': 'Senior High School'
        };

        const collegeYears = [
            { value: 1, label: '1st Year', sub: 'College' },
            { value: 2, label: '2nd Year', sub: 'College' },
            { value: 3, label: '3rd Year', sub: 'College' },
            { value: 4, label: '4th Year', sub: 'College' }
        ];

        const shsYears = [
            { value: 11, label: 'Grade 11', sub: 'Senior High' },
            { value: 12, label: 'Grade 12', sub: 'Senior High' }
        ];

        // ==========================================
        // FontAwesome helper
        // ==========================================
        function getFontAwesomeIcon(name, style = 'fas', extraClasses = '', inlineStyle = '') {
            return `<i class="${style} fa-${name} ${extraClasses}" style="${inlineStyle}" aria-hidden="true"></i>`;
        }

        // ==========================================
        // Particles
        // ==========================================
        function createParticles() {
            const c = document.getElementById('particleContainer');
            if (!c) return;
            for (let i = 0; i < 20; i++) {
                const p = document.createElement('div');
                p.className = 'particle';
                p.style.left = Math.random() * 100 + '%';
                p.style.top = 40 + Math.random() * 60 + '%';
                p.style.animationDelay = Math.random() * 6 + 's';
                p.style.animationDuration = 4 + Math.random() * 4 + 's';
                const s = 2 + Math.random() * 3 + 'px';
                p.style.width = s; p.style.height = s;
                if (Math.random() > 0.6) p.style.background = 'var(--gold)';
                c.appendChild(p);
            }
        }
        createParticles();

        // Mobile logo
        function checkMobile() {
            const ml = document.getElementById('mobileLogo');
            if (ml) ml.style.display = window.innerWidth <= 1024 ? 'flex' : 'none';
        }
        checkMobile();
        window.addEventListener('resize', checkMobile);

        // ==========================================
        // Course Selection
        // ==========================================
        function selectCourse(card) {
            document.querySelectorAll('.course-card').forEach(c => {
                c.classList.remove('selected');
                c.setAttribute('aria-checked', 'false');
            });
            card.classList.add('selected');
            card.setAttribute('aria-checked', 'true');
            selectedCourse = card.dataset.course;
            document.getElementById('course').value = selectedCourse;

            document.getElementById('courseError').classList.remove('visible');
            document.getElementById('courseGrid').style.outline = 'none';

            selectedYear = '';
            document.getElementById('yearError').classList.remove('visible');
            renderYearLevels();

            card.style.transform = 'scale(0.95)';
            setTimeout(() => { card.style.transform = ''; }, 150);
        }

        function renderYearLevels() {
            const container = document.getElementById('yearContainer');
            const isSHS = selectedCourse === 'SHS';
            const years = isSHS ? shsYears : collegeYears;
            const typeLabel = isSHS ? 'Senior High School' : 'College';
            const icon = isSHS ? 'school' : 'university';

            container.innerHTML = `
                <div style="margin-bottom: 10px;">
                    <span style="font-size: 11px; color: var(--gold); font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">
                        <i class="fas fa-${icon}" style="margin-right: 4px;"></i>${typeLabel} — Select Year Level
                    </span>
                </div>
                <div class="year-grid">
                    ${years.map(y => `
                        <div class="year-card" data-year="${y.value}" data-year-label="${y.label}" onclick="selectYear(this)" tabindex="0" role="radio" aria-checked="false" aria-label="${y.label}">
                            <div class="check-icon"><i class="fas fa-check" style="font-size: 8px; color: var(--bg);"></i></div>
                            <div class="year-label">${y.label}</div>
                            <div class="year-sub">${y.sub}</div>
                        </div>
                    `).join('')}
                </div>
            `;

            container.style.opacity = '0';
            container.style.transform = 'translateY(8px)';
            requestAnimationFrame(() => {
                container.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                container.style.opacity = '1';
                container.style.transform = 'translateY(0)';
            });

            container.querySelectorAll('.year-card').forEach(yc => {
                yc.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); selectYear(yc); }
                });
            });
        }

        function selectYear(card) {
            document.querySelectorAll('.year-card').forEach(c => {
                c.classList.remove('selected');
                c.setAttribute('aria-checked', 'false');
            });
            card.classList.add('selected');
            card.setAttribute('aria-checked', 'true');
            selectedYear = card.dataset.year;
            selectedYearLabel = card.dataset.yearLabel || selectedYear;
            document.getElementById('year_level').value = selectedYear;
            document.getElementById('yearError').classList.remove('visible');

            card.style.transform = 'scale(0.95)';
            setTimeout(() => { card.style.transform = ''; }, 150);
        }

        // Keyboard support for course cards
        document.querySelectorAll('.course-card').forEach(card => {
            card.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); selectCourse(card); }
            });
        });

        // ==========================================
        // Validation
        // ==========================================
        function validateForm() {
            clearErrors();
            let valid = true;

            if (!document.getElementById('firstName').value.trim()) { showError('firstName', 'firstNameError'); valid = false; }
            if (!document.getElementById('lastName').value.trim()) { showError('lastName', 'lastNameError'); valid = false; }

            const email = document.getElementById('email').value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email || !emailRegex.test(email)) { showError('email', 'emailError'); valid = false; }

            if (!selectedCourse) {
                document.getElementById('courseError').classList.add('visible');
                document.getElementById('courseGrid').style.outline = '2px solid var(--error)';
                document.getElementById('courseGrid').style.outlineOffset = '4px';
                document.getElementById('courseGrid').style.borderRadius = '12px';
                valid = false;
            }

            if (!selectedYear) {
                document.getElementById('yearError').classList.add('visible');
                valid = false;
            }

            if (!valid) {
                const form = document.getElementById('enrollForm');
                form.style.animation = 'none';
                form.offsetHeight;
                form.style.animation = 'shake 0.4s ease';

                const firstErr = document.querySelector('.error-msg.visible, .form-input.error');
                if (firstErr) firstErr.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
            return valid;
        }

        function showError(inputId, errorId) {
            const input = document.getElementById(inputId);
            const error = document.getElementById(errorId);
            if (input) input.classList.add('error');
            if (error) error.classList.add('visible');
        }

        function clearErrors() {
            document.querySelectorAll('.form-input.error').forEach(el => el.classList.remove('error'));
            document.querySelectorAll('.error-msg.visible').forEach(el => el.classList.remove('visible'));
            const cg = document.getElementById('courseGrid');
            if (cg) cg.style.outline = 'none';
        }

        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('input', () => {
                input.classList.remove('error');
                const err = input.closest('.form-group')?.querySelector('.error-msg');
                if (err) err.classList.remove('visible');
            });
        });

        // ==========================================
        // Form Submission
        // ==========================================
        document.getElementById('enrollForm').addEventListener('submit', function(e) {
            if (!validateForm()) {
                e.preventDefault();
            }
        });

        // ==========================================
        // Reset
        // ==========================================
        function resetForm() {
            document.getElementById('successOverlay').classList.remove('visible');
            document.getElementById('enrollForm').reset();
            selectedCourse = '';
            selectedYear = '';
            selectedYearLabel = '';
            document.getElementById('course').value = '';
            document.getElementById('year_level').value = '';
            document.querySelectorAll('.course-card').forEach(c => { c.classList.remove('selected'); c.setAttribute('aria-checked', 'false'); });
            document.getElementById('yearContainer').innerHTML = `
                <div class="year-placeholder">
                    <i class="fas fa-arrow-up" style="margin-right: 6px; font-size: 11px;"></i>
                    Select a course first to see year level options
                </div>
            `;
            clearErrors();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // ==========================================
        // Toast
        // ==========================================
        function showToast(message, type = 'success') {
            const container = document.getElementById('toastContainer');
            if (!container) return;
            const toast = document.createElement('div');
            toast.className = 'toast ' + type;
            toast.innerHTML = `
                ${getFontAwesomeIcon(type === 'success' ? 'check-circle' : 'exclamation-circle', 'fas', 'toast-icon')}
                <span style="font-size: 14px; color: var(--fg);">${message}</span>
            `;
            container.appendChild(toast);
            requestAnimationFrame(() => toast.classList.add('show'));
            setTimeout(() => { toast.classList.remove('show'); setTimeout(() => toast.remove(), 400); }, 4000);
        }

        // ==========================================
        // Mouse-follow glow
        // ==========================================
        const rp = document.querySelector('.right-panel');
        if (rp) {
            rp.addEventListener('mousemove', (e) => {
                const rect = rp.getBoundingClientRect();
                rp.style.background = `radial-gradient(600px circle at ${e.clientX - rect.left}px ${e.clientY - rect.top}px, rgba(45,212,160,0.03), transparent 50%)`;
            });
            rp.addEventListener('mouseleave', () => { rp.style.background = ''; });
        }
    </script>
</body>
</html>