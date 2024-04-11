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
        Schema::create('growths', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->unsignedBigInteger('plant_id');
            $table->integer('height');
            $table->integer('sensor_value');
            $table->string('filename');
            $table->date('date_input');
            $table->time('time_input');
            $table->timestamps();

            $table->foreign('plant_id')->references('id')->on('plants');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('growths');
    }
};
