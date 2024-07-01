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
            $table->string('name');
            $table->text('address');
            $table->string('phone');
            $table->integer('qty');
            $table->bigInteger('total_price');
            $table->enum('status', ['Unpaid', 'Paid']);
            // $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            // $table->integer('price');
            // $table->string('payment');
            // $table->enum('status', ['pending', 'success'])->default('pending');
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
