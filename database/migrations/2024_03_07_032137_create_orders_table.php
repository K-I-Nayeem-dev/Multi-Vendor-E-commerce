<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('orderId');
            $table->integer('userId');
            $table->string('name');
            $table->string('email');
            $table->string('company')->nullable();
            $table->integer('phone');
            $table->string('division');
            $table->string('district');
            $table->string('address');
            $table->string('notes')->nullable();
            $table->integer('vat')->nullable();
            $table->integer('coupon')->nullable();
            $table->integer('totalAmount');
            $table->integer('deliveryCharge');
            $table->string('payment_method');
            $table->integer('visited')->default(0);
            $table->string('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};