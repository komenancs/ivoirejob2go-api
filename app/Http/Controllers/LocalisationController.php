<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocalisationRequest;
use App\Models\Localisation;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Resources\LocalisationCollection;
use App\Http\Resources\LocalisationResource;
use Symfony\Component\HttpFoundation\Response;

class LocalisationController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $localisations = Localisation::customPaginate();
        return ( new LocalisationCollection($localisations))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocalisationRequest $request)
    {
        $localisation = Localisation::create($request->validated());
        if ($request->has('demande_ids')){
            $localisation->demandes()->attach($request->demande_ids);
        }
        return (new LocalisationResource($localisation))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Display the specified resource.
     */
    public function show(Localisation $localisation)
    {
        if (!$localisation) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new LocalisationResource($localisation))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(LocalisationRequest $request, Localisation $localisation)
    {
        if (!$localisation) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $localisation->update($request->validated());
        if ($request->has('demande_ids')){
            $localisation->demandes()->attach($request->demande_ids);
        }
        return ( new LocalisationResource($localisation))->additional($this->getResponseTemplate(Response::HTTP_OK, "Modifié"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Localisation $localisation)
    {
        if (!$localisation) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $localisation->delete();
        if ($localisation->trashed()) {
            return $this->getSuccessResponse(null, Response::HTTP_OK, "Suppression effectuée.");
        } else {
            return $this->getErrorResponse(Response::HTTP_NOT_MODIFIED, "Aucun élément supprimé.");
        }
    }
}
