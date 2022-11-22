<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationFormRequest;
use App\Repository\Location\LocationInterface;
use App\Service\LocationService;

class LocationController extends Controller
{
    protected $location;
    protected $locationService;

    public function __construct(LocationInterface $location, LocationService $locationService)
    {
        $this->location = $location;
        $this->locationService = $locationService;
    }

    public function index()
    {
        $industries = $this->location->getAll();
        return view('location.list', compact('industries'));
    }

    public function create()
    {
        return view('locations.create');
    }

    public function store(LocationFormRequest $request)
    {
        $this->locationService->requestParams($request->except('_token'));
        return redirect()->route('industries.index')->with('success', 'Location Created Successfully');
    }

    public function edit($id)
    {
        $$location = $this->location->getOne($id);
        return view('location.edit', compact('industry'));
    }

    public function update(LocationFormRequest $request, $id)
    {
        $this->locationService->requestUpdateParams($request->except('_token'), $id);
        return redirect()->route('industries.index')->with('success', 'Industry Updated Successfully');
    }

    public function destroy($id)
    {
        $this->location->delete($id);
        return redirect()->back()->with('success', 'Industry Deleted Successfully');
    }
}
