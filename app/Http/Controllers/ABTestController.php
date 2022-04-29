<?php

namespace App\Http\Controllers;

use App\Models\ABTest;
use Illuminate\Http\Request;

class ABTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.tools.ab_test.ab_test');
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
     * @param  \App\Models\ABTest  $aBTest
     * @return \Illuminate\Http\Response
     */
    public function show(ABTest $aBTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ABTest  $aBTest
     * @return \Illuminate\Http\Response
     */
    public function edit(ABTest $aBTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ABTest  $aBTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ABTest $aBTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ABTest  $aBTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ABTest $aBTest)
    {
        //
    }
}
