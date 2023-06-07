<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReglageRequest;
use App\Models\Reglage;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Resources\ReglageCollection;
use App\Http\Resources\ReglageResource;
use Symfony\Component\HttpFoundation\Response;

class ReglageController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reglages = Reglage::paginate();
        return ( new ReglageCollection($reglages))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReglageRequest $request)
    {
        $reglage = Reglage::create($request->validated());
        return (new ReglageResource($reglage))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Display the specified resource.
     */
    public function show(Reglage $reglage)
    {
        if (!$reglage) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new ReglageResource($reglage))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReglageRequest $request, Reglage $reglage)
    {
        if (!$reglage) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $reglage->update($request->validated());
        return ( new ReglageResource($reglage))->additional($this->getResponseTemplate(Response::HTTP_OK, "Modifié"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reglage $reglage)
    {
        if (!$reglage) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $reglage->delete();
        if ($reglage->trashed()) {
            return $this->getSuccessResponse(null, Response::HTTP_OK, "Suppression effectuée.");
        } else {
            return $this->getErrorResponse(Response::HTTP_NOT_MODIFIED, "Aucun élément supprimé.");
        }
    }
}
