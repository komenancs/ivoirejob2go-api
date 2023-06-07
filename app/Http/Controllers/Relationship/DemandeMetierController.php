<?php

namespace App\Http\Controllers\Relationship;

use App\Http\Controllers\Controller;
use App\Http\Resources\DemandeCollection;
use App\Http\Resources\MetierCollection;
use App\Models\Demande;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DemandeMetierController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $demande = Demande::find($id);
        if (!$demande){
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new MetierCollection($demande->metiers))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, int $id)
    {

        $demande = Demande::find($id);
        if(!$demande){
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        if(!$request->metier_id){
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $demande->competences->attach($request->metier_id);
        return (new MetierCollection($demande->competences))->additional($this->getResponseTemplate(Response::HTTP_OK));
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
    public function destroy(int $id, int $mt_id)
    {
        $demande = Demande::find($id);
        if(!$demande){
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $demande->metiers->detach($mt_id);

        return  $this->getSuccessResponse([],Response::HTTP_OK, "Suppression effectuée");
    }
}
