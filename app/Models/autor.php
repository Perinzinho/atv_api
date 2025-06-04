<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class autor extends Model
{
    protected $table = 'autor';
    protected $fillable=['nome','data_nasc','biografia'];

    public function livro(){
        return $this->hasMany(livro::class,'livro_id','id');
    }
}
