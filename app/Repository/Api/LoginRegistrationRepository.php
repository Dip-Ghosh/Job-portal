<?php

namespace App\Repository\Api;

use App\Models\User;
use App\Repository\Base\BaseRepository;
use App\Repository\Base\WriteAbleInterface;

class LoginRegistrationRepository extends BaseRepository implements LoginRegistrationInterface, WriteAbleInterface
{

    protected $user;

    public function __construct(User $user)
    {
        parent::__construct($user);
        $this->user = $user;
    }
}
