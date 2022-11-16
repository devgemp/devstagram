@extends('layouts.app')

@section('titulo')
    Crea una nueva publicación
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:items-center">
        <div class="md:w-6/12 lg:w-4/12 px-10">
            imagen aqui
        </div>

        <div class="md:w-6/12 lg:w-4/12 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('register.store') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Título
                    </label>
                    <input
                        id="titulo"
                        name="titulo"
                        type="text"
                        placeholder="Título de la publicación"
                        class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror"
                        value="{{ old('titulo') }}"
                    >

                    @error('titulo')
                        <p class="bg-red-500 text-white text-center my-2 rounded-lg text-sm p-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción
                    </label>
                    <textarea
                        id="descripcion"
                        name="descripcion"
                        type="text"
                        placeholder="Descripción de la publicación"
                        class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror"
                    >{{ old('titulo') }}</textarea>

                    @error('descripcion')
                        <p class="bg-red-500 text-white text-center my-2 rounded-lg text-sm p-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <input
                    type="submit"
                    value="Crear publicación"
                    class="bg-sky-600 hover:bg-sky-800 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                >
            </form>
        </div>
    </div>
@endsection
