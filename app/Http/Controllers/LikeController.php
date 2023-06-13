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
}
