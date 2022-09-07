@extends('adminlte::page')


@section('title', 'Registro DAPT - CMN')

@section('content_header')
    @include('admin.partials.cabecera')
    <h1 class="px-5">Actualizar informe</h1>
@stop
<!-- Descripcion -->
@section('content')

<div class="row bg-success align-items-center">
    <div class="mx-2 row align-items-center">
    <!-- {!! Form::open(['route'=>'admin.informes.index']) !!} -->
    {!! Form::model($informe, ['route' => ['admin.informes.update', $informe], 'method'=>'put']) !!}
        <div class="form-group alig-items-center">    
        {!! Form::label('titulo', 'Detalle del INFORME', ['class'=>'mx-4']) !!}
        {{ $informe->numero }}
        {!! Form::label('fecha', 'Fecha:', ['class'=>'mx-4']) !!}
        {{-- {!! Form::date('fecha', $informe->Fecha ,['class' => 'hidden']) !!}  --}}
        {{-- <span class="text-base"> {{$informe->Fecha->format('d-m-Y')}}</span> --}}
        {{ $informe->Fecha->format('d-m-Y') }}
        {!! Form::label('turno', 'turno:', ['class'=>'mx-4']) !!}
        {{-- {!! Form::select('turno', $turnos ,$turnos,['class' => 'form-control-sm']) !!} --}}
        {{ $informe->turno->Descripcion }}
        {!!Form::submit('Actualizar Informe', ['class' =>"bg-blue", "rounded-full", "px-2", "py-2","align-items-center" ])!!}
        <!-- <a class="btn btn-secoundary btn-sm"href="{{route('informe.index')}}">Cancelar</a> </td>  -->
        </div>
    </div>
</div>
<div class="px-2 py-2 mt-2 bg-success"> 
    <div class="col-auto row">
<p hidden>{{ $equipo=0 }}</p>
@foreach($informeables as $informeable)
@if($informeable->tipoequipo_id <> $equipo)
<table >
    <thead>
        <tr>
            <th colspan="2">
                <article class="px-2 text-base font-bold text-left text-indigo-700">
                    {{$informeable->tipoequipo->Descripcion}}
                    <p hidden>{{  $equipo= $informeable->tipoequipo_id}}</p>
                </article>
            </th>
        </tr>
    </thead>
    @endif
    <tbody>
        <tr>
            <td height='5px' >
                <article class="font-serif text-sm">
                    <span class="pl-1 font-bolt">
                        {{ $informeable->equipo->Nombre }}
                    </span>
                </article> 
            </td>
            <td >
                
                {{-- {!! Form::select('estado[]', $estados, $informeable->estado->Descripcion) !!}  --}}
                
                <select name='estado[]' class="text-sm " height="30px"  >
                    <option value="{{ $informeable->estado_id }}">{{ $informeable->estado->Descripcion }}</option>
                    @foreach($estados as $estado)
                        <option value="{{ $estado->id }}">{{ $estado->Descripcion }}</option>
                    @endforeach
                </select>     
            </td>
            <td width="20px">
            </td>
        </tr>
        <br>
                                        
    </tbody>
    <br>
    @endforeach
</table>        
</div>        
<div class="form-group">
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