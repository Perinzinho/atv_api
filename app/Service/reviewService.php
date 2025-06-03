<?php
namespace App\Service;
use App\Repository\reviewRepository;

class reviewService{
    private reviewRepository $ReviewRepository;

    public function __construct(reviewRepository $ReviewRepository){

        $this->reviewRepository = $ReviewRepository;
    }

    public function get(){
        $autor = $this->reviewRepository->get();
        return $autor;
    }

    public function details(int $id){
        return $this->reviewRepository->details($id);
    }

    public function store(array $data){
        return $this->reviewRepository->store($data);
    }

    public function update(int $id, array $data){
        return $this->reviewRepository->update($id,$data);
    }

    public function delete(int $id){
        return $this->reviewRepository->delete($id);
    }

}