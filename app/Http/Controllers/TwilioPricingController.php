<?php

namespace App\Http\Controllers;

use App\Models\PhoneNumber;
use Illuminate\Http\Request;
use Exception;
use Twilio\Rest\Client;

class TwilioPricingController extends Controller
{

    public function index()
    {
        /*echo 'in twilio controller in index';
        global $twilio;
        $incoming_phone_number = $this->twilio->incomingPhoneNumbers->create(["phoneNumber" => "+15017122661"]);

        print($incoming_phone_number->sid);
        die();*/
        $data = PhoneNumber::all();
        return view('phoneNumber',['data'=>$data]);
       // return view('phoneNumber');
    }

    public function store(Request $request)
    {
        echo 'in store twilio'.' '.$request->area_code.' '.$request->numberBuy;
        $sid = getenv("TWILIO_ACCOUNT_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio = new Client($sid, $token);
        $local = $twilio->availablePhoneNumbers("US")->local->read(["areaCode" => $request->area_code_list], $request->numberBuy); //
       /* $available_phone_number_country = $twilio->availablePhoneNumbers("US")->fetch();

        print($available_phone_number_country->countryCode);*/

        foreach ($local as $record) {
            print($record->phoneNumber);
        }
        die();
       // return redirect('phoneNumber',['local'=>$local]);
    }

    public function create()
    {

        //http://127.0.0.1:8000/phoneNumber?number_list=new&new_list_name=&buy_type=areacode&area_code=1&numberBuy=1&area_code=510&area_code=833
    }

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
