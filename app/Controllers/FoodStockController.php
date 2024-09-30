<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\FoodStockModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class FoodStockController extends ResourceController
{
    use ResponseTrait;
    
    public function getFoodStock()
    {
        $model = new FoodStockModel();
        $FoodStock = $model->findAll(); // This retrieves all session records

        return $this->respond($FoodStock);
    }

}
