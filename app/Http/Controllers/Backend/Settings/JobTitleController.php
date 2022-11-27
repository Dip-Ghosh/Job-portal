<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobTitleFormRequest;
use App\Repository\Backend\JobTitleInterface;
use App\Service\JobTitleService;

class JobTitleController extends Controller
{
    protected $jobTitle;
    protected $jobTitleService;

    public function __construct(JobTitleInterface $jobTitle, JobTitleService $jobTitleService)
    {
        $this->jobTitle = $jobTitle;
        $this->jobTitleService = $jobTitleService;
    }

    public function index()
    {
        $jobsTitle = $this->jobTitleService->makePaginate(collect($this->jobTitle->getAll()));
        return view('backend.job-title.list', compact('jobsTitle'));
    }

    public function create()
    {
        return view('backend.job-title.create');
    }

    public function store(JobTitleFormRequest $request)
    {
        $this->jobTitleService->requestParams($request->except('_token'));
        return redirect()->route('jobs-title.index')->with('success', 'Job Title Created Successfully');
    }

    public function edit($id)
    {
        $jobTitle = $this->jobTitle->getOne($id);
        return view('backend.job-title.edit', compact('jobTitle'));
    }

    public function update(JobTitleFormRequest $request, $id)
    {
        $this->jobTitleService->requestUpdateParams($request->except('_token'), $id);
        return redirect()->route('jobs-title.index')->with('success', 'Job Title Updated Successfully');
    }

    public function destroy($id)
    {
        $this->jobTitle->delete($id);
        return redirect()->back()->with('success', 'Job Title Deleted Successfully');
    }
}
