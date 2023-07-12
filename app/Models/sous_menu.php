<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\menu;

class sous_menu extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'nom_smenu',
        'menu_id'
    ];


    public function menu(){
        return $this->belongsTo(menu::class);
    }
}
