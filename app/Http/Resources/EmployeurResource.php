<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeurResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user' => $this->user,
            'localisation' => $this->localisation,
            'abonnement' => $this->abonnement,
            'nom' => $this->nom,
            /*'secteurs' => SecteurResource::collection($this->secteurs),
            'demandes' => DemandeResource::collection($this->demandes),*/
            'description' => $this->description,
            'logo' => $this->logo,
            'email' => $this->email,
            'contact_1' => $this->contact_1,
            'contact_2' => $this->contact_2,
            'site_web' => $this->site_web,
            'nombre_demandes_restantes' => $this->nombre_demandes_restantes,
            'lien_twitter' => $this->lien_twitter,
            'lien_facebook' => $this->lien_facebook,
            'lien_linkedin' => $this->lien_linkedin,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
