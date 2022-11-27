<?php

namespace App\Service;


use App\Repository\Backend\CompanyInterface;

class CompanyService
{
    protected $company;

    public function __construct(CompanyInterface $company)
    {
        $this->company = $company;
    }

    public function requestParams($requestParams)
    {
        $params = [
            'industry_type' => $requestParams['name'],
            'status' => 1
        ];
        return $this->company->save($params);
    }

    public function requestUpdateParams($requestParams, $id)
    {
        $params = [
            'industry_type' => $requestParams['name'],
            'status' => 1
        ];
        return $this->company->update($params, $id);
    }

}
