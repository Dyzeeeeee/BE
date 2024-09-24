<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\CategoryModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class CategoryController extends ResourceController
{
    use ResponseTrait;

    public function getCategories()
    {
        $model = new CategoryModel();
        $categories = $model->findAll(); // This retrieves all session records

        return $this->respond($categories);
    }

}
