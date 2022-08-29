@extends('adminlte::page')

@section('title', 'Registro DAPT - CMN')

@section('content_header')
    @include('admin.partials.cabecera')
    <h1 class="px-5">Crear nuevo grupo de equipos</h1>
@stop
<!-- Descripcion -->
@section('content')
    <div class="card">
        <div class="car-body">
            {!! Form::open(['route' => 'admin.tipoequipos.store'], ['class' => 'btn btn-primary btn-sm', 'formulario-crear']) !!}

                <div class="form-group">
                    {!! Form::label('Descripcion', 'Descripción') !!}
                    {!! Form::text('Descripcion', null, ['onkeyup'=>'mayus(this)','class' => 'form-control', 'placeholder' =>'Ingrese el nombre del tipo de equipo']) !!}
                    @error('Descripcion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {!!Form::submit('Crear grupo de equipos' )!!}

            {!!form::close(['class'=> 'formulario-crear'])!!}
        </div>
    </div>
     @yield('js')
@stop

@section('css')
    
@stop

@section('js')
<script>
    function mayus(e) {
        e.value = e.value.toUpperCase();
    }
</script>




@stop