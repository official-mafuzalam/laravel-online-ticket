<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trip_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('trip_id');
            $table->string('coach_no');
            $table->string('counters');
            $table->string('date');
            $table->string('time');
            $table->longText('route');
            $table->string('stations');
            $table->integer('status')->default(1);

            $table->string('A1')->default("0,Unsold");
            $table->string('A2')->default("0,Unsold");
            $table->string('A3')->default("0,Unsold");
            $table->string('A4')->default("0,Unsold");

            $table->string('B1')->default("0,Unsold");
            $table->string('B2')->default("0,Unsold");
            $table->string('B3')->default("0,Unsold");
            $table->string('B4')->default("0,Unsold");

            $table->string('C1')->default("0,Unsold");
            $table->string('C2')->default("0,Unsold");
            $table->string('C3')->default("0,Unsold");
            $table->string('C4')->default("0,Unsold");

            $table->string('D1')->default("0,Unsold");
            $table->string('D2')->default("0,Unsold");
            $table->string('D3')->default("0,Unsold");
            $table->string('D4')->default("0,Unsold");

            $table->string('E1')->default("0,Unsold");
            $table->string('E2')->default("0,Unsold");
            $table->string('E3')->default("0,Unsold");
            $table->string('E4')->default("0,Unsold");

            $table->string('F1')->default("0,Unsold");
            $table->string('F2')->default("0,Unsold");
            $table->string('F3')->default("0,Unsold");
            $table->string('F4')->default("0,Unsold");

            $table->string('G1')->default("0,Unsold");
            $table->string('G2')->default("0,Unsold");
            $table->string('G3')->default("0,Unsold");
            $table->string('G4')->default("0,Unsold");

            $table->string('H1')->default("0,Unsold");
            $table->string('H2')->default("0,Unsold");
            $table->string('H3')->default("0,Unsold");
            $table->string('H4')->default("0,Unsold");

            $table->string('I1')->default("0,Unsold");
            $table->string('I2')->default("0,Unsold");
            $table->string('I3')->default("0,Unsold");
            $table->string('I4')->default("0,Unsold");

            $table->string('J1')->default("0,Unsold");
            $table->string('J2')->default("0,Unsold");
            $table->string('J3')->default("0,Unsold");
            $table->string('J4')->default("0,Unsold");
            $table->string('J5')->default("0,Unsold");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_statuses');
    }
};