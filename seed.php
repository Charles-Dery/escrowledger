<?php
require 'config/config.php';
require 'app/core/Database.php';

$db = new Database();

// Clear existing data (optional but good for a fresh start in a demo)
$db->query('SET FOREIGN_KEY_CHECKS = 0');
$db->execute();

$tables = ['balance_history', 'transactions', 'saved_houses', 'property_images', 'properties', 'users'];
foreach ($tables as $table) {
    $db->query("TRUNCATE TABLE $table");
    $db->execute();
}

$db->query('SET FOREIGN_KEY_CHECKS = 1');
$db->execute();

// Seed Users
$password = password_hash('123456', PASSWORD_DEFAULT);
$db->query('INSERT INTO users (id, name, email, password, role) VALUES 
(1, "Admin User", "admin@estateledger.com", :pass, "admin"),
(2, "John Agent", "agent@estateledger.com", :pass, "agent"),
(3, "Sarah Buyer", "buyer@estateledger.com", :pass, "buyer")');
$db->bind(':pass', $password);
$db->execute();

// Seed Properties
$db->query("INSERT INTO properties (id, title, description, price, type, bedrooms, bathrooms, sqft, year_built, address, city, state, zip, location, agent_id, status) VALUES
(1, 'Modern Villa', 'Beautiful 4-bedroom villa with ocean view', 850000.00, 'residential', 4, 3.5, 3200, 2018, '123 Ocean Way', 'Malibu', 'CA', '90265', 'Malibu, CA', 2, 'available'),
(2, 'Downtown Loft', 'Industrial style loft in the heart of the city', 450000.00, 'residential', 1, 1.0, 950, 1920, '456 Main St', 'Los Angeles', 'CA', '90012', 'Los Angeles, CA', 2, 'available'),
(3, 'Mountain Retreat', 'Cozy cabin with stunning mountain views', 320000.00, 'residential', 2, 1.5, 1200, 1995, '789 Peak Rd', 'Aspen', 'CO', '81611', 'Aspen, CO', 2, 'sold'),
(4, 'Suburban Family Home', 'Spacious home with a large backyard', 550000.00, 'residential', 3, 2.0, 1800, 2005, '101 Pine Ln', 'Pasadena', 'CA', '91101', 'Pasadena, CA', 2, 'available')");
$db->execute();

// Seed Property Images
$db->query("INSERT INTO property_images (property_id, image_url, caption) VALUES
(1, 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=1200&q=80', 'Front View'),
(1, 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1200&q=80', 'Pool Side'),
(2, 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&fit=crop&w=1200&q=80', 'Living Room'),
(3, 'https://images.unsplash.com/photo-1518780664697-55e3ad937233?auto=format&fit=crop&w=1200&q=80', 'Exterior'),
(4, 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80', 'Main House')");
$db->execute();

// Seed Saved Houses
$db->query("INSERT INTO saved_houses (buyer_id, property_id) VALUES (3, 1), (3, 2)");
$db->execute();

// Seed Transactions
$db->query("INSERT INTO transactions (id, property_id, buyer_id, agent_id, amount, status) VALUES (1, 3, 3, 2, 320000.00, 'completed')");
$db->execute();

// Seed Balance History
$db->query("INSERT INTO balance_history (buyer_id, transaction_id, amount, type, description) VALUES
(3, 1, 320000.00, 'debit', 'Payment for Mountain Retreat'),
(3, NULL, 500000.00, 'credit', 'Initial Deposit')");
$db->execute();

echo "Database seeded successfully!\n";
unlink(__FILE__); // Self-delete
