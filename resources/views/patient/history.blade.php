@extends('layouts.patient')

@section('patient_content')
    <div class="page-header">
        <h1>Historique</h1>
        <p class="lead">Consultez l'historique de vos activités médicales</p>
    </div>

    <div class="row mt-4">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="history-filters d-flex justify-content-between align-items-center mb-4">
                        <div class="filters-left d-flex gap-2">
                            <select class="form-select">
                                <option>Tous les types</option>
                                <option>Rendez-vous</option>
                                <option>Prescriptions</option>
                                <option>Analyses</option>
                                <option>Vaccinations</option>
                            </select>
                            <input type="month" class="form-control" value="2025-05">
                        </div>
                        <div class="filters-right">
                            <button class="btn btn-outline-primary">
                                <i class="fas fa-download me-2"></i>Exporter
                            </button>
                        </div>
                    </div>

                    <div class="timeline">
                        <!-- Mai 2025 -->
                        <div class="timeline-month">
                            <div class="month-label">Mai 2025</div>
                            <div class="timeline-items">
                                <div class="timeline-item">
                                    <div class="timeline-dot bg-primary">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="timeline-header">
                                            <h6>Consultation générale</h6>
                                            <span class="badge bg-primary">Rendez-vous</span>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Consultation avec Dr. Martin</p>
                                            <small class="text-muted">01 Mai 2025 - 14:30</small>
                                        </div>
                                        <div class="timeline-footer">
                                            <button class="btn btn-sm btn-link">Voir les détails</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-dot bg-info">
                                        <i class="fas fa-prescription"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="timeline-header">
                                            <h6>Prescription médicale</h6>
                                            <span class="badge bg-info">Prescription</span>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Ordonnance pour traitement antibiotique</p>
                                            <small class="text-muted">01 Mai 2025 - 15:00</small>
                                        </div>
                                        <div class="timeline-footer">
                                            <button class="btn btn-sm btn-link">Voir l'ordonnance</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Avril 2025 -->
                        <div class="timeline-month">
                            <div class="month-label">Avril 2025</div>
                            <div class="timeline-items">
                                <div class="timeline-item">
                                    <div class="timeline-dot bg-warning">
                                        <i class="fas fa-flask"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="timeline-header">
                                            <h6>Analyse de sang</h6>
                                            <span class="badge bg-warning text-dark">Analyses</span>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Bilan sanguin complet</p>
                                            <small class="text-muted">15 Avril 2025 - 08:00</small>
                                        </div>
                                        <div class="timeline-footer">
                                            <button class="btn btn-sm btn-link">Voir les résultats</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-dot bg-success">
                                        <i class="fas fa-syringe"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="timeline-header">
                                            <h6>Vaccination</h6>
                                            <span class="badge bg-success">Vaccination</span>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Rappel vaccin antigrippal</p>
                                            <small class="text-muted">10 Avril 2025 - 11:30</small>
                                        </div>
                                        <div class="timeline-footer">
                                            <button class="btn btn-sm btn-link">Voir le certificat</button>
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

    .card {
        border: none;
        box-shadow: 0 0 15px rgba(0,0,0,0.05);
    }

    .history-filters .form-select,
    .history-filters .form-control {
        min-width: 200px;
    }

    .timeline {
        position: relative;
        padding: 1rem 0;
    }

    .timeline-month {
        margin-bottom: 2rem;
    }

    .timeline-month:last-child {
        margin-bottom: 0;
    }

    .month-label {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 1rem;
        padding-left: 50px;
    }

    .timeline-items {
        position: relative;
    }

    .timeline-items::before {
        content: '';
        position: absolute;
        left: 20px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #e9ecef;
    }

    .timeline-item {
        position: relative;
        padding-left: 50px;
        margin-bottom: 1.5rem;
    }

    .timeline-item:last-child {
        margin-bottom: 0;
    }

    .timeline-dot {
        position: absolute;
        left: 11px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.7rem;
    }

    .timeline-content {
        background: white;
        border-radius: 0.5rem;
        padding: 1rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    .timeline-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.5rem;
    }

    .timeline-header h6 {
        margin: 0;
        color: #2c3e50;
        font-weight: 600;
    }

    .timeline-body p {
        margin: 0 0 0.25rem;
        color: #666;
    }

    .timeline-footer {
        margin-top: 0.5rem;
        border-top: 1px solid #eee;
        padding-top: 0.5rem;
    }

    .btn-link {
        color: #3498db;
        text-decoration: none;
        padding: 0;
    }

    .btn-link:hover {
        color: #2980b9;
        text-decoration: underline;
    }

    .badge {
        font-weight: 500;
        padding: 0.5em 0.75em;
    }

    @media (max-width: 768px) {
        .history-filters {
            flex-direction: column;
            gap: 1rem;
        }

        .filters-left {
            flex-direction: column;
            width: 100%;
        }

        .filters-right {
            width: 100%;
        }

        .filters-right .btn {
            width: 100%;
        }

        .history-filters .form-select,
        .history-filters .form-control {
            width: 100%;
        }
    }
</style>
@endpush
