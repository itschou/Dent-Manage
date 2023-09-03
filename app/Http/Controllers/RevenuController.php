<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Equipe;
use Illuminate\Http\Request;

class RevenuController extends Controller
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

        $nombreClient = count(Equipe::find(auth()->user()->equipe->id)->clients);
        $nombreCollaborateursinEquipe = Equipe::find(auth()->user()->equipe->id)->utilisateurs;
        
        if(auth()->user()->role === 'Admin'){
            $argentTotal = Client::all()->sum('prix');
        }else{
            $argentTotal = Equipe::find(auth()->user()->equipe->id)->clients()->sum('prix');
        }

        return view('revenu.index', compact('nombreClient', 'argentTotal', 'nombreCollaborateursinEquipe'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
