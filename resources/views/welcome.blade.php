<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} — Under Maintenance</title>
    <meta name="description" content="We're currently performing scheduled maintenance. We'll be back shortly.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #6C63FF;
            --primary-light: #8B83FF;
            --accent: #FF6584;
            --bg-dark: #0B0D17;
            --bg-card: rgba(255, 255, 255, 0.04);
            --text-primary: #EAEAEA;
            --text-secondary: #8892B0;
            --border-glow: rgba(108, 99, 255, 0.25);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-dark);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        /* ── Animated Background ── */
        .bg-gradient {
            position: fixed;
            inset: 0;
            z-index: 0;
            background:
                radial-gradient(ellipse 80% 50% at 50% -20%, rgba(108, 99, 255, 0.25), transparent),
                radial-gradient(ellipse 60% 40% at 80% 100%, rgba(255, 101, 132, 0.15), transparent),
                radial-gradient(ellipse 50% 50% at 10% 60%, rgba(99, 179, 255, 0.1), transparent);
        }

        .stars {
            position: fixed;
            inset: 0;
            z-index: 0;
        }

        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: white;
            border-radius: 50%;
            animation: twinkle var(--duration) ease-in-out infinite alternate;
            opacity: 0;
        }

        @keyframes twinkle {
            0% { opacity: 0; transform: scale(0.5); }
            100% { opacity: var(--max-opacity); transform: scale(1); }
        }

        /* ── Floating Orbs ── */
        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            z-index: 0;
            animation: float 20s ease-in-out infinite;
            pointer-events: none;
        }

        .cursor-glow {
            position: fixed;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(108, 99, 255, 0.15) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 1;
            transform: translate(-50%, -50%);
            transition: opacity 0.3s ease;
            opacity: 0;
        }

        .orb-1 {
            width: 400px;
            height: 400px;
            background: rgba(108, 99, 255, 0.12);
            top: -100px;
            right: -100px;
            animation-delay: 0s;
        }

        .orb-2 {
            width: 300px;
            height: 300px;
            background: rgba(255, 101, 132, 0.1);
            bottom: -50px;
            left: -50px;
            animation-delay: -7s;
        }

        .orb-3 {
            width: 250px;
            height: 250px;
            background: rgba(99, 179, 255, 0.08);
            top: 50%;
            left: 60%;
            animation-delay: -14s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            25% { transform: translate(30px, -40px) scale(1.05); }
            50% { transform: translate(-20px, 20px) scale(0.95); }
            75% { transform: translate(15px, 30px) scale(1.02); }
        }

        /* ── Grid Pattern ── */
        .grid-pattern {
            position: fixed;
            inset: 0;
            z-index: 0;
            background-image:
                linear-gradient(rgba(108, 99, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(108, 99, 255, 0.03) 1px, transparent 1px);
            background-size: 60px 60px;
            mask-image: radial-gradient(ellipse 70% 70% at 50% 50%, black 20%, transparent 70%);
            -webkit-mask-image: radial-gradient(ellipse 70% 70% at 50% 50%, black 20%, transparent 70%);
        }

        /* ── Main Container ── */
        .container {
            position: relative;
            z-index: 10;
            text-align: center;
            max-width: 680px;
            width: 100%;
            padding: 20px;
        }

        /* ── Gear Icon ── */
        .icon-wrapper {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: var(--bg-card);
            border: 1px solid var(--border-glow);
            margin-bottom: 40px;
            position: relative;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            animation: pulse-glow 4s ease-in-out infinite;
        }

        .icon-wrapper::before {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 50%;
            background: conic-gradient(from 0deg, transparent, var(--primary), transparent, var(--accent), transparent);
            z-index: -1;
            animation: rotate-border 6s linear infinite;
            opacity: 0.4;
        }

        .icon-wrapper::after {
            content: '';
            position: absolute;
            inset: -1px;
            border-radius: 50%;
            background: var(--bg-dark);
            z-index: -1;
        }

        @keyframes rotate-border {
            to { transform: rotate(360deg); }
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 30px rgba(108, 99, 255, 0.1); }
            50% { box-shadow: 0 0 60px rgba(108, 99, 255, 0.2), 0 0 100px rgba(108, 99, 255, 0.05); }
        }

        .gear-svg {
            width: 52px;
            height: 52px;
            color: var(--primary-light);
            animation: spin-slow 8s linear infinite;
        }

        @keyframes spin-slow {
            to { transform: rotate(360deg); }
        }

        /* ── Badge ── */
        .maintenance-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 20px;
            border-radius: 50px;
            background: rgba(108, 99, 255, 0.1);
            border: 1px solid rgba(108, 99, 255, 0.2);
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--primary-light);
            margin-bottom: 32px;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .badge-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--accent);
            animation: blink 2s ease-in-out infinite;
            flex-shrink: 0;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }

        /* ── Typography ── */
        h1 {
            font-size: clamp(2.2rem, 5vw, 3.5rem);
            font-weight: 800;
            line-height: 1.15;
            margin-bottom: 20px;
            letter-spacing: -0.03em;
            background: linear-gradient(135deg, #ffffff 0%, #a5b4fc 50%, var(--primary-light) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .subtitle {
            font-size: 1.1rem;
            line-height: 1.7;
            color: var(--text-secondary);
            max-width: 500px;
            margin: 0 auto 48px;
            font-weight: 400;
        }

        /* ── Countdown Timer ── */
        .countdown-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: var(--text-secondary);
            margin-bottom: 16px;
            font-weight: 500;
        }

        .countdown {
            display: flex;
            justify-content: center;
            gap: 16px;
            margin-bottom: 48px;
        }

        .countdown-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-width: 80px;
        }

        .countdown-value {
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: 700;
            background: var(--bg-card);
            border: 1px solid rgba(108, 99, 255, 0.15);
            border-radius: 16px;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            letter-spacing: -0.02em;
            color: #fff;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .countdown-value:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(108, 99, 255, 0.15);
        }

        .countdown-value::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(108, 99, 255, 0.06) 0%, transparent 50%);
            pointer-events: none;
        }

        .countdown-unit {
            margin-top: 10px;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: var(--text-secondary);
            font-weight: 500;
        }

        .countdown-separator {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            color: rgba(108, 99, 255, 0.4);
            font-weight: 300;
            padding-bottom: 24px;
            animation: blink 1.5s ease-in-out infinite;
        }

        /* ── Glass Card ── */
        .glass-card {
            background: var(--bg-card);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 20px;
            padding: 36px;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            margin-bottom: 32px;
        }

        .notify-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 6px;
            color: var(--text-primary);
        }

        .notify-desc {
            font-size: 0.875rem;
            color: var(--text-secondary);
            margin-bottom: 20px;
        }

        /* ── Email Form ── */
        .email-form {
            display: flex;
            gap: 10px;
            max-width: 420px;
            margin: 0 auto;
        }

        .email-input {
            flex: 1;
            padding: 14px 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            color: #fff;
            font-size: 0.9rem;
            font-family: 'Inter', sans-serif;
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .email-input::placeholder {
            color: rgba(255, 255, 255, 0.25);
        }

        .email-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.15);
        }

        .notify-btn {
            padding: 14px 28px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            border: none;
            border-radius: 12px;
            color: #fff;
            font-size: 0.9rem;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
            position: relative;
            overflow: hidden;
        }

        .notify-btn::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, transparent 50%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .notify-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(108, 99, 255, 0.35);
        }

        .notify-btn:hover::before {
            opacity: 1;
        }

        .notify-btn:active {
            transform: translateY(0);
        }

        .success-msg {
            display: none;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 20px;
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.2);
            border-radius: 12px;
            color: #4ade80;
            font-size: 0.85rem;
            font-weight: 500;
            margin-top: 16px;
            animation: fadeInUp 0.5s ease forwards;
        }

        .success-msg.show {
            display: flex;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ── Progress Bar ── */
        .progress-section {
            margin-bottom: 40px;
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .progress-text {
            font-size: 0.8rem;
            color: var(--text-secondary);
            font-weight: 500;
        }

        .progress-percent {
            font-size: 0.8rem;
            color: var(--primary-light);
            font-weight: 600;
        }

        .progress-track {
            height: 6px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 100px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, var(--primary) 0%, var(--accent) 100%);
            border-radius: 100px;
            animation: progress-grow 2s ease-out forwards 0.5s;
            position: relative;
        }

        .progress-fill::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #fff;
            box-shadow: 0 0 12px rgba(108, 99, 255, 0.6);
            opacity: 0;
            animation: dot-appear 0.3s ease forwards 2.5s;
        }

        @keyframes progress-grow {
            to { width: 72%; }
        }

        @keyframes dot-appear {
            to { opacity: 1; }
        }

        /* ── Status Dashboard ── */
        .status-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-bottom: 32px;
        }

        .status-pill {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            padding: 12px;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 4px;
            transition: all 0.3s ease;
        }

        .status-pill:hover {
            background: rgba(255, 255, 255, 0.06);
            transform: translateY(-2px);
        }

        .status-name {
            font-size: 0.65rem;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 600;
        }

        .status-value {
            font-size: 0.85rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
        }

        .dot-online { background: #4ade80; box-shadow: 0 0 8px #4ade80; }
        .dot-warning { background: #fbbf24; box-shadow: 0 0 8px #fbbf24; }

        /* ── Task List ── */
        .task-list {
            text-align: left;
            max-width: 400px;
            margin: 0 auto 40px;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.04);
            border-radius: 16px;
            padding: 24px;
        }

        .task-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .task-item:last-child { margin-bottom: 0; }

        .task-check {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--primary);
            color: var(--primary-light);
            flex-shrink: 0;
        }

        .task-check.done {
            background: var(--primary);
            color: #fff;
        }

        .task-check svg { width: 12px; height: 12px; }

        .admin-link {
            display: inline-block;
            margin-top: 24px;
            font-size: 0.8rem;
            color: var(--text-secondary);
            text-decoration: none;
            opacity: 0.5;
            transition: opacity 0.3s ease;
        }

        .admin-link:hover { opacity: 1; color: var(--primary-light); }

        /* ── Social Links ── */
        .social-links {
            display: flex;
            justify-content: center;
            gap: 16px;
            margin-top: 40px;
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.06);
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: rgba(108, 99, 255, 0.1);
            border-color: rgba(108, 99, 255, 0.3);
            color: var(--primary-light);
            transform: translateY(-3px);
        }

        .social-link svg {
            width: 18px;
            height: 18px;
        }

        /* ── Footer ── */
        .footer-text {
            margin-top: 48px;
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.2);
            letter-spacing: 0.02em;
        }

        /* ── Responsive ── */
        @media (max-width: 600px) {
            .countdown { gap: 8px; }
            .countdown-value {
                width: 64px;
                height: 64px;
                font-size: 1.5rem;
                border-radius: 12px;
            }
            .countdown-item { min-width: 64px; }
            .email-form {
                flex-direction: column;
            }
            .glass-card {
                padding: 24px 20px;
            }
            .icon-wrapper {
                width: 96px;
                height: 96px;
                margin-bottom: 28px;
            }
            .gear-svg {
                width: 40px;
                height: 40px;
            }
        }

        /* ── Fade-in animation ── */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.8s ease forwards;
        }

        .fade-in:nth-child(1) { animation-delay: 0.1s; }
        .fade-in:nth-child(2) { animation-delay: 0.2s; }
        .fade-in:nth-child(3) { animation-delay: 0.3s; }
        .fade-in:nth-child(4) { animation-delay: 0.4s; }
        .fade-in:nth-child(5) { animation-delay: 0.5s; }
        .fade-in:nth-child(6) { animation-delay: 0.6s; }
        .fade-in:nth-child(7) { animation-delay: 0.7s; }
        .fade-in:nth-child(8) { animation-delay: 0.8s; }
    </style>
</head>
<body>
    <!-- Background Effects -->
    <div class="bg-gradient"></div>
    <div class="grid-pattern"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
    <div class="stars" id="stars"></div>
    <div class="cursor-glow" id="cursorGlow"></div>

    <!-- Main Content -->
    <div class="container">
        <!-- Gear Icon -->
        <div class="fade-in" style="display:flex;justify-content:center;">
            <div class="icon-wrapper">
                <svg class="gear-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1Z"/>
                </svg>
            </div>
        </div>

        <!-- Badge -->
        <div class="fade-in">
            <div class="maintenance-badge">
                <span class="badge-dot"></span>
                Scheduled Maintenance
            </div>
        </div>

        <!-- Heading -->
        <h1 class="fade-in">We'll Be Back Shortly</h1>

        <!-- Subtitle -->
        <p class="subtitle fade-in">
            We're currently upgrading our infrastructure to provide a more seamless experience. We'll be back online in just a moment.
        </p>

        <!-- Status Dashboard -->
        <div class="status-grid fade-in">
            <div class="status-pill">
                <span class="status-name">Database</span>
                <span class="status-value"><span class="status-dot dot-online"></span> Optimal</span>
            </div>
            <div class="status-pill">
                <span class="status-name">API Server</span>
                <span class="status-value"><span class="status-dot dot-online"></span> Stable</span>
            </div>
            <div class="status-pill">
                <span class="status-name">Storage</span>
                <span class="status-value"><span class="status-dot dot-online"></span> Active</span>
            </div>
        </div>

        <!-- Task Checklist -->
        <div class="task-list fade-in">
            <div class="task-item">
                <span class="task-check done"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span>
                <span>Database migration & cleanup</span>
            </div>
            <div class="task-item">
                <span class="task-check done"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span>
                <span>Security patch deployment</span>
            </div>
            <div class="task-item">
                <span class="task-check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12h14"/></svg></span>
                <span>Final system smoke test</span>
            </div>
        </div>

        <!-- Progress -->
        <div class="progress-section fade-in">
            <div class="progress-header">
                <span class="progress-text">Maintenance Progress</span>
                <span class="progress-percent">72%</span>
            </div>
            <div class="progress-track">
                <div class="progress-fill"></div>
            </div>
        </div>

        <!-- Countdown Timer -->
        <p class="countdown-label fade-in">Estimated Time Remaining</p>
        <div class="countdown fade-in" id="countdown">
            <div class="countdown-item">
                <div class="countdown-value" id="hours">00</div>
                <span class="countdown-unit">Hours</span>
            </div>
            <div class="countdown-separator">:</div>
            <div class="countdown-item">
                <div class="countdown-value" id="minutes">00</div>
                <span class="countdown-unit">Minutes</span>
            </div>
            <div class="countdown-separator">:</div>
            <div class="countdown-item">
                <div class="countdown-value" id="seconds">00</div>
                <span class="countdown-unit">Seconds</span>
            </div>
        </div>

        <!-- Notify Card -->
        <div class="glass-card fade-in">
            <p class="notify-title">Get Notified When We're Back</p>
            <p class="notify-desc">Drop your email and we'll let you know the moment we're live again.</p>
            <form class="email-form" id="notifyForm" onsubmit="handleNotify(event)">
                <input
                    type="email"
                    class="email-input"
                    id="emailInput"
                    placeholder="you@example.com"
                    required
                    autocomplete="email"
                >
                <button type="submit" class="notify-btn" id="notifyBtn">Notify Me</button>
            </form>
            <div class="success-msg" id="successMsg">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                You're on the list! We'll notify you soon.
            </div>
        </div>

        <!-- Social Links -->
        <div class="social-links fade-in">
            <a href="#" class="social-link" title="Twitter / X" aria-label="Twitter">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
            </a>
            <a href="#" class="social-link" title="Facebook" aria-label="Facebook">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
            </a>
            <a href="#" class="social-link" title="GitHub" aria-label="GitHub">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
            </a>
            @auth
                <a href="{{ url('/dashboard') }}" class="social-link" title="Dashboard" aria-label="Dashboard">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                </a>
            @else
                <a href="{{ route('login') }}" class="social-link" title="Staff Login" aria-label="Login">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                </a>
            @endauth
        </div>

        <!-- Footer -->
        <p class="footer-text fade-in">
            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
        </p>
    </div>

    <script>
        // ── Cursor Glow ──
        const cursorGlow = document.getElementById('cursorGlow');
        document.addEventListener('mousemove', (e) => {
            cursorGlow.style.left = e.clientX + 'px';
            cursorGlow.style.top = e.clientY + 'px';
            cursorGlow.style.opacity = '1';
        });

        document.addEventListener('mouseleave', () => {
            cursorGlow.style.opacity = '0';
        });

        // ── Stars ──
        (function createStars() {
            const container = document.getElementById('stars');
            const count = 80;
            for (let i = 0; i < count; i++) {
                const star = document.createElement('div');
                star.className = 'star';
                star.style.left = Math.random() * 100 + '%';
                star.style.top = Math.random() * 100 + '%';
                star.style.setProperty('--duration', (2 + Math.random() * 4) + 's');
                star.style.setProperty('--max-opacity', (0.2 + Math.random() * 0.6).toString());
                star.style.animationDelay = (Math.random() * 5) + 's';
                star.style.width = star.style.height = (1 + Math.random() * 2) + 'px';
                container.appendChild(star);
            }
        })();

        // ── Countdown (2 hours from now) ──
        (function startCountdown() {
            const endTime = new Date().getTime() + (2 * 60 * 60 * 1000);

            function update() {
                const now = new Date().getTime();
                const diff = Math.max(0, endTime - now);

                const hours = Math.floor(diff / (1000 * 60 * 60));
                const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((diff % (1000 * 60)) / 1000);

                document.getElementById('hours').textContent = String(hours).padStart(2, '0');
                document.getElementById('minutes').textContent = String(minutes).padStart(2, '0');
                document.getElementById('seconds').textContent = String(seconds).padStart(2, '0');

                if (diff > 0) requestAnimationFrame(update);
            }

            update();
            setInterval(update, 1000);
        })();

        // ── Notification Form ──
        function handleNotify(e) {
            e.preventDefault();
            const btn = document.getElementById('notifyBtn');
            const input = document.getElementById('emailInput');
            const msg = document.getElementById('successMsg');

            btn.textContent = 'Sending...';
            btn.style.opacity = '0.7';
            btn.disabled = true;

            setTimeout(() => {
                btn.textContent = 'Notify Me';
                btn.style.opacity = '1';
                btn.disabled = false;
                input.value = '';
                msg.classList.add('show');

                setTimeout(() => msg.classList.remove('show'), 5000);
            }, 1200);
        }
    </script>
</body>
</html>
