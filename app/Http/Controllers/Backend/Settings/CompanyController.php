<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyFormRequest;
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
        $companies = $this->company->getActiveCompanies();
        return view('backend.company.list', compact('companies'));
    }

    public function create()
    {
        return view('backend.company.create');
    }

    public function store(CompanyFormRequest $request)
    {
        $this->companyService->requestParams($request->except('_token'));
        return redirect()->route('companies.index')->with('success', 'Company Created Successfully');
    }

    public function edit($id)
    {
        $company = $this->company->getOne($id);
        return view('backend.company.edit', compact('company'));
    }

    public function update(CompanyFormRequest $request, $id)
    {
        $this->companyService->requestUpdateParams($request->except('_token'), $id);
        return redirect()->route('companies.index')->with('success', 'Company Updated Successfully');
    }

    public function destroy($id)
    {
        $this->company->delete($id);
        return redirect()->back()->with('success', 'Company Deleted Successfully');
    }
}
