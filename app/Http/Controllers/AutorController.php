<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\autorService;

class AutorController extends Controller
{
    private autorService $autorService;
    public function __construct(autorService $autorService){
        $this->autorService=$autorService;
    }

    public function get(){
        $autor=$this->autorService->get();
        return response()->json($autor);
    }

}
