<?php

namespace App\Http\Controllers\Backend\Job;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobTypeValidationRequest;
use App\Repository\JobType\JobTypeInterface;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{
    protected $jobType;

    public function __construct( JobTypeInterface $jobType){
        $this->jobType = $jobType;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->jobType->all();
        return view('jobType.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(JobTypeValidationRequest $request)
    {
        $this->jobType->save($request->only('name'));
        return redirect()->back() ->with('success','Job Type Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data = $this->jobType->edit($id);
       return view('jobType.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(JobTypeValidationRequest $request, $id)
    {
        $this->jobType->update($request->only('name'),$id);
        return redirect()->route('job-types.create') ->with('success','Job Type Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->jobType->delete($id);
        return redirect()->back() ->with('success','Job Type Deleted Successfully');
    }
}
