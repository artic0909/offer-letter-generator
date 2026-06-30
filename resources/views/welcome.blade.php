<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OfferGen | RCPL</title>
    <link rel="icon" type="image/png" href="{{ asset('fav.png') }}">
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
        }
        
        .glass-nav {
            background: rgba(10, 10, 10, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .text-gradient {
            background: linear-gradient(135deg, #a855f7 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        
        .glass-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body class="bg-zinc-950 text-zinc-50 antialiased selection:bg-purple-500/30 selection:text-white min-h-screen flex flex-col">

    <!-- Background Decoration -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
        <div class="absolute -top-[20%] -left-[10%] w-[50%] h-[50%] rounded-full bg-purple-900/20 blur-[120px]"></div>
        <div class="absolute top-[40%] -right-[10%] w-[40%] h-[50%] rounded-full bg-blue-900/20 blur-[120px]"></div>
    </div>

    <!-- Navigation -->
    <nav class="fixed w-full z-50 glass-nav transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-purple-500 to-blue-600 flex items-center justify-center font-bold text-white shadow-lg shadow-purple-500/20">
                    O
                </div>
                <span class="font-bold text-xl tracking-tight">OfferGen <span class="text-zinc-500">| RCPL</span></span>
            </div>
            
            <div class="hidden md:flex items-center gap-8 text-sm font-medium text-zinc-400">
                <a href="#features" class="hover:text-white transition-colors duration-200">Features</a>
                <a href="#how-it-works" class="hover:text-white transition-colors duration-200">How it works</a>
                <a href="#pricing" class="hover:text-white transition-colors duration-200">Pricing</a>
            </div>

            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-zinc-300 hover:text-white transition-colors">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium px-4 py-2 rounded-full bg-white text-zinc-950 hover:bg-zinc-200 transition-all duration-200 shadow-[0_0_20px_rgba(255,255,255,0.1)] hover:shadow-[0_0_25px_rgba(255,255,255,0.2)]">
                        Get Started
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="flex-grow pt-32 pb-16 px-6 relative flex flex-col items-center justify-center min-h-[85vh]">
        <div class="max-w-4xl mx-auto text-center space-y-8">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-zinc-900/50 border border-zinc-800 text-xs font-medium text-zinc-400 mb-4 backdrop-blur-sm">
                <span class="flex h-2 w-2 rounded-full bg-purple-500 animate-pulse"></span>
                OfferGen | RCPL 2.0 is now live
            </div>
            
            <h1 class="text-5xl sm:text-6xl md:text-7xl font-bold tracking-tight text-white leading-[1.1]">
                Automate your <br/>
                <span class="text-gradient">offer letters</span> instantly.
            </h1>
            
            <p class="text-lg sm:text-xl text-zinc-400 max-w-2xl mx-auto leading-relaxed">
                Streamline your hiring process with our intelligent offer letter generator. 
                Create, manage, and track professional job offers in seconds, not hours.
            </p>
            
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
                <a href="{{ route('login') ?? '/login' }}" class="w-full sm:w-auto px-8 py-3.5 rounded-full bg-white text-zinc-950 font-medium hover:bg-zinc-200 transition-all duration-200 flex items-center justify-center gap-2">
                    Start Generating Now
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
                <a href="tel:+916292237205" class="w-full sm:w-auto px-8 py-3.5 rounded-full bg-zinc-900 border border-zinc-800 text-white font-medium hover:bg-zinc-800 transition-all duration-200 flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                    View Demo
                </a>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 pt-16 mt-8 border-t border-zinc-800/50">
                <div class="flex flex-col gap-1">
                    <span class="text-3xl font-bold text-white">99%</span>
                    <span class="text-sm text-zinc-500 font-medium uppercase tracking-wider">Time Saved</span>
                </div>
                <div class="flex flex-col gap-1">
                    <span class="text-3xl font-bold text-white">10k+</span>
                    <span class="text-sm text-zinc-500 font-medium uppercase tracking-wider">Offers Sent</span>
                </div>
                <div class="flex flex-col gap-1">
                    <span class="text-3xl font-bold text-white">0</span>
                    <span class="text-sm text-zinc-500 font-medium uppercase tracking-wider">Errors Made</span>
                </div>
                <div class="flex flex-col gap-1">
                    <span class="text-3xl font-bold text-white">24/7</span>
                    <span class="text-sm text-zinc-500 font-medium uppercase tracking-wider">Availability</span>
                </div>
            </div>
        </div>
    </main>

    <!-- Features Section -->
    <section id="features" class="py-24 px-6 relative z-10">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Everything you need to hire faster</h2>
                <p class="text-zinc-400 max-w-2xl mx-auto">Powerful features designed to optimize your HR workflow and provide a seamless experience for your new hires.</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-6">
                <div class="glass-card p-8 rounded-2xl">
                    <div class="w-12 h-12 rounded-xl bg-purple-500/10 flex items-center justify-center text-purple-400 mb-6 border border-purple-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Smart Templates</h3>
                    <p class="text-zinc-400 leading-relaxed text-sm">Choose from a library of attorney-approved templates or create your own custom offer letters with dynamic variables.</p>
                </div>

                <div class="glass-card p-8 rounded-2xl">
                    <div class="w-12 h-12 rounded-xl bg-blue-500/10 flex items-center justify-center text-blue-400 mb-6 border border-blue-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Instant Generation</h3>
                    <p class="text-zinc-400 leading-relaxed text-sm">Generate pixel-perfect PDF offer letters instantly. No more manual formatting or copy-pasting mistakes.</p>
                </div>

                <div class="glass-card p-8 rounded-2xl">
                    <div class="w-12 h-12 rounded-xl bg-green-500/10 flex items-center justify-center text-green-400 mb-6 border border-green-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Enterprise Security</h3>
                    <p class="text-zinc-400 leading-relaxed text-sm">Your data is secured with enterprise-grade encryption. SOC2 compliant architecture ensures total peace of mind.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t border-zinc-800/50 bg-zinc-950 mt-auto relative z-10">
        <div class="max-w-7xl mx-auto px-6 py-12 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 rounded-md bg-gradient-to-br from-purple-500 to-blue-600 flex items-center justify-center font-bold text-white text-xs">
                    O
                </div>
                <span class="font-bold text-zinc-300">OfferGen <span class="text-zinc-600">| RCPL</span></span>
            </div>
            
            <p class="text-sm text-zinc-500">
                &copy; {{ date('Y') }} OfferGen | RCPL. All rights reserved.
            </p>
            
            <div class="flex items-center gap-4 text-sm text-zinc-500">
                <a href="#" class="hover:text-zinc-300 transition-colors">Privacy</a>
                <a href="#" class="hover:text-zinc-300 transition-colors">Terms</a>
                <a href="#" class="hover:text-zinc-300 transition-colors">Contact</a>
            </div>
        </div>
    </footer>

</body>
</html>