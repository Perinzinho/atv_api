<?php

namespace App\Repository;
use App\Models\review;

class reviewRepository{
    public function get(){
        return review::all();
    }

    public function details(int $id){
        return review::findOrFail($id);
    }

    public function store(array $data){
        return review::create($data);
    }

    public function update(int $id, array $data){
        $review = $this->details($id);
        $review->update($data);
        return $review;
    }

    public function delete(int $id){
        $review = $this->details($id);
        $review->delete();
        return $review;
    }
    
}