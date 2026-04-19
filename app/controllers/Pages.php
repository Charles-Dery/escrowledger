<?php
class Pages extends Controller {
    public function __construct() {
    }

    public function index() {
        if (isLoggedIn()) {
            if ($_SESSION['user_role'] == 'admin') {
                redirect('admin/dashboard');
            } elseif ($_SESSION['user_role'] == 'agent') {
                redirect('agent/dashboard');
            } else {
                redirect('buyer/dashboard');
            }
        } else {
            redirect('users/login');
        }
    }
}
