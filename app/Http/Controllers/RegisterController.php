<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index () {
        return view('auth.register');
    }

    public function store(Request $request){
        //dd($request);
        //para ver un parametro especifico 
        //dd($request->get('username'));

        // modificando elrequest para pasar el username a slug y ver si ya existe
        $request->request->add(['username'=>Str::slug($request->username)]);


        //validacion
        $this->validate($request,[
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6',
        ]);

        //dd('creando usuario');
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' =>  Hash::make($request->password),
        ]);

        // autenticar user para direccionarlo a su post despues de creado
            // auth()->attempt([
            //     'email' => $request->email,
            //     'password' => $request->password
            // ]);

        //otra  forma  de authenticar
        auth()->attempt($request->only('email','password'));



        //redireccionar
        return redirect()->route('posts.index',$request->username);
    } 
}
