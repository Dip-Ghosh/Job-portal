<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageReceiptRequest;
use App\Http\Requests\UpdateMessageReceiptRequest;
use App\Models\MessageReceipt;

class MessageReceiptController extends Controller
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
     * @param  \App\Http\Requests\StoreMessageReceiptRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageReceiptRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MessageReceipt  $messageReceipt
     * @return \Illuminate\Http\Response
     */
    public function show(MessageReceipt $messageReceipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MessageReceipt  $messageReceipt
     * @return \Illuminate\Http\Response
     */
    public function edit(MessageReceipt $messageReceipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMessageReceiptRequest  $request
     * @param  \App\Models\MessageReceipt  $messageReceipt
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessageReceiptRequest $request, MessageReceipt $messageReceipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MessageReceipt  $messageReceipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(MessageReceipt $messageReceipt)
    {
        //
    }
}
