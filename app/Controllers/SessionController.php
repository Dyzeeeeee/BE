<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\SessionModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
class SessionController extends ResourceController  
{
    use ResponseTrait;

    public function getSessions()
    {
        $model = new SessionModel();
        $sessions = $model->findAll(); // This retrieves all session records

        return $this->respond($sessions);
    }


    public function getSession($id)
    {
        $model = new SessionModel();
        $session = $model->find($id);

        if ($session) {
            return $this->respond($session);
        } else {
            return $this->failNotFound('No session found with ID ' . $id);
        }
    }

    public function addSession()
{
    $model = new SessionModel();
    $data = $this->request->getJSON(true); // Get JSON input as an array

    // Set the start_time to the current timestamp
    $data['start_time'] = date('Y-m-d H:i:s', time() + 6 * 3600); // Current timestamp +6 hours

    if ($model->insert($data)) {
        $response = [
            'id' => $model->getInsertID(),
            'status' => 'success',
            'message' => 'Session added successfully'
        ];
        return $this->respondCreated($response);
    } else {
        return $this->failValidationErrors($model->errors());
    }   
}


public function updateSession($id)
{
    $model = new SessionModel();
    $data = $this->request->getJSON(true); // Get JSON input as an array

    // Check if session exists
    $session = $model->find($id);
    if (!$session) {
        return $this->failNotFound('No session found with ID ' . $id);
    }

    // Set end_time to the current timestamp
    $data['end_time'] = date('Y-m-d H:i:s', time() + 6 * 3600); // Current timestamp +6 hours

    // Update the session record
    if ($model->update($id, $data)) {
        return $this->respondUpdated(['status' => 'success', 'message' => 'Session updated successfully']);
    } else {
        return $this->failValidationErrors($model->errors());
    }
}



}
