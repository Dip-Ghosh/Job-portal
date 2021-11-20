<?php

namespace App\Repository\JobApplication;

use App\Models\JobApply;
use Illuminate\Support\Facades\DB;

class JobApplicationRepository implements JobApplicationInterface
{
    protected $jobApply;

    public function __construct(JobApply $jobApply)
    {
        $this->jobApply = $jobApply;
    }


    public function applyJob($data)
    {
        return $this->jobApply::create($data);

    }

    public function getAllApplicantList($id)
    {
       return $this->jobApply::leftjoin('users', 'job_applies.user_id', '=', 'users.id')
            ->leftjoin('jobs', 'job_applies.jobs_id', '=', 'jobs.id')
            ->where('job_applies.jobs_id', $id)->select('users.id','users.name','users.email','users.mobile','jobs.title')
            ->get();
    }

    public function getApplicantDetails($id){

      return  DB::table('users')->where('id', $id)->first();
    }
}
