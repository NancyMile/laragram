<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        //dd('autenticando..');
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //$request->remember para mantener la session activa
        //dd($request->remember);

        // chequear la authenticacion
        if(!auth()->attempt($request->only('email','password'), $request->remember)){
            //retorno un mensaje de error
            return back()->with('mensaje','credenciales incorrectas');
        }

        return redirect()->route('posts.index');
    }
}
