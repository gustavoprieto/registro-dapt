@extends('adminlte::page')

@section('title', 'Registro DAPT - CMN')

@section('content_header')
@include('informe.partials.cabecera')
<h3>Editar  el  informe</h3>
<table>
    <tr>
        <td>
            
        </td>

        <td class ="mx-8">
            <a class="btn btn-primary btn-sm" href="{{route('admin.informes.edit', $informe)}}">Actualizar datos del informe</a>
        </td>
    </tr>
</table>
@stop

@section('content')




<x-app-layout>
    
    
    
    <div class="mx-2 px-2 grid grid-cols-1 gap-1 bg-orange-300 md:grid-cols-2
    lg:grid-cols-4 py-2">
    <article> <span class="text-base font-bold text-gray-600">Informe Nro.:</span>
        <span class="text-base">{{$informe->id}}</span>
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
<div class="px-2 py-3 mx-2 grid grid-cols-1 gap-2  mt-2 mb-4 bg-orange-200 md:grid-cols-2
lg:grid-cols-3">
<p hidden>{{ $equipo=0 }}</p>
@foreach($informeables as $informeable)
@if($informeable->tipoequipo_id <> $equipo)
<table>
    <thead>
        <tr>
            <th colspan="2">
                <article class="px-2 text-sm font-bold text-indigo-700 text-left">
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
                <article class="text-xs font-serif">
                    <span class="pl-1 font-bolt">
                        {{ $informeable->equipo->Nombre }}...
                    </span>
                </article> 
            </td>
            <td>
                
                {{-- {!! Form::select('estado[]', $estados, $informeable->estado->Descripcion) !!}  --}}
                
                <select name='estado[]' class="form-control">
                    <option value="{{ $informeable->estado_id }}">{{ $informeable->estado->Descripcion }}</option>
                    @foreach($estados as $estado)
                    <option value="{{ $estado->id }}">{{ $estado->Descripcion }}</option>
                    @endforeach
                </select>
                
            </td>
        </tr>                                        
    </tbody>
    @endforeach
</table>        
</div>


{{-- <div class="form-group ">
   <label class="">Comentario</label>
    <textarea >{{ $informe->comentario }}</textarea>
</div> --}}
<div class="form-outline mb-4">
    <label class="form-label" for="textAreaExample6">Comentario</label>
    <textarea class="form-control" id="textAreaExample6" rows="3">{{ $informe->comentario}}</textarea>
  
</div>

</x-app-layout>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop