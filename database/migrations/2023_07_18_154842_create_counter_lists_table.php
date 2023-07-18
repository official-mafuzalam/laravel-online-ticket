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
        Schema::create('counter_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('counter_id');
            $table->integer('main_route');
            $table->string('coun_name');
            $table->string('coun_add');
            $table->integer('time_deff');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counter_lists');
    }
};
