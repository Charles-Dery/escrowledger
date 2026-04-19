<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>User Approvals - Estate Ledger</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#002045",
                        "secondary": "#006a68",
                        "background": "#f7fafc",
                        "on-surface": "#181c1e",
                        "on-surface-variant": "#43474e",
                        "surface-container-low": "#f1f4f6",
                        "surface-container-lowest": "#ffffff",
                        "outline-variant": "#c4c6cf"
                    },
                    fontFamily: {
                        "headline": ["Manrope", "sans-serif"],
                        "body": ["Inter", "sans-serif"]
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-surface text-on-surface font-body antialiased flex min-h-screen">
<aside class="hidden md:flex flex-col h-full py-8 px-4 w-64 fixed left-0 top-0 bg-slate-50 font-manrope text-sm font-medium border-r border-outline-variant/15 z-40">
<div class="mb-10 px-4">
<h1 class="text-lg font-black text-slate-900 font-headline tracking-tight uppercase">Estate Ledger</h1>
<p class="text-[10px] text-on-surface-variant font-bold tracking-[0.2em] uppercase opacity-70">Admin Console</p>
</div>
<nav class="flex-1 space-y-1">
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-100 rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/dashboard">
<span class="material-symbols-outlined text-xl">dashboard</span>Dashboard
</a>
<a class="flex items-center gap-3 px-3 py-2.5 bg-teal-700 text-white shadow-sm rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/user_approvals">
<span class="material-symbols-outlined text-xl">fact_check</span>User Approvals
</a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-100 rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/property_catalog">
<span class="material-symbols-outlined text-xl">home</span>Property Catalog
</a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-100 rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/properties">
<span class="material-symbols-outlined text-xl">list</span>Properties List
</a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-100 rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/buyers">
<span class="material-symbols-outlined text-xl">group</span>Buyers
</a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-100 rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/transactions">
<span class="material-symbols-outlined text-xl">receipt_long</span>Transactions
</a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-100 rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/users">
<span class="material-symbols-outlined text-xl">manage_accounts</span>User Management
</a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-100 rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/add_property">
<span class="material-symbols-outlined text-xl">add</span>Add Property
</a>
</nav>
<div class="mt-auto pt-4 border-t border-surface-variant/30">
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-100 rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/users/logout">
<span class="material-symbols-outlined text-xl">logout</span>Sign Out
</a>
</div>
</aside>

<main class="flex-1 md:ml-64 min-h-screen bg-surface">
<header class="bg-white/80 backdrop-blur-xl sticky top-0 z-50 flex justify-between items-center px-8 h-20 w-full border-b border-surface-variant/30">
<h2 class="font-headline font-bold tracking-tight text-xl text-primary">User Approvals</h2>
<div class="flex items-center gap-4">
<p class="text-sm font-bold text-primary mr-2"><?php echo $_SESSION['user_name']; ?></p>
<img alt="Admin" class="w-9 h-9 rounded-full object-cover border border-surface-variant" src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&background=002045&color=fff"/>
</div>
</header>

<div class="p-8">
<?php flash('user_message'); ?>

<div class="mb-8">
<h1 class="font-headline font-extrabold text-2xl md:text-3xl tracking-tight text-primary mb-1">Pending User Registrations</h1>
<p class="font-body text-sm text-on-surface-variant">Approve or reject new user registrations</p>
</div>

<?php if(empty($data['pending_users'])): ?>
<div class="bg-surface-container-lowest rounded-xl p-12 text-center">
<span class="material-symbols-outlined text-6xl text-on-surface-variant mb-4">check_circle</span>
<h3 class="font-headline font-bold text-xl text-primary mb-2">All Caught Up!</h3>
<p class="font-body text-sm text-on-surface-variant">No pending user registrations to review</p>
</div>
<?php else: ?>
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
<?php foreach($data['pending_users'] as $user): ?>
<div class="bg-surface-container-lowest rounded-xl p-6 border border-outline-variant/10">
<div class="flex items-center gap-4 mb-4">
<img alt="<?php echo $user->name; ?>" class="w-14 h-14 rounded-full object-cover" src="https://ui-avatars.com/api/?name=<?php echo urlencode($user->name); ?>&background=random&color=fff"/>
<div>
<h3 class="font-headline font-bold text-primary"><?php echo $user->name; ?></h3>
<p class="font-body text-xs text-on-surface-variant"><?php echo $user->email; ?></p>
</div>
</div>
<div class="flex items-center gap-2 mb-6">
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
<span class="ml-auto">
<span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full bg-warning/20 text-warning text-xs font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-warning"></span>
Pending
</span>
</span>
</div>
<div class="text-xs text-on-surface-variant mb-4">
Registered: <?php echo date('M d, Y H:i', strtotime($user->created_at)); ?>
</div>
<div class="flex gap-2">
<form action="<?php echo URLROOT; ?>/admin/approve_user/<?php echo $user->id; ?>" method="POST" class="flex-1">
<button type="submit" class="w-full px-4 py-2 bg-secondary text-white rounded-lg text-sm font-medium hover:opacity-90 transition-opacity flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-sm">check</span>Approve
</button>
</form>
<form action="<?php echo URLROOT; ?>/admin/reject_user/<?php echo $user->id; ?>" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to reject this registration?');">
<button type="submit" class="w-full px-4 py-2 bg-error text-white rounded-lg text-sm font-medium hover:opacity-90 transition-opacity flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-sm">close</span>Reject
</button>
</form>
</div>
</div>
<?php endforeach; ?>
</div>
<?php endif; ?>
</div>
</main>
</body>
</html>