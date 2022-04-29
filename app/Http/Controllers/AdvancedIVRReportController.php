<?php

namespace App\Http\Controllers;

use App\Models\AdvancedIVRReport;
use Illuminate\Http\Request;

class AdvancedIVRReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.reports.advanced_ivr_report.advanced_ivr_report');
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
     * @param  \App\Models\AdvancedIVRReport  $advancedIVRReport
     * @return \Illuminate\Http\Response
     */
    public function show(AdvancedIVRReport $advancedIVRReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdvancedIVRReport  $advancedIVRReport
     * @return \Illuminate\Http\Response
     */
    public function edit(AdvancedIVRReport $advancedIVRReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdvancedIVRReport  $advancedIVRReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdvancedIVRReport $advancedIVRReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdvancedIVRReport  $advancedIVRReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdvancedIVRReport $advancedIVRReport)
    {
        //
    }
}
