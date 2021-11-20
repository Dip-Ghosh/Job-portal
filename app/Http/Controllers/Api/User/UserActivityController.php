<?php

namespace App\Http\Controllers\Api\User;
use App\Http\Controllers\Controller;
use App\Http\Response\ResponseRepository;
use App\Repository\Job\JobInterface;
use App\Repository\JobApplication\JobApplicationInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;


class UserActivityController extends Controller
{
    protected $job;
    protected $responseRepository;
    protected $jobApplication;

    public function __construct(JobInterface $job, ResponseRepository $responseRepository, JobApplicationInterface $jobApplication)
    {
        $this->job = $job;
        $this->responseRepository = $responseRepository;
        $this->jobApplication = $jobApplication;
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     * list of all active jobs
     */
    public function getActiveJobList(){
        try{
           $activeJobs =  $this->job->getAllActiveJobs();
            return $this->responseRepository->ResponseSuccess($activeJobs,"List of Active Jobs.",ResponseAlias::HTTP_OK);
        }catch (\Exception $e){
            return $this->responseRepository->ResponseError($e->getMessage(), ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id){
        try{
            $data =  $this->job->showJobById($id);
            return $this->responseRepository->ResponseSuccess($data,"Single Active Job.",ResponseAlias::HTTP_OK);
        }catch (\Exception $e){
            return $this->responseRepository->ResponseError($e->getMessage(), ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function applyJob(Request $request){
        try{
            $request['user_id'] = auth()->user()->id;
            $data =  $this->jobApplication->applyJob($request->all());
            return $this->responseRepository->ResponseSuccess($data,"Job Applied Successfully.",ResponseAlias::HTTP_OK);
        }catch (\Exception $e){
            return $this->responseRepository->ResponseError($e->getMessage(), ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
