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
<<<<<<< HEAD
            $table->string('user_type')->default('user')->after('name');
=======
            $table->string('type_user')->after('email');
>>>>>>> 87e51b9 (modif en bdd)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
            Schema::table('users', function (Blueprint $table) {
<<<<<<< HEAD
                $table->dropColumn('user_type');
=======
                $table->dropColumn('type_user');
>>>>>>> 87e51b9 (modif en bdd)
            });
    }
};
