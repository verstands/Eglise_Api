<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mouvement;
use App\Models\type_mouvement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Ctrmouvement extends Controller
{
    public function create(Request $request){
        $request->validate([
            'Departement' => 'required',
            'obejet' => 'required',
            'piece' => 'required',
            'text' => 'required',
            'membre_id' => 'required',
        ]);
        $valide = mouvement::create([
            'Departement' => $request->Departement,
            'obejet' => $request->obejet,
            'piece' => $request->piece,
            'text' => $request->text,
            'membre_id' => $request->membre_id
        ]);

        return response()->json([
            'message' => "mouvement créé avec succès !",
            'data' => $valide
        ], 200);
    }
    //index
    public function index(){
        $view = mouvement::with('membre')->with('mission')->get();
        return response()->json([
            'data' => $view
        ], 200);
    }

    public function mm($datedebut, $datefin, $jour){
        $view = mouvement::with('membre')->with('mission')
        ->whereHas('membre', function($query) use ($datedebut, $datefin) {
            $query->whereBetween('created_at', [$datedebut, $datefin]);
        })
        ->get();

        return response()->json([
            'data' => $view
        ], 200);
    }
    //get ID
    public function indexID($id){
        $verify = mouvement::whereId(['id' => $id])->first();
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
        $verify = mouvement::whereId($id)->first();
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
        $verify = mouvement::whereId($id)->first();
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


    //partie de type mouvement
    public function index_type(){
        $view = type_mouvement::all();
        return response()->json([
            'data' => $view
        ], 200);
    }
}
