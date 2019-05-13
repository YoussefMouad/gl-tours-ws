<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Places extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "picture" => str_replace("\\", "/", asset("storage" . "/" . $this->picture)),
            "latitude" => $this->latitude,
            "longitude" => $this->longitude,
            "ads" => $this->ads,
            "hala" => $this->hala,
            "created_at" => $this->created_at->format("Y/m/d H:i:s"),
            "updated_at" => $this->updated_at->format("Y/m/d H:i:s"),
        ];
    }
}
