<?php

use App\Admin\Controllers\UserController;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('utilisateurs', UserController::class);
    $router->resource('abonnements', AbonnementController::class);
    $router->resource('candidats', CandidatController::class);
    $router->resource('candidatures', CandidatureController::class);
    $router->resource('localisations', LocalisationController::class);
    $router->resource('messages', MessageController::class);
    $router->resource('metiers', MetierController::class);
    $router->resource('notifications', NotificationController::class);
    $router->resource('paiements', PaiementController::class);
    $router->resource('pjs', PjController::class);
    $router->resource('reglages', ReglageController::class);
    $router->resource('roles', RoleController::class);
    $router->resource('secteurs', SecteurController::class);
    $router->resource('type-certificats', TypeCertificatController::class);
    $router->resource('type-contrats', TypeContratController::class);

    $router->resource('certificats', CertificatController::class);
    $router->resource('competences', CompetenceController::class);
    $router->resource('demandes', DemandeController::class);
    $router->resource('employeurs', EmployeurController::class);
    $router->resource('experiences', ExperienceController::class);
    $router->resource('formations', FormationController::class);
});
