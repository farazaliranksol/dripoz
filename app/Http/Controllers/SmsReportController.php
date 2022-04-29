<?php

namespace App\Http\Controllers;

use App\Models\SmsReport;
use Illuminate\Http\Request;

class SmsReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.reports.sms_report.sms_report');
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
     * @param  \App\Models\SmsReport  $smsReport
     * @return \Illuminate\Http\Response
     */
    public function show(SmsReport $smsReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SmsReport  $smsReport
     * @return \Illuminate\Http\Response
     */
    public function edit(SmsReport $smsReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SmsReport  $smsReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SmsReport $smsReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SmsReport  $smsReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(SmsReport $smsReport)
    {
        //
    }
}
