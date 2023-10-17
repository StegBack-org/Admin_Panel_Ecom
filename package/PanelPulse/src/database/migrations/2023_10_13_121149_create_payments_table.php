<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Payments;
use Kartikey\PanelPulse\Models\Payment;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('country_id');
            $table->string('country');
            $table->string('state')->nullable();
            $table->string('payment_mode');
            $table->integer('min_order_value');
            $table->integer('max_order_value');
            $table->timestamps();
        });

        // Payment::firstOrCreate([
        //     'country_id' => '1',
        //     'country' => 'Spain',
        //     'payment_mode' => 'Online',
        //     'min_order_value' => 0,
        //     'max_order_value' => 0
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
