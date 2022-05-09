<?php

namespace App\Http\Controllers;
use App\Models\Subscription;
use App\Models\ClientManagement;
use App\Models\User;
use App\Mail\payment_rejected;
use Illuminate\Http\Request;

class StripeController extends Controller
{
  public function stripe($user_id,$subscription_id){
// dd($user_id,$subscription_id);
$priceId = Subscription::select('product_id')->where('id',$subscription_id)->first();
    $priceId1 = $priceId->product_id;
    // dd($priceId1);
    \Stripe\Stripe::setApiKey('sk_test_61cTTXgylXSKNRSwFtmGvBnj00TEoFXtnl');
    $res=$session = \Stripe\Checkout\Session::create([
      'client_reference_id'=>$user_id ,
      'success_url' => url('payment-succeeded').'?session_id={CHECKOUT_SESSION_ID}',
      'cancel_url' => url('payment-rejected'),
      'mode' => 'subscription',
      'line_items' => [[
        'price' => $priceId1,
        'quantity' => 1,
      ]],
    ]);
    // dd($res->id);
    $update=ClientManagement::where('customer_id',$user_id)->update(['session_id'=>$res->id]);
    return redirect($res->url);
    // dd($res);
  }
  public function payment_succeeded(Request $request){
    $response=$request->all();
    $update=ClientManagement::where('session_id',$response['session_id'])->update(['status'=>'Active']);
    // dd($response);
    return redirect(url('/login'));
  }
  public function payment_rejected(){
    $mail_user=ClientManagement::select('user_id')->where('session_id',$response['session_id'])->first();
    $user_mail=User::select('email')->where('id',$mail_user->user_id)->first();
    $content='';
    Mail::to($user_mail->email)->send(new payment_rejected($content));
  }
}
