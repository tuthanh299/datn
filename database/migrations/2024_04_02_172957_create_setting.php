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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('phone');
            $table->string('email');
            $table->string('zalo');
            $table->string('address');
            $table->string('fanpage');
            $table->string('website');
            $table->string('link_map');
            $table->string('iframe_map');
            $table->string('logo_path');
            $table->string('logo_name');
            $table->string('favicon_path');
            $table->string('favicon_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
