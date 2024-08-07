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
        Schema::create('product_galleries', function (Blueprint $table) {
            $table->id();
            //$table->integer('product_id');
            $table->string('photo_path')->nullable();
            $table->string('photo_name');
            $table->timestamps();
            $table->softDeletes();

            //$table->foreign('product_id')->references('id')->on('categories')->onDelete('restrict')->onUpdate('restrict');

            $table->foreignId('product_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_galleries');
    }
};
