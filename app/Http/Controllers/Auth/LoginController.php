<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\ClientUserPermission;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */


     
    protected $redirectTo = RouteServiceProvider::dashboard;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectTo()
    {
        $isActive = auth()->user()->status;

        if ($isActive==='Active') {
            $user_type = auth()->user()->role;
            switch ($user_type) {
                case 'SuperAdmin':
                    return '/dashboard';
                    
                    break;
                case 'Admin':
                    return '/console';
                    break;
                case 'Accounting':
                    return '/overview';
                    break; 
                case 'Agent':
                    return '/Inbox';
                    break;
                case 'Reports':
                    return '/callsReport';
                    break; 
                case 'Custom':
                    $permit=ClientUserPermission::where('user_id',auth()->user()->id)->first();
                    if($permit['inbox']==1){
                        return '/inbox';
                        break;
                    }elseif($permit['phone_number']==1){
                        return '/phoneNumber';
                        break;
                    }elseif($permit['export_leads']==1){
                        return '/leadsExplorer';
                        break;
                    }elseif($permit['ai_rules']==1){
                        return '/ai';
                        break;
                    }elseif($permit['billing']==1){
                        return '/overview';
                        break;
                    }elseif($permit['tools']==1){
                        return '/abTest';
                        break;
                    }elseif($permit['logs']==1){
                        return '/liveCall';
                        break;
                    }elseif($permit['console']==1){
                        return '/console';
                        break;
                    }elseif($permit['view_leads']==1){
                        return '/leadsSummary';
                        break;
                    }elseif($permit['sound_library']==1){
                        return '/sound';
                        break;
                    }elseif($permit['view_reports']==1){
                        return '/callsReport';
                        break;
                    }elseif($permit['make_payments']==1){
                        return '/trustHub';
                        break;
                    }elseif($permit['alerts']==1){
                        return '/trustHub';
                        break;
                    }elseif($permit['api']==1){
                        return '/trustHub';
                        break;
                    }else{
                        return '/trustHub';
                        break;
                    }
                    default:
                    // return 'login';
                    break;
                    // dd('error');
            }
           
        }else{
            Session::put('error', 'Your account is Inactive. ');
            Auth::logout();
        }
    }
}
