@extends('layouts.app')

@section('titulo')
    Registrate en nuestra web
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/registrar.jpg')}}" alt="Registrar">
        </div>
        <div class="md:w-4/12 bg-white p-6 shadow-xl">
            <form action="{{ route('register')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 text-gray-500 uppercase block font-bold">
                        Nombre
                    </label>
                    <input type="text" id="name" name="name" placeholder="Tu Nombre" 
                        class=" border p-3  w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{old('name')}}" />
                    @error('name')
                    <p class="bg-red-500 text-white rounded-lg my-2 text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 text-gray-500 uppercase block font-bold">
                        Username
                    </label>
                    <input type="text" id="username" name="username" placeholder="Tu Username" class=" border p-3  w-full rounded-lg"/>
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 text-gray-500 uppercase block font-bold">
                        Email
                    </label>
                    <input type="email" id="email" name="email" placeholder="Tu Email" class=" border p-3  w-full rounded-lg"/>
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 text-gray-500 uppercase block font-bold">
                        Password
                    </label>
                    <input type="password" id="password" name="password" placeholder="Tu Password" class=" border p-3  w-full rounded-lg"/>
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 text-gray-500 uppercase block font-bold">
                        Repetir Password
                    </label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repite el password" class=" border p-3  w-full rounded-lg"/>
                </div>
                <input type="submit" value="Crear Cuenta"  class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold p-3 text-white rounded-lg w-full"/>
            </form>

        </div>
    </div>
@endsection