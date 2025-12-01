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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('description');
            $table->string('category');
            $table->dateTime('date');
            $table->foreignId('userId')
                ->constrained('users')
                ->onDelete('cascade');
            $table->string('status');
            $table->string('image');
            $table->string('image_mime');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
