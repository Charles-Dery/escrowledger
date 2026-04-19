<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Edit Buyer Financials - Estate Ledger</title>
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
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-100 rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/user_approvals">
<span class="material-symbols-outlined text-xl">fact_check</span>User Approvals
</a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-100 rounded-lg font-headline text-sm font-medium" href="<?php echo URLROOT; ?>/admin/property_catalog">
<span class="material-symbols-outlined text-xl">home</span>Property Catalog
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
<h2 class="font-headline font-bold tracking-tight text-xl text-primary">Edit Buyer Financials</h2>
</div>
<div class="flex items-center gap-4">
<p class="text-sm font-bold text-primary mr-2"><?php echo $_SESSION['user_name']; ?></p>
<img alt="Admin" class="w-9 h-9 rounded-full object-cover border border-surface-variant" src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&background=002045&color=fff"/>
</div>
</header>

<div class="p-8">
<?php flash('buyer_message'); ?>

<div class="bg-surface-container-lowest rounded-xl p-6 mb-8 flex items-center gap-4">
<img alt="<?php echo $data['buyer']->name; ?>" class="w-16 h-16 rounded-full object-cover" src="https://ui-avatars.com/api/?name=<?php echo urlencode($data['buyer']->name); ?>&background=random&color=fff"/>
<div>
<h3 class="font-headline font-bold text-xl text-primary"><?php echo $data['buyer']->name; ?></h3>
<p class="font-body text-sm text-on-surface-variant"><?php echo $data['buyer']->email; ?></p>
</div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
<div class="bg-surface-container-lowest rounded-xl p-6">
<h3 class="font-headline font-bold text-lg text-primary mb-6">Balance History</h3>
<div class="space-y-4">
<?php 
$totalBalance = 0;
foreach($data['buyer']->balance_history as $bh): 
    if($bh->type == 'credit') $totalBalance += $bh->amount;
    else $totalBalance -= $bh->amount;
?>
<div class="bg-surface-container-low rounded-lg p-4 relative group">
<div class="flex justify-between items-start mb-2">
<div>
<span class="inline-flex items-center gap-1.5 py-1 px-2 rounded-full text-xs font-medium <?php echo $bh->type == 'credit' ? 'bg-secondary-fixed/30 text-on-secondary-fixed-variant' : 'bg-error-container text-on-error-container'; ?>">
<span class="w-1.5 h-1.5 rounded-full <?php echo $bh->type == 'credit' ? 'bg-secondary' : 'bg-error'; ?>"></span>
<?php echo ucfirst($bh->type); ?>
</span>
</div>
<div class="flex items-center gap-2">
<form action="<?php echo URLROOT; ?>/admin/edit_buyer/<?php echo $data['buyer']->id; ?>" method="POST" class="hidden group-hover:flex gap-1">
<input type="hidden" name="record_id" value="<?php echo $bh->id; ?>"/>
<input type="hidden" name="amount" value="<?php echo $bh->amount; ?>"/>
<input type="hidden" name="type" value="<?php echo $bh->type; ?>"/>
<input type="hidden" name="description" value="<?php echo htmlspecialchars($bh->description); ?>"/>
<button type="submit" name="edit_financial" class="p-1 rounded hover:bg-surface-container-high transition-colors" title="Edit">
<span class="material-symbols-outlined text-sm text-on-surface-variant">edit</span>
</button>
<button type="submit" name="delete_financial" class="p-1 rounded hover:bg-error-container transition-colors" title="Delete" onclick="return confirm('Delete this record?');">
<span class="material-symbols-outlined text-sm text-error">delete</span>
</button>
</form>
</div>
</div>
<div class="font-headline font-bold text-lg <?php echo $bh->type == 'credit' ? 'text-secondary' : 'text-error'; ?>">
<?php echo $bh->type == 'credit' ? '+' : '-'; ?>$<?php echo number_format($bh->amount, 2); ?>
</div>
<p class="font-body text-xs text-on-surface-variant mt-1"><?php echo htmlspecialchars($bh->description); ?></p>
</div>
<?php endforeach; ?>
</div>
<div class="mt-6 pt-4 border-t border-outline-variant/15">
<div class="flex justify-between items-center">
<span class="font-headline font-bold text-on-surface">Current Balance:</span>
<span class="font-headline font-bold text-xl <?php echo $totalBalance >= 0 ? 'text-secondary' : 'text-error'; ?>">$<?php echo number_format($totalBalance, 2); ?></span>
</div>
</div>
</div>

<div class="bg-surface-container-lowest rounded-xl p-6">
<h3 class="font-headline font-bold text-lg text-primary mb-6">Add/Edit Financial Record</h3>
<form action="<?php echo URLROOT; ?>/admin/edit_buyer/<?php echo $data['buyer']->id; ?>" method="POST" class="space-y-4">
<?php if(isset($_POST['edit_financial'])): ?>
<input type="hidden" name="record_id" value="<?php echo $_POST['record_id']; ?>"/>
<input type="hidden" name="update_financial" value="1"/>
<div class="bg-secondary-fixed/10 border border-secondary/20 rounded-lg p-4 mb-4">
<p class="font-body text-sm text-secondary font-medium">Editing Record</p>
</div>
<?php else: ?>
<input type="hidden" name="add_financial" value="1"/>
<?php endif; ?>
<div>
<label class="block font-body text-sm font-medium text-on-surface mb-2">Amount ($)</label>
<input name="amount" required type="number" step="0.01" class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-sm" placeholder="0.00" value="<?php echo isset($_POST['amount']) ? $_POST['amount'] : ''; ?>"/>
</div>
<div>
<label class="block font-body text-sm font-medium text-on-surface mb-2">Type</label>
<select name="type" required class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-sm">
<option value="credit" <?php echo isset($_POST['type']) && $_POST['type'] == 'credit' ? 'selected' : ''; ?>>Credit (Deposit)</option>
<option value="debit" <?php echo isset($_POST['type']) && $_POST['type'] == 'debit' ? 'selected' : ''; ?>>Debit (Withdrawal)</option>
</select>
</div>
<div>
<label class="block font-body text-sm font-medium text-on-surface mb-2">Description</label>
<input name="description" class="w-full bg-surface-container-highest border-0 rounded-lg py-3 px-4 text-sm" placeholder="e.g. Initial Deposit" value="<?php echo isset($_POST['description']) ? htmlspecialchars($_POST['description']) : ''; ?>"/>
</div>
<div class="flex gap-3 pt-4">
<button type="submit" class="flex-1 px-6 py-3 rounded-full bg-primary text-white font-medium hover:opacity-90 transition-opacity shadow-lg">
<?php echo isset($_POST['edit_financial']) ? 'Update Record' : 'Add Record'; ?>
</button>
<?php if(isset($_POST['edit_financial'])): ?>
<a href="<?php echo URLROOT; ?>/admin/edit_buyer/<?php echo $data['buyer']->id; ?>" class="px-6 py-3 rounded-full text-on-surface font-medium hover:bg-surface-container transition-colors">Cancel</a>
<?php endif; ?>
</div>
</form>
</div>
</div>
</div>
</main>
</body>
</html>
