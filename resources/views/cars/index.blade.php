{{-- ============================================= --}}
{{-- Fichier: resources/views/cars/index.blade.php --}}
{{-- Page de liste des voitures avec recherche et filtres --}}
{{-- ============================================= --}}

@extends('layouts.app')

@section('title', 'Nos Voitures')

@section('content')
    <div class="py-5" style="background: linear-gradient(135deg, #1e40af 0%, #0c2d5e 100%);">
        <div class="container">
            <h1 class="text-white text-center mb-4">Explorez Notre Collection</h1>
            <p class="text-white text-center lead">Trouvez la voiture parfaite pour vous</p>
        </div>
    </div>

    <div class="container my-5">
        <!-- Recherche et Filtres -->
        <div class="card shadow-lg mb-4 fade-in">
            <div class="card-body p-4">
                <h5 class="mb-3"><i class="bi bi-funnel"></i> Rechercher et Filtrer</h5>
                <form action="{{ route('cars.index') }}" method="GET">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label fw-bold">Rechercher</label>
                            <input type="text" name="search" class="form-control" placeholder="Nom, marque, modèle..."
                                value="{{ request('search') }}">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label fw-bold">Marque</label>
                            <select name="brand" class="form-select">
                                <option value="">Toutes les marques</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>
                                        {{ $brand }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label fw-bold">Modèle</label>
                            <select name="model" class="form-select">
                                <option value="">Tous les modèles</option>
                                @foreach ($models as $model)
                                    <option value="{{ $model }}" {{ request('model') == $model ? 'selected' : '' }}>
                                        {{ $model }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label fw-bold">Prix Min</label>
                            <input type="number" name="min_price" class="form-control" placeholder="Ex: 10000"
                                value="{{ request('min_price') }}">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label fw-bold">Prix Max</label>
                            <input type="number" name="max_price" class="form-control" placeholder="Ex: 50000"
                                value="{{ request('max_price') }}">
                        </div>
                        <div class="col-md-1 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                    @if (request()->hasAny(['search', 'brand', 'model', 'min_price', 'max_price']))
                        <div class="mt-3">
                            <a href="{{ route('cars.index') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-x-circle"></i> Réinitialiser les filtres
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>

        <!-- Résultats -->
        <div class="mb-3">
            <p class="text-muted">
                <strong>{{ $cars->total() }}</strong> voiture(s) trouvée(s)
            </p>
        </div>

        <!-- Grille de voitures -->
        <div class="row g-4">
            @forelse($cars as $car)
                <div class="col-lg-4 col-md-6 fade-in">
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
                            <a href="{{ route('cars.show', $car) }}" class="btn btn-primary w-100 mt-3">
                                <i class="bi bi-eye"></i> Voir les détails
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center p-5">
                        <i class="bi bi-search" style="font-size: 3rem;"></i>
                        <h4 class="mt-3">Aucune voiture trouvée</h4>
                        <p>Essayez de modifier vos critères de recherche</p>
                        <a href="{{ route('cars.index') }}" class="btn btn-primary mt-3">
                            Voir toutes les voitures
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if ($cars->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $cars->links() }}
            </div>
        @endif
    </div>
@endsection

@push('styles')
<style>
    /* Styles personnalisés pour la pagination */
    .pagination {
        gap: 5px;
    }

    .pagination .page-link {
        border-radius: 8px;
        padding: 8px 12px;
        border: 1px solid #e2e8f0;
        color: #1e40af;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .pagination .page-link:hover {
        background: #1e40af;
        color: white;
        border-color: #1e40af;
    }

    .pagination .page-item.active .page-link {
        background: #1e40af;
        border-color: #1e40af;
    }

    .pagination .page-link svg {
        width: 14px;
        height: 14px;
        vertical-align: middle;
    }

    /* Centrer les chevrons verticalement */
    .pagination .page-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endpush
