<?php

namespace App\Http\Controllers\Admin;

use App\Models\Carte;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CarteStoreRequest;

class CarteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartes = Carte::all();
        return view('admin.carte.index', compact('cartes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carte.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarteStoreRequest $request)
    {
        $image = $request->file('image')->store('public/images');

        Carte::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'prix' => $request->prix,
            'categories' => $request->categories,
        ]);
        return to_route('admin.carte.index')->with('success', 'produit ajouté à la carte');
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
    public function edit(Carte $carte)
    {
        return view('admin.carte.edit', compact('carte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, carte $carte)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'categories' => 'required',
        ]);
        $image = $carte->image;
        if ($request->hasFile('image')) {
            Storage::delete($carte->image);
            $image = $request->file('image')->store('public/images');
        }
        $carte->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'prix' => $request->prix,
            'categories' => $request->categories,
        ]);
        return to_route('admin.carte.index')->with('warning', 'produit modifié à la carte');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(carte $carte)
    {
        Storage::delete($carte->image);
        $carte->delete();
        return to_route('admin.carte.index')->with('danger', 'produit supprimé à la carte');
    }
}
