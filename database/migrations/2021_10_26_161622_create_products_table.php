<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id')->from(10001);
            $table->string('token_number');
            $table->string('product_name');
            $table->string('product_image_thumbnail');
            $table->string('product_image_1');
            $table->string('product_image_2')->nullable();
            $table->string('product_image_3')->nullable();
            $table->string('product_image_4')->nullable();
            $table->string('product_image_5')->nullable();
            $table->string('product_image_6')->nullable();
            $table->text('product_description');
            $table->string('product_parent_category');
            $table->string('product_sub_category');
            $table->text('product_attributes')->nullable();
            $table->text('product_variant')->nullable();
            $table->text('product_size')->nullable();
            $table->string('product_price');
            $table->string('product_price_discounted')->nullable();
            $table->string('product_offer_type')->nullable();
            $table->string('product_group_type')->nullable();
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
        Schema::dropIfExists('products');
    }
}
