<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class NotificationController extends ResourceController
{

    use ResponseTrait;
    protected $firebaseMessaging;

    public function __construct()
    {
        // Initialize Firebase Admin SDK
        $this->firebase = (new Factory)
            ->withServiceAccount(APPPATH . 'Config/firebase_credentials.json')
            ->createMessaging();
    }

    // Save FCM Token (Post request from Vue.js)
    public function saveToken()
    {
        // Retrieve JSON data from the request body
        $json = $this->request->getJSON();
    
        // Assuming 'token' is a property of the JSON object sent from the client
        $token = $json->token ?? null;  // Using null coalescing operator to handle absence of 'token'
    
        if ($token) {
            $filePath = APPPATH . 'Config/fcm_tokens.txt';
    
            // Check if the file exists before writing
            if (!file_exists($filePath)) {
                file_put_contents($filePath, ''); // Create the file if it doesn't exist
            }
    
            // Load tokens from the file
            $tokens = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
            // Append the token if it doesn't exist already
            if (!in_array($token, $tokens)) {
                file_put_contents($filePath, $token . PHP_EOL, FILE_APPEND);
            }
    
            return $this->respond(['status' => 'success', 'message' => 'Token saved']);
        } else {
            return $this->respond(['status' => 'error', 'message' => 'No token provided'], 400);
        }
    }
    



    // Send Notification to all saved FCM tokens
    public function sendNotification()
{
    try {
        $data = $this->request->getJSON(true);
        $title = $data['title'] ?? 'Default Title';
        $body = $data['body'] ?? 'Default Body';

        $filePath = APPPATH . 'Config/fcm_tokens.txt';

        // Ensure the file exists before reading
        if (!file_exists($filePath)) {
            return $this->respond(['status' => 'error', 'message' => 'No tokens available to send notifications'], 400);
        }

        // Load tokens from the file
        $tokens = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if (count($tokens) > 0) {
            // Create the message
            $message = CloudMessage::new()->withNotification([
                'title' => $title,
                'body'  => $body,
            ]);

            // Send the message to all tokens
            $report = $this->firebase->sendMulticast($message, $tokens);

            return $this->respond([
                'successCount' => $report->successes()->count(),
                'failureCount' => $report->failures()->count(),
            ]);
        } else {
            return $this->respond(['status' => 'error', 'message' => 'No tokens available to send notifications'], 400);
        }
    } catch (\Exception $e) {
        // Log the exception
        log_message('error', $e->getMessage());
        return $this->respond(['status' => 'error', 'message' => 'An error occurred while sending notification.'], 500);
    }
}



}
