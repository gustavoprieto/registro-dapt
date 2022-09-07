@extends('adminlte::page')

@section('title', 'Registro DAPT - CMN')

@section('content_header')
     
@include('informe.partials.cabecera')

@stop

@section('content')
<x-app-layout>
    <div class="mt-4">
<a class="m-3 mr-5 btn btn-secondary btn-sm" href="{{route('admin.informes.buscar')}}">Buscar informe</a>
<a class="m-3 mr-5 btn btn-warning btn-sm" href="{{route('admin.informes.create')}}">Crear informe</a>
<div class="card">
    <div class="card-body">
        <table  class="table table-striped">
            <thead>
                <tr>
                    <th>Nro.</th>
                    <th>Fecha</th>
                    <th>Turno</th>
                    <th>Pronosticador</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($informes as $informe)
                <tr>
                    <td>{{ $informe->numero }}</td>
                    <td>{{ $informe->Fecha->format('d-m-Y') }}</td>
                    <td>{{$informe->Turno->Descripcion}}</td>
                    <td>{{$informe->User->name}} </td>
                    <td width='10px'> 
                        <a class="btn btn-primary btn-sm"href="{{route('informe.show', $informe)}}">Mostrar</a> </td>         
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="text-base">
        {{$informes->links()}}
    </div>
</div>    
</x-app-layout>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{ asset('js/app.js') }}"></script>

@if(session('crear') == 'si')
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'El Informe ha sido creado',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
@endif

@if(session('eliminar') == 'ok')
    <script>
        Swal.fire(
            '¡Eliminado!',
            'El informe ha sido eliminado .',
            'success'
        )   
    </script>
@endif
@stop