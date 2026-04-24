<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Financial Ledger - Estate Ledger</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
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
                "surface-container-high": "#e5e9eb",
                "outline-variant": "#c4c6cf",
                "error": "#ba1a1a",
                "primary-container": "#1a365d"
              },
              "fontFamily": {
                "headline": ["Manrope", "sans-serif"],
                "body": ["Inter", "sans-serif"]
              }
            },
          },
        }
    </script>
</head>
<body class="bg-surface font-body text-on-surface antialiased flex h-screen overflow-hidden">

<!-- Mobile Menu Overlay -->
<div id="menu-overlay" class="fixed inset-0 bg-black/50 z-30 hidden md:hidden" onclick="closeMenu()"></div>

<!-- SideNavBar -->
<aside id="sidebar" class="hidden md:flex flex-col h-full py-8 px-4 w-64 fixed left-0 top-0 bg-slate-50 dark:bg-slate-950 font-manrope text-sm font-medium border-r border-outline-variant/15 z-40">
    <div class="mb-10 px-4">
        <h1 class="text-lg font-black text-slate-900 dark:text-slate-50 font-headline tracking-tight uppercase">Estate Ledger</h1>
        <p class="text-[10px] text-on-surface-variant font-bold tracking-[0.2em] uppercase opacity-70">Buyer Portal</p>
    </div>
    <nav class="flex-1 space-y-2">
        <a class="flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-500 dark:text-slate-400 hover:text-teal-600 dark:hover:text-teal-300 transition-all hover:bg-surface-container-low" href="<?php echo URLROOT; ?>/buyer/dashboard">
            <span class="material-symbols-outlined">dashboard</span>
            <span>Dashboard</span>
        </a>
        <a class="flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-500 dark:text-slate-400 hover:text-teal-600 dark:hover:text-teal-300 transition-all hover:bg-surface-container-low" href="<?php echo URLROOT; ?>/buyer/catalog">
            <span class="material-symbols-outlined">real_estate_agent</span>
            <span>Properties</span>
        </a>
        <a class="flex items-center space-x-3 px-4 py-3 rounded-lg text-teal-700 dark:text-teal-400 font-bold border-r-2 border-teal-700 dark:border-teal-400 bg-surface-container-low translate-x-1 duration-200" href="<?php echo URLROOT; ?>/buyer/financials">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">account_balance_wallet</span>
            <span>Financials</span>
        </a>
        <a class="flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-500 dark:text-slate-400 hover:text-teal-600 dark:hover:text-teal-300 transition-all hover:bg-surface-container-low" href="<?php echo URLROOT; ?>/users/profile">
            <span class="material-symbols-outlined">person</span>
            <span>Profile</span>
        </a>
    </nav>
    <div class="mt-auto pt-4 border-t border-outline-variant/15">
        <a class="flex items-center space-x-3 px-4 py-2 rounded-lg text-slate-500 dark:text-slate-400 hover:text-teal-600 dark:hover:text-teal-300 transition-all" href="<?php echo URLROOT; ?>/users/logout">
            <span class="material-symbols-outlined text-lg">logout</span>
            <span class="text-xs">Sign Out</span>
        </a>
    </div>
</aside>

<main class="flex-1 flex flex-col md:ml-64 h-screen overflow-hidden bg-surface relative">
    <header class="flex justify-between items-center w-full px-6 py-3 bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl sticky top-0 z-50 shadow-sm border-b border-outline-variant/10">
        <div class="flex items-center gap-4">
            <button id="menu-btn" onclick="openMenu()" class="md:hidden text-on-surface p-2 rounded-full hover:bg-surface-container-low transition-colors">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <h2 class="font-headline font-bold text-xl text-primary">Financial Ledger</h2>
        </div>
        <div class="flex items-center gap-4">
            <div class="text-right hidden sm:block mr-2">
                <p class="text-sm font-bold text-primary"><?php echo $_SESSION['user_name']; ?></p>
            </div>
            <img alt="Profile" class="w-8 h-8 rounded-full object-cover border border-outline-variant/30" src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&background=002045&color=fff"/>
        </div>
    </header>

    <div class="flex-1 overflow-y-auto p-6 md:p-12 pb-32">
        <div class="max-w-5xl mx-auto space-y-10">
            <!-- Balance Card -->
            <div class="bg-gradient-to-br from-primary via-primary to-primary-container rounded-2xl p-8 text-on-primary shadow-xl relative overflow-hidden">
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-secondary/25 rounded-full blur-3xl"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>
                <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                    <div>
                        <p class="text-sm font-label uppercase tracking-widest text-white/85 mb-1">Remaining Balance</p>
                        <h3 class="text-4xl md:text-5xl font-headline font-extrabold tracking-tight text-white drop-shadow">$<?php echo number_format($data['total_balance'], 2); ?></h3>
                    </div>
                    <div class="flex gap-4">
                        <button class="bg-secondary text-on-primary px-6 py-3 rounded-full font-body text-sm font-medium transition-all shadow-lg hover:opacity-90">
                            Transfer History
                        </button>
                    </div>
                </div>
            </div>

            <!-- Ledger Table -->
            <div class="space-y-6">
                <div class="flex items-end justify-between">
                    <div>
                        <h4 class="font-headline font-bold text-2xl text-primary">Transaction History</h4>
                        <p class="text-sm text-on-surface-variant font-body">Complete record of your property payments and deposits.</p>
                    </div>
                    <button class="flex items-center gap-2 text-sm font-medium text-secondary hover:underline">
                        <span class="material-symbols-outlined text-[18px]">download</span> Export PDF
                    </button>
                </div>

                <div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm border border-outline-variant/10">
                    <table class="w-full text-left font-body">
                        <thead>
                            <tr class="bg-surface-container-high border-b border-outline-variant/15 text-[10px] font-bold text-on-surface-variant uppercase tracking-widest">
                                <th class="px-6 py-4">Description</th>
                                <th class="px-6 py-4">Type</th>
                                <th class="px-6 py-4 text-right">Amount</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/5">
                            <?php foreach($data['balance_history'] as $item): ?>
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="px-6 py-5">
                                    <p class="font-medium text-on-surface text-sm"><?php echo $item->description; ?></p>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="inline-flex items-center px-2 py-1 rounded text-[10px] font-bold tracking-wider uppercase <?php echo $item->type == 'credit' ? 'bg-secondary/10 text-secondary' : 'bg-error/10 text-error'; ?>">
                                        <?php echo $item->type; ?>
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-right font-headline font-bold text-sm <?php echo $item->type == 'credit' ? 'text-secondary' : 'text-on-surface'; ?>">
                                    <?php echo $item->type == 'credit' ? '+' : '-'; ?> $<?php echo number_format($item->amount, 2); ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function openMenu() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('menu-overlay');
        sidebar.classList.remove('hidden');
        sidebar.classList.add('flex');
        overlay.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeMenu() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('menu-overlay');
        sidebar.classList.add('hidden');
        sidebar.classList.remove('flex');
        overlay.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    // Close menu when any nav link is clicked on mobile
    document.querySelectorAll('#sidebar a').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 768) closeMenu();
        });
    });
</script>
</body>
</html>
