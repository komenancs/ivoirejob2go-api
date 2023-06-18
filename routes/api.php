<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PjController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MetierController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReglageController;
use App\Http\Controllers\SecteurController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\EmployeurController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\CertificatController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\TypeContratController;
use App\Http\Controllers\LocalisationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Recherche\AbonnementRechercheController;
use App\Http\Controllers\TypeCertificatController;
use App\Http\Controllers\Relationship\UserSentController;
use App\Http\Controllers\Relationship\MessagePjController;
use App\Http\Controllers\Relationship\UserInboxController;
use App\Http\Controllers\Relationship\UserPaiementController;
use App\Http\Controllers\Recherche\DemandeRechercheController;
use App\Http\Controllers\Relationship\DemandeMetierController;
use App\Http\Controllers\Recherche\CandidatRechercheController;
use App\Http\Controllers\Relationship\CandidatMetierController;
use App\Http\Controllers\Relationship\DemandeSecteurController;
use App\Http\Controllers\Recherche\EmployeurRechercheController;
use App\Http\Controllers\Recherche\LocalisationRechercheController;
use App\Http\Controllers\Relationship\CandidatDemandeController;
use App\Http\Controllers\Relationship\EmployeurSecteurController;
use App\Http\Controllers\Relationship\LocalisationUserController;
use App\Http\Controllers\Relationship\UserNotificationController;
use App\Http\Controllers\Relationship\CandidatFormationController;
use App\Http\Controllers\Relationship\DemandeCompetenceController;
use App\Http\Controllers\Relationship\AbonnementCandidatController;
use App\Http\Controllers\Relationship\CandidatCertificatController;
use App\Http\Controllers\Relationship\CandidatCompetenceController;
use App\Http\Controllers\Relationship\CompetenceCandidatController;
use App\Http\Controllers\Relationship\TypeContratDemandeController;
use App\Http\Controllers\Relationship\AbonnementEmployeurController;
use App\Http\Controllers\Relationship\CandidatCandidatureController;
use App\Http\Controllers\Relationship\DemandeCandidatController;
use App\Http\Controllers\Relationship\DemandeLocalisationController;
use App\Http\Controllers\Relationship\LocalisationDemandeController;
use App\Http\Controllers\Relationship\LocalisationEmployeurController;
use App\Http\Controllers\Relationship\UserCandidatEmployeurController;
use App\Http\Controllers\Relationship\TypeCertificatCertificatController;

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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

Route::prefix('v1.0.1')->middleware(['throttle:60,1', 'api'])->group(function () {
    //Route for model relationship
    //Abonnement
    Route::get('abonnements/{id}/candidats', [AbonnementCandidatController::class, 'index']);
    Route::get('abonnements/{id}/employeurs', [AbonnementEmployeurController::class, 'index']);

    //Candidat
    Route::get('candidats/{id}/candidatures', [CandidatCandidatureController::class, 'index']);
    Route::post('candidats/{id}/candidatures/', [CandidatCandidatureController::class, 'store']);
    Route::delete('candidats/{id}/candidatures/{cdt_id}', [CandidatCandidatureController::class, 'destroy']);

    Route::get('candidats/{id}/certificats', [CandidatCertificatController::class, 'index']);
    Route::post('candidats/{id}/certificats', [CandidatCertificatController::class, 'store']);
    Route::delete('candidats/{id}/certificats/{crt_id}', [CandidatCertificatController::class, 'destroy']);

    Route::get('candidats/{id}/competences', [CandidatCompetenceController::class, 'index']);
    Route::post('candidats/{id}/competences', [CandidatCompetenceController::class, 'store']);
    Route::delete('candidats/{id}/competences/{cmp_id}', [CandidatCompetenceController::class, 'destroy']);

    Route::get('candidats/{id}/demandes', [CandidatDemandeController::class, 'index']);

    Route::get('candidats/{id}/formations', [CandidatFormationController::class, 'index']);

    Route::get('candidats/{id}/metiers', [CandidatMetierController::class, 'index']);
    Route::post('candidats/{id}/metiers', [CandidatMetierController::class, 'store']);
    Route::delete('candidats/{id}/metiers/{mt_id}', [CandidatMetierController::class, 'destroy']);

    //Competence
    Route::get('competences/{id}/candidats', [CompetenceCandidatController::class, 'index']);

    //Demande
    Route::get("demandes/{id}/metiers", [DemandeMetierController::class, 'index']);
    Route::post("demandes/{id}/metiers", [DemandeMetierController::class, 'store']);
    Route::delete("demandes/{id}/metiers/{mt_id}", [DemandeMetierController::class, 'destroy']);

    Route::get("demandes/{id}/secteurs", [DemandeSecteurController::class, 'index']);
    Route::post("demandes/{id}/secteurs", [DemandeSecteurController::class, 'store']);
    Route::delete("demandes/{id}/secteurs/{sct_id}", [DemandeSecteurController::class, 'destroy']);

    Route::get("demandes/{id}/localisations", [DemandeLocalisationController::class, 'index']);
    Route::post("demandes/{id}/localisations", [DemandeLocalisationController::class, 'store']);
    Route::delete("demandes/{id}/localisations/{lcl_id}", [DemandeLocalisationController::class, 'destroy']);

    Route::get("demandes/{id}/competences", [DemandeCompetenceController::class, 'index']);
    Route::post("demandes/{id}/competences", [DemandeCompetenceController::class, 'store']);
    Route::delete("demandes/{id}/competences/{cpt_id}", [DemandeCompetenceController::class, 'destroy']);

    Route::get("demandes/{id}/candidatures", [DemandeCandidatController::class, 'candidatures']);
    Route::get("demandes/{id}/candidats", [DemandeCandidatController::class, 'candidats']);

    //Employeur
    Route::get("employeurs/{id}/secteurs", [EmployeurSecteurController::class, 'index']);
    Route::post("employeurs/{id}/secteurs", [EmployeurSecteurController::class, 'store']);
    Route::delete("employeurs/{id}/secteurs/{sct_id}", [EmployeurSecteurController::class, 'destroy']);


    //Localisation
    Route::get("localisations/{id}/demandes", [LocalisationDemandeController::class, 'index']);
    Route::post("localisations/{id}/demandes", [LocalisationDemandeController::class, 'store']);
    Route::delete("localisations/{id}/demandes/dmd_id}", [LocalisationDemandeController::class, 'destroy']);

    Route::get("localisations/{id}/employeurs", [LocalisationEmployeurController::class, 'index']);

    Route::get("localisations/{id}/users", [LocalisationUserController::class, 'index']);
    //Pj
    Route::get("messages/{id}/pjs", [MessagePjController::class, 'index']);

    //TypeCertificats
    Route::get('type-certificats/{id}/certificats', [TypeCertificatCertificatController::class, 'index']);

    //TypeContrat
    Route::get('type-contrats/{id}/demandes', [TypeContratDemandeController::class, 'index']);

    //User
    Route::get('users/{id}/notifications', [UserNotificationController::class, 'index']);

    Route::get('users/{id}/paiements', [UserPaiementController::class, 'index']);

    Route::get('users/{id}/inbox', [UserInboxController::class, 'index']);

    Route::get('users/{id}/sent', [UserSentController::class, 'index']);

    Route::get('users/{id}/candidats', [UserCandidatEmployeurController::class, 'candidat']);

    Route::get('users/{id}/employeurs', [UserCandidatEmployeurController::class, 'employeur']);

    // ApiRessource for model
    Route::apiResource('abonnements', AbonnementController::class);
    Route::apiResource('candidats', CandidatController::class);
    Route::apiResource('candidatures', CandidatureController::class);
    Route::apiResource('certificats', CertificatController::class);
    Route::apiResource('competences', CompetenceController::class);
    Route::apiResource('demandes', DemandeController::class);
    Route::apiResource('employeurs', EmployeurController::class);
    Route::apiResource('experiences', ExperienceController::class);
    Route::apiResource('formations', FormationController::class);
    Route::apiResource('localisations', LocalisationController::class);
    Route::apiResource('messages', MessageController::class);
    Route::apiResource('metiers', MetierController::class);
    Route::apiResource('notifications', NotificationController::class);
    Route::apiResource('paiements', PaiementController::class);
    Route::apiResource('pjs', PjController::class);
    Route::apiResource('reglages', ReglageController::class);
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('secteurs', SecteurController::class);
    Route::apiResource('type-certificats', TypeCertificatController::class);
    Route::apiResource('type-contrats', TypeContratController::class);
    Route::apiResource('users', UserController::class);

    //Search system
    Route::prefix("recherche")->group(function () {

        //Demande
        Route::get("demandes/{search}", [DemandeRechercheController::class, 'rechercheParTitreEtParDescription']);
        Route::get("demandes/secteurs/{search}", [DemandeRechercheController::class, 'rechercheParNomSecteur']);
        Route::get("demandes/metiers/{search}", [DemandeRechercheController::class, 'rechercheParNomMetiers']);
        Route::get("demandes/competences/{search}", [DemandeRechercheController::class, 'rechercheParNomCompetences']);
        Route::get("demandes/localisations/{search}", [DemandeRechercheController::class, 'rechercheParLocalisations']);
        Route::get("demandes/type-contrats/{search}", [DemandeRechercheController::class, 'rechercheParNomTypeContrats']);
        Route::get(
            "demandes/global/{search}/localisation/{location?}",
            [DemandeRechercheController::class, 'globalSearch']
        );

        //Candidat
        Route::get("candidats/{search}", [CandidatRechercheController::class, 'rechercheParPresentation']);
        Route::get("candidats/secteurs/{search}", [CandidatRechercheController::class, 'rechercheParNomSecteur']);
        Route::get("candidats/metiers/{search}", [CandidatRechercheController::class, 'rechercheParNomMetiers']);
        Route::get("candidats/competences/{search}", [CandidatRechercheController::class, 'rechercheParNomCompetences']);
        Route::get("candidats/localisations/{search}", [CandidatRechercheController::class, 'rechercheParLocalisations']);
        Route::get("candidats/certificats/{search}", [CandidatRechercheController::class, 'rechercheParCertificat']);
        Route::get(
            "candidats/global/{search}/localisation/{location?}",
            [CandidatRechercheController::class, 'globalSearch']
        );

        //Employeurs
        Route::get("employeurs/{search}", [EmployeurRechercheController::class, 'rechercheParNomEmail']);
        Route::get("employeurs/secteurs/{search}", [EmployeurRechercheController::class, 'rechercheParNomSecteur']);
        Route::get("employeurs/metiers/{search}", [EmployeurRechercheController::class, 'rechercheParNomMetiers']);
        Route::get("employeurs/competences/{search}", [EmployeurRechercheController::class, 'rechercheParNomCompetences']);
        Route::get("employeurs/localisations/{search}", [EmployeurRechercheController::class, 'rechercheParLocalisations']);
        Route::get(
            "employeurs/global/{search}/localisation/{location?}",
            [EmployeurRechercheController::class, 'globalSearch']
        );

        //Localisation
        Route::get("localisations/all/{group_by?}", [LocalisationRechercheController::class, 'groupByItem']);
        Route::get("localisations/{pays}", [LocalisationRechercheController::class, 'searchByCountry']);

        //Abonnements
        Route::get("abonnements/all/{group_by?}", [AbonnementRechercheController::class,'groupByItem']);
        Route::get("abonnements/{type}", [AbonnementRechercheController::class, 'searchByType']);
    });
});
