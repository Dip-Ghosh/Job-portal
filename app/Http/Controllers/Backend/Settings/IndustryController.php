<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndustryFormRequest;
use App\Repository\Backend\IndustryInterface;
use App\Repository\Backend\OrganizationInterface;
use App\Service\IndustryService;

class IndustryController extends Controller
{
    protected $industryRepository;
    protected $industryService;
    protected $organization;

    public function __construct(IndustryInterface     $industryRepository,
                                IndustryService       $industryService,
                                OrganizationInterface $organization)
    {
        $this->industryRepository = $industryRepository;
        $this->industryService = $industryService;
        $this->organization = $organization;
    }

    public function index()
    {
        $industries = $this->industryRepository->getActiveIndustries();
        return view('backend.industry.list', compact('industries'));
    }

    public function create()
    {
        $organizations = $this->organization->getAll();
        return view('backend.industry.create', compact('organizations'));
    }

    public function store(IndustryFormRequest $request)
    {
        $this->industryService->requestParams($request->except('_token'));
        return redirect()->route('industries.index')->with('success', 'Industry Created Successfully');
    }

    public function edit($id)
    {
        $organizations = $this->organization->getAll();
        $industry = $this->industryRepository->getOne($id);
        return view('backend.industry.edit', compact('industry', 'organizations'));
    }

    public function update(IndustryFormRequest $request, $id)
    {
        $this->industryService->requestUpdateParams($request->except('_token'), $id);
        return redirect()->route('industries.index')->with('success', 'Industry Updated Successfully');
    }

    public function destroy($id)
    {
        $this->industryRepository->delete($id);
        return redirect()->back()->with('success', 'Industry Deleted Successfully');
    }
}
