@extends('adminlte::page')

@section('title', 'Registro DAPT - CMN')

@section('content_header')
    @include('admin.partials.cabecera')
    <h1 class="px-5">Editar turno</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success" width = '200px'>
            <strong>{{ session('info') }}</strong>
        </div>
    @endif()
        <div class="card">
        <div class="car-body">
            {!! Form::model($turno, ['route' => ['admin.turnos.update', $turno], 'method'=>'put']) !!}
                <div class="form-group">
                    {!! Form::label('Descripcion', 'Descripción') !!}
                    {!! Form::text('Descripcion', null, ['onkeyup'=>'mayus(this)','class' => 'form-control', 'placeholder' =>'Ingrese el nombre del turno']) !!}
                    @error('Descripcion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {!!Form::submit('Actualizar turno', ['class' => 'btn btn-primary btn-sm'])!!}
            {!!form::close()!!}

    </div>
@stop

@section('css')
    
@stop

@section('js')
<script>
    function mayus(e) {
        e.value = e.value.toUpperCase();
    }
</script>
            
<script>
    function mayus(e) {
        e.value = e.value.toUpperCase();
    }
</script>

         
        
@stop