<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\genero;
use App\Service\generoService;
use App\Http\Resources\generoResource;
use App\Http\Requests\generoStoreRequest;
use App\Http\Requests\generoUpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException; 

class GeneroController extends Controller
{
    private generoService $generoService;
    public function __construct(generoService $generoService){
        $this->generoService=$generoService;
    }

    public function get(){
        $genero=$this->generoService->get();
        return generoResource::collection($genero);
    }

    public function details($id){
        try{
            $genero= $this->generoService->details($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Genero não encontrado'],404);
        }
        return new generoResource($genero);
    }

    public function store(generoStoreRequest $request){
        $data=$request->validated();
        $genero=$this->generoService->store($data);
        return new generoResource($genero);
    }

    public function update(generoUpdateRequest $request, int $id){
        $data=$request->validated();
        try{
            $genero=$this->generoService->update($id,$data);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>"Genero não encontrado"],404);
        }
        return new generoResource($genero);
    }

    public function delete(int $id){
        try{
            $genero=$this->generoService->details($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Genero não encontrado'],404);
        }
        return new autorResource($genero);
    }

    public function listarLivros(int $id){
        $genero = genero::with('livro')->find($id);
        if (!$genero) {
            return response()->json(['error' => 'Gênero não encontrado'], 404);
        }
        return response()->json($genero->livro);
    }
    
    public function GetWithLivros(){
        $generos = Genero::with('livro')->get();
        return response()->json($generos);
    }

    

}
