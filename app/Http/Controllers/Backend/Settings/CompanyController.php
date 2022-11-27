<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Repository\Backend\CompanyInterface;
use App\Service\CompanyService;

class CompanyController extends Controller
{
    protected $companyService;
    protected $company;

    public function __construct(CompanyService $companyService, CompanyInterface $company)
    {
        $this->companyService = $companyService;
        $this->company = $company;
    }

    public function index()
    {
        $companies = $this->company->getAll();
        return view('industry.list', compact('companies'));
    }

    public function create()
    {
        return view('industry.create');
    }

    public function store(IndustryFormRequest $request)
    {
        $this->industryService->requestParams($request->except('_token'));
        return redirect()->route('industries.index')->with('success', 'Industry Created Successfully');
    }

    public function edit($id)
    {
        $industry = $this->company->getOne($id);
        return view('industry.edit', compact('industry'));
    }

    public function update(IndustryFormRequest $request, $id)
    {
        $this->industryService->requestUpdateParams($request->except('_token'), $id);
        return redirect()->route('industries.index')->with('success', 'Industry Updated Successfully');
    }

    public function destroy($id)
    {
        $this->company->delete($id);
        return redirect()->back()->with('success', 'Industry Deleted Successfully');
    }
}
