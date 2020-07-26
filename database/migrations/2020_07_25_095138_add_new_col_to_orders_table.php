<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('pickup_agent_id')->unsigned()->nullable();
            $table->integer('delivery_agent_id')->unsigned()->nullable();
            // $table->foreign('pickup_agent_id')->references('id')->on('agents')->nullable();
            // $table->foreign('delivery_agent_id')->references('id')->on('agents')->nullable();
            //$table->foreignID('cash_memo_id')->nullable();
            $table->date('collection_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
