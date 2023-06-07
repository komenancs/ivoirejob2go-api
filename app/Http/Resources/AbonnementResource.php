<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AbonnementResource extends JsonResource
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
            'nom' => $this->nom,
            'montant' => $this->montant,
            'nombre_demande' => $this->nombre_demande,
            'description' => $this->description,
            /*'employeurs' => EmployeurResource::collection($this->whenLoaded('employeurs')),
            'candidats' => CandidatResource::collection($this->whenLoaded('candidats')),*/
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
