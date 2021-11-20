<?php

namespace App\Repository\JobType;

use App\Models\JobType;
use App\Repository\Base\BaseInterface;
use App\Repository\Base\BaseRepository;

class JobTypeRepository extends BaseRepository implements JobTypeInterface, BaseInterface
{
    protected $jobType;

    public function __construct(JobType $jobType)
    {
        parent::__construct($jobType);
        $this->jobType = $jobType;
    }
    public function  getAllJobTypes(){
        return $this->jobType->orderBy('id', 'desc')->get();
    }

}
