@extends('layouts.app')

@section('titulo')
    Inicia Sesión en DevStragram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 lg:w-4/12 mb-3 md:mb-0 p-5 md:p-0">
            <img
                src="{{ asset('img/login.jpg') }}"
                alt="login de usuarios"
                class="rounded-lg shadow-xl shadow-violet-300"
            >
        </div>

        <div class="md:w-6/12 lg:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('login') }}" method="POST" novalidate>
                @csrf

                @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ session('mensaje') }}
                    </p>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Tu Email de registro"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}"
                    >

                    @error('email')
                        <p class="bg-red-500 text-white text-center my-2 rounded-lg text-sm p-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Password registro"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                    >

                    @error('password')
                        <p class="bg-red-500 text-white text-center my-2 rounded-lg text-sm p-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input class="cursor-pointer" type="checkbox" name="remember" id="remember"> <label for="remember" class="text-gray-500 font-medium cursor-pointer">Mantener mi sesión abierta</label>
                </div>

                <input
                    type="submit"
                    value="Iniciar Sesión"
                    class="bg-sky-600 hover:bg-sky-800 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                >
            </form>
        </div>
    </div>
@endsection
