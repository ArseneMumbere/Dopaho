@extends('layouts.patient')

@section('patient_content')
    <div class="page-header">
        <h1>Pharmacies à proximité</h1>
        <p class="lead">Trouvez les pharmacies les plus proches de chez vous</p>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pharmacy-search mb-4">
                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <i class="fas fa-search text-primary"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Rechercher une pharmacie...">
                            <button class="btn btn-primary" type="button">Rechercher</button>
                        </div>
                    </div>

                    <div class="pharmacy-list">
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="card pharmacy-card h-100">
                                    <div class="position-relative">
                                        <img src="https://images.unsplash.com/photo-1576602976047-174e57a47881?w=800&q=80" class="card-img-top pharmacy-image" alt="Pharmacie Centrale">
                                        <div class="pharmacy-status open">
                                            <i class="fas fa-circle"></i> Ouvert
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <h5 class="card-title">Pharmacie Centrale</h5>
                                            <span class="rating">
                                                <i class="fas fa-star text-warning"></i>
                                                <span>4.8</span>
                                            </span>
                                        </div>
                                        <div class="pharmacy-info">
                                            <div class="info-item">
                                                <i class="fas fa-map-marker-alt text-primary"></i>
                                                <p>123 Avenue de la République, 75011 Paris</p>
                                            </div>
                                            <div class="info-item">
                                                <i class="fas fa-phone text-success"></i>
                                                <p>01 23 45 67 89</p>
                                            </div>
                                            <div class="info-item">
                                                <i class="fas fa-clock text-info"></i>
                                                <p>Ouvert 24/7</p>
                                            </div>
                                        </div>
                                        <div class="services mt-3">
                                            <span class="service-badge">Garde</span>
                                            <span class="service-badge">Orthopédie</span>
                                            <span class="service-badge">Homéopathie</span>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white">
                                        <div class="d-flex justify-content-between">
                                            <a href="#" class="btn btn-outline-primary">
                                                <i class="fas fa-directions"></i> Itinéraire
                                            </a>
                                            <a href="#" class="btn btn-primary">
                                                <i class="fas fa-info-circle"></i> Plus d'infos
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <div class="card pharmacy-card h-100">
                                    <div class="position-relative">
                                        <img src="https://images.unsplash.com/photo-1587854692152-cbe660dbde88?w=800&q=80" class="card-img-top pharmacy-image" alt="Pharmacie Saint-Michel">
                                        <div class="pharmacy-status closing-soon">
                                            <i class="fas fa-clock"></i> Ferme bientôt
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <h5 class="card-title">Pharmacie Saint-Michel</h5>
                                            <span class="rating">
                                                <i class="fas fa-star text-warning"></i>
                                                <span>4.6</span>
                                            </span>
                                        </div>
                                        <div class="pharmacy-info">
                                            <div class="info-item">
                                                <i class="fas fa-map-marker-alt text-primary"></i>
                                                <p>45 Boulevard Saint-Michel, 75005 Paris</p>
                                            </div>
                                            <div class="info-item">
                                                <i class="fas fa-phone text-success"></i>
                                                <p>01 34 56 78 90</p>
                                            </div>
                                            <div class="info-item">
                                                <i class="fas fa-clock text-info"></i>
                                                <p>8h00 - 20h00</p>
                                            </div>
                                        </div>
                                        <div class="services mt-3">
                                            <span class="service-badge">Matériel médical</span>
                                            <span class="service-badge">Vaccination</span>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white">
                                        <div class="d-flex justify-content-between">
                                            <a href="#" class="btn btn-outline-primary">
                                                <i class="fas fa-directions"></i> Itinéraire
                                            </a>
                                            <a href="#" class="btn btn-primary">
                                                <i class="fas fa-info-circle"></i> Plus d'infos
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <div class="card pharmacy-card h-100">
                                    <div class="position-relative">
                                        <img src="https://images.unsplash.com/photo-1631549916768-4119b2e5f926?w=800&q=80" class="card-img-top pharmacy-image" alt="Pharmacie du Marché">
                                        <div class="pharmacy-status open">
                                            <i class="fas fa-circle"></i> Ouvert 24/7
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <h5 class="card-title">Pharmacie du Marché</h5>
                                            <span class="rating">
                                                <i class="fas fa-star text-warning"></i>
                                                <span>4.7</span>
                                            </span>
                                        </div>
                                        <div class="pharmacy-info">
                                            <div class="info-item">
                                                <i class="fas fa-map-marker-alt text-primary"></i>
                                                <p>78 Rue du Commerce, 75015 Paris</p>
                                            </div>
                                            <div class="info-item">
                                                <i class="fas fa-phone text-success"></i>
                                                <p>01 45 67 89 01</p>
                                            </div>
                                            <div class="info-item">
                                                <i class="fas fa-clock text-info"></i>
                                                <p>24h/24, 7j/7</p>
                                            </div>
                                        </div>
                                        <div class="services mt-3">
                                            <span class="service-badge">Garde</span>
                                            <span class="service-badge">Tests Covid</span>
                                            <span class="service-badge">Urgences</span>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white">
                                        <div class="d-flex justify-content-between">
                                            <a href="#" class="btn btn-outline-primary">
                                                <i class="fas fa-directions"></i> Itinéraire
                                            </a>
                                            <a href="#" class="btn btn-primary">
                                                <i class="fas fa-info-circle"></i> Plus d'infos
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <div class="card pharmacy-card h-100">
                                    <div class="position-relative">
                                        <img src="https://images.unsplash.com/photo-1586015555751-5f321b5b1fa2?w=800&q=80" class="card-img-top pharmacy-image" alt="Pharmacie Lafayette">
                                        <div class="pharmacy-status closed">
                                            <i class="fas fa-times-circle"></i> Fermé
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <h5 class="card-title">Pharmacie Lafayette</h5>
                                            <span class="rating">
                                                <i class="fas fa-star text-warning"></i>
                                                <span>4.5</span>
                                            </span>
                                        </div>
                                        <div class="pharmacy-info">
                                            <div class="info-item">
                                                <i class="fas fa-map-marker-alt text-primary"></i>
                                                <p>156 Rue Lafayette, 75010 Paris</p>
                                            </div>
                                            <div class="info-item">
                                                <i class="fas fa-phone text-success"></i>
                                                <p>01 56 78 90 12</p>
                                            </div>
                                            <div class="info-item">
                                                <i class="fas fa-clock text-info"></i>
                                                <p>9h00 - 19h30</p>
                                            </div>
                                        </div>
                                        <div class="services mt-3">
                                            <span class="service-badge">Parapharmacie</span>
                                            <span class="service-badge">Click & Collect</span>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white">
                                        <div class="d-flex justify-content-between">
                                            <a href="#" class="btn btn-outline-primary">
                                                <i class="fas fa-directions"></i> Itinéraire
                                            </a>
                                            <a href="#" class="btn btn-primary">
                                                <i class="fas fa-info-circle"></i> Plus d'infos
                                            </a>
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
        text-align: center;
    }

    .page-header h1 {
        color: #2c3e50;
        margin-bottom: 0.5rem;
        font-weight: 600;
    }

    .page-header .lead {
        color: #666;
        font-size: 1.2rem;
    }

    .pharmacy-search {
        max-width: 600px;
        margin: 0 auto 2rem;
    }

    .pharmacy-search .input-group {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
    }

    .pharmacy-search .form-control {
        padding: 0.75rem 1rem;
        font-size: 1rem;
        border: 1px solid #dee2e6;
        border-left: none;
    }

    .pharmacy-search .input-group-text {
        border: 1px solid #dee2e6;
        border-right: none;
    }

    .pharmacy-card {
        transition: transform 0.2s, box-shadow 0.2s;
        border: none;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .pharmacy-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .pharmacy-image {
        height: 200px;
        object-fit: cover;
    }

    .pharmacy-status {
        position: absolute;
        top: 15px;
        right: 15px;
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 500;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(4px);
    }

    .pharmacy-status.open {
        color: #28a745;
    }

    .pharmacy-status.closing-soon {
        color: #ffc107;
    }

    .pharmacy-status.closed {
        color: #dc3545;
    }

    .pharmacy-status i {
        margin-right: 5px;
    }

    .pharmacy-card .card-title {
        color: #2c3e50;
        font-weight: 600;
        font-size: 1.25rem;
        margin-bottom: 1rem;
    }

    .rating {
        background: #fff8e5;
        padding: 4px 8px;
        border-radius: 4px;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .rating i {
        margin-right: 3px;
    }

    .pharmacy-info {
        margin-bottom: 1rem;
    }

    .info-item {
        display: flex;
        align-items: start;
        margin-bottom: 0.5rem;
    }

    .info-item i {
        margin-right: 10px;
        margin-top: 4px;
        width: 16px;
    }

    .info-item p {
        margin: 0;
        color: #666;
        font-size: 0.95rem;
    }

    .services {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .service-badge {
        background: #e9ecef;
        color: #495057;
        padding: 4px 12px;
        border-radius: 15px;
        font-size: 0.85rem;
    }

    .card-footer {
        border-top: 1px solid #eee;
        padding: 1rem;
    }

    .btn {
        padding: 0.5rem 1rem;
        font-weight: 500;
    }

    .btn i {
        margin-right: 5px;
    }
</style>
@endpush
