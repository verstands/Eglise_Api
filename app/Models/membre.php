<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;



class membre extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'nom',
        'email',
        'postnom',
        'prenom',
        'sexe',
        'telephone',
        'adresse',
        'datenaissance',
        'etatcivil',
        'profession',
        'activite',
        'password',
        
    ];
}
