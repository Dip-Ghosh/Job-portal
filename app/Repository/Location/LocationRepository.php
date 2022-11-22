<?php

namespace App\Repository\Location;

use App\Models\Location;
use App\Repository\Base\BaseRepository;
use App\Repository\Base\ReadAbleInterface;
use App\Repository\Base\WriteAbleInterface;

class LocationRepository extends BaseRepository implements LocationInterface, WriteAbleInterface, ReadAbleInterface
{
    protected $location;

    public function __construct(Location $location)
    {
        parent::__construct($location);
        $this->location = $location;
    }
}
