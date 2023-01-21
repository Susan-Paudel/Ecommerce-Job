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
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->unsigned(); 
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('product_size_id')->unsigned(); 
            $table->foreign('product_size_id')->references('id')->on('product_sizes');
            $table->unsignedBigInteger('product_color_id')->unsigned(); 
            $table->foreign('product_color_id')->references('id')->on('product_colors');
            $table->string('product_img');
            $table->float('markprice');
            $table->float('price');
            $table->integer('quantity')->default(1);
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
        Schema::dropIfExists('product_attributes');
    }
};
