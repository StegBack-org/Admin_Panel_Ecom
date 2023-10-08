<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orders_id');
            $table->string('product_category')->nullable();
            $table->string('product_subCategory')->nullable();
            $table->string('product_name');
            $table->string('product_url')->nullable();
            $table->string('product_price')->nullable();
            $table->string('sku');
            $table->integer('product_quantity');
            $table->string('product_isVariant')->default(1);
            $table->longText('product_attributes')->nullable();
            $table->timestamps();
            $table->foreign('orders_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_items');
    }
}
