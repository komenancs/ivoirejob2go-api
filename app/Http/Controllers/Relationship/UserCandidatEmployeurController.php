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
            if ($user->employeur) {
                return ( new EmployeurResource($user->employeur))->additional($this->getResponseTemplate(Response::HTTP_OK));
            }
        }
        return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
    }

    public function candidat(int $id) {
        $user = User::find($id);
        if ($user) {
            if ($user->candidat) {
                return ( new CandidatResource($user->candidat))->additional($this->getResponseTemplate(Response::HTTP_OK));
            }
        }
        return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
    }
}
