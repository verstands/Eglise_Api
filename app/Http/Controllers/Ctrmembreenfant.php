<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\membreenfant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Ctrmembreenfant extends Controller
{
    public function index(){
        $view = membreenfant::all();
        return response()->json([
            'message' => 'Les memnres',
            'data' => $view
        ], 200);
    }

    public function indexID($id){
        $verify = membreenfant::whereId(['id' => $id])->first();
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
        $verify = membreenfant::whereId($id)->first();
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
}
