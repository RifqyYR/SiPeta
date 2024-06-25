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
        Schema::create('onions', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->integer('height');
            $table->string('filename');
            $table->date('date_input');
            $table->time('time_input');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('onions');
    }
};
