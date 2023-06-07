<?php

namespace App\Http\Controllers\Relationship;

use App\Http\Controllers\Controller;
use App\Http\Resources\CertificatCollection;
use App\Http\Resources\CompetenceCollection;
use App\Http\Resources\CompetenceResource;
use App\Models\Candidat;
use App\Models\Competence;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CandidatCompetenceController extends Controller
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
        return ( new CompetenceCollection($candidat->competences))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, int $id)
    {

        $candidat = Candidat::find($id);
        if(!$candidat){
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        if(!$request->competence_id){
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $candidat->competences->attach($request->competence_id);
        return (new CompetenceCollection($candidat->competences))->additional($this->getResponseTemplate(Response::HTTP_OK));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id, int $cmp_id)
    {
        $candidat = Candidat::find($id);
        if(!$candidat){
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $candidat->competences->detach($cmp_id);

        return  $this->getSuccessResponse([],Response::HTTP_OK, "Suppression effectuée");
    }
}
