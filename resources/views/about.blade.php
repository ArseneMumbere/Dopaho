@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>À propos de Dopaho</h1>
    <div class="row">
        <div class="col-md-8">
            <p class="lead">
                Dopaho est une plateforme innovante qui connecte les patients avec les meilleurs établissements de santé, pharmacies et services médicaux.
            </p>
            
            <h2 class="mt-4">Notre Mission</h2>
            <p>
                Notre mission est de faciliter l'accès aux soins de santé en créant un écosystème numérique qui relie tous les acteurs du secteur médical.
            </p>

            <h2 class="mt-4">Nos Valeurs</h2>
            <ul>
                <li>Excellence dans les soins</li>
                <li>Innovation technologique</li>
                <li>Accessibilité pour tous</li>
                <li>Confidentialité et sécurité</li>
            </ul>

            <h2 class="mt-4">Notre Vision</h2>
            <p>
                Nous aspirons à révolutionner l'accès aux soins de santé en Afrique en utilisant la technologie pour créer des connexions significatives entre les patients et les professionnels de santé.
            </p>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Chiffres Clés</h3>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <i class="fas fa-hospital fa-fw"></i> 50+ Hôpitaux partenaires
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-clinic-medical fa-fw"></i> 100+ Pharmacies affiliées
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-user-md fa-fw"></i> 500+ Professionnels de santé
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-users fa-fw"></i> 10,000+ Patients satisfaits
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
