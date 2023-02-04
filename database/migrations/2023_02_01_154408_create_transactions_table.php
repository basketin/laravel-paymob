<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outmart_paymob_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('merchant_order_id');
            $table->integer('paymob_order_id');
            $table->string('payment_method');
            $table->double('amount', 8, 2);
            $table->enum('status', ['success', 'failed'])->nullable();
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
        Schema::dropIfExists('outmart_paymob_transactions');
    }
};
