<?php

namespace App\Http\Controllers;

use App\Http\Requests\DemandeRequest;
use App\Models\Demande;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Resources\DemandeCollection;
use App\Http\Resources\DemandeResource;
use Symfony\Component\HttpFoundation\Response;

class DemandeController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demandes = Demande::paginate();
        return ( new DemandeCollection($demandes))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DemandeRequest $request)
    {
        $demande = Demande::create($request->validated());

        if ($request->has('metier_ids')){
            $demande->metiers()->attach($request->metier_ids);
        }
        if ($request->has('secteur_ids')){
            $demande->secteurs()->attach($request->secteur_ids);
        }
        if ($request->has('localisation_ids')){
            $demande->localisations()->attach($request->localisation_ids);
        }
        if ($request->has('competence_ids')){
            $demande->competences()->attach($request->competence_ids);
        }
        return (new DemandeResource($demande))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Display the specified resource.
     */
    public function show(Demande $demande)
    {
        if (!$demande) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new DemandeResource($demande))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DemandeRequest $request, Demande $demande)
    {
        if (!$demande) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $demande->update($request->validated());

        if ($request->has('metier_ids')){
            $demande->metiers()->attach($request->metier_ids);
        }
        if ($request->has('secteur_ids')){
            $demande->secteurs()->attach($request->secteur_ids);
        }
        if ($request->has('localisation_ids')){
            $demande->localisations()->attach($request->localisation_ids);
        }
        if ($request->has('competence_ids')){
            $demande->competences()->attach($request->competence_ids);
        }
        return ( new DemandeResource($demande))->additional($this->getResponseTemplate(Response::HTTP_OK, "Modifié"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Demande $demande)
    {
        if (!$demande) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $demande->delete();
        if ($demande->trashed()) {
            return $this->getSuccessResponse(null, Response::HTTP_OK, "Suppression effectuée.");
        } else {
            return $this->getErrorResponse(Response::HTTP_NOT_MODIFIED, "Aucun élément supprimé.");
        }
    }
}
