<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrganizationFormRequest;
use App\Models\Organization;
use App\Repository\Backend\OrganizationInterface;
use App\Service\OrganizationService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Access\Gate;

class OrganizationController extends Controller
{
    protected $organizationRepository;
    protected $organizationService;

    public function __construct(OrganizationInterface $organizationRepository, OrganizationService $organizationService)
    {
        $this->authorizeResource(Organization::class, 'organization');
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

    /**
     * @throws AuthorizationException
     */
    public function destroy($id)
    {
        $record = Organization::find($id);
       \Illuminate\Support\Facades\Gate::authorize('delete', $record);

        $record->delete();
        return back()->with('success', 'Organization Deleted Successfully');
    }
}
