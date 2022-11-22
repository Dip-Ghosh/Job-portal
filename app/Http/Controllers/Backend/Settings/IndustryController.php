<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndustryFormRequest;
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
        $industries = $this->industryRepository->getAll();
        return view('industry.list', compact('industries'));
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
        $industry = $this->industryRepository->getOne($id);
        return view('industry.edit', compact('industry'));
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
