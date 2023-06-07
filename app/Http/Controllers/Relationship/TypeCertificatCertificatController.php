<?php

namespace App\Http\Controllers\Relationship;

use App\Http\Controllers\Controller;
use App\Http\Resources\CertificatCollection;
use App\Models\TypeCertificat;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypeCertificatCertificatController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index(int $id)
    {
        $typeCertificat = TypeCertificat::find($id);
        if (!$typeCertificat){
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new CertificatCollection($typeCertificat->certificats))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
