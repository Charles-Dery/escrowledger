<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Buyer Inquiries - Estate Ledger</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
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
                    "outline-variant": "#c4c6cf"
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
<body class="bg-surface text-on-surface min-h-screen flex antialiased">
<nav class="h-screen w-64 fixed left-0 top-0 z-40 bg-surface-container-low flex flex-col p-6 gap-4 border-r border-outline-variant/15 font-headline text-sm font-medium">
<div class="mb-8 px-2">
<h1 class="text-xl font-black text-primary tracking-tighter uppercase">Estate Ledger</h1>
<p class="text-[10px] text-on-surface-variant font-bold tracking-[0.2em] uppercase opacity-70">Agent Portal</p>
</div>
<div class="flex-1 space-y-2">
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-high hover:translate-x-1 transition-transform duration-200" href="<?php echo URLROOT; ?>/agent/dashboard">
<span class="material-symbols-outlined">analytics</span>
<span>Dashboard</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-high hover:translate-x-1 transition-transform duration-200" href="<?php echo URLROOT; ?>/agent/inventory">
<span class="material-symbols-outlined">domain</span>
<span>Inventory</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-secondary bg-surface-container-lowest shadow-sm hover:translate-x-1 transition-transform duration-200" href="<?php echo URLROOT; ?>/agent/inquiries">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">group</span>
<span>Inquiries</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-high hover:translate-x-1 transition-transform duration-200" href="<?php echo URLROOT; ?>/users/profile">
<span class="material-symbols-outlined">person</span>
<span>Profile</span>
</a>
</div>
<div class="mt-auto pt-4 border-t border-outline-variant/15 space-y-4">
<a href="<?php echo URLROOT; ?>/agent/add_property" class="block w-full text-center py-3 px-4 rounded-full bg-gradient-to-br from-primary to-primary-container text-on-primary font-body text-sm font-medium hover:opacity-90 transition-opacity">
    Add Property
</a>
<a class="flex items-center gap-3 px-4 py-2 rounded-lg text-on-surface-variant hover:bg-surface-container-high transition-colors" href="<?php echo URLROOT; ?>/users/logout">
<span class="material-symbols-outlined">logout</span>
<span>Sign Out</span>
</a>
</div>
</nav>

<main class="ml-64 flex-1 flex flex-col min-h-screen">
<header class="h-20 w-full bg-surface/80 backdrop-blur-xl sticky top-0 z-30 px-8 flex justify-between items-center border-b border-outline-variant/10">
<h2 class="font-headline font-bold text-2xl tracking-tight text-primary">Buyer Inquiries</h2>
<div class="flex items-center gap-4">
<p class="text-sm font-bold text-primary mr-2"><?php echo $_SESSION['user_name']; ?></p>
<div class="h-10 w-10 rounded-full bg-surface-container-high overflow-hidden border border-outline-variant/15">
<img alt="Agent Profile" class="w-full h-full object-cover" src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&background=002045&color=fff"/>
</div>
</div>
</header>

<div class="flex-1 p-8 pb-20">
<div class="mb-8">
<h3 class="font-headline text-xl font-bold text-primary">Inquiry Log</h3>
<p class="text-sm text-on-surface-variant font-body">Track potential buyers and their expressed interest in your properties.</p>
</div>

<div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm border border-outline-variant/10">
<table class="w-full text-left font-body">
<thead>
<tr class="bg-surface-container-high border-b border-outline-variant/15 text-[10px] font-bold text-on-surface-variant uppercase tracking-widest">
<th class="px-6 py-4">Buyer</th>
<th class="px-6 py-4">Property</th>
<th class="px-6 py-4">Date</th>
<th class="px-6 py-4">Status</th>
<th class="px-6 py-4 text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/5">
<?php foreach($data['inquiries'] as $inquiry): ?>
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<img alt="Buyer" class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=<?php echo urlencode($inquiry->buyer_name); ?>&background=random&color=fff"/>
<div>
<p class="font-headline font-semibold text-on-surface text-sm"><?php echo $inquiry->buyer_name; ?></p>
<p class="text-xs text-on-surface-variant"><?php echo $inquiry->buyer_email; ?></p>
</div>
</div>
</td>
<td class="px-6 py-5">
<p class="font-medium text-on-surface text-sm"><?php echo $inquiry->title; ?></p>
</td>
<td class="px-6 py-5 text-sm text-on-surface-variant">
    <?php echo date('M d, Y', strtotime($inquiry->transaction_date)); ?>
</td>
<td class="px-6 py-5">
<span class="inline-flex items-center px-2 py-1 rounded text-[10px] font-bold tracking-wider uppercase bg-secondary/10 text-secondary">
    <?php echo $inquiry->status; ?>
</span>
</td>
<td class="px-6 py-5 text-right">
<button class="text-secondary hover:text-primary font-medium text-sm">Contact Buyer</button>
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