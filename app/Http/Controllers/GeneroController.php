<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\generoService;
use App\Http\Resources\generoResource;
use App\Http\Requests\autorStoreRequest;
use App\Http\Requests\autorUpdateRequest;

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

    public function store(autorStoreRequest $request){
        $data=$request->validated();
        $genero=$this->generoService->store($data);
        return new generoResource($genero);
    }

    public function update(autorUpdateRequest $request, int $id){
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
            $genero=$this->generoService->delete($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Genero não encontrado'],404);
        }
        return new generoResource($genero);
    }

    

}
