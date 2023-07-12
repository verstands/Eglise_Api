<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\membre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 

class Ctrmembre extends Controller
{
    //login
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $results = membre::whereEmail($request->email)->wherePassword($request->password)->first();
        if($results == true){
            $token = $results->createToken('auth_token')->plainTextToken;
            return response()->json([
                'data' => $results,
                'token' => $token,
            ], 200);
        }else{
            return response()->json([
                'message' => 'Email ou mot de passe incorrect'
           ], 401);
        }
    }
    //create
    public function create(Request $request){
        $rules = [
            'nom' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'postnom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|string|in:F,H',
            'telephone' => 'required|string|max:50',
            'adresse' => 'required|string|max:255',
            'datenaissance' => 'required|date',
            'etatcivil' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'activite' => 'required|string|max:255',
            'password' => 'required|string|max:255'
        ];

        $validatedData = $request->validate($rules);

        $membre = new membre($validatedData);
        $membre->password = Hash::make($request->password);
        $membre->save();

        return response()->json([
            'message' => "membre créé avec succès !",
            'data' => $membre
        ], 201);
    }
    //index
    public function index(){
        $view = membre::all();
        return response()->json([
            'message' => 'Les memnres',
            'data' => $view
        ], 200);
    }
    //get ID
    public function indexID($id){
        $verify = membre::whereId(['id' => $id])->first();
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
        $verify = membre::whereId($id)->first();
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
            'nom' => 'required',
            'email' => 'required',
            'postnom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
            'datenaissance' => 'required',
            'etatcivil' => 'required',
            'profession' => 'required',
            'activite' => 'required',
            'password' => 'required',
        ]);
        $verify = membre::whereId($id)->first();
        if($verify == true){
             $verify->update([
                'nom' => $request->nom,
                'email' => $request->email,
                'postnom' => $request->postnom,
                'prenom' => $request->prenom,
                'sexe' => $request->sexe,
                'telephone' => $request->telephone,
                'datenaissance' => $request->datenaissance,
                'etatcivil' => $request->etatcivil,
                'profession' => $request->profession,
                'activite' => $request->activite,
                'password' => $request->password,
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
