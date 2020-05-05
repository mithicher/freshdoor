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
            $table->unsignedBigInteger('user_id')->index();
            $table->string('orderno')->unique();
            $table->string('address');
            $table->string('city');
            $table->string('pincode');
            $table->string('phone')->nullable();
            $table->decimal('amount', 8, 2);
            $table->decimal('discount_amount', 8, 2);
            $table->decimal('net_total', 8, 2);
            $table->string('status')->default('pending');
            $table->string('payment');
            $table->string('payment_id');
            $table->json('products');
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
