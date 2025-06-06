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
    $autor = autor::with('livro.review')->findOrFail($id);

    foreach ($autor->livros as $livro) {
        $livro->reviews()->delete();
        $livro->delete();
    }

    $autor->delete();

    return $autor;
}
    public function findLivros(int $id){
        return $this->autorRepository->findLivros($id);
    }



}