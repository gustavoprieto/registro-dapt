@extends('adminlte::page')

@section('title', 'Registro DAPT - CMN')

@section('content_header')
    @include('admin.partials.cabecera')
    <h1 class="px-5">Editar rol</h1>
@stop

@section('content')
        <div class="card">
        <div class="car-body">
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method'=>'put']) !!}

             @include('admin.partials.roles')  
            @if($role->name <>"ADMINISTRADOR")
                {!!Form::submit('Actualizar rol', ['onkeyup'=>'mayus(this)','class' => 'btn btn-primary btn-sm'])!!}
                {!!form::close()!!}
            @endif
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