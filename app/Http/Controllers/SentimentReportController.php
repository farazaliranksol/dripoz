<?php

namespace App\Http\Controllers;

use App\Models\SentimentReport;
use Illuminate\Http\Request;

class SentimentReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.reports.sentiment_report.sentiment_report');
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
     * @param  \App\Models\SentimentReport  $sentimentReport
     * @return \Illuminate\Http\Response
     */
    public function show(SentimentReport $sentimentReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SentimentReport  $sentimentReport
     * @return \Illuminate\Http\Response
     */
    public function edit(SentimentReport $sentimentReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SentimentReport  $sentimentReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SentimentReport $sentimentReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SentimentReport  $sentimentReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(SentimentReport $sentimentReport)
    {
        //
    }
}
