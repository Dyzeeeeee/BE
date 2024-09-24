<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\MenuModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class MenuController extends ResourceController
{
    use ResponseTrait;
    
    public function getMenu()
    {
        $model = new MenuModel();
        $menu = $model->findAll(); // This retrieves all session records

        return $this->respond($menu);
    }

}
