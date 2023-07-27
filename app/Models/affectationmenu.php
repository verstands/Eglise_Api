<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\departement;
use App\Models\menu;


class affectationmenu extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'id_menu',
        'id_departement'
    ];

    public function id_menu(){
        return $this->belongsTo(menu::class, 'id_menu');
    }

    public function id_departement(){
        return $this->belongsTo(departement::class, 'id_departement');
    }
}
