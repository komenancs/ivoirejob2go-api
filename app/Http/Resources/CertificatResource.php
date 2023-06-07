<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type_certificat' => $this->type_certificat,
            'candidat_id' => $this->candidat->id ?? null,
            'nom' => $this->nom,
            'numero_certificat' => $this->numero_certificat,
            'date_obtention' => $this->date_obtention,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
