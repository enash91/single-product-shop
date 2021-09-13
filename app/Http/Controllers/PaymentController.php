<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

	/**
	 * Test Account
	 *
	 * Email ID:
	sb-dszr67618060@personal.example.com
	System Generated Password:
	L6^12v@U
	 */

	public function index()
    {
		$payments = Payment::get();

		return view('payments.index',compact('payments'));
	}

    public function checkout($id)
    {
    	$order = Order::where('id', $id)->first();

		\PayPal::setProvider();
		$paypal = \PayPal::getProvider();
		$paypal->setApiCredentials(config('paypal'));
		$paypal->setAccessToken($paypal->getAccessToken());

		$response = $paypal->createOrder([
			"intent"=> "CAPTURE",
			"purchase_units"=> [[
				"amount"=> [
					"currency_code"=> "USD",
					"value"=> $order->price * $order->quantity
				],
				"shipping" =>[
					"type" => "SHIPPING",
					"name" => [
						"full_name" => $order->recipient
					],
					"address" => [
						"address_line_1"=> $order->address_line_1,
						"address_line_2"=> $order->address_line_2,
						"admin_area_2"=> $order->admin_area_2,
						"admin_area_1"=> $order->admin_area_1,
						"postal_code"=> $order->postal_code,
						"country_code"=> strtoupper($order->country_code)
						]
				]
			]],
			"application_context" => [
				"shipping_preference" => "SET_PROVIDED_ADDRESS"
			]
		]);

		return response()->json($response, 200);
    }

    public function success(Request $request, $id){
		try {
			$order = Order::where('id', $id)->first();

			Payment::create([
				'order_id' => $id,
				'paypal_transaction_id' => $request->orderID,
				'amount' => $order->quantity * 190
			]);

			return response()->json(['success'=>true], 200);
		}catch(Exception $e){
			return response()->json(['sucess' => false, 'msg' => $e->getMessage()], 500);
		}
	}
	}
