@if(!auth()->user()->isPremium())
<div class="premium-alert alert alert-info alert-dismissible fade show mb-0" role="alert" id="premiumAlert">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <i class="fas fa-crown text-warning me-2"></i>
            <strong>Passez à Premium!</strong> Débloquez toutes les fonctionnalités et profitez d'un accès illimité.
            <a href="{{ route('subscription.premium') }}" class="alert-link ms-2">Découvrir les avantages</a>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="dismissPremiumAlert()"></button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const premiumAlert = document.getElementById('premiumAlert');
    const dismissedTime = localStorage.getItem('premiumAlertDismissed');
    const currentTime = new Date().getTime();

    // Si l'alerte a été fermée il y a plus de 24h, on la réaffiche
    if (dismissedTime && (currentTime - dismissedTime) < 24 * 60 * 60 * 1000) {
        premiumAlert.style.display = 'none';
    }
});

function dismissPremiumAlert() {
    localStorage.setItem('premiumAlertDismissed', new Date().getTime());
}
</script>

<style>
.premium-alert {
    position: sticky;
    top: 0;
    z-index: 1020;
    border-radius: 0;
    border: none;
    background: linear-gradient(to right, #4a90e2, #357abd);
    color: white;
}

.premium-alert .alert-link {
    color: #ffd700;
    text-decoration: none;
    font-weight: 600;
}

.premium-alert .alert-link:hover {
    color: #fff;
    text-decoration: underline;
}

.premium-alert .btn-close {
    color: white;
    opacity: 0.8;
}

.premium-alert .btn-close:hover {
    opacity: 1;
}
</style>
@endif
