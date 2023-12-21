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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category_id');
            $table->float('purchase_price', 8, 2);
            $table->float('regular_price', 8, 2);
            $table->float('discount_price', 8, 2)->nullable();
            $table->longText('short_description');
            $table->longText('long_description');
            $table->longText('additional_information');
            $table->string('thumbnail')->nullable();
            $table->string('variation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
