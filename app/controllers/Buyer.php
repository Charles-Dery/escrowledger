<?php
class Buyer extends Controller {
    private $propertyModel;
    private $userModel;

    public function __construct() {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        if ($_SESSION['user_role'] != 'buyer') {
            redirect('pages/index');
        }
        $this->propertyModel = $this->model('Property');
        $this->userModel = $this->model('User');
    }

    public function index() {
        $this->dashboard();
    }

    public function dashboard() {
        $savedHouses = $this->propertyModel->getSavedHouses($_SESSION['user_id']);
        foreach($savedHouses as $house) {
            $house->images = $this->propertyModel->getPropertyImages($house->id);
        }
        $balanceHistory = $this->propertyModel->getBalanceHistory($_SESSION['user_id']);
        $recommendations = $this->propertyModel->getRecommendations();
        foreach($recommendations as $rec) {
            $rec->images = $this->propertyModel->getPropertyImages($rec->id);
        }

        $availableProperties = $this->propertyModel->getAvailableProperties(6);
        foreach($availableProperties as $ap) {
            $ap->images = $this->propertyModel->getPropertyImages($ap->id);
        }
        
        // Fetch active transaction (escrow)
        $activeEscrow = $this->propertyModel->getActiveTransaction($_SESSION['user_id']);
        if ($activeEscrow) {
            $activeEscrow->images = $this->propertyModel->getPropertyImages($activeEscrow->property_id);
            if (empty($activeEscrow->images)) {
                $fallbackImages = [];
                for ($i = 1; $i <= 6; $i++) {
                    $img = new stdClass();
                    $img->image_url = URLROOT . '/images/' . $i . '.jpeg';
                    $fallbackImages[] = $img;
                }
                $activeEscrow->images = $fallbackImages;
            }
        }

        $data = [
            'saved_houses' => $savedHouses,
            'balance_history' => $balanceHistory,
            'recommendations' => $recommendations,
            'available_properties' => $availableProperties,
            'active_escrow' => $activeEscrow
        ];

        $this->view('buyer/dashboard', $data);
    }

    public function catalog() {
        $filters = [
            'location' => isset($_GET['location']) ? trim($_GET['location']) : '',
            'min_price' => isset($_GET['min_price']) ? trim($_GET['min_price']) : '',
            'max_price' => isset($_GET['max_price']) ? trim($_GET['max_price']) : '',
            'types' => isset($_GET['types']) ? $_GET['types'] : []
        ];

        // Fetch properties based on filters
        $properties = $this->propertyModel->searchProperties($filters);
        
        foreach($properties as $property) {
            $property->images = $this->propertyModel->getPropertyImages($property->id);
        }

        $data = [
            'properties' => $properties,
            'filters' => $filters
        ];

        $this->view('buyer/catalog', $data);
    }

    public function property($id) {
        $property = $this->propertyModel->getPropertyById($id);
        if (!$property) {
            redirect('buyer/catalog');
        }

        $property->images = $this->propertyModel->getPropertyImages($id);
        $agent = $this->userModel->getUserById($property->agent_id);

        $data = [
            'property' => $property,
            'agent' => $agent
        ];

        $this->view('buyer/property', $data);
    }

    public function financials() {
        $balanceHistory = $this->propertyModel->getBalanceHistory($_SESSION['user_id']);
        $totalBalance = 0;
        $listingPrice = 0;
        $paidSoFar = 0;

        foreach($balanceHistory as $item) {
            $description = strtolower(trim((string) $item->description));

            if ($item->type == 'debit' && strpos($description, 'listing price') !== false) {
                $listingPrice = (float) $item->amount;
                continue;
            }

            if ($item->type == 'debit' && (
                strpos($description, 'paid') !== false ||
                strpos($description, 'payment made') !== false
            )) {
                $paidSoFar += (float) $item->amount;
            }
        }

        if ($listingPrice > 0) {
            $totalBalance = -($listingPrice - $paidSoFar);
        }

        $data = [
            'balance_history' => $balanceHistory,
            'total_balance' => $totalBalance
        ];

        $this->view('buyer/financials', $data);
    }

    public function save_property($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->propertyModel->saveProperty($_SESSION['user_id'], $id)) {
                flash('catalog_message', 'Property saved');
            } else {
                flash('catalog_message', 'Already saved', 'alert alert-danger');
            }
            redirect('buyer/catalog');
        }
    }

    public function unsave_property($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->propertyModel->unsaveProperty($_SESSION['user_id'], $id)) {
                flash('dashboard_message', 'Property removed from saved');
            }
            redirect('buyer/dashboard');
        }
    }

    public function inquire($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $property = $this->propertyModel->getPropertyById($id);
            if (!$property || $property->status != 'available') {
                redirect('buyer/catalog');
            }

            // Create a pending transaction (purchase in progress)
            $transactionData = [
                'property_id' => $id,
                'buyer_id' => $_SESSION['user_id'],
                'agent_id' => $property->agent_id,
                'amount' => $property->price,
                'status' => 'pending'
            ];

            if ($this->propertyModel->createTransaction($transactionData)) {
                $this->propertyModel->updateStatus($id, 'reserved');

                // Remove from saved houses if saved
                $this->propertyModel->unsaveProperty($_SESSION['user_id'], $id);

                flash('dashboard_message', 'Purchase started for ' . $property->title . '. Your payments will appear in your Financial Ledger.');
                redirect('buyer/dashboard');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('buyer/property/' . $id);
        }
    }
}
