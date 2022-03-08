<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RessourceClient extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'tel' => $this->tel,
            //'mail' => $this->mail,
            'adresse' => $this->adresse
        ];
    }
}
