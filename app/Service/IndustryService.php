<?php

namespace App\Service;

use App\Repository\Backend\IndustryInterface;

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
            'organizations_id' => $requestParams['organizationId'],
            'status' => 1
        ];
        return $this->industry->save($params);
    }

    public function requestUpdateParams($requestParams, $id)
    {
        $params = [
            'industry_type' => $requestParams['name'],
            'organizations_id' => $requestParams['organizationId'],
            'status' => 1
        ];
        return $this->industry->update($params, $id);
    }

}
