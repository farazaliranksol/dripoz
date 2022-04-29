<?php

namespace App\Http\Controllers;

use App\Models\DailyUsage;
use Illuminate\Http\Request;

class DailyUsageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.billing.daily_usage.daily_usage');
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
     * @param  \App\Models\DailyUsage  $dailyUsage
     * @return \Illuminate\Http\Response
     */
    public function show(DailyUsage $dailyUsage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DailyUsage  $dailyUsage
     * @return \Illuminate\Http\Response
     */
    public function edit(DailyUsage $dailyUsage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DailyUsage  $dailyUsage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DailyUsage $dailyUsage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DailyUsage  $dailyUsage
     * @return \Illuminate\Http\Response
     */
    public function destroy(DailyUsage $dailyUsage)
    {
        //
    }
}
