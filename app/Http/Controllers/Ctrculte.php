<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\culte;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Ctrculte extends Controller
{
    public function create(Request $request){
        $request->validate([
            'nom_culte' => 'required',
        ]);
        $valide = culte::create([
            'nom_culte' => $request->nom_culte,
        ]);

        return response()->json([
            'message' => "culte créé avec succès !",
            'data' => $valide
        ], 200);
    }
    //index
    public function index(){
        $view = culte::all();
        return response()->json([
            'data' => $view
        ], 200);
    }
    //get ID
    public function indexID($id){
        $verify = culte::whereId(['id' => $id])->first();
        if($verify){
            return response()->json([
                'data' => $verify
             ],200);
        }else{
            return response()->json([
                'message' => "culte non trouvé !"
            ], 401);
        }  
    }
    //delete
    public function delete($id){
        $verify = culte::whereId($id)->first();
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
        $verify = culte::whereId($id)->first();
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
