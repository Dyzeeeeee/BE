<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table            = 'orders';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['customer_id', 'order_date', 'total_price', 'status', 'session_id', 'tendered', 'change1', 'service', 'note', 'payment_method', 'completed'];
    public function getOrdersBySession($sessionId)
    {
        return $this->where('session_id', $sessionId)->findAll();
    }
  
    public function getOrdersWithDetails()
{
    $results = $this->select('orders.*, order_details.id as detail_id, menu.name as menu_name, menu.price as menu_price, order_details.quantity, order_details.status as detail_status, order_details.subtotal, categories.name as category_name')
                    ->join('order_details', 'order_details.order_id = orders.id', 'left')
                    ->join('menu', 'menu.id = order_details.menu_item_id', 'left')
                    ->join('categories', 'categories.id = menu.category_id', 'left') // Join the categories table
                    ->findAll();

    // Restructure the results
    $orders = [];
    foreach ($results as $row) {
        // Use order ID as the key to group details
        $orderId = $row['id'];

        // Initialize the order if it doesn't exist
        if (!isset($orders[$orderId])) {
            $orders[$orderId] = [
                'id' => $row['id'],
                'customer_id' => $row['customer_id'],
                'order_date' => $row['order_date'],
                'total_price' => $row['total_price'],
                'status' => $row['status'],
                'session_id' => $row['session_id'],
                'tendered' => $row['tendered'],
                'change1' => $row['change1'],
                'service' => $row['service'],
                'note' => $row['note'],
                'payment_method' => $row['payment_method'],
                'details' => [] // Initialize the details array
            ];
        }

        // Add menu details to the details array
        if ($row['menu_name']) {
            $orders[$orderId]['details'][] = [
                'detail_id' => $row['detail_id'], // Include the detail ID
                'menu_name' => $row['menu_name'],
                'menu_price' => $row['menu_price'],
                'quantity' => $row['quantity'],
                'subtotal' => $row['subtotal'],
                'status' => $row['detail_status'],
                'category_name' => $row['category_name'] // Include the category name
            ];
        }
    }

    // Return the orders as a simple array
    return array_values($orders); // Reset keys
}

    
    
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
