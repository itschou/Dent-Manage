<?php

namespace App\Observers;

use App\Mail\FactureMail;
use App\Models\Client;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ClientObserver
{
    /**
     * Handle the Client "created" event.
     */
    public function created(Client $client): void
    {
        Mail::to($client->email)->send(new FactureMail($client, 'DentAssist Facture - Nouveau client'));
        emotify('success', 'Vous venez de créer un client !');
    }

    public function creating(Client $client)
    {
        $prefix = 'SKU-'; // Par exemple, un préfixe personnalisé
        $randomPart = strtoupper(Str::random(8)); // Génère 6 caractères aléatoires
        $sku = $prefix . $randomPart;
        $client->sku = $sku;
    }

    /**
     * Handle the Client "updated" event.
     */
    public function updated(Client $client): void
    {
        Mail::to($client->email)->send(new FactureMail($client, 'DentAssist Facture - Modification'));
        notify()->success('Vous avez envoyé une facture à ' . $client->email . ' avec succès !', 'Bravo !');
    }

    /**
     * Handle the Client "deleted" event.
     */
    public function deleted(Client $client): void
    {
        notify()->success('Vous avez supprimé ' . $client->nom . ' avec succès !', 'Bravo !');
    }

    /**
     * Handle the Client "restored" event.
     */
    public function restored(Client $client): void
    {
        //
    }

    /**
     * Handle the Client "force deleted" event.
     */
    public function forceDeleted(Client $client): void
    {
        //
    }
}
