<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Assign Purchase - Estate Ledger</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-100 rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/approvals">
<span class="material-symbols-outlined text-xl">fact_check</span>Approvals
</a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-100 rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/property_catalog">
<span class="material-symbols-outlined text-xl">home</span>Property Catalog
</a>
<a class="flex items-center gap-3 px-3 py-2.5 bg-teal-700 text-white shadow-sm rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/buyers">
<span class="material-symbols-outlined text-xl">group</span>Buyers
</a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-100 rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/transactions">
<span class="material-symbols-outlined text-xl">receipt_long</span>Transactions
</a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-100 rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/users">
<span class="material-symbols-outlined text-xl">manage_accounts</span>User Management
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
<div class="flex items-center gap-4">
<a href="<?php echo URLROOT; ?>/admin/buyers" class="p-2 rounded-lg hover:bg-surface-container-low transition-colors">
<span class="material-symbols-outlined text-on-surface-variant">arrow_back</span>
</a>
<h2 class="font-headline font-bold tracking-tight text-xl text-primary">Assign Current Purchase</h2>
</div>
<div class="flex items-center gap-4">
<p class="text-sm font-bold text-primary mr-2"><?php echo $_SESSION['user_name']; ?></p>
<img alt="Admin" class="w-9 h-9 rounded-full object-cover border border-surface-variant" src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&background=002045&color=fff"/>
</div>
</header>

<div class="p-8 max-w-3xl mx-auto">
<?php flash('buyer_message'); ?>

<form action="<?php echo URLROOT; ?>/admin/assign_purchase<?php echo !empty($data['buyer_id']) ? '/' . $data['buyer_id'] : ''; ?>" method="POST" class="bg-surface-container-lowest rounded-xl p-8 shadow-sm space-y-6">
<div>
<label class="block font-body text-sm font-medium text-on-surface mb-2">Buyer</label>
<select name="buyer_id" required class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-sm">
<option value="">Select buyer...</option>
<?php foreach($data['buyers'] as $buyer): ?>
<option value="<?php echo $buyer->id; ?>" <?php echo (!empty($data['buyer_id']) && $data['buyer_id'] == $buyer->id) ? 'selected' : ''; ?>><?php echo $buyer->name; ?> (<?php echo $buyer->email; ?>)</option>
<?php endforeach; ?>
</select>
</div>

<div>
<label class="block font-body text-sm font-medium text-on-surface mb-2">Property (Available only)</label>
<select name="property_id" required class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-sm">
<option value="">Select property...</option>
<?php foreach($data['properties'] as $p): ?>
<option value="<?php echo $p->id; ?>"><?php echo $p->title; ?> — $<?php echo number_format($p->price); ?> — <?php echo $p->location; ?></option>
<?php endforeach; ?>
</select>
</div>

<div class="flex justify-end gap-4 pt-2">
<a href="<?php echo URLROOT; ?>/admin/buyers" class="px-6 py-3 rounded-full text-on-surface font-medium hover:bg-surface-container transition-colors">Cancel</a>
<button type="submit" class="px-8 py-3 rounded-full bg-primary text-white font-medium hover:opacity-90 transition-opacity shadow-lg">Set Current Purchase</button>
</div>
</form>
</div>
</main>
</body>
</html>

