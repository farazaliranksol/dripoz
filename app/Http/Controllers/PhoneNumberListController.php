<?php

namespace App\Http\Controllers;

use App\Models\PhoneNumber;
use App\Models\PhoneNumberList;
use Illuminate\Http\Request;

class PhoneNumberListController extends Controller
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
        $request->validate([
            'name'          => 'required|unique:phone_number_lists',
        ]);

        $phoneNumberList = PhoneNumberList::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
        ]);
        return response()->json(['success'=>'Successfully','id'=>$phoneNumberList->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $id = $request->id;
        $name = $request->name;
        $phoneNumberList = PhoneNumberList::where('id',$id)->update([
            'name' => $name,
        ]);
        return response()->json(['success'=>'Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $phoneNumberList = PhoneNumberList::where('id',$id)->update([
            'is_del' => 1,
        ]);
        return response()->json(['success'=>'Successfully']);
        
    }
    public function flag(Request $request)
    {
        $id = $request->id;
        $checkPhoneNumberLists = PhoneNumber::where('phone_number_list_id', $id)->get();
        
        foreach($checkPhoneNumberLists as $checkPhoneNumberList){
            $update = PhoneNumber::where('phone_number_list_id', $id)->update([
                'flag' => 1,
            ]);
        }
        return response()->json(['success'=>'Phone Number List is Flagged.']); 
    }
}
