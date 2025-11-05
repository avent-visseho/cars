<!-- ========================================== -->
<!-- FICHIER : resources/views/cars/show.blade.php -->
<!-- Page de détails d'une voiture - ULTRA MODERNE -->
<!-- ========================================== -->

@extends('layouts.app')

@section('title', $car->brand . ' ' . $car->model . ' - ImportCars')

@section('content')

    <section style="padding: 120px 0 100px; background: #f7fafc;">
        <div class="container">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4" data-aos="fade-down">
                <ol class="breadcrumb"
                    style="background: white; padding: 15px 25px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"
                            style="color: #1e40af; text-decoration: none;">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('cars.index') }}"
                            style="color: #1e40af; text-decoration: none;">Voitures</a></li>
                    <li class="breadcrumb-item active">{{ $car->brand }} {{ $car->model }}</li>
                </ol>
            </nav>

            <div class="row g-4">
                <!-- Galerie d'images -->
                <div class="col-lg-8">
                    <div style="background: white; border-radius: 25px; overflow: hidden; box-shadow: 0 20px 60px rgba(0,0,0,0.1);"
                        data-aos="fade-right">
                        <!-- Image principale -->
                        <div id="mainImageContainer"
                            style="background: #000; position: relative; height: 500px; display: flex; align-items: center; justify-content: center;">
                            <img id="mainImage" src="{{ asset('storage/' . $car->main_image) }}"
                                alt="{{ $car->brand }} {{ $car->model }}"
                                style="max-width: 100%; max-height: 100%; object-fit: contain; transition: opacity 0.3s ease;"
                                onerror="this.src='https://images.unsplash.com/photo-1494976388531-d1058494cdd8?w=800&h=600&fit=crop'">

                            <!-- Badge année -->
                            <div style="position: absolute; top: 25px; right: 25px;">
                                <span class="year-badge"
                                    style="font-size: 1.1rem; padding: 12px 25px;">{{ $car->year }}</span>
                            </div>
                        </div>

                        <!-- Miniatures -->
                        <div style="background: #f7fafc; padding: 25px;">
                            <div class="row g-3">
                                <!-- Image principale en miniature -->
                                <div class="col-3">
                                    <img src="{{ asset('storage/' . $car->main_image) }}" class="img-fluid thumbnail-img"
                                        style="cursor: pointer; height: 100px; object-fit: cover; width: 100%; border-radius: 15px; border: 4px solid #1e40af; transition: all 0.3s ease; box-shadow: 0 5px 15px rgba(30, 64, 175, 0.3);"
                                        onclick="changeMainImage(this.src)"
                                        onerror="this.src='https://images.unsplash.com/photo-1494976388531-d1058494cdd8?w=200&h=150&fit=crop'">
                                </div>

                                <!-- Images supplémentaires -->
                                @if ($car->images->count() > 0)
                                    @foreach ($car->images as $image)
                                        <div class="col-3">
                                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                                class="img-fluid thumbnail-img"
                                                style="cursor: pointer; height: 100px; object-fit: cover; width: 100%; border-radius: 15px; border: 4px solid transparent; transition: all 0.3s ease;"
                                                onclick="changeMainImage(this.src)"
                                                onmouseover="this.style.borderColor='#1e40af'; this.style.transform='scale(1.05)'"
                                                onmouseout="this.style.borderColor='transparent'; this.style.transform='scale(1)'"
                                                onerror="this.src='https://images.unsplash.com/photo-1494976388531-d1058494cdd8?w=200&h=150&fit=crop'">
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12 text-center py-3">
                                        <p style="color: #a0aec0; margin: 0;"><i class="bi bi-images me-2"></i>Image
                                            principale uniquement</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Description détaillée -->
                    <div style="background: white; border-radius: 25px; padding: 40px; box-shadow: 0 20px 60px rgba(0,0,0,0.1); margin-top: 30px;"
                        data-aos="fade-right" data-aos-delay="100">
                        <h4 style="font-weight: 700; color: #2d3748; margin-bottom: 25px; font-size: 1.8rem;">
                            <i class="bi bi-file-text-fill me-2" style="color: #1e40af;"></i>Description Détaillée
                        </h4>
                        <p style="font-size: 1.1rem; line-height: 2; color: #4a5568;">{{ $car->description }}</p>
                    </div>
                </div>

                <!-- Informations et Actions -->
                <div class="col-lg-4">
                    <div class="sticky-top" style="top: 100px;">
                        <div style="background: white; border-radius: 25px; padding: 40px; box-shadow: 0 20px 60px rgba(0,0,0,0.1);"
                            data-aos="fade-left">
                            <h2 style="font-weight: 800; color: #2d3748; margin-bottom: 10px; font-size: 2rem;">
                                {{ $car->brand }} {{ $car->model }}
                            </h2>

                            <div style="margin-bottom: 30px;">
                                <span class="year-badge">
                                    <i class="bi bi-calendar-event me-2"></i>{{ $car->year }}
                                </span>
                            </div>

                            <div class="car-price" style="font-size: 3rem; margin-bottom: 35px;">
                                {{ $car->formatted_price }} FCFA
                            </div>

                            <!-- Caractéristiques -->
                            <div
                                style="background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%); padding: 30px; border-radius: 20px; margin-bottom: 30px;">
                                <h5 style="font-weight: 700; margin-bottom: 20px; color: #2d3748;">
                                    <i class="bi bi-info-circle-fill me-2" style="color: #1e40af;"></i>Caractéristiques
                                </h5>
                                <ul style="list-style: none; padding: 0; margin: 0;">
                                    <li
                                        style="padding: 12px 0; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center;">
                                        <span style="color: #718096; font-weight: 600;">
                                            <i class="bi bi-tag-fill me-2" style="color: #1e40af;"></i>Marque
                                        </span>
                                        <strong style="color: #2d3748;">{{ $car->brand }}</strong>
                                    </li>
                                    <li
                                        style="padding: 12px 0; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center;">
                                        <span style="color: #718096; font-weight: 600;">
                                            <i class="bi bi-car-front-fill me-2" style="color: #1e40af;"></i>Modèle
                                        </span>
                                        <strong style="color: #2d3748;">{{ $car->model }}</strong>
                                    </li>
                                    <li
                                        style="padding: 12px 0; display: flex; justify-content: space-between; align-items: center;">
                                        <span style="color: #718096; font-weight: 600;">
                                            <i class="bi bi-calendar3 me-2" style="color: #1e40af;"></i>Année
                                        </span>
                                        <strong style="color: #2d3748;">{{ $car->year }}</strong>
                                    </li>
                                </ul>
                            </div>

                            <hr style="border-color: #e2e8f0; margin: 30px 0;">

                            <!-- Boutons d'action -->
                            <div class="d-grid gap-3">
                                <!-- WhatsApp -->
                                <a href="https://wa.me/?text=🚗 Découvrez cette superbe voiture sur ImportCars !%0A%0A✨ {{ $car->brand }} {{ $car->model }} ({{ $car->year }})%0A💰 Prix: {{ $car->formatted_price }} FCFA%0A%0A🔗 Voir les détails: {{ url()->current() }}"
                                    target="_blank" class="btn btn-success btn-lg"
                                    style="border-radius: 15px; padding: 15px; font-weight: 600; box-shadow: 0 10px 25px rgba(34, 197, 94, 0.3);">
                                    <i class="bi bi-whatsapp me-2"></i>Partager sur WhatsApp
                                </a>

                                <!-- Appeler -->
                                <a href="tel:+229XXXXXXXX" class="btn btn-lg"
                                    style="background: linear-gradient(135deg, #1e40af 0%, #0c2d5e 100%); color: white; border: none; border-radius: 15px; padding: 15px; font-weight: 600; box-shadow: 0 10px 25px rgba(30, 64, 175, 0.3);">
                                    <i class="bi bi-telephone-fill me-2"></i>Appeler Maintenant
                                </a>

                                <!-- Email -->
                                <a href="mailto:contact@ImportCars.bj?subject=Demande d'information - {{ $car->brand }} {{ $car->model }}&body=Bonjour,%0A%0AJe suis intéressé(e) par la voiture {{ $car->brand }} {{ $car->model }} ({{ $car->year }}) au prix de {{ $car->formatted_price }} FCFA.%0A%0AMerci de me contacter.%0A%0ACordialement"
                                    class="btn btn-outline-primary btn-lg"
                                    style="border-radius: 15px; padding: 15px; font-weight: 600; border-width: 2px;">
                                    <i class="bi bi-envelope-fill me-2"></i>Envoyer un Email
                                </a>

                                <!-- Retour -->
                                <a href="{{ route('cars.index') }}" class="btn btn-outline-secondary btn-lg"
                                    style="border-radius: 15px; padding: 15px; font-weight: 600; border-width: 2px;">
                                    <i class="bi bi-arrow-left me-2"></i>Retour aux Voitures
                                </a>
                            </div>
                        </div>

                        <!-- Badge de confiance -->
                        <div style="background: linear-gradient(135deg, #1e40af 0%, #0c2d5e 100%); border-radius: 25px; padding: 30px; margin-top: 20px; text-align: center; color: white;"
                            data-aos="fade-left" data-aos-delay="100">
                            <i class="bi bi-shield-check"
                                style="font-size: 3rem; margin-bottom: 15px; display: block;"></i>
                            <h5 style="font-weight: 700; margin-bottom: 10px;">Garantie de Qualité</h5>
                            <p style="opacity: 0.95; margin: 0; font-size: 0.95rem;">Toutes nos voitures sont inspectées et
                                certifiées</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Voitures similaires -->
            @php
                $similarCars = \App\Models\Car::where('brand', $car->brand)
                    ->where('id', '!=', $car->id)
                    ->take(3)
                    ->get();
            @endphp

            @if ($similarCars->count() > 0)
                <section style="margin-top: 100px;">
                    <h3 style="font-weight: 800; color: #2d3748; margin-bottom: 40px; font-size: 2.5rem;"
                        data-aos="fade-up">
                        <i class="bi bi-stars me-2" style="color: #1e40af;"></i>Voitures Similaires
                    </h3>

                    <div class="row g-4">
                        @foreach ($similarCars as $index => $similarCar)
                            <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                                <div class="car-card">
                                    <div style="overflow: hidden; position: relative;">
                                        <img src="{{ asset('storage/' . $similarCar->main_image) }}"
                                            alt="{{ $similarCar->brand }} {{ $similarCar->model }}" class="car-card-img"
                                            onerror="this.src='https://images.unsplash.com/photo-1494976388531-d1058494cdd8?w=500&h=300&fit=crop'">
                                        <div style="position: absolute; top: 20px; right: 20px;">
                                            <span class="year-badge">{{ $similarCar->year }}</span>
                                        </div>
                                    </div>
                                    <div class="car-card-body">
                                        <h3 class="car-title">{{ $similarCar->brand }} {{ $similarCar->model }}</h3>
                                        <div class="car-price">{{ $similarCar->formatted_price }} FCFA</div>
                                        <a href="{{ route('cars.show', $similarCar) }}"
                                            class="btn btn-gradient w-100 py-3" style="border-radius: 15px;">
                                            <i class="bi bi-eye me-2"></i>Voir les Détails
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif
        </div>
    </section>

    @push('scripts')
        <script>
            function changeMainImage(src) {
                const mainImg = document.getElementById('mainImage');

                // Animation de transition
                mainImg.style.opacity = '0';

                setTimeout(() => {
                    mainImg.src = src;
                    mainImg.style.opacity = '1';
                }, 300);

                // Mettre à jour les bordures des miniatures
                document.querySelectorAll('.thumbnail-img').forEach(img => {
                    if (img.src === src) {
                        img.style.borderColor = '#1e40af';
                        img.style.boxShadow = '0 5px 15px rgba(30, 64, 175, 0.3)';
                    } else {
                        img.style.borderColor = 'transparent';
                        img.style.boxShadow = 'none';
                    }
                });
            }
        </script>
    @endpush

@endsection
