<?php

namespace App\Repository;
use App\Models\autor;

class autorRepository{
    public function get(){
        return autor::all();
    }

    public function details(int $id){
        return autor::findOrFail($id);
    }

    public function store(array $data){
        return autor::create($data);
    }

    public function update(int $id, array $data){
        $autor = $this->details($id);
        $autor->update($data);
        return $autor;
    }

    public function delete(int $id){
        $autor = $this->details($id);
        $autor->delete();
        return $autor;
    }
    
}