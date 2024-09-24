<?php

namespace App\Models;

use CodeIgniter\Model;

class SubscriptionModel extends Model
{
    protected $table = 'subscriptions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'endpoint', 'public_key', 'auth_token'];
}
