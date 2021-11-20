<?php

namespace App\Repository\Api;

use App\Models\User;
use App\Repository\Base\BaseInterface;
use App\Repository\Base\BaseRepository;

class LoginRegistrationRepository extends BaseRepository implements LoginRegistrationInterface, BaseInterface
{

    protected $user;

    public function __construct(User $user)
    {
        parent::__construct($user);
        $this->user = $user;
    }
}
