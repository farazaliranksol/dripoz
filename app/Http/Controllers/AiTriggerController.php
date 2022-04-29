<?php

namespace App\Http\Controllers;

use App\Models\AiTrigger;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AiTriggerImport;
use App\Exports\AiTriggerExport;

class AiTriggerController extends Controller
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
        if(isset($request->triggerId)){
        $id= $request->triggerId;
            if (AiTrigger::where('id', $id )->exists()) {
                $update = AiTrigger::where('id',$id)->update([
                    'type'               => $request->type,
                    'match_type'         => $request->match_type,
                    'trigger'            => $request->trigger,
                    'action'             => $request->action,
                    'message'            => $request->message,
                    'fire_webhook'       => $request->fire_webhook,
                    'webhook'            => $request->webhook,
                    'fire_zapier'        => $request->fire_zapier,
                    'fire_email'         => $request->fire_email,
                    'recipient'          => $request->recipient,
                    'subject'            => $request->subject,
                    'email_message'      => $request->email_message,
                ]);
            }
            if($update){
                $notification = array(
                    'type' => 'success',
                    'message' => 'Trigger is updated',
                );
            }else{
                $notification = array(
                    'type' => 'error',
                    'message' => 'Trigger is not updated',
                );
            }
        }else{
            $this->validate($request,[
                'type'               => 'required|string|max:50',
                'match_type'         => 'required|string|max:50',
                'trigger'            => 'required|string|max:100',
            ]);

            $create = AiTrigger::create([
                'type'               => $request->type,
                'match_type'         => $request->match_type,
                'trigger'            => $request->trigger,
                'action'             => $request->action,
                'message'            => $request->message,
                'fire_webhook'       => $request->fire_webhook,
                'webhook'            => $request->webhook,
                'fire_zapier'        => $request->fire_zapier,
                'fire_email'         => $request->fire_email,
                'recipient'          => $request->recipient,
                'subject'            => $request->subject,
                'email_message'      => $request->email_message,
            ]);
            if($create){
                $notification = array(
                    'type' => 'success',
                    'message' => 'Trigger is Added',
                );
            }else{
                $notification = array(
                    'type' => 'error',
                    'message' => 'Trigger is not Added',
                );
            }
        }

        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AiTrigger  $aiTrigger
     * @return \Illuminate\Http\Response
     */
    public function show(AiTrigger $aiTrigger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AiTrigger  $aiTrigger
     * @return \Illuminate\Http\Response
     */
    public function edit(AiTrigger $aiTrigger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AiTrigger  $aiTrigger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AiTrigger $aiTrigger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AiTrigger  $aiTrigger
     * @return \Illuminate\Http\Response
     */
    public function destroy(AiTrigger $aiTrigger)
    {
        //
    }
    public function del_aiTrigger($id){
        $delete = AiTrigger::where('id',$id)->delete();
        if($delete){
            $notification = array(
                'type' => 'success',
                'message' => 'Trigger is Deleted',
            );
        }else{
            $notification = array(
                'type' => 'error',
                'message' => 'Trigger is not Deleted',
            );
        }
        return redirect()->back()->with($notification);
    }
    public function editTrigger(Request $request){
        $data = AiTrigger::find($request->id);
        return json_encode($data);
    }
    public function fileImport(Request $request)
    {
        $import = Excel::import(new AiTriggerImport, $request->file('file')->store('temp'));
        if($import){
            $notification = array(
                'type' => 'success',
                'message' => 'A.I rules is imported',
            );
        }else{
            $notification = array(
                'type' => 'error',
                'message' => 'A.I rules is not imported',
            );
        }
        return back()->with($notification);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExport()
    {
        return Excel::download(new AiTriggerExport, 'ai-triggers.xlsx');
    }
    public function checkTrigger(Request $request){
        $trigger = $request->trigger;
        $checkTrigger = AiTrigger::where('trigger', 'LIKE', '%' . $trigger . '%')->first();
        if($checkTrigger){
            return json_encode($checkTrigger);
        }
        return 0;
    }
}
