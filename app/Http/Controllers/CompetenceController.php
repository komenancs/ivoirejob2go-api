<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompetenceRequest;
use App\Models\Competence;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Resources\CompetenceCollection;
use App\Http\Resources\CompetenceResource;
use Symfony\Component\HttpFoundation\Response;

class CompetenceController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competences = Competence::paginate();
        return ( new CompetenceCollection($competences))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompetenceRequest $request)
    {
        $competence = Competence::create($request->validated());
        return (new CompetenceResource($competence))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Display the specified resource.
     */
    public function show(Competence $competence)
    {
        if (!$competence) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new CompetenceResource($competence))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competence $competence)
    {
        if (!$competence) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $competence->update($request->validated());
        return ( new CompetenceResource($competence))->additional($this->getResponseTemplate(Response::HTTP_OK, "Modifié"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competence $competence)
    {
        if (!$competence) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $competence->delete();
        if ($competence->trashed()) {
            return $this->getSuccessResponse(null, Response::HTTP_OK, "Suppression effectuée.");
        } else {
            return $this->getErrorResponse(Response::HTTP_NOT_MODIFIED, "Aucun élément supprimé.");
        }
    }
}
