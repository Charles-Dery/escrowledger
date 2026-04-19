<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Inventory Management - Estate Ledger</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
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
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-secondary bg-surface-container-lowest shadow-sm hover:translate-x-1 transition-transform duration-200" href="<?php echo URLROOT; ?>/agent/inventory">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">domain</span>
<span>Inventory</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-high hover:translate-x-1 transition-transform duration-200" href="<?php echo URLROOT; ?>/agent/inquiries">
<span class="material-symbols-outlined">group</span>
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
<h2 class="font-headline font-bold text-2xl tracking-tight text-primary">Inventory Management</h2>
<div class="flex items-center gap-4">
<div class="text-right hidden sm:block mr-2">
    <p class="text-sm font-bold text-primary"><?php echo $_SESSION['user_name']; ?></p>
</div>
<div class="h-10 w-10 rounded-full bg-surface-container-high overflow-hidden border border-outline-variant/15 ml-2">
<img alt="Agent Profile" class="w-full h-full object-cover" src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&background=002045&color=fff"/>
</div>
</div>
</header>

<div class="flex-1 p-8 pb-20">
<div class="flex justify-between items-end mb-8">
<div>
<h3 class="font-headline text-xl font-bold text-primary">My Properties</h3>
<p class="text-sm text-on-surface-variant font-body">Manage and track all your active and historical listings.</p>
</div>
<div class="flex gap-3">
<button class="flex items-center gap-2 px-4 py-2 bg-surface-container-high text-on-surface text-sm font-medium rounded-lg hover:bg-surface-variant transition-colors">
<span class="material-symbols-outlined text-sm">filter_list</span> Filter
</button>
<a href="<?php echo URLROOT; ?>/agent/add_property" class="flex items-center gap-2 px-4 py-2 bg-primary text-on-primary text-sm font-medium rounded-lg hover:opacity-90 transition-opacity">
<span class="material-symbols-outlined text-sm">add</span> New Listing
</a>
</div>
</div>

<div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm border border-outline-variant/10">
<table class="w-full text-left font-body">
<thead>
<tr class="bg-surface-container-high border-b border-outline-variant/15 text-[10px] font-bold text-on-surface-variant uppercase tracking-widest">
<th class="px-6 py-4">Property</th>
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
<div class="w-16 h-12 rounded bg-surface-dim overflow-hidden relative flex-shrink-0">
<img alt="Property" class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=200&q=80"/>
</div>
<div>
<p class="font-headline font-semibold text-on-surface"><?php echo $property->title; ?></p>
<p class="text-xs text-on-surface-variant"><?php echo $property->location; ?></p>
</div>
</div>
</td>
<td class="px-6 py-5 font-medium text-on-surface">$<?php echo number_format($property->price); ?></td>
<td class="px-6 py-5">
    <?php 
    $statusClasses = [
        'available' => 'bg-secondary/10 text-secondary',
        'pending' => 'bg-surface-dim text-on-surface-variant',
        'sold' => 'bg-primary/10 text-primary'
    ];
    $statusClass = $statusClasses[$property->status] ?? 'bg-surface-dim text-on-surface-variant';
    ?>
<span class="inline-flex items-center px-2 py-1 rounded text-[10px] font-bold tracking-wider uppercase <?php echo $statusClass; ?>">
    <?php echo $property->status; ?>
</span>
</td>
<td class="px-6 py-5 text-sm text-on-surface-variant uppercase tracking-tight font-medium"><?php echo $property->type; ?></td>
<td class="px-6 py-5 text-right">
<div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<a href="<?php echo URLROOT; ?>/agent/edit_property/<?php echo $property->id; ?>" class="p-2 text-on-surface-variant hover:text-primary rounded-lg hover:bg-surface-container-high transition-colors">
<span class="material-symbols-outlined text-[20px]">edit</span>
</a>
<form action="<?php echo URLROOT; ?>/agent/delete/<?php echo $property->id; ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this property?');">
<button type="submit" class="p-2 text-on-surface-variant hover:text-error rounded-lg hover:bg-error-container/20 transition-colors">
<span class="material-symbols-outlined text-[20px]">delete</span>
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
</main>
</body>
</html>