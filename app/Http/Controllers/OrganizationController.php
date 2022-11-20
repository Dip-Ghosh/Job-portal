<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Repository\Organization\OrganizationInterface;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    protected $organizationRepository;

    public function __construct(OrganizationInterface $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }

    public function index()
    {
        $organizations = $this->organizationRepository->getAll();
        return view('organization.list', compact('organizations'));
    }

    public function create()
    {
        return view('organization.create');
    }


    public function store(Request $request)
    {
        //
    }


    public function edit($id)
    {
        $this->organizationRepository->getOne($id);
        return redirect()->back()->with('success', 'Organization Deleted Successfully');
    }


    public function update(Request $request, Organization $organization)
    {

    }

    public function destroy($id)
    {
        $this->organizationRepository->delete($id);
        return redirect()->back()->with('success', 'Organization Deleted Successfully');
    }
}
