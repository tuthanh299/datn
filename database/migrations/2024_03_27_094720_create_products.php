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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('name');
            $table->string('desc');
            $table->string('content');
            $table->string('slug');
            $table->string('photo');
            $table->string('photo2');
            $table->double('regular_price');
            $table->double('sale_price');
            $table->integer('discount');
            $table->string('publisher');
            $table->string('author');
            $table->string('code');
            $table->boolean('status');
            $table->boolean('outstanding');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
