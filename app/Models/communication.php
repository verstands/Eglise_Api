<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\membre;


class communication extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'Departement',
        'obejet',
        'piece',
        'text',
        'membre_id'
    ];

    public function membre(){
        return $this->belongsTo(membre::class);
    }
}
