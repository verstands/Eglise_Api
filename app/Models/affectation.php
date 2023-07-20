<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\membre;
use App\Models\departement;


class affectation extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'nom_membre',
        'departement_id',
        'state'
    ];

    public function nom_membre(){
        return $this->belongsTo(membre::class, 'nom_membre');
    }

    public function departement_id(){
        return $this->belongsTo(departement::class, 'departement_id');
    }
}
