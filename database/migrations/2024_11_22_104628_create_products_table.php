<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->unsignedBigInteger('category_id'); // Foreign key for categories table
            $table->string('title'); // Product title
            $table->string('url')->unique(); // Unique URL for the product
            $table->decimal('price', 10, 2); // Regular price of the product
            $table->decimal('sale_price', 10, 2)->nullable(); // Sale price of the product (optional)
            $table->text('article')->nullable(); // Product description or article
            $table->string('image')->nullable(); // Product image filename (optional)
            $table->timestamps(); // Created_at and Updated_at columns

            // Foreign key constraint
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
