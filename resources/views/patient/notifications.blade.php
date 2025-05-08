@extends('layouts.patient')

@section('patient_content')
<div class="container">
    <div class="row">
        <!-- Toutes les notifications -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title mb-0">Notifications</h5>
                        <button class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-check-double"></i> Tout marquer comme lu
                        </button>
                    </div>

                    <div class="notifications-list">
                    <div id="payment-notification-area" class="alert alert-success" style="display: none; margin-bottom: 1rem;"></div>
                        <!-- Notification non lue -->
                        <div class="notification-item unread">
                            <div class="notification-icon bg-primary">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="notification-content">
                                <h6>Rappel de rendez-vous</h6>
                                <p>Votre rendez-vous est prévu pour demain à 14:30</p>
                                <small class="text-muted">Il y a 2 heures</small>
                            </div>
                            <div class="notification-actions">
                                <button class="btn btn-link text-muted">
                                    <i class="fas fa-check"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Notification résultats -->
                        <div class="notification-item unread">
                            <div class="notification-icon bg-success">
                                <i class="fas fa-file-medical"></i>
                            </div>
                            <div class="notification-content">
                                <h6>Résultats disponibles</h6>
                                <p>Vos résultats d'analyse sont disponibles</p>
                                <small class="text-muted">Il y a 1 jour</small>
                            </div>
                            <div class="notification-actions">
                                <button class="btn btn-link text-muted">
                                    <i class="fas fa-check"></i>
                                </button>
                            </div>
                        </div>



                        <!-- Notification résultats d'analyse -->
                        <div class="notification-item">
                            <div class="notification-icon bg-info">
                                <i class="fas fa-flask"></i>
                            </div>
                            <div class="notification-content">
                                <h6>Nouveaux résultats d'analyse</h6>
                                <p>Vos résultats d'analyse sanguine sont disponibles</p>
                                <small class="text-muted">Il y a 3 jours</small>
                            </div>
                            <div class="notification-actions">
                                <button class="btn btn-link text-muted">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Notification système -->
                        <div class="notification-item">
                            <div class="notification-icon bg-secondary">
                                <i class="fas fa-cog"></i>
                            </div>
                            <div class="notification-content">
                                <h6>Mise à jour du système</h6>
                                <p>De nouvelles fonctionnalités sont disponibles</p>
                                <small class="text-muted">Il y a 4 jours</small>
                            </div>
                            <div class="notification-actions">
                                <button class="btn btn-link text-muted">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filtres de notifications -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title mb-0">Filtrer par type</h5>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-primary active" onclick="filterNotifications('all')">
                                Tous
                            </button>
                            <button type="button" class="btn btn-outline-primary" onclick="filterNotifications('appointment')">
                                Rendez-vous
                            </button>
                            <button type="button" class="btn btn-outline-primary" onclick="filterNotifications('result')">
                                Résultats
                            </button>
                            <button type="button" class="btn btn-outline-primary" onclick="filterNotifications('treatment')">
                                Traitements
                            </button>
                            <button type="button" class="btn btn-outline-primary" onclick="filterNotifications('system')">
                                Système
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const paymentNotification = sessionStorage.getItem('paymentNotification');
    if (paymentNotification) {
        const notificationArea = document.getElementById('payment-notification-area');
        if (notificationArea) {
            // Créer une structure HTML similaire aux autres notifications
            notificationArea.innerHTML = `
                <div class="notification-icon bg-success">
                    <i class="fas fa-check-circle"></i> <!-- Icône de succès -->
                </div>
                <div class="notification-content">
                    <h6>Paiement Réussi</h6>
                    <p>${paymentNotification}</p>
                    <small class="text-muted">À l'instant</small>
                </div>
                <div class="notification-actions">
                    <!-- Peut-être un bouton pour la masquer si besoin -->
                </div>
            `;
            notificationArea.className = 'notification-item unread'; // Appliquer les mêmes classes
            notificationArea.style.display = 'flex'; // S'assurer qu'elle s'affiche comme les autres (flex)
            
            // Clignotement pour attirer l'attention
            let count = 0;
            const interval = setInterval(function() {
                notificationArea.style.backgroundColor = count % 2 === 0 ? '#e6ffed' : '#d4edda'; // Alternance de verts plus doux, adapté au style .unread
                count++;
                if (count > 5) { // Clignote 3 fois (6 changements)
                    clearInterval(interval);
                    notificationArea.style.backgroundColor = ''; // Retour au fond par défaut pour .unread ou .notification-item:hover
                }
            }, 500);
        }
        sessionStorage.removeItem('paymentNotification');
    }
});
</script>
@endpush


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

    .notifications-header {
        padding-bottom: 1rem;
        border-bottom: 1px solid #eee;
    }

    .btn-outline-primary {
        color: #3498db;
        border-color: #3498db;
    }

    .btn-outline-primary:hover,
    .btn-outline-primary.active {
        background-color: #3498db;
        border-color: #3498db;
        color: #fff;
    }

    .notification-item {
        display: flex;
        align-items: flex-start;
        padding: 1rem;
        border-bottom: 1px solid #eee;
        transition: background-color 0.3s ease;
    }

    .notification-item:last-child {
        border-bottom: none;
    }

    .notification-item:hover {
        background-color: #f8f9fa;
    }

    .notification-item.unread {
        background-color: #f8f9fa;
    }

    .notification-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        color: #fff;
    }

    .notification-content {
        flex: 1;
    }

    .notification-content h6 {
        margin: 0 0 0.25rem;
        color: #2c3e50;
    }

    .notification-content p {
        margin: 0 0 0.25rem;
        color: #666;
    }

    .notification-actions {
        margin-left: 1rem;
    }

    .notification-actions .btn-link {
        color: #95a5a6;
        padding: 0.25rem;
    }

    .notification-actions .btn-link:hover {
        color: #2c3e50;
    }

    .bg-primary {
        background-color: #3498db !important;
    }

    .bg-info {
        background-color: #17a2b8 !important;
    }
</style>
@endpush
