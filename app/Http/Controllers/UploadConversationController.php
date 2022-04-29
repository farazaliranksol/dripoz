<?php

namespace App\Http\Controllers;

use App\Models\UploadConversation;
use Illuminate\Http\Request;

class UploadConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.tools.upload_conversation.upload_conversation');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UploadConversation  $uploadConversation
     * @return \Illuminate\Http\Response
     */
    public function show(UploadConversation $uploadConversation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UploadConversation  $uploadConversation
     * @return \Illuminate\Http\Response
     */
    public function edit(UploadConversation $uploadConversation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UploadConversation  $uploadConversation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UploadConversation $uploadConversation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UploadConversation  $uploadConversation
     * @return \Illuminate\Http\Response
     */
    public function destroy(UploadConversation $uploadConversation)
    {
        //
    }
}
