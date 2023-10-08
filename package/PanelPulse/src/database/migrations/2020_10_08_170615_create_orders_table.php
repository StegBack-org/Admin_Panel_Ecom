<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('custom_order_id');
            $table->integer('customer_id')->nullable();
            $table->string('cust_email');
            $table->decimal('subtotal', 8, 2);
            $table->string('discount_code');
            $table->string('discount_type');
            $table->integer('discount_value');
            $table->decimal('discount', 8, 2);
            $table->string('shipping_name');
            $table->integer('shipping_cost');
            $table->integer('bank_rebate');
            $table->decimal('tax', 8, 2);
            $table->decimal('tax_amount', 8, 2);
            $table->decimal('total_amount', 8, 2);
            $table->string('payment_mode');
            $table->string('payment_status');

            $table->string('order_status');

            $table->string('shipping_tracking_number')->nullable();
            $table->string('shipping_tracking_link')->nullable();
            $table->string('return_carrier')->nullable();
            $table->string('return_tracking_number')->nullable();
            $table->longText('order_full_response')->nullable();

            $table->string('event_trigger');
            $table->timestamps();
        });

        DB::update('ALTER TABLE orders AUTO_INCREMENT = 1001');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
