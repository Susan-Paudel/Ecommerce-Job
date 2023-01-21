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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('Product_Name');
            $table->text('Product_Description');
            $table->enum('status',['0','1'])->default('0');
            $table->string('product_image')->nullable();
            $table->unsignedBigInteger('category_id')->unsigned(); 
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('views')->default(0);
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
        Schema::dropIfExists('products');
    }
};
