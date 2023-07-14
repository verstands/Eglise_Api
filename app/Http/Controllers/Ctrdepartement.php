<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\departement;
use App\Models\activite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Ctrdepartement extends Controller
{
    public function create(Request $request){
        $request->validate([
            'nom_depart' => 'required',
        ]);
        $valide = departement::create([
            'nom_depart' => $request->nom_depart,
        ]);

        return response()->json([
            'message' => "departement créé avec succès !",
            'data' => $valide
        ], 200);
    }
    //index
    public function index(){
        $view = departement::all();
        return response()->json([
            'data' => $view
        ], 200);
    }
    //get ID
    public function indexID($id){
        $verify = departement::whereId(['id' => $id])->first();
        if($verify){
            return response()->json([
                'data' => $verify
             ],200);
        }else{
            return response()->json([
                'message' => "Departement non trouvé !"
            ], 401);
        }  
    }
    //delete
    public function delete($id){
        $verify = departement::whereId($id)->first();
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

    public function da($departement){
        $verify = activite::where('departement_id', $departement)
        ->with('departement')
        ->get();
        return response()->json([
            'data' =>  $verify
        ], 200);
    }
    //update
    public function update(Request $request, $id){
        $request->validate([
            'Departement' => 'required',
            'obejet' => 'required',
            'piece' => 'required',
            'text' => 'required',
            'membre_id' => 'required'
        ]);
        $verify = departement::whereId($id)->first();
        if($verify == true){
             $verify->update([
                'Departement' => $request->Departement,
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
