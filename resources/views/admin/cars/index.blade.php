@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 style="font-weight: 800; color: #2d3748;">
            <i class="bi bi-car-front me-2"></i>Gérer les Voitures
        </h1>
        <a href="{{ route('admin.cars.create') }}" class="btn btn-gradient btn-lg">
            <i class="bi bi-plus-circle me-2"></i>Ajouter une Voiture
        </a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background: #f7fafc;">
                        <tr>
                            <th width="120" class="px-4 py-3">Image</th>
                            <th class="py-3">Marque</th>
                            <th class="py-3">Modèle</th>
                            <th class="py-3">Année</th>
                            <th class="py-3">Prix</th>
                            <th width="150" class="text-center py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cars as $car)
                            <tr>
                                <td class="px-4">
                                    <img src="{{ asset('storage/' . $car->main_image) }}" alt="{{ $car->brand }}"
                                        class="rounded"
                                        style="width: 90px; height: 70px; object-fit: cover; box-shadow: 0 4px 10px rgba(0,0,0,0.1);"
                                        onerror="this.src='https://images.unsplash.com/photo-1494976388531-d1058494cdd8?w=200&h=150&fit=crop'">
                                </td>
                                <td><strong style="color: #2d3748;">{{ $car->brand }}</strong></td>
                                <td style="color: #4a5568;">{{ $car->model }}</td>
                                <td><span class="badge"
                                        style="background: linear-gradient(135deg, #1e40af, #0c2d5e); padding: 8px 15px; border-radius: 10px;">{{ $car->year }}</span>
                                </td>
                                <td><strong style="color: #1e40af; font-size: 1.1rem;">{{ $car->formatted_price }}
                                        FCFA</strong></td>
                                <td class="text-center">
                                    <a href="{{ route('admin.cars.edit', $car) }}" class="btn btn-warning btn-sm"
                                        style="border-radius: 10px; padding: 8px 15px;" title="Modifier">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.cars.destroy', $car) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette voiture ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            style="border-radius: 10px; padding: 8px 15px;" title="Supprimer">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <i class="bi bi-inbox" style="font-size: 4rem; color: #e2e8f0;"></i>
                                    <p class="mt-3 text-muted fs-5">Aucune voiture trouvée.</p>
                                    <a href="{{ route('admin.cars.create') }}" class="btn btn-gradient mt-2">
                                        <i class="bi bi-plus-circle me-2"></i>Ajouter la Première Voiture
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($cars->hasPages())
        <div class="mt-4">
            {{ $cars->links() }}
        </div>
    @endif
@endsection

@push('styles')
    <style>
        /* Styles pour la pagination */
        .pagination {
            gap: 5px;
        }

        .pagination .page-link {
            border-radius: 8px;
            padding: 2px 2px;
            border: 1px solid #e2e8f0;
            color: red;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .pagination .page-link:hover {
            background: red;
            color: white;
            border-color: #1e40af;
        }

        .pagination .page-item.active .page-link {
            background: red;
            border-color: red;
        }

        /* Limiter la taille des chevrons SVG */
        .pagination .page-link svg {
            width: 2px;
            height: 2px;
            vertical-align: middle;
        }
    </style>
@endpush
