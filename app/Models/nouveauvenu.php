<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\culte;



class nouveauvenu extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'nom',
        'adresse',
        'telephone',
        'culte',
        'egliseprovenance',
        'categorie',
    ];

    
    public function culte(){
        return $this->belongsTo(culte::class, 'culte');
    }
}
