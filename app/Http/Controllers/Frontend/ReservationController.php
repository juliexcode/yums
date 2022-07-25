<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function index()
    {
        $tables = Table::all();
        return view('reservation.index', compact('tables'));
    }
}
