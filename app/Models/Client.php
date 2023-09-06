<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
        'telephone',
        'email',
        'status',
        'prix',
        'abonnement',
        'equipe',
        'equipe_id',
        'paiement'
    ];

    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }

    public function historique(){
        return $this->hasMany(Historique::class);
    }
}
