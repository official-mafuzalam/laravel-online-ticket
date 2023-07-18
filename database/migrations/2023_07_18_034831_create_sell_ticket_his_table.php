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
        Schema::create('sell_ticket_his', function (Blueprint $table) {
            $table->id();
            $table->integer('trip_id');
            $table->string('coach_no');
            $table->string('ticket_id');
            $table->string('route');
            $table->string('date');
            $table->string('time');
            $table->string('seat');
            $table->string('fare');
            $table->string('discount')->nullable()->default(0);
            $table->string('discount_fare_per_seat');
            $table->string('total_fare');
            $table->string('station');
            $table->string('mobile');
            $table->string('name');
            $table->string('gender');
            $table->string('seller_name');
            $table->string('seller_id');
            $table->string('seller_counter');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sell_ticket_his');
    }
};
