@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Politique de Confidentialité</h1>
    
    <div class="mt-4">
        <h2>1. Collecte des données</h2>
        <p>Nous collectons les informations suivantes :</p>
        <ul>
            <li>Informations d'identification (nom, prénom, email)</li>
            <li>Données médicales nécessaires aux consultations</li>
            <li>Historique des rendez-vous</li>
            <li>Données de connexion et d'utilisation du site</li>
        </ul>

        <h2>2. Utilisation des données</h2>
        <p>Vos données sont utilisées pour :</p>
        <ul>
            <li>Gérer vos rendez-vous médicaux</li>
            <li>Assurer le suivi des consultations</li>
            <li>Améliorer nos services</li>
            <li>Communiquer avec vous concernant nos services</li>
        </ul>

        <h2>3. Protection des données</h2>
        <p>Nous mettons en œuvre les mesures de sécurité suivantes :</p>
        <ul>
            <li>Chiffrement des données sensibles</li>
            <li>Accès restreint aux données personnelles</li>
            <li>Audits réguliers de sécurité</li>
            <li>Formation de notre personnel à la protection des données</li>
        </ul>

        <h2>4. Vos droits</h2>
        <p>Conformément au RGPD, vous disposez des droits suivants :</p>
        <ul>
            <li>Droit d'accès à vos données</li>
            <li>Droit de rectification</li>
            <li>Droit à l'effacement</li>
            <li>Droit à la portabilité</li>
            <li>Droit d'opposition au traitement</li>
        </ul>

        <h2>5. Contact</h2>
        <p>Pour toute question concernant vos données personnelles, contactez notre délégué à la protection des données via notre <a href="{{ route('contact') }}">page de contact</a>.</p>
    </div>
</div>
@endsection
