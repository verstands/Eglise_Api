<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\displine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Ctrdispline extends Controller
{
    public function create(Request $request){
        $request->validate([
            'Departement' => 'required',
            'obejet' => 'required',
            'piece' => 'required',
            'text' => 'required',
            'membre_id' => 'required',
        ]);
        $valide = displine::create([
            'Departement' => $request->Departement,
            'obejet' => $request->obejet,
            'piece' => $request->piece,
            'text' => $request->text,
            'membre_id' => $request->membre_id
        ]);

        return response()->json([
            'message' => "displine créé avec succès !",
            'data' => $valide
        ], 200);
    }
    //index
    public function index(){
        $view = displine::all();
        return response()->json([
            'message' => 'Les memnres',
            'data' => $view
        ], 200);
    }
    //get ID
    public function indexID($id){
        $verify = displine::whereId(['id' => $id])->first();
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
        $verify = displine::whereId($id)->first();
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
        $verify = displine::whereId($id)->first();
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
