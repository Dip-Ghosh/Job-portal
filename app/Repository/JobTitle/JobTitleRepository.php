<?php

namespace App\Repository\JobTitle;

use App\Models\JobTitle;
use App\Repository\Base\BaseRepository;
use App\Repository\Base\ReadAbleInterface;
use App\Repository\Base\WriteAbleInterface;

class JobTitleRepository extends BaseRepository implements JobTitleInterface, WriteAbleInterface, ReadAbleInterface
{
    protected $jobTitle;

    public function __construct(JobTitle $jobTitle)
    {
        parent::__construct($jobTitle);
        $this->jobTitle = $jobTitle;
    }
}
