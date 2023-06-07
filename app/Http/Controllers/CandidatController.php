<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidatRequest;
use App\Http\Resources\CandidatCollection;
use App\Http\Resources\CandidatResource;
use App\Models\Candidat;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CandidatController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidats = Candidat::paginate();
        return ( new CandidatCollection($candidats))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CandidatRequest $request)
    {
        $candidat = Candidat::create($request->validated());
        return (new CandidatResource($candidat))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidat $candidat)
    {
        if (!$candidat) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new CandidatResource($candidat))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CandidatRequest $request, Candidat $candidat)
    {
        if (!$candidat) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $candidat->update($request->validated());
        return ( new CandidatResource($candidat))->additional($this->getResponseTemplate(Response::HTTP_OK, "Modifié"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidat $candidat)
    {
        if (!$candidat) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $candidat->delete();
        if ($candidat->trashed()) {
            return $this->getSuccessResponse(null, Response::HTTP_OK, "Suppression effectuée.");
        } else {
            return $this->getErrorResponse(Response::HTTP_NOT_MODIFIED, "Aucun élément supprimé.");
        }   
    }
}
