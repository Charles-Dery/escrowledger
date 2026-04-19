<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Property Catalog - Estate Ledger</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet"/>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
<a class="flex items-center gap-3 px-3 py-2.5 bg-teal-700 text-white shadow-sm rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/property_catalog">
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
<div class="flex items-center gap-4">
<h2 class="font-headline font-bold tracking-tight text-xl text-primary">Property Catalog</h2>
</div>
<div class="flex items-center gap-4">
<a href="<?php echo URLROOT; ?>/admin/add_property" class="px-4 py-2 bg-primary text-white rounded-full text-sm font-medium hover:opacity-90 transition-opacity flex items-center gap-2">
<span class="material-symbols-outlined text-sm">add</span>Add Property
</a>
<p class="text-sm font-bold text-primary mr-2"><?php echo $_SESSION['user_name']; ?></p>
<img alt="Admin" class="w-9 h-9 rounded-full object-cover border border-surface-variant" src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&background=002045&color=fff"/>
</div>
</header>

<div class="p-8">
<?php flash('property_message'); ?>

<div class="mb-8">
<h1 class="font-headline font-extrabold text-2xl md:text-3xl tracking-tight text-primary mb-1">All Properties</h1>
<p class="font-body text-sm text-on-surface-variant"><?php echo count($data['properties']); ?> properties in catalog</p>
</div>

<?php if(empty($data['properties'])): ?>
<div class="bg-surface-container-lowest rounded-xl p-12 text-center">
<span class="material-symbols-outlined text-6xl text-on-surface-variant mb-4">home_work</span>
<h3 class="font-headline font-bold text-xl text-primary mb-2">No Properties Yet</h3>
<p class="font-body text-sm text-on-surface-variant mb-6">Start by adding your first property to the catalog</p>
<a href="<?php echo URLROOT; ?>/admin/add_property" class="inline-flex items-center gap-2 px-6 py-3 bg-primary text-white rounded-full text-sm font-medium hover:opacity-90 transition-opacity">
<span class="material-symbols-outlined text-sm">add</span>Add Property
</a>
</div>
<?php else: ?>
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
<?php foreach($data['properties'] as $i => $property): ?>
<article class="group bg-surface-container-lowest rounded-xl overflow-hidden flex flex-col transition-all duration-300 hover:shadow-xl hover:-translate-y-1 border border-outline-variant/10" data-aos="fade-up" data-aos-delay="<?php echo ($i % 9) * 50; ?>">
<div class="relative aspect-[4/3] overflow-hidden bg-surface-container-high">
<?php if(!empty($property->images) && count($property->images) > 0): ?>
<img alt="<?php echo $property->title; ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="<?php echo $property->images[0]->image_url; ?>"/>
<?php if(count($property->images) > 1): ?>
<div class="absolute bottom-4 left-4 z-20">
<span class="bg-black/60 backdrop-blur-sm text-white text-xs px-2 py-1 rounded-full">+<?php echo count($property->images) - 1; ?> more</span>
</div>
<?php endif; ?>
<?php else: ?>
<div class="w-full h-full flex items-center justify-center bg-surface-container-high">
<span class="material-symbols-outlined text-6xl text-on-surface-variant">image</span>
</div>
<?php endif; ?>

<div class="absolute top-4 left-4 z-20">
<?php 
$statusColor = '';
$statusBg = 'bg-surface-container-lowest/90';
if($property->status == 'available') {
    $statusColor = 'bg-secondary';
} elseif($property->status == 'sold') {
    $statusColor = 'bg-error';
} else {
    $statusColor = 'bg-warning';
}
?>
<span class="<?php echo $statusBg; ?> backdrop-blur-md px-3 py-1 rounded-full flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full <?php echo $statusColor; ?>"></span>
<span class="font-body text-[10px] font-bold text-on-surface uppercase tracking-wider"><?php echo $property->status; ?></span>
</span>
</div>

<div class="absolute top-4 right-4 z-20 flex gap-2">
<a href="<?php echo URLROOT; ?>/admin/edit_property/<?php echo $property->id; ?>" class="w-8 h-8 rounded-full bg-surface-container-lowest/80 backdrop-blur-md flex items-center justify-center text-on-surface-variant hover:text-primary transition-colors">
<span class="material-symbols-outlined text-sm">edit</span>
</a>
<?php if($property->status != 'available'): ?>
<form action="<?php echo URLROOT; ?>/admin/make_available/<?php echo $property->id; ?>" method="POST">
<button type="submit" class="w-8 h-8 rounded-full bg-surface-container-lowest/80 backdrop-blur-md flex items-center justify-center text-on-surface-variant hover:text-secondary transition-colors" title="Make Available">
<span class="material-symbols-outlined text-sm">toggle_on</span>
</button>
</form>
<?php endif; ?>
<form action="<?php echo URLROOT; ?>/admin/delete_property/<?php echo $property->id; ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this property?');">
<button type="submit" class="w-8 h-8 rounded-full bg-surface-container-lowest/80 backdrop-blur-md flex items-center justify-center text-on-surface-variant hover:text-error transition-colors">
<span class="material-symbols-outlined text-sm">delete</span>
</button>
</form>
</div>
</div>

<div class="p-5 flex flex-col flex-1">
<div class="flex justify-between items-start mb-2">
<h3 class="font-headline font-bold text-xl text-primary tracking-tight leading-tight">$<?php echo number_format($property->price); ?></h3>
</div>
<p class="font-headline font-bold text-on-surface text-sm mb-1 line-clamp-1"><?php echo $property->title; ?></p>
<p class="font-body text-xs text-on-surface-variant mb-1 line-clamp-1"><?php echo $property->location; ?></p>
<p class="font-body text-xs text-on-surface-variant mb-4">
<span class="inline-flex items-center gap-1 px-2 py-0.5 bg-surface-container-low rounded text-[10px] font-medium uppercase"><?php echo $property->type; ?></span>
<span class="ml-1">Agent: <?php echo $property->agent_name; ?></span>
</p>
<div class="mt-auto grid grid-cols-3 gap-2 pt-4 border-t border-outline-variant/15">
<div class="flex items-center gap-1.5 text-on-surface">
<span class="material-symbols-outlined text-sm text-on-surface-variant">bed</span>
<span class="font-body text-xs font-medium"><?php echo $property->bedrooms ?: '0'; ?> <span class="text-on-surface-variant font-normal">bd</span></span>
</div>
<div class="flex items-center gap-1.5 text-on-surface">
<span class="material-symbols-outlined text-sm text-on-surface-variant">shower</span>
<span class="font-body text-xs font-medium"><?php echo $property->bathrooms ?: '0'; ?> <span class="text-on-surface-variant font-normal">ba</span></span>
</div>
<div class="flex items-center gap-1.5 text-on-surface">
<span class="material-symbols-outlined text-sm text-on-surface-variant">straighten</span>
<span class="font-body text-xs font-medium"><?php echo number_format($property->sqft ?: 0); ?> <span class="text-on-surface-variant font-normal">sqft</span></span>
</div>
</div>
</div>
</article>
<?php endforeach; ?>
</div>
<?php endif; ?>
</div>
</main>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
AOS.init({ once: true, duration: 650, easing: 'ease-out-quart', disable: () => window.matchMedia('(prefers-reduced-motion: reduce)').matches });
</script>
</body>
</html>
