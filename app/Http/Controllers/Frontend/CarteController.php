<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Carte;
use Illuminate\Http\Request;

class CarteController extends Controller
{
    public function index()
    {
        $cartes = Carte::all();
        return view('lacarte.index', compact('cartes'));
    }
    public function plat()
    {
        $cartes = Carte::query()
            ->where('categories', '=', 'plat')
            ->get();
        return view('lacarte.plat')->with('cartes', $cartes);
    }
    public function entree()
    {
        $cartes = Carte::query()
            ->where('categories', '=', 'Entrée')
            ->get();
        return view('lacarte.plat')->with('cartes', $cartes);
    }
    public function dessert()
    {
        $cartes = Carte::query()
            ->where('categories', '=', 'dessert')
            ->get();
        return view('lacarte.plat')->with('cartes', $cartes);
    }
    public function boisson()
    {
        $cartes = Carte::query()
            ->where('categories', '=', 'boisson')
            ->get();
        return view('lacarte.plat')->with('cartes', $cartes);
    }
}
