<?php
namespace App\Service;
use App\Repository\generoRepository;

class generoService{
    private generoRepository $GeneroRepository;

    public function __construct(generoRepository $GeneroRepository){

        $this->generoRepository = $GeneroRepository;
    }

    public function get(){
        $autor = $this->generoRepository->get();
        return $autor;
    }

    public function details(int $id){
        return $this->generoRepository->details($id);
    }

    public function store(array $data){
        return $this->generoRepository->store($data);
    }

    public function update(int $id, array $data){
        return $this->generoRepository->update($id,$data);
    }

    public function delete(int $id){
        return $this->generoRepository->delete($id);
    }

}