<?php

namespace App\Http\Controllers;

use App\Mail\FactureMail;
use App\Models\Client;
use App\Models\Equipe;
use App\Models\Hebergement;
use App\Models\Historique;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
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
        return view('client.index');
    }

    public function getData()
    {

        if (auth()->user()->role === "Admin") {

            $clients = Client::orderByRaw("
        CASE
            WHEN status = 'En période de teste' THEN 1
            WHEN status = 'En attente de paiement' THEN 2
            WHEN status = 'Non Payé' THEN 3
            ELSE 4
        END
    ")->get();
        } else {

            $clients = Client::where('equipe_id', '=', auth()->user()->equipe_id)->orderByRaw("
        CASE
            WHEN status = 'En période de teste' THEN 1
            WHEN status = 'En attente de paiement' THEN 2
            WHEN status = 'Non Payé' THEN 3
            ELSE 4
        END
    ")->get();
        }


        foreach ($clients as $client) {
            $client->statusClass  = $this->getStatusClass($client->status);
            $client->date  = $client->updated_at->format('Y-m-d h:i');
            $client->equipe  = Client::find($client->id)->equipe->nom;
            $client->paiement  = Client::find($client->id)->paiement;
            $client->prixMensuelFix  = Hebergement::first()->prixMensuel;
            $client->prixTrimestrielFix  = Hebergement::first()->prixTrimestriel;
            $client->prixSemestrielFix  = Hebergement::first()->prixSemestriel;
            $client->prixAnnuelFix  = Hebergement::first()->prixAnnuel;
        }

        return response()->json($clients);
    }

    private function getStatusClass($status)
    {
        switch ($status) {
            case 'Payé':
                return 'bg-green-500 text-whitee';
            case 'En attente de paiement':
                return 'bg-orange-500 text-white';
            case 'En période de teste':
                return 'bg-gray-600 text-white';
            default:
                return 'bg-red-500 text-white';
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Client $client)
    {

        return view('client.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Client::create([
            'equipe_id' => auth()->user()->equipe_id,
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'status' => $request->status,
            'abonnement' => $request->abonnement,
            'prix' => $request->prix,
            'paiement' => $request->paiement,

        ]);

        return to_route('client.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {

        $equipes = Equipe::all();
        $currentEquipe = $client->equipe_id;

        return view('client.modifier', compact('client', 'equipes', 'currentEquipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {

        $client->update($request->all());
        Historique::create([
            'equipe_id' => auth()->user()->equipe_id,
            'user_id' => auth()->user()->id,
            'client_id' => $client->id,
            'status' => $client->status,
            'prix' => $client->prix,
            'paiement' => $request->paiement,

        ]);

        return to_route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        Historique::where('client_id', $client->id)->delete();
        $client->delete();

        return to_route('client.index');
    }
}
