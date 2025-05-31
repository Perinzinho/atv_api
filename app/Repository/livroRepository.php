<?php

namespace App\Repository;
use App\Models\livro;

class livroRepository{
    public function get(){
        return livro::all();
    }

    public function details(int $id){
        return livro::findOrFail($id);
    }

    public function store(array $data){
        return livro::create($data);
    }

    public function update(int $id, array $data){
        $livro = $this->details($id);
        $livro->update($data);
        return $livro;
    }

    public function delete(int $id){
        $livro = $this->details($id);
        $livro->delete();
        return $livro;
    }
    
}