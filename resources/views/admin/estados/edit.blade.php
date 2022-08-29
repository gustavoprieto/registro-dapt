@extends('adminlte::page')

@section('title', 'Registro DAPT - CMN')

@section('content_header')
    @include('admin.partials.cabecera')
    <h1 class="px-5">Editar estado de los equipos</h1>
@stop

@section('content')
        <div class="card">
            <div class="car-body">
                {!! Form::model($estado, ['route' => ['admin.estados.update', $estado], 'method'=>'put']) !!}
                
                @include('admin.partials.estado')  

                {!!Form::submit('Actualizar turno', ['class' => 'btn btn-primary btn-sm'])!!}
                {!!form::close()!!}
            </div>
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