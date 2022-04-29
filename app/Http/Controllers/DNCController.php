<?php

namespace App\Http\Controllers;

use App\Imports\LeadsImport;
use App\Models\Campaign;
use App\Models\Lead;
use App\Models\PhoneBook;
use App\Models\PhoneNumber;
use Illuminate\Http\Request;    
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DNCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = PhoneBook::where('status','1')->get();
        return view('admin.leads.dnc',['list'=>$list]);
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
        $phoneBook = new PhoneBook();
        $phoneBook->title = $request->file('file')->getClientOriginalName();
        $phoneBook->status = '1';
        $phoneBook->user_id = Auth::user()->id;
        $phoneBook->camp_id = $request->camp_select;
        $total = file($request->file('file'));
        $phoneBook->total_contacts = count($total);
        $phoneBook->save();
        $data=[
            'phone_book_id'=>$phoneBook->id,
            'camp_name' => ' '
        ];
        $import = Excel::import(new LeadsImport($data), $request->file('file')->store('temp'));
        return redirect()->back();
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
