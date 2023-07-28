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
        Schema::create('trip_sheets', function (Blueprint $table) {
            $table->id();
            $table->integer('trip_id');
            $table->integer('trip_sheet_id')->unique();
            $table->string('super_name');
            $table->string('super_mobile');
            $table->string('driver_name');
            $table->string('reg_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_sheets');
    }
};
