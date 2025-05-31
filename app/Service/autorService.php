<?php
namespace App\Services;
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
    

}