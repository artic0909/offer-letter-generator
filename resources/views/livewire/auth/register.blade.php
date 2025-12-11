<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - OfferGen</title>
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
            padding: 2rem 0;
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

        .glow-3 {
            background: radial-gradient(circle, rgba(0, 255, 0, 0.15) 0%, transparent 70%);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation-delay: 1s;
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
            max-width: 500px;
            padding: 2rem;
        }

        .register-box {
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

        .register-box::before {
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

        .register-box:hover::before {
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

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #00ffff;
            font-size: 0.9rem;
            user-select: none;
            transition: all 0.3s;
        }

        .password-toggle:hover {
            color: #ff00ff;
            text-shadow: 0 0 10px #ff00ff;
        }

        .input-wrapper {
            position: relative;
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
            margin-top: 1rem;
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

        .login-link {
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.95rem;
            letter-spacing: 1px;
        }

        .login-link a {
            color: #ff00ff;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s;
        }

        .login-link a:hover {
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

        .password-strength {
            margin-top: 0.5rem;
            font-size: 0.85rem;
            letter-spacing: 1px;
        }

        .strength-weak {
            color: #ff0000;
        }

        .strength-medium {
            color: #ffff00;
        }

        .strength-strong {
            color: #00ff00;
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem 0;
            }

            .container {
                padding: 1rem;
            }

            .register-box {
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

            .header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="cyber-grid"></div>
    <div class="neon-glow glow-1"></div>
    <div class="neon-glow glow-2"></div>
    <div class="neon-glow glow-3"></div>
    <div class="scanlines"></div>
    <div class="particles" id="particles"></div>

    <a href="/" class="back-home">
        <span>←</span>
        <span>Back to Home</span>
    </a>

    <div class="container">
        <div class="register-box">
            <div class="corner-accent corner-tl"></div>
            <div class="corner-accent corner-br"></div>

            <div class="logo">
                <div class="logo-text">OFFERGEN</div>
            </div>

            <div class="header">
                <h1>Create Account</h1>
                <p>// Initialize new user profile //</p>
            </div>

            <!-- Session Status Message -->
            <!-- Uncomment when integrating with Laravel
            <div class="status-message" style="display: none;">
                Account created successfully!
            </div>
            -->

            <form method="POST" action="{{ route('register.store') }}">
                <!-- CSRF Token (for Laravel) -->
                <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                @csrf

                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Enter your full name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        autocomplete="name">
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="user@example.com"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Create a strong password"
                            required
                            autocomplete="new-password">
                        <span class="password-toggle" onclick="togglePassword('password')">SHOW</span>
                    </div>
                    <div class="password-strength" id="password-strength"></div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <div class="input-wrapper">
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Re-enter your password"
                            required
                            autocomplete="new-password">
                        <span class="password-toggle" onclick="togglePassword('password_confirmation')">SHOW</span>
                    </div>
                </div>

                <button type="submit" class="btn" data-test="register-user-button">
                    Create Account
                </button>
            </form>

            <div class="divider">// OR //</div>

            <div class="login-link">
                Already have an account?
                <a href="{{ route('login') }}">Log In</a>
            </div>
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

        // Password toggle functionality
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const toggle = event.target;

            if (field.type === 'password') {
                field.type = 'text';
                toggle.textContent = 'HIDE';
            } else {
                field.type = 'password';
                toggle.textContent = 'SHOW';
            }
        }

        // Password strength checker
        const passwordInput = document.getElementById('password');
        const strengthIndicator = document.getElementById('password-strength');

        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;

            if (password.length >= 8) strength++;
            if (password.match(/[a-z]/)) strength++;
            if (password.match(/[A-Z]/)) strength++;
            if (password.match(/[0-9]/)) strength++;
            if (password.match(/[^a-zA-Z0-9]/)) strength++;

            if (password.length === 0) {
                strengthIndicator.textContent = '';
            } else if (strength <= 2) {
                strengthIndicator.textContent = '// WEAK PASSWORD //';
                strengthIndicator.className = 'password-strength strength-weak';
            } else if (strength <= 4) {
                strengthIndicator.textContent = '// MEDIUM STRENGTH //';
                strengthIndicator.className = 'password-strength strength-medium';
            } else {
                strengthIndicator.textContent = '// STRONG PASSWORD //';
                strengthIndicator.className = 'password-strength strength-strong';
            }
        });

        // Add input glow effect on focus
        const inputs = document.querySelectorAll('input[type="email"], input[type="password"], input[type="text"]');
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