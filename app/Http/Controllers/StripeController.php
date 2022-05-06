<?php

namespace App\Http\Controllers;
use App\Models\Subscription;
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
      'success_url' => 'https://example.com/success.html?session_id={CHECKOUT_SESSION_ID}',
      'cancel_url' => 'https://example.com/canceled.html',
      'mode' => 'subscription',
      'line_items' => [[
        'price' => $priceId1,
        // For metered billing, do not pass quantity
        'quantity' => 1,
      ]],
    ]);
    dd($res);
  }
}
