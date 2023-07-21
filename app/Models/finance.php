<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\devise;
use App\Models\type_offrande;
use App\Models\culte;


class finance extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'nfiche',
        'culte_id',
        'typeoffrande_id',
        'devise_id',
        'homme',
        'femme',
        'enfant',
        'montant',
        'effectif'
    ];

    public function devise(){
        return $this->belongsTo(devise::class);
    }
    public function typeoffrande(){
        return $this->belongsTo(type_offrande::class, 'typeoffrande_id');
    }
    public function culte(){
        return $this->belongsTo(culte::class, 'culte_id');
    }
}
