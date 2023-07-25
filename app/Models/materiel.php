<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\devise;
use App\Models\departement;
use App\Models\categorie_materiel;



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

    public function devide_id(){
        return $this->belongsTo(devise::class, 'devide_id');
    }

    public function id_departement(){
        return $this->belongsTo(departement::class, 'id_departement');
    }

    public function categorie_id(){
        return $this->belongsTo(categorie_materiel::class, 'categorie_id');
    }
}
