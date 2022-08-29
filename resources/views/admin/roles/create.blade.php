@extends('adminlte::page')

@section('title', 'Registro DAPT - CMN')

@section('content_header')
    @include('admin.partials.cabecera')
    <h1 class="px-5">Crear nuevo rol</h1>
@stop
<!-- Descripcion -->
@section('content')
    <div class="card">
        <div class="car-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
            
               <div class="form-group">
       
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['onkeyup'=>'mayus(this)','class' => 'form-control', 'placeholder' =>'Ingrese el nombre del rol']) !!}
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror

    </div>
    <div class="form-group">
        {!! Form::label('permissions', 'Permisos para este rol:', ['font color'=>'blue']) !!}
        <br/>
        @foreach($permissions as $permission)
            <div>
                <label>

                        {!! Form::checkbox('permissions[]', $permission->id, false, ['class' =>'mr-1'] )!!}
                        {{$permission->descripcion}}
                        
                </label>
            </div>
        @endforeach

    </div>

            {!!Form::submit('Crear rol', ['class' => 'btn btn-primary btn-sm'])!!}

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