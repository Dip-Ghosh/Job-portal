<?php

namespace App\Service;

use App\Repository\Location\LocationInterface;

class LocationService
{
    protected $location;

    public function __construct(LocationInterface $location)
    {
        $this->location = $location;
    }

    public function requestParams($requestParams)
    {
        $params = [
            'city_name' => $requestParams['cityName'],
            'status' => 1
        ];
        return $this->location->save($params);
    }

    public function requestUpdateParams($requestParams, $id)
    {
        $params = [
            'city_name' => $requestParams['cityName'],
            'status' => 1
        ];
        return $this->location->update($params, $id);
    }

}
