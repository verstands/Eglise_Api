<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\depense;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Ctrdepense extends Controller
{
    public function create(Request $request){
        $request->validate([
            'depense' => 'required',
        ]);
        $valide = depense::create([
            'depense' => $request->depense,
        ]);

        return response()->json([
            'message' => "depense créé avec succès !",
            'data' => $valide
        ], 200);
    }
    //index
    public function index(){
        $view = depense::all();
        return response()->json([
            'data' => $view
        ], 200);
    }
    //get ID
    public function indexID($id){
        $verify = depense::whereId(['id' => $id])->first();
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
        $verify = depense::whereId($id)->first();
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
            'depense' => 'required',
        ]);
        $verify = depense::whereId($id)->first();
        if($verify == true){
             $verify->update([
                'depense' => $request->depense,
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
