<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DemandeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'titre' => $this->titre,
            'employeur' => $this->employeur,
            'description' => $this->description,
            'nombre_poste' => $this->nombre_poste,
            'salaire' => $this->salaire,
            'type_contrat' => $this->type_contrat,
            'date_publication' => $this->date_publication,
            'date_expiration' => $this->date_expiration,
            /*'metiers' => MetierResource::collection($this->metiers),
            'secteurs' => SecteurResource::collection($this->secteurs),
            'localisations' => LocalisationResource::collection($this->localisations),
            'competences' => CompetenceResource::collection($this->competences),*/
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
