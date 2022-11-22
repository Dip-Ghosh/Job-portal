<?php

namespace App\Service;

use App\Repository\Industry\IndustryInterface;

class IndustryService
{
    protected $industry;

    public function __construct(IndustryInterface $industry)
    {
        $this->industry = $industry;
    }

    public function requestParams($requestParams)
    {
        $params = [
            'industry_type' => $requestParams['name'],
            'status' => 1
        ];
        return $this->industry->save($params);
    }

    public function requestUpdateParams($requestParams, $id)
    {
        $params = [
            'industry_type' => $requestParams['name'],
            'status' => 1
        ];
        return $this->industry->update($params, $id);
    }

}
