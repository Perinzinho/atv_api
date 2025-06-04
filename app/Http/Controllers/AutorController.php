<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\autorService;
use App\Http\Resources\autorResource;
use App\Http\Requests\autorStoreRequest;
use App\Http\Requests\autorUpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AutorController extends Controller
{
    private autorService $autorService;
    public function __construct(autorService $autorService){
        $this->autorService=$autorService;
    }

    public function get(){
        $autor=$this->autorService->get();
        return autorResource::collection($autor);
    }

    public function details($id){
        try{
            $autor= $this->autorService->details($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Autor não encontrado'],404);
        }
        return new autorResource($autor);
    }

    public function store(autorStoreRequest $request){
        $data=$request->validated();
        $autor=$this->autorService->store($data);
        return new autorResource($autor);
    }

    public function update(autorUpdateRequest $request, int $id){
        $data=$request->validated();
        try{
            $autor=$this->autorService->update($id,$data);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>"Autor não encontrado"],404);
        }
        return new autorResource($autor);
    }

    public function delete(int $id){
        try{
            $autor=$this->autorService->delete($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Autor não encontrado'],404);
        }
        return new autorResource($autor);
    }

    public function getWithLivro(int $id){
        $autor=$this->autorService->getWithLivro();
        return livroResource::collection($autor);
    }

    

}
