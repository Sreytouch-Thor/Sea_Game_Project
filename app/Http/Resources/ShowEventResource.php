<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowEventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // dd(User::all());
      
        return [
            'id' =>$this->id,
            'name' =>$this->name,
            'description' =>$this->description,
            'start_date' =>$this->start_date,
            'end_date' =>$this->end_date,
            'create_by_user'=>$this->user,
            'teams' =>TeamResource::collection($this->teams)
        ];
    }
}
