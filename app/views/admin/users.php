<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>User Management - Estate Ledger</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
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
                      "headline": ["Manrope"],
                      "body": ["Inter"],
                      "label": ["Inter"]
              }
            },
          },
        }
    </script>
</head>
<body class="bg-background text-on-surface font-body antialiased flex h-screen overflow-hidden selection:bg-primary selection:text-on-primary">
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
<a class="flex items-center gap-3 px-3 py-2.5 bg-white dark:bg-slate-900 text-teal-700 dark:text-teal-400 shadow-sm rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/users">
<span class="material-symbols-outlined text-xl" style="font-variation-settings: 'FILL' 1;">manage_accounts</span>
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

<!-- Main Content Canvas -->
<main class="ml-64 flex-1 h-screen overflow-y-auto bg-surface relative">
<!-- TopNavBar -->
<header class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl sticky top-0 z-50 flex justify-between items-center px-8 h-20 w-full border-b border-surface-variant/30">
<div class="flex items-center gap-6">
<h2 class="font-headline font-bold tracking-tight text-xl text-primary">User Management</h2>
</div>
<div class="flex items-center gap-4">
<div class="relative group">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-sm">search</span>
<input class="w-72 bg-surface-container-highest border-0 rounded-full py-2 pl-9 pr-4 text-sm font-body text-on-surface focus:ring-2 focus:ring-primary/40 transition-all" placeholder="Search users..." type="text"/>
</div>
<div class="flex items-center gap-2">
<p class="text-sm font-bold text-primary mr-2"><?php echo $_SESSION['user_name']; ?></p>
<img alt="Admin Profile" class="w-9 h-9 rounded-full object-cover border border-surface-variant" src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&background=002045&color=fff"/>
</div>
</div>
</header>

<div class="max-w-screen-2xl mx-auto px-8 py-8">
<!-- Page Header area -->
<div class="flex justify-between items-end mb-8">
<div class="max-w-2xl">
<h2 class="font-headline text-3xl font-extrabold tracking-tight text-primary mb-2">System Users</h2>
<p class="font-body text-on-surface-variant text-base">Manage access and roles for all personnel.</p>
</div>
</div>

<!-- Bento Grid Metrics -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
<div class="bg-surface-container-lowest rounded-xl p-6 hover:bg-surface-container-high transition-colors duration-300">
<div class="flex items-center gap-3 mb-4">
<div class="w-10 h-10 rounded-full bg-primary-fixed-dim/20 flex items-center justify-center text-primary">
<span class="material-symbols-outlined">group</span>
</div>
<h3 class="font-label text-sm text-on-surface-variant">Total Users</h3>
</div>
<div class="font-headline text-3xl font-bold text-primary"><?php echo number_format($data['total_users']); ?></div>
</div>
<div class="bg-surface-container-lowest rounded-xl p-6 hover:bg-surface-container-high transition-colors duration-300">
<div class="flex items-center gap-3 mb-4">
<div class="w-10 h-10 rounded-full bg-secondary-fixed/30 flex items-center justify-center text-secondary">
<span class="material-symbols-outlined">shield_person</span>
</div>
<h3 class="font-label text-sm text-on-surface-variant">Active Agents</h3>
</div>
<div class="font-headline text-3xl font-bold text-primary"><?php echo number_format($data['active_agents']); ?></div>
</div>
<div class="bg-surface-container-lowest rounded-xl p-6 hover:bg-surface-container-high transition-colors duration-300">
<div class="flex items-center gap-3 mb-4">
<div class="w-10 h-10 rounded-full bg-surface-variant flex items-center justify-center text-on-surface">
<span class="material-symbols-outlined">manage_accounts</span>
</div>
<h3 class="font-label text-sm text-on-surface-variant">Pending Approvals</h3>
</div>
<div class="font-headline text-3xl font-bold text-primary"><?php echo $data['pending_approvals']; ?></div>
</div>
<div class="bg-surface-container-lowest rounded-xl p-6 hover:bg-surface-container-high transition-colors duration-300">
<div class="flex items-center gap-3 mb-4">
<div class="w-10 h-10 rounded-full bg-error-container flex items-center justify-center text-on-error-container">
<span class="material-symbols-outlined">person_off</span>
</div>
<h3 class="font-label text-sm text-on-surface-variant">Deactivated</h3>
</div>
<div class="font-headline text-3xl font-bold text-primary"><?php echo $data['deactivated']; ?></div>
</div>
</div>

<!-- Data Table Section -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-left font-body">
<thead>
<tr class="bg-surface-container-high">
<th class="py-4 px-6 font-label text-sm font-semibold text-on-surface uppercase tracking-wider">User</th>
<th class="py-4 px-6 font-label text-sm font-semibold text-on-surface uppercase tracking-wider">Role</th>
<th class="py-4 px-6 font-label text-sm font-semibold text-on-surface uppercase tracking-wider">Status</th>
<th class="py-4 px-6 font-label text-sm font-semibold text-on-surface uppercase tracking-wider text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/5">
<?php foreach($data['users'] as $user): ?>
<tr class="bg-surface group hover:bg-surface-container-low transition-colors">
<td class="py-5 px-6">
<div class="flex items-center gap-4">
<img alt="User profile" class="w-10 h-10 rounded-full object-cover" src="https://ui-avatars.com/api/?name=<?php echo urlencode($user->name); ?>&background=random&color=fff"/>
<div>
<div class="font-medium text-primary text-sm"><?php echo $user->name; ?></div>
<div class="text-xs text-on-surface-variant mt-0.5"><?php echo $user->email; ?></div>
</div>
</div>
</td>
<td class="py-5 px-6">
<div class="flex items-center gap-2">
    <?php 
    $roleIcons = [
        'admin' => 'admin_panel_settings',
        'agent' => 'real_estate_agent',
        'buyer' => 'person'
    ];
    $icon = $roleIcons[$user->role] ?? 'person';
    ?>
<span class="material-symbols-outlined text-sm text-secondary"><?php echo $icon; ?></span>
<span class="text-sm text-on-surface"><?php echo ucfirst($user->role); ?></span>
</div>
</td>
<td class="py-5 px-6">
    <?php if($user->status == 'active'): ?>
<span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full bg-secondary-fixed/30 text-on-secondary-fixed-variant text-xs font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                                        Active
                                    </span>
    <?php else: ?>
<span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full bg-error-container text-on-error-container text-xs font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-error"></span>
                                        Deactivated
                                    </span>
    <?php endif; ?>
</td>
<td class="py-5 px-6 text-right">
<div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<form action="<?php echo URLROOT; ?>/admin/toggle_user/<?php echo $user->id; ?>" method="POST">
<button class="p-1.5 text-on-surface-variant hover:text-primary rounded-lg hover:bg-surface-container-low transition-colors">
<span class="material-symbols-outlined text-[20px]"><?php echo $user->status == 'active' ? 'block' : 'check_circle'; ?></span>
</button>
</form>
</div>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</div>
</main>
</body>
</html>