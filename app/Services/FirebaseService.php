<?php
// app/Services/FirebaseService.php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;

class FirebaseService
{
    protected $messaging;

    public function __construct()
    {
        $serviceAccountPath = APPPATH . 'Services/firebase_credentials.json';

        $firebase = (new Factory)
        ->withServiceAccount($serviceAccountPath)
        ->create();

        $this->messaging = $firebase->getMessaging();
    }

    public function sendNotification($token, $title, $body)
    {
        $message = CloudMessage::fromArray([
            'token' => $token,
            'notification' => [
                'title' => $title,
                'body' => $body
            ],
        ]);

        return $this->messaging->send($message);
    }
}
