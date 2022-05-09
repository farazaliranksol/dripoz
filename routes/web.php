<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoundController;
use App\Http\Controllers\AIController;
use App\Http\Controllers\AiTriggerController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\CallsReportController;
use App\Http\Controllers\DailyReportController;
use App\Http\Controllers\SmsReportController;
use App\Http\Controllers\SentimentReportController;
use App\Http\Controllers\AdvancedIVRReportController;
use App\Http\Controllers\LeadsReportController;
use App\Http\Controllers\ROIReportController;
use App\Http\Controllers\SpeedReportController;
use App\Http\Controllers\LiveCallController;
use App\Http\Controllers\CDRController;
use App\Http\Controllers\ScheduleLogsController;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\ABTestController;
use App\Http\Controllers\UploadConversationController;
use App\Http\Controllers\DailyUsageController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\RecurringItemController;
use App\Http\Controllers\TrustHubController;
use App\Http\Controllers\PhoneNumberListController;
use App\Http\Controllers\PhoneNumberController;
use App\Http\Controllers\SchedulingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientManagementController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\ClientUserPermissionController;
use App\Http\Controllers\NewCampaignController;
use App\Http\Controllers\LeadsSummaryController;
use App\Http\Controllers\UploadLeadsController;
use App\Http\Controllers\DNCController;
use App\Http\Controllers\LeadExplorerController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\StripeController;
use App\Models\ClientUserPermission;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//strip routes
Route::get('paynow/{id}/{sub_id}', [StripeController::class, 'stripe']);
// Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');
Route::get('payment-succeeded',[StripeController::class, 'payment_succeeded']);
Route::get('payment-rejected',[StripeController::class, 'payment_rejected']);

Route::get('/', function () {
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
    }else{
    return view('auth.login');
    }
});
Route::any('sms-url', [PhoneNumberController::class, 'sms_hook']);
Route::any('voice-url', [PhoneNumberController::class, 'voice_hook']);
Route::get('manage-users', [UserController::class, 'manage_users']);
Route::get('account-setting', [UserController::class, 'account_setting']);
Auth::routes();

Route::group(['middleware' => ['auth','superAdmin']], function () {
    // Dashboard
    Route::get('dashboard', [AdminController::class, 'dashboard']);
    // client management
    Route::resource('client-management', ClientManagementController::class);
    Route::get('client-management-store', [ClientManagementController::class, 'client_management_store']);
    Route::get('edit-client-management/{id}', [ClientManagementController::class, 'edit_client_management']);
    Route::get('deactivate-client-management/{id}', [ClientManagementController::class, 'deactivate_client_management']);
    // users
    Route::resource('users', UserController::class);
    Route::get('user-login/{id}', [UserController::class, 'user_login']);
    // client user permission
    Route::resource('client-user-permission', ClientUserPermissionController::class);
    Route::get('user-store', [ClientUserPermissionController::class, 'user_store']);
    Route::get('edit-client-user/{id}', [ClientUserPermissionController::class, 'edit_client_user']);
    // Subscription
    Route::get('/add-subscriber', function () {return view('admin.subscriber.add_subscription');});
    Route::post('/subscriber-store', [SubscriptionController::class, 'store']);
    Route::get('/subscriptions', [SubscriptionController::class, 'show']);
    Route::get('/edit-subscription/{id}', [SubscriptionController::class, 'edit']);
    Route::post('/subscriber-update', [SubscriptionController::class, 'update']);
    Route::post('/delete-subscription', [SubscriptionController::class, 'destroy']);
});

Route::group(['middleware' => ['auth']], function () {
    // client user store
    Route::get('client-user-store', [UserController::class, 'client_user_store']);
    // deactivate the user
    Route::get('deactivate-user/{id}', [UserController::class, 'deactivate_user']);
    // activate the user
    Route::get('activate-user/{id}', [UserController::class, 'activate_user']);
    // user detail form
    Route::post('userDetailsForm', [UserController::class, 'userDetailsForm']);
    // user contact form
    Route::post('userContactForm', [UserController::class, 'userContactForm']);
    // console routes    
    Route::group(['middleware' => ['console']], function () {
        /*Console*/
        Route::resource('console', ConsoleController::class);
         Route::post('deleteCompaign', [ConsoleController::class,'deleteCompaign'])->name('deleteCompaign');
        /*New Campaign*/
        Route::resource('newCampaign', NewCampaignController::class);
        /*Scheduling*/
        Route::resource('scheduling', SchedulingController::class);
        // open schedule page
        Route::get('schedule/{id}', [SchedulingController::class, 'index'])->name('schedule');
        // del event
        Route::get('delEvent', [SchedulingController::class, 'delEvent'])->name('delEvent');
        /*inbound open hours scheduling store*/
        Route::post('inboundOpenHoursScheduleStore', [SchedulingController::class, 'inboundOpenHoursScheduleStore'])->name('inboundOpenHoursScheduleStore');
        /*inbound off hours scheduling store*/
        Route::post('inboundOffHoursScheduleStore', [SchedulingController::class, 'inboundOffHoursScheduleStore'])->name('inboundOffHoursScheduleStore');
        /*scheduled call store*/
        Route::post('scheduledCallStore', [SchedulingController::class, 'scheduledCallStore'])->name('scheduledCallStore');
        /*outboundLiveCallBasicStore*/
        Route::get('outboundLiveCallStore', [SchedulingController::class, 'outboundLiveCallStore'])->name('outboundLiveCallStore');
        // update all campaigns
        Route::post('updateAllCampaignsStatus', [ConsoleController::class, 'updateAllCampaignsStatus'])->name('updateAllCampaignsStatus');
        // pause single record
        Route::get('pauseSingleRecord', [ConsoleController::class, 'pauseSingleRecord'])->name('pauseSingleRecord');
        // Restore single record
        Route::post('restoreSingleRecord', [ConsoleController::class, 'restoreSingleRecord'])->name('restoreSingleRecord');
        // Get data table from ajax
        Route::get('consoleTable', [ConsoleController::class, 'consoleTable'])->name('consoleTable');
        Route::get('TableConsole', [ConsoleController::class, 'TableConsole'])->name('TableConsole');
        // // Edit schedule get events
        Route::get('getEvents', [SchedulingController::class, 'getEvents'])->name('getEvents');
        // get inbound open hours record
        Route::get('getInboundOpenHoursRecord', [SchedulingController::class, 'getInboundOpenHoursRecord'])->name('getInboundOpenHoursRecord');
        //  inboundOpenHourCallBasicUpdate
        Route::get('inboundOpenHourCallBasicStore', [SchedulingController::class, 'inboundOpenHourCallBasicStore'])->name('inboundOpenHourCallBasicStore');
        // getInboundOffHoursSmsRecord
        Route::get('getInboundOffHoursSmsRecord', [SchedulingController::class, 'getInboundOffHoursSmsRecord'])->name('getInboundOffHoursSmsRecord');
        //  inboundOffHourSmsStore
        Route::get('inboundOffHourSmsStore', [SchedulingController::class, 'inboundOffHourSmsStore'])->name('inboundOffHourSmsStore');
        // get events schedule call 
        Route::get('getEventsScheduleCall', [SchedulingController::class, 'getEventsScheduleCall'])->name('getEventsScheduleCall');
        // del scheduled call email event 
        Route::get('delScheduledCallEmailEvent', [SchedulingController::class, 'delScheduledCallEmailEvent'])->name('delScheduledCallEmailEvent');
        // edit scheduled call email event 
        Route::get('editScheduledCallEmailEvent', [SchedulingController::class, 'editScheduledCallEmailEvent'])->name('editScheduledCallEmailEvent');
        // update scheduled call email event 
        Route::get('scheduledCallEventEmailStore', [SchedulingController::class, 'scheduledCallEventEmailStore'])->name('scheduledCallEventEmailStore');
        // inbound off hours call basic store
        Route::get('inboundOffHoursCallBasicStore', [SchedulingController::class, 'inboundOffHoursCallBasicStore'])->name('inboundOffHoursCallBasicStore');
        // scheduled call basic store
        Route::get('scheduledCallBasicStore', [SchedulingController::class, 'scheduledCallBasicStore'])->name('scheduledCallBasicStore');
        // scheduledSmsStore 
        Route::get('scheduledSmsStore', [SchedulingController::class, 'scheduledSmsStore'])->name('scheduledSmsStore');
        // get inbound off hours record
        Route::get('getInboundOffHoursRecord', [SchedulingController::class, 'getInboundOffHoursRecord'])->name('getInboundOffHoursRecord');
        // getScheduledCallBasicRecord
        Route::get('getScheduledCallBasicRecord', [SchedulingController::class, 'getScheduledCallBasicRecord'])->name('getScheduledCallBasicRecord');
        // getScheduledCallSmsRecord
        Route::get('getScheduledCallSmsRecord', [SchedulingController::class, 'getScheduledCallSmsRecord'])->name('getScheduledCallSmsRecord');
        // getScheduledCallSmsRecord
        Route::get('getScheduledCallEmailRecord', [SchedulingController::class, 'getScheduledCallEmailRecord'])->name('getScheduledCallEmailRecord');
        // getOutboundLiveEvents
        Route::get('getOutboundLiveEvents', [SchedulingController::class, 'getOutboundLiveEvents'])->name('getOutboundLiveEvents');
        // getDayEvents
        Route::get('getDayEvents', [SchedulingController::class, 'getDayEvents']);
        // dayEventStore
        Route::get('dayEventStore', [SchedulingController::class, 'dayEventStore']);
        // editOutboundLiveEvent
        Route::get('editOutboundLiveEvent', [SchedulingController::class, 'editOutboundLiveEvent'])->name('editOutboundLiveEvent');
        // delOutboundLiveEvent
        Route::get('delOutboundLiveEvent', [SchedulingController::class, 'delOutboundLiveEvent'])->name('delOutboundLiveEvent');
        // editOutboundLiveCallStore
        Route::get('editOutboundLiveCallStore', [SchedulingController::class, 'editOutboundLiveCallStore'])->name('editOutboundLiveCallStore');
        Route::get('editOutboundLiveSmsStore', [SchedulingController::class, 'editOutboundLiveSmsStore'])->name('editOutboundLiveSmsStore');
        Route::get('editOutboundLiveEmailStore', [SchedulingController::class, 'editOutboundLiveEmailStore'])->name('editOutboundLiveEmailStore');
        // edit day event
        Route::get('editDayEvent', [SchedulingController::class, 'editDayEvent']);
        // editDayEventStore
        Route::get('editDayEventStore', [SchedulingController::class, 'editDayEventStore']);
        // delDayEvent
        Route::get('delDayEvent', [SchedulingController::class, 'delDayEvent']);
    });

    // phone number routes    
    Route::group(['middleware' => ['phoneNumber']], function () {
        /*phone_number */
        Route::resource('phoneNumber', PhoneNumberController::class);
        Route::post('delete_number', [PhoneNumberController::class, 'deleteNumber']);
        Route::post('edit_list', [PhoneNumberController::class, 'editNumberTitle']);

        // phone number list add
        Route::get('phoneNumberListCreate', [PhoneNumberListController::class, 'store']);

        // phone number list edit
        Route::get('phoneNumberListEdit', [PhoneNumberListController::class, 'update']);

        // phone number list del
        Route::get('phoneNumberListDel', [PhoneNumberListController::class, 'destroy']);
        // phone number list Flag
        Route::get('phoneNumberListFlag', [PhoneNumberListController::class, 'flag']);
        //check available phone Numbers
        Route::get('checkAvailablePhoneNumbers', [PhoneNumberController::class, 'checkAvailablePhoneNumbers']);
        // buy selected phone numbers
        Route::get('buySelectedNumbers', [PhoneNumberController::class, 'store']);
        // updatePhoneNumberList
        Route::get('updatePhoneNumberList', [PhoneNumberController::class, 'updatePhoneNumberList']);
        // updatePhoneNumberFlag
        Route::get('updatePhoneNumberFlag', [PhoneNumberController::class, 'updatePhoneNumberFlag']);
    });


    // Leads routes    
    Route::group(['middleware' => ['lead']], function () {
        /*leads summary*/
        Route::resource('leadsSummary', LeadsSummaryController::class);
        /*upload leads*/
    });
    Route::group(['middleware' => ['lead_explorer']], function () {
        Route::resource('uploadLeads', UploadLeadsController::class);
        /*DNC*/
        Route::resource('dnc', DNCController::class);
        /*Leads Explorer*/
        Route::resource('leadsExplorer', LeadExplorerController::class);
        Route::get('export-file', [LeadExplorerController::class, 'exportFile'])->name('fileExport');
        Route::post('edit_file', [LeadExplorerController::class, 'updateStatus'])->name('edit_file');
        Route::get('check_click_trigger', [LeadExplorerController::class, 'checkClickTrigger']);
        Route::get('delete_record', [LeadExplorerController::class, 'deleteRecord']);
   
    });

    // sound routes    
    Route::group(['middleware' => ['sound']], function () {
        /*sound routes*/
        Route::resource('sound', SoundController::class);
        Route::get('sound_delete/{id}', [App\Http\Controllers\SoundController::class, 'sound_delete']);
    });
    // AI routes    
    Route::group(['middleware' => ['ai']], function () {
        /*Ai Rules*/
        Route::resource('ai', AIController::class);
        Route::post('update_ai_rule', [AIController::class, 'update_ai_rule']);
        Route::post('del_ai_rule', [AIController::class, 'del_ai_rule']);
        /*Ai Triggers*/
        Route::resource('aiTrigger', AiTriggerController::class);
        Route::get('del_aiTrigger/{id}', [AiTriggerController::class, 'del_aiTrigger']);
        Route::get('editTrigger', [AiTriggerController::class, 'editTrigger']);
        Route::get('checkTrigger', [AiTriggerController::class, 'checkTrigger']);

        /*File import / export excel*/
        Route::post('file-import', [AiTriggerController::class, 'fileImport'])->name('file-import');
        Route::get('file-export', [AiTriggerController::class, 'fileExport'])->name('file-export');
    });

    Route::group(['middleware' => ['inbox']], function () {
        /*Inbox*/
        Route::resource('inbox', InboxController::class);
    });


    // Report routes    
    Route::group(['middleware' => ['report']], function () {
        /*Calls Report*/
        Route::resource('callsReport', CallsReportController::class);

        /*Daily Report*/
        Route::resource('dailyReport', DailyReportController::class);

        /*SMS Report*/
        Route::resource('smsReport', SmsReportController::class);

        /*Sentiment Report*/
        Route::resource('sentimentReport', SentimentReportController::class);

        /*Advanced IVR Report*/
        Route::resource('advancedIVRReport', AdvancedIVRReportController::class);

        /*Leads Report*/
        Route::resource('leadsReport', LeadsReportController::class);

        /*ROI Report*/
        Route::resource('roiReport', ROIReportController::class);

        /*Speed Report*/
        Route::resource('speedReport', SpeedReportController::class);
    });

    // Report routes    
    Route::group(['middleware' => ['log']], function () {
        /*Live Calls*/
        Route::resource('liveCall', LiveCallController::class);

        /*CDRs*/
        Route::resource('cdr', CDRController::class);

        /*Schedule*/
        Route::resource('scheduleLog', ScheduleLogsController::class);

        /*Webhooks*/
        Route::resource('webhook', WebhookController::class);
    });
    // Report routes    
    Route::group(['middleware' => ['tools']], function () {
        /*A/B Test*/
        Route::resource('abTest', ABTestController::class);
        /*Upload Conversation*/
        Route::resource('uploadConversation', UploadConversationController::class);
    });
    // Billing routes    
    Route::group(['middleware' => ['billing']], function () {
        /*Overview*/
        Route::resource('overview', OverviewController::class);

        /*Daily Usage*/
        Route::resource('dailyUsage', DailyUsageController::class);

        /*Invoice*/
        Route::resource('invoice', InvoiceController::class);

        /*Rate*/
        Route::resource('rate', RateController::class);

        /*Recurring Items*/
        Route::resource('recurringItem', RecurringItemController::class);
    });

    /*Trust Hub*/
    Route::resource('trustHub', TrustHubController::class);
});
