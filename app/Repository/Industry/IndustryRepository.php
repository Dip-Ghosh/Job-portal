<?php

namespace App\Repository\Industry;

use App\Models\Industry;
use App\Repository\Base\BaseRepository;
use App\Repository\Base\ReadAbleInterface;
use App\Repository\Base\WriteAbleInterface;

class IndustryRepository extends BaseRepository implements IndustryInterface, WriteAbleInterface, ReadAbleInterface
{
    protected $industry;

    public function __construct(Industry $industry)
    {
        parent::__construct($industry);
        $this->industry = $industry;
    }
}
