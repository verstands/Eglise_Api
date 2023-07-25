<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\planning;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Ctrplanning extends Controller
{
    public function create(Request $request){
        $request->validate([
            'title' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);
        $valide = planning::create([
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end
        ]);

        return response()->json([
            'message' => "planning créé avec succès !",
            'data' => $valide
        ], 200);
    }
    //index
    public function index(){
        $view = planning::all()->makeHidden(['created_at', 'updated_at']);
        return response()->json([
            'data' => $view
        ], 200);
    }
    //get ID
    public function indexID($id){
        $verify = planning::whereId(['id' => $id])->first();
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
        $verify = planning::whereId($id)->first();
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
        $verify = planning::whereId($id)->first();
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
