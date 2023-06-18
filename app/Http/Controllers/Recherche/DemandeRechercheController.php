<?php

namespace App\Http\Controllers\Recherche;

use App\Models\Demande;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DemandeCollection;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\Response;

class DemandeRechercheController extends Controller
{
    use ApiResponser;
    function rechercheParTitreEtParDescription(string $search) : DemandeCollection {
        $demandes = Demande::where('titre','LIKE',"%{$search}%")
                        ->orWhere('description','LIKE',"%{$search}%")
                        ->paginate();

        return ( new DemandeCollection($demandes))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    function rechercheParNomSecteur(string $search) : DemandeCollection {
        $demandes = Demande::whereHas('secteurs', function (Builder $query) use ($search) {
            $query->where('nom', 'like', '%' . $search . '%');
        })->get();
        return ( new DemandeCollection($demandes))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    function rechercheParNomMetiers(string $search) : DemandeCollection {
        $demandes = Demande::whereHas('metiers', function (Builder $query) use ($search) {
            $query->where('nom', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
        })->get();
        return ( new DemandeCollection($demandes))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    function rechercheParNomCompetences(string $search) : DemandeCollection {
        $demandes = Demande::whereHas('competences', function (Builder $query) use ($search) {
            $query->where('nom', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
        })->get();
        return ( new DemandeCollection($demandes))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    function rechercheParLocalisations(string $search) : DemandeCollection {
        $demandes = Demande::whereHas('localisations', function (Builder $query) use ($search) {
            $query->where('pays', 'like', '%' . $search . '%')
            ->orWhere('ville', 'like', '%' . $search . '%')
            ->orWhere('quatier', 'like', '%' . $search . '%')
            ->orWhere('rue', 'like', '%' . $search . '%');
        })->get();
        return ( new DemandeCollection($demandes))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    function rechercheParNomTypeContrats(string $search) : DemandeCollection {
        $demandes = Demande::whereHas('type_contrat', function (Builder $query) use ($search) {
            $query->where('nom', 'like', '%' . $search . '%');
        })->get();
        return ( new DemandeCollection($demandes))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    function globalSearch(string $search, string $location) {
        
    }
}
