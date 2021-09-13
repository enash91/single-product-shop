<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
			$table->string('recipient', 100);
			$table->string('address_line_1', 100);
			$table->string('address_line_2', 100);
			$table->string('admin_area_2', 100);
			$table->string('admin_area_1',100);
			$table->string('postal_code',20);
			$table->char('country_code',2);
			$table->integer('quantity');
			$table->float('price');
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_tbl');
    }
}
