<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //

        public function checkout()
    {   
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_MbzMje71BINMtnmQwVlfvEdw00JlVrsgGv');
        		
		$amount = 10;
		$amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'usd',
			'description' => 'Payment From Sahidia',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('checkout.credit-card',compact('intent'));

    }

    public function afterPayment()
    {
        echo 'Payment Has been Received';
    }
}
