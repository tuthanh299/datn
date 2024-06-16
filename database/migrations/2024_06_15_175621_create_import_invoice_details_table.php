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
        Schema::create('import_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->integer('import_invoice_id');
            $table->integer('product_id');
            $table->double('import_price');
            $table->integer('quantity');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('import_invoice_details');

    }
};
