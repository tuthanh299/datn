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
        Schema::create('detail_import_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('import_invoice_id')->constrained();
            //$table->bigInteger('detail_import_id')->unique();
            $table->foreignId('product_id')->constrained();
            $table->integer('quantity');
            $table->integer('price');
            $table->timestamps();
            $table->softDeletes();

            //$table->foreign('detail_import_id')->references('id')->on('import_invoice');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_import_invoice');
    }
};
