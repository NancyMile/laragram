<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        //ejecute  el  middleware de auth
        $this->middleware('auth');
    }

    public function index(User $user){
        //dd($user);
        // auth helper que verifica que usuario esta autenticado actualmente
        //dd(auth()->user());

        return view('dashboard',[
            'user' => $user
        ]);
    }

    public function create(){
        //dd('Creando post');
        return view('posts.create');
    }
}
