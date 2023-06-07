<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SecteurResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nom_secteur' => $this->nom_secteur,
            /*'demandes' => DemandeResource::collection($this->demandes),
            'employeurs' => EmployeurResource::collection($this->employeurs),*/
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
