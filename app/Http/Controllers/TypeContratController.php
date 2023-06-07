<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeContratRequest;
use App\Models\TypeContrat;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Resources\TypeContratCollection;
use App\Http\Resources\TypeContratResource;
use Symfony\Component\HttpFoundation\Response;

class TypeContratController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeContrats = TypeContrat::paginate();
        return ( new TypeContratCollection($typeContrats))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeContratRequest $request)
    {
        $typeContrat = TypeContrat::create($request->validated());
        return (new TypeContratResource($typeContrat))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeContrat $typeContrat)
    {
        if (!$typeContrat) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new TypeContratResource($typeContrat))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeContratRequest $request, TypeContrat $typeContrat)
    {
        if (!$typeContrat) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $typeContrat->update($request->validated());
        return ( new TypeContratResource($typeContrat))->additional($this->getResponseTemplate(Response::HTTP_OK, "Modifié"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeContrat $typeContrat)
    {
        if (!$typeContrat) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $typeContrat->delete();
        if ($typeContrat->trashed()) {
            return $this->getSuccessResponse(null, Response::HTTP_OK, "Suppression effectuée.");
        } else {
            return $this->getErrorResponse(Response::HTTP_NOT_MODIFIED, "Aucun élément supprimé.");
        }
    }
}
