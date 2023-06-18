<?php

namespace App\Http\Controllers\Relationship;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CandidatResource;
use App\Http\Resources\EmployeurResource;
use Symfony\Component\HttpFoundation\Response;

class UserCandidatEmployeurController extends Controller
{
    use ApiResponser;
    public function employeur(int $id) {
        $user = User::find($id);
        if ($user) {
            return ( new EmployeurResource($user->employeur))->additional($this->getResponseTemplate(Response::HTTP_OK));
        }else {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
    }

    public function candidat(int $id) {
        $user = User::find($id);
        if ($user) {
            return ( new CandidatResource($user->candidat))->additional($this->getResponseTemplate(Response::HTTP_OK));
        }else {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
    }
}
