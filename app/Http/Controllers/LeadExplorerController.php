<?php

namespace App\Http\Controllers;

use App\Exports\LeadsExport;
use App\Models\Campaign;
use App\Models\Lead;
use App\Models\PhoneBook;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class LeadExplorerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { /*global $leads;*/
        $leads = Lead::all();
        $camp = Campaign::select('name')->get();
        $phoneBook = PhoneBook::whereNotIn('status',[3])->get();
        /*foreach ($phoneBook as $book){
            $leads .= Lead::where('phone_book_id',$book->id)->get();
        }
        echo '<pre>';
        print_r($phoneBook);
        die();*/
        return view('admin.leads.leads_explorer',['leads'=>$leads,'phoneBook'=>$phoneBook,'camp'=>$camp]);
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

    public function exportFile(){
        return Excel::download(new LeadsExport(), 'Leads.csv');
    }

    public function updateStatus(Request $request){
        $data = PhoneBook::all();
        foreach($data as $row){
            $row->status = $request->edit_option;
            $row->save();
        }
        return redirect()->back();
    }
    public function checkClickTrigger(Request $request){
        $id = $request->lead_id;
        $checkTrigger = Lead::where('id',$id)->first();/*
        $camp_id = Campaign::select('id')->where('title',$checkTrigger->camp_name)->first();
        $checkTrigger['camp_id'] += $camp_id->id;*/
        if($checkTrigger){
            return json_encode($checkTrigger);
        }else{
            return 0;
        }
    }
    public function deleteRecord(Request $request){
        $id = $request->lead_id;
        $del = Lead::where('id',$id)->delete();
        if($del){
            $notification = array(
                'type' => 'success',
                'message' => 'Record Deleted successfully',
            );
        }else{
            $notification = array(
                'type' => 'error',
                'message' => 'Record not Deleted ',
            );
        }
        return redirect('leadsExplorer')->with($notification);
    }
}
