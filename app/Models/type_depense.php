<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\devise;
use App\Models\caisse;
use App\Models\depense;


class type_depense extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'pournous',
        'ciasse_id',
        'depense_id',
        'montant',
        'devise_id',
        'beneficiaire'
    ];

    
    public function devise(){
        return $this->belongsTo(devise::class, 'devise_id');
    }
    
    public function caisse(){
        return $this->belongsTo(caisse::class, 'ciasse_id');
    }

    public function depense(){
        return $this->belongsTo(depense::class, 'depense_id');
    }
}
