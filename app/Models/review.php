<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $table='review';
    protected $fillable = ['nota','texto','livro_id','usuario_id'];

    public function usuario(){
        return $this->belongsTo(usuario::class,'usuario_id');
    }
    public function livro(){
        return $this->belongsTo(livro::class,'livro_id');
    }
}
