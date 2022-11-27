<?php

namespace App\Repository\Backend;

use App\Models\JobTitle;
use App\Repository\Base\BaseRepository;

class JobTitleRepository extends BaseRepository implements JobTitleInterface
{
    protected $jobTitle;

    public function __construct(JobTitle $jobTitle)
    {
        parent::__construct($jobTitle);
    }
}
