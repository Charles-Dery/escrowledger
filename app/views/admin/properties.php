<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Properties - Estate Ledger</title>
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
<a class="flex items-center gap-3 px-3 py-2.5 bg-teal-700 text-white shadow-sm rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/properties">
<span class="material-symbols-outlined text-xl">home</span>Properties
</a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-100 rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/buyers">
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
<h2 class="font-headline font-bold tracking-tight text-xl text-primary">All Properties</h2>
<div class="flex items-center gap-4">
<a href="<?php echo URLROOT; ?>/admin/add_property" class="px-4 py-2 bg-primary text-white rounded-full text-sm font-medium hover:opacity-90">+ Add Property</a>
<p class="text-sm font-bold text-primary mr-2"><?php echo $_SESSION['user_name']; ?></p>
<img alt="Admin" class="w-9 h-9 rounded-full object-cover border border-surface-variant" src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&background=002045&color=fff"/>
</div>
</header>

<div class="p-8">
<?php flash('property_message'); ?>

<div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm border border-outline-variant/10">
<table class="w-full text-left font-body">
<thead>
<tr class="bg-surface-container-high text-[10px] font-bold text-on-surface-variant uppercase tracking-widest">
<th class="px-6 py-4">Property</th>
<th class="px-6 py-4">Agent</th>
<th class="px-6 py-4">Price</th>
<th class="px-6 py-4">Status</th>
<th class="px-6 py-4">Type</th>
<th class="px-6 py-4 text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/5">
<?php foreach($data['properties'] as $property): ?>
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="px-6 py-5">
<div class="flex items-center gap-4">
<div class="w-16 h-12 rounded bg-surface-dim overflow-hidden flex-shrink-0">
<img class="w-full h-full object-cover" src="<?php echo !empty($property->images) ? $property->images[0]->image_url : 'https://via.placeholder.com/200x150?text=No+Image'; ?>"/>
</div>
<div>
<p class="font-headline font-semibold text-on-surface text-sm"><?php echo $property->title; ?></p>
<p class="text-xs text-on-surface-variant"><?php echo $property->location; ?></p>
</div>
</div>
</td>
<td class="px-6 py-5 text-sm text-on-surface"><?php echo $property->agent_name; ?></td>
<td class="px-6 py-5 font-medium text-on-surface">$<?php echo number_format($property->price); ?></td>
<td class="px-6 py-5">
<?php
$statusClass = [
'available' => 'bg-secondary/10 text-secondary',
'pending' => 'bg-yellow-100 text-yellow-700',
'sold' => 'bg-primary/10 text-primary'
];
$class = $statusClass[$property->status] ?? 'bg-surface-dim text-on-surface-variant';
?>
<span class="inline-flex px-2 py-1 rounded text-[10px] font-bold tracking-wider uppercase <?php echo $class; ?>"><?php echo $property->status; ?></span>
</td>
<td class="px-6 py-5 text-sm text-on-surface uppercase"><?php echo $property->type; ?></td>
<td class="px-6 py-5 text-right">
<div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 text-on-surface-variant hover:text-primary rounded-lg hover:bg-surface-container-low transition-colors">
<span class="material-symbols-outlined text-xl">visibility</span>
</button>
</div>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</main>
</body>
</html>
