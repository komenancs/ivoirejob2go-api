<?php

namespace App\Http\Controllers\Recherche;

use App\Models\Candidat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CandidatCollection;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\Response;

class CandidatRechercheController extends Controller
{
    function rechercheParPresentation(string $search) : CandidatCollection {
        $candidats = Candidat::where('presentation','LIKE',"%{$search}%")
                        ->customPaginate();

        return ( new CandidatCollection($candidats))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    function rechercheParNomSecteur(string $search) : CandidatCollection {
        $candidats = Candidat::whereHas('secteurs', function (Builder $query) use ($search) {
            $query->where('nom', 'like', '%' . $search . '%');
        })->customPaginate();
        return ( new CandidatCollection($candidats))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    function rechercheParNomMetiers(string $search) : CandidatCollection {
        $candidats = Candidat::whereHas('metiers', function (Builder $query) use ($search) {
            $query->where('nom', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
        })->customPaginate();
        return ( new CandidatCollection($candidats))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }
    
    function rechercheParNomCompetences(string $search) : CandidatCollection {
        $candidats = Candidat::whereHas('competences', function (Builder $query) use ($search) {
            $query->where('nom', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
        })->customPaginate();
        return ( new CandidatCollection($candidats))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    function rechercheParLocalisations(string $search) : CandidatCollection {
        $candidats = Candidat::whereHas('localisations', function (Builder $query) use ($search) {
            $query->where('pays', 'like', '%' . $search . '%')
            ->orWhere('ville', 'like', '%' . $search . '%')
            ->orWhere('quatier', 'like', '%' . $search . '%')
            ->orWhere('rue', 'like', '%' . $search . '%');
        })->customPaginate();
        return ( new CandidatCollection($candidats))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    function rechercheParCertificat(string $search) : CandidatCollection {
        $candidats = Candidat::whereHas('certificats', function (Builder $query) use ($search) {
            $query->where('nom', 'like', '%' . $search . '%');
        })->customPaginate();
        return ( new CandidatCollection($candidats))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    function globalSearch(string $search, string $location = null) {
        $candidats = Candidat::where('presentation','LIKE',"%{$search}%")->orWhereHas('secteurs', function (Builder $query) use ($search) {
            $query->where('nom', 'like', '%' . $search . '%');
        })->orWhereHas('metiers', function (Builder $query) use ($search) {
            $query->where('nom', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
        })->orWhereHas('competences', function (Builder $query) use ($search) {
            $query->where('nom', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
        })->orWhereHas('certificats', function (Builder $query) use ($search) {
            $query->where('nom', 'like', '%' . $search . '%');
        });

        if ($location) {
            $candidats = $candidats->orWhereHas('localisations', function (Builder $query) use ($search) {
                $query->where('pays', 'like', '%' . $search . '%')
                ->orWhere('ville', 'like', '%' . $search . '%')
                ->orWhere('quatier', 'like', '%' . $search . '%')
                ->orWhere('rue', 'like', '%' . $search . '%');
            });
        }

        return ( new CandidatCollection($candidats->customPaginate()))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }
}
