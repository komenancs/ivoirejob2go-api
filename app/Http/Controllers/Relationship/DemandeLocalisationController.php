<?php

namespace App\Http\Controllers\Relationship;

use App\Http\Controllers\Controller;
use App\Http\Resources\LocalisationCollection;
use App\Http\Resources\SecteurCollection;
use App\Models\Demande;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DemandeLocalisationController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index(int $id)
    {
        $demande = Demande::find($id);
        if (!$demande){
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new LocalisationCollection($demande->localisations))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, int $id)
    {

        $demande = Demande::find($id);
        if(!$demande){
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        if(!$request->localisation_id){
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $demande->localisations->attach($request->localisation_id);
        return (new SecteurCollection($demande->localisations))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id, int $lcl_id)
    {
        $demande = Demande::find($id);
        if(!$demande){
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $demande->localisations->detach($lcl_id);
        return  $this->getSuccessResponse([],Response::HTTP_OK, "Suppression effectuée");
    }
}
