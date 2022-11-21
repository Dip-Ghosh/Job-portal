<?php

namespace App\Service;

use App\Repository\Organization\OrganizationInterface;

class IndustryService
{
    protected $organization;

    public function __construct(OrganizationInterface $organization)
    {
        $this->organization = $organization;
    }

    public function requestParams($requestParams)
    {
        $params = [
            'organization_type' => $requestParams['name'],
            'status' => 1
        ];
        return $this->organization->save($params);
    }

    public function requestUpdateParams($requestParams, $id)
    {
        $params = [
            'organization_type' => $requestParams['name'],
            'status' => 1
        ];
        return $this->organization->update($params, $id);
    }

}
