<?php

namespace App\Http\Controllers;

use App\Models\ClientManagement;
use App\Models\ClientUserPermission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['clients'] = ClientManagement::orderBy('id','DESC')->get();
        return view ('admin.client_management.client_management',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.client_management.add_new_client');
    }
    public function edit_client_management($id){
        $data['client'] = ClientManagement::find($id);
        $data['user'] = User::find($data['client']->user_id);
        return view ('admin.client_management.add_new_client',$data);
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
    public function client_management_store(Request $request){
        if(!$request->client_id){
            $checkEmail = User::where('email',$request->email)->first();
            if(!$checkEmail){
                $user = User::create([
                    'first_name'   => $request->firstName,
                    'last_name'   => $request->lastName,
                    'email'   => $request->email,
                    'password'   =>  Hash::make($request->password),
                    'number'   => $request->mobileNumber,
                    'role'   => $request->role,
                ]);
        
                if($user){
                    $client = ClientManagement::create([
                        'user_id' => $user->id,
                        'company_name' => $request->companyName,
                        'address' => $request->address,
                        'address_line_1' => $request->addressLine1,
                        'city' => $request->city,
                        'zip_code' => $request->zipCode,
                        'state' => $request->state,
                        'phone_number' => $request->phoneNumber,
                        'no_of_users' => $request->numberOfUsers,
                        'website' => $request->websiteUrl,
                        'twilio_id' => $request->twilioId,
                    ]);
                    $permissions = ClientUserPermission::create([
                        'user_id' => $user->id,
                        'inbox' => 1,
                        'phone_number' => 1,
                        'export_leads' => 1,
                        'ai_rules' => 1,
                        'billing' => 1,
                        'tools' => 1,
                        'logs' => 1,
                        'console' => 1,
                        'view_leads' => 1,
                        'sound_library' => 1,
                        'view_reports' => 1,
                        'make_payments' => 1,
                        'alerts' => 1,
                        'api' => 1,

                    ]);
                }
                // $details = [
                //     'title' => 'New Client created',
                //     'body' => 'User is created',
                // ];
                // \Mail::to('mosman@nimblewebsolutions.com')->send(new \App\Mail\ClientTemplate($details));

                if($user && $client){
                    return response()->json(['success'=>'Saved']);
                }else{
                    return response()->json(['error'=>'Please try again!']);
                }
            }else{
                return response()->json(['error'=>'Email is already exists!']);
                }
        }else{
            $user = User::where('id',$request->user_id)->update([
                'first_name'   => $request->firstName,
                'last_name'   => $request->lastName,
                'email'   => $request->email,
                'password'   =>  Hash::make($request->password),
                'number'   => $request->mobileNumber,
                'role'   => $request->role,
            ]);
            if($user){
                $client = ClientManagement::where('id',$request->client_id)->update([
                    'company_name' => $request->companyName,
                    'address' => $request->address,
                    'address_line_1' => $request->addressLine1,
                    'city' => $request->city,
                    'zip_code' => $request->zipCode,
                    'state' => $request->state,
                    'phone_number' => $request->phoneNumber,
                    'no_of_users' => $request->numberOfUsers,
                    'website' => $request->websiteUrl,
                    'twilio_id' => $request->twilioId,
                ]);
            }
            if($user && $client){
                return response()->json(['success'=>'Updated']);
            }else{
                return response()->json(['error'=>'Please try again!']);
            }
        }
    }
    public function deactivate_client_management($id){
        $deactivateClient = ClientManagement::where('id',$id)->update([
            'status' => 'Deactivate',
        ]);
        $user_id = ClientManagement::find($id);
        $user_id = $user_id->user_id;
        $deactivateUser = User::where('id',$user_id)->update([
            'status' => 'Deactivate',
        ]);
        if($deactivateClient && $deactivateUser){
            return redirect()->back()->with(['success'=>'Updated']);
        }else{
            return redirect()->back()->with(['error'=>'Please try again!']);
        }
    }
}
