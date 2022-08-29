@extends('adminlte::page')

@section('title', 'Registro DAPT - CMN')

@section('content_header')
    @include('admin.partials.cabecera')
    <h1 class="px-5">Crear nuevo turno</h1>
@stop
<!-- Descripcion -->
@section('content')
    <div class="card">
        <div class="car-body">
            {!! Form::open(['route' => 'admin.turnos.store']) !!}

                <div class="form-group">
                    {!! Form::label('Descripcion', 'Descripción') !!}
                    {!! Form::text('Descripcion', null, ['onkeyup'=>'mayus(this)','class' => 'form-control', 'placeholder' =>'Ingrese el nombre del turno']) !!}
                    @error('Descripcion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {!!Form::submit('Crear turno', ['class' => 'btn btn-primary btn-sm'])!!}

            {!!form::close()!!}
        </div>
    </div>
@stop

@section('css')
    <!-- //<link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')

<script>
    function mayus(e) {
        e.value = e.value.toUpperCase();
    }
</script>



@stop