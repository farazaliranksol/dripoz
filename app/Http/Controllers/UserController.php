<?php

namespace App\Http\Controllers;

use App\Models\ClientManagement;
use App\Models\ClientUserPermission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['companies'] = ClientManagement::where('status', 'Active')->get();
        return view('admin.users.add_new_user', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // DB::table('users')->insert([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        // return response()->json(['success' => 'The data is saved!']);
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
    public function manage_users()
    {
        $users = User::where('id', auth()->user()->id)->orWhere('user_id', auth()->user()->id)->where('status', 'Active')->get();
        $deactivateUsers = User::where([['id', '=', auth()->user()->id], ['status', '=', 'Deactivate']])->orWhere([['user_id', '=', auth()->user()->id], ['status', '=', 'Deactivate']])->get();

        return view('admin.users.manage_users', compact('users', 'deactivateUsers'));
    }

    public function account_setting()
    {
        if(auth()->user()->user_id){
            $clientManagement = ClientManagement::where('user_id' , auth()->user()->user_id)->first();
        }else{
            $clientManagement = ClientManagement::where('user_id' , auth()->user()->id)->first();
        }
        return view('admin.users.account_setting',compact('clientManagement'));
    }
    public function user_login($id)
    {
        $user = User::find($id);
        // dd($user);
        Auth::login($user, true);
        if(auth()->user()){
            $permit=ClientUserPermission::where('user_id',auth()->user()->id)->first();
            if($permit['inbox']==1){
                return redirect('/inbox');
            }elseif($permit['phone_number']==1){
                return redirect('/phoneNumber');
            }elseif($permit['export_leads']==1){
                return redirect('/leadsExplorer');
            }elseif($permit['ai_rules']==1){
                return redirect('/ai');
            }elseif($permit['billing']==1){
                return redirect('/overview');
            }elseif($permit['tools']==1){
                return redirect('/abTest');
            }elseif($permit['logs']==1){
                return redirect('/liveCall');
            }elseif($permit['console']==1){
                return redirect('/console');
            }elseif($permit['view_leads']==1){
                return redirect('/leadsSummary');
            }elseif($permit['sound_library']==1){
                return redirect('/sound');
            }elseif($permit['view_reports']==1){
                return redirect('/callsReport');
            }elseif($permit['make_payments']==1){
                return redirect('/trustHub');
            }elseif($permit['alerts']==1){
                return redirect('/trustHub');
            }elseif($permit['api']==1){
                return redirect('/trustHub');
            }else{
                return redirect('/trustHub');
            }
        }
        // return redirect()->route('console.index');
    }
    public function client_user_store(Request $request)
    {
        if (!$request->user_id) {
            $checkEmail = User::where('email', $request->email)->first();
            if (!$checkEmail) {
                $checkUserId = User::select('user_id')->where('id', auth()->user()->id)->first();
                $user_id = $checkUserId->user_id;
                if ($user_id) {
                    $countUser = ClientManagement::select('no_of_users', 'user_id')->where('user_id', $checkUserId->user_id)->first();
                    $no_of_users = $countUser->no_of_users;
                } else {
                    $countUser = ClientManagement::select('no_of_users', 'user_id')->where('user_id', auth()->user()->id)->first();
                    $no_of_users = $countUser->no_of_users;
                }
                $user_id_client = $countUser->user_id;
                $checkUsers = User::where('user_id', $user_id_client)->get();
                if (count($checkUsers) < $no_of_users) {
                    $user = User::create([
                        'first_name'   => $request->firstName,
                        'last_name'   => $request->lastName,
                        'email'   => $request->email,
                        'password'   =>  Hash::make(Str::random(12)),
                        'role'   => $request->role,
                        'user_id'   => auth()->user()->id,
                    ]);
                    if ($user) {
                        if ($request->role == 'Admin') {
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
                        if ($request->role == 'Accounting') {
                            $client = ClientUserPermission::create([
                                'user_id' => $user->id,
                                'billing' => 1,
                                'make_payments' => 1,
                            ]);
                        }
                        if ($request->role == 'Agent') {
                            $client = ClientUserPermission::create([
                                'user_id' => $user->id,
                                'inbox' => 1,
                            ]);
                        }
                        if ($request->role == 'Reports') {
                            $client = ClientUserPermission::create([
                                'user_id' => $user->id,
                                'export_leads' => 1,
                                'view_reports' => 1,
                            ]);
                        }
                        if ($request->role == 'Custom') {
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
                    if ($user && $client) {
                        return response()->json(['success' => 'Saved']);
                    } else {
                        return response()->json(['error' => 'Please try again!']);
                    }
                } else {
                    return response()->json(['error' => 'Maximum you can add ' . $no_of_users . ' users']);
                }
            } else {
                return response()->json(['error' => 'Email is already exists!']);
            }
        } else {

            $clientPermissionsDelete = ClientUserPermission::where('user_id', $request->user_id)->delete();
            $clientPermissionsUpdate = ClientUserPermission::create([
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
            if ($clientPermissionsUpdate) {
                return response()->json(['success' => 'Updated']);
            } else {
                return response()->json(['error' => 'Please try again!']);
            }
        }
    }
    public function deactivate_user($id)
    {
        $user = User::where('id', $id)->update([
            'status' => 'Deactivate',
        ]);
        if ($user) {
            return redirect()->back()->with('success', 'User is deactivated');
        } else {
            return redirect()->back()->with('error', 'Please try again!');
        }
    }
    public function activate_user($id)
    {
        $user = User::where('id', $id)->update([
            'status' => 'Active',
        ]);
        if ($user) {
            return redirect()->back()->with('success', 'User is Activated');
        } else {
            return redirect()->back()->with('error', 'Please try again!');
        }
    }
    public function userDetailsForm(Request $request){
        $update = User::where('id',$request->userId)->update([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($update) {
            return response()->json(['success' => 'Updated']);
        } else {
            return response()->json(['error' => 'Please try again!']);
        }
    }

    public function userContactForm(Request $request){
        $update = User::where('id',$request->userId)->update([
            'email' => $request->email,
            'number' => $request->number,
        ]);
        if ($update) {
            return response()->json(['success' => 'Updated']);
        } else {
            return response()->json(['error' => 'Please try again!']);
        }
    }

}
