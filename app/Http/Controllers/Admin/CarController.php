<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    // Liste des voitures (admin)
    public function index()
    {
        $cars = Car::latest()->paginate(10);
        return view('admin.cars.index', compact('cars'));
    }

    // Formulaire de création
    public function create()
    {
        return view('admin.cars.create');
    }

    // Enregistrer une nouvelle voiture
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'additional_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Enregistrer l'image principale
        $mainImagePath = $request->file('main_image')->store('cars', 'public');

        // Créer la voiture
        $car = Car::create([
            'brand' => $validated['brand'],
            'model' => $validated['model'],
            'year' => $validated['year'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'main_image' => $mainImagePath
        ]);

        // Enregistrer les images supplémentaires
        if ($request->hasFile('additional_images')) {
            foreach ($request->file('additional_images') as $image) {
                $imagePath = $image->store('cars', 'public');
                CarImage::create([
                    'car_id' => $car->id,
                    'image_path' => $imagePath
                ]);
            }
        }

        return redirect()->route('admin.cars.index')
            ->with('success', 'Voiture créée avec succès !');
    }

    // Formulaire d'édition
    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    // Mettre à jour une voiture
    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'additional_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Mettre à jour l'image principale si fournie
        if ($request->hasFile('main_image')) {
            Storage::disk('public')->delete($car->main_image);
            $validated['main_image'] = $request->file('main_image')->store('cars', 'public');
        }

        $car->update($validated);

        // Ajouter de nouvelles images supplémentaires
        if ($request->hasFile('additional_images')) {
            foreach ($request->file('additional_images') as $image) {
                $imagePath = $image->store('cars', 'public');
                CarImage::create([
                    'car_id' => $car->id,
                    'image_path' => $imagePath
                ]);
            }
        }

        return redirect()->route('admin.cars.index')
            ->with('success', 'Voiture mise à jour avec succès !');
    }

    // Supprimer une voiture
    public function destroy(Car $car)
    {
        // Supprimer l'image principale
        Storage::disk('public')->delete($car->main_image);

        // Supprimer les images supplémentaires
        foreach ($car->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        $car->delete();

        return redirect()->route('admin.cars.index')
            ->with('success', 'Voiture supprimée avec succès !');
    }

    // Supprimer une image supplémentaire
    public function deleteImage($imageId)
    {
        $image = CarImage::findOrFail($imageId);
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return back()->with('success', 'Image supprimée avec succès !');
    }
}
