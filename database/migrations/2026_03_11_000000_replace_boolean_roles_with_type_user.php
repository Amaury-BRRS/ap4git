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
        Schema::table('users', function (Blueprint $table) {
            // Enlever les anciennes colonnes booléennes
            $table->dropColumn(['is_admin', 'is_superadmin']);
            
            // Modifier user_type en enum
            $table->enum('type_user', ['user', 'admin', 'superadmin'])
                ->default('user')
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Re-ajouter les colonnes booléennes
            $table->boolean('is_admin')->default(false)->after('password');
            $table->boolean('is_superadmin')->default(false)->after('password');
            
            // Revenir à string
            $table->string('type_user')->change();
        });
    }
};
