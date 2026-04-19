<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Buyer Management - Estate Ledger</title>
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
<!-- SideNavBar -->
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
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-100 rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/properties">
<span class="material-symbols-outlined text-xl">home</span>Properties
</a>
<a class="flex items-center gap-3 px-3 py-2.5 bg-teal-700 text-white shadow-sm rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/buyers">
<span class="material-symbols-outlined text-xl">group</span>Buyers
</a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-100 rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/transactions">
<span class="material-symbols-outlined text-xl">receipt_long</span>Transactions
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
<h2 class="font-headline font-bold tracking-tight text-xl text-primary">Buyer Management</h2>
<div class="flex items-center gap-4">
<p class="text-sm font-bold text-primary mr-2"><?php echo $_SESSION['user_name']; ?></p>
<img alt="Admin" class="w-9 h-9 rounded-full object-cover border border-surface-variant" src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&background=002045&color=fff"/>
</div>
</header>

<div class="p-8">
<?php flash('buyer_message'); ?>
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">
<?php foreach($data['buyers'] as $buyer): ?>
<div class="bg-surface-container-lowest rounded-xl p-6 shadow-sm border border-outline-variant/10">
<div class="flex justify-between items-start mb-6">
<div class="flex items-center gap-4">
<div class="w-14 h-14 rounded-full bg-surface-container-high overflow-hidden">
<img class="w-full h-full object-cover" src="https://ui-avatars.com/api/?name=<?php echo urlencode($buyer->name); ?>&background=random&color=fff"/>
</div>
<div>
<h3 class="font-headline font-bold text-on-surface"><?php echo $buyer->name; ?></h3>
<p class="text-xs text-on-surface-variant"><?php echo $buyer->email; ?></p>
</div>
</div>
<div class="flex items-center gap-2">
<a href="<?php echo URLROOT; ?>/admin/edit_buyer/<?php echo $buyer->id; ?>" class="px-3 py-1.5 rounded-lg bg-primary text-white text-xs font-medium hover:opacity-90 flex items-center gap-1">
<span class="material-symbols-outlined text-sm">edit</span>Edit Financials
</a>
<a href="<?php echo URLROOT; ?>/admin/assign_purchase/<?php echo $buyer->id; ?>" class="px-3 py-1.5 rounded-lg bg-secondary text-white text-xs font-medium hover:opacity-90 flex items-center gap-1">
<span class="material-symbols-outlined text-sm">home</span>Set Current
</a>
<?php if($buyer->status == 'active'): ?>
<span class="inline-flex items-center px-2 py-1 rounded-full bg-secondary/10 text-secondary text-[10px] font-bold uppercase">Active</span>
<?php else: ?>
<span class="inline-flex items-center px-2 py-1 rounded-full bg-red-100 text-red-700 text-[10px] font-bold uppercase">Deactivated</span>
<?php endif; ?>
</div>
</div>

<div class="grid grid-cols-2 gap-4 mb-6">
<div class="bg-surface-container-low p-4 rounded-lg">
<p class="text-[10px] text-on-surface-variant uppercase tracking-wider mb-1">Total Paid</p>
<p class="font-headline font-bold text-secondary text-xl">$<?php echo number_format($buyer->total_paid, 2); ?></p>
</div>
<div class="bg-surface-container-low p-4 rounded-lg">
<p class="text-[10px] text-on-surface-variant uppercase tracking-wider mb-1">Total Spent</p>
<p class="font-headline font-bold text-primary text-xl">$<?php echo number_format($buyer->total_spent, 2); ?></p>
</div>
</div>

<div class="space-y-3">
<div class="flex justify-between text-sm">
<span class="text-on-surface-variant">Properties Saved</span>
<span class="font-medium text-on-surface"><?php echo count($buyer->saved_properties); ?></span>
</div>
<div class="flex justify-between text-sm">
<span class="text-on-surface-variant">Transactions</span>
<span class="font-medium text-on-surface"><?php echo count($buyer->transactions); ?></span>
</div>
<div class="flex justify-between text-sm">
<span class="text-on-surface-variant">Balance Remaining</span>
<span class="font-medium text-secondary">$<?php echo number_format(max(0, $buyer->total_paid - $buyer->total_spent), 2); ?></span>
</div>
</div>

<?php if(!empty($buyer->transactions)): ?>
<div class="mt-6 pt-4 border-t border-outline-variant/10">
<p class="text-[10px] text-on-surface-variant uppercase tracking-wider mb-3">Recent Purchase</p>
<?php 
$lastTrans = $buyer->transactions[0];
$statusClass = $lastTrans->status == 'completed' ? 'text-secondary' : 'text-yellow-600';
?>
<div class="flex justify-between items-center">
<span class="text-sm font-medium text-on-surface"><?php echo $lastTrans->property_title; ?></span>
<div class="flex items-center gap-3">
<span class="text-sm font-bold <?php echo $statusClass; ?>">$<?php echo number_format($lastTrans->amount); ?></span>
<form action="<?php echo URLROOT; ?>/admin/delete_purchase/<?php echo $lastTrans->id; ?>" method="POST" onsubmit="return confirm('Delete this buyer purchase? This will remove the purchase record.');">
<input type="hidden" name="redirect_to" value="buyers"/>
<button type="submit" class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-[10px] font-bold uppercase tracking-wider hover:bg-red-200 transition-colors">
Delete
</button>
</form>
</div>
</div>
</div>
<?php endif; ?>
</div>
<?php endforeach; ?>
</div>
</div>
</main>
</body>
</html>
