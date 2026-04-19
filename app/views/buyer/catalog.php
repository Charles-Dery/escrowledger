<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Estate Ledger - Property Catalog</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet"/>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary-fixed": "#d6e3ff",
                        "surface-dim": "#d7dadc",
                        "primary-container": "#1a365d",
                        "surface-variant": "#e0e3e5",
                        "on-tertiary": "#ffffff",
                        "inverse-on-surface": "#eef1f3",
                        "surface-container-low": "#f1f4f6",
                        "tertiary": "#162132",
                        "primary": "#002045",
                        "on-primary": "#ffffff",
                        "primary-fixed-dim": "#adc7f7",
                        "error": "#ba1a1a",
                        "surface-container-lowest": "#ffffff",
                        "on-secondary-container": "#006e6d",
                        "on-secondary-fixed-variant": "#00504e",
                        "inverse-primary": "#adc7f7",
                        "on-primary-fixed-variant": "#2d476f",
                        "on-secondary-fixed": "#00201f",
                        "secondary-container": "#91f0ed",
                        "secondary": "#006a68",
                        "surface-container": "#ebeef0",
                        "on-tertiary-fixed-variant": "#3c475a",
                        "secondary-fixed-dim": "#77d6d3",
                        "inverse-surface": "#2d3133",
                        "on-secondary": "#ffffff",
                        "outline-variant": "#c4c6cf",
                        "tertiary-container": "#2b3648",
                        "on-primary-fixed": "#001b3c",
                        "surface-container-highest": "#e0e3e5",
                        "on-surface-variant": "#43474e",
                        "on-tertiary-fixed": "#111c2c",
                        "surface-container-high": "#e5e9eb",
                        "error-container": "#ffdad6",
                        "background": "#f7fafc",
                        "on-surface": "#181c1e",
                        "on-error": "#ffffff",
                        "surface-bright": "#f7fafc",
                        "tertiary-fixed": "#d8e3fa",
                        "on-tertiary-container": "#949fb4",
                        "outline": "#74777f",
                        "tertiary-fixed-dim": "#bcc7dd",
                        "on-background": "#181c1e",
                        "on-primary-container": "#86a0cd",
                        "surface-tint": "#455f88",
                        "secondary-fixed": "#94f2f0",
                        "surface": "#f7fafc",
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
</head>
<body class="bg-surface font-body text-on-surface antialiased flex h-screen overflow-hidden">
<!-- SideNavBar -->
<aside class="hidden md:flex flex-col h-full py-8 px-4 w-64 fixed left-0 top-0 bg-slate-50 dark:bg-slate-950 font-manrope text-sm font-medium border-r border-outline-variant/15 z-40">
<div class="mb-10 px-4">
<h1 class="text-lg font-black text-slate-900 dark:text-slate-50 font-headline tracking-tight uppercase">Estate Ledger</h1>
<p class="text-[10px] text-on-surface-variant font-bold tracking-[0.2em] uppercase opacity-70">Buyer Portal</p>
</div>
<nav class="flex-1 space-y-2">
<a class="flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-500 dark:text-slate-400 hover:text-teal-600 dark:hover:text-teal-300 transition-all hover:bg-surface-container-low" href="<?php echo URLROOT; ?>/buyer/dashboard">
<span class="material-symbols-outlined">dashboard</span>
<span>Dashboard</span>
</a>
<a class="flex items-center space-x-3 px-4 py-3 rounded-lg text-teal-700 dark:text-teal-400 font-bold border-r-2 border-teal-700 dark:border-teal-400 bg-surface-container-low translate-x-1 duration-200" href="<?php echo URLROOT; ?>/buyer/catalog">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">real_estate_agent</span>
<span>Properties</span>
</a>
<a class="flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-500 dark:text-slate-400 hover:text-teal-600 dark:hover:text-teal-300 transition-all hover:bg-surface-container-low" href="<?php echo URLROOT; ?>/buyer/financials">
<span class="material-symbols-outlined">account_balance_wallet</span>
<span>Financials</span>
</a>
<a class="flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-500 dark:text-slate-400 hover:text-teal-600 dark:hover:text-teal-300 transition-all hover:bg-surface-container-low" href="<?php echo URLROOT; ?>/users/profile">
<span class="material-symbols-outlined">person</span>
<span>Profile</span>
</a>
</nav>
<div class="mt-auto space-y-4">
<div class="space-y-1">
<a class="flex items-center space-x-3 px-4 py-2 rounded-lg text-slate-500 dark:text-slate-400 hover:text-teal-600 dark:hover:text-teal-300 transition-all" href="<?php echo URLROOT; ?>/users/logout">
<span class="material-symbols-outlined text-lg">logout</span>
<span class="text-xs">Sign Out</span>
</a>
</div>
</div>
</aside>

<main class="flex-1 flex flex-col md:ml-64 h-screen overflow-hidden bg-surface relative">
<header class="flex justify-between items-center w-full px-6 py-3 bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl font-manrope tracking-tight docked full-width top-0 z-50 shadow-sm dark:shadow-none tonal transition via surface-container-low">
<div class="flex items-center flex-1">
<button class="md:hidden mr-4 text-on-surface p-2 rounded-full hover:bg-surface-container-low transition-colors">
<span class="material-symbols-outlined">menu</span>
</button>
<div class="relative w-full max-w-md hidden sm:block">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
<input class="w-full bg-surface-container-highest border-none rounded-full py-2 pl-10 pr-4 text-sm focus:ring-2 focus:ring-primary/40 focus:bg-surface-container-lowest transition-all text-on-surface placeholder-on-surface-variant" placeholder="Property Search" type="text"/>
</div>
</div>
<div class="flex items-center space-x-2 sm:space-x-4">
<div class="text-right hidden sm:block mr-2">
    <p class="text-sm font-bold text-primary"><?php echo $_SESSION['user_name']; ?></p>
    <p class="text-xs text-on-surface-variant uppercase"><?php echo $_SESSION['user_role']; ?></p>
</div>
<div class="w-8 h-8 rounded-full overflow-hidden border border-outline-variant/30 ml-2">
<img alt="User profile" class="w-full h-full object-cover" src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&background=002045&color=fff"/>
</div>
</div>
</header>

<div class="flex-1 overflow-y-auto p-4 sm:p-8 lg:p-12 pb-32 md:pb-12 space-y-8">
    <?php flash('catalog_message'); ?>
<div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-8">
<!-- Filters Sidebar -->
<aside class="w-full lg:w-72 flex-shrink-0">
<form action="<?php echo URLROOT; ?>/buyer/catalog" method="GET" class="bg-surface-container-lowest rounded-xl p-6 shadow-sm">
<div class="flex items-center justify-between mb-6">
<h2 class="font-headline font-bold text-lg text-primary">Filters</h2>
<a href="<?php echo URLROOT; ?>/buyer/catalog" class="text-sm font-body font-medium text-secondary hover:underline">Clear All</a>
</div>
<div class="space-y-6">
<!-- Location -->
<div>
<label class="block font-body text-sm font-medium text-on-surface mb-2">Location</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-sm">location_on</span>
<input name="location" class="w-full bg-surface-container-highest border-0 rounded-lg py-2.5 pl-10 pr-4 text-sm font-body text-on-surface focus:ring-2 focus:ring-primary/40 transition-all" placeholder="City, State" type="text" value="<?php echo $data['filters']['location']; ?>"/>
</div>
</div>
<!-- Price Range -->
<div>
<label class="block font-body text-sm font-medium text-on-surface mb-2">Price Range</label>
<div class="flex items-center gap-2">
<input name="min_price" class="w-full bg-surface-container-highest border-0 rounded-lg py-2.5 px-3 text-sm font-body text-on-surface focus:ring-2 focus:ring-primary/40 transition-all" placeholder="$ Min" type="number" value="<?php echo $data['filters']['min_price']; ?>"/>
<span class="text-on-surface-variant">-</span>
<input name="max_price" class="w-full bg-surface-container-highest border-0 rounded-lg py-2.5 px-3 text-sm font-body text-on-surface focus:ring-2 focus:ring-primary/40 transition-all" placeholder="$ Max" type="number" value="<?php echo $data['filters']['max_price']; ?>"/>
</div>
</div>
<!-- Property Type -->
<div>
<label class="block font-body text-sm font-medium text-on-surface mb-2">Property Type</label>
<div class="space-y-2">
<?php 
$types = ['residential', 'commercial', 'land'];
foreach($types as $type): 
    $checked = in_array($type, $data['filters']['types']) ? 'checked' : '';
?>
<label class="flex items-center gap-3 cursor-pointer group">
<input name="types[]" value="<?php echo $type; ?>" <?php echo $checked; ?> class="w-4 h-4 rounded text-primary focus:ring-primary border-outline-variant bg-surface-container-highest" type="checkbox"/>
<span class="font-body text-sm text-on-surface group-hover:text-primary transition-colors"><?php echo ucfirst($type); ?></span>
</label>
<?php endforeach; ?>
</div>
</div>
<button type="submit" class="w-full bg-gradient-to-br from-primary to-primary-container text-on-primary py-3 rounded-full font-body text-sm font-medium hover:opacity-90 transition-opacity mt-4">
    Apply Filters
</button>
</div>
</form>
</aside>

<!-- Property Grid -->
<div class="flex-1">
<div class="flex items-center justify-between mb-8">
<div>
<h1 class="font-headline font-extrabold text-2xl md:text-3xl tracking-tight text-primary mb-1">Property Catalog</h1>
<p class="font-body text-sm text-on-surface-variant">Showing <?php echo count($data['properties']); ?> available properties</p>
</div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
<?php foreach($data['properties'] as $i => $property): ?>
<article class="group bg-surface-container-lowest rounded-xl overflow-hidden flex flex-col transition-all duration-300 hover:shadow-xl hover:-translate-y-1 cursor-pointer relative border border-outline-variant/10" data-aos="fade-up" data-aos-delay="<?php echo ($i % 9) * 50; ?>">
<a href="<?php echo URLROOT; ?>/buyer/property/<?php echo $property->id; ?>" class="absolute inset-0 z-10"></a>
<div class="relative aspect-[4/3] overflow-hidden">
<img alt="<?php echo $property->title; ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="<?php echo !empty($property->images) ? $property->images[0]->image_url : 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=800&q=80'; ?>"/>
<div class="absolute top-4 left-4 bg-surface-container-lowest/90 backdrop-blur-md px-3 py-1 rounded-full flex items-center gap-1 z-20">
<span class="w-2 h-2 rounded-full bg-secondary"></span>
<span class="font-body text-[10px] font-bold text-on-surface uppercase tracking-wider"><?php echo $property->status; ?></span>
</div>
<form action="<?php echo URLROOT; ?>/buyer/save_property/<?php echo $property->id; ?>" method="POST" class="absolute top-4 right-4 z-20">
<button type="submit" class="w-8 h-8 rounded-full bg-surface-container-lowest/80 backdrop-blur-md flex items-center justify-center text-on-surface-variant hover:text-error transition-colors">
<span class="material-symbols-outlined text-sm">favorite</span>
</button>
</form>
</div>
<div class="p-5 flex flex-col flex-1">
<div class="flex justify-between items-start mb-2">
<h3 class="font-headline font-bold text-xl text-primary tracking-tight leading-tight">$<?php echo number_format($property->price); ?></h3>
</div>
<p class="font-headline font-bold text-on-surface text-sm mb-1 line-clamp-1"><?php echo $property->title; ?></p>
<p class="font-body text-xs text-on-surface-variant mb-4 line-clamp-1"><?php echo $property->location; ?></p>
<div class="mt-auto grid grid-cols-3 gap-2 pt-4 border-t border-outline-variant/15">
<div class="flex items-center gap-1.5 text-on-surface">
<span class="material-symbols-outlined text-sm text-on-surface-variant">bed</span>
<span class="font-body text-xs font-medium"><?php echo $property->bedrooms; ?> <span class="text-on-surface-variant font-normal">bd</span></span>
</div>
<div class="flex items-center gap-1.5 text-on-surface">
<span class="material-symbols-outlined text-sm text-on-surface-variant">shower</span>
<span class="font-body text-xs font-medium"><?php echo $property->bathrooms; ?> <span class="text-on-surface-variant font-normal">ba</span></span>
</div>
<div class="flex items-center gap-1.5 text-on-surface">
<span class="material-symbols-outlined text-sm text-on-surface-variant">straighten</span>
<span class="font-body text-xs font-medium"><?php echo number_format($property->sqft); ?> <span class="text-on-surface-variant font-normal">sqft</span></span>
</div>
</div>
</div>
</article>
<?php endforeach; ?>
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
