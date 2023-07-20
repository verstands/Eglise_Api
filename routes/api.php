<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ctrcommunication;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Ctrmembre;
use App\Http\Controllers\Ctrmenu;
use App\Http\Controllers\Ctrsous_menu;
use App\Http\Controllers\Ctrdepartement;
use App\Http\Controllers\Ctrdepense;
use App\Http\Controllers\Ctrdevise;
use App\Http\Controllers\Ctrdispline;
use App\Http\Controllers\Ctrfinance;
use App\Http\Controllers\Ctrmateriel;
use App\Http\Controllers\Ctrmembreenfant;
use App\Http\Controllers\Ctrmission;
use App\Http\Controllers\Ctrmouvement;
use App\Http\Controllers\Ctrnouveauvenu;
use App\Http\Controllers\Ctrpaie;
use App\Http\Controllers\Ctrplanning;
use App\Http\Controllers\Ctrsousmenu;
use App\Http\Controllers\Ctrstatistique;
use App\Http\Controllers\Ctraffectation;
use App\Http\Controllers\Ctrcategorie;
use App\Http\Controllers\Ctrculte;
use App\Http\Controllers\Ctrtypeoffrande;
use App\Http\Controllers\Ctrcaisse;
use App\Http\Controllers\Ctrtype_depense;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [Ctrmembre::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function(){
    //membre
    Route::post('/membre', [Ctrmembre::class, 'create']);
    Route::get('/membres', [Ctrmembre::class, 'index']);
    Route::get('/membre/{id}', [Ctrmembre::class, 'indexID']);
    Route::delete('/membre/{id}', [Ctrmembre::class, 'delete']);
    Route::put('/membre/{id}', [Ctrmembre::class, 'update']);
    //communication
    Route::post('/communication', [Ctrcommunication::class, 'create']);
    Route::get('/communications', [Ctrcommunication::class, 'index']);
    Route::get('/communication/{id}', [Ctrcommunication::class, 'indexID']);
    Route::delete('/communication/{id}', [Ctrcommunication::class, 'delete']);
    Route::put('/communication/{id}', [Ctrcommunication::class, 'update']);
    //depense
    Route::post('/depense', [Ctrdepense::class, 'create']);
    Route::get('/depenses', [Ctrdepense::class, 'index']);
    Route::get('/depense/{id}', [Ctrdepense::class, 'indexID']);
    Route::delete('/depense/{id}', [Ctrdepense::class, 'delete']);
    Route::put('/depense/{id}', [Ctrdepense::class, 'update']);
    //devise
    Route::post('/devise', [Ctrdevise::class, 'create']);
    Route::get('/devises', [Ctrdevise::class, 'index']);
    Route::get('/devise/{id}', [Ctrdevise::class, 'indexID']);
    Route::delete('/devise/{id}', [Ctrdevise::class, 'indexID']);
    Route::put('/devise/{id}', [Ctrdevise::class, 'update']);
    //displine
    Route::post('/displine', [Ctrdispline::class, 'create']);
    Route::get('/displines', [Ctrdispline::class, 'index']);
    Route::get('/displine/{id}', [Ctrdispline::class, 'indexID']);
    Route::delete('/displine/{id}', [Ctrdispline::class, 'indexID']);
    Route::put('/displine/{id}', [Ctrdispline::class, 'update']);
    //finance
    Route::post('/finance', [Ctrfinance::class, 'create']);
    Route::get('/finances', [Ctrfinance::class, 'index']);
    Route::get('/finance/{id}', [Ctrfinance::class, 'indexID']);
    Route::delete('/finance/{id}', [Ctrfinance::class, 'delete']);
    Route::put('/finance/{id}', [Ctrfinance::class, 'update']);
    //materiel
    Route::post('/materiel', [Ctrmateriel::class, 'create']);
    Route::get('/materiels', [Ctrmateriel::class, 'index']);
    Route::get('/materiel/{id}', [Ctrmateriel::class, 'indexID']);
    Route::delete('/materiel/{id}', [Ctrmateriel::class, 'delete']);
    Route::put('/materiel/{id}', [Ctrmateriel::class, 'update']);
    //membreenfant
    Route::post('/membreenfant', [Ctrmembreenfant::class, 'create']);
    Route::get('/membreenfants', [Ctrmembreenfant::class, 'index']);
    Route::get('/membreenfant/{id}', [Ctrmembreenfant::class, 'indexID']);
    Route::delete('/membreenfant/{id}', [Ctrmembreenfant::class, 'delete']);
    Route::put('/membreenfant/{id}', [Ctrmembreenfant::class, 'update']);
    //menu
    Route::post('/menu', [Ctrmenu::class, 'create']);
    Route::get('/menus', [Ctrmenu::class, 'index']);
    Route::get('/menu/{id}', [Ctrmenu::class, 'indexID']);
    Route::delete('/menu/{id}', [Ctrmenu::class, 'indexID']);
    Route::put('/menu/{id}', [Ctrmenu::class, 'update']);
    //mission
    Route::post('/mission', [Ctrmission::class, 'create']);
    Route::get('/missions', [Ctrmission::class, 'index']);
    Route::get('/mission/{id}', [Ctrmission::class, 'indexID']);
    Route::delete('/mission/{id}', [Ctrmission::class, 'indexID']);
    Route::put('/mission/{id}', [Ctrmission::class, 'update']);
    //mouvement
    Route::post('/mouvement', [Ctrmouvement::class, 'create']);
    Route::get('/mouvements', [Ctrmouvement::class, 'index']);
    Route::get('/mouvement/{id}', [Ctrmouvement::class, 'indexID']);
    Route::delete('/mouvement/{id}', [Ctrmouvement::class, 'delete']);
    Route::put('/mouvement/{id}', [Ctrmouvement::class, 'update']);
    //nouveauvenu
    Route::post('/nouveauvenu', [Ctrnouveauvenu::class, 'create']);
    Route::get('/nouveauvenus', [Ctrnouveauvenu::class, 'index']);
    Route::get('/nouveauvenu/{id}', [Ctrnouveauvenu::class, 'indexID']);
    Route::delete('/nouveauvenu/{id}', [Ctrnouveauvenu::class, 'delete']);
    Route::put('/nouveauvenu/{id}', [Ctrnouveauvenu::class, 'update']);
    //paie
    Route::post('/paie', [Ctrpaie::class, 'create']);
    Route::get('/paies', [Ctrpaie::class, 'index']);
    Route::get('/paie/{id}', [Ctrpaie::class, 'indexID']);
    Route::delete('/paie/{id}', [Ctrpaie::class, 'indexID']);
    Route::put('/paie/{id}', [Ctrpaie::class, 'update']);
    //planning
    Route::post('/planning', [Ctrplanning::class, 'create']);
    Route::get('/plannings', [Ctrplanning::class, 'index']);
    Route::get('/planning/{id}', [Ctrplanning::class, 'indexID']);
    Route::delete('/planning/{id}', [Ctrplanning::class, 'indexID']);
    Route::put('/planning/{id}', [Ctrplanning::class, 'update']);
    //sousmenu
    Route::post('/sousmenu', [Ctrsousmenu::class, 'create']);
    Route::get('/sousmenus', [Ctrsousmenu::class, 'index']);
    Route::get('/sousmenu/{id}', [Ctrsousmenu::class, 'indexID']);
    Route::delete('/sousmenu/{id}', [Ctrsousmenu::class, 'indexID']);
    Route::put('/sousmenu/{id}', [Ctrsousmenu::class, 'update']);
    //statistique
    Route::post('/statistique', [Ctrstatistique::class, 'create']);
    Route::get('/statistiques', [Ctrstatistique::class, 'index']);
    Route::get('/statistique/{id}', [Ctrstatistique::class, 'indexID']);
    Route::delete('/statistique/{id}', [Ctrstatistique::class, 'indexID']);
    Route::put('/statistique/{id}', [Ctrstatistique::class, 'update']);
    //departement Ctrdepartement 
    Route::post('/departement', [Ctrdepartement::class, 'create']);
    Route::get('/departements', [Ctrdepartement::class, 'index']);
    Route::get('/departementActivite/{departement}', [Ctrdepartement::class, 'da']);
    Route::get('/departement/{id}', [Ctrdepartement::class, 'indexID']);
    Route::delete('/departement/{id}', [Ctrdepartement::class, 'indexID']);
    Route::put('/departement/{id}', [Ctrdepartement::class, 'update']);
    //Ctraffectation
    Route::post('/affectation', [Ctraffectation::class, 'create']);
    Route::get('/affectations', [Ctraffectation::class, 'index']);
    Route::get('/affectation/{id}', [Ctraffectation::class, 'indexID']);
    Route::delete('/affectation/{id}', [Ctraffectation::class, 'delete']);
    Route::put('/affectation/{id}', [Ctraffectation::class, 'update']);
    //culte
    Route::post('/culte', [Ctrculte::class, 'create']);
    Route::get('/cultes', [Ctrculte::class, 'index']);
    Route::get('/culte/{id}', [Ctrculte::class, 'indexID']);
    Route::delete('/culte/{id}', [Ctrculte::class, 'delete']);
    Route::put('/culte/{id}', [Ctrculte::class, 'update']);
    //categorie
    Route::post('/categorie', [Ctrcategorie::class, 'create']);
    Route::get('/categories', [Ctrcategorie::class, 'index']);
    Route::get('/categorie/{id}', [Ctrcategorie::class, 'indexID']);
    Route::delete('/categorie/{id}', [Ctrcategorie::class, 'indexID']);
    Route::put('/categorie/{id}', [Ctrcategorie::class, 'update']);
    //type_offrande
    Route::post('/typeoffrande', [Ctrtypeoffrande::class, 'create']);
    Route::get('/typeoffrandes', [Ctrtypeoffrande::class, 'index']);
    Route::get('/typeoffrande/{id}', [Ctrtypeoffrande::class, 'indexID']);
    Route::delete('/typeoffrande/{id}', [Ctrtypeoffrande::class, 'indexID']);
    Route::put('/typeoffrande/{id}', [Ctrtypeoffrande::class, 'update']);
    //caisse
    Route::post('/caisse', [Ctrcaisse::class, 'create']);
    Route::get('/caisses', [Ctrcaisse::class, 'index']);
    Route::get('/caisse/{id}', [Ctrcaisse::class, 'indexID']);
    Route::delete('/caisse/{id}', [Ctrcaisse::class, 'indexID']);
    Route::put('/caisse/{id}', [Ctrcaisse::class, 'update']);
    //Ctrtype_depense
    Route::post('/type_depense', [Ctrtype_depense::class, 'create']);
    Route::get('/type_depenses', [Ctrtype_depense::class, 'index']);
    Route::get('/type_depense/{id}', [Ctrtype_depense::class, 'indexID']);
    Route::delete('/type_depense/{id}', [Ctrtype_depense::class, 'indexID']);
    Route::put('/type_depense/{id}', [Ctrtype_depense::class, 'update']);
});

