<?php
namespace App\Service;
use App\Repository\autorRepository;

class autorService{
    private autorRepository $AutorRepository;

    public function __construct(autorRepository $AutorRepository){

        $this->autorRepository = $AutorRepository;
    }

    public function get(){
        $autor = $this->autorRepository->get();
        return $autor;
    }

    public function details(int $id){
        return $this->autorRepository->details($id);
    }

    public function store(array $data){
        return $this->autorRepository->store($data);
    }

    public function update(int $id, array $data){
        return $this->autorRepository->update($id,$data);
    }

    public function delete(int $id){
        return $this->autorRepository->delete($id);
    }

    public function getWithLivros(int $id){
        return $this->autorRepository->getWithLivros();
    }



}