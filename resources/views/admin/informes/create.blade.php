@extends('adminlte::page')


@section('title', 'Registro DAPT - CMN')

@section('content_header')
    @include('admin.partials.cabecera')
    <h1 class="px-5">Crear nuevo informe</h1>
@stop
<!-- Descripcion -->
@section('content')

<div class="row bg-success align-items-center">
    <div class="mx-2 row">
    {!! Form::open(['route'=>'admin.informes.store']) !!}
        {!! Form::label('titulo', 'Detalle del INFORME') !!}
        {!! Form::label('fecha', 'Fecha:', ['class'=>'mx-4']) !!}

        <!-- {!! Form::date('fecha', \Carbon\Carbon::now() ,['class' => 'min=2022-05-01', 'max=\Carbon\Carbon::now()']) !!}  -->
            {{-- <div class="form-group">
                <label class="control-label" for="date">Fecha hasta</label>
               
                {{-- <input type="date" id="calendario" value="Y-m-d"  min="2022-05-01" max="2022-05-31"> --}}
                {{-- <input type="date" id="calendario" value="Y-m-d"  min="2022-05-01" max= {{$hoy}}>
            </div> --}} 

          {{-- {!! Form::date('fecha', \Carbon\Carbon::now()) !!}  --}}
          <!-- <p>Reunión: <input type="datetime-local" name="horareunion"> -->
        <input type="date" name ="fecha" id="fecha" value={{ $hoy }}  min="2022-05-01" max= {{$hoy}}>
        {!! Form::label('turno', 'turno:', ['class'=>'mx-4']) !!}
        {!! Form::select('turno', $turnos ,$turnos,['class' => 'form-control-sm']) !!}
        {!!Form::submit('Guadar Informe', ['class' => 'form-control-sm', 'btn btn-primary btn-sm', 'me-4'])!!}
        @error('turno')
            <span class="font-bold text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="px-2 py-2 mt-2 bg-success"> 
    <div class="row">
        @foreach($tipoequipos as $tipoequipo)
            <p hidden>{{ $cant=false }}</p>
            @foreach($equipos as $equipo)
                @if($equipo->tipoequipo_id == $tipoequipo->id)
                    <p hidden>{{ $cant=true }}</p>
                @endif
            @endforeach
            @if ($cant)
                <div class="px-2 py-2 mt-2">   
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    <article class="px-2 text-sm font-extrabold text-left">
                                        <label >{{ $tipoequipo->Descripcion}}</label>
                                        {!! Form::hidden('tipoequipo[]', $tipoequipo->id ,null) !!}
                                    </article>
                                </th>
                            </tr>
                        </thead>
                        @foreach($equipos as $equipo)
                            @if($equipo->tipoequipo_id == $tipoequipo->id)
                                <tbody>
                                    <tr>
                                        <td>
                                            <article class="px-2 text-sm font-bold text-left">
                                                {{$equipo->Nombre }}
                                                {!! Form::hidden('equipo[]', $equipo->id ,null) !!}
                                            </article>
                                        </td>
                                        <td>
                                            {!! Form::select('estado[]', $estados ,['class' => 'form-control-sm']) !!}
                                            <br>
                                            @error('estado[]')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </td>
                                    </tr>    
                                </tbody>
                            @endif
                        @endforeach
                    </table>
                </div>
            @endif
        @endforeach
    </div>
</div>         
<div class="form-group ">
    {!! Form::label('comentario', 'Comentario', ['class'=>'mx-4']) !!}
    {!! Form::textarea('comentario', null, ['class'=>'form-control', 'placeholder'=>'Escriba su comentario']) !!}
</div
  
{!!form::close()!!}

@stop

@section('css')

@stop

@section('js')

@stop

{{-- auth()->user()->name
auth()->user()->email --}}