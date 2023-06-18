<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Requests\AbonnementRequest;
use App\Http\Resources\AbonnementResource;
use App\Http\Resources\AbonnementCollection;
use Symfony\Component\HttpFoundation\Response;

class AbonnementController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abonnememts = Abonnement::customPaginate();
        return ( new AbonnementCollection($abonnememts))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(AbonnementRequest $request)
    {
        $abonnement = Abonnement::create($request->validated());
        return (new AbonnementResource($abonnement))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Display the specified resource.
     */
    public function show(Abonnement $abonnement)
    {
        if (!$abonnement) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new AbonnementResource($abonnement))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(AbonnementRequest $request, Abonnement $abonnement)
    {
        if (!$abonnement) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $abonnement->update($request->validated());
        return ( new AbonnementResource($abonnement))->additional($this->getResponseTemplate(Response::HTTP_OK, "Modifié"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Abonnement $abonnement)
    {
        if (!$abonnement) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $abonnement->delete();
        if ($abonnement->trashed()) {
            return $this->getSuccessResponse(null, Response::HTTP_OK, "Suppression effectuée.");
        } else {
            return $this->getErrorResponse(Response::HTTP_NOT_MODIFIED, "Aucun élément supprimé.");
        }        
    }
}
