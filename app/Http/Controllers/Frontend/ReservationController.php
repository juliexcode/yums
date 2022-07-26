<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Table;
use App\Rules\DateBetween;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function premier(Request $request)
    {
        $resa = $request->session()->get('resa');
        $min_date = Carbon::today();
        return view('reservation.premier', compact('resa', 'min_date'));
    }

    public function storepremier(Request $request)
    {
        $validated = $request->validate([
            'nom' => ['required'],
            'prenom' => ['required'],
            'email' => ['required', 'email'],
            'tel' => ['required'],
            'date' => ['required', 'date', new DateBetween],
            'heure' => ['required'],
            'personnes' => ['required'],
        ]);
        if (empty($request->session()->get('resa'))) {
            $resa = new Reservation();
            $resa->fill($validated);
            $request->session()->put('resa', $resa);
        } else {
            $resa = $request->session()->get('resa');
            $request->session()->put('resa', $resa);
        }

        return to_route('reservation.deuxieme');
    }

    public function deuxieme(Request $request)
    {
        $resa = $request->session()->get('resa');

        $daterequest = $resa->date;
        $heurerequest = $resa->heure;
        $guestrequest = $resa->personnes;
        // dd($guestrequest);


        $res_table_ids = Reservation::query()
            ->where('date', '=', $daterequest)
            ->where('heure', '=', $heurerequest)
            ->get();

        // if (count($res_table_ids) != 0) {
        //     return $res_table_ids;
        // };

        // if (count($res_table_ids) != 0) {
        //     dd($res_table_ids->pluck('table_id'));
        // };

        // $res_table_ids = Reservation::orderBy('date')->orderBy('heure')->get()->filter(function ($value) use ($resa) {
        //     return ($value->date->format('Y-m-d') && $value->heure) == ($resa->date->format('Y-m-d') && $resa->heure);
        // })->pluck('table_id');

        $tables = Table::query()
            ->where('chaises', '>=', $resa->personnes)
            ->whereNotIn('id', $res_table_ids->pluck('table_id'))
            ->get();

        return view('reservation.deuxieme', compact('resa', 'tables'));
    }

    public function storedeuxieme(Request $request)
    {
        $validated = $request->validate([
            'table_id' => ['required']
        ]);
        $resa = $request->session()->get('resa');
        $resa->fill($validated);
        $resa->save();
        $request->session()->forget('resa');
        return to_route('merci');
    }
}
