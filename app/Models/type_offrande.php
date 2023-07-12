<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class type_offrande extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'nom_typeoff'
    ];
}
