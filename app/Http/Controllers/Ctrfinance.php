<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\finance;
use App\Models\devise;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Ctrfinance extends Controller
{
    public function create(Request $request){
        $request->validate([
            'nfiche' => 'required',
            'culte_id' => 'required',
            'typeoffrance' => 'required',
            'devise_id' => 'required',
            'homme' => 'required',
            'femme' => 'required',
            'enfant' => 'required',
            'montant' => 'required',
        ]);
        $valide = finance::create([
            'nfiche' => $request->nfiche,
            'culte_id' => $request->culte_id,
            'typeoffrande_id' => $request->typeoffrance,
            'devise_id' => $request->devise_id,
            'homme' => $request->homme,
            'femme' => $request->femme,
            'enfant' => $request->enfant,
            'montant' => $request->montant
        ]);

        return response()->json([
            'message' => "finance créé avec succès !",
            'data' => $valide
        ], 200);
    }
    //index
    public function index(){
        $view = finance::with('devise')
            ->with('typeoffrande')
            ->with('culte')
            ->get();
        return response()->json([
            'data' => $view
        ], 200);
    }
    //get ID
    public function indexID($id){
        $verify = finance::whereId(['id' => $id])->first();
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
        $verify = finance::whereId($id)->first();
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
        $verify = finance::whereId($id)->first();
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
