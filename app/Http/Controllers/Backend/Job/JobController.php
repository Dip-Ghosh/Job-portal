<?php

namespace App\Http\Controllers\Backend\Job;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobValidationRequest;
use App\Models\cr;
use App\Repository\Job\JobInterface;
use App\Repository\JobApplication\JobApplicationInterface;
use App\Repository\JobType\OrganizationInterface;
use App\Service\OrganizationService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JobController extends Controller
{
    protected $jobType;
    protected $job;
    protected $jobService;
    protected $jobApplication;

    public function __construct(OrganizationInterface   $jobType, JobInterface $job, OrganizationService $jobService,
                                JobApplicationInterface $jobApplication)
    {
        $this->jobType = $jobType;
        $this->job = $job;
        $this->jobService = $jobService;
        $this->jobApplication = $jobApplication;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $jobs = $this->job->getAllActiveJobs();
        return view('jobs.list', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $jobTypes = $this->jobType->getAllJobTypes();
        return view('jobs.create', compact('jobTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(JobValidationRequest $request)
    {
        $this->jobService->prepareData($request->all());
        return redirect()->route('jobs.index')->with('success', 'Job Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param cr $cr
     * @return Response
     */
    public function show($id)
    {
        $users = $this->jobApplication->getAllApplicantList($id);
        return view('jobs.applicantList', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param cr $cr
     * @return Response
     */
    public function edit($id)
    {
        $job = $this->job->edit($id);
        $jobTypes = $this->jobType->getAllJobTypes();
        return view('jobs.edit', compact('job', 'jobTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param cr $cr
     * @return RedirectResponse
     */
    public function update(JobValidationRequest $request, $id)
    {
        $this->jobService->prepareUpdateData($request->all(), $id);
        return redirect()->route('jobs.index')->with('success', 'Job Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param cr $cr
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->job->deactive($id);
        return redirect()->route('jobs.index')->with('success', 'Job Deactivated Successfully');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function getApplicantDetails($id)
    {
        $user = $this->jobApplication->getApplicantDetails($id);
        return view('jobs.applicantDetails', compact('user'));
    }

}
