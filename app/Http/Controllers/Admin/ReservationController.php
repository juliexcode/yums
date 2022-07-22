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

        $daterequest = $request->date;
        $heurerequest = $request->heure;
        $tablerequest = $request->table_id;

        $reservation = Reservation::query()
            ->where('date', '=', $daterequest)
            ->where('heure', '=', $heurerequest)
            ->where('table_id', '=', $tablerequest)
            ->get();

        if (count($reservation) != 0) {
            // dd($reservation);
            return  back()->with('danger', 'Nous sommes désolé mais cette table est déja réservé pour cette date, veuillez en choisir une autre.');
        }
        // foreach ($table->reservations as $res) {
        //     $startReserv = date('Y-m-d H:i', strtotime($res . ' - ' . $limite . ' minute'));
        //     if (($res->reserv->format('Y-m-d H:i')  == $request_date->format('Y-m-d H:i')) && ($res->reservFin->format('Y-m-d H:i')  $request_date->format('Y-m-d H:i'))) {

        //         return back()->with('danger', 'Nous sommes désolé mais cette table est déja réservé pour cette date, veuillez en choisir une autre.');
        //     }
        // }

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
