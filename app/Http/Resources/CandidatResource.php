<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CandidatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'fin_abonnement' => $this->fin_abonnement,
            'presentation' => $this->presentation,
            'user' => $this->user,
            'nombre_demandes_restantes' => $this->nombre_demandes_restantes,
            'abonnement' => $this->abonnement,
            'candidatures' => CandidatureResource::collection($this->candidatures),
            'certificats' => CertificatResource::collection($this->certificats),
            'formations' => FormationResource::collection($this->formations),
            'competences' => CompetenceResource::collection($this->competences),
            'metiers' => MetierResource::collection($this->metiers),
            'demandes' => DemandeResource::collection($this->demandes),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
