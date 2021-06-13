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
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('merchant_id');
            $table->string('slug');
            $table->unsignedInteger('price');
            $table->enum('status', ['Tersedia', 'Kosong', 'Hampir habis']);
            $table->string('short_description');
            $table->text('description');
            $table->string('good_for');
            $table->string('how_to');
            $table->text('ingredients');
            $table->boolean('is_active')->default(1);
            $table->timestamps();

            $table->foreign('merchant_id')->references('id')->on('merchants');
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
