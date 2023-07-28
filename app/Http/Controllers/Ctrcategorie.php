<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categorie;
use App\Models\categorie_materiel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Ctrcategorie extends Controller
{
    public function create(Request $request){
        $request->validate([
            'nom_categorie' => 'required',
        ]);
        $valide = categorie::create([
            'nom_categorie' => $request->nom_categorie,
        ]);

        return response()->json([
            'message' => "categorie créé avec succès !",
            'data' => $valide
        ], 200);
    }
    //index
    public function index(){
        $view = categorie::all();
        return response()->json([
            'data' => $view
        ], 200);
    }
    //get ID
    public function indexID($id){
        $verify = categorie::whereId(['id' => $id])->first();
        if($verify){
            return response()->json([
                'data' => $verify
             ],200);
        }else{
            return response()->json([
                'message' => "categorie non trouvé !"
            ], 401);
        }  
    }
    //delete
    public function delete($id){
        $verify = categorie::whereId($id)->first();
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
            'nom_categorie' => 'required'
        ]);
        $verify = categorie::whereId($id)->first();
        if($verify == true){
             $verify->update([
                'nom_categorie' => $request->nom_categorie,
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


    // categorie materiel
    public function create_materiel(Request $request){
        $request->validate([
            'nom' => 'required',
        ]);
        $valide = categorie_materiel::create([
            'nom' => $request->nom,
        ]);

        return response()->json([
            'message' => "categorie de membre créé avec succès !",
            'data' => $valide
        ], 200);
    }
    //index
    public function index_materiel(){
        $view = categorie_materiel::all();
        return response()->json([
            'data' => $view
        ], 200);
    }
    //get ID
    public function indexID_materiel($id){
        $verify = categorie_materiel::whereId(['id' => $id])->first();
        if($verify){
            return response()->json([
                'data' => $verify
             ],200);
        }else{
            return response()->json([
                'message' => "categorie non trouvé !"
            ], 401);
        }  
    }
    //delete
    public function delete_materiel($id){
        $verify = categorie_materiel::whereId($id)->first();
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
    public function update_materiel(Request $request, $id){
        $request->validate([
            'nom_categorie' => 'required'
        ]);
        $verify = categorie_materiel::whereId($id)->first();
        if($verify == true){
             $verify->update([
                'nom_categorie' => $request->nom_categorie,
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
