<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // auth helper que verifica que usuario esta autenticado actualmente
        dd(auth()->user());
    }
}
