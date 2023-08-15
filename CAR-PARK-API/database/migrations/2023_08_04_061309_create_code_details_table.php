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
        Schema::create('code_details', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('User_id');
            $table->string('Parking_space');
            $table->string('Start_time');
            $table->string('End_time');
            $table->string('Status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('code_details');
    }
};
