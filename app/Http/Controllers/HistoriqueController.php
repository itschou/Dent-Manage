<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Equipe;
use App\Models\Historique;
use App\Models\User;
use Illuminate\Http\Request;

class HistoriqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware(['auth', 'statusCheck']);
    }

    public function index()
    {
        return view('historique.index');
    }

    public function getData()
    {
        $historiques = Historique::orderByDesc('id')->get();

        foreach ($historiques as $historique) {
            $historique->equipe  = Equipe::find($historique->equipe_id)->nom;
            $historique->collaborateur  = User::find($historique->user_id)->nom . " " . User::find($historique->user_id)->prenom;
            $historique->clients  = Client::find($historique->client_id)->nom;
            $historique->prix  = $historique->prix;
            $historique->status  = $historique->status;
            $historique->date  = $historique->created_at->format('d-m-Y');
        }

        return response()->json($historiques);
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
    public function show(Historique $historique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Historique $historique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Historique $historique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Historique $historique)
    {
        //
    }
}
