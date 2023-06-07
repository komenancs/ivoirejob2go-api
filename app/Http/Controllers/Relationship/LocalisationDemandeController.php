<?php

namespace App\Http\Controllers\Relationship;

use App\Http\Controllers\Controller;
use App\Http\Resources\DemandeCollection;
use App\Models\Localisation;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocalisationDemandeController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index(int $id)
    {
        $localisation = Localisation::find($id);
        if (!$localisation){
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new DemandeCollection($localisation->demandes))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, int $id)
    {

        $localisation = Localisation::find($id);
        if(!$localisation){
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        if(!$request->demande_id){
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $localisation->demandes->attach($request->demande_id);
        return (new DemandeCollection($localisation->demandes))->additional($this->getResponseTemplate(Response::HTTP_OK));
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
    public function destroy(int $id, int $dmd_id)
    {
        $localisation = Localisation::find($id);
        if(!$localisation){
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $localisation->demandes->detach($dmd_id);
        return  $this->getSuccessResponse([],Response::HTTP_OK, "Suppression effectuée");
    }
}
