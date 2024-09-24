<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\CustomerModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
class CustomerController extends ResourceController 
{
    use ResponseTrait;
    public function getCustomers()
    {
        $model = new CustomerModel();
        $customers = $model->findAll(); // This retrieves all session records

        return $this->respond($customers);
    }
    public function addCustomer()
    {
        $model = new CustomerModel();
        $data = $this->request->getJSON(true); // Get JSON input as an array

        // Validate the input
      
        // Insert the customer into the database
        if ($model->insert($data)) {
            $response = [
                'id' => $model->getInsertID(),
                'status' => 'success',
                'message' => 'Customer added successfully'
            ];
            return $this->respondCreated($response);
        } else {
            return $this->failValidationErrors($model->errors());
        }
    }
}
