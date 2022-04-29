<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $insert = Subscription::create([
            'package_name'   => $request->packageName,
            'price'   => $request->price,
            'total_number'   => $request->totalNumber,
            'campaigns'   => $request->campaigns,
            'users'   => $request->users,
        ]);
        if($insert) {
            return response()->json(['success' => 'Saved']);
        }else {
            return response()->json(['error' => 'Please try again!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $Subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $Subscription)
    {
        $subscriber = Subscription::all();
        return view('admin.subscriber.subscription',compact('subscriber'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $Subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $Subscription,$id)
    {
        $subscriber = Subscription::find($id);
        return view('admin.subscriber.edit-subscription',compact('subscriber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $Subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $Subscription)
    {
        $subscription = Subscription::where('id',$request->packageId)->update([
            'package_name'   => $request->packageName,
            'price'   => $request->price,
            'total_number'   => $request->totalNumber,
            'campaigns'   => $request->campaigns,
            'users'   => $request->users,
        ]);
        if($subscription) {
            return response()->json(['success' => 'Saved']);
        }else {
            return response()->json(['error' => 'Please try again!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $Subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Subscription $Subscription)
    {
        $subscription = Subscription::destroy(array('id',$request->id));
        if($subscription) {
            return response()->json(['success' => 'Deleted!']);
        }else {
            return response()->json(['error' => 'Please try again!']);
        }
    }
}
