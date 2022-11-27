<?php

namespace App\Repository\Backend;

use App\Models\Organization;
use App\Repository\Base\BaseRepository;

class OrganizationRepository extends BaseRepository implements OrganizationInterface
{
    protected $organization;

    public function __construct(Organization $organization)
    {
        parent::__construct($organization);
    }

}
