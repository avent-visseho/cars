<!-- ========================================== -->
<!-- FICHIER : resources/views/home.blade.php -->
<!-- Page d'accueil avec design ultra moderne -->
<!-- ========================================== -->

@extends('layouts.app')

@section('title', 'Accueil - ImportCars')

@section('content')

    <!-- Hero Section Ultra Moderne -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content" data-aos="fade-right" style="margin-top: 35px">
                    <h1 class="hero-title">Trouvez Votre Voiture de Rêve</h1>
                    <p class="hero-subtitle">Découvrez notre collection exclusive de véhicules premium et trouvez celui qui
                        correspond parfaitement à votre style de vie.</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="{{ route('cars.index') }}" class="btn btn-light btn-lg px-5 py-3"
                            style="border-radius: 50px; font-weight: 600;">
                            <i class="bi bi-search me-2"></i>Explorer les Voitures
                        </a>
                        <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg px-5 py-3"
                            style="border-radius: 50px; font-weight: 600;">
                            En Savoir Plus
                        </a>
                    </div>
                    <div class="mt-5" style="display: flex; gap: 40px; color: white;">
                        {{-- <div>
                            <h2 style="font-size: 3rem; font-weight: 800; margin: 0;">{{ $totalCars }}+</h2>
                            <p style="opacity: 0.9; margin: 0;">Voitures Disponibles</p>
                        </div> --}}
                        <div>
                            <h2 style="font-size: 3rem; font-weight: 800; margin: 0;">500+</h2>
                            <p style="opacity: 0.9; margin: 0;">Clients Satisfaits</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?w=800&h=600&fit=crop&q=80"
                        alt="Voiture de luxe" class="img-fluid"
                        style="border-radius: 30px; box-shadow: 0 30px 60px rgba(0,0,0,0.3); animation: float 3s ease-in-out infinite;">
                </div>
            </div>
        </div>
    </section>

    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }
    </style>

    <!-- Section Voitures en Vedette -->
    <section style="padding: 100px 0; background: white;">
        <div class="container">
            <div data-aos="fade-up">
                <h2 class="section-title">Voitures en Vedette</h2>
            </div>

            @if ($featuredCars->count() > 0)
                <div class="row g-4">
                    @foreach ($featuredCars as $index => $car)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <div class="car-card">
                                <div style="overflow: hidden; position: relative;">
                                    <img src="{{ asset('storage/' . $car->main_image) }}"
                                        alt="{{ $car->brand }} {{ $car->model }}" class="car-card-img"
                                        onerror="this.src='https://images.unsplash.com/photo-1494976388531-d1058494cdd8?w=500&h=300&fit=crop'">
                                    <div style="position: absolute; top: 20px; right: 20px;">
                                        <span class="year-badge">{{ $car->year }}</span>
                                    </div>
                                </div>
                                <div class="car-card-body">
                                    <h3 class="car-title">{{ $car->brand }} {{ $car->model }}</h3>
                                    <p style="color: #718096; margin-bottom: 1rem;">
                                        <i class="bi bi-speedometer2 me-2"></i>Excellente condition
                                    </p>
                                    <div class="car-price">{{ $car->formatted_price }} FCFA</div>
                                    <a href="{{ route('cars.show', $car) }}" class="btn btn-gradient w-100 py-3"
                                        style="border-radius: 15px;">
                                        <i class="bi bi-eye me-2"></i>Voir les Détails
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-5" data-aos="fade-up">
                    <a href="{{ route('cars.index') }}" class="btn btn-gradient btn-lg px-5 py-3">
                        Voir Toutes les Voitures <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="bi bi-car-front" style="font-size: 5rem; color: #e2e8f0;"></i>
                    <h3 class="mt-4" style="color: #718096;">Aucune voiture disponible pour le moment</h3>
                    <p style="color: #a0aec0;">Revenez bientôt pour découvrir nos nouvelles offres !</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Section Pourquoi Nous Choisir -->
    <section style="padding: 100px 0; background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);">
        <div class="container">
            <div data-aos="fade-up">
                <h2 class="section-title">Pourquoi Choisir ImportCars ?</h2>
            </div>

            <div class="row g-5 mt-3">
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="0">
                    <div style="background: white; padding: 50px 40px; border-radius: 25px; text-align: center; box-shadow: 0 15px 40px rgba(0,0,0,0.08); transition: all 0.3s ease; height: 100%;"
                        onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 25px 60px rgba(30, 64, 175, 0.2)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.08)'">
                        <div
                            style="width: 100px; height: 100px; margin: 0 auto 30px; background: linear-gradient(135deg, #1e40af 0%, #0c2d5e 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 15px 35px rgba(30, 64, 175, 0.3);">
                            <i class="bi bi-shield-check" style="font-size: 3rem; color: white;"></i>
                        </div>
                        <h4 style="font-weight: 700; margin-bottom: 1rem; font-size: 1.5rem;">Qualité Garantie</h4>
                        <p style="color: #718096; line-height: 1.8;">Tous nos véhicules sont rigoureusement inspectés et
                            certifiés pour votre tranquillité d'esprit.</p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                    <div style="background: white; padding: 50px 40px; border-radius: 25px; text-align: center; box-shadow: 0 15px 40px rgba(0,0,0,0.08); transition: all 0.3s ease; height: 100%;"
                        onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 25px 60px rgba(30, 64, 175, 0.2)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.08)'">
                        <div
                            style="width: 100px; height: 100px; margin: 0 auto 30px; background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 15px 35px rgba(96, 165, 250, 0.3);">
                            <i class="bi bi-cash-coin" style="font-size: 3rem; color: white;"></i>
                        </div>
                        <h4 style="font-weight: 700; margin-bottom: 1rem; font-size: 1.5rem;">Prix Transparents</h4>
                        <p style="color: #718096; line-height: 1.8;">Aucun frais caché. Des prix clairs et compétitifs pour
                            tous nos véhicules.</p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                    <div style="background: white; padding: 50px 40px; border-radius: 25px; text-align: center; box-shadow: 0 15px 40px rgba(0,0,0,0.08); transition: all 0.3s ease; height: 100%;"
                        onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 25px 60px rgba(30, 64, 175, 0.2)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.08)'">
                        <div
                            style="width: 100px; height: 100px; margin: 0 auto 30px; background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 15px 35px rgba(79, 172, 254, 0.3);">
                            <i class="bi bi-headset" style="font-size: 3rem; color: white;"></i>
                        </div>
                        <h4 style="font-weight: 700; margin-bottom: 1rem; font-size: 1.5rem;">Support Expert</h4>
                        <p style="color: #718096; line-height: 1.8;">Notre équipe d'experts vous accompagne à chaque étape
                            de votre achat.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Call to Action -->
    <section
        style="padding: 100px 0; background: linear-gradient(135deg, #1e40af 0%, #0c2d5e 100%); position: relative; overflow: hidden;">
        <div
            style="position: absolute; top: -50%; left: -50%; width: 200%; height: 200%; background: radial-gradient(circle, rgba(255,255,255,0.1) 2px, transparent 2px); background-size: 50px 50px; animation: moveParticles 20s linear infinite;">
        </div>

        <div class="container position-relative" style="z-index: 2;">
            <div class="text-center text-white" data-aos="fade-up">
                <h2 style="font-size: 3.5rem; font-weight: 800; margin-bottom: 1.5rem;">Prêt à Trouver Votre Voiture ?</h2>
                <p style="font-size: 1.3rem; margin-bottom: 3rem; opacity: 0.95;">Explorez notre collection et trouvez le
                    véhicule parfait pour vous dès aujourd'hui.</p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="{{ route('cars.index') }}" class="btn btn-light btn-lg px-5 py-3"
                        style="border-radius: 50px; font-weight: 600;">
                        <i class="bi bi-search me-2"></i>Parcourir les Voitures
                    </a>
                    <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg px-5 py-3"
                        style="border-radius: 50px; font-weight: 600;">
                        <i class="bi bi-info-circle me-2"></i>En Savoir Plus
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Témoignages -->
    <section style="padding: 100px 0; background: white;">
        <div class="container">
            <div data-aos="fade-up">
                <h2 class="section-title">Ce Que Disent Nos Clients</h2>
            </div>

            <div class="row g-4 mt-3">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                    <div
                        style="background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%); padding: 40px; border-radius: 25px; height: 100%;">
                        <div style="display: flex; gap: 5px; margin-bottom: 20px;">
                            <i class="bi bi-star-fill" style="color: #fbbf24; font-size: 1.5rem;"></i>
                            <i class="bi bi-star-fill" style="color: #fbbf24; font-size: 1.5rem;"></i>
                            <i class="bi bi-star-fill" style="color: #fbbf24; font-size: 1.5rem;"></i>
                            <i class="bi bi-star-fill" style="color: #fbbf24; font-size: 1.5rem;"></i>
                            <i class="bi bi-star-fill" style="color: #fbbf24; font-size: 1.5rem;"></i>
                        </div>
                        <p style="font-size: 1.1rem; line-height: 1.8; color: #4a5568; margin-bottom: 25px;">"Excellente
                            expérience ! J'ai trouvé la voiture parfaite et l'équipe était très professionnelle."</p>
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <div
                                style="width: 60px; height: 60px; border-radius: 50%; background: linear-gradient(135deg, #1e40af, #0c2d5e); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 1.5rem;">
                                JD</div>
                            <div>
                                <h5 style="margin: 0; font-weight: 700;">Jean Dupont</h5>
                                <p style="margin: 0; color: #718096;">Client satisfait</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div
                        style="background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%); padding: 40px; border-radius: 25px; height: 100%;">
                        <div style="display: flex; gap: 5px; margin-bottom: 20px;">
                            <i class="bi bi-star-fill" style="color: #fbbf24; font-size: 1.5rem;"></i>
                            <i class="bi bi-star-fill" style="color: #fbbf24; font-size: 1.5rem;"></i>
                            <i class="bi bi-star-fill" style="color: #fbbf24; font-size: 1.5rem;"></i>
                            <i class="bi bi-star-fill" style="color: #fbbf24; font-size: 1.5rem;"></i>
                            <i class="bi bi-star-fill" style="color: #fbbf24; font-size: 1.5rem;"></i>
                        </div>
                        <p style="font-size: 1.1rem; line-height: 1.8; color: #4a5568; margin-bottom: 25px;">"Service
                            impeccable et voitures de qualité. Je recommande vivement ImportCars !"</p>
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <div
                                style="width: 60px; height: 60px; border-radius: 50%; background: linear-gradient(135deg, #60a5fa, #3b82f6); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 1.5rem;">
                                MT</div>
                            <div>
                                <h5 style="margin: 0; font-weight: 700;">Marie Tossou</h5>
                                <p style="margin: 0; color: #718096;">Cliente satisfaite</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div
                        style="background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%); padding: 40px; border-radius: 25px; height: 100%;">
                        <div style="display: flex; gap: 5px; margin-bottom: 20px;">
                            <i class="bi bi-star-fill" style="color: #fbbf24; font-size: 1.5rem;"></i>
                            <i class="bi bi-star-fill" style="color: #fbbf24; font-size: 1.5rem;"></i>
                            <i class="bi bi-star-fill" style="color: #fbbf24; font-size: 1.5rem;"></i>
                            <i class="bi bi-star-fill" style="color: #fbbf24; font-size: 1.5rem;"></i>
                            <i class="bi bi-star-fill" style="color: #fbbf24; font-size: 1.5rem;"></i>
                        </div>
                        <p style="font-size: 1.1rem; line-height: 1.8; color: #4a5568; margin-bottom: 25px;">"Processus
                            d'achat rapide et facile. Très content de mon acquisition !"</p>
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <div
                                style="width: 60px; height: 60px; border-radius: 50%; background: linear-gradient(135deg, #4facfe, #00f2fe); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 1.5rem;">
                                PK</div>
                            <div>
                                <h5 style="margin: 0; font-weight: 700;">Pierre Kodjo</h5>
                                <p style="margin: 0; color: #718096;">Client satisfait</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
