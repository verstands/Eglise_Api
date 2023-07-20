<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\membre;
use App\Models\mission;


class mouvement extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'membre',
        'mission',
    ];

    public function membre(){
        return $this->belongsTo(membre::class, 'membre');
    }

    public function mission(){
        return $this->belongsTo(mission::class, 'mission');
    }
}
