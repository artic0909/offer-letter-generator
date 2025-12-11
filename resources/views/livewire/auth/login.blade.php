<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - OfferGen</title>
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
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        /* Cyber Grid Background */
        .cyber-grid {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                linear-gradient(0deg, transparent 24%, rgba(0, 255, 255, 0.03) 25%, rgba(0, 255, 255, 0.03) 26%, transparent 27%, transparent 74%, rgba(0, 255, 255, 0.03) 75%, rgba(0, 255, 255, 0.03) 76%, transparent 77%, transparent),
                linear-gradient(90deg, transparent 24%, rgba(0, 255, 255, 0.03) 25%, rgba(0, 255, 255, 0.03) 26%, transparent 27%, transparent 74%, rgba(0, 255, 255, 0.03) 75%, rgba(0, 255, 255, 0.03) 76%, transparent 77%, transparent);
            background-size: 50px 50px;
            z-index: 0;
        }

        /* Neon Glows */
        .neon-glow {
            position: fixed;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            filter: blur(100px);
            z-index: 0;
            animation: pulse 4s ease-in-out infinite;
        }

        .glow-1 {
            background: radial-gradient(circle, rgba(0, 255, 255, 0.2) 0%, transparent 70%);
            top: -200px;
            right: -200px;
        }

        .glow-2 {
            background: radial-gradient(circle, rgba(255, 0, 255, 0.2) 0%, transparent 70%);
            bottom: -200px;
            left: -200px;
            animation-delay: 2s;
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
                    rgba(0, 0, 0, 0.1),
                    rgba(0, 0, 0, 0.1) 1px,
                    transparent 1px,
                    transparent 2px);
            pointer-events: none;
            z-index: 100;
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
            animation: float-particle 15s linear infinite;
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

        .container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 450px;
            padding: 2rem;
        }

        .login-box {
            background: rgba(0, 0, 0, 0.85);
            border: 2px solid #00ffff;
            padding: 3rem;
            position: relative;
            clip-path: polygon(0 0, calc(100% - 30px) 0, 100% 30px, 100% 100%, 30px 100%, 0 calc(100% - 30px));
            box-shadow:
                0 0 40px rgba(0, 255, 255, 0.3),
                inset 0 0 40px rgba(0, 255, 255, 0.05);
            animation: boxFadeIn 0.6s ease-out;
        }

        @keyframes boxFadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-box::before {
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
            clip-path: polygon(0 0, calc(100% - 30px) 0, 100% 30px, 100% 100%, 30px 100%, 0 calc(100% - 30px));
        }

        .login-box:hover::before {
            opacity: 0.5;
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

        .corner-accent {
            position: absolute;
            width: 30px;
            height: 30px;
            border: 2px solid #00ffff;
            box-shadow: 0 0 10px #00ffff;
        }

        .corner-tl {
            top: -2px;
            left: -2px;
            border-right: none;
            border-bottom: none;
        }

        .corner-br {
            bottom: -2px;
            right: -2px;
            border-left: none;
            border-top: none;
        }

        .logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo-text {
            font-size: 2.5rem;
            font-weight: 900;
            letter-spacing: 3px;
            color: #00ffff;
            text-shadow:
                0 0 10px #00ffff,
                0 0 20px #00ffff,
                0 0 30px #00ffff;
            animation: glitch 5s infinite;
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

            93% {
                text-shadow:
                    -2px 0 10px #ff00ff,
                    2px 0 20px #00ffff,
                    0 0 30px #00ff00;
                transform: skew(-2deg);
            }

            95% {
                transform: skew(0deg);
            }
        }

        .header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .header h1 {
            font-size: 1.8rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #fff;
            margin-bottom: 0.5rem;
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
        }

        .header p {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.95rem;
            letter-spacing: 1px;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #00ffff;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 1px;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 1rem;
            background: rgba(0, 0, 0, 0.5);
            border: 2px solid rgba(0, 255, 255, 0.3);
            color: #fff;
            font-size: 1rem;
            transition: all 0.3s;
            font-family: 'Rajdhani', monospace;
            letter-spacing: 1px;
        }

        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="text"]:focus {
            outline: none;
            border-color: #00ffff;
            background: rgba(0, 0, 0, 0.7);
            box-shadow:
                0 0 20px rgba(0, 255, 255, 0.3),
                inset 0 0 20px rgba(0, 255, 255, 0.1);
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.3);
        }

        .password-wrapper {
            position: relative;
        }

        .forgot-link {
            position: absolute;
            top: 0;
            right: 0;
            color: #ff00ff;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
        }

        .forgot-link:hover {
            color: #00ffff;
            text-shadow: 0 0 10px #00ffff;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        input[type="checkbox"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
            appearance: none;
            border: 2px solid #00ffff;
            background: rgba(0, 0, 0, 0.5);
            position: relative;
            transition: all 0.3s;
        }

        input[type="checkbox"]:checked {
            background: #00ffff;
            box-shadow: 0 0 10px #00ffff;
        }

        input[type="checkbox"]:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #000;
            font-size: 14px;
            font-weight: 900;
        }

        .checkbox-label {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.95rem;
            cursor: pointer;
            user-select: none;
        }

        .btn {
            width: 100%;
            padding: 1rem 2rem;
            background: #00ffff;
            color: #000;
            border: 2px solid #00ffff;
            font-size: 1.1rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
            box-shadow:
                0 0 20px rgba(0, 255, 255, 0.5),
                inset 0 0 20px rgba(0, 255, 255, 0.2);
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.5), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn:hover {
            background: #000;
            color: #00ffff;
            box-shadow:
                0 0 30px rgba(0, 255, 255, 0.8),
                inset 0 0 20px rgba(0, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .btn:active {
            transform: translateY(0);
        }

        .divider {
            text-align: center;
            margin: 2rem 0;
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.9rem;
            letter-spacing: 1px;
        }

        .signup-link {
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.95rem;
            letter-spacing: 1px;
        }

        .signup-link a {
            color: #ff00ff;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s;
        }

        .signup-link a:hover {
            color: #00ffff;
            text-shadow: 0 0 10px #00ffff;
        }

        .status-message {
            padding: 1rem;
            margin-bottom: 1.5rem;
            background: rgba(0, 255, 0, 0.1);
            border: 1px solid rgba(0, 255, 0, 0.3);
            color: #00ff00;
            text-align: center;
            font-size: 0.9rem;
            letter-spacing: 1px;
            animation: fadeIn 0.5s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .back-home {
            position: fixed;
            top: 2rem;
            left: 2rem;
            z-index: 101;
            color: #00ffff;
            text-decoration: none;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.9rem;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .back-home:hover {
            text-shadow: 0 0 10px #00ffff;
            transform: translateX(-5px);
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .login-box {
                padding: 2rem 1.5rem;
            }

            .logo-text {
                font-size: 2rem;
            }

            .back-home {
                top: 1rem;
                left: 1rem;
                font-size: 0.8rem;
            }
        }
    </style>
</head>

<body>
    <div class="cyber-grid"></div>
    <div class="neon-glow glow-1"></div>
    <div class="neon-glow glow-2"></div>
    <div class="scanlines"></div>
    <div class="particles" id="particles"></div>

    <a href="/" class="back-home">
        <span>←</span>
        <span>Back to Home</span>
    </a>

    <div class="container">
        <div class="login-box">
            <div class="corner-accent corner-tl"></div>
            <div class="corner-accent corner-br"></div>

            <div class="logo">
                <div class="logo-text">OFFERGEN</div>
            </div>

            <div class="header">
                <h1>Access Terminal</h1>
                <p>// Enter credentials to continue //</p>
            </div>

            <!-- Session Status Message (uncomment when integrating with Laravel) -->
            <!-- <div class="status-message">
                Password reset link sent!
            </div> -->

            <form method="POST" action="{{ route('login.store') }}">
                <!-- CSRF Token (for Laravel) -->
                @csrf
                <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="user@example.com"
                        required
                        autofocus
                        autocomplete="email">
                </div>

                <div class="form-group">
                    <div class="password-wrapper">
                        <label for="password">Password</label>
                        <a href="/password/reset" class="forgot-link">Forgot?</a>
                    </div>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter password"
                        required
                        autocomplete="current-password">
                </div>

                <div class="checkbox-wrapper">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember" class="checkbox-label">Remember me</label>
                </div>

                <button type="submit" class="btn" data-test="login-button">
                    Initialize Login
                </button>
            </form>

            <!-- <div class="divider">// OR //</div>

            <div class="signup-link">
                Don't have an account?
                <a href="/register">Create One</a>
            </div> -->
        </div>
    </div>

    <script>
        // Generate floating particles
        const particlesContainer = document.getElementById('particles');
        for (let i = 0; i < 30; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 15 + 's';
            particle.style.animationDuration = (Math.random() * 10 + 15) + 's';
            particlesContainer.appendChild(particle);
        }

        // Add input glow effect on focus
        const inputs = document.querySelectorAll('input[type="email"], input[type="password"]');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.style.boxShadow = '0 0 20px rgba(0, 255, 255, 0.5), inset 0 0 20px rgba(0, 255, 255, 0.1)';
            });
            input.addEventListener('blur', function() {
                this.style.boxShadow = 'none';
            });
        });
    </script>
</body>

</html>