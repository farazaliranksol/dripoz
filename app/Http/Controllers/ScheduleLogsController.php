<?php

namespace App\Http\Controllers;

use App\Models\ScheduleLogs;
use Illuminate\Http\Request;

class ScheduleLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.logs.schedules.schedules');
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
     * @param  \App\Models\ScheduleLogs  $scheduleLogs
     * @return \Illuminate\Http\Response
     */
    public function show(ScheduleLogs $scheduleLogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScheduleLogs  $scheduleLogs
     * @return \Illuminate\Http\Response
     */
    public function edit(ScheduleLogs $scheduleLogs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScheduleLogs  $scheduleLogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScheduleLogs $scheduleLogs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScheduleLogs  $scheduleLogs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScheduleLogs $scheduleLogs)
    {
        //
    }
}
