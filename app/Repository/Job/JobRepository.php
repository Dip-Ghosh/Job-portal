<?php

namespace App\Repository\Job;

use App\Models\Job;
use App\Repository\Base\BaseRepository;
use App\Repository\Base\WriteAbleInterface;
use Illuminate\Support\Facades\DB;


class JobRepository extends BaseRepository implements JobInterface, WriteAbleInterface
{
    protected $job;

    public function __construct(Job $job)
    {
        parent::__construct($job);
        $this->job = $job;
    }

    public function getAllActiveJobs()
    {
        return DB::table('jobs')
            ->leftJoin('job_types', 'jobs.job_types_id', '=', 'job_types.id')
            ->select('jobs.id', 'jobs.title', 'jobs.description', 'jobs.thumbnail', 'job_types.name')
            ->where('status', '=', 'Active')
            ->orderBy('jobs.id', 'desc')
            ->get();
    }

    public function checkThumbnail($id)
    {
        return $this->job->where('id', $id)->first();
    }

    public function deactive($id)
    {

        return $this->job->where('id', $id)->update([
            "status" => "Deactivate"
        ]);
    }

    public function showJobById($id)
    {
        return $this->job::where('jobs.id', $id)
            ->leftJoin('job_types', 'jobs.job_types_id', '=', 'job_types.id')
            ->select('jobs.id', 'jobs.title', 'jobs.description', 'jobs.thumbnail', 'job_types.name')
            ->first();
    }


}
