@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Conditions d'Utilisation</h1>
    
    <div class="mt-4">
        <h2>1. Acceptation des conditions</h2>
        <p>En utilisant la plateforme Dopaho, vous acceptez les présentes conditions d'utilisation. Si vous n'acceptez pas ces conditions, veuillez ne pas utiliser nos services.</p>

        <h2>2. Description des services</h2>
        <p>Dopaho est une plateforme de mise en relation entre patients et professionnels de santé permettant :</p>
        <ul>
            <li>La prise de rendez-vous en ligne</li>
            <li>La téléconsultation</li>
            <li>Le suivi médical</li>
            <li>L'accès aux pharmacies partenaires</li>
        </ul>

        <h2>3. Responsabilités</h2>
        <h3>3.1 Responsabilités de l'utilisateur</h3>
        <p>En tant qu'utilisateur, vous vous engagez à :</p>
        <ul>
            <li>Fournir des informations exactes et à jour</li>
            <li>Respecter les rendez-vous pris</li>
            <li>Ne pas utiliser le service de manière frauduleuse</li>
            <li>Protéger vos identifiants de connexion</li>
        </ul>

        <h3>3.2 Responsabilités de Dopaho</h3>
        <p>Dopaho s'engage à :</p>
        <ul>
            <li>Assurer la disponibilité de la plateforme</li>
            <li>Protéger vos données personnelles</li>
            <li>Maintenir la qualité des services</li>
            <li>Répondre à vos demandes dans les meilleurs délais</li>
        </ul>

        <h2>4. Propriété intellectuelle</h2>
        <p>Tous les contenus présents sur la plateforme (logos, textes, fonctionnalités) sont la propriété exclusive de Dopaho.</p>

        <h2>5. Modification des conditions</h2>
        <p>Dopaho se réserve le droit de modifier ces conditions à tout moment. Les utilisateurs seront informés des changements importants.</p>

        <h2>6. Contact</h2>
        <p>Pour toute question concernant ces conditions, contactez-nous via notre <a href="{{ route('contact') }}">page de contact</a>.</p>
    </div>
</div>
@endsection
