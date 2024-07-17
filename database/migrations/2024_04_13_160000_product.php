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
            //$table->integer('category_id');
            $table->mediumText('description')->nullable();
            $table->mediumText('content')->nullable();
            $table->string('product_photo_name')->nullable();
            $table->string('product_photo_path')->nullable();
            $table->double('regular_price')->nullable();
            $table->double('sale_price')->nullable();           
            $table->integer('discount')->nullable(); 
            $table->string('author')->nullable();
            $table->string('code')->nullable();
            $table->string('publishing_year')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('outstanding')->default(false);        
            $table->timestamps();
            $table->softDeletes(); 

            // Thêm khóa ngoại với ràng buộc ON DELETE CASCADE
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('publisher_id')->constrained()->onDelete('cascade');
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
