<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Admin Dashboard - Estate Ledger</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet"/>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
<a class="flex items-center gap-3 px-3 py-2.5 bg-white dark:bg-slate-900 text-teal-700 dark:text-teal-400 shadow-sm rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/dashboard">
<span class="material-symbols-outlined text-xl" style="font-variation-settings: 'FILL' 1;">dashboard</span>
                Dashboard
            </a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg font-headline text-sm font-medium hover:translate-x-1 transition-transform duration-200" href="<?php echo URLROOT; ?>/admin/user_approvals">
<span class="material-symbols-outlined text-xl">fact_check</span>
                User Approvals
            </a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg font-headline text-sm font-medium hover:translate-x-1 transition-transform duration-200" href="<?php echo URLROOT; ?>/admin/property_catalog">
<span class="material-symbols-outlined text-xl">home</span>
                Property Catalog
            </a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg font-headline text-sm font-medium hover:translate-x-1 transition-transform duration-200" href="<?php echo URLROOT; ?>/admin/buyers">
<span class="material-symbols-outlined text-xl">group</span>
                Buyers
            </a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg font-headline text-sm font-medium hover:translate-x-1 transition-transform duration-200" href="<?php echo URLROOT; ?>/admin/transactions">
<span class="material-symbols-outlined text-xl">receipt_long</span>
                Transactions
            </a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg font-headline text-sm font-medium hover:translate-x-1 transition-transform duration-200" href="<?php echo URLROOT; ?>/admin/users">
<span class="material-symbols-outlined text-xl">manage_accounts</span>
                User Management
            </a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg font-headline text-sm font-medium hover:translate-x-1 transition-transform duration-200" href="<?php echo URLROOT; ?>/users/profile">
<span class="material-symbols-outlined text-xl">person</span>
                Profile
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
<h2 class="font-headline font-bold tracking-tight text-xl text-primary">Overview Dashboard</h2>
<div class="flex items-center gap-4">
<p class="text-sm font-bold text-primary mr-2"><?php echo $_SESSION['user_name']; ?></p>
<img alt="Admin Profile" class="w-9 h-9 rounded-full object-cover border border-surface-variant" src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&background=002045&color=fff"/>
</div>
</header>

<div class="p-8 max-w-7xl mx-auto space-y-10">
<!-- KPI Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
<div class="bg-surface-container-lowest p-6 rounded-2xl shadow-sm border border-outline-variant/10" data-aos="fade-up" data-aos-delay="0">
<p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest mb-1">Total Users</p>
<h3 class="text-2xl font-headline font-extrabold text-primary"><?php echo number_format($data['total_users']); ?></h3>
<span class="text-[10px] text-on-surface-variant font-bold flex items-center gap-1 mt-2">
<span class="material-symbols-outlined text-xs">group</span> All roles
</span>
</div>
<div class="bg-surface-container-lowest p-6 rounded-2xl shadow-sm border border-outline-variant/10" data-aos="fade-up" data-aos-delay="60">
<p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest mb-1">Active Agents</p>
<h3 class="text-2xl font-headline font-extrabold text-primary"><?php echo number_format($data['active_agents']); ?></h3>
<span class="text-[10px] text-secondary font-bold flex items-center gap-1 mt-2">
<span class="material-symbols-outlined text-xs">shield_person</span> Verified
</span>
</div>
<div class="bg-surface-container-lowest p-6 rounded-2xl shadow-sm border border-outline-variant/10" data-aos="fade-up" data-aos-delay="120">
<p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest mb-1">Pending Approvals</p>
<h3 class="text-2xl font-headline font-extrabold text-primary"><?php echo $data['pending_approvals']; ?></h3>
<span class="text-[10px] text-on-surface-variant font-bold flex items-center gap-1 mt-2">
<span class="material-symbols-outlined text-xs">fact_check</span> Needs review
</span>
</div>
<div class="bg-surface-container-lowest p-6 rounded-2xl shadow-sm border border-outline-variant/10" data-aos="fade-up" data-aos-delay="180">
<p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest mb-1">Active Listings</p>
<h3 class="text-2xl font-headline font-extrabold text-primary"><?php echo $data['active_listings']; ?></h3>
<span class="text-[10px] text-on-surface-variant font-bold flex items-center gap-1 mt-2">
<span class="material-symbols-outlined text-xs">home</span> System wide
</span>
</div>
</div>

<!-- Quick Access Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
<div class="bg-surface-container-lowest p-8 rounded-2xl shadow-sm border border-outline-variant/10" data-aos="fade-up" data-aos-delay="0">
<h4 class="font-headline font-bold text-lg text-primary mb-6">Quick Actions</h4>
<div class="grid grid-cols-2 gap-4">
<a href="<?php echo URLROOT; ?>/admin/approvals" class="p-4 rounded-xl bg-surface-container-low hover:bg-primary hover:text-on-primary transition-all group">
<span class="material-symbols-outlined mb-2 group-hover:text-on-primary">fact_check</span>
<p class="font-bold text-sm">Review Listings</p>
<p class="text-xs opacity-70">Process pending property approvals</p>
</a>
<a href="<?php echo URLROOT; ?>/admin/users" class="p-4 rounded-xl bg-surface-container-low hover:bg-secondary hover:text-on-primary transition-all group">
<span class="material-symbols-outlined mb-2 group-hover:text-on-primary">group</span>
<p class="font-bold text-sm">Manage Users</p>
<p class="text-xs opacity-70">Control user accounts and access</p>
</a>
</div>
<div class="grid grid-cols-2 gap-4 mt-4">
<a href="<?php echo URLROOT; ?>/admin/add_property" class="p-4 rounded-xl bg-surface-container-low hover:bg-primary hover:text-on-primary transition-all group">
<span class="material-symbols-outlined mb-2 group-hover:text-on-primary">add</span>
<p class="font-bold text-sm">Add Property</p>
<p class="text-xs opacity-70">Create a new listing</p>
</a>
<a href="<?php echo URLROOT; ?>/admin/assign_purchase" class="p-4 rounded-xl bg-surface-container-low hover:bg-secondary hover:text-on-primary transition-all group">
<span class="material-symbols-outlined mb-2 group-hover:text-on-primary">home</span>
<p class="font-bold text-sm">Assign Purchase</p>
<p class="text-xs opacity-70">Set buyer current property</p>
</a>
</div>
</div>

<div class="bg-primary text-on-primary p-8 rounded-2xl shadow-xl relative overflow-hidden" data-aos="fade-up" data-aos-delay="90">
<div class="absolute -right-20 -top-20 w-64 h-64 bg-secondary/20 rounded-full blur-3xl"></div>
<h4 class="font-headline font-bold text-lg mb-4 relative z-10">System Status</h4>
<p class="text-on-primary/80 mb-6 relative z-10 text-sm leading-relaxed">
                        The Real Estate Management System is currently running smoothly. All services are operational and listing synchronization is active.
                    </p>
<div class="flex items-center gap-4 relative z-10">
<div class="flex items-center gap-2">
<span class="w-3 h-3 rounded-full bg-secondary animate-pulse"></span>
<span class="text-xs font-bold uppercase tracking-widest">Live</span>
</div>
<div class="h-1 w-24 bg-white/20 rounded-full overflow-hidden">
<div class="h-full bg-secondary w-full"></div>
</div>

<!-- Recent Activity Section -->
<div class="grid grid-cols-1 gap-8">
<div class="bg-surface-container-lowest p-8 rounded-2xl shadow-sm border border-outline-variant/10">
<div class="flex items-center justify-between mb-8">
<h4 class="font-headline font-bold text-lg text-primary">System Overview</h4>
<div class="flex gap-2">
<button class="px-3 py-1 text-xs font-bold bg-primary text-on-primary rounded-full">Monthly</button>
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
</div>
</div>
</div>
</div>
</div>
</main>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
AOS.init({ once: true, duration: 650, easing: 'ease-out-quart', disable: () => window.matchMedia('(prefers-reduced-motion: reduce)').matches });
</script>
</body>
</html>
