<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaiementRequest;
use App\Models\Paiement;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Resources\PaiementCollection;
use App\Http\Resources\PaiementResource;
use Symfony\Component\HttpFoundation\Response;

class PaiementController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paiements = Paiement::customPaginate();
        return ( new PaiementCollection($paiements))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaiementRequest $request)
    {
        $paiement = Paiement::create($request->validated());
        return (new PaiementResource($paiement))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Display the specified resource.
     */
    public function show(Paiement $paiement)
    {
        if (!$paiement) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new PaiementResource($paiement))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaiementRequest $request, Paiement $paiement)
    {
        if (!$paiement) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $paiement->update($request->validated());
        return ( new PaiementResource($paiement))->additional($this->getResponseTemplate(Response::HTTP_OK, "Modifié"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paiement $paiement)
    {
        if (!$paiement) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $paiement->delete();
        if ($paiement->trashed()) {
            return $this->getSuccessResponse(null, Response::HTTP_OK, "Suppression effectuée.");
        } else {
            return $this->getErrorResponse(Response::HTTP_NOT_MODIFIED, "Aucun élément supprimé.");
        }
    }
}
