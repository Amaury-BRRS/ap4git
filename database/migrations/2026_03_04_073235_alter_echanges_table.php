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
        Schema::table('echanges', function (Blueprint $table) {
            $table->foreignId('enquete_id')->constrained()->onDelete('cascade');
            $table->foreignId('participant_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('echanges', function (Blueprint $table) {
            $table->dropForeign(['enquete_id']);
            $table->dropColumn('enquete_id');
            $table->dropForeign(['participant_id']);
            $table->dropColumn('participant_id');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
