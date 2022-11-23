<?php

namespace App\Service;

use App\Repository\JobTitle\JobTitleInterface;

class JobTitleService
{
    protected $jobTitle;

    public function __construct(JobTitleInterface $jobTitle)
    {
        $this->jobTitle = $jobTitle;
    }

    public function requestParams($requestParams)
    {
        $params = [
            'title' => $requestParams['title'],
            'status' => 1
        ];
        return $this->jobTitle->save($params);
    }

    public function requestUpdateParams($requestParams, $id)
    {
        $params = [
            'title' => $requestParams['title'],
            'status' => 1
        ];
        return $this->jobTitle->update($params, $id);
    }

}
