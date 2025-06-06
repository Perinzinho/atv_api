<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\review;
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
        $review=$this->reviewService->get();
        return reviewResource::collection($review);
    }

    public function details($id){
        try{
            $review= $this->reviewService->details($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Review não encontrado'],404);
        }
        return new reviewResource($review);
    }

    public function store(reviewStoreRequest $request){
        $data=$request->validated();
        $review=$this->reviewService->store($data);
        return new reviewResource($review);
    }

    public function update(reviewUpdateRequest $request, int $id){
        $data=$request->validated();
        try{
            $review=$this->reviewService->update($id,$data);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>"Review não encontrado"],404);
        }
        return new reviewResource($review);
    }

    public function delete(int $id){
        try{
            $review=$this->reviewService->delete($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Review não encontrado'],404);
        }
        return new reviewResource($review);
    }

    

}
