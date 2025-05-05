<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Show the premium subscription page.
     */
    public function premium()
    {
        return view('subscription.premium');
    }

    /**
     * Process the premium subscription.
     */
    public function subscribe(Request $request)
    {
        // Validation de la demande
        $request->validate([
            'plan' => 'required|in:monthly,yearly',
            'payment_method' => 'required|in:card,mobile_money',
        ]);

        // TODO: Intégrer le processus de paiement réel ici

        // Mise à jour du statut premium de l'utilisateur
        $user = auth()->user();
        $user->is_premium = true;
        $user->premium_until = now()->addMonths($request->plan === 'yearly' ? 12 : 1);
        $user->save();

        return redirect()->route('patient.home')
            ->with('success', 'Félicitations ! Votre compte est maintenant premium.');
    }
}
