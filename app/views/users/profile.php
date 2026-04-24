<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>My Profile - Estate Ledger</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
                      "outline-variant": "#c4c6cf",
                      "error": "#ba1a1a"
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
<body class="bg-surface font-body text-on-surface antialiased flex h-screen overflow-hidden">
<aside class="hidden md:flex flex-col h-full py-8 px-4 w-64 fixed left-0 top-0 bg-slate-50 dark:bg-slate-950 font-manrope text-sm font-medium border-r border-outline-variant/15 z-40">
<div class="mb-10 px-4">
<h1 class="text-lg font-black text-slate-900 dark:text-slate-50 font-headline tracking-tight uppercase">Estate Ledger</h1>
<p class="text-[10px] text-on-surface-variant font-bold tracking-[0.2em] uppercase opacity-70">User Settings</p>
</div>
<nav class="flex-1 space-y-2">
<?php
    $dashboardUrl = URLROOT . '/' . $_SESSION['user_role'] . '/dashboard';
?>
<a class="flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-500 dark:text-slate-400 hover:text-teal-600 dark:hover:text-teal-300 transition-all hover:bg-surface-container-low" href="<?php echo $dashboardUrl; ?>">
<span class="material-symbols-outlined">dashboard</span>
<span>Back to Dashboard</span>
</a>
<a class="flex items-center space-x-3 px-4 py-3 rounded-lg text-teal-700 dark:text-teal-400 font-bold border-r-2 border-teal-700 dark:border-teal-400 bg-surface-container-low translate-x-1 duration-200" href="<?php echo URLROOT; ?>/users/profile">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">person</span>
<span>My Profile</span>
</a>
</nav>
<div class="mt-auto pt-4 border-t border-outline-variant/15">
<a class="flex items-center space-x-3 px-4 py-2 rounded-lg text-slate-500 dark:text-slate-400 hover:text-teal-600 dark:hover:text-teal-300 transition-all" href="<?php echo URLROOT; ?>/users/logout">
<span class="material-symbols-outlined text-lg">logout</span>
<span class="text-xs">Sign Out</span>
</a>
</div>
</aside>

<main class="flex-1 flex flex-col md:ml-64 h-screen overflow-hidden bg-surface relative">
<header class="flex justify-between items-center w-full px-6 py-3 bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl sticky top-0 z-50 shadow-sm border-b border-outline-variant/10">
<h2 class="font-headline font-bold text-xl text-primary">Account Settings</h2>
<div class="flex items-center gap-4">
<div class="text-right hidden sm:block mr-2">
    <p class="text-sm font-bold text-primary"><?php echo $_SESSION['user_name']; ?></p>
</div>
<img alt="Profile" class="w-8 h-8 rounded-full object-cover border border-outline-variant/30" src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&background=002045&color=fff"/>
</div>
</header>

<div class="flex-1 overflow-y-auto p-6 md:p-12 pb-32">
<div class="max-w-3xl mx-auto">
<?php flash('profile_message'); ?>

<div class="bg-surface-container-lowest rounded-2xl p-8 shadow-sm border border-outline-variant/10">
<div class="flex flex-col md:flex-row items-center gap-8 mb-10 pb-10 border-b border-outline-variant/10">
<div class="relative group">
<img alt="Large Profile" class="w-32 h-32 rounded-full object-cover border-4 border-surface-container-low" src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&size=128&background=002045&color=fff"/>
<button class="absolute bottom-0 right-0 w-10 h-10 rounded-full bg-primary text-on-primary flex items-center justify-center shadow-lg hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-xl">photo_camera</span>
</button>
</div>
<div>
<h3 class="font-headline font-extrabold text-2xl text-primary"><?php echo $_SESSION['user_name']; ?></h3>
<p class="text-on-surface-variant font-medium capitalize"><?php echo $_SESSION['user_role']; ?> Account</p>
</div>
</div>

<form action="<?php echo URLROOT; ?>/users/profile" method="POST" class="space-y-8">
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div>
<label class="block text-sm font-bold text-on-surface-variant uppercase tracking-widest mb-2">Full Name</label>
<input name="name" type="text" class="w-full bg-surface-container-high border-0 rounded-xl py-3 px-4 text-on-surface focus:ring-2 focus:ring-primary/40 transition-all <?php echo (!empty($data['name_err'])) ? 'ring-2 ring-error' : ''; ?>" value="<?php echo $data['name']; ?>"/>
<span class="text-xs text-error mt-1"><?php echo $data['name_err']; ?></span>
</div>
<div>
<label class="block text-sm font-bold text-on-surface-variant uppercase tracking-widest mb-2">Email Address</label>
<input name="email" type="email" class="w-full bg-surface-container-high border-0 rounded-xl py-3 px-4 text-on-surface focus:ring-2 focus:ring-primary/40 transition-all <?php echo (!empty($data['email_err'])) ? 'ring-2 ring-error' : ''; ?>" value="<?php echo $data['email']; ?>"/>
<span class="text-xs text-error mt-1"><?php echo $data['email_err']; ?></span>
</div>
</div>

<div class="pt-6 border-t border-outline-variant/10">
<h4 class="font-headline font-bold text-lg text-primary mb-6">Security</h4>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div>
<label class="block text-sm font-bold text-on-surface-variant uppercase tracking-widest mb-2">New Password</label>
<input name="password" type="password" class="w-full bg-surface-container-high border-0 rounded-xl py-3 px-4 text-on-surface focus:ring-2 focus:ring-primary/40 transition-all <?php echo (!empty($data['password_err'])) ? 'ring-2 ring-error' : ''; ?>" placeholder="Leave blank to keep current"/>
<span class="text-xs text-error mt-1"><?php echo $data['password_err']; ?></span>
</div>
<div>
<label class="block text-sm font-bold text-on-surface-variant uppercase tracking-widest mb-2">Confirm New Password</label>
<input name="confirm_password" type="password" class="w-full bg-surface-container-high border-0 rounded-xl py-3 px-4 text-on-surface focus:ring-2 focus:ring-primary/40 transition-all <?php echo (!empty($data['confirm_password_err'])) ? 'ring-2 ring-error' : ''; ?>" placeholder="Leave blank to keep current"/>
<span class="text-xs text-error mt-1"><?php echo $data['confirm_password_err']; ?></span>
</div>
</div>
</div>

<div class="flex justify-end gap-4 pt-8">
<button type="submit" class="bg-primary text-on-primary px-8 py-3 rounded-full font-bold shadow-lg hover:opacity-90 transition-opacity">
                        Save Changes
                    </button>
</div>
</form>
</div>
</div>
</div>
</main>
</body>
</html>
