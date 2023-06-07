<?php

namespace App\Http\Controllers\Relationship;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageCollection;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserSentController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index(int $id)
    {
        $user = User::find($id);
        if (!$user){
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new MessageCollection($user->sent))->additional($this->getResponseTemplate(Response::HTTP_OK));
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
