<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CandidatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nombre_etoiles' => $this->nombre_etoiles,
            'demande_date' => $this->demande_date,
            'derniere_etoile_date' => $this->derniere_etoile_date,
            'approbation_date' => $this->approbation_date,
            'status_paiement' => $this->status_paiement,
            /*'candidat' => $this->candidat,*/
            'demande' => $this->demande,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
