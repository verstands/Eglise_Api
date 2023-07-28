<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\membre;
use App\Models\nouveauvenu;
use App\Models\materiel;


class Ctrstatistique extends Controller
{
    public function staMembre()
    {
        $year = date('Y');
        $view = membre::selectRaw('YEAR(created_at) as year, DATE_FORMAT(created_at, "%M") as month, COUNT(*) as total')
            ->whereYear('created_at', '=', $year)
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get(['year', 'month', 'total']);
        $months = [
            'January'   => 'Janvier',
            'February'  => 'Février',
            'March'     => 'Mars',
            'April'     => 'Avril',
            'May'       => 'Mai',
            'June'      => 'Juin',
            'July'      => 'Juillet',
            'August'    => 'Août',
            'September' => 'Septembre',
            'October'   => 'Octobre',
            'November'  => 'Novembre',
            'December'  => 'Décembre'
        ];

        // Remplacer les noms des mois en anglais par leur equivalent en francais
        foreach ($view as $item) {
            $item->month = $months[$item->month];
        }

        $count = membre::selectRaw('COUNT(*) as total')
        ->whereYear('created_at', '=', $year)
        ->first();

        $nouveau = nouveauvenu::selectRaw('COUNT(*) as total')
        ->first();

        $materiel = membre::selectRaw('COUNT(*) as total')
        ->first();

        return response()->json([
            'message' => 'Les membres',
            'data' => $view,
            'countMembre' => $count,
            'materiel' => $materiel,
            'nouveau' => $nouveau
        ], 200);
    }
}
