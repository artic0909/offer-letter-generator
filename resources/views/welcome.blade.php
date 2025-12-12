<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('fav.png') }}">

    <title>OFFERGEN AI | Quantum Speed | SSPL</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Rajdhani', 'Orbitron', monospace, sans-serif;
            background: #000000;
            color: #ffffff;
            overflow-x: hidden;
        }

        /* Cyber Grid Background */
        .cyber-grid {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                linear-gradient(0deg, transparent 24%, rgba(0, 255, 255, 0.05) 25%, rgba(0, 255, 255, 0.05) 26%, transparent 27%, transparent 74%, rgba(0, 255, 255, 0.05) 75%, rgba(0, 255, 255, 0.05) 76%, transparent 77%, transparent),
                linear-gradient(90deg, transparent 24%, rgba(0, 255, 255, 0.05) 25%, rgba(0, 255, 255, 0.05) 26%, transparent 27%, transparent 74%, rgba(0, 255, 255, 0.05) 75%, rgba(0, 255, 255, 0.05) 76%, transparent 77%, transparent);
            background-size: 50px 50px;
            animation: gridScroll 20s linear infinite;
            z-index: 0;
        }

        @keyframes gridScroll {
            0% {
                transform: perspective(500px) rotateX(60deg) translateY(0);
            }

            100% {
                transform: perspective(500px) rotateX(60deg) translateY(50px);
            }
        }

        /* Neon Glows */
        .neon-glow-1 {
            position: fixed;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0, 255, 255, 0.3) 0%, transparent 70%);
            top: -300px;
            right: -300px;
            animation: pulse 4s ease-in-out infinite;
            z-index: 0;
        }

        .neon-glow-2 {
            position: fixed;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 0, 255, 0.3) 0%, transparent 70%);
            bottom: -250px;
            left: -250px;
            animation: pulse 6s ease-in-out infinite reverse;
            z-index: 0;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.5;
            }

            50% {
                transform: scale(1.2);
                opacity: 0.8;
            }
        }

        /* Scanlines */
        .scanlines {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(0deg,
                    rgba(0, 0, 0, 0.15),
                    rgba(0, 0, 0, 0.15) 1px,
                    transparent 1px,
                    transparent 2px);
            pointer-events: none;
            z-index: 100;
            animation: scanline 10s linear infinite;
        }

        @keyframes scanline {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(10px);
            }
        }

        .nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 101;
            padding: 1.5rem 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            border-bottom: 2px solid rgba(0, 255, 255, 0.3);
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.2);
        }

        .logo {
            font-size: 2rem;
            font-weight: 900;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #00ffff;
            text-shadow:
                0 0 10px #00ffff,
                0 0 20px #00ffff,
                0 0 30px #00ffff;
            animation: glitch 3s infinite;
        }

        @keyframes glitch {

            0%,
            90%,
            100% {
                text-shadow:
                    0 0 10px #00ffff,
                    0 0 20px #00ffff,
                    0 0 30px #00ffff;
            }

            95% {
                text-shadow:
                    -2px 0 10px #ff00ff,
                    2px 0 20px #00ffff,
                    0 0 30px #00ff00;
            }
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-link {
            color: #00ffff;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: #00ffff;
            transition: width 0.3s;
            box-shadow: 0 0 10px #00ffff;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link:hover {
            text-shadow: 0 0 10px #00ffff;
        }

        .btn {
            padding: 0.8rem 2rem;
            border-radius: 0;
            text-decoration: none;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: all 0.3s;
            font-size: 0.9rem;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: #00ffff;
            color: #000;
            border: 2px solid #00ffff;
            box-shadow:
                0 0 20px rgba(0, 255, 255, 0.5),
                inset 0 0 20px rgba(0, 255, 255, 0.2);
        }

        .btn-primary:hover {
            background: #000;
            color: #00ffff;
            box-shadow:
                0 0 30px rgba(0, 255, 255, 0.8),
                inset 0 0 20px rgba(0, 255, 255, 0.3);
        }

        .btn-ghost {
            border: 2px solid #ff00ff;
            color: #ff00ff;
            background: transparent;
            box-shadow: 0 0 20px rgba(255, 0, 255, 0.3);
        }

        .btn-ghost:hover {
            background: #ff00ff;
            color: #000;
            box-shadow: 0 0 30px rgba(255, 0, 255, 0.6);
        }

        .hero {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            position: relative;
            z-index: 1;
        }

        .content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 1100px;
        }

        .glitch-wrapper {
            position: relative;
            display: inline-block;
        }

        h1 {
            font-size: clamp(3rem, 10vw, 7rem);
            font-weight: 900;
            line-height: 1;
            margin-bottom: 2rem;
            text-transform: uppercase;
            letter-spacing: 5px;
            color: #fff;
            text-shadow:
                0 0 10px #00ffff,
                0 0 20px #00ffff,
                0 0 40px #00ffff,
                0 0 80px #00ffff;
            animation: titleGlow 2s ease-in-out infinite alternate;
        }

        @keyframes titleGlow {
            0% {
                text-shadow:
                    0 0 10px #00ffff,
                    0 0 20px #00ffff,
                    0 0 40px #00ffff,
                    0 0 80px #00ffff;
            }

            100% {
                text-shadow:
                    0 0 20px #00ffff,
                    0 0 40px #00ffff,
                    0 0 60px #00ffff,
                    0 0 100px #00ffff,
                    0 0 140px #00ffff;
            }
        }

        .cyber-text {
            display: block;
            background: linear-gradient(45deg, #00ffff, #ff00ff, #00ff00, #00ffff);
            background-size: 300% 300%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: cyberGradient 3s ease infinite;
        }

        @keyframes cyberGradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .subtitle {
            font-size: clamp(1.1rem, 3vw, 1.5rem);
            color: #00ffff;
            margin-bottom: 3rem;
            line-height: 1.6;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 600;
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
            animation: fadeInUp 1s ease-out 0.3s backwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .cta-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 5rem;
            animation: fadeInUp 1s ease-out 0.5s backwards;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
            animation: fadeInUp 1s ease-out 0.7s backwards;
        }

        .stat-card {
            background: rgba(0, 0, 0, 0.7);
            border: 2px solid #00ffff;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #00ffff, #ff00ff, #00ff00, #00ffff);
            background-size: 400% 400%;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s;
            animation: borderGlow 3s ease infinite;
        }

        @keyframes borderGlow {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        .stat-card:hover::before {
            opacity: 1;
        }

        .stat-card:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow:
                0 0 30px rgba(0, 255, 255, 0.5),
                0 0 60px rgba(255, 0, 255, 0.3);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 900;
            color: #00ffff;
            text-shadow: 0 0 20px #00ffff;
            display: block;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1rem;
            color: #ff00ff;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 700;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 5rem;
            padding: 0 2rem;
        }

        .feature-card {
            background: rgba(0, 0, 0, 0.8);
            border: 2px solid rgba(0, 255, 255, 0.3);
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
            transition: all 0.4s;
            clip-path: polygon(0 0, calc(100% - 20px) 0, 100% 20px, 100% 100%, 20px 100%, 0 calc(100% - 20px));
        }

        .feature-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .feature-card:hover::after {
            left: 100%;
        }

        .feature-card:hover {
            border-color: #00ffff;
            box-shadow:
                0 0 30px rgba(0, 255, 255, 0.4),
                inset 0 0 30px rgba(0, 255, 255, 0.1);
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            display: block;
            filter: drop-shadow(0 0 10px #00ffff);
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 900;
            margin-bottom: 1rem;
            color: #00ffff;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
        }

        .feature-desc {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1rem;
            line-height: 1.6;
            letter-spacing: 1px;
        }

        /* Particles */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: #00ffff;
            box-shadow: 0 0 10px #00ffff;
            animation: float-particle 10s linear infinite;
        }

        @keyframes float-particle {
            0% {
                transform: translateY(100vh) translateX(0);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                transform: translateY(-100px) translateX(100px);
                opacity: 0;
            }
        }

        @media (max-width: 768px) {
            .nav {
                padding: 1rem 1.5rem;
            }

            .logo {
                font-size: 1.5rem;
            }

            .nav-link:not(.btn) {
                display: none;
            }

            .features {
                grid-template-columns: 1fr;
                padding: 0 1rem;
            }

            .stat-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="cyber-grid"></div>
    <div class="neon-glow-1"></div>
    <div class="neon-glow-2"></div>
    <div class="scanlines"></div>

    <div class="particles" id="particles"></div>

    <nav class="nav">
        <div class="logo">OFFERGEN AI</div>
        <div class="nav-links">
            <a href="#features" class="nav-link">Features</a>
            <a href="#" class="nav-link">About</a>
            <a href="/login" class="btn btn-ghost">Login</a>
            <a href="/login" class="btn btn-primary">Start Now</a>
        </div>
    </nav>

    <section class="hero">
        <div class="content">
            <h1>
                <span class="cyber-text">GENERATE</span>
                OFFER LETTERS
                <span class="cyber-text">IN HYPERSPACE</span>
            </h1>

            <p class="subtitle">
                // AI-POWERED // INSTANT // UNSTOPPABLE //
            </p>

            <div class="cta-buttons">
                <a href="/login" class="btn btn-primary">Initialize System</a>
                <a href="#features" class="btn btn-ghost">Explore Tech</a>
            </div>

            <div class="stats">
                <div class="stat-card">
                    <span class="stat-number">0.5s</span>
                    <span class="stat-label">Generation Time</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">99.9%</span>
                    <span class="stat-label">Accuracy Rate</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">System Online</span>
                </div>
            </div>
        </div>
    </section>

    <section class="features" id="features">
        <div class="feature-card">
            <span class="feature-icon">⚡</span>
            <h3 class="feature-title">Quantum Speed</h3>
            <p class="feature-desc">Process offer letters at lightspeed with our neural network algorithms</p>
        </div>

        <div class="feature-card">
            <span class="feature-icon">🎮</span>
            <h3 class="feature-title">Next-Gen UI</h3>
            <p class="feature-desc">Cyberpunk interface designed for maximum efficiency and style</p>
        </div>

        <div class="feature-card">
            <span class="feature-icon">🔐</span>
            <h3 class="feature-title">Military Grade</h3>
            <p class="feature-desc">Bank-level encryption keeps your data locked in the vault</p>
        </div>
    </section>

    <script>
        // Generate floating particles
        const particlesContainer = document.getElementById('particles');
        for (let i = 0; i < 50; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 10 + 's';
            particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
            particlesContainer.appendChild(particle);
        }
    </script>
</body>

</html>