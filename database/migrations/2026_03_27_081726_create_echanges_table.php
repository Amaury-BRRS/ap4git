<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration pour créer la table 'echanges'
 * Un échange représente un contact entre un utilisateur, une enquête et un participant
 */
return new class extends Migration
{
    /**
     * Créer la table echanges
     */
    public function up(): void
    {
        Schema::create('echanges', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            
            $table->string('type'); // Type d'échange (email, téléphone, visio, etc.)
            
            $table->date('date_de_contact'); // Date du contact
            
            // Clé étrangère vers la table users
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Clé étrangère vers la table enquetes
            $table->foreignId('enquete_id')->constrained()->onDelete('cascade');
            
            // Clé étrangère vers la table participants
            $table->foreignId('participant_id')->constrained()->onDelete('cascade');
            
            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Supprimer la table echanges
     */
    public function down(): void
    {
        Schema::dropIfExists('echanges');
    }
};
