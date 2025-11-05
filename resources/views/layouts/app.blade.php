<!-- ========================================== -->
<!-- FICHIER : resources/views/layouts/app.blade.php -->
<!-- Layout principal pour le site public -->
<!-- ========================================== -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'ImportCars - Votre Partenaire Automobile')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

    <style>
        :root {
            --primary: #1e40af;
            --secondary: #0c2d5e;
            --accent: #60a5fa;
            --dark: #2d3748;
            --light: #f7fafc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--light);
            color: var(--dark);
            overflow-x: hidden;
        }

        /* Navbar ultra moderne */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(20px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 1.2rem 0;
            transition: all 0.3s ease;
        }

        .navbar-custom.scrolled {
            padding: 0.8rem 0;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.8rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-link {
            color: var(--dark) !important;
            font-weight: 600;
            margin: 0 15px;
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transition: all 0.3s ease;
            transform: translateX(-50%);
            border-radius: 10px;
        }

        .nav-link:hover::before {
            width: 80%;
        }

        .nav-link:hover {
            color: var(--primary) !important;
            transform: translateY(-2px);
        }

        .btn-gradient {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border: none;
            color: white;
            padding: 12px 35px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(30, 64, 175, 0.3);
        }

        .btn-gradient:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(30, 64, 175, 0.4);
            color: white;
        }

        /* Hero moderne avec particules */
        .hero-section {
            background: linear-gradient(135deg, #1e40af 0%, #0c2d5e 100%);
            min-height: 90vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 2px, transparent 2px);
            background-size: 50px 50px;
            animation: moveParticles 20s linear infinite;
        }

        @keyframes moveParticles {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(50px, 50px);
            }
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 4.5rem;
            font-weight: 800;
            color: white;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            text-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .hero-subtitle {
            font-size: 1.5rem;
            color: rgba(255, 255, 255, 0.95);
            margin-bottom: 2.5rem;
            font-weight: 400;
        }

        /* Cards ultra modernes */
        .car-card {
            background: white;
            border-radius: 25px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .car-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 1;
        }

        .car-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 25px 60px rgba(30, 64, 175, 0.3);
        }

        .car-card:hover::before {
            opacity: 0.1;
        }

        .car-card-img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .car-card:hover .car-card-img {
            transform: scale(1.15) rotate(2deg);
        }

        .car-card-body {
            padding: 2rem;
            position: relative;
            z-index: 2;
        }

        .car-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.8rem;
        }

        .car-price {
            font-size: 2.2rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 1.2rem 0;
        }

        .year-badge {
            background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-block;
            box-shadow: 0 5px 15px rgba(96, 165, 250, 0.3);
        }

        /* Section avec animations */
        .section-title {
            font-size: 3.5rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 4rem;
            position: relative;
            color: var(--dark);
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 5px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 10px;
        }

        /* Footer moderne */
        .footer {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            color: white;
            padding: 80px 0 30px;
            margin-top: 100px;
            position: relative;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }

        .footer h5 {
            font-weight: 700;
            margin-bottom: 2rem;
            font-size: 1.3rem;
        }

        .footer-link {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            margin-bottom: 12px;
        }

        .footer-link:hover {
            color: white;
            transform: translateX(5px);
        }

        .social-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            transition: all 0.3s ease;
            font-size: 1.3rem;
        }

        .social-icon:hover {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            transform: translateY(-5px) rotate(360deg);
            color: white;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.2rem;
            }

            .section-title {
                font-size: 2.5rem;
            }
        }

        /* Animations de chargement */
        .fade-in-up {
            animation: fadeInUp 0.8s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi bi-car-front-fill"></i> ImportCars
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cars.index') }}">Nos Voitures</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">À Propos</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-gradient btn-sm">Déconnexion</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-gradient btn-sm">Connexion</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu -->
    <div style="padding-top: 80px;">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5><i class="bi bi-car-front-fill"></i> ImportCars</h5>
                    <p style="opacity: 0.8; line-height: 1.8;">Votre partenaire de confiance pour trouver la voiture
                        parfaite. Excellence, transparence et service client de qualité.</p>
                    <div class="mt-4">
                        <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Liens Rapides</h5>
                    <div class="d-flex flex-column">
                        <a href="{{ route('home') }}" class="footer-link">Accueil</a>
                        <a href="{{ route('cars.index') }}" class="footer-link">Nos Voitures</a>
                        <a href="{{ route('about') }}" class="footer-link">À Propos</a>
                        <a href="#" class="footer-link">Contact</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Contact</h5>
                    <p><i class="bi bi-geo-alt-fill me-2"></i> 123 Avenue de l'Auto, Cotonou</p>
                    <p><i class="bi bi-telephone-fill me-2"></i> +229 XX XX XX XX</p>
                    <p><i class="bi bi-envelope-fill me-2"></i> contact@ImportCars.bj</p>
                    <p><i class="bi bi-clock-fill me-2"></i> Lun - Sam: 8h - 18h</p>
                </div>
            </div>
            <hr style="border-color: rgba(255,255,255,0.1); margin: 40px 0 30px;">
            <div class="text-center">
                <p style="opacity: 0.7; margin: 0;">&copy; {{ date('Y') }} ImportCars. Tous droits réservés. Fait
                    avec ❤️ au Bénin</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar-custom');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
