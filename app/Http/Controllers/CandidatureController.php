<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidatureRequest;
use App\Models\Candidature;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Resources\CandidatureCollection;
use App\Http\Resources\CandidatureResource;
use Symfony\Component\HttpFoundation\Response;

class CandidatureController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidatures = Candidature::customPaginate();
        return ( new CandidatureCollection($candidatures))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CandidatureRequest $request)
    {
        $candidature = Candidature::create($request->validated());
        return (new CandidatureResource($candidature))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidature $candidature)
    {
        if (!$candidature) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new CandidatureResource($candidature))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CandidatureRequest $request, Candidature $candidature)
    {
        if (!$candidature) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $candidature->update($request->validated());
        return ( new CandidatureResource($candidature))->additional($this->getResponseTemplate(Response::HTTP_OK, "Modifié"));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidature $candidature)
    {
        if (!$candidature) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $candidature->delete();
        if ($candidature->trashed()) {
            return $this->getSuccessResponse(null, Response::HTTP_OK, "Suppression effectuée.");
        } else {
            return $this->getErrorResponse(Response::HTTP_NOT_MODIFIED, "Aucun élément supprimé.");
        } 
    }
}
