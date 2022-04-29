<?php

namespace App\Http\Controllers;

use App\Models\ClientManagement;
use App\Models\ClientUserPermission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientUserPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::where([['status','=','Active'],['role','!=','SuperAdmin'],['user_id','!=',Null]])->get();
        return view ('admin.users.users',$data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['companies'] = ClientManagement::where('status','Active')->get();
        return view ('admin.users.add_new_user',$data);
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
     * @param  \App\Models\ClientUserPermission  $clientUserPermission
     * @return \Illuminate\Http\Response
     */
    public function show(ClientUserPermission $clientUserPermission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientUserPermission  $clientUserPermission
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientUserPermission $clientUserPermission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientUserPermission  $clientUserPermission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientUserPermission $clientUserPermission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientUserPermission  $clientUserPermission
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientUserPermission $clientUserPermission)
    {
        //
    }
    public function user_store(Request $request){
        if(!$request->user_id){
            $checkEmail = User::where('email',$request->email)->first();
            if(!$checkEmail){
                $countUser = ClientManagement::select('no_of_users','user_id')->where('id',$request->company_id)->first();
                $no_of_users = $countUser->no_of_users;
                $user_id = $countUser->user_id;
                $checkUsers = User::where('user_id',$user_id)->get();
                if(count($checkUsers) < $no_of_users){
                    $user = User::create([
                        'first_name'   => $request->firstName,
                        'last_name'   => $request->lastName,
                        'email'   => $request->email,
                        'password'   =>  Hash::make($request->password),
                        'role'   => $request->role,
                        'user_id'   => $request->companyName,
                    ]);
                    if($user){
                        if($request->role == 'Admin'){
                            $client = ClientUserPermission::create([
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
                        if($request->role == 'Accounting'){
                            $client = ClientUserPermission::create([
                                'user_id' => $user->id,
                                'billing' => 1,
                                'make_payments' => 1,
                            ]);
                        }
                        if($request->role == 'Agent'){
                            $client = ClientUserPermission::create([
                                'user_id' => $user->id,
                                'inbox' => 1,
                            ]);
                        }
                        if($request->role == 'Reports'){
                            $client = ClientUserPermission::create([
                                'user_id' => $user->id,
                                'export_leads' => 1,
                                'view_reports' => 1,
                            ]);
                        }  
                        if($request->role == 'Custom'){
                            $client = ClientUserPermission::create([
                                'user_id' => $user->id,
                                'inbox' => $request->inboxCheck,
                                'phone_number' => $request->phoneNumberCheck,
                                'export_leads' => $request->exportLeadsCheck,
                                'ai_rules' => $request->aiRulesCheck,
                                'billing' => $request->billingCheck,
                                'tools' => $request->toolsCheck,
                                'logs' => $request->logsCheck,
                                'console' => $request->consoleCheck,
                                'view_leads' => $request->viewLeadsCheck,
                                'sound_library' => $request->soundCheck,
                                'view_reports' => $request->reportsCheck,
                                'make_payments' => $request->makePaymentsCheck,
                                'alerts' => $request->alertsCheck,
                                'api' => $request->apiCheck,
                            ]);
                        }                    
                    }
                    if($user && $client){
                        return response()->json(['success'=>'Saved']);
                    }else{
                        return response()->json(['error'=>'Please try again!']);
                    }
                }else{
                    return response()->json(['error'=>'Maximum you can add '.$no_of_users.' users']);
                }

              
            }else{
                return response()->json(['error'=>'Email is already exists!']);
                }
        }else{
            $user = User::where('id',$request->user_id)->update([
                'first_name'   => $request->firstName,
                'last_name'   => $request->lastName,
                'email'   => $request->email,
                'role'   => $request->role,
                'user_id'   => $request->companyName,
            ]);
            if($user){
                if($request->role == 'Custom'){
                    $client = ClientUserPermission::create([
                        'user_id' => $request->user_id,
                        'inbox' => $request->inboxCheck,
                        'phone_number' => $request->phoneNumberCheck,
                        'export_leads' => $request->exportLeadsCheck,
                        'ai_rules' => $request->aiRulesCheck,
                        'billing' => $request->billingCheck,
                        'tools' => $request->toolsCheck,
                        'logs' => $request->logsCheck,
                        'console' => $request->consoleCheck,
                        'view_leads' => $request->viewLeadsCheck,
                        'sound_library' => $request->soundCheck,
                        'view_reports' => $request->reportsCheck,
                        'make_payments' => $request->makePaymentsCheck,
                        'alerts' => $request->alertsCheck,
                        'api' => $request->apiCheck,
                    ]);
                    if($user && $client){
                        return response()->json(['success'=>'Updated']);
                    }else{
                        return response()->json(['error'=>'Please try again!']);
                    }
                }      
                
            }
            if($user){
                return response()->json(['success'=>'Updated']);
            }else{
                return response()->json(['error'=>'Please try again!']);
            }
        }
    }
    public function edit_client_user($id){
        $data['companies'] = ClientManagement::where('status','Active')->get();
        $data['user'] = User::with('clientUserPermissions')->where([['status','=','Active'],['role','!=','SuperAdmin'],['user_id','!=',Null],['id','=',$id]])->first();
        return view ('admin.users.add_new_user',$data);
    }
}
