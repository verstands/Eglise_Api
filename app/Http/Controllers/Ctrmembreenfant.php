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
}
