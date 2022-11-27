<?php

namespace App\Repository\Backend;

use App\Models\Industry;
use App\Repository\Base\BaseRepository;

class IndustryRepository extends BaseRepository implements IndustryInterface
{
    protected $industry;

    public function __construct(Industry $industry)
    {
        parent::__construct($industry);
    }

    public function getActiveIndustries()
    {
        return $this->model->with('organization')->active()->orders()->get();
    }
}
