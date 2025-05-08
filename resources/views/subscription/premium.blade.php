@extends('layouts.patient')

@section('content')
<div class="premium-hero py-4 position-relative overflow-hidden">
    <div class="container position-relative z-index-2">
        <div class="row justify-content-center">
            <div class="col-md-9 text-center mb-4">
                <span class="badge bg-primary text-white mb-3 px-3 py-2 rounded-pill fs-6">Dopaho Abonnement Premium</span>
                <h1 class="h2 mb-3 text-primary-dark fw-bold">Passez à Abonnement Dopaho pour une Expérience Améliorée</h1>
                <p class="lead text-primary-darker mb-3 fs-5">Accédez à des fonctionnalités exclusives et gérez votre santé plus efficacement.</p>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4 mb-5">
    <div class="row g-lg-5">
        {{-- Colonne des Plans d'Abonnement --}}
        <div class="col-lg-6">
            <h2 class="h4 mb-4 fw-bold text-primary">Nos Plans d'Abonnement</h2>
            <div class="row g-3 d-flex flex-column">
                {{-- Plan Mensuel --}}
                <div class="col-md-12">
                    <div class="card flex-grow-1 plan-card shadow-sm" data-plan="monthly" data-price="2.99">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h3 class="h4 mb-0 fw-semibold">Abonnement Mensuel</h3>
                                <span class="badge bg-light text-dark-emphasis border border-dark-subtle rounded-pill fs-6 fw-semibold">2.99€ <small>/ mois</small></span>
                            </div>
                            <ul class="list-unstyled pricing-features mb-4 small mt-3">
                                <li class="d-flex align-items-center mb-2"><i class="fas fa-check-circle text-primary me-2"></i>Suivi médical personnalisé</li>
                                <li class="d-flex align-items-center mb-2"><i class="fas fa-check-circle text-primary me-2"></i>Notifications de rendez-vous</li>
                                <li class="d-flex align-items-center mb-2"><i class="fas fa-check-circle text-primary me-2"></i>Support prioritaire</li>
                            </ul>
                            <button class="btn btn-outline-primary w-100 mt-auto select-plan-btn">Sélectionner ce Plan</button>
                        </div>
                    </div>
                </div>
                {{-- Plan Annuel --}}
                <div class="col-md-12">
                    <div class="card flex-grow-1 plan-card shadow-sm border-primary" data-plan="annual" data-price="29.99">
                        <div class="card-body p-4">
                             <div class="popular-badge-container">
                                <span class="badge bg-primary text-white rounded-pill px-3 py-1"><i class="fas fa-star me-1"></i>Populaire</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3 mt-2">
                                <h3 class="h4 mb-0 fw-semibold">Abonnement Annuel</h3>
                                <span class="badge bg-light text-dark-emphasis border border-dark-subtle rounded-pill fs-6 fw-semibold">29.99€ <small>/ an</small></span>
                            </div>
                            <p class="text-primary small fw-bold mb-2">Économisez 15% (équivaut à ~2.49€ / mois)</p>
                            <ul class="list-unstyled pricing-features mb-4 small mt-3">
                                <li class="d-flex align-items-center mb-2"><i class="fas fa-check-circle text-primary me-2"></i>Tous les avantages du plan mensuel</li>
                                <li class="d-flex align-items-center mb-2"><i class="fas fa-star text-primary me-2"></i>Consultation vidéo offerte / an</li>
                                <li class="d-flex align-items-center mb-2"><i class="fas fa-tags text-primary me-2"></i>Réductions exclusives partenaires</li>
                            </ul>
                            <button class="btn btn-primary w-100 mt-auto select-plan-btn">Sélectionner ce Plan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Colonne du Formulaire de Paiement --}}
        <div class="col-lg-6">
            <div class="card shadow-sm sticky-top" style="top: 20px;">
                <div class="card-body p-4 p-md-5">
                    <h2 class="h4 mb-3 fw-bold text-primary">Informations de Paiement</h2>
                    <p class="text-muted mb-4">Plan sélectionné : <strong id="selected-plan-name">Aucun</strong> (<span id="selected-plan-price">0.00€</span>)</p>
                    
                    <form id="subscription-form">
                        @csrf
                        <input type="hidden" name="selected_plan_type" id="selected-plan-type" value="">
                        <input type="hidden" name="selected_plan_price_value" id="selected-plan-price-value" value="">
                        <div class="mb-3">
                            <label class="form-label fw-medium">Choisissez votre méthode de paiement</label>
                            <div class="payment-method-options mt-2">
                                <div class="form-check form-check-inline payment-option">
                                    <input class="form-check-input" type="radio" name="payment_method" id="payment-cb" value="card" checked>
                                    <label class="form-check-label" for="payment-cb">
                                        <i class="fas fa-credit-card me-1"></i> Carte Bancaire
                                    </label>
                                </div>
                                <div class="form-check form-check-inline payment-option">
                                    <input class="form-check-input" type="radio" name="payment_method" id="payment-visa" value="visa">
                                    <label class="form-check-label" for="payment-visa">
                                        <i class="fab fa-cc-visa me-1"></i> Visa
                                    </label>
                                </div>
                                <div class="form-check form-check-inline payment-option">
                                    <input class="form-check-input" type="radio" name="payment_method" id="payment-mpesa" value="mpesa">
                                    <label class="form-check-label" for="payment-mpesa">
                                        <img src="{{ asset('images/payment/mpesa.svg') }}" alt="Mpesa" class="payment-logo-small me-1"> Mpesa
                                    </label>
                                </div>
                                <div class="form-check form-check-inline payment-option">
                                    <input class="form-check-input" type="radio" name="payment_method" id="payment-airtel" value="airtel">
                                    <label class="form-check-label" for="payment-airtel">
                                        <img src="{{ asset('images/payment/airtel.svg') }}" alt="Airtel Money" class="payment-logo-small me-1"> Airtel Money
                                    </label>
                                </div>
                                <div class="form-check form-check-inline payment-option">
                                    <input class="form-check-input" type="radio" name="payment_method" id="payment-orange" value="orange">
                                    <label class="form-check-label" for="payment-orange">
                                        <img src="{{ asset('images/payment/orange.svg') }}" alt="Orange Money" class="payment-logo-small me-1"> Orange Money
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{-- Stripe Card Element Container --}}
                        <div id="stripe-card-element-container" class="payment-fields-group">
                            <div class="mb-3">
                                <label for="cardholder-name" class="form-label fw-medium">Nom sur la carte</label>
                                <input type="text" id="cardholder-name" name="cardholder_name" class="form-control form-control-lg stylish-input" placeholder="Ex: Jean Dupont">
                            </div>
                            
                            <div class="mb-3">
                                <label for="card-number" class="form-label fw-medium">Numéro de carte</label>
                                <input type="text" id="card-number" name="card_number" class="form-control form-control-lg stylish-input" placeholder="Ex: 1234 5678 9012 3456">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="card-expiry" class="form-label fw-medium">Date d'expiration</label>
                                    <input type="text" id="card-expiry" name="card_expiry" class="form-control form-control-lg stylish-input" placeholder="MM/AA">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="card-cvv" class="form-label fw-medium">Code de sécurité (CVV)</label>
                                    <input type="text" id="card-cvv" name="card_cvv" class="form-control form-control-lg stylish-input" placeholder="Ex: 123">
                                </div>
                            </div>
                            {{-- DELETED: Incorrectly nested mobile-money-fields-group was here --}}
                            <div id="card-errors" role="alert" class="text-danger mt-2 small"></div>
                        </div>

                        {{-- Champs pour paiement mobile (maintenant correctement ciblés et structurés) --}}
                        <div id="mobile-payment-fields-container" class="payment-fields-group d-none">
                            <div class="mb-3">
                                <label for="mobile-money-holder-name" class="form-label fw-medium">Nom du titulaire du compte mobile</label>
                                <input type="text" id="mobile-money-holder-name" name="mobile_money_holder_name" class="form-control form-control-lg stylish-input" placeholder="Ex: Jean Dupont">
                                <small class="form-text text-muted">Le nom associé à votre compte de paiement mobile (si applicable).</small>
                            </div>
                            <div class="mb-3">
                                <label for="mobile-money-phone" class="form-label fw-medium">Numéro de téléphone mobile</label> {{-- Label updated for consistency --}}
                                <input type="tel" id="mobile-money-phone" name="mobile_money_phone" class="form-control form-control-lg stylish-input" placeholder="Ex: 0812345678"> {{-- ID and NAME corrected --}}
                                <small class="form-text text-muted">Vous recevrez une demande de paiement sur ce numéro.</small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-medium">Adresse e-mail de facturation</label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg stylish-input" placeholder="Ex: email@example.com" required value="{{ auth()->user() ? auth()->user()->email : '' }}">
                        </div>
                        
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" value="" id="terms-conditions" required>
                            <label class="form-check-label small" for="terms-conditions">
                                J'accepte les <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Termes et Conditions</a> de Dopaho Premium.
                            </label>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" id="submit-payment-btn" class="btn btn-primary btn-lg">
                                <span id="button-text">Procéder au Paiement</span>
                                <span id="button-spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="mt-3 pt-3 border-top">
                            <p class="text-muted small mb-2 text-center">Paiement 100% sécurisé.</p>
                        </div>
                        <p class="text-center text-muted mt-4 small">Paiement sécurisé par Stripe.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Styles pour la section hero */
.premium-hero {
    background: linear-gradient(135deg, #eef7ff 50%, #d6eaff 50%);
    min-height: auto; 
    padding-top: 3rem !important; 
    padding-bottom: 3rem !important; 
    display: flex;
    align-items: center;
    position: relative;
    padding: 4rem 0;
}

.text-primary-dark {
    color: #0d47a1 !important;
}

.text-primary-darker {
    color: #1a237e !important;
}

.badge {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-weight: 600;
}

.plan-card {
    display: flex;
    flex-direction: column;
    border-radius: 0.75rem;
    transition: all 0.3s ease-in-out;
}
.plan-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15)!important;
}
.plan-card .card-body {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}
.plan-card .badge {
    font-size: 0.9rem;
}

.popular-badge-container {
    position: absolute;
    top: -15px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 10;
}

.pricing-features li {
    padding: 0.2rem 0;
}
.pricing-features i {
    color: #0d6efd;
}

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
}

.popular-badge {
    position: absolute;
    top: -18px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 0.9rem;
}

.popular-badge .badge {
    background-color: #667eea !important;
}

.form-control.stylish-input {
    border-radius: 0.375rem; 
    border-color: #ced4da;
    box-shadow: inset 0 1px 2px rgba(0,0,0,0.075);
}
.form-control.stylish-input:focus {
    border-color: #86b7fe;
    box-shadow: inset 0 1px 2px rgba(0,0,0,0.075), 0 0 0 0.25rem rgba(13,110,253,.25);
}

#card-element.stylish-input {
 padding: 0.75rem 0.75rem;
}

.form-label.fw-medium {
    font-weight: 500 !important;
}

.payment-method-options .form-check-input {
    display: none; 
}

.payment-method-options .form-check-label {
    display: inline-flex;
    align-items: center;
    padding: 0.5rem 1rem;
    border: 1px solid #dee2e6;
    border-radius: 0.375rem;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
    margin-right: 0.5rem; 
    margin-bottom: 0.5rem; 
    background-color: #fff;
}

.payment-method-options .form-check-input:checked + .form-check-label {
    border-color: #0d6efd;
    background-color: #e7f1ff; 
    color: #0a58ca;
    box-shadow: 0 0 0 0.1rem rgba(13,110,253,.25);
}

.payment-method-options .form-check-label:hover {
    border-color: #adb5bd;
}

.payment-method-options .payment-logo-small {
    height: 20px; 
}

.payment-icon-tag {
    display: inline-flex;
    align-items: center;
    background-color: #f1f3f5; 
    color: #495057; 
    padding: 0.35rem 0.75rem;
    border-radius: 1rem; 
    font-size: 0.85rem;
    border: 1px solid #dee2e6; 
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
}

.payment-icon-tag i {
    color: #0d6efd; 
}

.payment-logo-small {
    height: 16px; 
    width: auto;
    margin-right: 0.3rem;
}

body {
    font-family: 'Poppins', 'Inter', sans-serif; 
    background-color: #f8f9fa; 
}

.container {
    padding-top: 3rem;
    padding-bottom: 3rem;
}

h1, h2, h3, h4, h5, h6 {
    font-weight: 600; 
}

.lead {
    font-size: 1.35rem; 
    font-weight: 300;
}

.btn {
    border-radius: 50px; 
    padding: 0.8rem 1.8rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-primary {
    background-image: linear-gradient(to right, #667eea 0%, #764ba2 100%);
    border: none;
    color: white;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 15px rgba(0,0,0,0.1);
    background-image: linear-gradient(to right, #5a6fcf 0%, #693a8b 100%); 
    color: white;
}

.bg-primary-soft {
    background-color: rgba(102,126,234, 0.1) !important;
}

.text-primary {
    color: #667eea !important;
}

.badge.bg-warning {
    background-color: #ffc107 !important;
    color: #212529 !important;
}

.badge.bg-primary {
    background-color: #667eea !important;
}
</style>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const paymentMethodRadios = document.querySelectorAll('input[name="payment_method"]');
    const cardFieldsContainer = document.getElementById('stripe-card-element-container');
    const mobileMoneyFieldsContainer = document.getElementById('mobile-payment-fields-container'); // CORRECTED

    const cardholderName = document.getElementById('cardholder-name');
    const cardNumber = document.getElementById('card-number');
    const cardExpiry = document.getElementById('card-expiry');
    const cardCvv = document.getElementById('card-cvv');

    const mobileMoneyHolderName = document.getElementById('mobile-money-holder-name');
    const mobileMoneyPhone = document.getElementById('mobile-money-phone'); // Assumes ID is 'mobile-money-phone' in HTML

    const selectPlanButtons = document.querySelectorAll('.select-plan-btn');
    const selectedPlanNameElement = document.getElementById('selected-plan-name');
    const selectedPlanPriceElement = document.getElementById('selected-plan-price');
    const selectedPlanTypeInput = document.getElementById('selected-plan-type');
    const selectedPlanPriceValueInput = document.getElementById('selected-plan-price-value');
    const planCards = document.querySelectorAll('.plan-card');

    const subscriptionForm = document.getElementById('subscription-form');
    const submitButton = document.getElementById('submit-payment-btn');
    const buttonText = document.getElementById('button-text');
    const buttonSpinner = document.getElementById('button-spinner');
    const cardErrors = document.getElementById('card-errors');

    function togglePaymentFields() {
        if (!cardFieldsContainer) { // Removed mobileMoneyFieldsContainer from this initial check as it's handled below
            console.error('Card fields container introuvable.');
            // return; // Don't return yet, mobileMoneyFieldsContainer might exist
        }
         if (!mobileMoneyFieldsContainer) {
            console.error('Mobile money fields container introuvable (expected ID: mobile-payment-fields-container).');
            // return; // Don't return, one might work without the other for a bit
        }


        const selectedMethodRadio = document.querySelector('input[name="payment_method"]:checked');
        
        // Hide all fields initially, then show the relevant ones.
        // Card fields
        if (cardFieldsContainer) {
            cardFieldsContainer.style.display = 'none';
            if(cardholderName) cardholderName.required = false;
            if(cardNumber) cardNumber.required = false;
            if(cardExpiry) cardExpiry.required = false;
            if(cardCvv) cardCvv.required = false;
        }

        // Mobile money fields
        if (mobileMoneyFieldsContainer) {
            mobileMoneyFieldsContainer.classList.add('d-none'); // Use Bootstrap class to hide
            if(mobileMoneyHolderName) mobileMoneyHolderName.required = false;
            if(mobileMoneyPhone) mobileMoneyPhone.required = false;
        }

        if (!selectedMethodRadio) { // If no radio is selected, all remain hidden.
            return;
        }
        const selectedMethod = selectedMethodRadio.value;

        if (selectedMethod === 'card' || selectedMethod === 'visa') {
            if (cardFieldsContainer) {
                cardFieldsContainer.style.display = 'block';
                if(cardholderName) cardholderName.required = true;
                if(cardNumber) cardNumber.required = true;
                if(cardExpiry) cardExpiry.required = true;
                if(cardCvv) cardCvv.required = true;
            }
        } else if (selectedMethod === 'mpesa' || selectedMethod === 'airtel' || selectedMethod === 'orange') {
            if (mobileMoneyFieldsContainer) {
                mobileMoneyFieldsContainer.classList.remove('d-none'); // Use Bootstrap class to show
                if(mobileMoneyPhone) mobileMoneyPhone.required = true;
            }
        }
    }

    if (paymentMethodRadios.length > 0) {
        paymentMethodRadios.forEach(radio => {
            radio.addEventListener('change', togglePaymentFields);
        });
        togglePaymentFields();
    } else {
        console.warn("Aucun bouton radio de méthode de paiement trouvé avec le nom 'payment_method'. La fonctionnalité de bascule des champs de paiement pourrait ne pas marcher comme prévu.");
    }

    if (selectPlanButtons.length > 0 && selectedPlanNameElement && selectedPlanPriceElement && selectedPlanTypeInput && selectedPlanPriceValueInput && planCards.length > 0) {
        selectPlanButtons.forEach(button => {
            button.addEventListener('click', function() {
                const parentCard = this.closest('.plan-card');
                if (!parentCard) return;

                const planName = parentCard.querySelector('h3')?.textContent.trim();
                const planPrice = parentCard.dataset.price;
                const planType = parentCard.dataset.plan;

                if (planName && planPrice && planType) {
                    selectedPlanNameElement.textContent = planName;
                    selectedPlanPriceElement.textContent = parseFloat(planPrice).toFixed(2) + '€';
                    selectedPlanTypeInput.value = planType;
                    selectedPlanPriceValueInput.value = parseFloat(planPrice).toFixed(2);
                }

                planCards.forEach(card => card.classList.remove('border-primary', 'border-3', 'shadow-lg'));
                parentCard.classList.add('border-primary', 'border-3', 'shadow-lg');
                
                if (window.innerWidth < 992 && subscriptionForm) {
                    subscriptionForm.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    } else {
        console.warn("Un ou plusieurs éléments HTML pour la sélection de plan sont introuvables. La fonctionnalité de sélection de plan pourrait ne pas marcher.");
    }

    if (subscriptionForm && submitButton && buttonText && buttonSpinner && cardErrors && selectedPlanTypeInput) {
        subscriptionForm.addEventListener('submit', function(event) {
            event.preventDefault(); 

            if (!selectedPlanTypeInput.value) {
                alert('Veuillez d\'abord sélectionner un plan d\'abonnement.');
                return;
            }
            const termsCheckbox = document.getElementById('terms-conditions');
            if (!termsCheckbox || !termsCheckbox.checked) {
                alert('Veuillez accepter les Termes et Conditions.');
                return;
            }

            buttonText.classList.add('d-none');
            buttonSpinner.classList.remove('d-none');
            submitButton.disabled = true;
            cardErrors.textContent = '';

            const selectedPaymentMethodRadio = document.querySelector('input[name="payment_method"]:checked');
            if (!selectedPaymentMethodRadio) {
                 alert('Veuillez sélectionner une méthode de paiement.');
                 buttonText.classList.remove('d-none');
                 buttonSpinner.classList.add('d-none');
                 submitButton.disabled = false;
                 return;
            }
            const selectedPaymentMethod = selectedPaymentMethodRadio.value;

            setTimeout(function() {
                const isSuccess = Math.random() < 0.8; 

                if (isSuccess) {
                    buttonText.textContent = 'Paiement Réussi !';
                    submitButton.classList.remove('btn-primary');
                    submitButton.classList.add('btn-success');
                    sessionStorage.setItem('paymentNotification', 'Votre paiement a été effectué avec succès ! Redirection en cours...');
                    window.location.href = "{{ route('patient.home') }}";
                } else {
                    buttonText.textContent = 'Procéder au Paiement';
                    buttonText.classList.remove('d-none');
                    buttonSpinner.classList.add('d-none');
                    submitButton.disabled = false;
                    cardErrors.textContent = 'Le paiement via ' + selectedPaymentMethod + ' a échoué. Veuillez réessayer.';
                    submitButton.classList.remove('btn-primary');
                    submitButton.classList.add('btn-danger');
                    setTimeout(() => {
                        submitButton.classList.remove('btn-danger');
                        submitButton.classList.add('btn-primary');
                    }, 2000);
                }
            }, 2500);
        });
    } else {
        console.warn("Un ou plusieurs éléments HTML pour la soumission du formulaire sont introuvables. La simulation de paiement pourrait ne pas marcher.");
    }
});
</script>
@endpush