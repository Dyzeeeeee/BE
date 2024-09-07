<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\TryModel;
use CodeIgniter\API\ResponseTrait;

class TryController extends ResourceController
{
    use ResponseTrait;

    protected $format = 'json';

    public function index()
    {
        $data = ['message' => 'API Connected!'];
        return $this->respond($data, 200);
    }

    public function getData()
    {
        $try = new TryModel();
        $data = $try->findAll();  // Retrieve all records from the model's associated table

        return $this->respond($data);  // Return the data as JSON response
    }
}
