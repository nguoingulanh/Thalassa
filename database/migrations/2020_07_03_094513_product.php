<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sub_category')->unsigned()->nullable();
            $table->foreign('id_sub_category')->references('id')->on('category_product')->onUpdate('cascade')->onDelete('set null');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image');
            $table->longText('description');
            $table->longText('content');
            $table->string('price');
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
        //
        Schema::dropIfExists('product');
    }
}
