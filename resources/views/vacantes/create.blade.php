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
        <div class="md-5">
            <label
                for="categoria"
                class="block text-gray-100 text-sm mb-2"
            >Categoría</label>

            <select
                name="categoria"
                id="categoria"
                class="block appearance-none w-full
                border-gray-700 text-gray-700 rounded leading-tight
                focus:outline-none focus:bg-white focus:border-gray-500 p-3
                bg-gray-100"
            >
                <option disabled selected>- Selecciona -</option>
                @foreach($categorias as $categoria)
                    <option id="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="md-5">
            <label
                for="experiencia"
                class="block text-gray-100 text-sm mb-2"
            >Experiencia</label>

            <select
                name="experiencia"
                id="experiencia"
                class="block appearance-none w-full
                border-gray-700 text-gray-700 rounded leading-tight
                focus:outline-none focus:bg-white focus:border-gray-500 p-3
                bg-gray-100"
            >
                <option disabled selected>- Selecciona -</option>
                @foreach($experiencias as $experiencia)
                    <option id="{{$experiencia->id}}">{{$experiencia->nombre}}</option>
                @endforeach
            </select>
        </div>

        <div class="md-5">
            <label
                for="ubicacion"
                class="block text-gray-100 text-sm mb-2"
            >Ubicaciones</label>

            <select
                name="ubicacion"
                id="ubicacion"
                class="block appearance-none w-full
                border border-gray-200 text-gray-700 rounded leading-tight
                focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100"
            >
                <option disabled selected>- Selecciona -</option>
                @foreach($ubicaciones as $ubicacion)
                    <option id="{{$ubicacion->id}}">{{$ubicacion->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="md-5">
            <button
                type="submit"
                class="bg-teal-500 w-full hover:bg-teal-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase"
            >Publicar Vacante</button>
        </div>
    </form>
@endsection
