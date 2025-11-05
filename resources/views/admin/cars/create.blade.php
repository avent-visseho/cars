@extends('layouts.admin')

@section('content')
    <div class="mb-4">
        <h1 style="font-weight: 800; color: #2d3748;">
            <i class="bi bi-plus-circle me-2"></i>Ajouter une Nouvelle Voiture
        </h1>
        <p style="color: #718096; font-size: 1.1rem;">Remplissez tous les champs pour ajouter une voiture à votre catalogue
        </p>
    </div>

    <div class="card">
        <div class="card-body p-4">
            <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-4">
                    <!-- Marque -->
                    <div class="col-md-6">
                        <label for="brand" class="form-label fw-bold" style="color: #2d3748; font-size: 1.1rem;">
                            <i class="bi bi-tag-fill text-primary me-2"></i>Marque *
                        </label>
                        <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand"
                            name="brand" value="{{ old('brand') }}" placeholder="Ex: Toyota, BMW, Mercedes..."
                            style="border-radius: 12px; padding: 12px 20px; border: 2px solid #e2e8f0; font-size: 1.05rem;"
                            required>
                        @error('brand')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Modèle -->
                    <div class="col-md-6">
                        <label for="model" class="form-label fw-bold" style="color: #2d3748; font-size: 1.1rem;">
                            <i class="bi bi-car-front text-primary me-2"></i>Modèle *
                        </label>
                        <input type="text" class="form-control @error('model') is-invalid @enderror" id="model"
                            name="model" value="{{ old('model') }}" placeholder="Ex: Camry, X5, C-Class..."
                            style="border-radius: 12px; padding: 12px 20px; border: 2px solid #e2e8f0; font-size: 1.05rem;"
                            required>
                        @error('model')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Année -->
                    <div class="col-md-6">
                        <label for="year" class="form-label fw-bold" style="color: #2d3748; font-size: 1.1rem;">
                            <i class="bi bi-calendar-event text-primary me-2"></i>Année *
                        </label>
                        <input type="number" class="form-control @error('year') is-invalid @enderror" id="year"
                            name="year" value="{{ old('year', date('Y')) }}" min="1900" max="{{ date('Y') + 1 }}"
                            style="border-radius: 12px; padding: 12px 20px; border: 2px solid #e2e8f0; font-size: 1.05rem;"
                            required>
                        @error('year')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Prix -->
                    <div class="col-md-6">
                        <label for="price" class="form-label fw-bold" style="color: #2d3748; font-size: 1.1rem;">
                            <i class="bi bi-cash-coin text-primary me-2"></i>Prix (FCFA) *
                        </label>
                        <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                            id="price" name="price" value="{{ old('price') }}" placeholder="Ex: 15000000"
                            style="border-radius: 12px; padding: 12px 20px; border: 2px solid #e2e8f0; font-size: 1.05rem;"
                            min="0" required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="col-12">
                        <label for="description" class="form-label fw-bold" style="color: #2d3748; font-size: 1.1rem;">
                            <i class="bi bi-file-text text-primary me-2"></i>Description *
                        </label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="5" placeholder="Décrivez les caractéristiques, l'état et les équipements de la voiture..."
                            style="border-radius: 12px; padding: 15px 20px; border: 2px solid #e2e8f0; font-size: 1.05rem;" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr class="my-5" style="border-color: #e2e8f0; border-width: 2px;">

                <!-- Image principale -->
                <div class="mb-4">
                    <label for="main_image" class="form-label fw-bold" style="color: #2d3748; font-size: 1.1rem;">
                        <i class="bi bi-image text-primary me-2"></i>Image Principale *
                    </label>
                    <input type="file" class="form-control @error('main_image') is-invalid @enderror" id="main_image"
                        name="main_image" accept="image/*" onchange="previewMainImage(event)"
                        style="border-radius: 12px; padding: 12px 20px; border: 2px solid #e2e8f0;" required>
                    @error('main_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Formats : JPEG, PNG, JPG, GIF (Max: 2MB)</small>

                    <!-- Prévisualisation -->
                    <div id="mainImagePreview" class="mt-3" style="display: none;">
                        <p class="fw-bold text-success"><i class="bi bi-check-circle me-2"></i>Aperçu :</p>
                        <img id="mainImagePreviewImg" src="" alt="Prévisualisation" class="img-fluid rounded"
                            style="max-height: 300px; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                    </div>
                </div>

                <!-- Images supplémentaires -->
                <div class="mb-5">
                    <label for="additional_images" class="form-label fw-bold" style="color: #2d3748; font-size: 1.1rem;">
                        <i class="bi bi-images text-primary me-2"></i>Images Supplémentaires (Optionnel)
                    </label>
                    <input type="file" class="form-control @error('additional_images.*') is-invalid @enderror"
                        id="additional_images" name="additional_images[]" accept="image/*" multiple
                        onchange="previewAdditionalImages(event)"
                        style="border-radius: 12px; padding: 12px 20px; border: 2px solid #e2e8f0;">
                    @error('additional_images.*')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Vous pouvez sélectionner plusieurs images en même temps</small>

                    <!-- Prévisualisation -->
                    <div id="additionalImagesPreview" class="row g-3 mt-2"></div>
                </div>

                <hr class="my-5" style="border-color: #e2e8f0; border-width: 2px;">

                <!-- Boutons -->
                <div class="d-flex gap-3">
                    <button type="submit" class="btn btn-gradient btn-lg px-5">
                        <i class="bi bi-check-circle me-2"></i>Enregistrer la Voiture
                    </button>
                    <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary btn-lg px-5"
                        style="border-radius: 12px;">
                        <i class="bi bi-x-circle me-2"></i>Annuler
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
                        '<p class="fw-bold text-success"><i class="bi bi-check-circle me-2"></i>Aperçu des images supplémentaires :</p>';
                    preview.appendChild(title);
                }

                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const col = document.createElement('div');
                        col.className = 'col-md-3';
                        col.innerHTML =
                            `<img src="${e.target.result}" class="img-fluid rounded" style="height: 150px; object-fit: cover; width: 100%; box-shadow: 0 8px 20px rgba(0,0,0,0.12);">`;
                        preview.appendChild(col);
                    };

                    reader.readAsDataURL(file);
                }
            }
        </script>
    @endpush
@endsection
