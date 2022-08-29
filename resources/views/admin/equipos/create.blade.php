@extends('adminlte::page')

@section('title', 'Registro DAPT - CMN')

@section('content_header')
    @include('admin.partials.cabecera')
    <h1 class="px-5">Crear nuevo equipo</h1>
@stop
<!-- Descripcion -->
@section('content')
    <div class="card">
        <div class="car-body">
            {!! Form::open(['route' => 'admin.equipos.store']) !!}
        
            <div class="form-group">
                {!! Form::label('Nombre', 'Nombre del equipo') !!}
                {!! Form::text('Nombre', null, ['onkeyup'=>'mayus(this)','class' => 'form-control', 'placeholder' =>'Ingrese el nombre del equipo']) !!}
                @error('Nombre')
                    <br>
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('tipoequipo_id', 'Grupo de equipo') !!}
                {!! form::select('tipoequipo_id', $tipoequipos, null, ['class' => 'form-control']) !!}
                {{-- <select name='tipoequipo_id' class='fom-control'>
                    @foreach ($tipoequipos as $tipoequipo)
                           <option value="{{ $tipoequipo->id }}">{{ $tipoequipo->Descripcion }}</option> 
                    @endforeach
                </select> --}}
                
                @error('tipoequipo_id')
                    <br>
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>  

            {!!Form::submit('Crear equipo', ['class' => 'btn btn-primary btn-sm'])!!}

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