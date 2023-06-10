<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TypeCertificatResource extends JsonResource
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
            'organisme_nom' => $this->organisme_nom,
            'organisme_logo' => $this->organisme_logo,
            'certification_nom' => $this->certification_nom,
            'certificats' => CertificatResource::collection($this->certificats),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}
