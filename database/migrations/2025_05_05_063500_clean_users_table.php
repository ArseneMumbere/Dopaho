<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Supprimer la table user_types si elle existe
        Schema::dropIfExists('user_types');

        // Supprimer les colonnes liées aux types d'utilisateurs de la table users
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'user_type')) {
                $table->dropColumn('user_type');
            }
            if (Schema::hasColumn('users', 'user_type_id')) {
                $table->dropColumn('user_type_id');
            }
        });
    }

    public function down()
    {
        // Ne pas restaurer les anciennes tables/colonnes car nous ne les utilisons plus
    }
};
