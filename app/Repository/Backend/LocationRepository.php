<?php

namespace App\Repository\Backend;

use App\Models\Location;
use App\Repository\Base\BaseRepository;

class LocationRepository extends BaseRepository implements LocationInterface
{
    protected $location;

    public function __construct(Location $location)
    {
        parent::__construct($location);
    }
}
