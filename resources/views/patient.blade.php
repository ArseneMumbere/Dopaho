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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&libraries=places"></script>
<script>
let map, userMarker, placesService, directionsService, directionsRenderer;
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

function initMap() {
    // Centre initial sur Dakar
    const dakarCenter = { lat: 14.6937, lng: -17.4444 };

    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: dakarCenter,
        mapTypeId: 'satellite',
        mapTypeControl: false,
        streetViewControl: true,
        streetViewControlOptions: {
            position: google.maps.ControlPosition.RIGHT_TOP
        },
        fullscreenControl: true,
        fullscreenControlOptions: {
            position: google.maps.ControlPosition.RIGHT_TOP
        },
        tilt: 0
    });

    directionsService = new google.maps.DirectionsService();
    directionsRenderer = new google.maps.DirectionsRenderer({
        suppressMarkers: true,
        polylineOptions: {
            strokeColor: '#3498db',
            strokeWeight: 4
        }
    });
    
    directionsRenderer.setMap(map);
    placesService = new google.maps.places.PlacesService(map);

    // Créer un marqueur utilisateur par défaut au centre de Dakar
    userMarker = new google.maps.Marker({
        position: dakarCenter,
        map: map,
        icon: {
            path: google.maps.SymbolPath.CIRCLE,
            scale: 10,
            fillColor: '#007bff',
            fillOpacity: 1,
            strokeColor: '#ffffff',
            strokeWeight: 2
        },
        title: 'Votre position'
    });

    // Afficher les pharmacies par défaut
    filterServices('pharmacy');
}

function getUserLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
            const userLocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            map.setCenter(userLocation);

            // Ajouter le marqueur de l'utilisateur
            if (userMarker) userMarker.setMap(null);
            userMarker = new google.maps.Marker({
                position: userLocation,
                map: map,
                icon: {
                    path: google.maps.SymbolPath.CIRCLE,
                    scale: 10,
                    fillColor: '#007bff',
                    fillOpacity: 1,
                    strokeColor: '#ffffff',
                    strokeWeight: 2
                },
                title: 'Votre position'
            });

            // Afficher les pharmacies par défaut
            filterServices('pharmacy');
        });
    }
}

function filterServices(type) {
    // Réinitialiser les boutons
    document.querySelectorAll('.services-buttons .btn').forEach(btn => {
        btn.classList.remove('active');
    });
    document.querySelector(`button[onclick="filterServices('${type}')"]`).classList.add('active');

    // Effacer l'itinéraire précédent
    directionsRenderer.setDirections({ routes: [] });

    // Supprimer les marqueurs existants
    currentMarkers.forEach(marker => marker.setMap(null));
    currentMarkers = [];

    // Vider la liste des services
    const servicesList = document.getElementById('services-list');
    servicesList.innerHTML = '';

    // Afficher les services sélectionnés
    const services = ourServices[type];
    if (!services || !userMarker) return;

    // Calculer la distance pour chaque service
    const userPos = userMarker.getPosition().toJSON();
    services.forEach(service => {
        service.distance = calculateDistance(userPos, { lat: service.lat, lng: service.lng });
    });

    // Trier les services par distance
    services.sort((a, b) => a.distance - b.distance);

    // Ajouter les marqueurs et les éléments de liste
    services.forEach(service => {
        const marker = new google.maps.Marker({
            map: map,
            position: { lat: service.lat, lng: service.lng },
            icon: getServiceIcon(type),
            title: service.name,
            animation: google.maps.Animation.DROP
        });

                const serviceItem = document.createElement('div');
                serviceItem.className = 'service-item';
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
                    <button class="btn btn-sm btn-outline-primary w-100" onclick="getDirections(${service.lat}, ${service.lng})">
                        <i class="fas fa-directions me-1"></i>Itinéraire
                    </button>
                `;

                // Ajouter les interactions
                serviceItem.addEventListener('mouseover', () => {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                    setTimeout(() => marker.setAnimation(null), 750);
                });

                servicesList.appendChild(serviceItem);

                // Configurer la fenêtre d'info
                const infoWindow = new google.maps.InfoWindow({
                    content: serviceItem.innerHTML
                });

                marker.addListener('click', () => {
                    if (currentInfoWindow) currentInfoWindow.close();
                    infoWindow.open(map, marker);
                    currentInfoWindow = infoWindow;
                });

                currentMarkers.push(marker);
            });

            // Ajuster la vue de la carte pour montrer tous les marqueurs
            const bounds = new google.maps.LatLngBounds();
            currentMarkers.forEach(marker => bounds.extend(marker.getPosition()));
            bounds.extend(userMarker.getPosition());
            map.fitBounds(bounds);
        }
}

function getServiceIcon(type) {
    const icons = {
        pharmacy: {
            path: 'M12 2C8.7 2 6 4.7 6 8c0 2.4 1.4 4.5 3.4 5.5l-2 4.9h1.2l.8-2h5.2l.8 2h1.2l-2-4.9c2-.9 3.4-3 3.4-5.5 0-3.3-2.7-6-6-6zm0 2c2.2 0 4 1.8 4 4s-1.8 4-4 4-4-1.8-4-4 1.8-4 4-4zm-2.3 10l.8-2h3l.8 2h-4.6z',
            fillColor: '#28a745',
            strokeColor: '#FFFFFF',
            strokeWeight: 1,
            fillOpacity: 1,
            scale: 1.5,
            anchor: new google.maps.Point(12, 12)
        },
        hospital: {
            path: 'M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-8.5 12H9v-2h1.5v2zm0-4H9V9h1.5v2zm4 4H13v-2h1.5v2zm0-4H13V9h1.5v2z',
            fillColor: '#dc3545',
            strokeColor: '#FFFFFF',
            strokeWeight: 1,
            fillOpacity: 1,
            scale: 1.5,
            anchor: new google.maps.Point(12, 12)
        },
        'blood-bank': {
            path: 'M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z',
            fillColor: '#dc3545',
            strokeColor: '#FFFFFF',
            strokeWeight: 1,
            fillOpacity: 1,
            scale: 1.2,
            anchor: new google.maps.Point(12, 12)
        },
        clinic: {
            path: 'M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-8.5 12H9v-2h1.5v2zm0-4H9V9h1.5v2zm4 4H13v-2h1.5v2zm0-4H13V9h1.5v2z',
            fillColor: '#17a2b8',
            strokeColor: '#FFFFFF',
            strokeWeight: 1,
            fillOpacity: 1,
            scale: 1.5,
            anchor: new google.maps.Point(12, 12)
        }
    };
    return icons[type] || icons.pharmacy;
}

function calculateDistance(p1, p2) {
    const R = 6371; // Rayon de la Terre en km
    const dLat = (p2.lat - p1.lat) * Math.PI / 180;
    const dLon = (p2.lng - p1.lng) * Math.PI / 180;
    const a = Math.sin(dLat/2) * Math.sin(dLat/2) +
        Math.cos(p1.lat * Math.PI / 180) * Math.cos(p2.lat * Math.PI / 180) *
        Math.sin(dLon/2) * Math.sin(dLon/2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
    const d = R * c;
    return d;
}

function getDirections(lat, lng) {
    if (!userMarker) return;

    const destination = { lat: lat, lng: lng };
    const origin = userMarker.getPosition();

    directionsService.route({
        origin: origin,
        destination: destination,
        travelMode: google.maps.TravelMode.DRIVING
    }, (response, status) => {
        if (status === 'OK') {
            directionsRenderer.setDirections(response);

            // Cacher les marqueurs de service pendant l'affichage de l'itinéraire
            serviceMarkers.forEach(marker => marker.setMap(null));

            // Créer un bouton pour revenir à la vue des services
            const backButton = document.createElement('button');
            backButton.className = 'btn btn-primary position-absolute top-0 end-0 m-3';
            backButton.innerHTML = '<i class="fas fa-times me-2"></i>Fermer l\'itinéraire';
            backButton.onclick = () => {
                directionsRenderer.setDirections({ routes: [] });
                filterServices(document.querySelector('.services-buttons .btn.active').getAttribute('onclick').match(/filterServices\('(.+)'\)/)[1]);
                backButton.remove();
            };
            document.getElementById('map').appendChild(backButton);
        } else {
            alert('Impossible de calculer l\'itinéraire : ' + status);
        }
    });
}
</script>
@endpush

@push('scripts')
<script>
let map, markers = [];

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 14.6937, lng: -17.4444 },
        zoom: 13,
        mapTypeId: 'satellite',
        streetViewControl: false,
        fullscreenControl: false,
        mapTypeControl: false,
        zoomControl: true,
        zoomControlOptions: {
            position: google.maps.ControlPosition.RIGHT_CENTER
        }
    });

    // Demander la position de l'utilisateur
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                // Créer un marqueur pour la position de l'utilisateur
                new google.maps.Marker({
                    position: pos,
                    map: map,
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        scale: 12,
                        fillColor: '#000000',
                        fillOpacity: 1,
                        strokeColor: '#FFFFFF',
                        strokeWeight: 3
                    },
                    title: 'Votre position',
                    zIndex: 1000 // Pour s'assurer que le marqueur de position est toujours au-dessus
                });

                // Centrer la carte sur la position de l'utilisateur
                map.setCenter(pos);

                // Afficher tous les services
                showAllServices(pos);
            },
            (error) => {
                console.error('Erreur de géolocalisation:', error);
                // En cas d'erreur, utiliser la position par défaut (Dakar)
                showAllServices();
            }
        );
    } else {
        console.log('Géolocalisation non supportée');
        // Si la géolocalisation n'est pas supportée, utiliser la position par défaut
        showAllServices();
    }
}

function showAllServices(userPosition = null) {
    // Nettoyer les marqueurs existants
    markers.forEach(marker => marker.setMap(null));
    markers = [];

    const service = new google.maps.places.PlacesService(map);
    const position = userPosition || { lat: 14.6937, lng: -17.4444 };
    
    // Définir les types de services avec leurs couleurs
    const serviceTypes = [
        { type: 'pharmacy', color: '#4CAF50', label: 'P' },  // Vert
        { type: 'hospital', color: '#F44336', label: 'H' },  // Rouge
        { type: 'doctor', color: '#2196F3', label: 'D' },    // Bleu
        { type: 'clinic', color: '#FF9800', label: 'C' }     // Orange
    ];

    // Rechercher tous les types de services
    serviceTypes.forEach(serviceType => {
        const searchRequest = {
            location: position,
            radius: 3000, // Augmenté à 3km
            type: serviceType.type
        };

        service.nearbySearch(searchRequest, (results, status) => {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
                results.forEach(place => {
                    // Créer un marqueur personnalisé
                    const marker = new google.maps.Marker({
                        position: place.geometry.location,
                        map: map,
                        title: place.name,
                        animation: google.maps.Animation.DROP,
                        label: {
                            text: serviceType.label,
                            color: 'white',
                            fontSize: '14px',
                            fontWeight: 'bold'
                        },
                        icon: {
                            path: google.maps.SymbolPath.CIRCLE,
                            fillColor: serviceType.color,
                            fillOpacity: 0.9,
                            strokeWeight: 2,
                            strokeColor: '#FFFFFF',
                            scale: 10
                        }
                    });

                    // Ajouter une fenêtre d'info
                    const infowindow = new google.maps.InfoWindow({
                        content: `
                            <div style="min-width: 200px;">
                                <h6 class="mb-1">${place.name}</h6>
                                <p class="mb-1 small">${place.vicinity}</p>
                                ${place.rating ? `
                                    <div class="mb-1">
                                        <span class="text-warning">${'★'.repeat(Math.round(place.rating))}${'☆'.repeat(5-Math.round(place.rating))}</span>
                                        <small class="text-muted">(${place.user_ratings_total || 0})</small>
                                    </div>
                                ` : ''}
                                <div class="mt-2">
                                    <button onclick="getDirections(${place.geometry.location.lat()}, ${place.geometry.location.lng()})" 
                                            class="btn btn-sm btn-primary">
                                        <i class="fas fa-directions"></i> Itinéraire
                                    </button>
                                    <button onclick="window.open('tel:${place.formatted_phone_number || ''}')" 
                                            class="btn btn-sm btn-success ms-1" 
                                            ${!place.formatted_phone_number ? 'disabled' : ''}>
                                        <i class="fas fa-phone"></i> Appeler
                                    </button>
                                </div>
                            </div>
                        `
                    });

                    marker.addListener('click', () => {
                        if (currentInfoWindow) currentInfoWindow.close();
                        infowindow.open(map, marker);
                        currentInfoWindow = infowindow;
                    });

                    markers.push(marker);
                });

                // Ajuster la vue pour montrer tous les marqueurs
                const bounds = new google.maps.LatLngBounds();
                if (userPosition) bounds.extend(userPosition);
                markers.forEach(marker => bounds.extend(marker.getPosition()));
                map.fitBounds(bounds);
            }
        });
    });
}

function filterServices(type, userPosition = null) {
    // Appeler showAllServices au lieu du code précédent
    showAllServices(userPosition);

        if (status === google.maps.places.PlacesServiceStatus.OK) {
            // Trier les résultats par distance
            if (userPosition) {
                results.sort((a, b) => {
                    const distA = google.maps.geometry.spherical.computeDistanceBetween(userPosition, a.geometry.location);
                    const distB = google.maps.geometry.spherical.computeDistanceBetween(userPosition, b.geometry.location);
                    return distA - distB;
                });
            }

            // Limiter à 5 résultats les plus proches
            results.slice(0, 5).forEach(place => {
                const marker = new google.maps.Marker({
                    position: place.geometry.location,
                    map: map,
                    title: place.name,
                    animation: google.maps.Animation.DROP,
                    icon: {
                        url: place.icon,
                        scaledSize: new google.maps.Size(32, 32)
                    }
                });

                // Ajouter une fenêtre d'info
                const infowindow = new google.maps.InfoWindow({
                    content: `
                        <div style="min-width: 200px;">
                            <h6 class="mb-1">${place.name}</h6>
                            <p class="mb-1 small">${place.vicinity}</p>
                            ${place.rating ? `
                                <div class="mb-1">
                                    <span class="text-warning">${'★'.repeat(Math.round(place.rating))}${'☆'.repeat(5-Math.round(place.rating))}</span>
                                    <small class="text-muted">(${place.user_ratings_total})</small>
                                </div>
                            ` : ''}
                            <button onclick="getDirections(${place.geometry.location.lat()}, ${place.geometry.location.lng()})" 
                                    class="btn btn-sm btn-primary mt-2">
                                <i class="fas fa-directions"></i> Itinéraire
                            </button>
                        </div>
                    `
                });

                marker.addListener('click', () => {
                    if (currentInfoWindow) currentInfoWindow.close();
                    infowindow.open(map, marker);
                    currentInfoWindow = infowindow;
                });

                markers.push(marker);
            });

            // Ajuster la vue pour montrer tous les marqueurs
            const bounds = new google.maps.LatLngBounds();
            if (userPosition) bounds.extend(userPosition);
            markers.forEach(marker => bounds.extend(marker.getPosition()));
            map.fitBounds(bounds);
        }
    });

}

window.initMap = initMap;
window.filterServices = filterServices;
</script>
<!-- Chargement de l'API Google Maps avec une clé de test -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-eISE5oxwvNyQAg7_WIxG4WLzHNNpcAs&libraries=places,geometry&callback=initMap" onerror="gm_authFailure()"></script>
@endpush

@push('scripts')
<script>
let map, markers = [];

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 14.6937, lng: -17.4444 },
        zoom: 13,
        mapTypeId: 'satellite'
    });

    // Ajouter un marqueur au centre
    new google.maps.Marker({
        position: { lat: 14.6937, lng: -17.4444 },
        map: map,
        title: 'Dakar'
    });

    // Activer les pharmacies par défaut
    filterServices('pharmacy');
}

function filterServices(type) {
    // Nettoyer les marqueurs existants
    markers.forEach(marker => marker.setMap(null));
    markers = [];

    // Activer le bouton sélectionné
    document.querySelectorAll('.services-buttons .btn').forEach(btn => {
        if(btn.textContent.toLowerCase().includes(type)) {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }
    });

    // Ajouter les nouveaux marqueurs selon le type
    const services = {
        pharmacy: [
            { lat: 14.6937, lng: -17.4444, title: 'Pharmacie Centrale' },
            { lat: 14.6927, lng: -17.4434, title: 'Pharmacie du Marché' }
        ],
        hospital: [
            { lat: 14.6957, lng: -17.4464, title: 'Hôpital Principal' },
            { lat: 14.6947, lng: -17.4474, title: 'Clinique Casahous' }
        ],
        'blood-bank': [
            { lat: 14.6967, lng: -17.4484, title: 'Centre de Transfusion' },
            { lat: 14.6977, lng: -17.4494, title: 'Banque de Sang' }
        ],
        clinic: [
            { lat: 14.6987, lng: -17.4504, title: 'Clinique du Cap' },
            { lat: 14.6997, lng: -17.4514, title: 'Centre Médical' }
        ]
    };

    services[type].forEach(service => {
        const marker = new google.maps.Marker({
            position: { lat: service.lat, lng: service.lng },
            map: map,
            title: service.title,
            animation: google.maps.Animation.DROP
        });
        markers.push(marker);
    });

    // Ajuster la vue pour montrer tous les marqueurs
    const bounds = new google.maps.LatLngBounds();
    markers.forEach(marker => bounds.extend(marker.getPosition()));
    map.fitBounds(bounds);
}

window.initMap = initMap;
window.filterServices = filterServices;
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap"></script>
@endpush
