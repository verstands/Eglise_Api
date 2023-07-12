<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\caisse;
use App\Models\devise;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Ctrcaisse extends Controller
{
    public function create(Request $request){
        $request->validate([
            'nom_caisse' => 'required',
            'montant' => 'required',
            'devise_id' => 'required',
        ]);
        $valide = caisse::create([
            'nom_caisse' => $request->nom_caisse,
            'montant' => $request->montant,
            'devise_id' => $request->devise_id,
        ]);

        return response()->json([
            'message' => "caisse créé avec succès !",
            'data' => $valide
        ], 200);
    }
    //index
    public function index(){
        $view = caisse::with('devise')->get();
        return response()->json([
            'data' => $view
        ], 200);
    }
    //get ID
    public function indexID($id){
        $verify = caisse::whereId(['id' => $id])->first();
        if($verify){
            return response()->json([
                'data' => $verify
             ],200);
        }else{
            return response()->json([
                'message' => "caisse non trouvé !"
            ], 401);
        }  
    }
    //delete
    public function delete($id){
        $verify = caisse::whereId($id)->first();
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
            'nom_culte' => 'required'
        ]);
        $verify = caisse::whereId($id)->first();
        if($verify == true){
             $verify->update([
                'nom_culte' => $request->nom_culte,
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
