@extends('layouts.app')

@section('title', 'À Propos - ImportCars')

@section('content')

    <!-- Hero Section -->
    <section
        style="padding: 150px 0 100px; background: linear-gradient(135deg, #1e40af 0%, #0c2d5e 100%); position: relative; overflow: hidden;">
        <div
            style="position: absolute; top: -50%; left: -50%; width: 200%; height: 200%; background: radial-gradient(circle, rgba(255,255,255,0.1) 2px, transparent 2px); background-size: 50px 50px; animation: moveParticles 20s linear infinite;">
        </div>

        <div class="container position-relative" style="z-index: 2;">
            <div class="text-center text-white" data-aos="fade-up">
                <h1 style="font-size: 4rem; font-weight: 800; margin-bottom: 1.5rem;">À Propos de ImportCars</h1>
                <p style="font-size: 1.4rem; opacity: 0.95; max-width: 700px; margin: 0 auto;">Votre partenaire de confiance
                    pour trouver le véhicule parfait depuis plus de 10 ans.</p>
            </div>
        </div>
    </section>

    <!-- Notre Histoire -->
    <section style="padding: 100px 0; background: white;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                    <img src="https://images.unsplash.com/photo-1562141961-4d7870a5fa88?w=800&h=600&fit=crop&q=80"
                        alt="Notre showroom" class="img-fluid"
                        style="border-radius: 30px; box-shadow: 0 25px 60px rgba(0,0,0,0.15);">
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <h2 style="font-size: 3rem; font-weight: 800; margin-bottom: 1.5rem; color: #2d3748;">Notre Histoire
                    </h2>
                    <p style="font-size: 1.15rem; line-height: 1.9; color: #4a5568; margin-bottom: 1.5rem;">
                        Fondée en 2014, <strong>ImportCars</strong> est née d'une passion pour l'automobile et d'un engagement
                        envers l'excellence du service client. Nous avons débuté avec une petite collection de véhicules
                        soigneusement sélectionnés.
                    </p>
                    <p style="font-size: 1.15rem; line-height: 1.9; color: #4a5568; margin-bottom: 1.5rem;">
                        Aujourd'hui, nous sommes fiers d'être l'un des leaders du marché automobile au Bénin, avec plus de
                        500 clients satisfaits et une réputation d'excellence qui nous précède.
                    </p>
                    <p style="font-size: 1.15rem; line-height: 1.9; color: #4a5568;">
                        Notre mission reste inchangée : fournir des véhicules de qualité supérieure à des prix transparents,
                        accompagnés d'un service client exceptionnel.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Nos Valeurs -->
    <section style="padding: 100px 0; background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 style="font-size: 3rem; font-weight: 800; margin-bottom: 1rem; color: #2d3748;">Nos Valeurs</h2>
                <p style="font-size: 1.2rem; color: #718096;">Les principes qui guident notre entreprise au quotidien</p>
            </div>

            <div class="row g-4">
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="0">
                    <div>
                        <div
                            style="width: 120px; height: 120px; margin: 0 auto 25px; background: linear-gradient(135deg, #1e40af, #0c2d5e); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 15px 40px rgba(30, 64, 175, 0.3);">
                            <i class="bi bi-calendar-check" style="font-size: 3.5rem; color: white;"></i>
                        </div>
                        <h2 style="font-size: 3.5rem; font-weight: 800; color: #1e40af; margin-bottom: 0.5rem;">10+</h2>
                        <p style="font-size: 1.2rem; color: #718096; font-weight: 600;">Années d'Expérience</p>
                    </div>
                </div>

                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div>
                        <div
                            style="width: 120px; height: 120px; margin: 0 auto 25px; background: linear-gradient(135deg, #60a5fa, #3b82f6); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 15px 40px rgba(96, 165, 250, 0.3);">
                            <i class="bi bi-people" style="font-size: 3.5rem; color: white;"></i>
                        </div>
                        <h2 style="font-size: 3.5rem; font-weight: 800; color: #60a5fa; margin-bottom: 0.5rem;">500+</h2>
                        <p style="font-size: 1.2rem; color: #718096; font-weight: 600;">Clients Satisfaits</p>
                    </div>
                </div>

                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div>
                        <div
                            style="width: 120px; height: 120px; margin: 0 auto 25px; background: linear-gradient(135deg, #4facfe, #00f2fe); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 15px 40px rgba(79, 172, 254, 0.3);">
                            <i class="bi bi-car-front" style="font-size: 3.5rem; color: white;"></i>
                        </div>
                        <h2 style="font-size: 3.5rem; font-weight: 800; color: #4facfe; margin-bottom: 0.5rem;">200+</h2>
                        <p style="font-size: 1.2rem; color: #718096; font-weight: 600;">Voitures Vendues</p>
                    </div>
                </div>

                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div>
                        <div
                            style="width: 120px; height: 120px; margin: 0 auto 25px; background: linear-gradient(135deg, #fa709a, #fee140); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 15px 40px rgba(250, 112, 154, 0.3);">
                            <i class="bi bi-award" style="font-size: 3.5rem; color: white;"></i>
                        </div>
                        <h2 style="font-size: 3.5rem; font-weight: 800; color: #fa709a; margin-bottom: 0.5rem;">100%</h2>
                        <p style="font-size: 1.2rem; color: #718096; font-weight: 600;">Satisfaction Client</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section style="padding: 100px 0; background: linear-gradient(135deg, #1e40af 0%, #0c2d5e 100%);">
        <div class="container">
            <div class="text-center text-white mb-5" data-aos="fade-up">
                <h2 style="font-size: 3rem; font-weight: 800; margin-bottom: 1.5rem;">Contactez-Nous</h2>
                <p style="font-size: 1.2rem; opacity: 0.95;">Notre équipe est là pour répondre à toutes vos questions</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="0">
                    <div
                        style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); padding: 40px; border-radius: 25px; text-align: center; color: white; height: 100%;">
                        <i class="bi bi-geo-alt-fill" style="font-size: 3.5rem; margin-bottom: 20px; display: block;"></i>
                        <h4 style="font-weight: 700; margin-bottom: 1rem;">Adresse</h4>
                        <p style="opacity: 0.9; line-height: 1.8;">123 Avenue de l'Automobile<br>Cotonou, Bénin</p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                    <div
                        style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); padding: 40px; border-radius: 25px; text-align: center; color: white; height: 100%;">
                        <i class="bi bi-telephone-fill" style="font-size: 3.5rem; margin-bottom: 20px; display: block;"></i>
                        <h4 style="font-weight: 700; margin-bottom: 1rem;">Téléphone</h4>
                        <p style="opacity: 0.9; line-height: 1.8;">+229 XX XX XX XX<br>Lun - Sam: 8h - 18h</p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                    <div
                        style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); padding: 40px; border-radius: 25px; text-align: center; color: white; height: 100%;">
                        <i class="bi bi-envelope-fill" style="font-size: 3.5rem; margin-bottom: 20px; display: block;"></i>
                        <h4 style="font-weight: 700; margin-bottom: 1rem;">Email</h4>
                        <p style="opacity: 0.9; line-height: 1.8;">contact@ImportCars.bj<br>info@ImportCars.bj</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
