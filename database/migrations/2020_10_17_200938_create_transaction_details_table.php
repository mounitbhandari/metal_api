<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('transaction_master_id')->unsigned();
            $table->foreign('transaction_master_id')->reference('id')->on('transaction_details');

            $table->bigInteger('transaction_type_id')->unsigned();
            $table->foreign('transaction_type_id')->reference('id')->on('transaction_types');

            $table->bigInteger('ledger_id')->unsigned();
            $table->foreign('ledger_id')->reference('id')->on('ledgers');

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
        Schema::dropIfExists('transaction_details');
    }
}
