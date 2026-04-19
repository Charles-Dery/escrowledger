<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Add Property - Estate Ledger</title>
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
<span class="material-symbols-outlined text-xl">list</span>Properties List
</a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-100 rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/buyers">
<span class="material-symbols-outlined text-xl">group</span>Buyers
</a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-100 rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/transactions">
<span class="material-symbols-outlined text-xl">receipt_long</span>Transactions
</a>
<a class="flex items-center gap-3 px-3 py-2.5 bg-teal-700 text-white shadow-sm rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/add_property">
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
<h2 class="font-headline font-bold tracking-tight text-xl text-primary">Add New Property</h2>
<div class="flex items-center gap-4">
<p class="text-sm font-bold text-primary mr-2"><?php echo $_SESSION['user_name']; ?></p>
<img alt="Admin" class="w-9 h-9 rounded-full object-cover border border-surface-variant" src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&background=002045&color=fff"/>
</div>
</header>

<div class="p-8 max-w-5xl mx-auto">
<?php flash('property_message'); ?>

<form action="<?php echo URLROOT; ?>/admin/add_property" method="POST" enctype="multipart/form-data" class="space-y-10">
<!-- Property Info -->
<div class="bg-surface-container-lowest rounded-xl p-8 shadow-sm">
<h3 class="font-headline font-bold text-lg text-primary mb-6">Basic Information</h3>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div>
<label class="block font-body text-sm font-medium text-on-surface mb-2">Property Title *</label>
<input name="title" required class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-sm" placeholder="e.g. Modern Villa" value="<?php echo $data['title']; ?>"/>
</div>
<div>
<label class="block font-body text-sm font-medium text-on-surface mb-2">Assigned Agent *</label>
<select name="agent_id" required class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-sm">
<option value="">Select Agent...</option>
<?php foreach($data['agents'] as $agent): ?>
<option value="<?php echo $agent->id; ?>" <?php echo $data['agent_id'] == $agent->id ? 'selected' : ''; ?>><?php echo $agent->name; ?></option>
<?php endforeach; ?>
</select>
</div>
<div>
<label class="block font-body text-sm font-medium text-on-surface mb-2">Price ($) *</label>
<input name="price" required type="number" step="0.01" class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-sm" placeholder="0.00" value="<?php echo $data['price']; ?>"/>
</div>
<div>
<label class="block font-body text-sm font-medium text-on-surface mb-2">Type</label>
<select name="type" class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-sm">
<option value="residential" <?php echo $data['type'] == 'residential' ? 'selected' : ''; ?>>Residential</option>
<option value="commercial" <?php echo $data['type'] == 'commercial' ? 'selected' : ''; ?>>Commercial</option>
<option value="land" <?php echo $data['type'] == 'land' ? 'selected' : ''; ?>>Land</option>
</select>
</div>
</div>
<div class="mt-6">
<label class="block font-body text-sm font-medium text-on-surface mb-2">Description</label>
<textarea name="description" rows="4" class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-sm" placeholder="Property description..."><?php echo $data['description']; ?></textarea>
</div>
</div>

<!-- Property Details -->
<div class="bg-surface-container-lowest rounded-xl p-8 shadow-sm">
<h3 class="font-headline font-bold text-lg text-primary mb-6">Property Details</h3>
<div class="grid grid-cols-2 md:grid-cols-4 gap-6">
<div>
<label class="block font-body text-sm font-medium text-on-surface mb-2">Bedrooms</label>
<input name="bedrooms" type="number" class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-sm" placeholder="0" value="<?php echo $data['bedrooms']; ?>"/>
</div>
<div>
<label class="block font-body text-sm font-medium text-on-surface mb-2">Bathrooms</label>
<input name="bathrooms" type="number" step="0.5" class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-sm" placeholder="0" value="<?php echo $data['bathrooms']; ?>"/>
</div>
<div>
<label class="block font-body text-sm font-medium text-on-surface mb-2">Square Feet</label>
<input name="sqft" type="number" class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-sm" placeholder="0" value="<?php echo $data['sqft']; ?>"/>
</div>
<div>
<label class="block font-body text-sm font-medium text-on-surface mb-2">Year Built</label>
<input name="year_built" type="number" class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-sm" placeholder="YYYY" value="<?php echo $data['year_built']; ?>"/>
</div>
</div>
</div>

<!-- Location -->
<div class="bg-surface-container-lowest rounded-xl p-8 shadow-sm">
<h3 class="font-headline font-bold text-lg text-primary mb-6">Location</h3>
<div class="space-y-6">
<div>
<label class="block font-body text-sm font-medium text-on-surface mb-2">Street Address</label>
<input name="address" class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-sm" placeholder="123 Main St" value="<?php echo $data['address']; ?>"/>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div>
<label class="block font-body text-sm font-medium text-on-surface mb-2">City *</label>
<input name="city" required class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-sm" placeholder="City" value="<?php echo $data['city']; ?>"/>
</div>
<div>
<label class="block font-body text-sm font-medium text-on-surface mb-2">State *</label>
<input name="state" required class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-sm" placeholder="State" value="<?php echo $data['state']; ?>"/>
</div>
<div>
<label class="block font-body text-sm font-medium text-on-surface mb-2">Zip Code</label>
<input name="zip" class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-sm" placeholder="12345" value="<?php echo $data['zip']; ?>"/>
</div>
</div>
</div>
</div>

<!-- Media -->
<div class="bg-surface-container-lowest rounded-xl p-8 shadow-sm">
<h3 class="font-headline font-bold text-lg text-primary mb-6">Media</h3>
<p class="text-sm text-on-surface-variant mb-4">Upload images from your device or paste image URLs. Leave URL empty if uploading a file.</p>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div>
<h4 class="font-body text-sm font-medium text-on-surface mb-3">Upload from Device</h4>
<div class="space-y-4">
<div>
<label class="block font-body text-xs font-medium text-on-surface-variant mb-2">Image 1 (Main) *</label>
<input type="file" name="image_file_1" accept="image/*" class="w-full bg-surface-container-highest border-0 rounded-lg py-2 px-4 text-sm file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-primary file:text-white hover:file:opacity-90"/>
</div>
<div>
<label class="block font-body text-xs font-medium text-on-surface-variant mb-2">Image 2</label>
<input type="file" name="image_file_2" accept="image/*" class="w-full bg-surface-container-highest border-0 rounded-lg py-2 px-4 text-sm file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-primary file:text-white hover:file:opacity-90"/>
</div>
<div>
<label class="block font-body text-xs font-medium text-on-surface-variant mb-2">Image 3</label>
<input type="file" name="image_file_3" accept="image/*" class="w-full bg-surface-container-highest border-0 rounded-lg py-2 px-4 text-sm file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-primary file:text-white hover:file:opacity-90"/>
</div>
<div>
<label class="block font-body text-xs font-medium text-on-surface-variant mb-2">Image 4</label>
<input type="file" name="image_file_4" accept="image/*" class="w-full bg-surface-container-highest border-0 rounded-lg py-2 px-4 text-sm file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-primary file:text-white hover:file:opacity-90"/>
</div>
<div>
<label class="block font-body text-xs font-medium text-on-surface-variant mb-2">Image 5</label>
<input type="file" name="image_file_5" accept="image/*" class="w-full bg-surface-container-highest border-0 rounded-lg py-2 px-4 text-sm file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-primary file:text-white hover:file:opacity-90"/>
</div>
</div>
</div>
<div>
<h4 class="font-body text-sm font-medium text-on-surface mb-3">Or Paste Image URLs</h4>
<div class="space-y-4">
<div>
<label class="block font-body text-xs font-medium text-on-surface-variant mb-2">Image URL 1 (Main)</label>
<input name="image_url_1" class="w-full bg-surface-container-highest border-0 rounded-lg py-2 px-4 text-sm" placeholder="https://example.com/image1.jpg" value="<?php echo $data['image_url_1']; ?>"/>
</div>
<div>
<label class="block font-body text-xs font-medium text-on-surface-variant mb-2">Image URL 2</label>
<input name="image_url_2" class="w-full bg-surface-container-highest border-0 rounded-lg py-2 px-4 text-sm" placeholder="https://example.com/image2.jpg" value="<?php echo $data['image_url_2']; ?>"/>
</div>
<div>
<label class="block font-body text-xs font-medium text-on-surface-variant mb-2">Image URL 3</label>
<input name="image_url_3" class="w-full bg-surface-container-highest border-0 rounded-lg py-2 px-4 text-sm" placeholder="https://example.com/image3.jpg" value="<?php echo $data['image_url_3']; ?>"/>
</div>
<div>
<label class="block font-body text-xs font-medium text-on-surface-variant mb-2">Image URL 4</label>
<input name="image_url_4" class="w-full bg-surface-container-highest border-0 rounded-lg py-2 px-4 text-sm" placeholder="https://example.com/image4.jpg" value="<?php echo $data['image_url_4']; ?>"/>
</div>
<div>
<label class="block font-body text-xs font-medium text-on-surface-variant mb-2">Image URL 5</label>
<input name="image_url_5" class="w-full bg-surface-container-highest border-0 rounded-lg py-2 px-4 text-sm" placeholder="https://example.com/image5.jpg" value="<?php echo $data['image_url_5']; ?>"/>
</div>
</div>
</div>
</div>
</div>

<div class="flex justify-end gap-4 pt-6">
<a href="<?php echo URLROOT; ?>/admin/properties" class="px-6 py-3 rounded-full text-on-surface font-medium hover:bg-surface-container transition-colors">Cancel</a>
<button type="submit" class="px-8 py-3 rounded-full bg-primary text-white font-medium hover:opacity-90 transition-opacity shadow-lg">Add Property</button>
</div>
</form>
</div>
</main>
</body>
</html>
