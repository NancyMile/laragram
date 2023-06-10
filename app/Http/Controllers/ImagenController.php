<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
     public function store(Request $request){
        // $input = $request->all();
        // return response()->json($input);

        /**  that may return  for  example  {"_token":"JJUpjLXdrQmlG0wuoqXYrHvMWzRMCQsYrLroVWHB","file":{}} */

        $imagen = $request->file('file');
        // the following may return  something  like {"imagen":"jpg"}
        //return response()->json(['imagen' => $imagen->extension()]);


        // con el uuid  vamos a  agregarle un aid a la  imagen  para hacerla unica
        $nombreImagen = Str::uuid().".".$imagen->extension();
        //crear la imagen el el servidor  import Image de los Facades
        $imagenServidor = Image::make($imagen);
        //vamos hacer  que cada imagen fit  1000X1000 pixels
        $imagenServidor->fit(1000,1000);

        $imagenPath = public_path('uploads').'/'.$nombreImagen;
        //mueva la  ruta al servidor  una ve  precesada
        $imagenServidor->save($imagenPath);

        return response()->json(['imagen' => $nombreImagen]);

     }
}
