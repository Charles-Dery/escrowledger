<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>System Analytics - Estate Ledger</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary": "#002045",
                        "secondary": "#006a68",
                        "background": "#f7fafc",
                        "on-surface": "#181c1e",
                        "on-surface-variant": "#43474e",
                        "surface-container-low": "#f1f4f6",
                        "surface-container-lowest": "#ffffff",
                        "outline-variant": "#c4c6cf"
                    },
                    "fontFamily": {
                        "headline": ["Manrope", "sans-serif"],
                        "body": ["Inter", "sans-serif"]
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-background text-on-surface font-body antialiased flex h-screen overflow-hidden">
<!-- SideNavBar -->
<aside class="bg-slate-50 dark:bg-slate-950 h-screen w-64 fixed left-0 top-0 z-40 flex flex-col p-6 gap-4 border-r border-slate-200/50 dark:border-slate-800/50">
<div class="mb-8 px-2">
<h1 class="text-xl font-black text-primary tracking-tighter uppercase">Estate Ledger</h1>
<p class="text-[10px] text-on-surface-variant font-bold tracking-[0.2em] uppercase opacity-70">Admin Console</p>
</div>
<nav class="flex-1 space-y-1">
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg font-headline text-sm font-medium hover:translate-x-1 transition-transform duration-200" href="<?php echo URLROOT; ?>/admin/approvals">
<span class="material-symbols-outlined text-xl">fact_check</span>
                Approvals
            </a>
<a class="flex items-center gap-3 px-3 py-2.5 bg-white dark:bg-slate-900 text-teal-700 dark:text-teal-400 shadow-sm rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/analytics">
<span class="material-symbols-outlined text-xl" style="font-variation-settings: 'FILL' 1;">analytics</span>
                Analytics
            </a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg font-headline text-sm font-medium hover:translate-x-1 transition-transform duration-200" href="<?php echo URLROOT; ?>/admin/users">
<span class="material-symbols-outlined text-xl">group</span>
                Users
            </a>
</nav>
<div class="mt-auto pt-4 border-t border-surface-variant/30">
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg font-headline text-sm font-medium hover:translate-x-1 transition-transform duration-200" href="<?php echo URLROOT; ?>/users/logout">
<span class="material-symbols-outlined text-xl">logout</span>
                Sign Out
            </a>
</div>
</aside>

<main class="ml-64 flex-1 h-screen overflow-y-auto bg-surface relative">
<header class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl sticky top-0 z-50 flex justify-between items-center px-8 h-20 w-full border-b border-surface-variant/30">
<h2 class="font-headline font-bold tracking-tight text-xl text-primary">System Analytics</h2>
<div class="flex items-center gap-4">
<p class="text-sm font-bold text-primary mr-2"><?php echo $_SESSION['user_name']; ?></p>
<img alt="Admin Profile" class="w-9 h-9 rounded-full object-cover border border-surface-variant" src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&background=002045&color=fff"/>
</div>
</header>

<div class="p-8 max-w-7xl mx-auto space-y-10">
<!-- KPI Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
<div class="bg-surface-container-lowest p-6 rounded-2xl shadow-sm border border-outline-variant/10">
<p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest mb-1">Total Revenue</p>
<h3 class="text-2xl font-headline font-extrabold text-primary">$<?php echo number_format($data['total_revenue'] / 1000000, 1); ?>M</h3>
<span class="text-[10px] text-secondary font-bold flex items-center gap-1 mt-2">
<span class="material-symbols-outlined text-xs">trending_up</span> +<?php echo $data['monthly_growth']; ?>% this month
</span>
</div>
<div class="bg-surface-container-lowest p-6 rounded-2xl shadow-sm border border-outline-variant/10">
<p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest mb-1">Active Listings</p>
<h3 class="text-2xl font-headline font-extrabold text-primary"><?php echo $data['active_listings']; ?></h3>
<span class="text-[10px] text-on-surface-variant font-bold flex items-center gap-1 mt-2">
<span class="material-symbols-outlined text-xs">home</span> System wide
</span>
</div>
<div class="bg-surface-container-lowest p-6 rounded-2xl shadow-sm border border-outline-variant/10">
<p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest mb-1">Avg. Close Time</p>
<h3 class="text-2xl font-headline font-extrabold text-primary"><?php echo $data['avg_close_time']; ?> Days</h3>
<span class="text-[10px] text-secondary font-bold flex items-center gap-1 mt-2">
<span class="material-symbols-outlined text-xs">bolt</span> -3 days vs last month
</span>
</div>
<div class="bg-surface-container-lowest p-6 rounded-2xl shadow-sm border border-outline-variant/10">
<p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest mb-1">Lead Conversion</p>
<h3 class="text-2xl font-headline font-extrabold text-primary">18.4%</h3>
<span class="text-[10px] text-on-surface-variant font-bold flex items-center gap-1 mt-2">
<span class="material-symbols-outlined text-xs">group</span> High engagement
</span>
</div>
</div>

<!-- Charts Row -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
<div class="lg:col-span-2 bg-surface-container-lowest p-8 rounded-2xl shadow-sm border border-outline-variant/10">
<div class="flex items-center justify-between mb-8">
<h4 class="font-headline font-bold text-lg text-primary">Revenue Growth</h4>
<div class="flex gap-2">
<button class="px-3 py-1 text-xs font-bold bg-primary text-on-primary rounded-full">Monthly</button>
<button class="px-3 py-1 text-xs font-bold text-on-surface-variant hover:bg-surface-container-high rounded-full transition-colors">Quarterly</button>
</div>
</div>
<!-- Mock Chart -->
<div class="h-64 flex items-end justify-between gap-4">
<div class="w-full bg-surface-container-high rounded-t-lg h-[40%] relative group">
<div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-primary text-on-primary text-[10px] py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition-opacity">$12M</div>
</div>
<div class="w-full bg-surface-container-high rounded-t-lg h-[55%] relative group"></div>
<div class="w-full bg-surface-container-high rounded-t-lg h-[45%] relative group"></div>
<div class="w-full bg-secondary/40 rounded-t-lg h-[70%] relative group"></div>
<div class="w-full bg-secondary/60 rounded-t-lg h-[85%] relative group"></div>
<div class="w-full bg-secondary rounded-t-lg h-[100%] relative group"></div>
</div>
<div class="flex justify-between mt-6 text-[10px] font-bold text-on-surface-variant uppercase tracking-widest">
<span>Jan</span><span>Feb</span><span>Mar</span><span>Apr</span><span>May</span><span>Jun</span>
</div>
</div>

<div class="bg-surface-container-lowest p-8 rounded-2xl shadow-sm border border-outline-variant/10 flex flex-col">
<h4 class="font-headline font-bold text-lg text-primary mb-8">Listing Distribution</h4>
<div class="flex-1 flex flex-col justify-center gap-6">
<div class="space-y-2">
<div class="flex justify-between text-xs font-bold uppercase tracking-widest">
<span class="text-on-surface">Residential</span>
<span class="text-on-surface-variant">64%</span>
</div>
<div class="h-2 w-full bg-surface-container-high rounded-full overflow-hidden">
<div class="h-full bg-primary w-[64%]"></div>
</div>
</div>
<div class="space-y-2">
<div class="flex justify-between text-xs font-bold uppercase tracking-widest">
<span class="text-on-surface">Commercial</span>
<span class="text-on-surface-variant">22%</span>
</div>
<div class="h-2 w-full bg-surface-container-high rounded-full overflow-hidden">
<div class="h-full bg-secondary w-[22%]"></div>
</div>
</div>
<div class="space-y-2">
<div class="flex justify-between text-xs font-bold uppercase tracking-widest">
<span class="text-on-surface">Land</span>
<span class="text-on-surface-variant">14%</span>
</div>
<div class="h-2 w-full bg-surface-container-high rounded-full overflow-hidden">
<div class="h-full bg-outline-variant w-[14%]"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
</body>
</html>