<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  [
            'id' => $this->id,
            'sender' => $this->sender,
            'recipient' => $this->recipient,
            'content' => $this->content,
            'pjs' => PjResource::collection($this->pjs),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
