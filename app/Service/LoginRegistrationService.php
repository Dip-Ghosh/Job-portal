<?php

namespace App\Service;

use App\Repository\Api\LoginRegistrationInterface;

class LoginRegistrationService
{
    protected $loginRegistration;
    public function __construct(LoginRegistrationInterface $loginRegistration)
    {
        $this->loginRegistration = $loginRegistration;
    }

    public function saveUser($request){

        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'mobile' => $request['mobile'],
            'password' =>bcrypt($request['password'])
        ];
        return $this->loginRegistration->save($data);
    }

}
