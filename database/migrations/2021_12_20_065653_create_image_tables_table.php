<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_tables', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('image_id')->unsigned()->nullable();
            $table->foreign('image_id')->references('id')->on('galleries')->onDelete('cascade');
            $table->integer('use_id')->unsigned();
            $table->bigInteger('seller_id')->default('0');
            $table->string('use_type');
            $table->string('url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_tables');
    }
}
