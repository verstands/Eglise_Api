<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\devise;
use App\Models\departement;


class materiel extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'materiel',
        'categorie_id',
        'stock',
        'cout',
        'devide_id',
        'id_departement'
    ];

    public function devise(){
        return $this->belongsTo(devise::class, 'devise_id');
    }

    public function departement(){
        return $this->belongsTo(departement::class, 'id_departement');
    }
}
