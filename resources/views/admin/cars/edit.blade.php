{{-- ============================================= --}}
{{-- Fichier: resources/views/admin/cars/edit.blade.php --}}
{{-- Formulaire d'édition de voiture --}}
{{-- ============================================= --}}

@extends('layouts.admin')

@section('content')
    <div class="mb-4">
        <h1><i class="bi bi-pencil"></i> Modifier la Voiture</h1>
        <p class="text-muted">Modifiez les informations de la voiture</p>
    </div>

    <div class="card">
        <div class="card-body p-4">
            <form action="{{ route('admin.cars.update', $car) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Marque -->
                    <div class="col-md-6 mb-3">
                        <label for="brand" class="form-label fw-bold">
                            <i class="bi bi-tag"></i> Marque *
                        </label>
                        <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand"
                            name="brand" value="{{ old('brand', $car->brand) }}" required>
                        @error('brand')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Modèle -->
                    <div class="col-md-6 mb-3">
                        <label for="model" class="form-label fw-bold">
                            <i class="bi bi-car-front"></i> Modèle *
                        </label>
                        <input type="text" class="form-control @error('model') is-invalid @enderror" id="model"
                            name="model" value="{{ old('model', $car->model) }}" required>
                        @error('model')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <!-- Année -->
                    <div class="col-md-6 mb-3">
                        <label for="year" class="form-label fw-bold">
                            <i class="bi bi-calendar"></i> Année *
                        </label>
                        <input type="number" class="form-control @error('year') is-invalid @enderror" id="year"
                            name="year" value="{{ old('year', $car->year) }}" min="1900" max="{{ date('Y') + 1 }}"
                            required>
                        @error('year')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Prix -->
                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label fw-bold">
                            <i class="bi bi-cash-coin"></i> Prix (FCFA) *
                        </label>
                        <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                            id="price" name="price" value="{{ old('price', $car->price) }}" min="0" required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">
                        <i class="bi bi-file-text"></i> Description *
                    </label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                        rows="5" required>{{ old('description', $car->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <hr class="my-4">

                <!-- Image principale actuelle -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Image Principale Actuelle</label>
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $car->main_image) }}" alt="Image principale"
                            class="img-fluid rounded shadow" style="max-width: 300px;">
                    </div>

                    <label for="main_image" class="form-label fw-bold">
                        <i class="bi bi-image"></i> Changer l'Image Principale (Optionnel)
                    </label>
                    <input type="file" class="form-control @error('main_image') is-invalid @enderror" id="main_image"
                        name="main_image" accept="image/*" onchange="previewMainImage(event)">
                    @error('main_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Laissez vide pour conserver l'image actuelle</small>

                    <!-- Prévisualisation -->
                    <div id="mainImagePreview" class="mt-3" style="display: none;">
                        <p class="text-success"><i class="bi bi-check-circle"></i> Nouvelle image :</p>
                        <img id="mainImagePreviewImg" src="" alt="Prévisualisation" class="img-fluid rounded shadow"
                            style="max-height: 300px;">
                    </div>
                </div>

                <!-- Images supplémentaires actuelles -->
                @if ($car->images->count() > 0)
                    <div class="mb-3">
                        <label class="form-label fw-bold">Images Supplémentaires Actuelles</label>
                        <div class="row g-2">
                            @foreach ($car->images as $image)
                                <div class="col-md-3">
                                    <div class="position-relative">
                                        <img src="{{ asset('storage/' . $image->image_path) }}"
                                            class="img-fluid rounded shadow"
                                            style="height: 150px; object-fit: cover; width: 100%;">
                                        <form action="{{ route('admin.cars.images.delete', $image) }}" method="POST"
                                            class="position-absolute top-0 end-0 m-2"
                                            onsubmit="return confirm('Supprimer cette image ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Ajouter de nouvelles images -->
                <div class="mb-4">
                    <label for="additional_images" class="form-label fw-bold">
                        <i class="bi bi-images"></i> Ajouter des Images Supplémentaires (Optionnel)
                    </label>
                    <input type="file" class="form-control @error('additional_images.*') is-invalid @enderror"
                        id="additional_images" name="additional_images[]" accept="image/*" multiple
                        onchange="previewAdditionalImages(event)">
                    @error('additional_images.*')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <!-- Prévisualisation -->
                    <div id="additionalImagesPreview" class="row g-2 mt-3"></div>
                </div>

                <hr class="my-4">

                <!-- Boutons -->
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="bi bi-check-circle"></i> Mettre à Jour la Voiture
                    </button>
                    <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary btn-lg">
                        <i class="bi bi-x-circle"></i> Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            function previewMainImage(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('mainImagePreview').style.display = 'block';
                        document.getElementById('mainImagePreviewImg').src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }

            function previewAdditionalImages(event) {
                const files = event.target.files;
                const preview = document.getElementById('additionalImagesPreview');
                preview.innerHTML = '';

                if (files.length > 0) {
                    const title = document.createElement('div');
                    title.className = 'col-12';
                    title.innerHTML =
                        '<p class="text-success"><i class="bi bi-check-circle"></i> Nouvelles images à ajouter :</p>';
                    preview.appendChild(title);
                }

                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const col = document.createElement('div');
                        col.className = 'col-md-3';
                        col.innerHTML =
                            `<img src="${e.target.result}" class="img-fluid rounded shadow" style="height: 150px; object-fit: cover; width: 100%;">`;
                        preview.appendChild(col);
                    };

                    reader.readAsDataURL(file);
                }
            }
        </script>
    @endpush
@endsection
