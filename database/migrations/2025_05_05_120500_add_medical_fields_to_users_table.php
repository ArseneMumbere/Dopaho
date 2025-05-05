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
            if (!Schema::hasColumn('users', 'profile_photo_path')) {
                $table->string('profile_photo_path')->nullable();
            }
            if (!Schema::hasColumn('users', 'groupe_sanguin')) {
                $table->string('groupe_sanguin')->nullable();
            }
            if (!Schema::hasColumn('users', 'taille')) {
                $table->integer('taille')->nullable();
            }
            if (!Schema::hasColumn('users', 'allergies')) {
                $table->text('allergies')->nullable();
            }
            if (!Schema::hasColumn('users', 'maladies_chroniques')) {
                $table->text('maladies_chroniques')->nullable();
            }
            if (!Schema::hasColumn('users', 'antecedents')) {
                $table->text('antecedents')->nullable();
            }
            if (!Schema::hasColumn('users', 'email_notifications')) {
                $table->boolean('email_notifications')->default(true);
            }
            if (!Schema::hasColumn('users', 'sms_notifications')) {
                $table->boolean('sms_notifications')->default(true);
            }
            if (!Schema::hasColumn('users', 'appointment_reminders')) {
                $table->boolean('appointment_reminders')->default(true);
            }
            if (!Schema::hasColumn('users', 'exam_results')) {
                $table->boolean('exam_results')->default(true);
            }
            if (!Schema::hasColumn('users', 'system_updates')) {
                $table->boolean('system_updates')->default(true);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $columns = [
                'profile_photo_path',
                'groupe_sanguin',
                'taille',
                'allergies',
                'maladies_chroniques',
                'antecedents',
                'email_notifications',
                'sms_notifications',
                'appointment_reminders',
                'exam_results',
                'system_updates',
            ];

            // Ne supprimer que les colonnes qui existent
            $existingColumns = [];
            foreach ($columns as $column) {
                if (Schema::hasColumn('users', $column)) {
                    $existingColumns[] = $column;
                }
            }

            if (!empty($existingColumns)) {
                $table->dropColumn($existingColumns);
            }
        });
    }
};
