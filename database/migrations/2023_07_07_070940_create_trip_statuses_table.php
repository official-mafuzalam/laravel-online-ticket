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
            $table->string('date');
            $table->string('time');
            $table->string('route');
            $table->string('stations');
            $table->integer('status')->default(1);

            $table->integer('A1')->default(0);
            $table->integer('A2')->default(0);
            $table->integer('A3')->default(0);
            $table->integer('A4')->default(0);

            $table->integer('B1')->default(0);
            $table->integer('B2')->default(0);
            $table->integer('B3')->default(0);
            $table->integer('B4')->default(0);

            $table->integer('C1')->default(0);
            $table->integer('C2')->default(0);
            $table->integer('C3')->default(0);
            $table->integer('C4')->default(0);

            $table->integer('D1')->default(0);
            $table->integer('D2')->default(0);
            $table->integer('D3')->default(0);
            $table->integer('D4')->default(0);

            $table->integer('E1')->default(0);
            $table->integer('E2')->default(0);
            $table->integer('E3')->default(0);
            $table->integer('E4')->default(0);

            $table->integer('F1')->default(0);
            $table->integer('F2')->default(0);
            $table->integer('F3')->default(0);
            $table->integer('F4')->default(0);

            $table->integer('G1')->default(0);
            $table->integer('G2')->default(0);
            $table->integer('G3')->default(0);
            $table->integer('G4')->default(0);

            $table->integer('H1')->default(0);
            $table->integer('H2')->default(0);
            $table->integer('H3')->default(0);
            $table->integer('H4')->default(0);

            $table->integer('I1')->default(0);
            $table->integer('I2')->default(0);
            $table->integer('I3')->default(0);
            $table->integer('I4')->default(0);

            $table->integer('J1')->default(0);
            $table->integer('J2')->default(0);
            $table->integer('J3')->default(0);
            $table->integer('J4')->default(0);
            $table->integer('J5')->default(0);

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