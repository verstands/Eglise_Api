<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\affectationmenu;


class CtrAffectationMenu extends Controller
{
    public function index($departement){
        $affectations = affectationmenu::with('id_menu')
            ->with('id_departement')
            /*->whereHas('id_departement', function ($query) use ($departement) {
                $query->where('nom_depart', $departement);
            })*/
            ->get();

        return response()->json([
            'data' => $affectations
        ], 200);
    }
}
