<?php

namespace App\Http\Controllers;

use App\Http\Requests\SecteurRequest;
use App\Models\Secteur;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Resources\SecteurCollection;
use App\Http\Resources\SecteurResource;
use Symfony\Component\HttpFoundation\Response;

class SecteurController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secteurs = Secteur::customPaginate();
        return ( new SecteurCollection($secteurs))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SecteurRequest $request)
    {
        $secteur = Secteur::create($request->validated());
        if ($request->has('demande_ids')){
            $secteur->demandes()->attach($request->demande_ids);
        }
        if ($request->has('employeur_ids')){
            $secteur->employeurs()->attach($request->employeur_ids);
        }
        return (new SecteurResource($secteur))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Display the specified resource.
     */
    public function show(Secteur $secteur)
    {
        if (!$secteur) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new SecteurResource($secteur))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SecteurRequest $request, Secteur $secteur)
    {
        if (!$secteur) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $secteur->update($request->validated());
        if ($request->has('demande_ids')){
            $secteur->demandes()->attach($request->demande_ids);
        }
        if ($request->has('employeur_ids')){
            $secteur->employeurs()->attach($request->employeur_ids);
        }
        return ( new SecteurResource($secteur))->additional($this->getResponseTemplate(Response::HTTP_OK, "Modifié"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Secteur $secteur)
    {
        if (!$secteur) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $secteur->delete();
        if ($secteur->trashed()) {
            return $this->getSuccessResponse(null, Response::HTTP_OK, "Suppression effectuée.");
        } else {
            return $this->getErrorResponse(Response::HTTP_NOT_MODIFIED, "Aucun élément supprimé.");
        }
    }
}
