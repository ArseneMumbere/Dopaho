@extends('layouts.app')

@section('content')
    <!-- Loading Screen -->
    <div class="loading">
        <div class="loading-container">
            <div class="loading-circle">
                <div class="loading-text">
                    D<i class="fas fa-heartbeat loading-heart"></i>paho
                </div>
            </div>
        </div>
    </div>

    <!-- Preload Critical Resources -->
    <link rel="preload" href="{{ asset('js/app.js') }}" as="script">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" as="script">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" as="script">

    <!-- Sidebar -->
    <div class="sidebar">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="fas fa-heartbeat"></i> Dopaho
        </a>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                    <i class="fas fa-home"></i> Accueil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">
                    <i class="fas fa-sign-in-alt"></i> Se connecter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}" href="{{ route('register') }}">
                    <i class="fas fa-user-plus"></i> Creer un compte
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">
                    <i class="fas fa-hospital"></i> Nos Services
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                    <i class="fas fa-envelope"></i> Contact
                </a>
            </li>
        </ul>
    </div>

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            font-family: 'Arial', sans-serif;
        }

        .main-content {
            flex: 1 0 auto;
        }

        .loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loading-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loading-circle {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            animation: pulseCircle 5s ease forwards;
            box-shadow: 0 0 30px rgba(52, 152, 219, 0.3);
        }

        .loading-text {
            font-size: 0;
            font-weight: bold;
            color: white;
            animation: zoomIn 5s ease forwards;
            display: flex;
            align-items: center;
            letter-spacing: 2px;
        }

        .loading-heart {
            display: inline-block;
            animation: pulseBeat 1s ease-in-out infinite;
            margin: 0 5px;
            position: relative;
            top: 2px;
        }

        @keyframes pulseCircle {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            30% {
                transform: scale(1.1);
                opacity: 0.7;
            }
            50% {
                transform: scale(1);
                opacity: 1;
            }
            90% {
                transform: scale(1);
                opacity: 1;
            }
            100% {
                transform: scale(0.8);
                opacity: 0;
            }
        }

        @keyframes pulseBeat {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.3);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes zoomIn {
            0% {
                font-size: 0;
                opacity: 0;
                transform: scale(0);
            }
            30% {
                font-size: 60px;
                opacity: 0.7;
                transform: scale(1.1);
            }
            50% {
                font-size: 60px;
                opacity: 1;
                transform: scale(1);
            }
            90% {
                font-size: 60px;
                opacity: 1;
                transform: scale(1);
            }
            100% {
                font-size: 60px;
                opacity: 0;
                transform: scale(0.8);
            }
        }

        .card {
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
        }
        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }

        .footer {
            flex-shrink: 0;
            background-color: #f8f9fa;
            padding: 2rem 0;
            margin-top: 2rem;
            width: 100%;
        }

        /* Hero Section Styles */
        .hero-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #2c3e50;
        }

        .hero-subtitle {
            font-size: 1.8rem;
            color: #3498db;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }

        .hero-text {
            font-size: 1.1rem;
            color: #6c757d;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .hero-image {
            max-width: 100%;
            height: auto;
            filter: drop-shadow(0 10px 20px rgba(0,0,0,0.1));
        }

        /* Partners Section Styles */
        .partners-section {
            padding: 80px 0;
            background-color: #fff;
        }

        .section-header {
            margin-bottom: 60px;
        }

        .section-title {
            font-size: 2.5rem;
            color: #2c3e50;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: #6c757d;
        }

        .partner-card {
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            height: 100%;
        }

        .partner-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .partner-icon {
            font-size: 2.5rem;
            color: #3498db;
            margin-bottom: 1.5rem;
        }

        .partner-card h3 {
            font-size: 1.3rem;
            color: #2c3e50;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .partner-card p {
            color: #6c757d;
            margin-bottom: 0;
            line-height: 1.5;
        }

        /* Responsive Adjustments */
        @media (max-width: 991.98px) {
            .hero-section {
                padding: 60px 0;
            }

            .hero-title {
                font-size: 2.8rem;
            }

            .hero-subtitle {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 767.98px) {
            .hero-section {
                text-align: center;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-image {
                margin-top: 40px;
            }
        }
    </style>

    <script>
        // Masquer l'écran de chargement après l'animation
        setTimeout(() => {
            document.querySelector('.loading').style.display = 'none';
        }, 5000);

        // Defer non-critical JavaScript loading
        window.addEventListener('load', function() {
            const aosScript = document.createElement('script');
            aosScript.src = 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js';
            aosScript.onload = function() {
                AOS.init();
            };
            document.body.appendChild(aosScript);
        });
    </script>

    <!-- Menu Toggle Button -->
    <button class="menu-toggle d-lg-none">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Hero Section -->
        <div class="hero-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h1 class="hero-title" data-aos="fade-right">
                            D<i class="fas fa-heartbeat text-primary"></i>paho
                        </h1>
                        <p class="hero-subtitle" data-aos="fade-right" data-aos-delay="200">
                            Votre bien-être, notre priorité
                        </p>
                        <p class="hero-text" data-aos="fade-right" data-aos-delay="400">
                            Découvrez une nouvelle approche de la santé avec notre réseau de professionnels dévoués.
                        </p>
                        <div class="hero-buttons" data-aos="fade-right" data-aos-delay="600">
                            <a href="{{ route('register') }}" class="btn btn-primary btn-lg me-3">
                                <i class="fas fa-user-plus me-2"></i>Rejoignez-nous
                            </a>
                            <a href="#partners" class="btn btn-outline-primary btn-lg">
                                <i class="fas fa-info-circle me-2"></i>En savoir plus
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                        <img src="{{ asset('images/health-illustration.svg') }}" alt="Santé illustration" class="img-fluid hero-image">
                    </div>
                </div>
            </div>
        </div>

        <!-- Partners Section -->
        <section id="partners" class="partners-section">
            <div class="container">
                <div class="section-header text-center" data-aos="fade-up">
                    <h2 class="section-title">Nos Partenaires en Santé</h2>
                    <p class="section-subtitle">Une collaboration d'excellence pour votre santé</p>
                </div>

                <div class="row g-4 justify-content-center">
                    <!-- Partner Card 1 -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="partner-card">
                            <div class="partner-icon">
                                <i class="fas fa-hospital"></i>
                            </div>
                            <h3>Hôpitaux</h3>
                            <p>Réseau d'établissements de santé de premier plan</p>
                        </div>
                    </div>

                    <!-- Partner Card 2 -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="partner-card">
                            <div class="partner-icon">
                                <i class="fas fa-user-md"></i>
                            </div>
                            <h3>Médecins Spécialistes</h3>
                            <p>Experts reconnus dans leurs domaines</p>
                        </div>
                    </div>

                    <!-- Partner Card 3 -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="partner-card">
                            <div class="partner-icon">
                                <i class="fas fa-pills"></i>
                            </div>
                            <h3>Pharmacies</h3>
                            <p>Réseau de pharmacies partenaires</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>À propos</h4>
                    <p>Dopaho est votre plateforme de santé de confiance, connectant patients et professionnels de santé.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h4>Liens rapides</h4>
                    <ul>
                        <li><a href="{{ route('about') }}">À propos</a></li>
                        <li><a href="{{ route('services') }}">Services</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Contact</h4>
                    <ul>
                        <li><i class="fas fa-phone"></i> +123 456 789</li>
                        <li><i class="fas fa-envelope"></i> contact@dopaho.com</li>
                        <li><i class="fas fa-map-marker-alt"></i> 123 Rue de la Santé, Ville</li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-4">
                <p>&copy; {{ date('Y') }} Dopaho. Tous droits réservés.</p>
                <p>
                    <a href="{{ route('privacy') }}">Politique de confidentialité</a> | 
                    <a href="{{ route('terms') }}">Conditions d'utilisation</a>
                </p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
