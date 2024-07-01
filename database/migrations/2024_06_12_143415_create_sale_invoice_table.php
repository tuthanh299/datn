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
        Schema::create('sale_invoices', function (Blueprint $table) {
            $table->id();
            //$table->bigInteger('staff_id');
            //$table->bigInteger('customer_id');
            $table->string('fullname');
            $table->string('phone');
            $table->string('address');
            $table->string('note');
            $table->integer('total_price');
            $table->integer('paid_status');
            $table->integer('shipping_status');
            //$table->boolean('status');
            $table->timestamps();

            //$table->foreign('staff_id')->references('id')->on('user');
            //$table->foreign('customer_id')->references('id')->on('member');

            $table->foreignId('user_id')->constrained();
            $table->foreignId('member_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_invoice');
    }
};
