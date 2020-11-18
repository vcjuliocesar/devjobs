@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/basic.min.css" integrity="sha512-MeagJSJBgWB9n+Sggsr/vKMRFJWs+OUphiDV7TJiYu+TNQD9RtVJaPDYP8hA/PAjwRnkdvU+NsTncYTKlltgiw==" crossorigin="anonymous" />
@endsection

@section('navegacion')
   @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Crear Vacante</h1>
    <form class="max-w-lg mx-auto my-10" action="">
        <div class="mb-5">
            <label
                for="titulo"
                class="block text-gray-700 text-sm mb-2"
            >Titulo Vacante</label>

            <input
                id="titulo"
                type="text"
                class="p-3 bg-gray-100 rounded form-input w-full @error('titulo') border-red-500 border @enderror"
                name="titulo"
            >
        </div>
        <div class="mb-5">
            <label
                for="categoria"
                class="block text-gray-700 text-sm mb-2"
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
        <div class="mb-5">
            <label
                for="experiencia"
                class="block text-gray-700 text-sm mb-2"
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

        <div class="mb-5">
            <label
                for="ubicacion"
                class="block text-gray-700 text-sm mb-2"
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

        <div class="mb-5">
            <label
                for="salario"
                class="block text-gray-700 text-sm mb-2"
            >Salarios</label>

            <select
                name="salario"
                id="salario"
                class="block appearance-none w-full
                border border-gray-200 text-gray-700 rounded leading-tight
                focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100"
            >
                <option disabled selected>- Selecciona -</option>
                @foreach($salarios as $salario)
                    <option id="{{$salario->id}}">{{$salario->nombre}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label
                for="descripcion"
                class="block text-gray-700 text-sm mb-2"
            >Descripción del Puesto: </label>

            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700"></div>
            <input type="hidden" name="descripcion" id="descripcion">
        </div>

        <div class="mb-5">
            <label
                for="descripcion"
                class="block text-gray-700 text-sm mb-2"
            >Imagen Vacante: </label>

            <div id="dropzoneDevJobs" class="dropzone rounded bg-gray-100"></div>
        </div>

            <button
                type="submit"
                class="bg-teal-500 w-full hover:bg-teal-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase"
            >Publicar Vacante</button>
    </form>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous"></script>
    <script>
        Dropzone.autoDiscover = false;
        document.addEventListener('DOMContentLoaded',() => {
            // Medium Editor
            const editor =new MediumEditor('.editable',{
                toolbar:{
                    buttons:['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull',  'orderedlist', 'unorderedlist', 'h2', 'h3'],
                    static:true,
                    sticky:true
                },
                placeholder:{
                    text:'Informacion de la vacante'
                }
            });

            // Agrega al input hidden lo que el usuario escribe en medium editor
            editor.subscribe('editableInput', function(eventObj, editable) {
                const contenido = editor.getContent();
                document.querySelector('#descripcion').value = contenido;
            });

            //Dropzone
            const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs',{
                url:"/vacantes/imagen"
            });
        });

    </script>
@endsection
