<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        //dd('home');

        //obtener a quienes seguimos
        // la parte following->toArray() me trae un array de la respuesta
        //con pluck() puedo pasale solo los parametros que quiero que returne
        // dd(auth()->user()->following->pluck('id')->toArray());

        $ids = (auth()->user()->following->pluck('id')->toArray());
        $posts = Post::whereIn('user_id',$ids)->paginate(20);
        //dd($posts);
        return view('home',[
            'posts' => $posts
        ]);
    }
}
