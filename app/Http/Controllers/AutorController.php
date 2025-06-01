<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\autorService;
use App\Http\Resources\autorResource;
use App\Http\Requests\autorStoreRequest;

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
            return response()->json(['error'=>'Category not found'],404);
        }
        return new autorResource($autor);
    }

    public function store(autorStoreRequest $request){
        $data=$request->validated();
        $autor=$this->autorService->store($data);
        return new autorResource($autor);
    }

    

}
