@extends('layouts.app')

@section('navegacion')
   @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Crear Vacante</h1>
    <form class="max-w-lg mx-auto my-10" action="">
        <div class="mb-5">
            <label
                for="titulo"
                class="block text-gray-100 text-sm mb-2"
            >Titulo Vacante</label>

            <input
                id="titulo"
                type="text"
                class="p-3 bg-gray-100 rounded form-input w-full @error('titulo') border-red-500 border @enderror"
                name="titulo"
            >
        </div>
        {{$categorias}}
        <button
            type="submit"
            class="bg-teal-500 w-full hover:bg-teal-600 text-gray-100 p-3 focus:outlone-none focus:shadow-outlone uppercase font-bold"
        >Publicar Vacante</button>
    </form>
@endsection
