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
        $plats = Carte::query()
            ->where('categories', '=', 'plat')
            ->get();
        return view('lacarte.plat')->with('plats', $plats);
    }
}
