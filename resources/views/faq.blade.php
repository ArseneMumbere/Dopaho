@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Foire Aux Questions (FAQ)</h1>
    
    <div class="accordion mt-4" id="faqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                    Comment prendre rendez-vous avec un médecin ?
                </button>
            </h2>
            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Pour prendre rendez-vous, connectez-vous à votre compte, choisissez l'établissement ou le praticien souhaité, et sélectionnez un créneau horaire disponible.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                    Comment fonctionne la téléconsultation ?
                </button>
            </h2>
            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    La téléconsultation se fait via notre plateforme sécurisée. Une fois le rendez-vous pris, vous recevrez un lien pour rejoindre la consultation vidéo à l'heure prévue.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                    Comment annuler ou modifier un rendez-vous ?
                </button>
            </h2>
            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Connectez-vous à votre compte, allez dans la section "Mes rendez-vous" et cliquez sur le bouton modifier ou annuler correspondant au rendez-vous concerné.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                    Les consultations sont-elles remboursées ?
                </button>
            </h2>
            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Les consultations sont remboursées selon les conditions habituelles de votre assurance maladie. Une facture vous sera fournie après chaque consultation.
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h2>Vous ne trouvez pas la réponse à votre question ?</h2>
        <p>N'hésitez pas à nous contacter via notre <a href="{{ route('contact') }}">formulaire de contact</a>.</p>
    </div>
</div>
@endsection
