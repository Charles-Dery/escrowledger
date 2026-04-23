<?php
class Property {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getProperties() {
        $this->db->query('SELECT properties.*, users.name as agent_name 
                          FROM properties 
                          JOIN users ON properties.agent_id = users.id 
                          ORDER BY properties.created_at DESC');
        return $this->db->resultSet();
    }

    public function getPropertyById($id) {
        $this->db->query('SELECT properties.*, users.name as agent_name 
                          FROM properties 
                          JOIN users ON properties.agent_id = users.id 
                          WHERE properties.id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function getPropertyImages($id) {
        $this->db->query('SELECT * FROM property_images WHERE property_id = :id');
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }

    public function deletePropertyImages($id) {
        $this->db->query('DELETE FROM property_images WHERE property_id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function getSavedHouses($buyer_id) {
        $this->db->query('SELECT properties.*, saved_houses.id as saved_id 
                          FROM properties 
                          JOIN saved_houses ON properties.id = saved_houses.property_id 
                          WHERE saved_houses.buyer_id = :buyer_id');
        $this->db->bind(':buyer_id', $buyer_id);
        return $this->db->resultSet();
    }

    public function saveProperty($buyer_id, $property_id) {
        $this->db->query('SELECT * FROM saved_houses WHERE buyer_id = :buyer_id AND property_id = :property_id');
        $this->db->bind(':buyer_id', $buyer_id);
        $this->db->bind(':property_id', $property_id);
        $this->db->single();

        if ($this->db->rowCount() > 0) {
            return false;
        }

        $this->db->query('INSERT INTO saved_houses (buyer_id, property_id) VALUES(:buyer_id, :property_id)');
        $this->db->bind(':buyer_id', $buyer_id);
        $this->db->bind(':property_id', $property_id);
        return $this->db->execute();
    }

    public function unsaveProperty($buyer_id, $property_id) {
        $this->db->query('DELETE FROM saved_houses WHERE buyer_id = :buyer_id AND property_id = :property_id');
        $this->db->bind(':buyer_id', $buyer_id);
        $this->db->bind(':property_id', $property_id);
        return $this->db->execute();
    }

    public function getBalanceHistory($buyer_id) {
        $this->db->query('SELECT * FROM balance_history WHERE buyer_id = :buyer_id ORDER BY date DESC');
        $this->db->bind(':buyer_id', $buyer_id);
        return $this->db->resultSet();
    }

    public function getPropertiesByAgent($agent_id) {
        $this->db->query('SELECT * FROM properties WHERE agent_id = :agent_id ORDER BY created_at DESC');
        $this->db->bind(':agent_id', $agent_id);
        return $this->db->resultSet();
    }

    public function getRecommendations($limit = 3) {
        $this->db->query('SELECT * FROM properties WHERE status = "available" ORDER BY RAND() LIMIT :limit');
        $this->db->bind(':limit', $limit);
        return $this->db->resultSet();
    }

    public function getAvailableProperties($limit = 6) {
        $limit = (int)$limit;
        if ($limit < 1) {
            $limit = 1;
        }
        $this->db->query('SELECT * FROM properties WHERE status = "available" ORDER BY created_at DESC LIMIT ' . $limit);
        return $this->db->resultSet();
    }

    public function addProperty($data) {
        $status = isset($data['status']) ? $data['status'] : 'available';
        $bedrooms = ($data['bedrooms'] === '' || $data['bedrooms'] === null) ? null : $data['bedrooms'];
        $bathrooms = ($data['bathrooms'] === '' || $data['bathrooms'] === null) ? null : $data['bathrooms'];
        $sqft = ($data['sqft'] === '' || $data['sqft'] === null) ? null : $data['sqft'];
        $yearBuilt = ($data['year_built'] === '' || $data['year_built'] === null) ? null : $data['year_built'];

        $this->db->query('INSERT INTO properties (title, description, price, type, bedrooms, bathrooms, sqft, year_built, address, city, state, zip, location, agent_id, status) 
                          VALUES(:title, :description, :price, :type, :bedrooms, :bathrooms, :sqft, :year_built, :address, :city, :state, :zip, :location, :agent_id, :status)');
        
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':bedrooms', $bedrooms);
        $this->db->bind(':bathrooms', $bathrooms);
        $this->db->bind(':sqft', $sqft);
        $this->db->bind(':year_built', $yearBuilt);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':state', $data['state']);
        $this->db->bind(':zip', $data['zip']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':agent_id', $data['agent_id']);
        $this->db->bind(':status', $status);

        if ($this->db->execute()) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

    public function addPropertyImage($data) {
        $this->db->query('INSERT INTO property_images (property_id, image_url) VALUES(:property_id, :image_url)');
        $this->db->bind(':property_id', $data['property_id']);
        $this->db->bind(':image_url', $data['image_url']);
        return $this->db->execute();
    }

    public function updateProperty($data) {
        $bedrooms = ($data['bedrooms'] === '' || $data['bedrooms'] === null) ? null : $data['bedrooms'];
        $bathrooms = ($data['bathrooms'] === '' || $data['bathrooms'] === null) ? null : $data['bathrooms'];
        $sqft = ($data['sqft'] === '' || $data['sqft'] === null) ? null : $data['sqft'];
        $yearBuilt = ($data['year_built'] === '' || $data['year_built'] === null) ? null : $data['year_built'];

        $this->db->query('UPDATE properties SET title = :title, description = :description, price = :price, type = :type, bedrooms = :bedrooms, bathrooms = :bathrooms, sqft = :sqft, year_built = :year_built, address = :address, city = :city, state = :state, zip = :zip, location = :location WHERE id = :id');
        
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':bedrooms', $bedrooms);
        $this->db->bind(':bathrooms', $bathrooms);
        $this->db->bind(':sqft', $sqft);
        $this->db->bind(':year_built', $yearBuilt);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':state', $data['state']);
        $this->db->bind(':zip', $data['zip']);
        $this->db->bind(':location', $data['location']);

        return $this->db->execute();
    }

    public function updatePropertyImage($data) {
        $this->db->query('SELECT * FROM property_images WHERE property_id = :property_id LIMIT 1');
        $this->db->bind(':property_id', $data['property_id']);
        $this->db->single();

        if ($this->db->rowCount() > 0) {
            $this->db->query('UPDATE property_images SET image_url = :image_url WHERE property_id = :property_id');
        } else {
            $this->db->query('INSERT INTO property_images (property_id, image_url) VALUES(:property_id, :image_url)');
        }
        
        $this->db->bind(':property_id', $data['property_id']);
        $this->db->bind(':image_url', $data['image_url']);
        return $this->db->execute();
    }

    public function getPropertiesByStatus($status) {
        $this->db->query('SELECT properties.*, users.name as agent_name 
                          FROM properties 
                          JOIN users ON properties.agent_id = users.id 
                          WHERE properties.status = :status 
                          ORDER BY properties.created_at DESC');
        $this->db->bind(':status', $status);
        return $this->db->resultSet();
    }

    public function updateStatus($id, $status) {
        $this->db->query('UPDATE properties SET status = :status WHERE id = :id');
        $this->db->bind(':status', $status);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function deleteProperty($id) {
        $this->db->query('DELETE FROM properties WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function getActiveTransaction($buyer_id) {
        $this->db->query('SELECT transactions.*, properties.title, properties.location 
                          FROM transactions 
                          JOIN properties ON transactions.property_id = properties.id 
                          WHERE transactions.buyer_id = :buyer_id 
                          AND transactions.status != "cancelled" 
                          ORDER BY (transactions.status = "pending") DESC, transactions.transaction_date DESC 
                          LIMIT 1');
        $this->db->bind(':buyer_id', $buyer_id);
        return $this->db->single();
    }

    public function searchProperties($filters) {
        $sql = 'SELECT * FROM properties WHERE status = "available"';
        
        if (!empty($filters['location'])) {
            $sql .= ' AND (location LIKE :location OR city LIKE :location OR state LIKE :location)';
        }
        
        if (!empty($filters['min_price'])) {
            $sql .= ' AND price >= :min_price';
        }
        
        if (!empty($filters['max_price'])) {
            $sql .= ' AND price <= :max_price';
        }
        
        if (!empty($filters['types'])) {
            $placeholders = [];
            foreach ($filters['types'] as $key => $type) {
                $placeholders[] = ':type' . $key;
            }
            $sql .= ' AND type IN (' . implode(',', $placeholders) . ')';
        }
        
        $sql .= ' ORDER BY created_at DESC';
        
        $this->db->query($sql);
        
        if (!empty($filters['location'])) {
            $this->db->bind(':location', '%' . $filters['location'] . '%');
        }
        
        if (!empty($filters['min_price'])) {
            $this->db->bind(':min_price', $filters['min_price']);
        }
        
        if (!empty($filters['max_price'])) {
            $this->db->bind(':max_price', $filters['max_price']);
        }

        if (!empty($filters['types'])) {
            foreach ($filters['types'] as $key => $type) {
                $this->db->bind(':type' . $key, $type);
            }
        }
        
        return $this->db->resultSet();
    }

    public function createTransaction($data) {
        $this->db->query('INSERT INTO transactions (property_id, buyer_id, agent_id, amount, status) 
                          VALUES(:property_id, :buyer_id, :agent_id, :amount, :status)');
        $this->db->bind(':property_id', $data['property_id']);
        $this->db->bind(':buyer_id', $data['buyer_id']);
        $this->db->bind(':agent_id', $data['agent_id']);
        $this->db->bind(':amount', $data['amount']);
        $this->db->bind(':status', $data['status']);
        return $this->db->execute();
    }

    public function cancelPendingTransactionsByProperty($property_id) {
        $this->db->query('UPDATE transactions SET status = "cancelled" WHERE property_id = :property_id AND status = "pending"');
        $this->db->bind(':property_id', $property_id);
        return $this->db->execute();
    }

    public function getTransactionById($id) {
        $this->db->query('SELECT * FROM transactions WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function deleteBalanceHistoryByTransaction($transaction_id) {
        $this->db->query('DELETE FROM balance_history WHERE transaction_id = :transaction_id');
        $this->db->bind(':transaction_id', $transaction_id);
        return $this->db->execute();
    }

    public function deleteTransaction($id) {
        $this->db->query('DELETE FROM transactions WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function hasOpenTransactionsForProperty($property_id) {
        $this->db->query('SELECT id FROM transactions WHERE property_id = :property_id AND status IN ("pending", "completed") LIMIT 1');
        $this->db->bind(':property_id', $property_id);
        $this->db->single();
        return $this->db->rowCount() > 0;
    }

    public function getInquiriesByAgent($agent_id) {
        $this->db->query('SELECT transactions.*, properties.title, users.name as buyer_name, users.email as buyer_email 
                          FROM transactions 
                          JOIN properties ON transactions.property_id = properties.id 
                          JOIN users ON transactions.buyer_id = users.id 
                          WHERE transactions.agent_id = :agent_id 
                          ORDER BY transactions.transaction_date DESC');
        $this->db->bind(':agent_id', $agent_id);
        return $this->db->resultSet();
    }

    public function getTotalSalesByAgent($agent_id) {
        $this->db->query('SELECT SUM(amount) as total FROM transactions WHERE agent_id = :agent_id AND status = "completed"');
        $this->db->bind(':agent_id', $agent_id);
        $row = $this->db->single();
        return $row->total ? $row->total : 0;
    }

    public function getTotalRevenue() {
        $this->db->query('SELECT SUM(amount) as total FROM transactions WHERE status = "completed"');
        $row = $this->db->single();
        return $row->total ? $row->total : 0;
    }

    public function getAllProperties() {
        $this->db->query('SELECT * FROM properties ORDER BY created_at DESC');
        return $this->db->resultSet();
    }

    public function getTransactionsByBuyer($buyer_id) {
        $this->db->query('SELECT transactions.*, properties.title as property_title
                          FROM transactions
                          JOIN properties ON transactions.property_id = properties.id
                          WHERE transactions.buyer_id = :buyer_id
                          ORDER BY transactions.transaction_date DESC');
        $this->db->bind(':buyer_id', $buyer_id);
        return $this->db->resultSet();
    }

    public function getAllTransactions() {
        $this->db->query('SELECT * FROM transactions ORDER BY transaction_date DESC');
        return $this->db->resultSet();
    }

    public function addBalanceHistory($data) {
        $this->db->query('INSERT INTO balance_history (buyer_id, transaction_id, amount, type, description) VALUES(:buyer_id, :transaction_id, :amount, :type, :description)');
        $this->db->bind(':buyer_id', $data['buyer_id']);
        $this->db->bind(':transaction_id', isset($data['transaction_id']) ? $data['transaction_id'] : NULL);
        $this->db->bind(':amount', $data['amount']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':description', $data['description']);
        return $this->db->execute();
    }

    public function getBalanceHistoryById($id) {
        $this->db->query('SELECT * FROM balance_history WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function updateBalanceHistory($data) {
        $this->db->query('UPDATE balance_history SET amount = :amount, type = :type, description = :description WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':amount', $data['amount']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':description', $data['description']);
        return $this->db->execute();
    }

    public function deleteBalanceHistory($id) {
        $this->db->query('DELETE FROM balance_history WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
