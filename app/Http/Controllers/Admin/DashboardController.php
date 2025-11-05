<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        // Calculer les statistiques
        $totalCars = Car::count();
        $avgPrice = Car::avg('price') ?? 0;
        $totalBrands = Car::distinct('brand')->count('brand');

        return view('admin.dashboard', compact('totalCars', 'avgPrice', 'totalBrands'));
    }
}
