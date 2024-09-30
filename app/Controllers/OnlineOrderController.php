<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\{OnlineOrderModel, OnlineOrderDetailsModel, OrderModel, OrderDetailsModel};
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class OnlineOrderController extends ResourceController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect(); // Explicitly load database
    }

    use ResponseTrait;

    public function startOnlineOrder()
    {
        $model = new OnlineOrderModel();

        // Retrieve JSON input
        $data = $this->request->getJSON(true);

        // Basic validation of input data
        if (!$data || !isset($data['customer_id']) || !isset($data['qrcode'])) {
            return $this->fail('Invalid data provided.', ResponseInterface::HTTP_BAD_REQUEST);
        }

        // Create an order in the database
        $orderId = $model->createOrder($data); // Ensure createOrder accepts an array and uses it directly

        if ($orderId) {
            // If order is successfully created, return the order ID
            return $this->respondCreated(['message' => 'Order created successfully', 'id' => $orderId]);
        } else {
            // Handle the error scenario
            return $this->failServerError('Could not create the order. Please try again.');
        }
    }

    public function getOnlineOrder($orderId)
    {
        $model = new OnlineOrderModel();

        // Fetch the online order by ID
        $order = $model->find($orderId);

        if ($order) {
            return $this->respond($order, ResponseInterface::HTTP_OK);
        } else {
            return $this->failNotFound('Order not found');
        }
    }

    public function updateOnlineOrder($id)
    {
        $model = new OnlineOrderModel();

        // Fetch the existing order
        $order = $model->find($id);
        if (!$order) {
            return $this->failNotFound('Order not found.');
        }

        // Get JSON data
        $data = $this->request->getJSON(true);

        // Check for the fields to update and validate them if needed
        $updateData = [];
        if (isset($data['confirmed'])) {
            $updateData['confirmed'] = $data['confirmed']; // Ensure that 'confirmed' is a boolean or relevant type
        }
        if (isset($data['total_price'])) {
            $updateData['total_price'] = $data['total_price']; // Validate this if there are constraints on the price
        }

        if (isset($data['service'])) {
            $updateData['service'] = $data['service']; // Validate this if there are constraints on the price
        }

        // Check if there is any data to update
        if (empty($updateData)) {
            return $this->fail('No valid data provided for update.', ResponseInterface::HTTP_BAD_REQUEST);
        }

        // Update the order in the database
        if ($model->update($id, $updateData)) {
            return $this->respondUpdated(['message' => 'Order updated successfully']);
        } else {
            return $this->failServerError('Could not update the order. Please try again.');
        }
    }


    public function confirmOrder($qrcode)
    {
        $onlineOrderModel = new OnlineOrderModel();
        $detailsModel = new OnlineOrderDetailsModel();
        $orderModel = new OrderModel();
        $orderDetailsModel = new OrderDetailsModel();

        // Check if the order exists with the given QR code
        $onlineOrder = $onlineOrderModel->where('qrcode', $qrcode)->first();
        if (!$onlineOrder) {
            return $this->failNotFound('Order not found with provided QR code.');
        }

        // Assume we are setting the status to 'confirmed'
        if ($onlineOrder['confirmed']) {
            return $this->fail('Order is already confirmed.', ResponseInterface::HTTP_BAD_REQUEST);
        }

        $onlineOrderDetails = $detailsModel->where('online_order_id', $onlineOrder['id'])->findAll();

        // Retrieve session_id from request, assuming it's in the JSON payload
        $jsonData = $this->request->getJSON();
        $session_id = $jsonData->session_id ?? null; // Use null coalescing operator to handle cases where session_id is not provided
        // $service = $jsonData->service ?? null; // Use null coalescing operator to handle cases where session_id is not provided

        // Validate session_id if necessary, e.g., check if it's not null or perform additional checks

        // Start transaction
        $this->db->transStart();

        // Create a new order including the session_id
        $newOrderId = $orderModel->insert([
            'session_id' => $session_id,
            'service' => $onlineOrder['service'],
            'total_price' => array_sum(array_column($onlineOrderDetails, 'subtotal')),
            'order_date' => date('Y-m-d H:i:s', time() + 8 * 3600),
            'customer_id' => $onlineOrder['customer_id'],
        ]);

        // Check if new order creation was successful
        if (!$newOrderId) {
            $this->db->transRollback();
            return $this->failServerError('Failed to create a new order.');
        }

        // Add details to the new order
        foreach ($onlineOrderDetails as $detail) {
            $orderDetailsModel->insert([
                'order_id' => $newOrderId,
                'menu_item_id' => $detail['menu_item_id'],
                'quantity' => $detail['quantity'],
                'subtotal' => $detail['subtotal']
            ]);
        }

        // Update the online order to confirmed
        $onlineOrderModel->update($onlineOrder['id'], ['confirmed' => 1]);

        // Commit transaction
        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return $this->failServerError('Failed to confirm the order. Please try again.');
        } else {
            return $this->respondUpdated([
                'message' => 'Order confirmed successfully',
                'newOrderId' => $newOrderId,
                'service' => $onlineOrder['service']
            ]);        }
    }



}


