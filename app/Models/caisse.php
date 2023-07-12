<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\devise;



class caisse extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'nom_caisse',
        'montant',
        'devise_id'
    ];

    public function devise(){
        return $this->belongsTo(devise::class, 'devise_id');
    }
}
