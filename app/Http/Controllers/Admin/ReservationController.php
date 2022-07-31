<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.resa.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tables = Table::all();
        return view('admin.resa.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationStoreRequest $request)
    {

        $table = Table::findOrFail($request->table_id);
        if ($request->personnes > $table->chaises) {
            return back()->with('danger', 'Veuillez choisir une table basée sur le nombre de personnes souhaité');
        }

        $daterequest = $request->date; //récupére la date demandé
        $heurerequest = $request->heure; //récupére l'heure demandé
        $tablerequest = $request->table_id; //récupére la table demandé

        $reservation = Reservation::query()
            ->where('date', '=', $daterequest)  //ou dans la colonne date est égale à la date demandé
            ->where('heure', '=', $heurerequest) //ou dans la colonne heure est égale à l'heure demandé
            ->where('table_id', '=', $tablerequest) //ou dans la colonne table est égale à la table demandé
            ->get(); //Récupére

        if (count($reservation) != 0) {
            //si la réservation demander est différent de 0 càd il y a une réservation identique alors on retourne un message
            return  back()->with('danger', 'Nous sommes désolé mais cette table est déja réservé pour cette date, veuillez en choisir une autre.');
        }


        Reservation::create(
            [
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'tel' => $request->tel,
                'date' => $request->date,
                'heure' => $request->heure,
                'table_id' => $request->table_id,
                'personnes' => $request->personnes,
            ]
        );



        return to_route('admin.resa.index')->with('success', 'Réservation effectué');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $resa)
    {
        $tables = Table::all();
        return view('admin.resa.edit', compact('resa', 'tables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationStoreRequest $request, Reservation $resa)
    {
        $table = Table::findOrFail($request->table_id);
        if ($request->personnes > $table->chaises) {
            return back()->with('danger', 'Veuillez choisir une table basée sur le nombre de personnes souhaité');
        }

        $daterequest = $request->date;
        $heurerequest = $request->heure;
        $tablerequest = $request->table_id;

        $reservation = Reservation::query()
            ->where('id', '!=', $resa->id)
            ->where('date', '=', $daterequest)
            ->where('heure', '=', $heurerequest)
            ->where('table_id', '=', $tablerequest)

            ->get();

        if (count($reservation) != 0) {
            // dd($reservation);
            return  back()->with('danger', 'Nous sommes désolé mais cette table est déja réservé pour cette date, veuillez en choisir une autre.');
        }

        $resa->update($request->validated());
        return to_route('admin.resa.index')->with('warning', 'Réservation modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $resa)
    {
        $resa->delete();
        return to_route('admin.resa.index')->with('danger', 'Réservation annulé');
    }
}
