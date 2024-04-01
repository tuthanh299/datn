<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('authors', function (Blueprint $table) {
        $table->string('photo_name')->nullable();
        $table->string('photo_path')->nullable();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('authors', function (Blueprint $table) {
            $table->dropColumn('photo_name');
            $table->dropColumn('photo_path');
        });
    }
    
};
