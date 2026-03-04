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
        Schema::create('etablissement__formation', function (Blueprint $table) {
            $table->foreignId('etablissements_id')->constrained()->onDelete('cascade');
            $table->foreignId('formations_id')->constrained()->onDelete('cascade');
            $table->primary(['etablissements_id', 'formations_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etablissement__formation');
    }
};
