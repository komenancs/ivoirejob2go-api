<?php

namespace App\Http\Controllers\Relationship;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidatureRequest;
use App\Http\Resources\CandidatResource;
use App\Http\Resources\CandidatureCollection;
use App\Http\Resources\CandidatureResource;
use App\Models\Candidat;
use App\Models\Candidature;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CandidatCandidatureController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index(int $id)
    {
        $candidat = Candidat::find($id);
        if (!$candidat) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new CandidatureCollection($candidat->candidatures))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CandidatureRequest $request, int $id)
    {
        $request->request->add(['candidat_id' => $id]);
        $candidature = Candidature::create($request->validated());
        return (new CandidatureResource($candidature))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id, int $cdt_id)
    {
        $candidature = Candidature::find($cdt_id);
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
