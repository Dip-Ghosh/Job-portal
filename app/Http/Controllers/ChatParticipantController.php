<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatParticipantRequest;
use App\Http\Requests\UpdateChatParticipantRequest;
use App\Models\ChatParticipant;

class ChatParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChatParticipantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChatParticipantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChatParticipant  $chatParticipant
     * @return \Illuminate\Http\Response
     */
    public function show(ChatParticipant $chatParticipant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChatParticipant  $chatParticipant
     * @return \Illuminate\Http\Response
     */
    public function edit(ChatParticipant $chatParticipant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChatParticipantRequest  $request
     * @param  \App\Models\ChatParticipant  $chatParticipant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChatParticipantRequest $request, ChatParticipant $chatParticipant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChatParticipant  $chatParticipant
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChatParticipant $chatParticipant)
    {
        //
    }
}
