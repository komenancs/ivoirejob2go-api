<?php

namespace App\Http\Controllers;

use App\Models\Pj;
use App\Traits\ApiResponser;
use App\Utils\Utils;
use Illuminate\Http\Request;
use App\Http\Requests\PjRequest;
use App\Http\Resources\PjResource;
use App\Http\Resources\PjCollection;
use Symfony\Component\HttpFoundation\Response;

class PjController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pjs = Pj::customPaginate();
        return ( new PjCollection($pjs))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(PjRequest $request)
    {
        if ($request->hasFile('file')){
            $file = $request->file('file')->storeAs(
                'pj_files', Utils::slugify($request->file('file')->getClientOriginalName()) . "." . $request->file('file')->getClientOriginalExtension()
            );
        }
        $pj = Pj::create(array_merge($request->safe()->except('file'), [
            'filename' => $request->file('file')->getClientOriginalName(),
            'extension' => $request->file('file')->getClientOriginalExtension(),
            'path' => $file ?? null
        ]));
        return (new PjResource($pj))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Display the specified resource.
     */
    public function show(Pj $pj)
    {
        if (!$pj) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new PjResource($pj))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PjRequest $request, Pj $pj)
    {
        if (!$pj) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        if ($request->hasFile('file')){
            $file = $request->file('file')->storeAs(
                'pj_files', Utils::slugify($request->file('file')->getClientOriginalName()) . "." . $request->file('file')->getClientOriginalExtension()
            );
        }
        $pj->update(array_merge($request->safe()->except('file'), [
            'filename' => $request->file('file')->getClientOriginalName(),
            'extension' => $request->file('file')->getClientOriginalExtension(),
            'path' => $file ?? null
        ]));
        return ( new PjResource($pj))->additional($this->getResponseTemplate(Response::HTTP_OK, "Modifié"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pj $pj)
    {
        if (!$pj) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $pj->delete();
        if ($pj->trashed()) {
            return $this->getSuccessResponse(null, Response::HTTP_OK, "Suppression effectuée.");
        } else {
            return $this->getErrorResponse(Response::HTTP_NOT_MODIFIED, "Aucun élément supprimé.");
        }
    }
}
