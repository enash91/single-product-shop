<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

	protected $fillable = [
		'order_id',
		'paypal_transaction_id',
		'amount',
	];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}
}
