<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title><?php echo $data['property']->title; ?> - Estate Ledger</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
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
</head>
<body class="bg-surface text-on-surface font-body antialiased">

<!-- Mobile Menu Overlay -->
<div id="menu-overlay" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden" onclick="closeMenu()"></div>

<!-- Mobile Slide-out Nav -->
<div id="mobile-menu" class="fixed top-0 left-0 h-full w-64 bg-slate-50 z-50 transform -translate-x-full transition-transform duration-300 ease-in-out flex flex-col py-8 px-4 md:hidden">
    <div class="mb-10 px-4 flex justify-between items-center">
        <div>
            <h1 class="text-lg font-black text-slate-900 font-headline tracking-tight">Estate Ledger</h1>
            <p class="text-xs text-on-surface-variant mt-1">Buyer Portal</p>
        </div>
        <button onclick="closeMenu()" class="p-2 rounded-full hover:bg-surface-container-low transition-colors">
            <span class="material-symbols-outlined">close</span>
        </button>
    </div>
    <nav class="flex-1 space-y-2">
        <a class="flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-500 hover:text-teal-600 transition-all hover:bg-surface-container-low" href="<?php echo URLROOT; ?>/buyer/dashboard">
            <span class="material-symbols-outlined">dashboard</span>
            <span>Dashboard</span>
        </a>
        <a class="flex items-center space-x-3 px-4 py-3 rounded-lg text-teal-700 font-bold bg-surface-container-low" href="<?php echo URLROOT; ?>/buyer/catalog">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">real_estate_agent</span>
            <span>Properties</span>
        </a>
        <a class="flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-500 hover:text-teal-600 transition-all hover:bg-surface-container-low" href="<?php echo URLROOT; ?>/buyer/financials">
            <span class="material-symbols-outlined">account_balance_wallet</span>
            <span>Financials</span>
        </a>
        <a class="flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-500 hover:text-teal-600 transition-all hover:bg-surface-container-low" href="<?php echo URLROOT; ?>/users/profile">
            <span class="material-symbols-outlined">person</span>
            <span>Profile</span>
        </a>
    </nav>
    <div class="mt-auto pt-4 border-t border-outline-variant/15">
        <a class="flex items-center space-x-3 px-4 py-2 rounded-lg text-slate-500 hover:text-teal-600 transition-all" href="<?php echo URLROOT; ?>/users/logout">
            <span class="material-symbols-outlined text-lg">logout</span>
            <span class="text-xs">Sign Out</span>
        </a>
    </div>
</div>

<header class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl sticky top-0 z-30 flex justify-between items-center px-4 sm:px-8 h-20 w-full border-b border-outline-variant/15">
    <div class="flex items-center gap-4 sm:gap-12">
        <button onclick="openMenu()" class="md:hidden text-on-surface p-2 rounded-full hover:bg-surface-container-low transition-colors">
            <span class="material-symbols-outlined">menu</span>
        </button>
        <a class="text-xl font-extrabold tracking-tighter text-primary font-headline" href="<?php echo URLROOT; ?>/buyer/dashboard">Estate Ledger</a>
        <nav class="hidden md:flex gap-8 items-center h-full pt-1">
            <a class="font-inter text-on-surface-variant hover:text-primary transition-colors" href="<?php echo URLROOT; ?>/buyer/catalog">Catalog</a>
            <a class="font-inter text-on-surface-variant hover:text-primary transition-colors" href="<?php echo URLROOT; ?>/buyer/dashboard">Dashboard</a>
        </nav>
    </div>
    <div class="flex items-center gap-4 sm:gap-6">
        <div class="text-right hidden sm:block mr-2">
            <p class="text-sm font-bold text-primary"><?php echo $_SESSION['user_name']; ?></p>
        </div>
        <img alt="Profile" class="w-10 h-10 rounded-full object-cover border-2 border-surface-container-lowest" src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&background=002045&color=fff"/>
    </div>
</header>

<main class="max-w-screen-2xl mx-auto px-4 sm:px-8 py-8 lg:py-12">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
        <nav class="flex text-sm font-label text-on-surface-variant gap-2 items-center">
            <a class="hover:text-primary transition-colors" href="<?php echo URLROOT; ?>/buyer/catalog">Catalog</a>
            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
            <span class="text-on-surface font-medium"><?php echo $data['property']->title; ?></span>
        </nav>
        <div class="flex items-center gap-3">
            <span class="bg-surface-container-high text-on-surface px-3 py-1 rounded-full text-xs font-semibold tracking-wide uppercase font-label"><?php echo $data['property']->status; ?> Listing</span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 mb-12">
        <div class="lg:col-span-8 flex flex-col justify-end">
            <h1 class="font-headline text-4xl sm:text-5xl lg:text-6xl font-extrabold text-on-surface tracking-tight leading-[1.1] mb-4"><?php echo $data['property']->title; ?></h1>
            <p class="font-body text-lg text-on-surface-variant flex items-center gap-2">
                <span class="material-symbols-outlined text-[20px]">location_on</span>
                <?php echo $data['property']->location; ?>
            </p>
        </div>
        <div class="lg:col-span-4 flex flex-col lg:items-end justify-end border-t border-outline-variant/15 lg:border-t-0 pt-6 lg:pt-0">
            <div class="text-on-surface-variant font-label text-sm uppercase tracking-wider mb-1">Asking Price</div>
            <div class="font-headline text-4xl sm:text-5xl font-bold text-primary tracking-tight">$<?php echo number_format($data['property']->price); ?></div>
            <div class="mt-4 flex gap-4 w-full lg:w-auto">
                <form action="<?php echo URLROOT; ?>/buyer/save_property/<?php echo $data['property']->id; ?>" method="POST" class="flex-1 lg:flex-none">
                    <button type="submit" class="w-full flex items-center justify-center gap-2 bg-surface-container-high hover:bg-surface-variant text-on-surface font-body font-medium px-6 py-3 rounded-full transition-colors">
                        <span class="material-symbols-outlined text-[20px]">favorite</span> Save
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 lg:gap-6 mb-16 h-[300px] sm:h-[500px] lg:h-[600px]">
        <div class="lg:col-span-8 relative rounded-xl overflow-hidden bg-surface-container-low group cursor-pointer h-full">
            <img alt="Property Main Image" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="<?php echo !empty($data['property']->images) ? $data['property']->images[0]->image_url : 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=1200&q=80'; ?>"/>
        </div>
        <div class="hidden lg:grid col-span-4 grid-rows-2 gap-6 h-full">
            <div class="relative rounded-xl overflow-hidden bg-surface-container-low group cursor-pointer">
                <img alt="Gallery Image 1" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="<?php echo count($data['property']->images) > 1 ? $data['property']->images[1]->image_url : 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=800&q=80'; ?>"/>
            </div>
            <div class="relative rounded-xl overflow-hidden bg-surface-container-low group cursor-pointer">
                <img alt="Gallery Image 2" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="<?php echo count($data['property']->images) > 2 ? $data['property']->images[2]->image_url : 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&fit=crop&w=800&q=80'; ?>"/>
                <div class="absolute inset-0 bg-primary/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <span class="text-on-primary font-headline font-bold text-lg">View All Photos</span>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
        <div class="lg:col-span-8 flex flex-col gap-16">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-surface-container-lowest p-6 rounded-xl flex flex-col justify-center gap-2">
                    <span class="material-symbols-outlined text-primary text-[28px]" style="font-variation-settings: 'FILL' 1;">bed</span>
                    <div class="font-headline font-bold text-2xl text-on-surface"><?php echo $data['property']->bedrooms; ?></div>
                    <div class="font-label text-sm text-on-surface-variant uppercase tracking-wide">Bedrooms</div>
                </div>
                <div class="bg-surface-container-lowest p-6 rounded-xl flex flex-col justify-center gap-2">
                    <span class="material-symbols-outlined text-primary text-[28px]" style="font-variation-settings: 'FILL' 1;">bathtub</span>
                    <div class="font-headline font-bold text-2xl text-on-surface"><?php echo $data['property']->bathrooms; ?></div>
                    <div class="font-label text-sm text-on-surface-variant uppercase tracking-wide">Bathrooms</div>
                </div>
                <div class="bg-surface-container-lowest p-6 rounded-xl flex flex-col justify-center gap-2">
                    <span class="material-symbols-outlined text-primary text-[28px]" style="font-variation-settings: 'FILL' 1;">straighten</span>
                    <div class="font-headline font-bold text-2xl text-on-surface"><?php echo number_format($data['property']->sqft); ?></div>
                    <div class="font-label text-sm text-on-surface-variant uppercase tracking-wide">Square Feet</div>
                </div>
                <div class="bg-surface-container-lowest p-6 rounded-xl flex flex-col justify-center gap-2">
                    <span class="material-symbols-outlined text-primary text-[28px]" style="font-variation-settings: 'FILL' 1;">history</span>
                    <div class="font-headline font-bold text-2xl text-on-surface"><?php echo $data['property']->year_built; ?></div>
                    <div class="font-label text-sm text-on-surface-variant uppercase tracking-wide">Year Built</div>
                </div>
            </div>

            <section>
                <h2 class="font-headline text-2xl font-bold text-on-surface mb-6 tracking-tight">The Curation Notes</h2>
                <div class="prose prose-lg prose-slate font-body text-on-surface-variant leading-relaxed space-y-6">
                    <?php echo nl2br($data['property']->description); ?>
                </div>
            </section>
        </div>

        <div class="lg:col-span-4">
            <div class="sticky top-28 flex flex-col gap-6">
                <div class="bg-surface-container-lowest rounded-xl p-8 flex flex-col shadow-sm relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-24 bg-surface-container-low"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <img alt="Agent Profile" class="w-24 h-24 rounded-full object-cover border-4 border-surface-container-lowest shadow-sm mb-4" src="https://ui-avatars.com/api/?name=<?php echo urlencode($data['agent']->name); ?>&background=random&color=fff"/>
                        <h3 class="font-headline font-bold text-xl text-on-surface tracking-tight"><?php echo $data['agent']->name; ?></h3>
                        <p class="font-label text-sm text-on-surface-variant uppercase tracking-wider mb-6">Licensed Agent</p>
                        <div class="flex gap-4 mb-8">
                            <a class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center text-on-surface hover:bg-primary hover:text-on-primary transition-colors" href="mailto:<?php echo $data['agent']->email; ?>">
                                <span class="material-symbols-outlined text-[20px]">mail</span>
                            </a>
                        </div>
                    </div>
                    <form action="<?php echo URLROOT; ?>/buyer/inquire/<?php echo $data['property']->id; ?>" method="POST" class="flex flex-col gap-4 relative z-10">
                        <div>
                            <textarea class="w-full bg-surface-container-highest border-none rounded-lg px-4 py-3 font-body text-sm text-on-surface focus:ring-2 focus:ring-primary/40 focus:outline-none transition-all placeholder:text-on-surface-variant/60 resize-none" name="message" rows="3">I am interested in <?php echo $data['property']->title; ?>...</textarea>
                        </div>
                        <button class="mt-2 w-full bg-gradient-to-br from-primary to-primary-container text-on-primary font-body font-medium text-sm py-4 rounded-full transition-transform hover:scale-[0.98] shadow-sm" type="submit">
                            Express Interest / Buy
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function openMenu() {
        const menu = document.getElementById('mobile-menu');
        const overlay = document.getElementById('menu-overlay');
        menu.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeMenu() {
        const menu = document.getElementById('mobile-menu');
        const overlay = document.getElementById('menu-overlay');
        menu.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    document.querySelectorAll('#mobile-menu a').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 768) closeMenu();
        });
    });
</script>
</body>
</html>
