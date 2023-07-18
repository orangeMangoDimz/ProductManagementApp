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
            // $table->foreignUlid('user_id');
            $table->string('cover');
            $table->string('title');
            $table->foreignId('product_category_id');
            $table->longText('description');
            $table->string('stock');
            $table->string('price');
            $table->softDeletes();

            // $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_category_id')->references('id')->on('product_categories');
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
