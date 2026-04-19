<?php
class User {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Register user
    public function register($data) {
        $this->db->query('INSERT INTO users (name, email, password, role) VALUES(:name, :email, :password, :role)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':role', $data['role']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Login user
    public function login($email, $password) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if ($row) {
            $hashed_password = $row->password;
            if (password_verify($password, $hashed_password)) {
                return $row;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    // Find user by email
    public function findUserByEmail($email) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Get user by ID
    public function getUserById($id) {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    // Get all users
    public function getUsers() {
        $this->db->query('SELECT * FROM users ORDER BY created_at DESC');
        return $this->db->resultSet();
    }

    // Update user status
    public function updateStatus($id, $status) {
        $this->db->query('UPDATE users SET status = :status WHERE id = :id');
        $this->db->bind(':status', $status);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    // Update user profile
    public function updateProfile($data) {
        $this->db->query('UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        return $this->db->execute();
    }

    // Get users by role
    public function getUsersByRole($role) {
        $this->db->query('SELECT * FROM users WHERE role = :role ORDER BY name ASC');
        $this->db->bind(':role', $role);
        return $this->db->resultSet();
    }

    // Get users by status
    public function getUsersByStatus($status) {
        $this->db->query('SELECT * FROM users WHERE status = :status ORDER BY created_at DESC');
        $this->db->bind(':status', $status);
        return $this->db->resultSet();
    }

    // Get pending users (for registration approval)
    public function getPendingUsers() {
        $this->db->query('SELECT * FROM users WHERE status = "pending" ORDER BY created_at DESC');
        return $this->db->resultSet();
    }

    // Approve user (set status to active)
    public function approveUser($id) {
        $this->db->query('UPDATE users SET status = "active" WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    // Delete user
    public function deleteUser($id) {
        $this->db->query('DELETE FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    // Update user role
    public function updateRole($id, $role) {
        $this->db->query('UPDATE users SET role = :role WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':role', $role);
        return $this->db->execute();
    }

    // Update user info
    public function updateUser($data) {
        $this->db->query('UPDATE users SET name = :name, email = :email, role = :role WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':role', $data['role']);
        return $this->db->execute();
    }
}
