<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\OrderModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class OrderController extends ResourceController
{
    use ResponseTrait;

    public function getOrders()
    {
        $model = new OrderModel();
        $orders = $model->getOrdersWithDetails(); // This retrieves all orders with their details and menu information

        return $this->respond($orders);
    }




    public function addOrder()
    {
        $model = new OrderModel();
        $data = $this->request->getJSON(true);

        // Set the order_date to the current timestamp
        $data['order_date'] = date('Y-m-d H:i:s', time() + 6 * 3600); // Current timestamp +6 hours

        if ($model->insert($data)) {
            $response = [
                'id' => $model->getInsertID(),
                'status' => 'success',
                'message' => 'Order added successfully'
            ];
            return $this->respondCreated($response);
        } else {
            return $this->failValidationErrors($model->errors());
        }
    }


    public function deleteOrder($orderId)
    {
        $model = new OrderModel();
        $currentOrder = $model->find($orderId);

        // Check if the order exists
        if (!$currentOrder) {
            return $this->failNotFound("Order not found with ID: {$orderId}");
        }

        // Prevent deletion of orders that are either completed or cancelled
        if (in_array($currentOrder['status'], ['completed', 'cancelled'])) {
            return $this->failForbidden("Cannot delete completed or cancelled orders.");
        }

        // Attempt to delete the order
        if ($model->delete($orderId)) {
            return $this->respondDeleted(['message' => 'Order deleted successfully']);
        } else {
            return $this->failServerError('Failed to delete the order.');
        }
    }

    public function updateOrder($orderId)
    {
        $model = new OrderModel();
        $data = $this->request->getJSON(true);

        // Fetch the current order details
        $currentOrder = $model->find($orderId);
        if (!$currentOrder) {
            return $this->failNotFound("Order not found with ID: {$orderId}");
        }

        // Check if the order status is 'completed' and prevent updates if trying to cancel
        if (
            ($currentOrder['status'] === 'completed' && isset($data['status']) && $data['status'] === 'cancelled') ||
            ($currentOrder['status'] === 'cancelled' && isset($data['status']) && $data['status'] === 'cancelled')
        ) {
            return $this->failForbidden("Completed or already cancelled orders cannot be canceled.");
        }

        // Update the order
        if ($model->update($orderId, $data)) {
            return $this->respondUpdated(['message' => 'Order updated successfully']);
        } else {
            return $this->failValidationErrors("Failed to update the order.");
        }
    }


    public function getOrdersBySession($sessionId)
    {
        $model = new OrderModel();

        // Validate the input
        if (!$sessionId) {
            return $this->fail('Session ID is required', ResponseInterface::HTTP_BAD_REQUEST);
        }

        $orders = $model->getOrdersBySession($sessionId);
        if ($orders) {
            return $this->respond($orders);
        } else {
            return $this->failNotFound('No orders found for the specified session.');
        }
    }


    public function getLatestOrder()
    {
        $model = new OrderModel();
        $latestOrder = $model->getLatestOrder();

        if ($latestOrder) {
            return $this->respond($latestOrder);
        } else {
            return $this->failNotFound('No orders found.');
        }
    }
}
