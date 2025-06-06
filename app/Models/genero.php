<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class genero extends Model
{
    protected $table = 'genero';
    protected $fillable = ['nome'];

    public function livro(){
    return $this->hasMany(livro::class, 'genero_id');
    }
}
