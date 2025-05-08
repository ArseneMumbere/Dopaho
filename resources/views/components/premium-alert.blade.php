@if(!auth()->user()->isPremium())
<div class="alert premium-alert alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert" id="premiumMainAlert">
     <div>
         <i class="fas fa-crown text-warning me-2"></i>
         <strong>Passez à Premium pour une expérience complète !</strong>
         <a href="{{ route('subscription.premium') }}" class="alert-link ms-2">Découvrir les avantages</a>
     </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<style>
.premium-alert {
    margin-bottom: 1.5rem; /* Ajustez cette valeur si nécessaire */
    background: linear-gradient(to right, #667eea, #764ba2);
    color: white;
    padding: 0.8rem 1rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.premium-alert .alert-link {
    color: #f0e68c; /* Jaune pâle pour contraste sur fond bleu/violet */
    text-decoration: none;
    font-weight: 600;
    margin-left: 0.75rem;
}

.premium-alert .alert-link:hover {
    color: #fff;
    text-decoration: underline;
}

.premium-alert .btn-close {
    color: white;
    opacity: 0.85;
    font-size: 0.9rem; /* Taille ajustée */
    padding: 0.5rem; /* Clic plus facile */
}

.premium-alert .btn-close:hover {
    opacity: 1;
}

.premium-alert i.fa-crown {
    color: #ffd700; /* Garder la couleur or pour l'icône */
    margin-right: 0.5rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const alertElement = document.getElementById('premiumMainAlert'); // ID de votre alerte

    if (alertElement && alertElement.classList.contains('show')) {
        // Minuteur pour masquer l'alerte automatiquement après 60 secondes
        const autoDismissTimer = setTimeout(() => {
            const bsAlert = bootstrap.Alert.getInstance(alertElement);
            if (bsAlert) {
                bsAlert.close(); // Utilise la méthode de fermeture de Bootstrap
            } else {
                // Fallback si l'instance Alert de Bootstrap n'est pas trouvée
                alertElement.classList.remove('show');
                // Pour s'assurer qu'elle est bien masquée après la transition "fade"
                setTimeout(() => {
                    if (!alertElement.classList.contains('show')) { // Revérifier au cas où elle aurait été réaffichée
                        alertElement.style.display = 'none';
                    }
                }, 160); // 150ms est la durée de transition de .fade, +10ms de marge
            }
        }, 60000); // 60 secondes en millisecondes

        // Si l'utilisateur ferme l'alerte manuellement avant la fin du minuteur,
        // nous annulons le minuteur pour éviter des erreurs ou des comportements inattendus.
        alertElement.addEventListener('close.bs.alert', function () {
            clearTimeout(autoDismissTimer);
        });
    }
});
</script>
@endif
