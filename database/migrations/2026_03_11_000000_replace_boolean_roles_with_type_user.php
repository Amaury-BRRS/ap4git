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
            // Enlever les anciennes colonnes booléennes si elles existent
            $columnsToDrop = [];
            if (Schema::hasColumn('users', 'is_admin')) {
                $columnsToDrop[] = 'is_admin';
            }
            if (Schema::hasColumn('users', 'is_superadmin')) {
                $columnsToDrop[] = 'is_superadmin';
            }
            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
            
            // Modifier type_user en string (VARCHAR)
            $table->string('type_user', 255)->default('salarié')->change();
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
