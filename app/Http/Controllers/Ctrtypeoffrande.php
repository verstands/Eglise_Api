<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\type_offrande;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Ctrtypeoffrande extends Controller
{
    public function create(Request $request){
        $request->validate([
            'nom_typeoff' => 'required',
        ]);
        $valide = type_offrande::create([
            'nom_typeoff' => $request->nom_typeoff,
        ]);

        return response()->json([
            'message' => "type_offrande créé avec succès !",
            'data' => $valide
        ], 200);
    }
    //index
    public function index(){
        $view = type_offrande::all();
        return response()->json([
            'data' => $view
        ], 200);
    }
    //get ID
    public function indexID($id){
        $verify = type_offrande::whereId(['id' => $id])->first();
        if($verify){
            return response()->json([
                'data' => $verify
             ],200);
        }else{
            return response()->json([
                'message' => "type_offrande non trouvé !"
            ], 401);
        }  
    }
    //delete
    public function delete($id){
        $verify = type_offrande::whereId($id)->first();
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
    //update
    public function update(Request $request, $id){
        $request->validate([
            'nom_typeoff' => 'required'
        ]);
        $verify = type_offrande::whereId($id)->first();
        if($verify == true){
             $verify->update([
                'nom_typeoff' => $request->nom_typeoff,
             ]);
             return response()->json([
                 'message' => 'La modification a été fait avec succes ! ',
             ], 200);
         }else{
             return response()->json([
                 'message' => ' identifiant non trouvé ! '
             ], 401);
         }
    }
}
