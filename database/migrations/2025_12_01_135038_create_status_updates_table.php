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
        Schema::create('status_updates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('reportId')
                ->constrained('reports')
                ->onDelete('cascade');
            $table->string('newStatus');
            $table->dateTime('date');
            $table->string('notes');
            $table->foreignId('adminId');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_updates');
    }
};
