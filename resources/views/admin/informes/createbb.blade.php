@extends('adminlte::page')

@section('title', 'Registro DAPT - CMN')

@section('content_header')
    @include('admin.partials.cabecera')
    <h1 class="px-5">Crear nuevo informe</h1>
@stop
<!-- Descripcion -->
@section('content')
  
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.informes.store']) !!}
                {{-- <div class="mx-2 px-2 grid grid-cols-1 gap-1 bg-orange-300 md:grid-cols-2
                    lg:grid-cols-4 py-2"> --}}
                    <div class="form-group">
                        {!! Form::label('titulo', 'Detalle del INFORME') !!}
                        {!! Form::label('fecha', 'Fecha:', ['class'=>'mx-4']) !!}
                        {!! Form::date('fecha', \Carbon\Carbon::now() ,['class' => 'form-control-sm']) !!} 
                        {!! Form::label('turno', 'turno:', ['class'=>'mx-4']) !!}
                        {!! Form::select('turno', $turnos ,null,['class' => 'form-control-sm', 'placeholder'=>'elegir turno']) !!} 
                        {!!Form::submit('Guadar Informe', ['class' => 'form-control-sm', 'btn btn-primary btn-sm', 'mx-4'])!!}
                    </div>                   
              

                
                    
                <div class="row row-cols-1 mx-2 row-cols-md-2 row-cols-lg-3 g-3">
                    @foreach($tipoequipos as $tipoequipo)
                        <div class="card flex-col">
                        {{-- style="width: 20rem;"> --}}
                            <div class="card-body px-1 py-2 bg-green">                
                                <table >
                                    <thead>
                                        <tr>
                                            <th colspan="3">
                                                {!! Form::text('tipoequipo[]', $tipoequipo->Descripcion, ['class'=>'form-control-sm','flex']) !!}
                                            </th>
                                        </tr>
                                    </thead>
                                    @foreach($equipos as $equipo)
                                        @if($equipo->tipoequipo_id == $tipoequipo->id)
                                            <tbody>
                                                <tr>
                                                    <td colspan="2">
                                                        {!! Form::text('equipo[]->id', $equipo->Nombre, ['class'=>'form-control-sm']) !!}
                                                    </td>
                                                    <td>
                                                        {!! Form::select('estado[]', $estados ,null,['class' => 'form-control-sm', 'placeholder'=>'elegir estado', 'text-sm']) !!} 
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="form-group ">
                    {!! Form::label('comentario', 'Comentario', ['class'=>'mx-4']) !!}
                    {!! Form::textarea('comentario', null, ['class'=>'form-control', 'placeholder'=>'Escriba su comentario']) !!}
                </div
 
            {!!form::close()!!}
        </div>
    </div> 
@stop

@section('css')
    
@stop

@section('js')

@stop

{{-- auth()->user()->name
auth()->user()->email --}}