@extends('layouts.app')

@include('layouts.patient-styles')

@section('content')
    <!-- Loading Screen -->
    <div class="loading">
        <div class="loading-spinner"></div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="fas fa-heartbeat"></i> Dopaho
        </a>

        <!-- User Info -->
        <div class="user-info mb-4 text-center">
            <div class="user-avatar mb-2">
                <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->nom . ' ' . Auth::user()->prenom) }}" 
                     class="rounded-circle" 
                     style="width: 80px; height: 80px; object-fit: cover;"
                     alt="Photo de profil">
            </div>
            <div class="user-name">
                {{ Auth::user()->prenom }} {{ Auth::user()->nom }}
            </div>
        </div>

        <!-- Bouton Premium -->
        @if(!auth()->user()->isPremium())
        <a href="{{ route('subscription.premium') }}" class="btn btn-warning mb-4">
            <i class="fas fa-crown me-2"></i>Passer à Premium
            <div class="premium-price mt-1">
                <small>Seulement $2.99/mois</small>
            </div>
        </a>
        @endif

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('patient.home') ? 'active' : '' }}" href="{{ route('patient.home') }}">
                    <i class="fas fa-home"></i> Accueil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('patient.appointments') ? 'active' : '' }}" href="{{ route('patient.appointments') }}">
                    <i class="fas fa-calendar-check"></i> Prendre rendez-vous
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('patient.pharmacies') ? 'active' : '' }}" href="{{ route('patient.pharmacies') }}">
                    <i class="fas fa-prescription-bottle-alt"></i> Pharmacies
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('patient.blood-banks') ? 'active' : '' }}" href="{{ route('patient.blood-banks') }}">
                    <i class="fas fa-tint"></i> Banque de sang
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('patient.medical-data') ? 'active' : '' }}" href="{{ route('patient.medical-data') }}">
                    <i class="fas fa-notes-medical"></i> Données médicales
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('patient.notifications') ? 'active' : '' }}" href="{{ route('patient.notifications') }}">
                    <i class="fas fa-bell"></i> Notifications
                    <span class="badge bg-danger">3</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('patient.history') ? 'active' : '' }}" href="{{ route('patient.history') }}">
                    <i class="fas fa-history"></i> Historique
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('patient.settings') ? 'active' : '' }}" href="{{ route('patient.settings') }}">
                    <i class="fas fa-cog"></i> Paramètres
                </a>
            </li>
            <li class="nav-item mt-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link text-danger">
                        <i class="fas fa-sign-out-alt"></i> Déconnexion
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Menu Toggle Button -->
    <button class="menu-toggle d-lg-none">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">

            @yield('patient_content')
        </div>
    </div>
@endsection

@push('styles')
<style>
    .loading {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.9);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .user-info {
        padding: 1rem;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        margin: 0 1rem;
    }

    .user-avatar img {
        border: 2px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .user-avatar img:hover {
        border-color: rgba(255, 255, 255, 0.4);
        transform: scale(1.05);
    }

    .user-name {
        font-weight: 600;
        color: white;
        margin-top: 0.5rem;
        font-size: 0.9rem;
    }

    .loading-spinner {
        width: 40px;
        height: 50px;
        border: 5px solid #f3f3f3;
        border-top: 5px solid #3498db;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        bottom: 0;
        width: 250px;
        background-color: #2c3e50;
        padding: 1rem;
        overflow-y: auto;
        transition: transform 0.3s ease;
        z-index: 1000;
    }

    .navbar-brand {
        color: #fff !important;
        font-size: 1.5rem;
        text-decoration: none;
        display: flex;
        align-items: center;
        margin-bottom: 2rem;
    }

    .navbar-brand i {
        margin-right: 10px;
    }

    .user-info {
        text-align: center;
        padding: 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .user-avatar {
        margin-bottom: 0.5rem;
        color: #fff;
    }

    .user-name {
        color: #fff;
        font-size: 1.1rem;
        font-weight: 500;
    }

    .navbar-nav {
        list-style: none;
        padding: 0;
    }

    .nav-item {
        margin-bottom: 0.5rem;
    }

    .nav-link {
        color: rgba(255, 255, 255, 0.8) !important;
        text-decoration: none;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
    }

    .nav-link i {
        margin-right: 10px;
        width: 20px;
        text-align: center;
    }

    .nav-link:hover, .nav-link.active {
        color: #fff !important;
        background-color: rgba(255, 255, 255, 0.1);
    }

    .badge {
        margin-left: 5px;
    }

    .main-content {
        margin-left: 250px;
        padding: 2rem;
        min-height: 100vh;
        background-color: #f8f9fa;
    }

    .menu-toggle {
        display: none;
        position: fixed;
        top: 1rem;
        right: 1rem;
        background: #2c3e50;
        color: #fff;
        border: none;
        padding: 0.5rem;
        border-radius: 5px;
        z-index: 1000;
    }

    @media (max-width: 991.98px) {
        .sidebar {
            transform: translateX(-100%);
            z-index: 1001;
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .main-content {
            margin-left: 0;
        }

        .menu-toggle {
            display: block;
        }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const sidebar = document.querySelector('.sidebar');

    menuToggle.addEventListener('click', function() {
        sidebar.classList.toggle('active');
    });

    // Fermer le menu au clic en dehors
    document.addEventListener('click', function(event) {
        if (window.innerWidth < 992) {
            if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
                sidebar.classList.remove('active');
            }
        }
    });
});
</script>
@endpush
