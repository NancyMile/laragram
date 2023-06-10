@extends('layouts.app')
@section('titulo')
    Crea  publicacion
@endsection
@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            imagen aqui
        </div>
        <div class="md:w-4/12 bg-white p-10 shadow-xl mt-10 md:mt-0">
            <form action="{{ route('register')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 text-gray-500 uppercase block font-bold">
                        Titulo
                    </label>
                    <input type="text" id="titulo" name="titulo" placeholder="Titulo" 
                        class=" border p-3  w-full rounded-lg @error('titulo') border-red-500 @enderror"
                        value="{{old('titulo')}}" />
                    @error('titulo')
                    <p class="bg-red-500 text-white rounded-lg my-2 text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="descripcion" class="mb-2 text-gray-500 uppercase block font-bold">
                        Descripcion
                    </label>
                    <textarea id="descripcion" name="descripcion" placeholder="descripcion de la publicacion" 
                        class=" border p-3  w-full rounded-lg @error('descripcion') border-red-500 @enderror" >
                        {{old('descripcion')}}
                    </textarea>
                    @error('descripcion')
                    <p class="bg-red-500 text-white rounded-lg my-2 text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <input type="submit" value="Publicar"  class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold p-3 text-white rounded-lg w-full"/>
            </form>
        </div>
    </div>
@endsection