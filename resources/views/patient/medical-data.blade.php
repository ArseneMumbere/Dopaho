@extends('layouts.patient')

@section('patient_content')
    <div class="page-header">
        <h1>Données médicales</h1>
        <p class="lead">Consultez et gérez vos informations médicales</p>
    </div>

    <div class="row mt-4">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informations générales</h5>
                    <div class="medical-info">
                        <div class="info-item">
                            <label>Groupe sanguin</label>
                            <p class="text-primary">A+</p>
                        </div>
                        <div class="info-item">
                            <label>Taille</label>
                            <p>175 cm</p>
                        </div>
                        <div class="info-item">
                            <label>Poids</label>
                            <p>70 kg</p>
                        </div>
                        <div class="info-item">
                            <label>IMC</label>
                            <p>22.9 <small class="text-success">(Normal)</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Antécédents médicaux</h5>
                    <div class="medical-history">
                        <div class="history-item">
                            <div class="history-date">2023</div>
                            <div class="history-content">
                                <h6>Opération de l'appendicite</h6>
                                <p>Intervention réalisée à l'hôpital central</p>
                            </div>
                        </div>
                        <div class="history-item">
                            <div class="history-date">2022</div>
                            <div class="history-content">
                                <h6>Fracture du bras droit</h6>
                                <p>Traitement conservateur, plâtre pendant 6 semaines</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Traitements en cours</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Médicament</th>
                                    <th>Posologie</th>
                                    <th>Début</th>
                                    <th>Fin</th>
                                    <th>Prescripteur</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Paracétamol</td>
                                    <td>1000mg 3x/jour</td>
                                    <td>01/05/2025</td>
                                    <td>07/05/2025</td>
                                    <td>Dr. Martin</td>
                                </tr>
                            </tbody>
                        </table>
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

    .card {
        border: none;
        box-shadow: 0 0 15px rgba(0,0,0,0.05);
        margin-bottom: 1rem;
    }

    .card-title {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 1.5rem;
    }

    .medical-info .info-item {
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #eee;
    }

    .medical-info .info-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
        margin-bottom: 0;
    }

    .medical-info label {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 0.25rem;
    }

    .medical-info p {
        color: #2c3e50;
        font-weight: 500;
        margin: 0;
    }

    .medical-history .history-item {
        display: flex;
        margin-bottom: 1.5rem;
    }

    .medical-history .history-item:last-child {
        margin-bottom: 0;
    }

    .history-date {
        min-width: 80px;
        font-weight: 600;
        color: #3498db;
    }

    .history-content h6 {
        color: #2c3e50;
        margin: 0 0 0.25rem;
    }

    .history-content p {
        color: #666;
        margin: 0;
    }

    .table th {
        font-weight: 600;
        color: #2c3e50;
    }

    .table td {
        vertical-align: middle;
    }

    .text-success {
        color: #27ae60 !important;
    }

    .text-primary {
        color: #3498db !important;
    }
</style>
@endpush
