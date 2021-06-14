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
            $table->unsignedBigInteger('user_id');
            $table->text('address');
            $table->unsignedBigInteger('merchant_id');
            $table->enum('status', ['Pesanan dilanjutkan ke penjual', 'Sedang diproses', 'Sedang dikirim', 'Selesai'])->nullable();
            $table->boolean('in_cart')->default(1);
            $table->unsignedBigInteger('payment_method');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('merchant_id')->references('id')->on('merchants');
            $table->foreign('payment_method')->references('id')->on('payments');
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
