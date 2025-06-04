<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\livroService;
use App\Http\Resources\livroResource;
use App\Http\Requests\livroStoreRequest;
use App\Http\Requests\livroUpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LivroController extends Controller
{
    private livroService $livroService;
    public function __construct(livroService $livroService){
        $this->livroService=$livroService;
    }

    public function get(){
        $genero=$this->livroService->get();
        return livroResource::collection($genero);
    }

    public function details($id){
        try{
            $genero= $this->livroService->details($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Genero não encontrado'],404);
        }
        return new livroResource($genero);
    }

    public function store(livroStoreRequest $request){
        $data=$request->validated();
        $genero=$this->livroService->store($data);
        return new livroResource($genero);
    }

    public function update(livroUpdateRequest $request, int $id){
        $data=$request->validated();
        try{
            $genero=$this->livroService->update($id,$data);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>"Genero não encontrado"],404);
        }
        return new livroResource($genero);
    }

    public function delete(int $id){
        try{
            $genero=$this->livroService->delete($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Genero não encontrado'],404);
        }
        return new livroResource($genero);
    }

    

}
