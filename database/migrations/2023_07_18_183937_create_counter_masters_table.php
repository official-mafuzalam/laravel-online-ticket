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
        Schema::create('counter_masters', function (Blueprint $table) {
            $table->id();
            $table->string('coun_name');
            $table->integer('coun_id');
            $table->integer('main_route');
            $table->integer('user_type');
            $table->integer('user_id');
            $table->string('user_name');
            $table->string('user_mobile');
            $table->string('password');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counter_masters');
    }
};
