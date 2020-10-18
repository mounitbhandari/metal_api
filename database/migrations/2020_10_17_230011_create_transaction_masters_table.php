<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_masters', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_number',20)->nullable(true);
            $table->date('transaction_date')->nullable(false);

            $table->bigInteger('voucher_id')->unsigned();
            $table ->foreign('voucher_id')->references('id')->on('vouchers');

            $table->bigInteger('purchase_master_id')->unsigned();
            $table ->foreign('purchase_master_id')->references('id')->on('purchase_masters');

            $table->bigInteger('sale_master_id')->unsigned();
            $table ->foreign('sale_master_id')->references('id')->on('sale_masters');

            $table->bigInteger('user_id')->unsigned();
            $table ->foreign('user_id')->references('id')->on('users');



            $table->tinyInteger('inforce')->default(1);
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
        Schema::dropIfExists('transaction_masters');
    }
}
