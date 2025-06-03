<?php
namespace App\Service;
use App\Repository\livroRepository;

class livroService{
    private livroRepository $LivroRepository;

    public function __construct(livroRepository $LivroRepository){

        $this->livroRepository = $LivroRepository;
    }

    public function get(){
        $autor = $this->livroRepository->get();
        return $autor;
    }

    public function details(int $id){
        return $this->livroRepository->details($id);
    }

    public function store(array $data){
        return $this->livroRepository->store($data);
    }

    public function update(int $id, array $data){
        return $this->livroRepository->update($id,$data);
    }

    public function delete(int $id){
        return $this->livroRepository->delete($id);
    }

}