<?php

namespace App\Http\Controllers;

use App\Models\PhoneNumberList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\TwilioPricingController;
use App\Models\PhoneNumber;
use App\Models\Campaign;
use App\Models\LogMessage;
use App\Models\Test;
use Twilio\Rest\Client;
use DB;

class PhoneNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['phoneNumberLists'] = PhoneNumberList::where('is_del', 0)->get();
        $data['phoneNumbers'] = PhoneNumber::with('phoneNumberList')->orderBy('id', 'DESC')->get();
        return view('admin.phone_number.phoneNumber', $data);
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
    public function checkAvailablePhoneNumbers(Request $request)
    {
        $buyNumberPhoneList = $request->buyNumberPhoneList;
        $buyNumberPhoneListNew = $request->buyNumberPhoneListNew;
        $buyNumberPurchaseType = $request->buyNumberPurchaseType;
        $buyNumberCodePerState = $request->buyNumberCodePerState;
        $buyNumberCodeSearch = $request->buyNumberCodeSearch;
        $buyNumberCodeList = $request->buyNumberCodeList;
        $buyNumberTollFree = $request->buyNumberTollFree;
        $buyNumberTollFreeList = $request->buyNumberTollFreeList;
        $listId = $buyNumberPhoneList;
        if ($buyNumberPhoneListNew) {
            $checkName = PhoneNumberList::where('name', $buyNumberPhoneListNew)->first();
            if ($checkName) {
                return response()->json(['error' => 'This name is already available.']);
            }
            $phoneNumberList = PhoneNumberList::create([
                'name' => $buyNumberPhoneListNew,
                'user_id' => auth()->user()->id,
            ]);
            $listId = $phoneNumberList->id;
        }
        // twilio SDK credentials
        $sid = env("TWILIO_ACCOUNT_SID");
        $token = env("TWILIO_AUTH_TOKEN");
        $twilio = new Client($sid, $token);

        if ($buyNumberPurchaseType == 'state') {
            // twilio code here
        } else if ($buyNumberPurchaseType == 'areaCode') {
            $twilioNumbers = $twilio->availablePhoneNumbers("US")->local->read(["areaCode" => $buyNumberCodeList], $buyNumberCodeSearch);
        } else {
            $twilioNumbers = $twilio->availablePhoneNumbers("US")
                ->tollFree
                ->read(["contains" => $buyNumberTollFreeList], $buyNumberTollFree);
        }
        // dd($twilioNumbers);
        $availableNumbers = '';
        foreach ($twilioNumbers as $twilioNumber) {
            if ($twilioNumber->capabilities['voice']) {
                $voice = '<i class="ni ni-check-bold"></i>';
            } else {
                $voice = ' <i class="ni ni-fat-remove"></i>';
            }
            if ($twilioNumber->capabilities['SMS']) {
                $sms = '<i class="ni ni-check-bold"></i>';
            } else {
                $sms = ' <i class="ni ni-fat-remove"></i>';
            }
            if ($twilioNumber->capabilities['MMS']) {
                $mms = '<i class="ni ni-check-bold"></i>';
            } else {
                $mms = ' <i class="ni ni-fat-remove"></i>';
            }
            $availableNumbers .= '<tr><th>
                <input class="availableNumberCheck" name="availableNumberCheck[]" value="' . $twilioNumber->phoneNumber . '"  data-state="' . $twilioNumber->region . '" type="checkbox">
              
        </th><td class="table-user">
        <b>' . $twilioNumber->phoneNumber . '</b>
    </td><td class="table-user">
    <b>' . $voice . '</b>
</td><td class="table-user">
<b>' . $sms . '</b>
</td><td class="table-user">
<b>' . $mms . '</b>
</td></tr>';
        }
        $availableNumbers .= '<input type="hidden" name="selectedPhoneNumberListId" id="selectedPhoneNumberListId" value="' . $listId . '" />';
        return response()->json(['availableNumbers' => $availableNumbers]);
    }
    public function store(Request $request)
    {
        // $selectedNumbers = json_decode($request->selectedNumbers);
        // $states = json_decode($request->states);
        // $phoneNumberListId = json_decode($request->selectedPhoneNumberListId);

        // // for number buy use twilio SDK
        // $sid = env("TWILIO_ACCOUNT_SID");
        // $token = env("TWILIO_AUTH_TOKEN");
        // $twilio = new Client($sid, $token);
        // $key = 0;
        // foreach ($selectedNumbers as $selectedNumber) {
        //     if ($selectedNumber != 'on') {
        //         // $incomingPhoneNumber =  $twilio->incomingPhoneNumbers
        //         //     ->create(
        //         //         [
        //         //             "phoneNumber" => $selectedNumber,
        //         //         ]
        //         //     );
        //         $incomingPhoneNumber = 'true';

        //         if ($incomingPhoneNumber) {
        //             $create  = PhoneNumber::create([
        //                 'phone_number_list_id' => $phoneNumberListId,
        //                 // 'phone_number' => $incomingPhoneNumber->phoneNumber,
        //                 'phone_number' => $selectedNumber,
        //                 // 'friendly_name' => $incomingPhoneNumber->friendlyName,
        //                 'friendly_name' => '(201)7864754',
        //                 // 'number_sid' => $incomingPhoneNumber->sid,
        //                 'number_sid' => 'sadhsjadhasjdy7e4wry34fwef',
        //                 'state' => $states[$key],
        //                 // 'active' => $incomingPhoneNumber->status,
        //                 'active' => 'in-use',
        //             ]);
        //         }
        //         $key++;
        //     }
        // }
        // if ($incomingPhoneNumber) {
        //     return response()->json(['success' => 'Numbers is purchased.']);
        // } else {
        //     return response()->json(['error' => 'Something went wrong']);
        // }
        
         $selectedNumbers = json_decode($request->selectedNumbers);
        $states = json_decode($request->states);
        $phoneNumberListId = json_decode($request->selectedPhoneNumberListId);
       
        // for number buy use twilio SDK
        $sid = env("TWILIO_ACCOUNT_SID");
        $token = env("TWILIO_AUTH_TOKEN");
        $twilio = new Client($sid, $token);
        $key = 0;
        if(count($selectedNumbers)!=0){
        foreach ($selectedNumbers as $selectedNumber) {
            // if ($selectedNumber != 'on') {
                // dd($selectedNumber);
                $incomingPhoneNumber =  $twilio->incomingPhoneNumbers
                    ->create(
                        [
                            "phoneNumber" => $selectedNumber,
                            "SmsUrl" =>  'https://e901-144-48-132-143.in.ngrok.io/sms-url',
                            "VoiceUrl"=> 'https://e901-144-48-132-143.in.ngrok.io/voice-url',
                        ]
                    );
                // $incomingPhoneNumber = 'true';
                    
               if ($incomingPhoneNumber) {
                   $s=$states[$key];
                    $create  = PhoneNumber::create([
                        'phone_number_list_id' => $phoneNumberListId,
                        'phone_number' => $incomingPhoneNumber->phoneNumber,
                        // 'phone_number' => $selectedNumber,
                        'friendly_name' => $incomingPhoneNumber->friendlyName,
                        // 'friendly_name' => '(201)7864754',
                        'number_sid' => $incomingPhoneNumber->sid,
                        // 'number_sid' => 'sadhsjadhasjdy7e4wry34fwef',
                        'state' => $s,
                        'active' => $incomingPhoneNumber->status,
                        // 'active' => 'in-use',
                    ]);
                }
                $key++;
            // }
        }
        if ($incomingPhoneNumber) {
            return response()->json(['success' => 'Numbers is purchased.']);
        } else {
            return response()->json(['error' => 'Something went wrong']);
        }
    }else{
        return response()->json(['error' => 'Select atleast one number']);
    }
    }


    public function sms_hook(Request $request)
    {  
        $keyword = $request->Body;
        $campaign_id = Campaign::where('keyword',$keyword)->select('id')->first();
        if($campaign_id->id){
            $to = $request->To;
            $from = $request->From;
            $log = LogMessage::Create([
                'campaign_id' => $campaign_id->id,
                'keyword' => $keyword,
                'to' => $to,
                'from' => $from,
            ]);
        }
    }
    public function voice_hook(Request $request)
    {
        $data = $request->all();
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
        if ($request->edit_list == 2) {
            echo 'update';
            $data = PhoneNumber::find($id);
            echo '<pre>';
            print_r($data);
            $data->list_title = $request->list_name_edit;
            $data->save();
        }
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
    public function deleteNumber(Request $request)
    {
        $id = $request->del_number;
        $delete = PhoneNumber::where('id', $id)->delete();
        $list = PhoneNumberList::where('list_id', $id)->delete();
        if ($delete) {
            $notification = array(
                'type' => 'success',
                'message' => 'Number List is Deleted',
            );
        } else {
            $notification = array(
                'type' => 'error',
                'message' => 'Number List is not Deleted',
            );
        }
        return redirect()->back()->with($notification);
    }
    public function editNumberTitle(Request $request)
    {
        $id = $request->edit_list_id;
        $updated_name = $request->list_name_edit;
        $update = PhoneNumber::where('id', $id)->update([
            'list_title' => $updated_name,
        ]);
        PhoneNumberList::where('list_id', $id)->update([
            'list_title' => $updated_name,
        ]);
        if ($update) {
            $notification = array(
                'type' => 'success',
                'message' => 'List Name is Updated',
            );
        } else {
            $notification = array(
                'type' => 'error',
                'message' => 'List Name is not Updated',
            );
        }
        return redirect()->back()->with($notification);
    }
    public function updatePhoneNumberList(Request $request)
    {

        $selectedCheckIds = json_decode($request->selectedCheckId);
        $phoneNumberListId = $request->movePhoneNumberList;

        foreach ($selectedCheckIds as $selectedCheckId) {
            if ($selectedCheckId != 'on') {
                $update = PhoneNumber::where('id', $selectedCheckId)->update([
                    'phone_number_list_id' => $phoneNumberListId,
                ]);
            }
        }
        if ($update) {
            return response()->json(['success' => 'Phone Number List is updated']);
        } else {
            return response()->json(['error' => 'Something went wrong']);
        }
    }
    public function updatePhoneNumberFlag(Request $request)
    {
        $ids = json_decode($request->phoneNumberIds);
        $status = $request->status;
        if ($status == 'flagged') {
            foreach ($ids as $id) {
                $update = PhoneNumber::where('id', $id)->update([
                    'flag' => 1,
                ]);
            }
            if ($update) {
                return response()->json(['success' => 'Phone Number is flagged. ']);
            } else {
                return response()->json(['error' => 'Something went wrong!']);
            }
        } else if ($status == 'unflagged') {
            foreach ($ids as $id) {
                $update = PhoneNumber::where('id', $id)->update([
                    'flag' => 0,
                ]);
            }
            if ($update) {
                return response()->json(['success' => 'Phone Number is Unflagged. ']);
            } else {
                return response()->json(['error' => 'Something went wrong!']);
            }
        } else {
            foreach ($ids as $id) {
                $update = PhoneNumber::where('id', $id)->update([
                    'active' => 'cancelled',
                ]);
            }
            if ($update) {
                return response()->json(['success' => 'Phone Number is Cancelled. ']);
            } else {
                return response()->json(['error' => 'Something went wrong!']);
            }
        }
    }
}
