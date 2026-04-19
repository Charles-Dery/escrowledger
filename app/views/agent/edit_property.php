<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Edit Property - Estate Ledger</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@500;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
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
                    borderRadius: {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    fontFamily: {
                        "headline": ["Manrope", "sans-serif"],
                        "body": ["Inter", "sans-serif"],
                        "label": ["Inter", "sans-serif"]
                    }
                }
            }
        }
    </script>
<style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6, .font-headline { font-family: 'Manrope', sans-serif; }
        input:focus, textarea:focus, select:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 32, 69, 0.4);
            border-color: transparent;
        }
    </style>
</head>
<body class="bg-surface text-on-surface antialiased flex min-h-screen">
<!-- SideNavBar -->
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
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-high hover:translate-x-1 transition-transform duration-200" href="<?php echo URLROOT; ?>/agent/inquiries">
<span class="material-symbols-outlined">group</span>
<span>Inquiries</span>
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

<!-- Main Content Area -->
<main class="ml-64 flex-1 h-screen overflow-y-auto bg-surface flex flex-col relative">
<!-- TopNavBar -->
<header class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl sticky top-0 z-50 flex justify-between items-center px-8 h-20 w-full border-b border-outline-variant/15">
<div class="flex items-center gap-4">
<a href="<?php echo URLROOT; ?>/agent/inventory" class="text-on-surface-variant hover:text-on-surface transition-colors flex items-center justify-center p-2 rounded-full hover:bg-surface-container">
<span class="material-symbols-outlined">arrow_back</span>
</a>
<h2 class="font-headline font-bold tracking-tight text-2xl text-on-surface">Edit Property</h2>
</div>
<div class="flex items-center gap-4">
<div class="text-right hidden sm:block mr-2">
    <p class="text-sm font-bold text-primary"><?php echo $_SESSION['user_name']; ?></p>
</div>
<div class="h-8 w-8 rounded-full bg-surface-container-high overflow-hidden border border-outline-variant/30 flex-shrink-0">
<img alt="Agent Profile" class="w-full h-full object-cover" src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&background=002045&color=fff"/>
</div>
</div>
</header>

<div class="p-8 max-w-5xl mx-auto w-full pb-24">
<form action="<?php echo URLROOT; ?>/agent/edit_property/<?php echo $data['id']; ?>" method="POST" class="space-y-12">
<!-- Section: Basic Information -->
<section class="flex flex-col md:flex-row gap-8 items-start">
<div class="md:w-1/3 pt-2">
<h3 class="font-headline font-bold text-lg text-on-surface tracking-tight mb-1">Basic Information</h3>
<p class="font-body text-sm text-on-surface-variant">Core details that define the property listing.</p>
</div>
<div class="md:w-2/3 bg-surface-container-lowest rounded-xl p-8 hover:bg-surface-container-high transition-colors duration-300">
<div class="space-y-6">
<div>
<label class="block font-label text-sm font-medium text-on-surface mb-2" for="title">Property Title</label>
<input name="title" required class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-on-surface font-body text-sm focus:ring-0 placeholder-on-surface-variant/50 transition-all" id="title" placeholder="e.g., Modern Penthouse in Downtown" type="text" value="<?php echo $data['title']; ?>"/>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div>
<label class="block font-label text-sm font-medium text-on-surface mb-2" for="price">Listing Price</label>
<div class="relative">
<span class="absolute left-4 top-3 text-on-surface-variant font-body text-sm">$</span>
<input name="price" required class="w-full bg-surface-container-highest border-0 rounded-lg py-3 pl-8 pr-4 text-on-surface font-body text-sm focus:ring-0 placeholder-on-surface-variant/50 transition-all" id="price" placeholder="0.00" type="number" step="0.01" value="<?php echo $data['price']; ?>"/>
</div>
</div>
<div>
<label class="block font-label text-sm font-medium text-on-surface mb-2" for="type">Property Type</label>
<div class="relative">
<select name="type" required class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 pr-10 text-on-surface font-body text-sm focus:ring-0 appearance-none transition-all" id="type">
<option disabled="" value="">Select type...</option>
<option value="residential" <?php echo $data['type'] == 'residential' ? 'selected' : ''; ?>>Residential</option>
<option value="commercial" <?php echo $data['type'] == 'commercial' ? 'selected' : ''; ?>>Commercial</option>
<option value="land" <?php echo $data['type'] == 'land' ? 'selected' : ''; ?>>Land</option>
</select>
<span class="material-symbols-outlined absolute right-4 top-3 text-on-surface-variant pointer-events-none">expand_more</span>
</div>
</div>
</div>
<div>
<label class="block font-label text-sm font-medium text-on-surface mb-2" for="description">Description</label>
<textarea name="description" required class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-on-surface font-body text-sm focus:ring-0 placeholder-on-surface-variant/50 transition-all resize-none" id="description" placeholder="Provide a compelling description of the property..." rows="4"><?php echo $data['description']; ?></textarea>
</div>
</div>
</div>
</section>

<!-- Section: Property Details -->
<section class="flex flex-col md:flex-row gap-8 items-start">
<div class="md:w-1/3 pt-2">
<h3 class="font-headline font-bold text-lg text-on-surface tracking-tight mb-1">Property Details</h3>
<p class="font-body text-sm text-on-surface-variant">Key specifications and dimensions.</p>
</div>
<div class="md:w-2/3 bg-surface-container-lowest rounded-xl p-8 hover:bg-surface-container-high transition-colors duration-300">
<div class="grid grid-cols-2 md:grid-cols-3 gap-6">
<div>
<label class="block font-label text-sm font-medium text-on-surface mb-2" for="beds">Bedrooms</label>
<input name="bedrooms" class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-on-surface font-body text-sm focus:ring-0 placeholder-on-surface-variant/50 transition-all" id="beds" placeholder="0" type="number" value="<?php echo $data['bedrooms']; ?>"/>
</div>
<div>
<label class="block font-label text-sm font-medium text-on-surface mb-2" for="baths">Bathrooms</label>
<input name="bathrooms" class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-on-surface font-body text-sm focus:ring-0 placeholder-on-surface-variant/50 transition-all" id="baths" placeholder="0.0" step="0.5" type="number" value="<?php echo $data['bathrooms']; ?>"/>
</div>
<div>
<label class="block font-label text-sm font-medium text-on-surface mb-2" for="sqft">Square Footage</label>
<div class="relative">
<input name="sqft" class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 pr-12 text-on-surface font-body text-sm focus:ring-0 placeholder-on-surface-variant/50 transition-all" id="sqft" placeholder="0" type="number" value="<?php echo $data['sqft']; ?>"/>
<span class="absolute right-4 top-3 text-on-surface-variant font-label text-xs uppercase">sqft</span>
</div>
</div>
<div class="col-span-2 md:col-span-3">
<label class="block font-label text-sm font-medium text-on-surface mb-2" for="year_built">Year Built</label>
<input name="year_built" class="w-full md:w-1/3 bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-on-surface font-body text-sm focus:ring-0 placeholder-on-surface-variant/50 transition-all" id="year_built" placeholder="YYYY" type="number" value="<?php echo $data['year_built']; ?>"/>
</div>
</div>
</div>
</section>

<!-- Section: Location -->
<section class="flex flex-col md:flex-row gap-8 items-start">
<div class="md:w-1/3 pt-2">
<h3 class="font-headline font-bold text-lg text-on-surface tracking-tight mb-1">Location</h3>
<p class="font-body text-sm text-on-surface-variant">Where is this property situated?</p>
</div>
<div class="md:w-2/3 bg-surface-container-lowest rounded-xl p-8 hover:bg-surface-container-high transition-colors duration-300">
<div class="space-y-6">
<div>
<label class="block font-label text-sm font-medium text-on-surface mb-2" for="address">Street Address</label>
<input name="address" required class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-on-surface font-body text-sm focus:ring-0 placeholder-on-surface-variant/50 transition-all" id="address" placeholder="123 Main St" type="text" value="<?php echo $data['address']; ?>"/>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="md:col-span-1">
<label class="block font-label text-sm font-medium text-on-surface mb-2" for="city">City</label>
<input name="city" required class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-on-surface font-body text-sm focus:ring-0 placeholder-on-surface-variant/50 transition-all" id="city" placeholder="City" type="text" value="<?php echo $data['city']; ?>"/>
</div>
<div class="md:col-span-1">
<label class="block font-label text-sm font-medium text-on-surface mb-2" for="state">State/Province</label>
<input name="state" required class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-on-surface font-body text-sm focus:ring-0 placeholder-on-surface-variant/50 transition-all" id="state" placeholder="State" type="text" value="<?php echo $data['state']; ?>"/>
</div>
<div class="md:col-span-1">
<label class="block font-label text-sm font-medium text-on-surface mb-2" for="zip">Zip/Postal Code</label>
<input name="zip" required class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-on-surface font-body text-sm focus:ring-0 placeholder-on-surface-variant/50 transition-all" id="zip" placeholder="Zip" type="text" value="<?php echo $data['zip']; ?>"/>
</div>
</div>
</div>
</div>
</section>

<!-- Section: Media Upload -->
<section class="flex flex-col md:flex-row gap-8 items-start mb-12">
<div class="md:w-1/3 pt-2">
<h3 class="font-headline font-bold text-lg text-on-surface tracking-tight mb-1">Media</h3>
<p class="font-body text-sm text-on-surface-variant">Update the image URL for the property.</p>
</div>
<div class="md:w-2/3 bg-surface-container-lowest rounded-xl p-8 hover:bg-surface-container-high transition-colors duration-300">
<div>
<label class="block font-label text-sm font-medium text-on-surface mb-2" for="image_url">Main Image URL</label>
<input name="image_url" class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-on-surface font-body text-sm focus:ring-0 placeholder-on-surface-variant/50 transition-all" id="image_url" placeholder="https://example.com/image.jpg" type="url" value="<?php echo $data['image_url']; ?>"/>
</div>
</div>
</section>

<!-- Action Bar -->
<div class="sticky bottom-0 w-full py-6 px-8 -mx-8 bg-surface/90 backdrop-blur-md border-t border-outline-variant/15 flex justify-end gap-4 mt-12 z-10">
<a href="<?php echo URLROOT; ?>/agent/inventory" class="px-6 py-3 rounded-full text-on-surface font-body text-sm font-medium hover:bg-surface-container transition-colors">
                        Cancel
                    </a>
<button class="px-8 py-3 rounded-full bg-gradient-to-br from-primary to-primary-container text-on-primary font-body text-sm font-medium hover:opacity-90 shadow-[0_8px_16px_rgba(0,32,69,0.15)] transition-all" type="submit">
                        Update Listing
                    </button>
</div>
</form>
</div>
</main>
</body>
</html>