<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\membre;
use App\Models\mission;
use App\Models\type_mouvement;


class mouvement extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'membre',
        'mission',
        'id_type'
    ];

    public function membre(){
        return $this->belongsTo(membre::class, 'membre');
    }

    public function mission(){
        return $this->belongsTo(mission::class, 'mission');
    }

    public function id_type(){
        return $this->belongsTo(type_mouvement::class, 'id_type');
    }
}
