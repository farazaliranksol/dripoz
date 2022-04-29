<?php

namespace App\Http\Controllers;

use App\Models\RecurringItem;
use Illuminate\Http\Request;

class RecurringItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.billing.recurring_items.recurring_items');
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
     * @param  \App\Models\RecurringItem  $recurringItem
     * @return \Illuminate\Http\Response
     */
    public function show(RecurringItem $recurringItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecurringItem  $recurringItem
     * @return \Illuminate\Http\Response
     */
    public function edit(RecurringItem $recurringItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RecurringItem  $recurringItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecurringItem $recurringItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecurringItem  $recurringItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecurringItem $recurringItem)
    {
        //
    }
}
