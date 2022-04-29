<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Lead;
use App\Models\PhoneBook;
use App\Models\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LeadsImport;

class UploadLeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $camp = Campaign::where('user_id',auth()->user()->id)->get();
        $phoneBook = PhoneBook::where('status','0')->get();
        return view('admin.leads.uploadLeads',['camp'=>$camp,'phoneBook'=>$phoneBook]);
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
        $phoneBook->status = '0';
        $phoneBook->user_id = Auth::user()->id;
        $phoneBook->camp_id = $request->camp_select;
        $total = file($request->file('file'));
        $phoneBook->total_contacts = count($total);
        $phoneBook->save();
        $camp_title = Campaign::select('name')->find($request->camp_select);
        $data=[
          'phone_book_id'=>$phoneBook->id,
          'camp_name' => $camp_title->name,
          'campaign_id'=>$request->camp_select
        ];
        // dd($data);
        $import = Excel::import(new LeadsImport($data), $request->file('file')->store('temp'));
        /*if (($handle = fopen ($request->file('file')->getRealPath(), 'r' )) !== FALSE) {
            fgetcsv($handle);
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                $row++;
                $leads = new Lead();
                $leads->phone_book_id = $phoneBook->id;
                $leads->camp_name = $list_data->list_title;
                $leads->first_name = $data[0];
                $leads->last_name = $data[1];
                $leads->phone_number = $data[2];
                $leads->sub1 = $data[3];
                $leads->sub2 = $data[4];
                $leads->sub3 = $data[5];
                $leads->zip_code = $data[6];
                $leads->save();
            }
            fclose ( $handle );
        }*/
        return redirect('uploadLeads');
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
