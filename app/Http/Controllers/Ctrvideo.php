<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\video;


class Ctrvideo extends Controller
{
    public function create(Request $request){
        $request->validate([
            'titre' => 'required',
            'lien' => 'required',
        ]);
        $valide = video::create([
            'titre' => $request->titre,
            'lien' => $request->lien
        ]);

        return response()->json([
            'message' => "video ajouter avec succès !",
            'data' => $valide
        ], 200);
    }
    //index
    public function index(){
        $views = video::orderBy('created_at', 'desc')->skip(1)->take(PHP_INT_MAX)->get();
        return response()->json([
            'data' => $views
        ], 200);
    }
    //get ID
    public function indexID($id){
        $verify = video::whereId(['id' => $id])->first();
        if($verify){
            return response()->json([
                'data' => $verify
             ],200);
        }else{
            return response()->json([
                'message' => "video non trouvé !"
            ], 401);
        }  
    }
    //delete
    public function delete($id){
        $verify = video::whereId($id)->first();
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
        $verify = video::whereId($id)->first();
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
    public function seul(){
        $view = video::orderBy('created_at', 'desc')->first();
    return response()->json([
        'data' => $view
    ], 201);
    }
}
