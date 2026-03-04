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
        Schema::create('enquete__participant', function (Blueprint $table) {
            $table->foreignId('enquetes_id')->constrained()->onDelete('cascade');
            $table->foreignId('participants_id')->constrained()->onDelete('cascade');
            $table->primary(['enquetes_id', 'participants_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquete__participant');
    }
};
