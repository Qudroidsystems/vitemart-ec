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
            $table->id(); // Unsigned BigInteger by default
            $table->string('genOrderId');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->decimal('total_amount', 10, 2);
            $table->string('status')->default('Pending');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
        });


        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('order_id'); // Reference to orders table
            $table->unsignedBigInteger('product_id'); // Reference to products table
            $table->integer('quantity'); // Quantity of the product
            $table->decimal('price', 10, 2); // Price per unit of the product
            $table->decimal('total', 10, 2); // Total price (quantity * price)
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });

        Schema::create('sales', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('product_id'); // Reference to products table
            $table->unsignedBigInteger('order_id')->nullable(); // Reference to orders table
            $table->unsignedBigInteger('user_id')->nullable(); // Reference to users table
            $table->integer('quantity'); // Quantity sold
            $table->decimal('price', 10, 2); // Sale price per unit
            $table->decimal('total', 10, 2); // Total price (quantity * price)
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_items');
    }
};
