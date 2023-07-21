<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nouveauvenu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Ctrnouveauvenu extends Controller
{
    public function create(Request $request){
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'culte' => 'required',
            'egliseprovenance' => 'required',
            'categorie' => 'required',
        ]);
        $valide = nouveauvenu::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'culte' => $request->culte,
            'categorie' => $request->categorie,
            'egliseprovenance' => $request->egliseprovenance
        ]);

        return response()->json([
            'message' => "nouveauvenu créé avec succès !",
            'data' => $valide
        ], 200);
    }
    //index
    public function index(){
        $view = nouveauvenu::with('culte')->get();
        return response()->json([
            'message' => 'Les memnres',
            'data' => $view
        ], 200);
    }
    //get ID
    public function indexID($id){
        $verify = nouveauvenu::whereId(['id' => $id])->with('culte')->first();
        if($verify){
            return response()->json([
                'data' => $verify
             ],200);
        }else{
            return response()->json([
                'message' => "administrateur non trouvé !"
            ], 401);
        }  
    }
    //delete
    public function delete($id){
        $verify = nouveauvenu::whereId($id)->first();
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
            'Departement' => 'required',
            'obejet' => 'required',
            'piece' => 'required',
            'text' => 'required',
            'membre_id' => 'required'
        ]);
        $verify = nouveauvenu::whereId($id)->first();
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
    public function RapportNouveau($datedebut, $datefin)
    {
        if ($datedebut != 'null' && $datefin != 'null') {
            $view = nouveauvenu::with('culte')
            ->whereBetween('nouveauvenus.created_at', [$datedebut, $datefin])
            ->get();

            return response()->json([
                'data' => $view
            ], 200);
        }else{
            $view = nouveauvenu::with('culte')->get();
            return response()->json([
                'message' => "Les champs sont vide !" 
            ], 422);
        }
    }
}
