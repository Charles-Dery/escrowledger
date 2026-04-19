<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Estate Ledger - Admin Console | Approvals</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
                }
            }
        }
    </script>
<style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6, .font-headline { font-family: 'Manrope', sans-serif; }
        .btn-gradient {
            background: linear-gradient(135deg, #002045 0%, #1a365d 100%);
        }
    </style>
</head>
<body class="bg-background text-on-background font-body antialiased min-h-screen flex selection:bg-primary-fixed-dim selection:text-on-primary-fixed">
<!-- SideNavBar -->
<aside class="bg-slate-50 dark:bg-slate-950 h-screen w-64 fixed left-0 top-0 z-40 flex flex-col p-6 gap-4 border-r border-slate-200/50 dark:border-slate-800/50">
<div class="mb-8 px-2">
<h1 class="text-xl font-black text-primary tracking-tighter uppercase">Estate Ledger</h1>
<p class="text-[10px] text-on-surface-variant font-bold tracking-[0.2em] uppercase opacity-70">Admin Console</p>
</div>
<nav class="flex-1 space-y-1">
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg font-headline text-sm font-medium hover:translate-x-1 transition-transform duration-200" href="<?php echo URLROOT; ?>/admin/dashboard">
<span class="material-symbols-outlined text-xl">dashboard</span>
                Dashboard
            </a>
<a class="flex items-center gap-3 px-3 py-2.5 bg-white dark:bg-slate-900 text-teal-700 dark:text-teal-400 shadow-sm rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/user_approvals">
<span class="material-symbols-outlined text-xl" style="font-variation-settings: 'FILL' 1;">fact_check</span>
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

<!-- Main Content Area -->
<main class="flex-1 ml-64 bg-surface min-h-screen">
<!-- TopNavBar -->
<header class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl sticky top-0 z-50 flex justify-between items-center px-8 h-20 w-full border-b border-surface-variant/30">
<div class="hidden md:block">
<h2 class="text-2xl font-headline font-extrabold tracking-tight text-primary">Pending Approvals</h2>
</div>
<div class="flex items-center gap-6">
<div class="flex items-center gap-2">
<p class="text-sm font-bold text-primary mr-2"><?php echo $_SESSION['user_name']; ?></p>
<img alt="Admin Profile" class="w-9 h-9 rounded-full object-cover border border-surface-variant" src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&background=002045&color=fff"/>
</div>
</div>
</header>

<!-- Content Canvas -->
<div class="p-6 md:p-10 max-w-screen-2xl mx-auto">
<!-- Context & Filtering -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-6">
<div>
<p class="text-on-surface-variant font-body text-sm mb-1">Queue Overview</p>
<div class="flex items-end gap-3">
<span class="font-headline font-bold text-4xl tracking-tight text-primary"><?php echo $data['total_pending']; ?></span>
<span class="text-on-surface-variant font-body text-sm pb-1">listings require review</span>
</div>
</div>
</div>

<!-- Approval Queue -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
<div class="lg:col-span-8 flex flex-col gap-6">
<?php if(!empty($data['properties'])): ?>
<?php foreach($data['properties'] as $property): ?>
<article class="bg-surface-container-lowest rounded-xl flex flex-col sm:flex-row overflow-hidden hover:bg-surface-container-high transition-colors duration-300 shadow-sm relative">
<div class="w-full sm:w-2/5 h-48 sm:h-auto relative">
<img alt="Property Thumbnail" class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=400&q=80"/>
</div>
<div class="p-6 flex flex-col justify-between w-full sm:w-3/5">
<div>
<div class="flex justify-between items-start mb-2">
<h3 class="font-headline font-bold text-xl text-primary tracking-tight"><?php echo $property->title; ?></h3>
<span class="text-secondary font-headline font-bold">$<?php echo number_format($property->price); ?></span>
</div>
<p class="text-sm text-on-surface-variant font-body mb-4 flex items-center gap-1">
<span class="material-symbols-outlined text-[16px]">location_on</span>
                                    <?php echo $property->location; ?>
                                </p>
<div class="flex items-center gap-3 mb-6 bg-surface-container-low p-3 rounded-lg w-fit">
<img alt="Agent" class="w-8 h-8 rounded-full object-cover" src="https://ui-avatars.com/api/?name=<?php echo urlencode($property->agent_name); ?>&background=random&color=fff"/>
<div>
<p class="text-xs text-on-surface-variant uppercase tracking-wider">Submitted By</p>
<p class="text-sm font-medium text-on-surface"><?php echo $property->agent_name; ?></p>
</div>
</div>
</div>
<div class="flex gap-3 mt-4">
    <form action="<?php echo URLROOT; ?>/admin/approve/<?php echo $property->id; ?>" method="POST" class="flex-1">
        <button class="w-full btn-gradient text-on-primary font-body text-sm font-medium py-2.5 px-4 rounded-full flex items-center justify-center gap-2 hover:opacity-90 transition-opacity">
        <span class="material-symbols-outlined text-[18px]">check_circle</span>
                                            Approve
                                        </button>
    </form>
    <form action="<?php echo URLROOT; ?>/admin/reject/<?php echo $property->id; ?>" method="POST" class="flex-1">
        <button class="w-full bg-surface-container-highest text-on-surface font-body text-sm font-medium py-2.5 px-4 rounded-full flex items-center justify-center gap-2 hover:bg-surface-dim transition-colors border border-outline-variant/15">
        <span class="material-symbols-outlined text-[18px] text-error">cancel</span>
                                            Reject
                                        </button>
    </form>
</div>
</div>
</article>
<?php endforeach; ?>
<?php else: ?>
<div class="bg-surface-container-lowest rounded-xl p-12 text-center">
    <span class="material-symbols-outlined text-6xl text-outline-variant mb-4">fact_check</span>
    <p class="text-on-surface-variant">No pending approvals at the moment.</p>
</div>
<?php endif; ?>
</div>

<div class="lg:col-span-4 flex flex-col gap-6">
<div class="bg-primary text-on-primary rounded-xl p-6 relative overflow-hidden">
<div class="absolute -right-10 -top-10 w-40 h-40 bg-primary-container rounded-full opacity-50 blur-2xl"></div>
<h4 class="font-headline font-semibold text-lg mb-6 relative z-10">Today's Activity</h4>
<div class="grid grid-cols-2 gap-4 relative z-10">
<div>
<p class="text-xs text-primary-fixed-dim uppercase tracking-wider mb-1">Queue Status</p>
<p class="font-headline font-bold text-3xl"><?php echo $data['total_pending']; ?></p>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
</body>
</html>