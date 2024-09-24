<?php

require 'vendor/autoload.php'; // Make sure this points to the autoload file of your project

use Minishlink\WebPush\VAPID;

// Generate VAPID keys
$vapidKeys = VAPID::createVapidKeys();

// Output the keys
echo "Public Key: " . $vapidKeys['publicKey'] . PHP_EOL;
echo "Private Key: " . $vapidKeys['privateKey'] . PHP_EOL;
