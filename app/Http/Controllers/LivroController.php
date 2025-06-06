<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\livro;
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
        $livro=$this->livroService->get();
        return livroResource::collection($livro);
    }

    public function details($id){
        try{
            $livro= $this->livroService->details($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Livro não encontrado'],404);
        }
        return new livroResource($livro);
    }

    public function store(livroStoreRequest $request){
        $data=$request->validated();
        $livro=$this->livroService->store($data);
        return new livroResource($livro);
    }

    public function update(livroUpdateRequest $request, int $id){
        $data=$request->validated();
        try{
            $livro=$this->livroService->update($id,$data);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>"Livro não encontrado"],404);
        }
        return new livroResource($livro);
    }

    public function delete(int $id){
        try{
            $livro=$this->livroService->delete($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Livro não encontrado'],404);
        }
        return new livroResource($livro);
    }

    public function listarReviews($id){
    $livro = livro::with('review')->find($id);

    if (!$livro) {
        return response()->json(['error' => 'Livro não encontrado'], 404);
    }

    return response()->json($livro->review);
}

    public function GetWithReviews(){
    $livro = livro::with(['review', 'autor', 'livro$livro'])->get();

    return response()->json($livro);
}

    

}
