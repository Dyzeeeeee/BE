<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\SubscriptionModel;

class SubscriptionController extends ResourceController
{
    protected $modelName = SubscriptionModel::class;
    protected $format    = 'json';

    public function create()
    {
        $data = $this->request->getPost();
        
        if ($this->model->insert($data)) {
            return $this->respondCreated($data, 'Subscription created');
        } else {
            return $this->failValidationErrors($this->model->errors());
        }
    }

    public function delete($id = null)
    {
        if ($this->model->delete($id)) {
            return $this->respondDeleted(['id' => $id, 'message' => 'Subscription deleted']);
        } else {
            return $this->failNotFound('No subscription found with id ' . $id);
        }
    }
}
