<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuario;

class usuarioController extends Controller
{
    public function get(){
        return usuario::all();
    }
}
