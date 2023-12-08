<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\Shield\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class ApiController extends BaseController
{
    use ResponseTrait;
    public function getUsers()
    {
        $user = new UserModel();

        //caso seja uma busca
        // $find = $user->find(1);
        //print_r($find);

        //retorna todos os users
        $find = $user->find();
        return $this->respond($find);

    }

    
}
