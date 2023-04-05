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
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->boolean('isStarted');
            $table->unsignedBigInteger('driver_id')->unsigned()->nullable();
            $table->unsignedBigInteger('address_id')->unsigned()->nullable();
            $table->enum('direction', ['toSchool', 'toHome']);
            $table->timestamps();

            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('set null');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rides');
    }
};
