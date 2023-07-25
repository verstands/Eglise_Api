<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\communication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Ctrcommunication extends Controller
{
    public function create(Request $request){
        $request->validate([
            'Departement' => 'required',
            'obejet' => 'required',
            'piece' => 'required',
            'text' => 'required',
            'type_message' => 'required'
        ]);
        if($request->type_message == "SMS"){
            $valide = communication::create([
                'departement' => $request->Departement,
                'obejet' => $request->obejet,
                'piece' => $request->piece,
                'text' => $request->text,
                'type_message' => $request->type_message,
                'membre_id' => Auth::user()->id
            ]);
            return response()->json([
                'message' => "sms envoyé avec succès !",
                'data' => $valide
            ], 200);
        }elseif($request->type_message == "EMAIL"){
            $valide = communication::create([
                'departement' => $request->departement,
                'obejet' => $request->obejet,
                'piece' => $request->piece,
                'text' => $request->text,
                'type_message' => $request->type_message,
                'membre_id' => Auth::user()->id
            ]);
            return response()->json([
                'message' => "email envoyé avec succès !",
                'data' => $valide
            ], 200);
        }
    }
    //index
    public function index(){
        $view = communication::with('membre_id')->with('departement')->get();
        return response()->json([
            'data' => $view
        ], 200);
    }
    //get ID
    public function indexID($id){
        $verify = communication::whereId(['id' => $id])->first();
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
        $verify = communication::whereId($id)->first();
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
        $verify = communication::whereId($id)->first();
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
