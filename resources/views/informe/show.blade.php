@extends('adminlte::page')

@section('title', 'Registro DAPT - CMN')

@section('content_header')
    @include('informe.partials.cabecera')

@stop

@section('content')

<x-app-layout>
<div class="mt-6">    
    <table>
        <tr>
             @if(($informe->usuario_id== auth()->user()->id) or (auth()->user()->roles()->first()->name=="ADMINISTRADOR" ) or (auth()->user()->roles()->first()->name=="SUPERVISOR" ))
                <td class ="mx-4">
                    <a class="px-2 py-2 rounded-full bg-green" href="{{route('admin.informes.edit', $informe)}}">Editar Datos del informe</a>
                </td>            
            
            <td class='mx-4'>
                <form action="{{route('admin.informes.destroy', $informe)}}" class="formulario-eliminar" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="px-1 py-1 rounded-full bg-red">Eliminar Informe</button>
                </form>
            </td>
            <td class ="mx-4">
                {{-- <a class="px-2 py-2 rounded-full bg-blue" href="{{route('admin.pdfs.edit', $informe)}}">imprimir en PDF</a> --}}
                <a class="px-2 py-2 rounded-full bg-blue" href="{{route('informe.imprimir', $informe)}}">imprimir en PDF</a>
            </td>
            @endif
        </tr>
    </table>
</div>  

    <div class="grid grid-cols-1 gap-1 px-2 py-2 mx-2 bg-orange-300 md:grid-cols-2 lg:grid-cols-4">
        <article> <span class="text-base font-bold text-gray-600">Informe Nro.:</span>
            <span class="text-base">{{$informe->numero}}</span>
        </article>
        <article><span class="text-base font-bold text-gray-600">Fecha:</span>
            {{-- <span class="text-base"> {{$informe->Fecha->format('%A %d %B %Y')}}</span> --}}
            <span class="text-base"> {{$informe->Fecha->format('d-m-Y')}}</span>
        </article> 
        <article><span class="text-base font-bold text-gray-600">Turno:</span>
            <span class="text-base">{{$informe->Turno->Descripcion}}</span>
        </article>
        <article><span class="text-base font-bold text-gray-600">Pronosticador:</span>
            <span class="text-base"> {{$informe->user->name}}</span>
        </article> 
    </div>
    <div class="grid grid-cols-1 gap-2 px-2 py-3 mx-2 mt-2 mb-4 bg-orange-200 md:grid-cols-2 lg:grid-cols-3">
        <p hidden>{{ $equipo=0 }}</p>
        @foreach($informeables as $informeable)
            @if($informeable->tipoequipo_id <> $equipo)
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">
                                <article class="px-2 text-sm font-bold text-left text-indigo-700">
                                    {{$informeable->tipoequipo->Descripcion}}
                                    <p hidden>{{  $equipo= $informeable->tipoequipo_id}}</p>
                                </article>
                            </th>
                        </tr>
                    </thead>
            @endif
                    <tbody>
                        <tr>
                            <td>
                                <article class="font-serif text-xs">
                                    <span class="pl-1 font-bolt">
                                        {{ $informeable->equipo->Nombre }}
                                    </span>
                                </article> 
                            </td>
                            <td>
                                @if($informeable->estado->valor == 100)
                                    <span class="px-1 font-bold bg-white border-solid rounded-full text-green">
                                        {{ $informeable->estado->Descripcion}}</span>  
                                @else
                                        @if($informeable->estado->valor == 0)
                                            <span class="px-1 py-1 font-bold text-red-600 bg-white border-solid rounded-full border-zinc-600">
                                                {{ $informeable->estado->Descripcion}}</span>   
                                        @else
                                            <span class="px-1 py-1 font-bold text-gray-600 bg-white border-solid rounded-full border-zinc-600">
                                                {{ $informeable->estado->Descripcion}}</span>  
                                        @endif
                                @endif
                            </td>
                        </tr>                                        
                    </tbody>
        @endforeach
                </table>        
    </div>
   
    <div class='px-4 py-2 mx-2 my-2 bg-green-300'>
        @if($informe->comentario <> "")
            <h3 class="font-bold text-blue-900 ">Comentario</h3>
            {{-- <p>{{$informe->comentario}}   o sea {{$informe->Fecha->diffForHumans()}}</p>  --}}
            <p>{{$informe->comentario}} </p>
        @else
            <p class="font-bold text-blue-900">Sin comentario</p>  
        @endif
       
    </div>     
</x-app-layout>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    <script src="{{ asset('js/app.js') }}"></script>

    @if(session('actualiza') == 'si')
                <script>
                    Swal.fire({
                    title: 'El equipo se actualizó con éxito',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                    })
                </script>
            @endif

        <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Estás seguro?',
            text: "Este Informe se eliminará definitivamente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: '¡Sí, eliminar!'
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
                // Swal.fire(
                // 'Deleted!',
                // 'Your file has been deleted.',
                // 'success'
                // )
            }
            })
        });
    </script>   

            @if(session('actualiza') == 'no')
            <script>   
                    Swal.fire({
                    title: 'Usted no está autorizado para modificar este informe',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                    })
                </script>
            @endif

                {{-- </script> --}}


@stop