<?php
namespace App\Service;
use App\Repository\usuarioRepository;

class usuarioService{
    private usuarioRepository $UsuarioRepository;

    public function __construct(usuarioRepository $UsuarioRepository){

        $this->usuarioRepository = $UsuarioRepository;
    }

    public function get(){
        $autor = $this->usuarioRepository->get();
        return $autor;
    }

    public function details(int $id){
        return $this->usuarioRepository->details($id);
    }

    public function store(array $data){
        return $this->usuarioRepository->store($data);
    }

    public function update(int $id, array $data){
        return $this->usuarioRepository->update($id,$data);
    }

    public function delete(int $id){
        return $this->usuarioRepository->delete($id);
    }

}