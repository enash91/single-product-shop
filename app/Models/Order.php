<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

	protected $fillable = [
		'quantity',
		'recipient',
		'address_line_1',
		'address_line_2',
		'admin_area_2',
		'admin_area_1',
		'postal_code',
		'country_code',
		'price',
	];

	public function payment()
	{
		return $this->hasOne(Payment::class);
	}

	static function orderPayment(){
		return DB::table('orders')
			->leftJoin('payments', 'payments.order_id', '=', 'orders.id')
			->selectRaw('orders.*, payments.id as payment_id')
			->get();
	}

	static function getById($id){
		return DB::table('orders')
			->leftJoin('payments', 'payments.order_id', '=', 'orders.id')
			->selectRaw('orders.*, payments.id as payment_id')
			->where('id', $id)
			->get();
	}
}
