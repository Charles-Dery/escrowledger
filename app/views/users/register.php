<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Registration - Estate Ledger</title>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
                    "headline": ["Manrope"],
                    "body": ["Inter"],
                    "label": ["Inter"]
            }
          },
        },
      }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6, .font-headline { font-family: 'Manrope', sans-serif; }
    </style>
</head>
<body class="bg-surface text-on-surface antialiased min-h-screen flex selection:bg-secondary/20 selection:text-secondary">
<div class="hidden lg:flex lg:w-3/5 relative bg-surface-container-low h-screen sticky top-0">
<img alt="Luxury real estate exterior" class="absolute inset-0 w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDAcoYVUaxEZHk84KR8bqnjeS2X_11NvSd0BkWDBPcHYQ-vnSgpHs2r8P8J3KGUGvJ-YC1QS8uWdgv4cveKIZozg7-_yC_Y1C1POTPHSODzPsDultVLR7t1Iz41QSO1mgEPQTx5tfQYjZXfRJZoMzdFcO0Hw3jB17qJ0jNTeXhkoOedbsJ_n6GwZGrOpL_wiGQoVyhVb34LdWJpteLQhMAHlHjvJf22WcU9ivOqE3Er7xDbJQGSlyzRhTmhs6vMBVjMr1dSrAbhuu0"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/40 to-transparent mix-blend-multiply"></div>
<div class="absolute bottom-24 left-24 right-24">
<h2 class="font-headline text-5xl font-extrabold text-on-primary tracking-tight" style="letter-spacing: -0.02em;">
                The Architectural Curator
            </h2>
<p class="font-body text-lg text-primary-fixed mt-6 max-w-lg leading-relaxed">
                Elevating real estate management. Access exclusive portfolios, detailed analytics, and a seamless client experience designed for the modern luxury market.
            </p>
</div>
</div>
<div class="w-full lg:w-2/5 flex flex-col justify-start px-6 sm:px-12 xl:px-20 bg-surface-container-low relative z-10 overflow-y-auto py-12 shadow-[-20px_0_40px_rgba(24,28,30,0.05)]">
<div class="bg-surface-container-lowest rounded-xl p-8 sm:p-10 shadow-[0_32px_64px_0_rgba(24,28,30,0.03)] w-full max-w-md mx-auto my-auto">
<div class="mb-10">
<div class="flex items-center gap-3 mb-8">
<span class="material-symbols-outlined text-primary text-3xl" style="font-variation-settings: 'FILL' 1;">domain</span>
<span class="font-headline text-xl font-bold tracking-tight text-primary">Estate Ledger</span>
</div>
<h1 class="font-headline text-3xl font-bold text-on-surface tracking-tight mb-3" style="letter-spacing: -0.02em;">
                    Create an Account
                </h1>
<p class="font-body text-base text-on-surface-variant">
                    Enter your details to register for the platform.
                </p>
</div>
<form class="space-y-6" action="<?php echo URLROOT; ?>/users/register" method="post">
<div class="space-y-3">
<label class="font-body text-sm font-medium text-on-surface-variant block">Select your role</label>
<div class="grid grid-cols-2 gap-4">
<label class="relative cursor-pointer group">
<input <?php echo ($data['role'] == 'buyer') ? 'checked' : ''; ?> class="peer sr-only" name="role" type="radio" value="buyer"/>
<div class="h-32 bg-surface rounded-xl p-5 transition-all duration-300 border border-transparent peer-checked:bg-secondary/5 peer-checked:border-secondary/30 group-hover:bg-surface-container-highest flex flex-col items-start justify-between relative overflow-hidden">
<span class="material-symbols-outlined text-secondary text-2xl transition-transform group-hover:scale-110">vpn_key</span>
<div>
<span class="font-headline text-lg text-on-surface font-semibold block">Buyer</span>
<span class="font-body text-xs text-on-surface-variant mt-1 block">Explore properties</span>
</div>
<div class="absolute top-4 right-4 w-2 h-2 rounded-full bg-secondary opacity-0 peer-checked:opacity-100 transition-opacity"></div>
</div>
</label>
<label class="relative cursor-pointer group">
<input <?php echo ($data['role'] == 'agent') ? 'checked' : ''; ?> class="peer sr-only" name="role" type="radio" value="agent"/>
<div class="h-32 bg-surface rounded-xl p-5 transition-all duration-300 border border-transparent peer-checked:bg-primary/5 peer-checked:border-primary/30 group-hover:bg-surface-container-highest flex flex-col items-start justify-between relative overflow-hidden">
<span class="material-symbols-outlined text-primary text-2xl transition-transform group-hover:scale-110">real_estate_agent</span>
<div>
<span class="font-headline text-lg text-on-surface font-semibold block">Agent</span>
<span class="font-body text-xs text-on-surface-variant mt-1 block">Manage portfolios</span>
</div>
<div class="absolute top-4 right-4 w-2 h-2 rounded-full bg-primary opacity-0 peer-checked:opacity-100 transition-opacity"></div>
</div>
</label>
</div>
</div>
<div class="space-y-5">
<div class="space-y-2">
<label class="font-body text-sm font-medium text-on-surface-variant block">Full Name</label>
<div class="relative">
<div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
<span class="material-symbols-outlined text-outline/60 text-xl">person</span>
</div>
<input name="name" class="w-full bg-surface-container-highest text-on-surface font-body text-base rounded-lg pl-12 pr-4 py-3.5 border-none focus:ring-2 focus:ring-primary/40 focus:bg-surface-container-lowest transition-all placeholder:text-outline/50 <?php echo (!empty($data['name_err'])) ? 'ring-2 ring-error' : ''; ?>" placeholder="Jane Doe" type="text" value="<?php echo $data['name']; ?>"/>
</div>
<span class="text-error text-xs"><?php echo $data['name_err']; ?></span>
</div>
<div class="space-y-2">
<label class="font-body text-sm font-medium text-on-surface-variant block">Email Address</label>
<div class="relative">
<div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
<span class="material-symbols-outlined text-outline/60 text-xl">mail</span>
</div>
<input name="email" class="w-full bg-surface-container-highest text-on-surface font-body text-base rounded-lg pl-12 pr-4 py-3.5 border-none focus:ring-2 focus:ring-primary/40 focus:bg-surface-container-lowest transition-all placeholder:text-outline/50 <?php echo (!empty($data['email_err'])) ? 'ring-2 ring-error' : ''; ?>" placeholder="jane@example.com" type="email" value="<?php echo $data['email']; ?>"/>
</div>
<span class="text-error text-xs"><?php echo $data['email_err']; ?></span>
</div>
<div class="space-y-2">
<label class="font-body text-sm font-medium text-on-surface-variant block">Password</label>
<div class="relative">
<div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
<span class="material-symbols-outlined text-outline/60 text-xl">lock</span>
</div>
<input name="password" class="w-full bg-surface-container-highest text-on-surface font-body text-base rounded-lg pl-12 pr-4 py-3.5 border-none focus:ring-2 focus:ring-primary/40 focus:bg-surface-container-lowest transition-all placeholder:text-outline/50 <?php echo (!empty($data['password_err'])) ? 'ring-2 ring-error' : ''; ?>" placeholder="••••••••" type="password" value="<?php echo $data['password']; ?>"/>
</div>
<span class="text-error text-xs"><?php echo $data['password_err']; ?></span>
</div>
<div class="space-y-2">
<label class="font-body text-sm font-medium text-on-surface-variant block">Confirm Password</label>
<div class="relative">
<div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
<span class="material-symbols-outlined text-outline/60 text-xl">verified_user</span>
</div>
<input name="confirm_password" class="w-full bg-surface-container-highest text-on-surface font-body text-base rounded-lg pl-12 pr-4 py-3.5 border-none focus:ring-2 focus:ring-primary/40 focus:bg-surface-container-lowest transition-all placeholder:text-outline/50 <?php echo (!empty($data['confirm_password_err'])) ? 'ring-2 ring-error' : ''; ?>" placeholder="••••••••" type="password" value="<?php echo $data['confirm_password']; ?>"/>
</div>
<span class="text-error text-xs"><?php echo $data['confirm_password_err']; ?></span>
</div>
</div>
<button class="w-full bg-gradient-to-br from-primary to-primary-container text-on-primary font-body text-base font-medium rounded-full py-4 mt-8 hover:opacity-95 hover:shadow-lg transition-all duration-300 shadow-[0_16px_32px_-4px_rgba(24,28,30,0.1)] flex items-center justify-center gap-2" type="submit">
                    Create Account
                    <span class="material-symbols-outlined text-lg">arrow_forward</span>
</button>
<p class="text-center font-body text-sm text-on-surface-variant mt-8">
                    Already have an account? 
                    <a class="text-secondary font-medium hover:text-primary transition-colors" href="<?php echo URLROOT; ?>/users/login">Sign In</a>
</p>
</form>
</div>
<div class="mt-auto pt-12 text-center text-xs text-on-surface-variant font-body">
            © 2024 Estate Ledger. All rights reserved.
        </div>
</div>
</body></html>
