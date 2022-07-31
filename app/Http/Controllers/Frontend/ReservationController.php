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
        $resa = $request->session()->get('resa');  //récupére la réservation demandé par l'utilisateur
        $min_date = Carbon::tomorrow();  //récupére la date de demain
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
            $resa->fill($validated);
            $request->session()->put('resa', $resa);
        }

        return to_route('reservation.deuxieme');
    }

    public function deuxieme(Request $request)
    {
        $resa = $request->session()->get('resa');  //récupére les données de réservation de l'utilisateur connecté

        $daterequest = $resa->date; //récupére la date demandé
        $heurerequest = $resa->heure; //récupére l'heure demandé
        $guestrequest = $resa->personnes; //récupére le nombre de personnes demandé pour la réservation 



        $res_table_ids = Reservation::query()  //table de donnée des réservations
            ->where('date', '=', $daterequest)  //ou dans la colonne date est égale à la date demandé
            ->where('heure', '=', $heurerequest) //ou dans la colonne heure est égale à l'heure demandé
            ->get(); // on récupére les tables qui ont des réservation identique à la réservation demandé


        $tables = Table::query()   //table de donnée des tables
            ->where('chaises', '>=', $resa->personnes)  //ou dans la colonne chaises est supérieur ou égale au nombre de personne demandé pour la réservation
            ->whereNotIn('id', $res_table_ids->pluck('table_id')) //ou l'id de la table demandé n'est pas dans la variable $res_table_ids
            ->get(); //on récupere les tables qui ont des chaises supérieur ou égale au nombre de personne demandé et les tables qui n'ont pas de réservation identique

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
