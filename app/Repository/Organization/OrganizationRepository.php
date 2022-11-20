<?php

namespace App\Repository\Organization;

use App\Models\Organization;
use App\Repository\Base\BaseRepository;
use App\Repository\Base\ReadAbleInterface;
use App\Repository\Base\WriteAbleInterface;

class OrganizationRepository extends BaseRepository implements OrganizationInterface, WriteAbleInterface, ReadAbleInterface
{
    protected $organization;

    public function __construct(Organization $organization)
    {
        parent::__construct($organization);
        $this->organization = $organization;
    }

}
