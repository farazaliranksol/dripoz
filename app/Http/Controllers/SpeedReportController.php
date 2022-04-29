<?php

namespace App\Http\Controllers;

use App\Models\SpeedReport;
use Illuminate\Http\Request;

class SpeedReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reports.speed_report.speed_report');
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
     * @param  \App\Models\SpeedReport  $speedReport
     * @return \Illuminate\Http\Response
     */
    public function show(SpeedReport $speedReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpeedReport  $speedReport
     * @return \Illuminate\Http\Response
     */
    public function edit(SpeedReport $speedReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SpeedReport  $speedReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpeedReport $speedReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpeedReport  $speedReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpeedReport $speedReport)
    {
        //
    }
}
