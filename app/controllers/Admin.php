<?php
class Admin extends Controller {
    private $userModel;
    private $propertyModel;

    public function __construct() {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        if ($_SESSION['user_role'] != 'admin') {
            redirect('pages/index');
        }
        $this->userModel = $this->model('User');
        $this->propertyModel = $this->model('Property');
    }

    public function index() {
        $this->dashboard();
    }

    public function dashboard() {
        $users = $this->userModel->getUsers();
        $totalUsers = count($users);
        $activeAgents = 0;
        foreach($users as $user) {
            if($user->role == 'agent' && $user->status == 'active') {
                $activeAgents++;
            }
        }

        $pendingApprovals = count($this->propertyModel->getPropertiesByStatus('pending'));
        $activeListings = count($this->propertyModel->getPropertiesByStatus('available'));

        $data = [
            'total_users' => $totalUsers,
            'active_agents' => $activeAgents,
            'pending_approvals' => $pendingApprovals,
            'active_listings' => $activeListings,
            'total_revenue' => 45800000,
            'monthly_growth' => 12.5,
            'avg_close_time' => 24
        ];

        $this->view('admin/dashboard', $data);
    }

    public function users() {
        $users = $this->userModel->getUsers();
        
        $totalUsers = count($users);
        $activeAgents = 0;
        $deactivated = 0;
        foreach($users as $user) {
            if($user->role == 'agent' && $user->status == 'active') {
                $activeAgents++;
            }
            if($user->status == 'deactivated') {
                $deactivated++;
            }
        }

        $data = [
            'users' => $users,
            'total_users' => $totalUsers,
            'active_agents' => $activeAgents,
            'pending_approvals' => count($this->propertyModel->getPropertiesByStatus('pending')),
            'deactivated' => $deactivated
        ];

        $this->view('admin/users', $data);
    }

    public function toggle_user($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $this->userModel->getUserById($id);
            if (!$user) {
                redirect('admin/users');
            }

            $newStatus = ($user->status == 'active') ? 'deactivated' : 'active';
            
            if ($this->userModel->updateStatus($id, $newStatus)) {
                flash('user_message', 'User status updated');
                redirect('admin/users');
            } else {
                die('Something went wrong');
            }
        }
    }

    public function approvals() {
        $pendingProperties = $this->propertyModel->getPropertiesByStatus('pending');

        $data = [
            'properties' => $pendingProperties,
            'total_pending' => count($pendingProperties)
        ];

        $this->view('admin/approvals', $data);
    }

    public function approve($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->propertyModel->updateStatus($id, 'available')) {
                flash('approval_message', 'Property Approved');
                redirect('admin/approvals');
            } else {
                die('Something went wrong');
            }
        }
    }

    public function reject($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->propertyModel->deleteProperty($id)) {
                flash('approval_message', 'Property Rejected');
                redirect('admin/approvals');
            } else {
                die('Something went wrong');
            }
        }
    }

    public function analytics() {
        $activeListings = count($this->propertyModel->getPropertiesByStatus('available'));
        $totalRevenue = $this->propertyModel->getTotalRevenue();

        $data = [
            'total_revenue' => $totalRevenue,
            'monthly_growth' => 12.5,
            'active_listings' => $activeListings,
            'avg_close_time' => 24
        ];

        $this->view('admin/analytics', $data);
    }

    public function add_property() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            $uploadedImages = [];
            $imageFields = ['image_file_1', 'image_file_2', 'image_file_3', 'image_file_4', 'image_file_5'];

            foreach ($imageFields as $field) {
                if (!empty($_FILES[$field]['name'])) {
                    $uploadResult = $this->uploadImage($field);
                    if ($uploadResult !== false) {
                        $uploadedImages[] = $uploadResult;
                    }
                }
            }

            $data = [
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'price' => trim($_POST['price']),
                'type' => trim($_POST['type']),
                'bedrooms' => trim($_POST['bedrooms']),
                'bathrooms' => trim($_POST['bathrooms']),
                'sqft' => trim($_POST['sqft']),
                'year_built' => trim($_POST['year_built']),
                'address' => trim($_POST['address']),
                'city' => trim($_POST['city']),
                'state' => trim($_POST['state']),
                'zip' => trim($_POST['zip']),
                'location' => trim($_POST['city']) . ', ' . trim($_POST['state']),
                'agent_id' => trim($_POST['agent_id']),
                'status' => 'available',
                'image_url_1' => trim($_POST['image_url_1']),
                'image_url_2' => trim($_POST['image_url_2']),
                'image_url_3' => trim($_POST['image_url_3']),
                'image_url_4' => trim($_POST['image_url_4']),
                'image_url_5' => trim($_POST['image_url_5'])
            ];

            $hasUrlImage = !empty($data['image_url_1']) || !empty($data['image_url_2']) || !empty($data['image_url_3']) || !empty($data['image_url_4']) || !empty($data['image_url_5']);
            $hasImage = !empty($uploadedImages) || $hasUrlImage;

            if (!empty($data['title']) && !empty($data['price']) && !empty($data['agent_id']) && $hasImage) {
                $property_id = $this->propertyModel->addProperty($data);
                if ($property_id) {
                    foreach ($uploadedImages as $url) {
                        $this->propertyModel->addPropertyImage([
                            'property_id' => $property_id,
                            'image_url' => $url
                        ]);
                    }

                    $urlImages = [];
                    if (!empty($data['image_url_1'])) $urlImages[] = $data['image_url_1'];
                    if (!empty($data['image_url_2'])) $urlImages[] = $data['image_url_2'];
                    if (!empty($data['image_url_3'])) $urlImages[] = $data['image_url_3'];
                    if (!empty($data['image_url_4'])) $urlImages[] = $data['image_url_4'];
                    if (!empty($data['image_url_5'])) $urlImages[] = $data['image_url_5'];

                    foreach ($urlImages as $url) {
                        $this->propertyModel->addPropertyImage([
                            'property_id' => $property_id,
                            'image_url' => $url
                        ]);
                    }
                    flash('property_message', 'Property Added Successfully');
                    redirect('admin/property_catalog');
                } else {
                    die('Something went wrong');
                }
            } else {
                flash('property_message', 'Please fill in all required fields and add at least one image', 'alert alert-danger');
                $agents = $this->userModel->getUsersByRole('agent');
                $data['agents'] = $agents;
                $this->view('admin/add_property', $data);
            }
        } else {
            $agents = $this->userModel->getUsersByRole('agent');
            $data = [
                'agents' => $agents,
                'title' => '', 'description' => '', 'price' => '', 'type' => '', 'bedrooms' => '', 'bathrooms' => '', 'sqft' => '', 'year_built' => '', 'address' => '', 'city' => '', 'state' => '', 'zip' => '', 'agent_id' => '',
                'image_url_1' => '', 'image_url_2' => '', 'image_url_3' => '', 'image_url_4' => '', 'image_url_5' => ''
            ];
            $this->view('admin/add_property', $data);
        }
    }

    public function make_available($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $property = $this->propertyModel->getPropertyById($id);
            if (!$property) {
                redirect('admin/property_catalog');
            }
            $this->propertyModel->cancelPendingTransactionsByProperty($id);
            $this->propertyModel->updateStatus($id, 'available');
            flash('property_message', 'Property is now available');
            redirect('admin/property_catalog');
        } else {
            redirect('admin/property_catalog');
        }
    }

    private function uploadImage($fieldName) {
        if (isset($_FILES[$fieldName]) && $_FILES[$fieldName]['error'] === UPLOAD_ERR_OK) {
            $uploadDirPath = dirname(__DIR__, 2) . '/images/';
            if (!is_dir($uploadDirPath)) {
                mkdir($uploadDirPath, 0755, true);
            }

            $fileName = time() . '_' . basename($_FILES[$fieldName]['name']);
            $targetPath = $uploadDirPath . $fileName;

            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            $fileType = mime_content_type($_FILES[$fieldName]['tmp_name']);

            if (in_array($fileType, $allowedTypes)) {
                if (move_uploaded_file($_FILES[$fieldName]['tmp_name'], $targetPath)) {
                    return URLROOT . '/images/' . $fileName;
                }
            }
        }
        return false;
    }

    public function property_catalog() {
        $properties = $this->propertyModel->getAllProperties();
        foreach($properties as $property) {
            $property->images = $this->propertyModel->getPropertyImages($property->id);
            $agent = $this->userModel->getUserById($property->agent_id);
            $property->agent_name = $agent ? $agent->name : 'Unknown';
        }
        $data = ['properties' => $properties];
        $this->view('admin/property_catalog', $data);
    }

    public function properties() {
        $properties = $this->propertyModel->getAllProperties();
        foreach($properties as $property) {
            $property->images = $this->propertyModel->getPropertyImages($property->id);
            $agent = $this->userModel->getUserById($property->agent_id);
            $property->agent_name = $agent ? $agent->name : 'Unknown';
        }
        $data = ['properties' => $properties];
        $this->view('admin/properties', $data);
    }

    public function buyers() {
        $buyers = $this->userModel->getUsersByRole('buyer');
        foreach($buyers as $buyer) {
            $buyer->balance_history = $this->propertyModel->getBalanceHistory($buyer->id);
            $buyer->transactions = $this->propertyModel->getTransactionsByBuyer($buyer->id);
            $buyer->saved_properties = $this->propertyModel->getSavedHouses($buyer->id);

            $totalPaid = 0;
            $totalSpent = 0;
            foreach($buyer->balance_history as $bh) {
                if($bh->type == 'credit') $totalPaid += $bh->amount;
                else $totalPaid -= $bh->amount;
            }
            foreach($buyer->transactions as $t) {
                if($t->status == 'completed') $totalSpent += $t->amount;
            }
            $buyer->total_paid = $totalPaid;
            $buyer->total_spent = $totalSpent;
        }
        $data = ['buyers' => $buyers];
        $this->view('admin/buyers', $data);
    }

    public function transactions() {
        $allTransactions = $this->propertyModel->getAllTransactions();
        foreach($allTransactions as $t) {
            $buyer = $this->userModel->getUserById($t->buyer_id);
            $property = $this->propertyModel->getPropertyById($t->property_id);
            $t->buyer_name = $buyer ? $buyer->name : 'Unknown';
            $t->property_title = $property ? $property->title : 'Unknown';
        }
        $data = ['transactions' => $allTransactions];
        $this->view('admin/transactions', $data);
    }

    public function assign_purchase($buyerId = null) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            $buyer_id = trim($_POST['buyer_id']);
            $property_id = trim($_POST['property_id']);

            $buyer = $this->userModel->getUserById($buyer_id);
            $property = $this->propertyModel->getPropertyById($property_id);
            if (!$buyer || $buyer->role != 'buyer' || !$property || $property->status != 'available') {
                flash('buyer_message', 'Invalid buyer or property selection', 'alert alert-danger');
                redirect('admin/buyers');
            }

            $transactionData = [
                'property_id' => $property_id,
                'buyer_id' => $buyer_id,
                'agent_id' => $property->agent_id,
                'amount' => $property->price,
                'status' => 'pending'
            ];

            if ($this->propertyModel->createTransaction($transactionData)) {
                $this->propertyModel->updateStatus($property_id, 'reserved');
                flash('buyer_message', 'Current purchase set for ' . $buyer->name);
                redirect('admin/buyers');
            } else {
                die('Something went wrong');
            }
        } else {
            $buyers = $this->userModel->getUsersByRole('buyer');
            $properties = $this->propertyModel->getPropertiesByStatus('available');

            $data = [
                'buyers' => $buyers,
                'properties' => $properties,
                'buyer_id' => $buyerId ? $buyerId : ''
            ];
            $this->view('admin/assign_purchase', $data);
        }
    }

    public function delete_purchase($transactionId) {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            redirect('admin/transactions');
        }

        $_POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $transaction = $this->propertyModel->getTransactionById($transactionId);
        if (!$transaction) {
            flash('buyer_message', 'Purchase record not found', 'alert alert-danger');
            redirect('admin/buyers');
        }

        $redirectTo = !empty($_POST['redirect_to']) && $_POST['redirect_to'] == 'buyers'
            ? 'admin/buyers'
            : 'admin/transactions';

        $this->propertyModel->deleteBalanceHistoryByTransaction($transactionId);

        if ($this->propertyModel->deleteTransaction($transactionId)) {
            if (!$this->propertyModel->hasOpenTransactionsForProperty($transaction->property_id)) {
                $this->propertyModel->updateStatus($transaction->property_id, 'available');
            }

            if ($redirectTo == 'admin/buyers') {
                flash('buyer_message', 'Buyer purchase deleted successfully');
            } else {
                flash('transaction_message', 'Purchase deleted successfully');
            }
            redirect($redirectTo);
        } else {
            die('Something went wrong');
        }
    }

    public function user_approvals() {
        $pendingUsers = $this->userModel->getPendingUsers();
        $data = ['pending_users' => $pendingUsers];
        $this->view('admin/user_approvals', $data);
    }

    public function approve_user($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->userModel->approveUser($id)) {
                flash('user_message', 'User approved successfully');
                redirect('admin/user_approvals');
            } else {
                die('Something went wrong');
            }
        }
    }

    public function reject_user($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->userModel->deleteUser($id)) {
                flash('user_message', 'User registration rejected');
                redirect('admin/user_approvals');
            } else {
                die('Something went wrong');
            }
        }
    }

    public function edit_user($id) {
        $user = $this->userModel->getUserById($id);
        if (!$user) {
            redirect('admin/users');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            $data = [
                'id' => $id,
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'role' => trim($_POST['role'])
            ];

            if (!empty($data['name']) && !empty($data['email']) && !empty($data['role'])) {
                if ($this->userModel->updateUser($data)) {
                    flash('user_message', 'User updated successfully');
                    redirect('admin/users');
                } else {
                    die('Something went wrong');
                }
            } else {
                flash('user_message', 'Please fill in all fields', 'alert alert-danger');
                $this->view('admin/edit_user', ['user' => $user]);
            }
        } else {
            $this->view('admin/edit_user', ['user' => $user]);
        }
    }

    public function edit_buyer($id) {
        $buyer = $this->userModel->getUserById($id);
        if (!$buyer || $buyer->role != 'buyer') {
            redirect('admin/buyers');
        }

        $buyer->balance_history = $this->propertyModel->getBalanceHistory($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            if (isset($_POST['update_financial'])) {
                $data = [
                    'id' => trim($_POST['record_id']),
                    'amount' => trim($_POST['amount']),
                    'type' => trim($_POST['type']),
                    'description' => trim($_POST['description'])
                ];

                if (!empty($data['amount']) && !empty($data['type'])) {
                    if ($this->propertyModel->updateBalanceHistory($data)) {
                        flash('buyer_message', 'Financial record updated');
                        redirect('admin/edit_buyer/' . $id);
                    } else {
                        die('Something went wrong');
                    }
                }
            } elseif (isset($_POST['add_financial'])) {
                $data = [
                    'buyer_id' => $id,
                    'amount' => trim($_POST['amount']),
                    'type' => trim($_POST['type']),
                    'description' => trim($_POST['description'])
                ];

                if (!empty($data['amount']) && !empty($data['type'])) {
                    if ($this->propertyModel->addBalanceHistory($data)) {
                        flash('buyer_message', 'Financial record added');
                        redirect('admin/edit_buyer/' . $id);
                    } else {
                        die('Something went wrong');
                    }
                }
            } elseif (isset($_POST['delete_financial'])) {
                $recordId = trim($_POST['record_id']);
                if ($this->propertyModel->deleteBalanceHistory($recordId)) {
                    flash('buyer_message', 'Financial record deleted');
                    redirect('admin/edit_buyer/' . $id);
                }
            }
        } else {
            $this->view('admin/edit_buyer', ['buyer' => $buyer]);
        }
    }
}
