<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'surname' => $this->surname,
            'telephone' => $this->telephone,
            'nom_entreprise' => $this->nom_entreprise,
            'poste_occupe' => $this->poste_occupe,
            'photo' => $this->photo,
            'linkedin' => $this->linkedin,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
            'date_verification_email' => $this->date_verification_email,
            'role' => $this->role,
            'localisation' => $this->localisation,
            'candidat' => $this->candidat,
            'employeur' => $this->employeur,
            /*'notifications' => NotificationResource::collection($this->notifications),
            'paiements' => PaiementResource::collection($this->paiements),
            'inbox' => MessageResource::collection($this->inbox),
            'sent' => MessageResource::collection($this->sent),*/
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}
