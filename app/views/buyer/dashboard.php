<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Estate Ledger - Buyer Dashboard</title>
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
<h1 class="text-lg font-black text-slate-900 dark:text-slate-50 font-headline tracking-tight">Estate Ledger</h1>
<p class="text-xs text-on-surface-variant mt-1">Buyer Portal</p>
</div>
<nav class="flex-1 space-y-2">
<a class="flex items-center space-x-3 px-4 py-3 rounded-lg text-teal-700 dark:text-teal-400 font-bold border-r-2 border-teal-700 dark:border-teal-400 bg-surface-container-low translate-x-1 duration-200" href="<?php echo URLROOT; ?>/buyer/dashboard">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">dashboard</span>
<span>Dashboard</span>
</a>
<a class="flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-500 dark:text-slate-400 hover:text-teal-600 dark:hover:text-teal-300 transition-all hover:bg-surface-container-low" href="<?php echo URLROOT; ?>/buyer/catalog">
<span class="material-symbols-outlined">real_estate_agent</span>
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

<div class="flex-1 overflow-y-auto p-4 sm:p-8 lg:p-12 pb-32 md:pb-12 space-y-12">
    <?php flash('dashboard_message'); ?>
<div class="max-w-7xl mx-auto">
<h2 class="text-3xl md:text-4xl font-headline font-extrabold text-primary tracking-tight mb-2">Buyer Dashboard</h2>
<p class="text-on-surface-variant font-body text-sm md:text-base">Welcome back, <?php echo explode(' ', $_SESSION['user_name'])[0]; ?>. Here is the latest on your property investments.</p>
</div>

<div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
<div class="lg:col-span-8 space-y-12">
<!-- House Pictures (Priority) -->
<section class="space-y-6" data-aos="fade-up" data-aos-delay="0">
<div class="flex justify-between items-end">
<h3 class="font-headline text-2xl font-bold text-primary tracking-tight">Active Escrow</h3>
<?php if($data['active_escrow']): ?>
<span class="font-body text-xs font-semibold uppercase tracking-wider text-secondary bg-secondary-container px-3 py-1 rounded-full">In Progress</span>
<?php endif; ?>
</div>
<div class="bg-surface-container-lowest rounded-xl overflow-hidden p-4 group hover:bg-surface-container-high transition-colors duration-300">
<?php if($data['active_escrow']): ?>
<div class="relative aspect-video rounded-lg overflow-hidden mb-4">
<img alt="Current Property" class="w-full h-full object-cover" src="<?php echo !empty($data['active_escrow']->images) ? $data['active_escrow']->images[0]->image_url : 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=1200&q=80'; ?>"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent flex flex-col justify-end p-6">
<h4 class="font-headline text-on-primary text-xl md:text-3xl font-bold tracking-tight"><?php echo $data['active_escrow']->title; ?></h4>
<p class="font-body text-on-primary/80 text-sm md:text-base"><?php echo $data['active_escrow']->location; ?></p>
</div>
</div>
<div class="grid grid-cols-4 gap-2">
<?php foreach(array_slice($data['active_escrow']->images, 1, 4) as $image): ?>
<div class="aspect-square rounded-md overflow-hidden bg-surface-container-low">
<img alt="Gallery" class="w-full h-full object-cover opacity-80 hover:opacity-100 cursor-pointer transition-opacity" src="<?php echo $image->image_url; ?>"/>
</div>
<?php endforeach; ?>
</div>
<?php else: ?>
<div class="py-12 text-center">
    <span class="material-symbols-outlined text-6xl text-outline-variant mb-4">home_work</span>
    <p class="text-on-surface-variant">No active property purchases at the moment.</p>
</div>
<?php endif; ?>
</div>
</section>

<!-- Balance History (Priority) -->
<section class="space-y-6" data-aos="fade-up" data-aos-delay="80">
<div class="flex justify-between items-end">
<h3 class="font-headline text-2xl font-bold text-primary tracking-tight">Financial Ledger</h3>
</div>
<div class="bg-surface-container-lowest rounded-xl overflow-hidden pt-2">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-high border-b border-outline-variant/15">
<th class="py-4 px-6 font-body text-xs font-semibold text-on-surface-variant uppercase tracking-wider">Description</th>
<th class="py-4 px-6 font-body text-xs font-semibold text-on-surface-variant uppercase tracking-wider">Type</th>
<th class="py-4 px-6 font-body text-xs font-semibold text-on-surface-variant uppercase tracking-wider text-right">Amount</th>
</tr>
</thead>
<tbody class="font-body text-sm">
<?php if(!empty($data['balance_history'])): ?>
<?php foreach($data['balance_history'] as $record): ?>
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="py-4 px-6 font-medium text-on-surface border-b border-outline-variant/5"><?php echo $record->description; ?></td>
<td class="py-4 px-6 border-b border-outline-variant/5">
    <span class="inline-flex items-center space-x-1 <?php echo ($record->type == 'credit') ? 'text-secondary' : 'text-on-surface-variant'; ?>">
        <span class="material-symbols-outlined text-sm"><?php echo ($record->type == 'credit') ? 'arrow_downward' : 'arrow_upward'; ?></span>
        <span><?php echo ucfirst($record->type); ?></span>
    </span>
</td>
<td class="py-4 px-6 text-right font-medium <?php echo ($record->type == 'credit') ? 'text-secondary' : 'text-on-surface'; ?> border-b border-outline-variant/5">
    <?php echo ($record->type == 'debit') ? '-' : ''; ?>$<?php echo number_format($record->amount, 2); ?>
</td>
</tr>
<?php endforeach; ?>
<?php else: ?>
<tr>
    <td colspan="3" class="py-8 px-6 text-center text-on-surface-variant">No transaction history found.</td>
</tr>
<?php endif; ?>
</tbody>
</table>
</div>
</div>
</section>
</div>

<div class="lg:col-span-4 space-y-12">
<!-- Available Properties -->
<section class="space-y-6" data-aos="fade-up" data-aos-delay="140">
<div class="flex justify-between items-center">
<h3 class="font-headline text-xl font-bold text-primary tracking-tight">Available Properties</h3>
<a href="<?php echo URLROOT; ?>/buyer/catalog" class="text-secondary font-body text-sm font-medium hover:underline">Open Catalog</a>
</div>
<div class="space-y-4">
<?php if(!empty($data['available_properties'])): ?>
<?php foreach($data['available_properties'] as $i => $property): ?>
<div class="bg-surface-container-lowest rounded-xl overflow-hidden p-3 flex space-x-4 hover:bg-surface-container-high transition-colors duration-300 group" data-aos="fade-up" data-aos-delay="<?php echo 200 + (($i % 6) * 40); ?>">
<div class="w-24 h-24 rounded-lg overflow-hidden shrink-0 bg-surface-container-low">
<img alt="Property" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="<?php echo !empty($property->images) ? $property->images[0]->image_url : 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=200&q=80'; ?>"/>
</div>
<div class="flex flex-col justify-center flex-1">
<h4 class="font-headline font-bold text-on-surface text-sm mb-1 line-clamp-1"><?php echo $property->title; ?></h4>
<p class="font-body text-on-surface-variant text-xs mb-2 line-clamp-1"><?php echo $property->location; ?></p>
<div class="flex justify-between items-center">
<p class="font-headline font-bold text-primary text-sm tracking-tight">$<?php echo number_format($property->price); ?></p>
<div class="flex items-center gap-2">
<form action="<?php echo URLROOT; ?>/buyer/inquire/<?php echo $property->id; ?>" method="POST">
<button type="submit" class="px-3 py-1 rounded-full bg-primary text-white text-[10px] font-bold uppercase tracking-wider hover:opacity-90 transition-opacity">
Buy
</button>
</form>
<a href="<?php echo URLROOT; ?>/buyer/property/<?php echo $property->id; ?>" class="text-secondary font-body text-xs font-medium hover:underline">View</a>
</div>
</div>
</div>
</div>
<?php endforeach; ?>
<?php else: ?>
<div class="bg-surface-container-lowest rounded-xl p-6 text-center">
<p class="text-xs text-on-surface-variant mb-4">No available properties right now.</p>
<a href="<?php echo URLROOT; ?>/buyer/catalog" class="inline-flex items-center justify-center px-4 py-2 rounded-full bg-primary text-white text-xs font-bold uppercase tracking-wider hover:opacity-90 transition-opacity">
Browse Catalog
</a>
</div>
<?php endif; ?>
</div>
</section>

<!-- Saved Houses (Priority) -->
<section class="space-y-6">
<h3 class="font-headline text-xl font-bold text-primary tracking-tight">Saved Portfolio</h3>
<div class="space-y-4">
<?php if(!empty($data['saved_houses'])): ?>
<?php foreach($data['saved_houses'] as $property): ?>
<div class="bg-surface-container-lowest rounded-xl overflow-hidden p-3 flex space-x-4 hover:bg-surface-container-high transition-colors duration-300 group cursor-pointer">
<div class="w-24 h-24 rounded-lg overflow-hidden shrink-0 bg-surface-container-low">
<img alt="Saved Property" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="<?php echo !empty($property->images) ? $property->images[0]->image_url : 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=200&q=80'; ?>"/>
</div>
<div class="flex flex-col justify-center flex-1">
<h4 class="font-headline font-bold text-on-surface text-sm mb-1 line-clamp-1"><?php echo $property->title; ?></h4>
<p class="font-body text-on-surface-variant text-xs mb-2 line-clamp-1"><?php echo $property->location; ?></p>
<div class="flex justify-between items-center">
    <p class="font-headline font-bold text-secondary text-sm tracking-tight">$<?php echo number_format($property->price); ?></p>
    <div class="flex items-center gap-2">
        <form action="<?php echo URLROOT; ?>/buyer/inquire/<?php echo $property->id; ?>" method="POST">
            <button type="submit" class="px-3 py-1 rounded-full bg-primary text-white text-[10px] font-bold uppercase tracking-wider hover:opacity-90 transition-opacity">
                Buy
            </button>
        </form>
        <form action="<?php echo URLROOT; ?>/buyer/unsave_property/<?php echo $property->id; ?>" method="POST">
            <button type="submit" class="text-on-surface-variant hover:text-error transition-colors">
                <span class="material-symbols-outlined text-[18px]">delete</span>
            </button>
        </form>
    </div>
</div>
</div>
</div>
<?php endforeach; ?>
<?php else: ?>
<p class="text-xs text-on-surface-variant">Your saved properties will appear here.</p>
<?php endif; ?>
</div>
</section>

<!-- Recommended Properties (Priority) -->
<section class="space-y-6 pt-6 border-t border-outline-variant/15">
<div class="flex justify-between items-center">
<h3 class="font-headline text-xl font-bold text-primary tracking-tight">Curated For You</h3>
<button class="text-secondary font-body text-sm font-medium hover:underline">View All</button>
</div>
<div class="space-y-4">
<?php if(!empty($data['recommendations'])): ?>
<?php foreach($data['recommendations'] as $property): ?>
<div class="bg-surface-container-lowest rounded-xl overflow-hidden hover:bg-surface-container-high transition-colors duration-300 group cursor-pointer border border-outline-variant/15">
<div class="aspect-[16/9] overflow-hidden bg-surface-container-low">
<img alt="Recommended Property" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="<?php echo !empty($property->images) ? $property->images[0]->image_url : 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=400&q=80'; ?>"/>
</div>
<div class="p-4">
<h4 class="font-headline font-bold text-on-surface text-base mb-1"><?php echo $property->title; ?></h4>
<p class="font-body text-on-surface-variant text-xs mb-3"><?php echo $property->location; ?></p>
<div class="flex justify-between items-center">
<p class="font-headline font-bold text-primary text-base tracking-tight">$<?php echo number_format($property->price); ?></p>
<div class="flex items-center gap-2">
    <form action="<?php echo URLROOT; ?>/buyer/inquire/<?php echo $property->id; ?>" method="POST">
        <button type="submit" class="px-3 py-1 rounded-full bg-primary text-white text-[10px] font-bold uppercase tracking-wider hover:opacity-90 transition-opacity">
            Buy
        </button>
    </form>
    <a href="<?php echo URLROOT; ?>/buyer/property/<?php echo $property->id; ?>" class="text-secondary font-body text-xs font-medium hover:underline">
        View
    </a>
</div>
</div>
</div>
</div>
<?php endforeach; ?>
<?php else: ?>
<p class="text-xs text-on-surface-variant">Recommendations will appear here.</p>
<?php endif; ?>
</div>
</section>
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
