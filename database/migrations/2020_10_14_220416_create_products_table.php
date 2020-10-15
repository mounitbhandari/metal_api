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
            $table->string('product_code',20)->nullable(false)->unique();
            $table->string('product_name',100)->nullable(false)->unique();

            $table->bigInteger('product_category_id')->unsigned();
            $table ->foreign('product_category_id')->references('id')->on('product_categories');


            $table->tinyInteger('inforce')->default('1');

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
}
