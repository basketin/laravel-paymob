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
        Schema::create('basketin_paymob_methods', function (Blueprint $table) {
            $table->id();
            $table->string('payment_method');
            $table->text('api_key');
            $table->string('integration_id');
            $table->string('iframe_id');
            $table->timestamps();
        });

        Schema::create('basketin_paymob_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('merchant_order_reference');
            $table->integer('paymob_order_id');
            $table->string('payment_method');
            $table->decimal('amount', 8, 2);
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
        Schema::dropIfExists('basketin_paymob_methods');
        Schema::dropIfExists('basketin_paymob_transactions');
    }
};
