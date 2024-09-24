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
        $data = $try->findAll();
        return $this->respond($data);
    }

    public function createData()
    {
        $json = $this->request->getJSON();
        $try = new TryModel();

        // Extract specific data fields
        $data = [
            'title' => $json->title // Ensure that only the title field is used
        ];

        if ($try->insert($data)) {
            $response = [
                'status' => 201,
                'error' => null,
                'messages' => [
                    'success' => 'Data added successfully'
                ]
            ];
            return $this->respondCreated($response);
        } else {
            return $this->fail($try->errors());
        }
    }
}
