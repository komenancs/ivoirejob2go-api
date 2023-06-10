<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeurRequest;
use App\Models\Employeur;
use App\Traits\ApiResponser;
use App\Utils\Utils;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeurCollection;
use App\Http\Resources\EmployeurResource;
use Symfony\Component\HttpFoundation\Response;

class EmployeurController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employeurs = Employeur::paginate();
        return ( new EmployeurCollection($employeurs))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeurRequest $request)
    {
        if ($request->hasFile('logo')){
            $logo = $request->file('logo')->storeAs(
                'employeur_logos', Utils::slugify($request->file('logo')->getClientOriginalName()) . "." . $request->file('logo')->getClientOriginalExtension()
            );
        }
        $employeur = Employeur::create(array_merge($request->safe()->except(['logo',]), ["logo" => $logo ?? null]));
        return (new EmployeurResource($employeur))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Display the specified resource.
     */
    public function show(Employeur $employeur)
    {
        if (!$employeur) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new EmployeurResource($employeur))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeurRequest $request, Employeur $employeur)
    {
        if (!$employeur) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        if ($request->hasFile('logo')){
            $logo = $request->file('logo')->storeAs(
                'employeur_logos', Utils::slugify($request->file('logo')->getClientOriginalName()) . "." . $request->file('logo')->getClientOriginalExtension()
            );
        }
        $employeur->update(array_merge($request->safe()->except(['logo',]), ["logo" => $logo ?? null]));
        return ( new EmployeurResource($employeur))->additional($this->getResponseTemplate(Response::HTTP_OK, "Modifié"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employeur $employeur)
    {
        if (!$employeur) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $employeur->delete();
        if ($employeur->trashed()) {
            return $this->getSuccessResponse(null, Response::HTTP_OK, "Suppression effectuée.");
        } else {
            return $this->getErrorResponse(Response::HTTP_NOT_MODIFIED, "Aucun élément supprimé.");
        }
    }
}
