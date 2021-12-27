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
            $table->unsignedBigInteger('customer_id');
            $table->dateTime('order_date');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->integer('status')->default(0); //0(pending), 1(delivered), 2(cancelled)
            $table->integer('is_moved')->default(0); //is moved to deliveries table after delivery? 0 false, 1 true
            $table->timestamps();
            
            $table->foreign('customer_id')->references('id')->on('users');
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
