@extends('adminlte::page')


@section('title', 'Registro DAPT - CMN')

@section('content_header')
    @include('admin.partials.cabecera')
    <h1 class="px-5">Actualizar informe</h1>
@stop
<!-- Descripcion -->
@section('content')

<div class="row bg-success alig-items-center">
    <div class="mx-2 row">
    {!! Form::open(['route'=>'admin.informes.store']) !!}
        {!! Form::label('titulo', 'Detalle del INFORME') !!}
        {!! Form::label('fecha', 'Fecha:', ['class'=>'mx-4']) !!}
        {{-- {!! Form::date('fecha', \Carbon\Carbon::now() ,['class' => 'form-control-sm']) !!}  --}}
        {{ $informe->Fecha }}
        {!! Form::label('turno', 'turno:', ['class'=>'mx-4']) !!}
        {{-- {!! Form::select('turno', $turnos ,$turnos,['class' => 'form-control-sm']) !!} --}}
        {{ $informe->turno->Descripcion }}
        {!!Form::submit('Actuzalizar Informe', ['class' => 'form-control-sm', 'btn btn-primary btn-sm', 'me-4'])!!}
    </div>
</div>
<div class="px-2 py-2 mt-2 bg-success"> 
    <div class="row">
<p hidden>{{ $equipo=0 }}</p>
@foreach($informeables as $informeable)
@if($informeable->tipoequipo_id <> $equipo)
<table >
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
                <article class=" font-serif">
                    <span class="pl-1 font-bolt">
                        {{ $informeable->equipo->Nombre }}...
                    </span>
                </article> 
            </td>
            <td>
                
                {{-- {!! Form::select('estado[]', $estados, $informeable->estado->Descripcion) !!}  --}}
                
                <select name='estado[]' class=" text-base"  height="50px">
                    <option value="{{ $informeable->estado_id }}">{{ $informeable->estado->Descripcion }}</option>
                    @foreach($estados as $estado)
                    <option value="{{ $estado->id }}">{{ $estado->Descripcion }}</option>
                    @endforeach
                </select>     
            </td>
        </tr>                                        
    </tbody>
    <br>
    @endforeach
</table>        
</div>        
<div class="form-group ">
    {!! Form::label('comentario', 'Comentario', ['class'=>'mx-4']) !!}
    {!! Form::textarea('comentario',  $informe->comentario , ['class'=>'form-control']) !!}
</div>
  
{!!form::close()!!}

@stop

@section('css')

@stop

@section('js')

@stop

{{-- auth()->user()->name
auth()->user()->email --}}