<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Estate Ledger - Login</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "secondary-fixed": "#94f2f0",
                        "on-primary-container": "#86a0cd",
                        "inverse-surface": "#2d3133",
                        "on-primary-fixed-variant": "#2d476f",
                        "tertiary-fixed": "#d8e3fa",
                        "on-background": "#181c1e",
                        "on-tertiary-fixed": "#111c2c",
                        "secondary-container": "#91f0ed",
                        "primary": "#002045",
                        "secondary": "#006a68",
                        "outline-variant": "#c4c6cf",
                        "surface-container-highest": "#e0e3e5",
                        "on-error": "#ffffff",
                        "inverse-primary": "#adc7f7",
                        "surface-variant": "#e0e3e5",
                        "primary-fixed": "#d6e3ff",
                        "surface": "#f7fafc",
                        "primary-container": "#1a365d",
                        "background": "#f7fafc",
                        "on-secondary": "#ffffff",
                        "on-primary": "#ffffff",
                        "surface-container-lowest": "#ffffff",
                        "surface-container-high": "#e5e9eb",
                        "on-secondary-fixed": "#00201f",
                        "error-container": "#ffdad6",
                        "surface-bright": "#f7fafc",
                        "surface-dim": "#d7dadc",
                        "on-tertiary-container": "#949fb4",
                        "on-primary-fixed": "#001b3c",
                        "on-tertiary": "#ffffff",
                        "surface-container": "#ebeef0",
                        "tertiary-container": "#2b3648",
                        "on-tertiary-fixed-variant": "#3c475a",
                        "tertiary": "#162132",
                        "secondary-fixed-dim": "#77d6d3",
                        "error": "#ba1a1a",
                        "primary-fixed-dim": "#adc7f7",
                        "inverse-on-surface": "#eef1f3",
                        "surface-container-low": "#f1f4f6",
                        "surface-tint": "#455f88",
                        "tertiary-fixed-dim": "#bcc7dd",
                        "on-secondary-container": "#006e6d",
                        "on-surface-variant": "#43474e",
                        "on-secondary-fixed-variant": "#00504e",
                        "on-surface": "#181c1e",
                        "outline": "#74777f",
                        "on-error-container": "#93000a"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "fontFamily": {
                        "headline": ["Manrope", "sans-serif"],
                        "body": ["Inter", "sans-serif"],
                        "label": ["Inter", "sans-serif"]
                    }
                },
            },
        }
    </script>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@400;600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .ambient-shadow {
            box-shadow: 0 16px 48px rgba(24, 28, 30, 0.08);
        }
        @keyframes fadeUp {
            0% { opacity: 0; transform: translateY(14px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @keyframes floaty {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }
        @keyframes shimmer {
            0% { transform: translateX(-120%); opacity: 0; }
            35% { opacity: 1; }
            100% { transform: translateX(120%); opacity: 0; }
        }
        .fade-up { animation: fadeUp 650ms ease-out both; }
        .floaty { animation: floaty 5s ease-in-out infinite; }
        .shimmer::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(110deg, transparent 0%, rgba(255,255,255,0.22) 45%, transparent 80%);
            transform: translateX(-120%);
            animation: shimmer 3.6s ease-in-out infinite;
            pointer-events: none;
        }
    </style>
</head>
<body class="bg-surface text-on-surface font-body antialiased min-h-screen flex selection:bg-secondary/20 selection:text-secondary">
    <div class="hidden lg:flex lg:w-3/5 relative bg-surface-container-low h-screen sticky top-0">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDwuHC96SaUv5F80m3iBAG9YMfZGUOn2lPNozdiG5fT7sn2lzMOZbCFDep8O6g9ki6p_0tT2AJkce4MpynRvaJz_3KonRjzgo_8f8OAaiBybUJOATA3zvSwI95LrYBO6LlPg5YCWF2Oa5uofLfnCffio94FAc1cIp4jiT01_QHmLwSNcaeSHfzpToiUUgVUbbstHwXKwv3oWSUnI635KboUxaBc3etuMf6xZTqluXRwzOUqo-WKZh-mTj2r6H49A3hXLdj_9uVAqWE');">
        </div>
        <div class="absolute inset-0 bg-primary/10 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-primary/40 via-transparent to-transparent"></div>
        <div class="absolute bottom-12 left-12">
            <p class="font-headline text-white/80 font-medium tracking-widest uppercase text-sm">Estate Curate Architecture</p>
        </div>
    </div>
    <div class="w-full lg:w-7/12 xl:w-1/2 flex flex-col justify-start items-center bg-surface px-6 sm:px-12 md:px-24 h-full overflow-y-auto py-12">
        <div class="w-full max-w-md flex flex-col my-auto fade-up">
            <div class="mb-12">
                <div class="w-12 h-12 bg-primary rounded-xl mb-8 flex items-center justify-center ambient-shadow floaty relative overflow-hidden shimmer">
                    <span class="material-symbols-outlined text-on-primary" style="font-variation-settings: 'FILL' 1;">domain</span>
                </div>
                <h1 class="font-headline text-4xl lg:text-5xl font-bold text-primary tracking-tight" style="letter-spacing: -0.02em;">Estate Ledger</h1>
                <?php flash('register_success'); ?>
                <p class="font-body text-on-surface-variant mt-4 text-lg leading-relaxed">Curated management for premium property portfolios. Enter your credentials to proceed.</p>
            </div>
            <form class="space-y-6 flex flex-col" action="<?php echo URLROOT; ?>/users/login" method="post">
                <div class="space-y-2">
                    <label class="font-label text-sm font-medium text-on-surface-variant block" for="email">Email Address</label>
                    <input autocomplete="email" name="email" class="w-full bg-surface-container-highest border-transparent rounded-xl py-3.5 px-4 text-on-surface placeholder:text-outline/60 focus:border-transparent focus:ring-2 focus:ring-primary/40 focus:bg-surface-container-lowest transition-all duration-200 <?php echo (!empty($data['email_err'])) ? 'border-error' : ''; ?>" id="email" placeholder="curator@estateledger.com" type="email" value="<?php echo $data['email']; ?>"/>
                    <span class="text-error text-xs"><?php echo $data['email_err']; ?></span>
                </div>
                <div class="space-y-2">
                    <div class="flex justify-between items-center">
                        <label class="font-label text-sm font-medium text-on-surface-variant block" for="password">Password</label>
                        <a class="font-label text-sm font-medium text-secondary hover:text-primary transition-colors duration-200" href="#">Forgot Password?</a>
                    </div>
                    <input autocomplete="current-password" name="password" class="w-full bg-surface-container-highest border-transparent rounded-xl py-3.5 px-4 text-on-surface placeholder:text-outline/60 focus:border-transparent focus:ring-2 focus:ring-primary/40 focus:bg-surface-container-lowest transition-all duration-200 <?php echo (!empty($data['password_err'])) ? 'border-error' : ''; ?>" id="password" placeholder="••••••••" type="password" value="<?php echo $data['password']; ?>"/>
                    <span class="text-error text-xs"><?php echo $data['password_err']; ?></span>
                </div>
                <div class="flex items-center pt-2 pb-4">
                    <input class="w-5 h-5 bg-surface-container-highest border-transparent rounded text-secondary focus:ring-2 focus:ring-primary/40 focus:ring-offset-0 focus:ring-offset-surface transition-all cursor-pointer" id="remember" type="checkbox"/>
                    <label class="ml-3 font-label text-sm text-on-surface-variant cursor-pointer select-none" for="remember">Remember this device</label>
                </div>
                <button class="w-full bg-gradient-to-br from-primary to-primary-container text-on-primary font-body text-base font-medium rounded-full py-4 px-8 mt-2 hover:opacity-90 transition-all duration-300 ambient-shadow flex justify-center items-center gap-2 group" type="submit">
                    <span>Access Portal</span>
                    <span class="material-symbols-outlined text-sm transition-transform group-hover:translate-x-1">arrow_forward</span>
                </button>
            </form>
            <div class="mt-16 text-center lg:text-left">
                <p class="font-label text-sm text-on-surface-variant">
                    Don't have an account? <a href="<?php echo URLROOT; ?>/users/register" class="text-secondary font-bold hover:underline">Register</a>
                </p>
                <p class="font-label text-xs text-on-surface-variant/70 mt-4">
                    © 2024 Estate Curate Systems. All rights reserved.
                </p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
