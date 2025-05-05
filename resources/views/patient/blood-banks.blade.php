@extends('layouts.patient')

@section('patient_content')
    <div class="page-header">
        <h1>Banques de sang</h1>
        <p class="lead">Trouvez les centres de don de sang près de chez vous</p>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="blood-bank-search mb-4">
                        <input type="text" class="form-control" placeholder="Rechercher une banque de sang...">
                    </div>

                    <div class="blood-bank-list">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="card blood-bank-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Centre National de Transfusion Sanguine</h5>
                                        <p class="card-text">
                                            <i class="fas fa-map-marker-alt text-primary"></i> 55 Avenue de la Santé, 75013 Paris<br>
                                            <i class="fas fa-phone text-success"></i> 01 44 49 30 00<br>
                                            <span class="badge bg-success">Disponible pour don</span>
                                            <div class="blood-types mt-2">
                                                <span class="badge bg-danger">A+</span>
                                                <span class="badge bg-danger">O-</span>
                                                <span class="badge bg-danger">B+</span>
                                                <span class="badge bg-warning">AB-</span>
                                            </div>
                                        </p>
                                        <div class="mt-3">
                                            <a href="#" class="btn btn-primary btn-sm">Prendre RDV</a>
                                            <a href="#" class="btn btn-outline-primary btn-sm">Plus d'infos</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="card blood-bank-card">
                                    <div class="card-body">
                                        <h5 class="card-title">EFS Saint-Louis</h5>
                                        <p class="card-text">
                                            <i class="fas fa-map-marker-alt text-primary"></i> 1 Avenue Claude Vellefaux, 75010 Paris<br>
                                            <i class="fas fa-phone text-success"></i> 01 53 72 22 50<br>
                                            <span class="badge bg-success">Disponible pour don</span>
                                            <div class="blood-types mt-2">
                                                <span class="badge bg-danger">A+</span>
                                                <span class="badge bg-danger">O+</span>
                                                <span class="badge bg-warning">AB+</span>
                                            </div>
                                        </p>
                                        <div class="mt-3">
                                            <a href="#" class="btn btn-primary btn-sm">Prendre RDV</a>
                                            <a href="#" class="btn btn-outline-primary btn-sm">Plus d'infos</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="card blood-bank-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Centre de Don du Sang Pitié-Salpêtrière</h5>
                                        <p class="card-text">
                                            <i class="fas fa-map-marker-alt text-primary"></i> 47-83 Boulevard de l'Hôpital, 75013 Paris<br>
                                            <i class="fas fa-phone text-success"></i> 01 42 16 02 52<br>
                                            <span class="badge bg-warning">Horaires limités</span>
                                            <div class="blood-types mt-2">
                                                <span class="badge bg-danger">O+</span>
                                                <span class="badge bg-danger">B-</span>
                                                <span class="badge bg-warning">AB+</span>
                                            </div>
                                        </p>
                                        <div class="mt-3">
                                            <a href="#" class="btn btn-primary btn-sm">Prendre RDV</a>
                                            <a href="#" class="btn btn-outline-primary btn-sm">Plus d'infos</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="card blood-bank-card">
                                    <div class="card-body">
                                        <h5 class="card-title">EFS Crozatier</h5>
                                        <p class="card-text">
                                            <i class="fas fa-map-marker-alt text-primary"></i> 21 Rue Crozatier, 75012 Paris<br>
                                            <i class="fas fa-phone text-success"></i> 01 53 02 92 00<br>
                                            <span class="badge bg-danger">Fermé temporairement</span>
                                            <div class="blood-types mt-2">
                                                <span class="badge bg-secondary">Pas de collecte</span>
                                            </div>
                                        </p>
                                        <div class="mt-3">
                                            <a href="#" class="btn btn-primary btn-sm disabled">Prendre RDV</a>
                                            <a href="#" class="btn btn-outline-primary btn-sm">Plus d'infos</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .page-header {
        margin-bottom: 2rem;
    }

    .page-header h1 {
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }

    .page-header .lead {
        color: #666;
    }

    .blood-bank-search {
        max-width: 500px;
        margin: 0 auto;
    }

    .blood-bank-search .form-control {
        padding: 0.75rem 1rem;
        font-size: 1.1rem;
        border-radius: 50px;
        border: 1px solid #dee2e6;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
    }

    .blood-bank-search .form-control:focus {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }

    .blood-bank-card {
        transition: transform 0.2s;
        border: none;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .blood-bank-card:hover {
        transform: translateY(-5px);
    }

    .blood-bank-card .card-title {
        color: #2c3e50;
        font-weight: 600;
    }

    .blood-bank-card .card-text {
        color: #666;
        margin-bottom: 0;
    }

    .blood-bank-card i {
        margin-right: 8px;
        width: 16px;
    }

    .blood-bank-card .badge {
        margin-top: 8px;
        padding: 6px 12px;
        font-weight: 500;
    }

    .blood-bank-card .btn {
        margin-right: 8px;
    }

    .blood-types .badge {
        margin-right: 5px;
        font-size: 0.85em;
    }
</style>
@endpush
