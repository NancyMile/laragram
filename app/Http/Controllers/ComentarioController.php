<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public  function store(Request $request, User $user, Post $post){
        //dd('comentndo...');
        //validar
        $this->validate($request,[
            'comentario' => 'required|max:255'
        ]);
        
        //almacenar
        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario 
        ]);
        // se devuelve a la paguina de donde hio el comentario e imprimir mensaje
        return back()->with('mensaje', 'Comentario guardado');
    }
}
