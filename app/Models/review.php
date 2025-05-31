<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $table='review';
    protected $fillable = ['nota','texto'];

    public function usuario(){
        return $this->belongsTo(usuario::class);
    }
    public function livro(){
        return $this->belongsTo(livro::class);
    }
}
