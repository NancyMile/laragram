<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        //dd("Aqui se muestra el formulario");
        return view('perfil.index');
    }

    public function store(Request $request){
        //dd('Guardar cambios');
        // modificando elrequest para pasar el username a slug y ver si ya existe
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request,[
            //'username' => 'required|unique:users|min:3|max:20'
            //cuando las validaciones son mas de 4 como arriva se recomienda usar[]
            // 'username',auth()->user()->id se encarga de validar sie l usuario cambio elusername o dejo su mismo username
            // si dejo su mismo username no hay problema, solo es para que no le salga error  de que ese usuario ya existe couando es el mismo
            'username' => ['required','unique:users,username,'.auth()->user()->id,'min:3','max:20'],
        ]);

        if($request->imagen){
            //dd('si Hay Imagen',$request->file('imagen'));
            $imagen = $request->file('imagen');
            // the following may return  something  like {"imagen":"jpg"}
            //return response()->json(['imagen' => $imagen->extension()]);

            // con el uuid  vamos a  agregarle un aid a la  imagen  para hacerla unica
            $nombreImagen = Str::uuid().".".$imagen->extension();
            //crear la imagen el el servidor  import Image de los Facades
            $imagenServidor = Image::make($imagen);
            //vamos hacer  que cada imagen fit  1000X1000 pixels
            $imagenServidor->fit(1000,1000);

            $imagenPath = public_path('perfiles').'/'.$nombreImagen;
            //mueva la  ruta al servidor  una ve  precesada
            $imagenServidor->save($imagenPath);
        }

        //guardar cambios
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? ''; //nombre de imgen o hay imagen en la db or vacio
        $usuario->save();

        return  redirect()->route('posts.index',$usuario->username);
    }
}
