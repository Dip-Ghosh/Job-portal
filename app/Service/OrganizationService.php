<?php

namespace App\Service;

use App\Repository\Job\JobInterface;
use Illuminate\Support\Facades\File;

class OrganizationService
{

    protected $job;

    public function __construct(JobInterface $job)
    {
        $this->job = $job;
    }

    public function prepareData($query)
    {

        return $this->job->save($this->getJobData($query));
    }

    private function getJobData($data)
    {
        if (!empty($data['thumbnail'])) {
            $image = $data['thumbnail'];
            $imageName = time() . mt_rand() . "_" . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
        }
        $requestParam = [
            "title" => $data['title'],
            "job_types_id" => $data['job_types_id'],
            "description" => $data['description'],
            "thumbnail" => isset($imageName) ? $imageName : null,
        ];
        return $requestParam;
    }

    public function prepareUpdateData($request, $id)
    {

        $this->isThumbnailPreset($id);
        $requestParam = $this->getJobData($request);
        return $this->job->update($requestParam, $id);
    }

    private function isThumbnailPreset($id)
    {
        $data = $this->job->checkThumbnail($id);
        if (!empty($data->thumbnail)) {
            $filename = public_path() . '/upload/' . $data->thumbnail;
            File::delete($filename);
        }
    }
}
