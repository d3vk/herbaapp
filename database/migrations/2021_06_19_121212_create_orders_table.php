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
            $table->id();
            $table->string('invoice');
            $table->unsignedBigInteger('user_id');
            $table->text('address');
            $table->unsignedBigInteger('merchant_id');
            $table->enum('status', ['Menunggu pembayaran','Pesanan dilanjutkan ke penjual', 'Sedang diproses', 'Sedang dikirim', 'Selesai'])->default('Menunggu pembayaran');
            $table->unsignedBigInteger('payment_method')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('merchant_id')->references('id')->on('merchants');
            $table->foreign('payment_method')->references('id')->on('merchant_payments');
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
