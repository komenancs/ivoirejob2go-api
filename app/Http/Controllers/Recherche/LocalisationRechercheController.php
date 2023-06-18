<?php

namespace App\Http\Controllers\Recherche;

use App\Models\Localisation;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\LocalisationCollection;
use Symfony\Component\HttpFoundation\Response;

class LocalisationRechercheController extends Controller
{
    use ApiResponser;
    function groupByItem(string $group_by)  {
       $model_fillable = app(Localisation::class)->getFillable();
       if (in_array($group_by, $model_fillable)) {
            $localisations = Localisation::groupBy($group_by)
            ->paginate(); # SQL Strict mode set to false to permit it in config/database.php
            //$localisations = Localisation::orderBy($group_by)
            //->paginate();
            //$localisations = DB::table('localisations')->groupBy($group_by)->paginate(); => Syntax error or access violation: 1055 Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column
            return ( new LocalisationCollection($localisations))->additional($this->getResponseTemplate(Response::HTTP_OK));
       }
       return $this->getErrorResponse(Response::HTTP_BAD_REQUEST);
    }

    function searchByCountry(string $pays) {
        $localisations = Localisation::where('pays','LIKE',"%{$pays}%")
        ->paginate();

        return ( new LocalisationCollection($localisations))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }
}
