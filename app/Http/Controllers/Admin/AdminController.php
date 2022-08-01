<?php

namespace App\Http\Controllers\Admin;

use App\Models\Carte;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $cartes = Carte::all();
        return view('admin.carte.index', compact('cartes'));
    }
}
