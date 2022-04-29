<?php

namespace App\Http\Controllers;

use App\Models\LiveCall;
use Illuminate\Http\Request;

class LiveCallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.logs.live_calls.live_calls');
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
     * @param  \App\Models\LiveCall  $liveCall
     * @return \Illuminate\Http\Response
     */
    public function show(LiveCall $liveCall)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LiveCall  $liveCall
     * @return \Illuminate\Http\Response
     */
    public function edit(LiveCall $liveCall)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LiveCall  $liveCall
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LiveCall $liveCall)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LiveCall  $liveCall
     * @return \Illuminate\Http\Response
     */
    public function destroy(LiveCall $liveCall)
    {
        //
    }
}
