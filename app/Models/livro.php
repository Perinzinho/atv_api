<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class livro extends Model
{
    protected $table ='livro';
    protected $fillable = ['titulo', 'sinopse','autor_id'];

    public function review(){
        return $this->hasMany(review::class,'review_id','id');
    }

    public function genero(){
        return $this->hasMany(genero::class,'genero_id','id');
    }
    public function autor(){
        return $this->belongsTo(autor::class,'autor_id','id');
    }
}
