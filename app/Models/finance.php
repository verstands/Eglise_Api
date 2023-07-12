<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class finance extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'nfiche',
        'culte_id',
        'typeoffrance_id',
        'devise_id',
        'homme',
        'femme',
        'enfant',
    ];
}
