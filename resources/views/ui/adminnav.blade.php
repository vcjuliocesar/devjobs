<a href="{{route('vacantes.index')}}" class="text-white tex-sm uppercase font-bold p-3 {{Request::is('vacantes') ? 'bg-teal-500':''}}">Ver vacantes</a>
<a href="{{route('vacantes.create')}}" class="text-white tex-sm uppercase font-bold p-3 {{Request::is('vacantes/create') ? 'bg-teal-500':''}}">Nueva vacante</a>
