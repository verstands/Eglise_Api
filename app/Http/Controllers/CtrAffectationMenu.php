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
            ->whereHas('id_departement', function ($query) use ($departement) {
                $query->where('id', $departement);
            })
            ->get();

        return response()->json([
            'data' => $affectations
        ], 200);
    }
    public function indexs(){
        $affectations = affectationmenu::with('id_menu')
            ->with('id_departement')
            ->get();

        return response()->json([
            'data' => $affectations
        ], 200);
    }

    public function delete($id){
        $verify = affectationmenu::whereId($id)->first();
        if($verify == true){
             $verify->delete();
             return response()->json([
                 'message' => 'La suppression a été fait avec succes ! ',
             ], 200);
         }else{
             return response()->json([
                 'message' => ' identifiant non trouvé ! '
             ], 401);
         }
    }

    public function create(Request $request){
        $request->validate([
            'id_menu' => 'required',
            'id_departement' => 'required'
        ]);
        $valide = affectationmenu::create([
            'id_menu' => $request->id_menu,
            'id_departement' => $request->id_departement
        ]);

        return response()->json([
            'message' => "succès !",
            'data' => $valide
        ], 200);
    }
}
