<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocalisationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'pays' => $this->pays,
            'ville' => $this->ville,
            'quatier' => $this->quatier,
            'rue' => $this->rue,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
