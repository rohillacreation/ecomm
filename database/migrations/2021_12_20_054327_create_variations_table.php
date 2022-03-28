<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->float('price', 8, 2);
            $table->string('sku')->nullable();
            $table->integer('quantity');
            $table->bigInteger('product_id')->unsigned()->nullable();
            $table->bigInteger('seller_id')->default('0');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->bigInteger('image_id')->unsigned()->nullable();
            $table->foreign('image_id')->references('id')->on('galleries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variations');
    }
}
