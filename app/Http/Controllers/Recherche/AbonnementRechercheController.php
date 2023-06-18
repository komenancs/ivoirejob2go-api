<?php

namespace App\Http\Controllers\Recherche;

use App\Models\Abonnement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AbonnementCollection;
use Symfony\Component\HttpFoundation\Response;

class AbonnementRechercheController extends Controller
{
    function searchByType(string $type) {
        
        return ( new AbonnementCollection(Abonnement::where('type','LIKE',"%{$type}%")
        ->paginate()))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    function groupByItem(string $group_by)  {
        $model_fillable = app(Abonnement::class)->getFillable();
       if (in_array($group_by, $model_fillable)) {
            $abonnements = Abonnement::groupBy($group_by)
            ->paginate(); # SQL Strict mode set to false to permit it in config/database.php
            return ( new AbonnementCollection($abonnements))->additional($this->getResponseTemplate(Response::HTTP_OK));
       }
       return $this->getErrorResponse(Response::HTTP_BAD_REQUEST);
    }
}
