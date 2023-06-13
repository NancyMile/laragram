<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(User $user){
        // el usuario al que se va a seguir
        //dd($user->username);

         /** Dado a que en este cso  amnos usuarios  pertenecen a la misma tabla no  usaremos create
          * tenemos  que usar attach
          */
        // esta va a agregarle al usuario que se va a seguir quien lo esta siguiendo
        // osea la persona autenticada
          $user->followers()->attach(auth()->user()->id);
          return back();
    }
}
