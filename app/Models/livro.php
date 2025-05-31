<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class livro extends Model
{
    protected $table ='livro';
    protected $fillable = ['titulo', 'sinopse'];

    public function review(){
        return $this->hasMany(review::class);
    }

    public function genero(){
        return $this->hasMany(genero::class);
    }
    public function autor(){
        return $this->belongsTo(autor::class);
    }
}
