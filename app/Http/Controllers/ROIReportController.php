<?php

namespace App\Http\Controllers;

use App\Models\ROIReport;
use Illuminate\Http\Request;

class ROIReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.reports.roi_report.roi_report');
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
     * @param  \App\Models\ROIReport  $rOIReport
     * @return \Illuminate\Http\Response
     */
    public function show(ROIReport $rOIReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ROIReport  $rOIReport
     * @return \Illuminate\Http\Response
     */
    public function edit(ROIReport $rOIReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ROIReport  $rOIReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ROIReport $rOIReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ROIReport  $rOIReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ROIReport $rOIReport)
    {
        //
    }
}
