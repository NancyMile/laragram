@extends('layouts.app')

@section('titulo')
    Inicia session
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg')}}" alt="login de usuario">
        </div>
        <div class="md:w-4/12 bg-white p-6 shadow-xl">
            <form  action="{{ route('login')}}" method="POST" novalidate>
                @csrf
                @if (session('mensaje'))
                    <p class=" text-white bg-red-500 p-2 rounded-lg text-center text-sm my-2">
                        {{ session('mensaje') }}
                    </p>
                @endif
                <div class="mb-5">
                    <label for="email" class="mb-2 text-gray-500 uppercase block font-bold">
                        Email
                    </label>
                    <input type="email" id="email" name="email" placeholder="Tu Email" 
                        class=" border p-3  w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{old('email')}}"/>
                    @error('email')
                    <p class=" text-white bg-red-500 p-2 rounded-lg text-center text-sm my-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 text-gray-500 uppercase block font-bold">
                        Password
                    </label>
                    <input type="password" id="password" name="password" placeholder="Tu Password" 
                        class=" border p-3  w-full rounded-lg @error('password') border-red-500 @enderror"/>
                    @error('password')
                    <p class=" text-white bg-red-500 p-2 rounded-lg text-center text-sm my-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input type="checkbox" name="remember"> <label for="remember" class=" text-gray-500 font-sm">
                        Mantener session abierta
                    </label>
                </div>
                <input type="submit" value="Iniciar session"  class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold p-3 text-white rounded-lg w-full"/>
            </form>

        </div>
    </div>
@endsection