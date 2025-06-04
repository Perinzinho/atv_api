<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\reviewService;
use App\Http\Resources\reviewResource;
use App\Http\Requests\reviewStoreRequest;
use App\Http\Requests\reviewUpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ReviewController extends Controller
{
    private reviewService $reviewService;
    public function __construct(reviewService $reviewService){
        $this->reviewService=$reviewService;
    }

    public function get(){
        $genero=$this->reviewService->get();
        return reviewResource::collection($genero);
    }

    public function details($id){
        try{
            $genero= $this->reviewService->details($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Genero não encontrado'],404);
        }
        return new reviewResource($genero);
    }

    public function store(reviewStoreRequest $request){
        $data=$request->validated();
        $genero=$this->reviewService->store($data);
        return new reviewResource($genero);
    }

    public function update(reviewUpdateRequest $request, int $id){
        $data=$request->validated();
        try{
            $genero=$this->reviewService->update($id,$data);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>"Genero não encontrado"],404);
        }
        return new reviewResource($genero);
    }

    public function delete(int $id){
        try{
            $genero=$this->reviewService->delete($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Genero não encontrado'],404);
        }
        return new reviewResource($genero);
    }

    

}
