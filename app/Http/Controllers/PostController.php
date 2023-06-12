<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        //ejecute el middleware de auth
        // con exept  le  estamos diciendo que restrinja el acceso para no autenticados
        // en todos  los metodos exepto los incluidos en except
        $this->middleware('auth')->except('show','index');
    }

    public function index(User $user){
        //dd($user);
        // auth helper que verifica que usuario esta autenticado actualmente
        //dd(auth()->user());

        $posts = Post::where('user_id',$user->id)->paginate(20);
        //dd($posts);
        return view('dashboard',[
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function create(){
        //dd('Creando post');
        return view('posts.create');
    }

    public function store(Request $request){
        //dd('creando publicacion');
        $this->validate($request,[
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' =>'required'
        ]);

        //crear el post
        // Post::create([
        //     'titulo' => $request->titulo,
        //     'descripcion' => $request->descripcion,
        //     'imagen' => $request->imagen,
        //     'user_id' => auth()->user()->id
        // ]);

        //otra forma de crear
        // $post = new Post;
        // $post->titulo = $request->titulo;
        // $post->descripcion = $request->descripcion;
        // $post->imagen =$request->imagen;
        // $post->user_id = auth()->user()->id;
        // $post->save();

        //esta es otraforma de crear  una vez  las relaciones estan establecidas
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('posts.index',auth()->user()->username);
    }

    public function show(User $user, Post $post){
        return view('posts.show',[
            'post' => $post,
            'user' => $user
        ]);
    }

    public function destroy(Post $post){
        //dd('Eliminando',$post->id);
        //checkquea la poicy PostPolicy detele
        $this->authorize('delete',$post);
        $post->delete();
        return redirect()->route('posts.index',auth()->user()->username);
    }
}
