<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Post $post){
        //dd(' dondo likes');
        // el siquiente me trae el sque esta logueado dando likes
        //dd($request->user()->id);

        $post->likes()->create(
            [
                'user_id' => $request->user()->id,
            ]
        );

        return back();
    }

    public function destroy(Request $request, Post $post){
        //dd('Eliminando like');
        //filtra los likes del usuario where el post es el que viene y lo eliminamos
        $request->user()->likes()->where('post_id',$post->id)->delete();
        return back();
    }
}
