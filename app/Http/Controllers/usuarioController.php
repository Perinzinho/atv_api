<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\usuario;
use App\Service\usuarioService;
use App\Http\Resources\usuarioResource;
use App\Http\Requests\usuarioStoreRequest;
use App\Http\Requests\usuarioUpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class usuarioController extends Controller
{
    private usuarioService $usuarioService;
    public function __construct(usuarioService $usuarioService){
        $this->usuarioService=$usuarioService;
    }

    public function get(){
        $usuario=$this->usuarioService->get();
        return usuarioResource::collection($usuario);
    }

    public function details(int $id){
        try{
            $usuario= $this->usuarioService->details($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'usuario não encontrado'],404);
        }
        return new usuarioResource($usuario);
    }

    public function store(usuarioStoreRequest $request){
        $data=$request->validated();
        $usuario=$this->usuarioService->store($data);
        return new usuarioResource($usuario);
    }

    public function update(usuarioUpdateRequest $request, int $id){
        $data=$request->validated();
        try{
            $usuario=$this->usuarioService->update($id,$data);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>"usuario não encontrado"],404);
        }
        return new usuarioResource($usuario);
    }

    public function delete(int $id){
        try{
            $usuario=$this->usuarioService->delete($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'usuario não encontrado'],404);
        }
        return new usuarioResource($usuario);
    }

    public function listarReviews(int $id){
    
        $usuario = usuario::with('review')->find($id);
        if (!$usuario) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }

        return response()->json($usuario->review);
    }

    

}
