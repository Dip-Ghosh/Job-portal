<?php

namespace App\Service;

use App\Repository\Backend\OrganizationInterface;

class OrganizationService
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

//    private function getJobData($data)
//    {
//        if (!empty($data['thumbnail'])) {
//            $image = $data['thumbnail'];
//            $imageName = time() . mt_rand() . "_" . $image->getClientOriginalName();
//            $image->move(public_path('uploads'), $imageName);
//        }
//        $requestParam = [
//            "title" => $data['title'],
//            "job_types_id" => $data['job_types_id'],
//            "description" => $data['description'],
//            "thumbnail" => isset($imageName) ? $imageName : null,
//        ];
//        return $requestParam;
//    }
//
//    public function prepareUpdateData($request, $id)
//    {
//
//        $this->isThumbnailPreset($id);
//        $requestParam = $this->getJobData($request);
//        return $this->job->update($requestParam, $id);
//    }
//
//    private function isThumbnailPreset($id)
//    {
//        $data = $this->job->checkThumbnail($id);
//        if (!empty($data->thumbnail)) {
//            $filename = public_path() . '/upload/' . $data->thumbnail;
//            File::delete($filename);
//        }
//    }
}
