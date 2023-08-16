<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\evenement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Ctrevenement extends Controller
{
    public function create(Request $request){
        $request->validate([
            'titre' => 'required',
            'image' => 'required',
            'date' => 'required',
            'text' => 'required',
        ]);
        $valide = evenement::create([
            'titre' => $request->titre,
            'image' => $request->image,
            'date' => $request->date,
            'text' => $request->text,
        ]);

        return response()->json([
            'message' => "evenement créé avec succès !",
            'data' => $valide
        ], 200);
    }
    //index
    public function index(){
        $view = evenement::orderBy('created_at', 'desc')->skip(1)->take(PHP_INT_MAX)->limit(4)->get();
        return response()->json([
            'data' => $view
        ], 200);
    }
    //get ID
    public function indexID($id){
        $verify = evenement::whereId(['id' => $id])->first();
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
        $verify = evenement::whereId($id)->first();
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
            'titre' => 'required',
            'image' => 'required',
            'date' => 'required',
            'text'
        ]);
        $verify = evenement::whereId($id)->first();
        if($verify == true){
             $verify->update([
                'titre' => $request->titre,
                'image' => $request->image,
                'date' => $request->date,
                'text' => $request->text,
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
    public function seul()
    {
        $view = evenement::orderBy('created_at', 'desc')->first();
        return response()->json([
            'data' => $view
        ], 201);
    }

    public function Tous()
    {
        $view = evenement::all();
        return response()->json([
            'data' => $view
        ], 201);
    }
}
