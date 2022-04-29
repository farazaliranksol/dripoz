<?php

namespace App\Http\Controllers;

use App\Models\LeadsReport;
use Illuminate\Http\Request;

class LeadsReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.reports.leads_report.leads_report');
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
     * @param  \App\Models\LeadsReport  $leadsReport
     * @return \Illuminate\Http\Response
     */
    public function show(LeadsReport $leadsReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeadsReport  $leadsReport
     * @return \Illuminate\Http\Response
     */
    public function edit(LeadsReport $leadsReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LeadsReport  $leadsReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeadsReport $leadsReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeadsReport  $leadsReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeadsReport $leadsReport)
    {
        //
    }
}
