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
            $table->integer('category_id');
            $table->mediumText('description');
            $table->mediumText('content');
            $table->string('product_photo_name')->nullable();
            $table->string('product_photo_path')->nullable();
            $table->double('regular_price');
            $table->double('sale_price');           
            $table->string('discount');
            $table->integer('publisher_id');
            $table->string('author');
            $table->string('code');
            $table->string('publishing_year');
            //$table->boolean('status')->default(false);
            $table->boolean('outstanding')->default(false);        
            $table->timestamps();
            $table->softDeletes();

            //$table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict')->onUpdate('restrict');
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
