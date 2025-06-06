<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class livro extends Model
{
    protected $table ='livro';
    protected $fillable = ['titulo', 'sinopse','autor_id','genero_id'];

    public function review(){
        return $this->hasMany(review::class,'livro_id');
    }

    public function genero(){
        return $this->belongsTo(genero::class,'genero_id');
    }
    public function autor(){
        return $this->belongsTo(autor::class,'autor_id');
    }
}
