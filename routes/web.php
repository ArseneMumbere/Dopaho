<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

// Routes publiques pour les vues d'authentification
Route::middleware(['guest'])->group(function () {
    // Route principale (Login)
    Route::get('/', function () {
        return view('auth.login');
    })->name('home');

    // Routes d'authentification
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');
});

// Routes de traitement d'authentification
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes d'abonnement
Route::middleware(['auth'])->prefix('subscription')->name('subscription.')->group(function () {
    Route::get('/premium', [\App\Http\Controllers\SubscriptionController::class, 'premium'])->name('premium');
    Route::post('/subscribe', [\App\Http\Controllers\SubscriptionController::class, 'subscribe'])->name('subscribe');
});

// Routes protégées pour les patients
Route::middleware(['auth'])->group(function () {
    // Vue principale patient
    Route::get('/patient', function () {
        return view('patient');
    })->name('patient.home');

    // Paramètres du profil
    Route::post('/patient/photo', [\App\Http\Controllers\PatientController::class, 'updatePhoto'])->name('patient.photo.update');

    // Rendez-vous
    Route::get('/patient/appointments', function () {
        return view('patient.appointments');
    })->name('patient.appointments');
    
    Route::post('/patient/appointments', [\App\Http\Controllers\AppointmentController::class, 'store'])
        ->name('patient.appointments.store');

    // Données médicales
    Route::get('/patient/medical-data', function () {
        return view('patient.medical-data');
    })->name('patient.medical-data');

    // Notifications
    Route::get('/patient/notifications', function () {
        return view('patient.notifications');
    })->name('patient.notifications');

    // Historique
    Route::get('/patient/history', function () {
        return view('patient.history');
    })->name('patient.history');

    // Paramètres
    Route::get('/patient/settings', function () {
        return view('patient.settings');
    })->name('patient.settings');

    // Routes de mise à jour du profil
    Route::post('/patient/profile/update', [\App\Http\Controllers\PatientController::class, 'updateProfile'])
        ->name('patient.profile.update');
    Route::post('/patient/password/update', [\App\Http\Controllers\PatientController::class, 'updatePassword'])
        ->name('patient.password.update');
    Route::post('/patient/notifications/update', [\App\Http\Controllers\PatientController::class, 'updateNotifications'])
        ->name('patient.notifications.update');

    // Banque de sang
    Route::get('/patient/blood-banks', function () {
        return view('patient.blood-banks');
    })->name('patient.blood-banks');

    // Pharmacies
    Route::get('/patient/pharmacies', function () {
        return view('patient.pharmacies');
    })->name('patient.pharmacies');

    // Page d'abonnement
    Route::get('/subscription/plans', function () {
        return view('subscription.plans');
    })->name('subscription.plans');
});