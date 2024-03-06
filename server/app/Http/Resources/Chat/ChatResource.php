<?php

namespace App\Http\Resources\Chat;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */


    public function toArray(Request $request): array
    {
        $data[] = $this->getAttributes();
        $data[] = $this->getRelations();

        return [
            "data" => $data,
            "redirect_uri" => env("FRONTEND_URL") . "/" . $this->id,
        ];
    }
}
