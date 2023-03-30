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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('surname');
            $table->integer('class');
            $table->string('classname');
            $table->unsignedBigInteger('parent_id')->unsigned();
            $table->unsignedBigInteger('ride_id')->unsigned()->nullable();
            $table->timestamps();
            
            $table->foreign('parent_id')->references('id')->on('parrents')->onDelete('cascade');
            $table->foreign('ride_id')->references('id')->on('rides')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
