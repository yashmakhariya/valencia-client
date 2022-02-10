<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id')->from(10001);
            $table->string('token_number');

            $table->string('user_id');
            $table->text('product_id')->nullable();

            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('phone_alternate');

            $table->string('address_city');
            $table->string('address_state');
            $table->string('address_pincode');
            $table->string('address_street');

            $table->string('order_status')->nullable();
            $table->text('order_note')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('payment_method')->nullable();

            $table->string('shiprocket_order_id')->nullable();
            $table->string('shiprocket_shipment_id')->nullable();

            $table->string('gst')->nullable();
            $table->string('shipping')->nullable();
            $table->string('coupon')->nullable();
            $table->string('total');
            
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
        Schema::dropIfExists('orders');
    }
}
