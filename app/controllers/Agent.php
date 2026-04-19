<?php
class Agent extends Controller {
    private $propertyModel;

    public function __construct() {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        if ($_SESSION['user_role'] != 'agent') {
            redirect('pages/index');
        }
        $this->propertyModel = $this->model('Property');
    }

    public function index() {
        $this->dashboard();
    }

    public function dashboard() {
        $properties = $this->propertyModel->getPropertiesByAgent($_SESSION['user_id']);
        $totalSales = $this->propertyModel->getTotalSalesByAgent($_SESSION['user_id']);
        $inquiries = $this->propertyModel->getInquiriesByAgent($_SESSION['user_id']);
        
        $data = [
            'properties' => $properties,
            'total_sales' => $totalSales,
            'active_listings' => count($properties),
            'pending_inquiries' => count($inquiries)
        ];

        $this->view('agent/dashboard', $data);
    }

    public function inventory() {
        $properties = $this->propertyModel->getPropertiesByAgent($_SESSION['user_id']);
        
        $data = [
            'properties' => $properties
        ];

        $this->view('agent/inventory', $data);
    }

    public function inquiries() {
        $inquiries = $this->propertyModel->getInquiriesByAgent($_SESSION['user_id']);
        
        $data = [
            'inquiries' => $inquiries
        ];

        $this->view('agent/inquiries', $data);
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get property to check ownership
            $property = $this->propertyModel->getPropertyById($id);
            if ($property->agent_id != $_SESSION['user_id']) {
                redirect('agent/dashboard');
            }

            if ($this->propertyModel->deleteProperty($id)) {
                flash('property_message', 'Property Removed');
                redirect('agent/inventory');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('agent/inventory');
        }
    }

    public function add_property() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

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
                'agent_id' => $_SESSION['user_id'],
                'image_url_1' => trim($_POST['image_url_1']),
                'image_url_2' => trim($_POST['image_url_2']),
                'image_url_3' => trim($_POST['image_url_3']),
                'image_url_4' => trim($_POST['image_url_4']),
                'image_url_5' => trim($_POST['image_url_5']),
                'status' => 'pending'
            ];

            $hasUrlImage = !empty($data['image_url_1']) || !empty($data['image_url_2']) || !empty($data['image_url_3']) || !empty($data['image_url_4']) || !empty($data['image_url_5']);
            $hasImage = !empty($uploadedImages) || $hasUrlImage;

            if (!empty($data['title']) && !empty($data['price']) && $hasImage) {
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
                    flash('property_message', 'Property Added');
                    redirect('agent/inventory');
                } else {
                    die('Something went wrong');
                }
            } else {
                flash('property_message', 'Please fill in all required fields and add at least one image', 'alert alert-danger');
                $this->view('agent/add_property', $data);
            }
        } else {
            $this->view('agent/add_property');
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

    public function edit_property($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
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
                'agent_id' => $_SESSION['user_id'],
                'image_url' => trim($_POST['image_url'])
            ];

            // Validate data (simplified)
            if (!empty($data['title']) && !empty($data['price'])) {
                if ($this->propertyModel->updateProperty($data)) {
                    if (!empty($data['image_url'])) {
                        $this->propertyModel->updatePropertyImage([
                            'property_id' => $id,
                            'image_url' => $data['image_url']
                        ]);
                    }
                    flash('property_message', 'Property Updated');
                    redirect('agent/inventory');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('agent/edit_property', $data);
            }
        } else {
            // Get existing property from model
            $property = $this->propertyModel->getPropertyById($id);

            // Check ownership
            if ($property->agent_id != $_SESSION['user_id']) {
                redirect('agent/inventory');
            }

            // Get images
            $images = $this->propertyModel->getPropertyImages($id);
            $image_url = !empty($images) ? $images[0]->image_url : '';

            $data = [
                'id' => $id,
                'title' => $property->title,
                'description' => $property->description,
                'price' => $property->price,
                'type' => $property->type,
                'bedrooms' => $property->bedrooms,
                'bathrooms' => $property->bathrooms,
                'sqft' => $property->sqft,
                'year_built' => $property->year_built,
                'address' => $property->address,
                'city' => $property->city,
                'state' => $property->state,
                'zip' => $property->zip,
                'image_url' => $image_url
            ];

            $this->view('agent/edit_property', $data);
        }
    }
}
