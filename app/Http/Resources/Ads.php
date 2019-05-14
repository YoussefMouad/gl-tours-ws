<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Ads extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "picture" => str_replace("\\", "/", asset("storage" . "/" . $this->picture)),
            "date" => $this->date,
            "place_id" => $this->place_id,
            "created_at" => $this->created_at->format("Y/m/d H:i:s"),
            "updated_at" => $this->updated_at->format("Y/m/d H:i:s"),
        ];
    }
}
