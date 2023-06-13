<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeCertificatRequest;
use App\Traits\ApiResponser;
use App\Utils\Utils;
use Illuminate\Http\Request;
use App\Models\TypeCertificat;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\TypeCertificatCollection;
use App\Http\Resources\TypeCertificatResource;

class TypeCertificatController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeCertificats = TypeCertificat::paginate();
        return ( new TypeCertificatCollection($typeCertificats))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeCertificatRequest $request)
    {
        if ($request->hasFile('organisme_logo')){
            $organisme_logo = $request->file('organisme_logo')->storeAs(
                'organisme_logo', Utils::slugify(
                     $request->file('organisme_logo')->getClientOriginalName()
                ) . "." . $request->file('organisme_logo')->getClientOriginalExtension()
            );
        }
        $typeCertificat = TypeCertificat::create(array_merge($request->safe()->except(['organisme_logo']), ['organisme_logo' => $organisme_logo ?? null]));
        return (new TypeCertificatResource($typeCertificat))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeCertificat $typeCertificat)
    {
        if (!$typeCertificat) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new TypeCertificatResource($typeCertificat))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeCertificatRequest $request, TypeCertificat $typeCertificat)
    {
        if (!$typeCertificat) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        if ($request->hasFile('organisme_logo')){
            $organisme_logo = $request->file('organisme_logo')->storeAs(
                'organisme_logo', Utils::slugify(
                    $request->file('organisme_logo')->getClientOriginalName()
                ) . "." . $request->file('organisme_logo')->getClientOriginalExtension()
            );
        }
        $typeCertificat->update(array_merge($request->safe()->except(['organisme_logo']), ['organisme_logo' => $organisme_logo ?? null]));
        return ( new TypeCertificatResource($typeCertificat))->additional($this->getResponseTemplate(Response::HTTP_OK, "Modifié"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeCertificat $typeCertificat)
    {
        if (!$typeCertificat) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $typeCertificat->delete();
        if ($typeCertificat->trashed()) {
            return $this->getSuccessResponse(null, Response::HTTP_OK, "Suppression effectuée.");
        } else {
            return $this->getErrorResponse(Response::HTTP_NOT_MODIFIED, "Aucun élément supprimé.");
        }
    }
}
