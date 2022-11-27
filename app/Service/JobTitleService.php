<?php

namespace App\Service;

use App\Repository\Backend\JobTitleInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

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
            'title' => $requestParams['jobTitle'],
            'status' => 1
        ];
        return $this->jobTitle->save($params);
    }

    public function requestUpdateParams($requestParams, $id)
    {
        $params = [
            'title' => $requestParams['jobTitle'],
            'status' => 1
        ];
        return $this->jobTitle->update($params, $id);
    }

    public function makePaginate($items, $perPage = 1005, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

}
