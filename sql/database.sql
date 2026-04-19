CREATE DATABASE IF NOT EXISTS real_estate_ms;
USE real_estate_ms;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'agent', 'buyer') DEFAULT 'buyer',
    status ENUM('active', 'deactivated', 'pending') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS properties (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(15, 2) NOT NULL,
    type ENUM('residential', 'commercial', 'land') DEFAULT 'residential',
    bedrooms INT,
    bathrooms DECIMAL(3, 1),
    sqft INT,
    year_built INT,
    address VARCHAR(255),
    city VARCHAR(100),
    state VARCHAR(100),
    zip VARCHAR(20),
    location VARCHAR(255) NOT NULL,
    agent_id INT NOT NULL,
    status ENUM('available', 'pending', 'sold') DEFAULT 'available',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (agent_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS property_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    property_id INT NOT NULL,
    image_url TEXT NOT NULL,
    caption VARCHAR(255),
    FOREIGN KEY (property_id) REFERENCES properties(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS saved_houses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    buyer_id INT NOT NULL,
    property_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (buyer_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (property_id) REFERENCES properties(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    property_id INT NOT NULL,
    buyer_id INT NOT NULL,
    agent_id INT NOT NULL,
    amount DECIMAL(15, 2) NOT NULL,
    status ENUM('pending', 'completed', 'cancelled') DEFAULT 'pending',
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (property_id) REFERENCES properties(id) ON DELETE CASCADE,
    FOREIGN KEY (buyer_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (agent_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS balance_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    buyer_id INT NOT NULL,
    transaction_id INT,
    amount DECIMAL(15, 2) NOT NULL,
    type ENUM('credit', 'debit') NOT NULL,
    description TEXT,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (buyer_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (transaction_id) REFERENCES transactions(id) ON DELETE SET NULL
);

-- Seed Data
INSERT INTO users (name, email, password, role, status) VALUES 
('Admin User', 'admin@estateledger.com', '$2y$12$oi6Ve0Rr7Olx3mcpY8KnTesai1K0ooX/g916wkWGeo19fJSkDMv22', 'admin', 'active'),
('John Agent', 'agent@estateledger.com', '$2y$12$oi6Ve0Rr7Olx3mcpY8KnTesai1K0ooX/g916wkWGeo19fJSkDMv22', 'agent', 'active'),
('Sarah Buyer', 'buyer@estateledger.com', '$2y$12$oi6Ve0Rr7Olx3mcpY8KnTesai1K0ooX/g916wkWGeo19fJSkDMv22', 'buyer', 'active');

INSERT INTO properties (title, description, price, type, bedrooms, bathrooms, sqft, year_built, address, city, state, zip, location, agent_id, status) VALUES
('Modern Villa', 'Beautiful 4-bedroom villa with ocean view', 850000.00, 'residential', 4, 3.5, 3200, 2018, '123 Ocean Way', 'Malibu', 'CA', '90265', 'Malibu, CA', 2, 'available'),
('Downtown Loft', 'Industrial style loft in the heart of the city', 450000.00, 'residential', 1, 1.0, 950, 1920, '456 Main St', 'Los Angeles', 'CA', '90012', 'Los Angeles, CA', 2, 'available'),
('Mountain Retreat', 'Cozy cabin with stunning mountain views', 320000.00, 'residential', 2, 1.5, 1200, 1995, '789 Peak Rd', 'Aspen', 'CO', '81611', 'Aspen, CO', 2, 'sold'),
('Suburban Family Home', 'Spacious home with a large backyard', 550000.00, 'residential', 3, 2.0, 1800, 2005, '101 Pine Ln', 'Pasadena', 'CA', '91101', 'Pasadena, CA', 2, 'available');

INSERT INTO property_images (property_id, image_url, caption) VALUES
(1, 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=1200&q=80', 'Front View'),
(1, 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1200&q=80', 'Pool Side'),
(2, 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&fit=crop&w=1200&q=80', 'Living Room'),
(3, 'https://images.unsplash.com/photo-1518780664697-55e3ad937233?auto=format&fit=crop&w=1200&q=80', 'Exterior'),
(4, 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80', 'Main House');

INSERT INTO saved_houses (buyer_id, property_id) VALUES
(3, 1),
(3, 2);

INSERT INTO transactions (property_id, buyer_id, agent_id, amount, status) VALUES
(3, 3, 2, 320000.00, 'completed');

INSERT INTO balance_history (buyer_id, transaction_id, amount, type, description) VALUES
(3, 1, 320000.00, 'debit', 'Payment for Mountain Retreat'),
(3, NULL, 500000.00, 'credit', 'Initial Deposit');
