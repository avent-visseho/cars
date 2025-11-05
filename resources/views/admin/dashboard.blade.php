<!-- ========================================== -->
<!-- FICHIER : resources/views/admin/dashboard.blade.php -->
<!-- Tableau de bord admin -->
<!-- ========================================== -->

@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 style="font-weight: 800; color: #2d3748; font-size: 2.5rem;">
                <i class="bi bi-speedometer2 me-2"></i>Tableau de Bord
            </h1>
            <p style="color: #718096; font-size: 1.1rem; margin: 0;">Bienvenue dans votre espace d'administration</p>
        </div>
        <a href="{{ route('admin.cars.create') }}" class="btn btn-gradient btn-lg">
            <i class="bi bi-plus-circle me-2"></i>Ajouter une Voiture
        </a>
    </div>

    <!-- Statistiques -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card"
                style="background: linear-gradient(135deg, #1e40af 0%, #0c2d5e 100%); color: white; border-radius: 25px; overflow: hidden; position: relative;">
                <div style="position: absolute; top: -20px; right: -20px; font-size: 8rem; opacity: 0.2;">
                    <i class="bi bi-car-front-fill"></i>
                </div>
                <div class="card-body p-4 position-relative" style="z-index: 2;">
                    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                        <div
                            style="width: 60px; height: 60px; background: rgba(255,255,255,0.2); border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-car-front-fill" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h2 style="font-weight: 800; margin: 0; font-size: 3rem;">{{ $totalCars }}</h2>
                            <p style="margin: 0; opacity: 0.9; font-weight: 600;">Total des Voitures</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card"
                style="background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%); color: white; border-radius: 25px; overflow: hidden; position: relative;">
                <div style="position: absolute; top: -20px; right: -20px; font-size: 8rem; opacity: 0.2;">
                    <i class="bi bi-cash-coin"></i>
                </div>
                <div class="card-body p-4 position-relative" style="z-index: 2;">
                    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                        <div
                            style="width: 60px; height: 60px; background: rgba(255,255,255,0.2); border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-cash-coin" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h2 style="font-weight: 800; margin: 0; font-size: 2rem;">
                                {{ number_format($avgPrice, 0, ',', ' ') }}</h2>
                            <p style="margin: 0; opacity: 0.9; font-weight: 600;">Prix Moyen (FCFA)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card"
                style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white; border-radius: 25px; overflow: hidden; position: relative;">
                <div style="position: absolute; top: -20px; right: -20px; font-size: 8rem; opacity: 0.2;">
                    <i class="bi bi-tags-fill"></i>
                </div>
                <div class="card-body p-4 position-relative" style="z-index: 2;">
                    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                        <div
                            style="width: 60px; height: 60px; background: rgba(255,255,255,0.2); border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-tags-fill" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h2 style="font-weight: 800; margin: 0; font-size: 3rem;">{{ $totalBrands }}</h2>
                            <p style="margin: 0; opacity: 0.9; font-weight: 600;">Marques Différentes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions Rapides -->
    <div class="row g-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body p-4">
                    <h5 style="font-weight: 700; color: #2d3748; margin-bottom: 25px; font-size: 1.5rem;">
                        <i class="bi bi-lightning-fill me-2" style="color: #1e40af;"></i>Actions Rapides
                    </h5>
                    <div class="d-grid gap-3">
                        <a href="{{ route('admin.cars.create') }}" class="btn btn-gradient btn-lg text-start">
                            <i class="bi bi-plus-circle me-3"></i>Ajouter une Nouvelle Voiture
                        </a>
                        <a href="{{ route('admin.cars.index') }}" class="btn btn-outline-primary btn-lg text-start"
                            style="border-radius: 12px; border-width: 2px; font-weight: 600;">
                            <i class="bi bi-list-ul me-3"></i>Gérer Toutes les Voitures
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg text-start"
                            style="border-radius: 12px; border-width: 2px; font-weight: 600;">
                            <i class="bi bi-eye me-3"></i>Voir le Site Public
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card" style="background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);">
                <div class="card-body p-4 text-center">
                    <i class="bi bi-info-circle"
                        style="font-size: 4rem; color: #1e40af; margin-bottom: 20px; display: block;"></i>
                    <h5 style="font-weight: 700; color: #2d3748; margin-bottom: 15px;">Besoin d'Aide ?</h5>
                    <p style="color: #718096; margin-bottom: 20px;">Consultez notre guide d'utilisation pour gérer
                        efficacement vos voitures.</p>
                    <button class="btn btn-outline-primary" style="border-radius: 12px; font-weight: 600;">
                        <i class="bi bi-book me-2"></i>Guide d'Utilisation
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
