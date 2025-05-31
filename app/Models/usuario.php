<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    protected $table = "usuario";
    protected $fillable = ['nome','email','senha'];

    public function review(){
        return $this->hasMany(review::class);
    }
}
