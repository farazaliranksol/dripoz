<?php

namespace App\Http\Controllers;

use App\Models\CallsReport;
use Illuminate\Http\Request;

class CallsReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.reports.calls_report.calls_report');
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
     * @param  \App\Models\CallsReport  $callsReport
     * @return \Illuminate\Http\Response
     */
    public function show(CallsReport $callsReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CallsReport  $callsReport
     * @return \Illuminate\Http\Response
     */
    public function edit(CallsReport $callsReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CallsReport  $callsReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CallsReport $callsReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CallsReport  $callsReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(CallsReport $callsReport)
    {
        //
    }
}
