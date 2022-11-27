<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationFormRequest;
use App\Repository\Backend\LocationInterface;
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
        $locations = $this->location->getAll();
        return view('backend.location.list', compact('locations'));
    }

    public function create()
    {
        return view('backend.location.create');
    }

    public function store(LocationFormRequest $request)
    {
        $this->locationService->requestParams($request->except('_token'));
        return redirect()->route('locations.index')->with('success', 'Location Created Successfully');
    }

    public function edit($id)
    {
        $location = $this->location->getOne($id);
        return view('backend.location.edit', compact('location'));
    }

    public function update(LocationFormRequest $request, $id)
    {
        $this->locationService->requestUpdateParams($request->except('_token'), $id);
        return redirect()->route('locations.index')->with('success', 'Locations Updated Successfully');
    }

    public function destroy($id)
    {
        $this->location->delete($id);
        return redirect()->back()->with('success', 'Location Deleted Successfully');
    }
}
