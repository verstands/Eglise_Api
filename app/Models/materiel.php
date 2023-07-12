<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class materiel extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'materiel',
        'categorie_id',
        'stock',
        'cout',
        'devide_id',
    ];
}
