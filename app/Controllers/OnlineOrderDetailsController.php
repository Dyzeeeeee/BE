<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\OnlineOrderDetailsModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class OnlineOrderDetailsController extends ResourceController
{
    use ResponseTrait;

    public function addOrUpdateOnlineOrderDetail()
    {
        $model = new OnlineOrderDetailsModel();
        $data = $this->request->getJSON(true);

        // Check for necessary fields; assuming 'online_order_id' and 'menu_item_id' are required to identify a record
        if (!isset($data['online_order_id'], $data['menu_item_id'])) {
            return $this->failValidationErrors('Both online_order_id and menu_item_id are required.');
        }

        // Try to find an existing detail entry
        $existingDetail = $model->where('online_order_id', $data['online_order_id'])
                                ->where('menu_item_id', $data['menu_item_id'])
                                ->first();

        if ($existingDetail) {
            // If exists, update the existing record
            $updateStatus = $model->update($existingDetail['id'], $data);
            if ($updateStatus) {
                return $this->respondUpdated(['message' => 'Order detail updated successfully.', 'data' => $model->find($existingDetail['id'])]);
            } else {
                return $this->failServerError('Failed to update the order detail.');
            }
        } else {
            // If not exists, create a new record
            $insertedId = $model->insert($data);
            if ($insertedId) {
                return $this->respondCreated(['message' => 'Order detail created successfully.', 'data' => $model->find($insertedId)]);
            } else {
                return $this->failServerError('Failed to create a new order detail.');
            }
        }
    }

    public function getOnlineOrderDetails($orderId)
    {
        $model = new OnlineOrderDetailsModel();
    
        // Ensure the order ID is provided
        if (!$orderId) {
            return $this->failValidationErrors('Order ID is required');
        }
    
        $orderDetails = $model->getOrderWithMenuDetails($orderId);
    
        // Check if any order details were found
        if (is_array($orderDetails) && count($orderDetails) > 0) {
            return $this->respond($orderDetails);
        } else {
            // Instead of failing, return an empty array with a success response
            return $this->respond([]);
        }
    }
    

    public function deleteOnlineOrderDetail($detailId)
{
    $model = new OnlineOrderDetailsModel();

    // Check if the detail ID is provided
    if (!$detailId) {
        return $this->failValidationErrors('Detail ID is required');
    }

    // Try to find an existing detail entry
    $existingDetail = $model->find($detailId);

    if (!$existingDetail) {
        return $this->failNotFound('No detail found with ID: ' . $detailId);
    }

    // Attempt to delete the detail entry
    if ($model->delete($detailId)) {
        return $this->respondDeleted(['message' => 'Order detail deleted successfully.']);
    } else {
        return $this->failServerError('Failed to delete the order detail.');
    }
}

}