<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\affectation;
use App\Models\membre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Ctraffectation extends Controller
{
    public function create(Request $request){
        $request->validate([
            'nom_membre' => 'required',
            'departement_id' => 'required',
            'state' => 'required',
        ]);
        $valide = affectation::create([
            'nom_membre' => $request->nom_membre,
            'departement_id' => $request->departement_id,
            'state' => $request->state,
        ]);

        return response()->json([
            'message' => "affectation créé avec succès !",
            'data' => $valide
        ], 200);
    }
    //index
    public function index(){
        $view = affectation::with('nom_membre')->with('departement_id')->get();
        return response()->json([
            'data' => $view
        ], 200);
    }
    /* 
        public function index()
{
    $affectations = affectation::with(['membre' => function($query) {
        $query->whereDate('datenaissance', '=', Carbon::today()->format('Y-m-d'));
    }])->get();

    return response()->json([
        'data' => $affectations
    ], 200);
}

    */
    //get ID
    public function indexID($id){
        $verify = affectation::whereId(['id' => $id])->first();
        if($verify){
            return response()->json([
                'data' => $verify
             ],200);
        }else{
            return response()->json([
                'message' => "affectation non trouvé !"
            ], 401);
        }  
    }
    //delete
    public function delete($id){
        $verify = affectation::whereId($id)->first();
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
            'affectation' => 'required',
            'obejet' => 'required',
            'piece' => 'required',
            'text' => 'required',
            'membre_id' => 'required'
        ]);
        $verify = affectation::whereId($id)->first();
        if($verify == true){
             $verify->update([
                'affectation' => $request->affectation,
                'obejet' => $request->obejet,
                'piece' => $request->piece,
                'text' => $request->text,
                'membre_id' => $request->membre_id
             ]);
             return response()->json([
                 'message' => 'La ùodification a été fait avec succes ! ',
             ], 200);
         }else{
             return response()->json([
                 'message' => ' identifiant non trouvé ! '
             ], 401);
         }
    }
}
