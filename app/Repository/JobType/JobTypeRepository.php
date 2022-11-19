<?php

namespace App\Repository\JobType;

use App\Models\JobType;
use App\Repository\Base\BaseRepository;
use App\Repository\Base\ReadAbleInterface;
use App\Repository\Base\WriteAbleInterface;

//use App\Repository\Base\BaseRepository;

class JobTypeRepository extends BaseRepository implements JobTypeInterface, WriteAbleInterface, ReadAbleInterface
{
    protected $jobType;

    public function __construct(JobType $jobType)
    {
        parent::__construct($jobType);
        $this->jobType = $jobType;
    }

}
