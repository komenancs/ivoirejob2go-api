<?php

namespace App\Http\Controllers\Relationship;

use App\Http\Controllers\Controller;
use App\Http\Resources\CandidatCollection;
use App\Http\Resources\CandidatureCollection;
use App\Models\Demande;
use App\Traits\ApiResponser;
use Symfony\Component\HttpFoundation\Response;

class DemandeCandidatController extends Controller
{
    use ApiResponser;
    
    function candidats(int $id)  {
        $demande = Demande::find($id);
        if ($demande) {
            return ( new CandidatCollection($demande->candidats))->additional($this->getResponseTemplate(Response::HTTP_OK));
        }
    }

    function candidatures(int $id) {
        $demande = Demande::find($id);
        if ($demande) {
            return ( new CandidatureCollection($demande->candidatures))->additional($this->getResponseTemplate(Response::HTTP_OK));
        }
    }
}
