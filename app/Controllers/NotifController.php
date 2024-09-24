<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use Kreait\Firebase\Factory;
use App\Models\TokenModel;

class NotifController extends ResourceController
{
    use ResponseTrait;

    protected $model;
    protected $format = 'json';

    public function __construct()
    {
        // Initialize the TokenModel
        $this->model = new TokenModel();
    }

    public function saveToken()
    {
        $data = $this->request->getJSON(true);
        $token = $data['token'] ?? '';

        if (empty($token)) {
            return $this->failValidationErrors('Token is required');
        }

        // Save the token to the database
        if ($this->model->save(['token' => $token])) {
            return $this->respondCreated(['message' => 'Token saved successfully']);
        } else {
            return $this->failServerError('Failed to save token');
        }
    }

        public function sendNotification()
        {
            $data = $this->request->getJSON(true);
            $token = $data['token'] ?? '';
            $title = $data['title'] ?? 'Default Title';
            $body = $data['body'] ?? 'This is a test notification from Vue.js';  // Updated default text
            $imageUrl = $data['image_url'] ?? 'https://github.com/favicon.ico'; // Default image URL or retrieved from request

            // Ensure token is provided
            if (empty($token)) {
                return $this->failValidationErrors('Token is required for sending notification.');
            }
        
            $factory = (new Factory)->withServiceAccount('E:\\laragon\\www\\BE\\config\\firebase-credentials1.json');
            $messaging = $factory->createMessaging();

            $message = [
                'notification' => [ 
                    'title' => 'eme',
                    'body' => 'helo pilipins',
                    'icon' => 'https://github.com/favicon.ico',
                    'badge' => '1',
                    'color' => '#0A0A0A', // Including the image URL in the notification

                ],
                'token' => $token
            ];  
        
            try {
                $result = $messaging->send($message);
                // Logging the result can be helpful for debugging
                log_message('info', 'Notification sent successfully: ' . json_encode($result));
                return $this->respond(['message' => 'Notification sent successfully', 'result' => $result]);
            } catch (\Throwable $e) {
                log_message('error', 'Failed to send notification1: ' . $e->getMessage());
                return $this->failServerError('Failed to send notification: ' . $e->getMessage());
            }
        }
    
}
