<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificatRequest;
use App\Http\Resources\CertificatCollection;
use App\Http\Resources\CertificatResource;
use App\Models\Certificat;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CertificatController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificats = Certificat::paginate();
        return ( new CertificatCollection($certificats))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CertificatRequest $request)
    {
        $certificat = Certificat::create($request->validated());
        return (new CertificatResource($certificat))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificat $certificat)
    {
        if (!$certificat) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new CertificatResource($certificat))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CertificatRequest $request, Certificat $certificat)
    {
        if (!$certificat) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $certificat->update($request->validated());
        return ( new CertificatResource($certificat))->additional($this->getResponseTemplate(Response::HTTP_OK, "Modifié"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificat $certificat)
    {
        if (!$certificat) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $certificat->delete();
        if ($certificat->trashed()) {
            return $this->getSuccessResponse(null, Response::HTTP_OK, "Suppression effectuée.");
        } else {
            return $this->getErrorResponse(Response::HTTP_NOT_MODIFIED, "Aucun élément supprimé.");
        } 
    }
}
