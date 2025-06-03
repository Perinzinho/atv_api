<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\usuarioService;
use App\Http\Resources\usuarioResource;
use App\Http\Requests\usuarioStoreRequest;
use App\Http\Requests\usuarioUpdateRequest;

class usuarioController extends Controller
{
    private usuarioService $usuarioService;
    public function __construct(usuarioService $usuarioService){
        $this->usuarioService=$usuarioService;
    }

    public function get(){
        $genero=$this->usuarioService->get();
        return usuarioResource::collection($genero);
    }

    public function details($id){
        try{
            $genero= $this->usuarioService->details($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Genero não encontrado'],404);
        }
        return new usuarioResource($genero);
    }

    public function store(usuarioStoreRequest $request){
        $data=$request->validated();
        $genero=$this->usuarioService->store($data);
        return new usuarioResource($genero);
    }

    public function update(usuarioUpdateRequest $request, int $id){
        $data=$request->validated();
        try{
            $genero=$this->usuarioService->update($id,$data);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>"Genero não encontrado"],404);
        }
        return new usuarioResource($genero);
    }

    public function delete(int $id){
        try{
            $genero=$this->usuarioService->delete($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Genero não encontrado'],404);
        }
        return new usuarioResource($genero);
    }

    

}
