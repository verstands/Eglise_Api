<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\departement;
use App\Models\membre;


class communication extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'departement',
        'obejet',
        'piece',
        'text',
        'membre_id',
        'type_message'
    ];

    public function membre_id(){
        return $this->belongsTo(membre::class,'membre_id');
    }

    public function departement(){
        return $this->belongsTo(departement::class,'departement');
    }
}
