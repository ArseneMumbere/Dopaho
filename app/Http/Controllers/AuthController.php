<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validation pour le formulaire patient
        $validation = [
            'nom' => 'required|string|max:255',
            'postnom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'birthdate' => 'required|date',
            'password' => 'required|string|min:8|confirmed',
            'profile_photo' => 'nullable|image|max:2048',
            'sexe' => 'required|in:M,F',
            'poids' => 'nullable|numeric|min:0|max:300'
        ];

        $request->validate($validation);

        // Création de l'utilisateur
        $userData = [
            'name' => $request->nom . ' ' . $request->postnom . ' ' . $request->prenom,
            'nom' => $request->nom,
            'postnom' => $request->postnom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'phone' => $request->phone,
            'birthdate' => $request->birthdate,
            'password' => Hash::make($request->password),
            'sexe' => $request->sexe,
            'poids' => $request->poids
        ];

        // Gestion de la photo de profil
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $userData['profile_photo'] = $path;
        }

        // Création de l'utilisateur
        $user = User::create($userData);

        // Connexion automatique
        Auth::login($user);

        // Redirection vers la page patient
        return redirect()->route('patient.home')->with('success', 'Votre compte a été créé avec succès !');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('patient.home')->with('success', 'Connexion réussie !');
        }

        return back()->withErrors([
            'email' => 'Les informations de connexion sont incorrectes.',
        ]);
    }



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
