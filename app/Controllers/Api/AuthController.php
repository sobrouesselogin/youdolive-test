<?php

namespace App\Controllers\Api;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Shield\Models\UserModel;
use App\Controllers\BaseController;

class AuthController extends BaseController
{
    use ResponseTrait;
    public function userLogin()
    {
        $credentials = [
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ];

        if (auth()->loggedIn()) {
            auth()->logout();
        }

        $loginAttempt = auth()->attempt($credentials);
        if (!$loginAttempt->isOk()) {
            return $this->fail('invalid Login', 400);
        } else {
            $user = new UserModel();
            $userData = $user->find(auth()->id());

            $token = $userData->generateAccessToken('thisismytoken');
            $auth_token = $token->raw_token;
            return $this->respond([
                'token'=>$auth_token,
                'status'=>true,
            ]);
        }
    }

    public function loggedOut()
    {
        return $this->fail("Não autorizado! Necessário realizar autenticação.", 400);
    }
}
