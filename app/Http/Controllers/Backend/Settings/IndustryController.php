<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Repository\Industry\IndustryInterface;
use App\Service\IndustryService;

class IndustryController extends Controller
{
    protected $industryRepository;
    protected $industryService;

    public function __construct(IndustryInterface $industryRepository, IndustryService $industryService)
    {
        $this->industryRepository = $industryRepository;
        $this->industryService = $industryService;
    }

    public function index()
    {
        $organizations = $this->industryRepository->getAll();
        return view('organization.list', compact('organizations'));
    }

    public function create()
    {
        return view('organization.create');
    }

    public function store(OrganizationFormRequest $request)
    {
        $this->industryService->requestParams($request->except('_token'));
        return redirect()->route('organizations.index')->with('success', 'Organization Created Successfully');
    }

    public function edit($id)
    {
        $organization = $this->industryRepository->getOne($id);
        return view('organization.edit', compact('organization'));
    }

    public function update(OrganizationFormRequest $request, $id)
    {
        $this->industryService->requestUpdateParams($request->except('_token'), $id);
        return redirect()->route('organizations.index')->with('success', 'Organization Updated Successfully');
    }

    public function destroy($id)
    {
        $this->industryRepository->delete($id);
        return redirect()->back()->with('success', 'Organization Deleted Successfully');
    }
}
