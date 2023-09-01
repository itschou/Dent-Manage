<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;

class EquipeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'statusCheck']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('equipe.index');
    }

    public function getData()
    {
        $equipes = Equipe::all();

        foreach ($equipes as $equipe) {
            $equipe->id  = $equipe->id;
            $equipe->nom  = $equipe->nom;
            $equipe->nombreMembres  = count($equipe->utilisateurs);
            $equipe->date = $equipe->created_at->format('d-m-Y');
        }

        return response()->json($equipes);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipe.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        notify()->success('Votre équipe a été créer avec succèss ', 'Bravo !');
        Equipe::create($request->all());

        return to_route('equipe.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipe $equipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipe $equipe)
    {
        return view('equipe.modifier', compact('equipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipe $equipe)
    {
        $equipe->update($request->all());

        notify()->success('Votre équipe a été modifié avec succèss ', 'Bravo !');

        return to_route('equipe.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipe $equipe)
    {
        //
    }
}
