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
            $table->string('slug')->unique();
            $table->unsignedBigInteger('product_category_id');
            $table->unsignedBigInteger('product_type_id');
            // $table->unsignedBigInteger('Alignment_id');
            $table->string('product_name');
            $table->longText('short_info')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('price', 10, 2)->default(0.00);
            $table->integer('offer')->nullable();
            $table->string('created_by')->nullable();
            // $table->string('net_weight')->nullable();
            $table->integer('stock')->nullable();
            $table->string('image')->nullable();
            $table->string('view_count')->nullable();

            // $table->string('multiple_image')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('cascade');
            // $table->foreign('Alignment_id')->references('id')->on('Alignments')->onDelete('cascade');

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
