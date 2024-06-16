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
        Schema::create('import_invoices', function (Blueprint $table) {
            $table->id();
            //$table->bigInteger('staff_id');
            $table->integer('import_invoice_total');
            //$table->boolean('status');
            $table->timestamps();

            $table->foreignId('user_id')->constrained();

            //$table->foreign('staff_id')->references('id')->on('categories')->onDelete('restrict')->onUpdate('restrict');
            //$table->foreignId('user_id')->constrained();

            //$table->foreign('staff_id')->references('id')->on('user')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('import_invoice');
    }
};
