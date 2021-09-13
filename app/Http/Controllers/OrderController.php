<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$orders = Order::get();

		return view('orders.index',compact('orders'));

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
    public function store(Request $request)
    {
    	$request->validate([
			'quantity' => 'required',
			'recipient' => 'required',
			'address_line_1' => 'required',
			'address_line_2' => 'required',
			'admin_area_2' => 'required',
			'admin_area_1' => 'required',
			'postal_code' => 'required',
			'country_code' => 'required',
		]);

		$data = Order::create([
			'quantity' => $request->quantity,
			'recipient' => $request->recipient,
			'address_line_1' => $request->address_line_1,
			'address_line_2' => $request->address_line_2,
			'admin_area_2' => $request->admin_area_2,
			'admin_area_1' => $request->admin_area_1,
			'postal_code' => $request->postal_code,
			'country_code' => $request->country_code,
			'price' => 190,
		]);

		return redirect()->route('orders.show', $data->id);
	}

    public function show(Order $order)
    {
    	return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
