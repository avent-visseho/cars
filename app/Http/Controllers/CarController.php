<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Liste des voitures avec recherche et filtres
    public function index(Request $request)
    {
        $query = Car::query();

        // Recherche par nom (brand ou model)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('brand', 'like', "%{$search}%")
                    ->orWhere('model', 'like', "%{$search}%");
            });
        }

        // Filtre par marque
        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        // Filtre par modèle
        if ($request->filled('model')) {
            $query->where('model', $request->model);
        }

        // Filtre par prix minimum
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        // Filtre par prix maximum
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $cars = $query->latest()->paginate(12);
        $brands = Car::distinct()->pluck('brand');
        $models = Car::distinct()->pluck('model');

        return view('cars.index', compact('cars', 'brands', 'models'));
    }

    // Détails d'une voiture
    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }
}
