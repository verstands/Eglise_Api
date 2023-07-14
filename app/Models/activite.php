<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\departement;


class activite extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'activite',
        'departement_id'
    ];

    public function departement(){
        return $this->belongsTo(departement::class, 'departement_id');
    }
}
