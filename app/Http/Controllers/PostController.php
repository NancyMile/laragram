<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        //ejecute  el  middleware de auth
        $this->middleware('auth');
    }

    public function index(){
        // auth helper que verifica que usuario esta autenticado actualmente
        //dd(auth()->user());

        return view('dashboard');
    }
}