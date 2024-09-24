<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\OrderDetailsModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class OrderDetailsController extends ResourceController
{
    use ResponseTrait;

    public function getAllOrderDetails()
    {
        $model = new OrderDetailsModel();
        $orderDetails = $model->findAll(); // This retrieves all session records

        return $this->respond($orderDetails);
    }
    public function getOrderDetails($orderId)
    {
        $model = new OrderDetailsModel();

        // Validate that the $orderId is provided and is a numeric value
        if (!is_numeric($orderId)) {
            return $this->failValidationErrors("Invalid order ID.");
        }

        // Retrieve order details with menu item details
        $orderDetails = $model->getOrderWithMenuDetails($orderId);

        if (empty($orderDetails)) {
            return $this->failNotFound("No order details found for Order ID: {$orderId}");
        }

        return $this->respond($orderDetails);
    }


    public function addOrUpdateOrderDetail()
    {
        $model = new OrderDetailsModel();
        $data = $this->request->getJSON(true);

        if (!$data) {
            return $this->failValidationErrors("No data provided.");
        }

        // Check if order detail with the given menu_item_id already exists in this order
        $existingDetail = $model->where([
            'order_id' => $data['order_id'],
            'menu_item_id' => $data['menu_item_id']
        ])->first();

        if ($existingDetail) {
            // If exists, update the quantity and subtotal
            $updatedQuantity = $existingDetail['quantity'] + 1;
            $updatedSubtotal = $updatedQuantity * $data['price']; // Assuming price is passed correctly
            $updateData = [
                'quantity' => $updatedQuantity,
                'subtotal' => $updatedSubtotal
            ];
            if ($model->update($existingDetail['id'], $updateData)) {
                return $this->respondUpdated($updateData, 'Order detail updated successfully.');
            } else {
                return $this->failServerError('Failed to update order detail.');
            }
        } else {
            // If not exists, add a new order detail
            $newDetailData = [
                'order_id' => $data['order_id'],
                'menu_item_id' => $data['menu_item_id'],
                'quantity' => 1, // Default quantity is 1
                'subtotal' => $data['subtotal'] // Assuming price is provided
            ];
            if ($model->insert($newDetailData)) {
                return $this->respondCreated($newDetailData, 'Order detail added successfully.');
            } else {
                return $this->failServerError('Failed to add order detail.');
            }
        }
    }

    public function updateOrderDetail($id)
    {
        $model = new OrderDetailsModel();

        // Check if the order detail ID is valid and numeric
        if (!is_numeric($id)) {
            return $this->failValidationErrors("Invalid order detail ID provided.");
        }

        $data = $this->request->getJSON(true);

        // Ensure that quantity and subtotal are provided and are valid
        if (
            !isset($data['quantity']) || !is_numeric($data['quantity']) ||
            !isset($data['subtotal']) || !is_numeric($data['subtotal'])
        ) {
            return $this->failValidationErrors("Invalid or missing quantity or subtotal.");
        }

        // Update the order detail record
        if ($model->update($id, $data)) {
            return $this->respondUpdated($data, 'Order detail updated successfully.');
        } else {
            return $this->failServerError('Failed to update order detail. Please check the provided data.');
        }
    }

    public function deleteOrderDetail($id)
    {
        $model = new OrderDetailsModel();

        if (!is_numeric($id)) {
            return $this->failValidationErrors("Invalid order detail ID provided.");
        }

        if ($model->delete($id)) {
            return $this->respondDeleted(['message' => 'Order detail deleted successfully.']);
        } else {
            return $this->failServerError('Failed to delete order detail.');
        }
    }

    public function updateOrderStatus()
    {
        $json = $this->request->getJSON();
        $detailId = $json->detailId;
        $newStatus = $json->newStatus;
    
        // Assuming you have a model named OrderDetailModel
        $model = new OrderDetailsModel();
        if ($model->update($detailId, ['status' => $newStatus])) {
            return $this->response->setJSON(['success' => true, 'message' => 'Status updated successfully.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update status.']);
        }
    }
    
    
}
