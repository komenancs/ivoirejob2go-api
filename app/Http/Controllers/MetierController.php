<?php

namespace App\Http\Controllers;

use App\Http\Requests\MetierRequest;
use App\Models\Metier;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Resources\MetierCollection;
use App\Http\Resources\MetierResource;
use Symfony\Component\HttpFoundation\Response;

class MetierController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metiers = Metier::paginate();
        return ( new MetierCollection($metiers))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MetierRequest $request)
    {
        $metier = Metier::create($request->validated());
        return (new MetierResource($metier))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Display the specified resource.
     */
    public function show(Metier $metier)
    {
        if (!$metier) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new MetierResource($metier))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MetierRequest $request, Metier $metier)
    {
        if (!$metier) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $metier->update($request->validated());
        return ( new MetierResource($metier))->additional($this->getResponseTemplate(Response::HTTP_OK, "Modifié"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Metier $metier)
    {
        if (!$metier) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $metier->delete();
        if ($metier->trashed()) {
            return $this->getSuccessResponse(null, Response::HTTP_OK, "Suppression effectuée.");
        } else {
            return $this->getErrorResponse(Response::HTTP_NOT_MODIFIED, "Aucun élément supprimé.");
        }
    }
}
