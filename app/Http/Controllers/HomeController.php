<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Page d'accueil
    public function index()
    {
        $featuredCars = Car::latest()->take(6)->get();
        return view('home', compact('featuredCars'));
    }

    // Page À propos
    public function about()
    {
        return view('about');
    }
}
