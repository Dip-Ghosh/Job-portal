<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Repository\JobTitle\JobTitleInterface;
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
        $jobTitles = $this->jobTitle->getAll();
        return view('industry.list', compact('jobTitles'));
    }

    public function create()
    {
        return view('industry.create');
    }

    public function store(IndustryFormRequest $request)
    {
        $this->jobTitleService->requestParams($request->except('_token'));
        return redirect()->route('industries.index')->with('success', 'Job Title Created Successfully');
    }

    public function edit($id)
    {
        $industry = $this->jobTitle->getOne($id);
        return view('industry.edit', compact('industry'));
    }

    public function update(IndustryFormRequest $request, $id)
    {
        $this->jobTitleService->requestUpdateParams($request->except('_token'), $id);
        return redirect()->route('industries.index')->with('success', 'Job Title Updated Successfully');
    }

    public function destroy($id)
    {
        $this->jobTitle->delete($id);
        return redirect()->back()->with('success', 'Job Title Deleted Successfully');
    }
}
