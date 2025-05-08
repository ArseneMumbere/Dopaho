@extends('layouts.patient')

@section('patient_content')
<div class="container">
    <div class="row mt-4">
        <div class="row mb-4">
            <!-- Résumé des traitements -->
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-pills me-2"></i>Traitements en cours
                        </h5>
                        <div class="current-treatments">
                            <div class="treatment-item mb-3">
                                <div class="treatment-info">
                                    <h6>Antibiotique</h6>
                                    <p class="mb-2">3 fois par jour - Jusqu'au 15 mai</p>
                                </div>
                                <div class="treatment-progress">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 65%"></div>
                                    </div>
                                    <small>7 jours restants</small>
                                </div>
                            </div>
                            <div class="treatment-item">
                                <div class="treatment-info">
                                    <h6>Vitamine D</h6>
                                    <p class="mb-2">1 fois par jour - Traitement continu</p>
                                </div>
                                <div class="treatment-progress">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                                    </div>
                                    <small>En cours</small>
                                </div>
                            </div>
                        </div>
                        <div class="text-end mt-4">
                            <a href="{{ route('patient.medical-data') }}" class="btn btn-primary">
                                <i class="fas fa-eye me-2"></i>Voir mes traitements
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pharmacies à proximité -->
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-prescription-bottle-alt me-2"></i>Pharmacies à proximité
                        </h5>
                        <div class="pharmacy-list">
                            <div class="pharmacy-item mb-3 p-3 bg-light rounded">
                                <div class="pharmacy-info">
                                    <h6 class="mb-2">Pharmacie Centrale</h6>
                                    <p class="mb-2"><i class="fas fa-map-marker-alt me-2 text-primary"></i>123 Avenue de la République</p>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-clock me-2 text-success"></i>
                                        <small class="text-success">Ouverte jusqu'à 20h</small>
                                    </div>
                                </div>
                            </div>
                            <div class="pharmacy-item p-3 bg-light rounded">
                                <div class="pharmacy-info">
                                    <h6 class="mb-2">Pharmacie du Marché</h6>
                                    <p class="mb-2"><i class="fas fa-map-marker-alt me-2 text-primary"></i>45 Rue du Commerce</p>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-clock me-2 text-warning"></i>
                                        <small class="text-warning">Ferme dans 30 minutes</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-end mt-4">
                            <a href="{{ route('patient.pharmacies') }}" class="btn btn-primary">
                                <i class="fas fa-search me-2"></i>Trouver une pharmacie
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carte des services -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-map-marked-alt me-2"></i>Services à proximité
                    </h5>
                    <div class="services-map-container mb-3 position-relative">
                        <div id="map" style="height: 500px; width: 100%; border-radius: 8px;"></div>
                    </div>
                    <div class="services-buttons text-center mt-3">
                        <button class="btn btn-outline-primary m-2" onclick="filterServices('pharmacy')">
                            <i class="fas fa-prescription-bottle-alt"></i> Pharmacies
                        </button>
                        <button class="btn btn-outline-danger m-2" onclick="filterServices('hospital')">
                            <i class="fas fa-hospital"></i> Hôpitaux
                        </button>
                        <button class="btn btn-outline-danger m-2" onclick="filterServices('blood-bank')">
                            <i class="fas fa-tint"></i> Banques de sang
                        </button>
                        <button class="btn btn-outline-info m-2" onclick="filterServices('clinic')">
                            <i class="fas fa-clinic-medical"></i> Cliniques
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<style>
    #map {
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    #nearby-services {
        z-index: 1;
        background-color: rgba(255, 255, 255, 0.95);
    }

    #nearby-services::-webkit-scrollbar {
        width: 6px;
    }

    #nearby-services::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
    }

    #nearby-services::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 3px;
    }

    .service-item {
        padding: 10px;
        border-radius: 8px;
        margin-bottom: 10px;
        border: 1px solid #eee;
        transition: all 0.3s ease;
    }

    .service-item:hover {
        background-color: #f8f9fa;
        transform: translateY(-2px);
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .service-item .distance {
        font-size: 0.8rem;
        color: #666;
    }

    .service-rating {
        font-size: 0.9rem;
    }

    .service-rating .stars {
        color: #ffc107;
    }

    .service-rating .count {
        color: #6c757d;
        font-size: 0.8rem;
    }

    .services-buttons {
        margin-top: 1rem;
    }

    .services-buttons .btn {
        min-width: 120px;
        transition: all 0.3s ease;
    }

    .services-buttons .btn:hover {
        transform: translateY(-2px);
    }

    .user-marker i {
        color: #007bff;
        filter: drop-shadow(0 0 3px rgba(0,0,0,0.3));
    }

    .service-marker i {
        filter: drop-shadow(0 0 2px rgba(0,0,0,0.2));
    }

    .leaflet-popup-content {
        text-align: center;
    }

    .leaflet-popup-content button {
        margin-top: 0.5rem;
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
        padding-bottom: 0.5rem;
        border-bottom: 1px solid #eee;
    }

    /* Rendez-vous */
    .appointment-item {
        display: flex;
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #eee;
    }

    .appointment-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .appointment-date {
        min-width: 80px;
        text-align: center;
        margin-right: 1rem;
    }

    .appointment-date strong {
        display: block;
        color: #3498db;
        font-size: 1.1rem;
    }

    .appointment-date span {
        color: #666;
        font-size: 0.9rem;
    }

    .appointment-info h6 {
        margin: 0 0 0.25rem;
        color: #2c3e50;
    }

    .appointment-info p {
        margin: 0;
        color: #666;
        font-size: 0.9rem;
    }

    /* Traitements */
    .treatment-item {
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #eee;
    }

    .treatment-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .treatment-info h6 {
        margin: 0 0 0.25rem;
        color: #2c3e50;
    }

    .treatment-info p {
        margin: 0 0 0.5rem;
        color: #666;
        font-size: 0.9rem;
    }

    .treatment-progress {
        margin-top: 0.5rem;
    }

    .treatment-progress .progress {
        height: 0.5rem;
        margin-bottom: 0.25rem;
    }

    .treatment-progress small {
        color: #666;
        font-size: 0.8rem;
    }

    /* Notifications */
    .notification-item {
        padding: 1rem;
        margin-bottom: 0.5rem;
        background: #f8f9fa;
        border-radius: 0.5rem;
    }

    .notification-content h6 {
        margin: 0 0 0.25rem;
        color: #2c3e50;
    }

    .notification-content p {
        margin: 0 0 0.25rem;
        color: #666;
    }

    .notification-content small {
        font-size: 0.8rem;
    }

    /* Pharmacies */
    .pharmacy-item {
        padding: 1rem;
        margin-bottom: 0.5rem;
        background: #f8f9fa;
        border-radius: 0.5rem;
    }

    .pharmacy-info h6 {
        margin: 0 0 0.25rem;
        color: #2c3e50;
    }

    .pharmacy-info p {
        margin: 0 0 0.25rem;
        color: #666;
    }

    .pharmacy-info small {
        font-size: 0.8rem;
    }

    /* Boutons */
    .btn-primary {
        background-color: #3498db;
        border-color: #3498db;
    }

    .btn-primary:hover {
        background-color: #2980b9;
        border-color: #2980b9;
    }

    @media (max-width: 768px) {
        .appointment-date {
            min-width: 60px;
        }
    }
</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
let map, userMarker; // placesService, directionsService, directionsRenderer sont spécifiques à Google Maps
let currentInfoWindow = null;
let currentMarkers = [];

// Définition des services avec leurs coordonnées
const ourServices = {
    pharmacy: [
        { name: 'Pharmacie Centrale', lat: 14.6937, lng: -17.4444, address: '123 Avenue Léopold Sédar Senghor', rating: 4.5, total_ratings: 127 },
        { name: 'Pharmacie du Marché', lat: 14.6927, lng: -17.4434, address: '45 Rue Carnot', rating: 4.2, total_ratings: 89 },
        { name: 'Grande Pharmacie', lat: 14.6917, lng: -17.4454, address: '78 Boulevard de la République', rating: 4.7, total_ratings: 156 }
    ],
    hospital: [
        { name: 'Hôpital Principal', lat: 14.6957, lng: -17.4464, address: '1 Avenue Nelson Mandela', rating: 4.3, total_ratings: 342 },
        { name: 'Clinique Casahous', lat: 14.6947, lng: -17.4474, address: '15 Rue Mohamed V', rating: 4.1, total_ratings: 178 }
    ],
    'blood-bank': [
        { name: 'Centre National de Transfusion Sanguine', lat: 14.6967, lng: -17.4484, address: '33 Avenue Cheikh Anta Diop', rating: 4.4, total_ratings: 92 },
        { name: 'Banque de Sang Régionale', lat: 14.6977, lng: -17.4494, address: '55 Rue de Thann', rating: 4.0, total_ratings: 64 }
    ],
    clinic: [
        { name: 'Clinique du Cap', lat: 14.6987, lng: -17.4504, address: '88 Avenue Georges Pompidou', rating: 4.6, total_ratings: 234 },
        { name: 'Centre Médical de Dakar', lat: 14.6997, lng: -17.4514, address: '100 Boulevard Martin Luther King', rating: 4.8, total_ratings: 187 },
        { name: 'Polyclinique', lat: 14.7007, lng: -17.4524, address: '120 Rue Félix Eboue', rating: 4.4, total_ratings: 156 }
    ]
};

// L'initialisation est maintenant gérée par l'événement window.load
\
function initMap() {
    // Centre initial sur Dakar
    const dakarCenter = { lat: 14.6937, lng: -17.4444 };

    map = L.map('map').setView([dakarCenter.lat, dakarCenter.lng], 14);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Créer un marqueur utilisateur par défaut au centre de Dakar
    userMarker = L.marker([dakarCenter.lat, dakarCenter.lng]).addTo(map)
        .bindPopup('Votre position')
        .openPopup();

    // Afficher les pharmacies par défaut (sera adapté plus tard)
    // filterServices('pharmacy');
    getUserLocation(); // Tenter de localiser l'utilisateur au démarrage
}

function getUserLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
            const userLocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            map.setView([userLocation.lat, userLocation.lng], map.getZoom());

            if (userMarker) {
                userMarker.setLatLng([userLocation.lat, userLocation.lng])
                    .setPopupContent('Votre position actuelle').openPopup();
            } else {
                userMarker = L.marker([userLocation.lat, userLocation.lng]).addTo(map)
                    .bindPopup('Votre position actuelle').openPopup();
            }
            
            // Une fois la position obtenue, on peut filtrer les services
            filterServices('pharmacy'); 

        }, () => {
            // En cas d'échec de la géolocalisation, afficher les services par défaut autour du centre de Dakar
            console.warn("Géolocalisation échouée. Affichage des services autour du centre par défaut.");
            filterServices('pharmacy'); 
        });
    } else {
        // Navigateur ne supporte pas la géolocalisation
        console.warn("La géolocalisation n\\'est pas supportée par ce navigateur. Affichage des services autour du centre par défaut.");
        filterServices('pharmacy');
    }
}

function filterServices(type) {
    // Réinitialiser les boutons
    document.querySelectorAll('.services-buttons .btn').forEach(btn => {
        btn.classList.remove('active');
    });
    const activeButton = document.querySelector(`button[onclick="filterServices('${type}')"]`);
    if (activeButton) activeButton.classList.add('active');

    // Effacer l'itinéraire précédent (si un système d'itinéraire est ajouté plus tard)
    // directionsRenderer.setDirections({ routes: [] }); // Commenté

    // Supprimer les marqueurs existants
    currentMarkers.forEach(marker => map.removeLayer(marker));
    currentMarkers = [];

    // Vider la liste des services (si affichée en dehors de la carte)
    const servicesList = document.getElementById('services-list');
    if (servicesList) servicesList.innerHTML = ''; // S'assurer que l'élément existe

    const servicesData = ourServices[type];
    if (!servicesData || !userMarker) {
        console.log("Données de service ou marqueur utilisateur manquant pour le type:", type);
        return;
    }

    const userLatLng = userMarker.getLatLng();

    servicesData.forEach(service => {
        service.distance = userLatLng.distanceTo(L.latLng(service.lat, service.lng)) / 1000; // en km
    });

    servicesData.sort((a, b) => a.distance - b.distance);

    servicesData.forEach(service => {
        // Pour l'icône, nous utiliserons le marqueur par défaut de Leaflet pour l'instant
        // const icon = getServiceIcon(type); // Commenté car non adapté à Leaflet
        const marker = L.marker([service.lat, service.lng]) // Utilisez l'icône par défaut
            .addTo(map);

        const popupContent = `
            <div class="text-center">
                <strong>${service.name}</strong><br>
                <small>${service.address}</small><br>
                Distance: ${service.distance.toFixed(1)} km<br>
                Note: ${ '★'.repeat(Math.round(service.rating))}${'☆'.repeat(5-Math.round(service.rating))} (${service.total_ratings})<br>
                <button class="btn btn-sm btn-link p-0 mt-1" onclick="alert('Fonctionnalité d\'itinéraire à implémenter avec Leaflet.')">
                    <i class="fas fa-directions"></i> Itinéraire
                </button>
            </div>
        `;
        marker.bindPopup(popupContent);

        // Si vous avez une liste HTML à remplir à côté de la carte :
        if (servicesList) {
            const serviceItem = document.createElement('div');
            serviceItem.className = 'service-item'; // Assurez-vous que cette classe est stylée
            serviceItem.innerHTML = `
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <h6 class="mb-0">${service.name}</h6>
                    <span class="distance">
                        <i class="fas fa-location-dot me-1"></i>
                        ${service.distance.toFixed(1)} km
                    </span>
                </div>
                <p class="mb-2 small text-muted">${service.address}</p>
                <div class="service-rating d-flex align-items-center mb-2">
                    <span class="stars me-2">${'★'.repeat(Math.round(service.rating))}${'☆'.repeat(5-Math.round(service.rating))}</span>
                    <span class="count">(${service.total_ratings})</span>
                </div>
                <button class="btn btn-sm btn-outline-primary w-100" onclick="alert('Fonctionnalité d\'itinéraire à implémenter avec Leaflet.')">
                    <i class="fas fa-directions me-1"></i>Itinéraire
                </button>
            `;
            servicesList.appendChild(serviceItem);
        }

        currentMarkers.push(marker);
    });

    // Ajuster la vue de la carte pour montrer tous les marqueurs (y compris l'utilisateur)
    if (currentMarkers.length > 0) {
        const group = L.featureGroup([userMarker, ...currentMarkers]);
        map.fitBounds(group.getBounds().pad(0.3)); // pad ajoute un peu d'espace
    } else if (userMarker) {
        map.setView(userMarker.getLatLng(), 14); // Centre sur l'utilisateur si pas d'autres marqueurs
    }
}

// function getServiceIcon(type) { ... } // Commenté car doit être adapté pour Leaflet (L.icon ou L.divIcon)

function calculateDistance(point1, point2) { // point1 et point2 sont des objets L.latLng ou {lat, lng}
    const latLng1 = (point1 instanceof L.LatLng) ? point1 : L.latLng(point1.lat, point1.lng);
    const latLng2 = (point2 instanceof L.LatLng) ? point2 : L.latLng(point2.lat, point2.lng);
    // Vérifier si la conversion a réussi et si les points sont valides
    if (!latLng1 || !latLng2 || 
        typeof latLng1.lat === 'undefined' || typeof latLng1.lng === 'undefined' ||
        typeof latLng2.lat === 'undefined' || typeof latLng2.lng === 'undefined') {
        console.error("Invalid points for distance calculation: ", point1, point2);
        return 0;
    }
    return latLng1.distanceTo(latLng2) / 1000; // Retourne la distance en kilomètres
}

// function getDirections(lat, lng) { ... } // Commenté car dépend de Google DirectionsService

window.onload = initMap;
</script>
@endpush

