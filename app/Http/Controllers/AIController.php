<?php

namespace App\Http\Controllers;

use App\Models\AI;
use App\Models\AiTrigger;
use Illuminate\Http\Request;

class AIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['ais'] = AI::orderBy('id', 'DESC')->get();
        $data['aiTriggers'] = AiTrigger::orderBy('id','DESC')->get();
        return view ('admin.ai_rules.ai_rules',$data);
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
        $this->validate($request,[
           'ai_rule_name' => 'required|string|max:50',
        ]);
        $create = AI::create([
           'name' => $request->ai_rule_name,
        ]);
        if($create){
            $notification = array(
                'type' => 'success',
                'message' => 'AI Rule is Added',
            );
        }else{
            $notification = array(
                'type' => 'error',
                'message' => 'AI Rule is not Added',
            );
        }
        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AI  $aI
     * @return \Illuminate\Http\Response
     */
    public function show(AI $aI)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AI  $aI
     * @return \Illuminate\Http\Response
     */
    public function edit(AI $aI)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AI  $aI
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AI $aI)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AI  $aI
     * @return \Illuminate\Http\Response
     */
    public function destroy(AI $aI)
    {
        //
    }
    public function update_ai_rule(Request $request){
        $id = $request->edit_ai_id;
        $updated_name = $request->ai_rule_edit_name;
        $update = AI::where('id',$id)->update([
           'name' => $updated_name,
        ]);
        if($update){
            $notification = array (
              'type' => 'success',
              'message' => 'AI Rule is Updated',
            );
        }else{
            $notification = array (
                'type' => 'error',
                'message' => 'AI Rule is not Updated',
            );
        }
        return redirect()->back()->with($notification);
    }
    public function del_ai_rule(Request $request){
        $id = $request->del_ai_rule ;
        $delete = AI::where('id',$id)->delete();
        if($delete){
            $notification = array (
                'type' => 'success',
                'message' => 'AI Rule is Deleted',
            );
        }else{
            $notification = array (
                'type' => 'error',
                'message' => 'AI Rule is not Deleted',
            );
        }
        return redirect()->back()->with($notification);

    }
}
