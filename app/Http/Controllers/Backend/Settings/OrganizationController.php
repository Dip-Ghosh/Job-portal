<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrganizationFormRequest;
use App\Repository\Backend\OrganizationInterface;
use App\Service\OrganizationService;

class OrganizationController extends Controller
{
    protected $organizationRepository;
    protected $organizationService;

    public function __construct(OrganizationInterface $organizationRepository, OrganizationService $organizationService)
    {
        $this->organizationRepository = $organizationRepository;
        $this->organizationService = $organizationService;
    }

    public function index()
    {
        $organizations = $this->organizationRepository->getAll();
        return view('backend.organization.list', compact('organizations'));
    }

    public function create()
    {
        return view('backend.organization.create');
    }

    public function store(OrganizationFormRequest $request)
    {
        $this->organizationService->requestParams($request->except('_token'));
        return redirect()->route('organizations.index')->with('success', 'Organization Created Successfully');
    }

    public function edit($id)
    {
        $organization = $this->organizationRepository->getOne($id);
        return view('backend.organization.edit', compact('organization'));
    }

    public function update(OrganizationFormRequest $request, $id)
    {
        $this->organizationService->requestUpdateParams($request->except('_token'), $id);
        return redirect()->route('organizations.index')->with('success', 'Organization Updated Successfully');
    }

    public function destroy($id)
    {
        $this->organizationRepository->delete($id);
        return redirect()->back()->with('success', 'Organization Deleted Successfully');
    }
}
