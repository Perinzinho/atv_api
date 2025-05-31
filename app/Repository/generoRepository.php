<?php

namespace App\Repository;
use App\Models\genero;

class generoRepository{
    public function get(){
        return genero::all();
    }

    public function details(int $id){
        return genero::findOrFail($id);
    }

    public function store(array $data){
        return genero::create($data);
    }

    public function update(int $id, array $data){
        $genero = $this->details($id);
        $genero->update($data);
        return $genero;
    }

    public function delete(int $id){
        $genero = $this->details($id);
        $genero->delete();
        return $genero;
    }
    
}