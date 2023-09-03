<?php

namespace App\Http\Controllers;

use App\Mail\FactureMail;
use App\Models\Client;
use App\Models\Hebergement;
use App\Models\Historique;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::orderByRaw("
            CASE
                WHEN status = 'En période de teste' THEN 1
                WHEN status = 'Non Payé' THEN 2
                WHEN status = 'En attente de paiement' THEN 3
                ELSE 4
            END
        ")->get();

        return view('client.index', compact('clients'));
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

        ]);


        emotify('success', 'Vous venez de créer un client !');

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
        return view('client.modifier', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {

        try {

            if ($request->input('edit') === "edit") {
                $client->update($request->all());
                notify()->success('Vous avez modifié ' . $client->nom . ' avec succès !', 'Bravo !');
            } else {
                $client->update($request->all());
                Mail::to($client->email)->send(new FactureMail($client));
                Historique::create([
                    'equipe_id' => auth()->user()->equipe_id,
                    'user_id' => auth()->user()->id,
                    'client_id' => $client->id,
                    'status' => $client->status,
                    'prix' => $client->prix,
                ]);
                notify()->success('Vous avez envoyé une facture à ' . $client->email . ' avec succès !', 'Bravo !');
            }
        } catch (\Exception $e)  {
            notify()->preset('modif-erreur');
        }
        return to_route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {


        try {

            $client->delete();
            notify()->success('Vous avez supprimé ' . $client->nom . ' avec succès !', 'Bravo !');
        } catch (\Exception $e)  {
            notify()->preset('delete-erreur');
        }
        return to_route('client.index');
    }
}
