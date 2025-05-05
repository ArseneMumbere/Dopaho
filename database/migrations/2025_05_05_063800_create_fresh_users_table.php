<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Supprimer la table users si elle existe
        Schema::dropIfExists('users');

        // Créer une nouvelle table users avec les champs nécessaires
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // Informations de base
            $table->string('name');
            $table->string('nom');
            $table->string('postnom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('phone');
            $table->date('birthdate');
            $table->string('password');
            
            // Photo de profil
            $table->string('profile_photo')->nullable();
            
            // Adresse et bio
            $table->string('address')->nullable();
            $table->text('bio')->nullable();
            
            // Statut du compte
            $table->boolean('is_active')->default(true);
            
            // Timestamps et remember token
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
