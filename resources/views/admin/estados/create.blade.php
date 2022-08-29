@extends('adminlte::page')

@section('title', 'Registro DAPT - CMN')

@section('content_header')
    @include('admin.partials.cabecera')
    <h1 class="px-5">Crear nuevo estado</h1>
@stop
<!-- Descripcion -->
@section('content')
    <div class="card">
        <div class="car-body">
            {!! Form::open(['route' => 'admin.estados.store']) !!}
        
            <div class="form-group">
                {!! Form::label('Descripcion', 'Descripción') !!}
                {!! Form::text('Descripcion', null, ['onkeyup'=>'mayus(this)','class' => 'form-control', 'placeholder' =>'Ingrese el nombre del estado']) !!}
                @error('Descripcion')
                    <br>
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <p class="font-weight-bold">Valor del estado</p>
                <label class="mx-3">
                    {!! Form::radio('valor', 100,true) !!}
                    100%
                </label class="mx-3">
                <label>
                    {!! Form::radio('valor', 75) !!}
                    75%
                </label class="mx-3">
                <label class="mx-3">
                    {!! Form::radio('valor', 50) !!}
                    50%
                </label>
                <label class="mx-3">
                    {!! Form::radio('valor', 25) !!}
                    25%
                </label>
                <label class="mx-3">
                    {!! Form::radio('valor', 0) !!}
                    0%
                </label>
                @error('valor')
                    <br>
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>  

            {!!Form::submit('Crear estado', ['class' => 'btn btn-primary btn-sm'])!!}

            {!!form::close()!!}
    
        </div>
                {{-- atender --le 51 to  58 p 36 of 100  --}}
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
@stop