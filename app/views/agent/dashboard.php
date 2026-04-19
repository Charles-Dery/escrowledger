<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Agent Dashboard - Estate Ledger</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "primary-fixed-dim": "#adc7f7",
                    "on-surface-variant": "#43474e",
                    "error": "#ba1a1a",
                    "surface-tint": "#455f88",
                    "on-surface": "#181c1e",
                    "on-error-container": "#93000a",
                    "primary": "#002045",
                    "on-tertiary": "#ffffff",
                    "background": "#f7fafc",
                    "on-tertiary-fixed-variant": "#3c475a",
                    "outline-variant": "#c4c6cf",
                    "secondary": "#006a68",
                    "surface-variant": "#e0e3e5",
                    "on-secondary-container": "#006e6d",
                    "inverse-surface": "#2d3133",
                    "on-background": "#181c1e",
                    "surface-dim": "#d7dadc",
                    "on-primary-fixed": "#001b3c",
                    "secondary-fixed": "#94f2f0",
                    "on-primary-container": "#86a0cd",
                    "tertiary": "#162132",
                    "on-secondary-fixed": "#00201f",
                    "on-error": "#ffffff",
                    "inverse-on-surface": "#eef1f3",
                    "on-tertiary-fixed": "#111c2c",
                    "error-container": "#ffdad6",
                    "primary-container": "#1a365d",
                    "surface-container-highest": "#e0e3e5",
                    "tertiary-fixed": "#d8e3fa",
                    "surface": "#f7fafc",
                    "on-primary-fixed-variant": "#2d476f",
                    "surface-container": "#ebeef0",
                    "on-secondary": "#ffffff",
                    "secondary-fixed-dim": "#77d6d3",
                    "surface-container-low": "#f1f4f6",
                    "outline": "#74777f",
                    "on-primary": "#ffffff",
                    "secondary-container": "#91f0ed",
                    "primary-fixed": "#d6e3ff",
                    "on-tertiary-container": "#949fb4",
                    "surface-bright": "#f7fafc",
                    "on-secondary-fixed-variant": "#00504e",
                    "tertiary-fixed-dim": "#bcc7dd",
                    "tertiary-container": "#2b3648",
                    "surface-container-lowest": "#ffffff",
                    "inverse-primary": "#adc7f7",
                    "surface-container-high": "#e5e9eb"
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
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6, .font-headline { font-family: 'Manrope', sans-serif; }
    </style>
</head>
<body class="bg-surface text-on-surface min-h-screen flex antialiased">
<!-- SideNavBar -->
<nav class="h-screen w-64 fixed left-0 top-0 z-40 bg-surface-container-low flex flex-col p-6 gap-4 border-r border-outline-variant/15 font-headline text-sm font-medium">
<div class="mb-8 px-2">
<h1 class="text-xl font-black text-primary tracking-tighter uppercase">Estate Ledger</h1>
<p class="text-[10px] text-on-surface-variant font-bold tracking-[0.2em] uppercase opacity-70">Agent Portal</p>
</div>
<div class="flex-1 space-y-2">
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-secondary bg-surface-container-lowest shadow-sm hover:translate-x-1 transition-transform duration-200" href="<?php echo URLROOT; ?>/agent/dashboard">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">analytics</span>
<span>Dashboard</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-high hover:translate-x-1 transition-transform duration-200" href="<?php echo URLROOT; ?>/agent/inventory">
<span class="material-symbols-outlined">domain</span>
<span>Inventory</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-high hover:translate-x-1 transition-transform duration-200" href="<?php echo URLROOT; ?>/agent/inquiries">
<span class="material-symbols-outlined">group</span>
<span>Inquiries</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-high hover:translate-x-1 transition-transform duration-200" href="<?php echo URLROOT; ?>/users/profile">
<span class="material-symbols-outlined">person</span>
<span>Profile</span>
</a>
</div>
<div class="mt-auto pt-4 border-t border-outline-variant/15 space-y-4">
<a href="<?php echo URLROOT; ?>/agent/add_property" class="block w-full text-center py-3 px-4 rounded-full bg-gradient-to-br from-primary to-primary-container text-on-primary font-body text-sm font-medium hover:opacity-90 transition-opacity">
    Add Property
</a>
<a class="flex items-center gap-3 px-4 py-2 rounded-lg text-on-surface-variant hover:bg-surface-container-high transition-colors" href="<?php echo URLROOT; ?>/users/logout">
<span class="material-symbols-outlined">logout</span>
<span>Sign Out</span>
</a>
</div>
</nav>

<!-- Main Content Area -->
<main class="ml-64 flex-1 flex flex-col min-h-screen">
<!-- TopAppBar -->
<header class="h-20 w-full bg-surface/80 backdrop-blur-xl sticky top-0 z-30 px-8 flex justify-between items-center border-b border-outline-variant/10">
<h2 class="font-headline font-bold text-2xl tracking-tight text-primary">Overview</h2>
<div class="flex items-center gap-4">
<div class="text-right hidden sm:block mr-2">
    <p class="text-sm font-bold text-primary"><?php echo $_SESSION['user_name']; ?></p>
    <p class="text-[10px] text-on-surface-variant font-bold uppercase tracking-wider">Licensed Agent</p>
</div>
<div class="h-10 w-10 rounded-full bg-surface-container-high overflow-hidden border border-outline-variant/15 ml-2">
<img alt="Agent Profile" class="w-full h-full object-cover" src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&background=002045&color=fff"/>
</div>
</div>
</header>

<!-- Canvas -->
<div class="flex-1 p-8 pb-20">
<!-- KPI Metrics -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
<div class="bg-surface-container-lowest p-6 rounded-xl hover:bg-surface-container-high transition-colors duration-300">
<p class="font-body text-sm text-on-surface-variant mb-1 uppercase tracking-wider">Total Sales Volume</p>
<div class="flex items-end justify-between">
<h3 class="font-headline text-3xl font-bold text-primary tracking-tight">$<?php echo number_format($data['total_sales'] / 1000000, 1); ?>M</h3>
<span class="text-secondary font-body text-sm font-medium flex items-center">
<span class="material-symbols-outlined text-sm mr-1">trending_up</span> +12%
</span>
</div>
</div>
<div class="bg-surface-container-lowest p-6 rounded-xl hover:bg-surface-container-high transition-colors duration-300">
<p class="font-body text-sm text-on-surface-variant mb-1 uppercase tracking-wider">Active Listings</p>
<div class="flex items-end justify-between">
<h3 class="font-headline text-3xl font-bold text-primary tracking-tight"><?php echo $data['active_listings']; ?></h3>
<span class="text-on-surface-variant font-body text-sm font-medium">properties</span>
</div>
</div>
<div class="bg-surface-container-lowest p-6 rounded-xl hover:bg-surface-container-high transition-colors duration-300">
<p class="font-body text-sm text-on-surface-variant mb-1 uppercase tracking-wider">Pending Inquiries</p>
<div class="flex items-end justify-between">
<h3 class="font-headline text-3xl font-bold text-primary tracking-tight"><?php echo $data['pending_inquiries']; ?></h3>
<span class="text-secondary font-body text-sm font-medium flex items-center">
<span class="material-symbols-outlined text-sm mr-1">mail</span> Needs Reply
</span>
</div>
</div>
</div>

<!-- Main Layout Grid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
<!-- Listings Table -->
<div class="lg:col-span-2">
<div class="flex justify-between items-end mb-6">
<h3 class="font-headline text-xl font-bold text-primary">My Listings</h3>
<a class="font-body text-sm text-secondary hover:text-primary transition-colors" href="#">View All</a>
</div>
<div class="bg-surface-container-lowest rounded-xl overflow-hidden">
<div class="bg-surface-container-high px-6 py-4 border-b border-outline-variant/15">
<div class="grid grid-cols-12 gap-4 font-body text-xs text-on-surface-variant uppercase tracking-wider font-medium">
<div class="col-span-5">Property</div>
<div class="col-span-3">Price</div>
<div class="col-span-2">Status</div>
<div class="col-span-2 text-right">Actions</div>
</div>
</div>
<div class="divide-y divide-outline-variant/5">
<?php foreach($data['properties'] as $property): ?>
<div class="px-6 py-5 grid grid-cols-12 gap-4 items-center hover:bg-surface-container-low transition-colors group">
<div class="col-span-5 flex items-center gap-4">
<div class="w-16 h-12 rounded bg-surface-dim overflow-hidden relative">
<img alt="Property image" class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=200&q=80"/>
</div>
<div>
<p class="font-headline font-semibold text-on-surface"><?php echo $property->title; ?></p>
<p class="font-body text-xs text-on-surface-variant"><?php echo $property->location; ?></p>
</div>
</div>
<div class="col-span-3 font-body font-medium text-on-surface">$<?php echo number_format($property->price); ?></div>
<div class="col-span-2">
    <?php 
    $statusClasses = [
        'available' => 'bg-secondary/10 text-secondary',
        'pending' => 'bg-surface-dim text-on-surface-variant',
        'sold' => 'bg-primary/10 text-primary'
    ];
    $statusClass = $statusClasses[$property->status] ?? 'bg-surface-dim text-on-surface-variant';
    ?>
<span class="inline-flex items-center px-2 py-1 rounded text-[10px] font-bold tracking-wider uppercase <?php echo $statusClass; ?>">
    <?php echo $property->status; ?>
</span>
</div>
<div class="col-span-2 text-right opacity-0 group-hover:opacity-100 transition-opacity">
<button class="text-on-surface-variant hover:text-primary"><span class="material-symbols-outlined text-xl">more_horiz</span></button>
</div>
</div>
<?php endforeach; ?>
</div>
</div>
</div>

<!-- Performance Sidebar -->
<div class="lg:col-span-1 space-y-10">
<!-- Chart Area -->
<div>
<h3 class="font-headline text-xl font-bold text-primary mb-6">Lead Trends</h3>
<div class="bg-surface-container-lowest p-6 rounded-xl aspect-[4/3] flex flex-col justify-end relative overflow-hidden">
<div class="absolute inset-0 opacity-20 pointer-events-none" style="background: linear-gradient(to top, rgba(0, 106, 104, 0.2) 0%, transparent 100%);"></div>
<div class="flex items-end justify-between h-32 gap-2 relative z-10 w-full px-2">
<div class="w-1/6 bg-surface-container-high rounded-t-sm h-[30%]"></div>
<div class="w-1/6 bg-surface-container-high rounded-t-sm h-[45%]"></div>
<div class="w-1/6 bg-secondary/60 rounded-t-sm h-[60%]"></div>
<div class="w-1/6 bg-secondary/80 rounded-t-sm h-[85%]"></div>
<div class="w-1/6 bg-secondary rounded-t-sm h-[100%]"></div>
</div>
<div class="flex justify-between mt-4 text-[10px] font-body text-on-surface-variant uppercase tracking-wider">
<span>Mon</span>
<span>Tue</span>
<span>Wed</span>
<span>Thu</span>
<span>Fri</span>
</div>
</div>
</div>
<!-- Quick Actions / Promo -->
<div class="relative rounded-xl overflow-hidden bg-primary p-6 text-on-primary">
<div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
<h4 class="font-headline text-lg font-bold mb-2 relative z-10">Market Update</h4>
<p class="font-body text-sm text-on-primary/80 mb-6 relative z-10">Luxury sector showing 5% QoQ growth. Update your pricing strategies.</p>
<button class="font-body text-sm font-medium bg-on-primary text-primary px-4 py-2 rounded-full hover:bg-surface transition-colors relative z-10">
    Read Report
</button>
</div>
</div>
</div>
</div>
</main>
</body>
</html>