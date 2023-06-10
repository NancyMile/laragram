<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagenController extends Controller
{
     public function store(Request $request){
        // $input = $request->all();
        // return response()->json($input);

        /**  that may return  for  example  {"_token":"JJUpjLXdrQmlG0wuoqXYrHvMWzRMCQsYrLroVWHB","file":{}} */

        $imagen = $request->file('file');
        // the following may return  something  like {"imagen":"jpg"}
        return response()->json(['imagen' => $imagen->extension()]);


     }
}
