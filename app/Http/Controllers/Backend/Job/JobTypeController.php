<?php

namespace App\Http\Controllers\Backend\Job;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobTypeValidationRequest;
use App\Repository\JobType\OrganizationInterface;

class JobTypeController extends Controller
{
    protected $jobType;

    public function __construct(OrganizationInterface $jobType)
    {
        $this->jobType = $jobType;
    }

    public function create()
    {
        $data = $this->jobType->getAll();
        return view('jobType.create', compact('data'));
    }

    public function store(JobTypeValidationRequest $request)
    {
        $this->jobType->save($request->only('name'));
        return redirect()->back()->with('success', 'Job Type Created Successfully');
    }

    public function edit($id)
    {
        $data = $this->jobType->getOne($id);
        return view('jobType.edit', compact('data'));
    }

    public function update(JobTypeValidationRequest $request, $id)
    {
        $this->jobType->update($request->only('name'), $id);
        return redirect()->route('job-types.create')->with('success', 'Job Type Updated Successfully');
    }

    public function destroy($id)
    {
        $this->jobType->delete($id);
        return redirect()->back()->with('success', 'Job Type Deleted Successfully');
    }
}
