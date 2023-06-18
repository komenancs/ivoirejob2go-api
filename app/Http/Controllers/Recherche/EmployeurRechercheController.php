<?php

namespace App\Http\Controllers\Recherche;

use App\Models\Employeur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Resources\EmployeurCollection;
use Symfony\Component\HttpFoundation\Response;

class EmployeurRechercheController extends Controller
{
    function rechercheParNomEmail(string $search) : EmployeurCollection {
        $employeurs = Employeur::whereHas('localisations', function (Builder $query) use ($search) {
            $query->where('nom', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%');
        })->paginate();
        return ( new EmployeurCollection($employeurs))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    function rechercheParNomSecteur(string $search) : EmployeurCollection {
        $employeurs = Employeur::whereHas('secteurs', function (Builder $query) use ($search) {
            $query->where('nom', 'like', '%' . $search . '%');
        })->paginate();
        return ( new EmployeurCollection($employeurs))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    function rechercheParNomMetiers(string $search) : EmployeurCollection {
        $employeurs = Employeur::whereHas('metiers', function (Builder $query) use ($search) {
            $query->where('nom', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
        })->paginate();
        return ( new EmployeurCollection($employeurs))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    function rechercheParNomCompetences(string $search) : EmployeurCollection {
        $employeurs = Employeur::whereHas('competences', function (Builder $query) use ($search) {
            $query->where('nom', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
        })->paginate();
        return ( new EmployeurCollection($employeurs))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    function rechercheParLocalisations(string $search) : EmployeurCollection {
        $employeurs = Employeur::whereHas('localisations', function (Builder $query) use ($search) {
            $query->where('pays', 'like', '%' . $search . '%')
            ->orWhere('ville', 'like', '%' . $search . '%')
            ->orWhere('quatier', 'like', '%' . $search . '%')
            ->orWhere('rue', 'like', '%' . $search . '%');
        })->paginate();
        return ( new EmployeurCollection($employeurs))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    function globalSearch(string $search, string $location = null) {
        $employeurs = Employeur::where('email','LIKE',"%{$search}%")
        ->orWhere('nom','LIKE',"%{$search}%")->orWhereHas('secteurs', function (Builder $query) use ($search) {
            $query->where('nom', 'like', '%' . $search . '%');
        })->orWhereHas('metiers', function (Builder $query) use ($search) {
            $query->where('nom', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
        })->orWhereHas('competences', function (Builder $query) use ($search) {
            $query->where('nom', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
        });

        if ($location) {
            $employeurs = $employeurs->orWhereHas('localisations', function (Builder $query) use ($search) {
                $query->where('pays', 'like', '%' . $search . '%')
                ->orWhere('ville', 'like', '%' . $search . '%')
                ->orWhere('quatier', 'like', '%' . $search . '%')
                ->orWhere('rue', 'like', '%' . $search . '%');
            });
        }

        return ( new EmployeurCollection($employeurs->paginate()))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }
}
