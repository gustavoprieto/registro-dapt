@extends('adminlte::page')

@section('title', 'Registro DAPT - CMN')

@section('content_header')
    @include('admin.partials.cabecera')
    <h1 class="px-5">Editar equipo</h1>
@stop

@section('content')
        <div class="card">
        <div class="car-body">
            {!! Form::model($equipo, ['route' => ['admin.equipos.update', $equipo], 'method'=>'put']) !!}

             @include('admin.partials.equipo')  
            
            {!!Form::submit('Actualizar equipo', ['onkeyup'=>'mayus(this)','class' => 'btn btn-primary btn-sm'])!!}
            {!!form::close()!!}

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    function mayus(e) {
        e.value = e.value.toUpperCase();
    }
</script>
@stop