<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipe_id',
        'user_id',
        'client_id',
        'prix',
        'status',
    ];

    public function utilisateur(){

        return $this->belongsTo(User::class);

    }

    public function equipes(){

        return $this->belongsTo(Equipe::class);

    }

    public function clients(){
        return $this->belongsTo(Client::class);
    }
}
