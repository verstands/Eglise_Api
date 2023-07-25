<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\materiel;
use App\Models\devise;
use App\Models\departement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Ctrmateriel extends Controller
{
    public function create(Request $request){
        $request->validate([
            'materiel' => 'required',
            'categorie_id' => 'required',
            'stock' => 'required',
            'cout' => 'required',
            'devide_id' => 'required',
            'id_departement' => 'required',
        ]);
        $valide = materiel::create([
            'materiel' => $request->materiel,
            'categorie_id' => $request->categorie_id,
            'stock' => $request->stock,
            'cout' => $request->cout,
            'devide_id' => $request->devide_id,
            'id_departement' => $request->id_departement
        ]);

        return response()->json([
            'message' => "materiel ajouté avec succès !",
            'data' => $valide
        ], 200);
    }
    //index
    public function index(){
        $view = materiel::with('devide_id')->with('id_departement')->with('categorie_id')->get();
        return response()->json([
            'data' => $view
        ], 200);
    }
    //get ID
    public function indexID($id){
        $verify = materiel::whereId(['id' => $id])->first();
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
        $verify = materiel::whereId($id)->first();
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
        $verify = materiel::whereId($id)->first();
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
    public function RapportMateriel($datedebut, $datefin){
        if ($datedebut != 'null' && $datefin != 'null') {
            $view = materiel::with('devide_id')->with('id_departement')->with('categorie_id')
            ->whereBetween('type_depenses.created_at', [$datedebut, $datefin])
            ->get();

            return response()->json([
                'data' => $view
            ], 200);
        }else{
            $view = materiel::with('caisse')->with('depense')->get();
            return response()->json([
                'message' => "Les champs sont vide !" 
            ], 422);
        }
    }
}
