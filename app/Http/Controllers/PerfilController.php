<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

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


    }
}
