<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignID('user_id')->constrained()->onDelete('cascade');
            $table->date('pick_up_date');
            $table->text('pick_up_address');
            $table->string('customer_name');
            $table->string('customer_mobile');
            $table->text('customer_address');
            $table->string('order_code');
            $table->string('product_des');
            $table->integer('quantity');
            $table->integer('amount');
            $table->string('pay_by');
            $table->date('delivery_date');
            $table->string('status');
            $table->string('bill_received');
            $table->string('bill_status');
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
        Schema::dropIfExists('orders');
    }
}
