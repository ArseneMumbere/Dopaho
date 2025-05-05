<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Store a newly created appointment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string|in:consultation,analyse,radiologie',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i|after_or_equal:08:00|before_or_equal:18:00',
            'hospital_id' => 'required|exists:hospitals,id',
            'notes' => 'nullable|string|max:500',
        ]);

        // TODO: Créer le rendez-vous dans la base de données
        // Pour l'instant, on redirige avec un message de succès
        return redirect()->route('patient.appointments')
            ->with('success', 'Votre rendez-vous a été créé avec succès.');
    }
}
