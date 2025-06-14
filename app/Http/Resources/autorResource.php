<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\livroResource;

class autorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'nome'=>$this->nome,
            'data_nasc'=>$this->data_nasc,
            'biografia'=>$this->biografia,      
            'livros'=>livroResource::collection($this->whenLoaded('livros'))  
        ];
    }
}
