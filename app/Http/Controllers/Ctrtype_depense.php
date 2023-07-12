<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\type_depense;
use App\Models\depense;
use App\Models\devise;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Ctrtype_depense extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'pournous' => 'required',
            'ciasse_id' => 'required',
            'depense_id' => 'required',
            'montant' => 'required',
            'devise_id' => 'required',
            'beneficiaire' => 'required',
        ]);
        $valide = type_depense::create([
            'pournous' => $request->pournous,
            'ciasse_id' => $request->ciasse_id,
            'depense_id' => $request->depense_id,
            'montant' => $request->montant,
            'devise_id' => $request->devise_id,
            'beneficiaire' => $request->beneficiaire,
        ]);

        return response()->json([
            'message' => "Depense effectué avec succès !",
            'data' => $valide
        ], 200);
    }
    //index
    public function index()
    {
        $view = type_depense::with('devise')
        ->with('caisse')
        ->with('depense')
        ->get();
        return response()->json([
            'data' => $view
        ], 200);
    }
    //get ID
    public function indexID($id)
    {
        $verify = type_depense::whereId(['id' => $id])->first();
        if ($verify) {
            return response()->json([
                'data' => $verify
            ], 200);
        } else {
            return response()->json([
                'message' => "type_depense non trouvé !"
            ], 401);
        }
    }
    //delete
    public function delete($id)
    {
        $verify = type_depense::whereId($id)->first();
        if ($verify == true) {
            $verify->delete();
            return response()->json([
                'message' => 'La suppression a été fait avec succes ! ',
            ], 200);
        } else {
            return response()->json([
                'message' => ' identifiant non trouvé ! '
            ], 401);
        }
    }
    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'pournous' => 'required',
            'ciasse_id' => 'required',
            'depense_id' => 'required',
            'montant' => 'required',
            'devise_id' => 'required',
            'beneficiaire' => 'required',
        ]);
        $verify = type_depense::whereId($id)->first();
        if ($verify == true) {
            $verify->update([
                'pournous' => $request->pournous,
                'ciasse_id' => $request->ciasse_id,
                'depense_id' => $request->depense_id,
                'montant' => $request->montant,
                'devise_id' => $request->devise_id,
                'beneficiaire' => $request->beneficiaire,
            ]);
            return response()->json([
                'message' => 'La modification a été fait avec succes ! ',
            ], 200);
        } else {
            return response()->json([
                'message' => ' identifiant non trouvé ! '
            ], 401);
        }
    }
}
