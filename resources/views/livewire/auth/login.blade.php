<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - OfferGen | RCPL</title>
    <link rel="icon" type="image/png" href="{{ asset('fav.png') }}">
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        
        .input-field {
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.2s ease;
        }
        
        .input-field:focus {
            background: rgba(0, 0, 0, 0.4);
            border-color: #8b5cf6; /* purple-500 */
            box-shadow: 0 0 0 1px #8b5cf6;
        }
        
        .text-gradient {
            background: linear-gradient(135deg, #a855f7 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Custom checkbox */
        input[type="checkbox"] {
            appearance: none;
            background-color: rgba(0, 0, 0, 0.3);
            margin: 0;
            font: inherit;
            color: currentColor;
            width: 1.15em;
            height: 1.15em;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 0.25em;
            display: grid;
            place-content: center;
            transition: all 0.2s ease;
        }

        input[type="checkbox"]::before {
            content: "";
            width: 0.65em;
            height: 0.65em;
            transform: scale(0);
            transition: 120ms transform ease-in-out;
            box-shadow: inset 1em 1em white;
            background-color: white;
            transform-origin: center;
            clip-path: polygon(14% 44%, 0 65%, 50% 100%, 100% 16%, 80% 0%, 43% 62%);
        }

        input[type="checkbox"]:checked {
            background-color: #8b5cf6;
            border-color: #8b5cf6;
        }

        input[type="checkbox"]:checked::before {
            transform: scale(1);
        }
    </style>
</head>
<body class="bg-zinc-950 text-zinc-50 antialiased selection:bg-purple-500/30 selection:text-white min-h-screen flex flex-col justify-center items-center relative overflow-hidden">

    <!-- Background Decoration -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none -z-10">
        <div class="absolute -top-[20%] -left-[10%] w-[50%] h-[50%] rounded-full bg-purple-900/20 blur-[120px]"></div>
        <div class="absolute top-[40%] -right-[10%] w-[40%] h-[50%] rounded-full bg-blue-900/20 blur-[120px]"></div>
    </div>

    <!-- Back to home -->
    <a href="/" class="absolute top-8 left-8 flex items-center gap-2 text-zinc-400 hover:text-white transition-colors text-sm font-medium">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
        Back to Home
    </a>

    <div class="w-full max-w-md px-6 z-10">
        <!-- Logo -->
        <div class="flex flex-col items-center mb-8">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-500 to-blue-600 flex items-center justify-center font-bold text-white text-xl shadow-lg shadow-purple-500/20 mb-4">
                O
            </div>
            <h1 class="text-2xl font-bold tracking-tight text-white">Welcome back</h1>
            <p class="text-zinc-400 text-sm mt-2 text-center">Enter your credentials to access your account</p>
        </div>

        <!-- Login Card -->
        <div class="glass-card rounded-2xl p-8">
            <form method="POST" action="{{ route('login.store') }}" class="space-y-6">
                @csrf
                
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-zinc-300">Email Address</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="input-field w-full rounded-lg px-4 py-3 text-white placeholder-zinc-600 focus:outline-none"
                        placeholder="user@example.com"
                        required
                        autofocus
                        autocomplete="email">
                </div>

                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium text-zinc-300">Password</label>
                        <a href="/password/reset" class="text-xs font-medium text-purple-400 hover:text-purple-300 transition-colors">Forgot password?</a>
                    </div>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="input-field w-full rounded-lg px-4 py-3 text-white placeholder-zinc-600 focus:outline-none"
                        placeholder="••••••••"
                        required
                        autocomplete="current-password">
                </div>

                <div class="flex items-center gap-3">
                    <input type="checkbox" id="remember" name="remember" class="cursor-pointer">
                    <label for="remember" class="block text-sm text-zinc-400 cursor-pointer select-none">Remember me for 30 days</label>
                </div>

                <button type="submit" class="w-full py-3 px-4 rounded-lg bg-white text-zinc-950 font-medium hover:bg-zinc-200 transition-all duration-200 shadow-[0_0_20px_rgba(255,255,255,0.1)] hover:shadow-[0_0_25px_rgba(255,255,255,0.2)] flex justify-center items-center" data-test="login-button">
                    Sign in
                </button>
            </form>
            
            <div class="mt-8 text-center text-sm text-zinc-500">
                Don't have an account? <a href="/register" class="font-medium text-white hover:text-purple-400 transition-colors">Sign up</a>
            </div>
        </div>
        
        <div class="mt-8 text-center text-xs text-zinc-600">
            &copy; {{ date('Y') }} OfferGen | RCPL. All rights reserved.
        </div>
    </div>

</body>
</html>