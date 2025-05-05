@extends('layouts.app')

@section('content')
<div class="premium-hero py-5 position-relative overflow-hidden">
    <div class="hero-overlay"></div>
    <div class="container position-relative z-index-2">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center mb-5">
                <span class="badge bg-warning text-dark mb-3 px-4 py-2 rounded-pill fs-5">Dopaho Premium</span>
                <h1 class="display-3 mb-4 text-white fw-bold text-shadow">
                    Votre Santé, Notre Priorité
                </h1>
                <p class="lead text-white mb-4 fs-4 text-shadow">Accédez à des fonctionnalités avancées pour une meilleure gestion de votre santé</p>
            </div>
        </div>
    </div>
</div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row g-4">
                    <!-- Plan Mensuel -->
                    <div class="col-md-6">
                        <div class="card h-100 pricing-card hover-shadow-lg transition-300">
                            <div class="card-body p-4">
                                <div class="text-center mb-4">
                                    <div class="pricing-icon mb-3">
                                        <i class="fas fa-user-md fa-2x text-primary"></i>
                                    </div>
                                    <h3 class="card-title h4 mb-3">Abonnement Mensuel</h3>
                                    <div class="pricing-value">
                                        <h2 class="display-4 mb-0 fw-bold text-primary">2.99€</h2>
                                        <span class="text-muted fs-6">/mois</span>
                                    </div>
                                </div>

                                <ul class="list-unstyled pricing-features mb-4">
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Suivi médical personnalisé</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Notifications de rendez-vous</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Support prioritaire 24/7</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Accès aux rapports détaillés</span>
                                    </li>
                                </ul>

                                <form action="{{ route('subscription.subscribe') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan" value="monthly">
                                    <div class="mb-3">
                                        <h5 class="mb-3">Choisissez votre mode de paiement</h5>
                                        <div class="payment-methods">
                                            <div class="row g-3">
                                                <div class="col-6">
                                                    <div class="form-check payment-method-item">
                                                        <input class="form-check-input" type="radio" name="payment_method" id="visa_monthly" value="visa" required>
                                                        <label class="form-check-label w-100" for="visa_monthly">
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ asset('images/payment/visa.svg') }}" alt="Visa" class="payment-logo me-2">
                                                                <span>Carte Visa</span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check payment-method-item">
                                                        <input class="form-check-input" type="radio" name="payment_method" id="mastercard_monthly" value="mastercard" required>
                                                        <label class="form-check-label w-100" for="mastercard_monthly">
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ asset('images/payment/mastercard.svg') }}" alt="Mastercard" class="payment-logo me-2">
                                                                <span>Carte Bancaire</span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check payment-method-item">
                                                        <input class="form-check-input" type="radio" name="payment_method" id="mpesa_monthly" value="mpesa" required>
                                                        <label class="form-check-label w-100" for="mpesa_monthly">
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ asset('images/payment/mpesa.svg') }}" alt="M-PESA" class="payment-logo me-2">
                                                                <span>M-PESA</span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check payment-method-item">
                                                        <input class="form-check-input" type="radio" name="payment_method" id="airtel_monthly" value="airtel" required>
                                                        <label class="form-check-label w-100" for="airtel_monthly">
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ asset('images/payment/airtel.svg') }}" alt="Airtel Money" class="payment-logo me-2">
                                                                <span>Airtel Money</span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check payment-method-item">
                                                        <input class="form-check-input" type="radio" name="payment_method" id="orange_monthly" value="orange" required>
                                                        <label class="form-check-label w-100" for="orange_monthly">
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ asset('images/payment/orange.svg') }}" alt="Orange Money" class="payment-logo me-2">
                                                                <span>Orange Money</span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill">
                                        <i class="fas fa-arrow-right me-2"></i>Commencer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Plan Annuel -->
                    <div class="col-md-6">
                        <div class="card h-100 pricing-card premium-card hover-shadow-lg transition-300 border-primary">
                            <div class="card-body p-4">
                                <div class="popular-badge">
                                    <span class="badge bg-primary rounded-pill px-3 py-2">
                                        <i class="fas fa-star me-1"></i>Plus Populaire
                                    </span>
                                </div>

                                <div class="text-center mb-4">
                                    <div class="pricing-icon mb-3">
                                        <i class="fas fa-hospital-user fa-2x text-primary"></i>
                                    </div>
                                    <h3 class="card-title h4 mb-3">Abonnement Annuel</h3>
                                    <div class="pricing-value">
                                        <h2 class="display-4 mb-0 fw-bold text-primary">29.90€</h2>
                                        <span class="text-muted fs-6">soit 2.49€/mois</span>
                                    </div>
                                    <span class="badge bg-success mt-2">Economisez 20%</span>
                                </div>

                                <ul class="list-unstyled pricing-features mb-4">
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Tous les avantages du plan mensuel</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>2 mois gratuits</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Accès prioritaire aux nouvelles fonctionnalités</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Support VIP dédié</span>
                                    </li>
                                </ul>

                                <form action="{{ route('subscription.subscribe') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan" value="yearly">
                                    <div class="mb-3">
                                        <h5 class="mb-3">Choisissez votre mode de paiement</h5>
                                        <div class="payment-methods">
                                            <div class="row g-3">
                                                <div class="col-6">
                                                    <div class="form-check payment-method-item">
                                                        <input class="form-check-input" type="radio" name="payment_method" id="visa_yearly" value="visa" required>
                                                        <label class="form-check-label w-100" for="visa_yearly">
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ asset('images/payment/visa.svg') }}" alt="Visa" class="payment-logo me-2">
                                                                <span>Carte Visa</span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check payment-method-item">
                                                        <input class="form-check-input" type="radio" name="payment_method" id="mastercard_yearly" value="mastercard" required>
                                                        <label class="form-check-label w-100" for="mastercard_yearly">
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ asset('images/payment/mastercard.svg') }}" alt="Mastercard" class="payment-logo me-2">
                                                                <span>Carte Bancaire</span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check payment-method-item">
                                                        <input class="form-check-input" type="radio" name="payment_method" id="mpesa_yearly" value="mpesa" required>
                                                        <label class="form-check-label w-100" for="mpesa_yearly">
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ asset('images/payment/mpesa.svg') }}" alt="M-PESA" class="payment-logo me-2">
                                                                <span>M-PESA</span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check payment-method-item">
                                                        <input class="form-check-input" type="radio" name="payment_method" id="airtel_yearly" value="airtel" required>
                                                        <label class="form-check-label w-100" for="airtel_yearly">
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ asset('images/payment/airtel.svg') }}" alt="Airtel Money" class="payment-logo me-2">
                                                                <span>Airtel Money</span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check payment-method-item">
                                                        <input class="form-check-input" type="radio" name="payment_method" id="orange_yearly" value="orange" required>
                                                        <label class="form-check-label w-100" for="orange_yearly">
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ asset('images/payment/orange.svg') }}" alt="Orange Money" class="payment-logo me-2">
                                                                <span>Orange Money</span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill">
                                        <i class="fas fa-crown me-2"></i>Devenir Premium
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="premium-features py-5 mt-5 bg-light">
                <div class="container">
                    <div class="text-center mb-5">
                        <h2 class="h3 fw-bold">Pourquoi choisir Dopaho Premium ?</h2>
                        <p class="text-muted">Découvrez tous les avantages inclus dans votre abonnement</p>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="feature-card text-center p-4 bg-white rounded-lg hover-shadow-lg transition-300">
                                <div class="feature-icon mb-3">
                                    <i class="fas fa-laptop-medical fa-2x text-primary"></i>
                                </div>
                                <h5 class="mb-3">Suivi Médical Avancé</h5>
                                <p class="text-muted mb-0">Accès à des outils de suivi médical sophistiqués et des rapports détaillés</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-card text-center p-4 bg-white rounded-lg hover-shadow-lg transition-300">
                                <div class="feature-icon mb-3">
                                    <i class="fas fa-user-md fa-2x text-primary"></i>
                                </div>
                                <h5 class="mb-3">Support Prioritaire</h5>
                                <p class="text-muted mb-0">Assistance personnalisée 24/7 et accès prioritaire aux spécialistes</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-card text-center p-4 bg-white rounded-lg hover-shadow-lg transition-300">
                                <div class="feature-icon mb-3">
                                    <i class="fas fa-shield-alt fa-2x text-primary"></i>
                                </div>
                                <h5 class="mb-3">Sécurité Renforcée</h5>
                                <p class="text-muted mb-0">Protection avancée de vos données médicales et confidentialité garantie</p>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature">
                            <i class="fas fa-headset text-primary fa-2x mb-3"></i>
                            <h5>Support prioritaire</h5>
                            <p>Obtenez de l'aide rapidement quand vous en avez besoin</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature">
                            <i class="fas fa-ban text-danger fa-2x mb-3"></i>
                            <h5>Sans publicité</h5>
                            <p>Une expérience fluide sans interruptions</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Styles pour la section hero */
.premium-hero {
    background: linear-gradient(45deg, #1a237e, #0d47a1);
    min-height: 400px;
    display: flex;
    align-items: center;
    position: relative;
    padding: 4rem 0;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><rect width="20" height="20" fill="none"/><circle cx="3" cy="3" r="1" fill="rgba(255,255,255,0.1)"/></svg>') repeat;
    opacity: 0.3;
}

.text-shadow {
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.badge {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-weight: 600;
}

/* Styles pour les modes de paiement */
.payment-methods {
    margin-top: 1rem;
}

.payment-method-item {
    border: 1px solid #dee2e6;
    border-radius: 0.5rem;
    padding: 1rem;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
}

.payment-method-item:hover {
    border-color: #3498db;
    box-shadow: 0 0 10px rgba(52, 152, 219, 0.1);
}

.payment-method-item .form-check-input:checked ~ .form-check-label {
    color: #3498db;
}

.payment-method-item .form-check-input:checked ~ .form-check-label .payment-logo {
    filter: none;
}

.payment-logo {
    height: 30px;
    object-fit: contain;
    filter: grayscale(100%);
    transition: filter 0.3s ease;
}

.premium-hero {
    background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
    padding: 100px 0;
    position: relative;
}

.premium-shape {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 150px;
    background: #fff;
    clip-path: polygon(0 50%, 100% 0, 100% 100%, 0% 100%);
}

.z-index-1 {
    z-index: 1;
}

.pricing-card {
    border-radius: 20px;
    transition: all 0.3s ease;
}

.pricing-card:hover {
    transform: translateY(-10px);
}

.premium-card {
    position: relative;
    overflow: hidden;
}

.popular-badge {
    position: absolute;
    top: 20px;
    right: 20px;
}

.pricing-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto;
    background: rgba(52, 152, 219, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.pricing-features li {
    padding: 8px 0;
}

.feature-card {
    height: 100%;
    transition: all 0.3s ease;
}

.feature-icon {
    width: 60px;
    height: 60px;
    margin: 0 auto;
    background: rgba(52, 152, 219, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.hover-shadow-lg {
    transition: all 0.3s ease;
}

.hover-shadow-lg:hover {
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175);
}

.transition-300 {
    transition: all 0.3s ease;
}
    transition: transform 0.2s;
}

.card:hover {
    transform: translateY(-5px);
}

.ribbon {
    position: absolute;
    top: 20px;
    right: 20px;
}

.feature {
    padding: 20px;
    border-radius: 10px;
    background: #f8f9fa;
}

.pricing {
    position: relative;
}

.pricing .display-4 {
    color: #2c3e50;
    font-weight: bold;
}

.pricing .text-muted {
    font-size: 1.1rem;
}
</style>
@endsection
