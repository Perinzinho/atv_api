<?php

namespace App\Repository;
use App\Models\usuario;

class usuarioRepository{
    public function get(){
        return usuario::all();
    }

    public function details(int $id){
        return usuario::findOrFail($id);
    }

    public function store(array $data){
        return usuario::create($data);
    }

    public function update(int $id, array $data){
        $usuario = $this->details($id);
        $usuario->update($data);
        return $usuario;
    }

    public function delete(int $id){
        $usuario = $this->details($id);
        $usuario->delete();
        return $usuario;
    }


    
}