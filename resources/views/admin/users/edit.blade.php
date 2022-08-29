@extends('adminlte::page')

@section('title', 'Registro DAPT - CMN')

@section('content_header')
@include('admin.partials.cabecera')
<h1 class="px-5">Editar datos del usuario</h1>
@stop

@section('content')
<div class="card">
    <div class="car-body">
        {!! Form::model($user,['route' => ['admin.users.update', $user], 'method'=>'put']) !!}
        
        <div class="form-group">
            {!! Form::label('name', 'Nombre del usuario') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' =>'Ingrese el nombre del usuario']) !!}
            @error('name')
            <br>
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('email', 'email') !!}
            {!! Form::text('email', null, ['onkeyup'=>'minus(this)','class' => 'form-control', 'placeholder' =>'Ingrese el email']) !!}
            @error('email')
            <br>
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('password', 'contraseña') !!}
            {!! Form::text('password', null, ['type=password', 'class' => 'form-control', 'placeholder' =>'Ingrese la contraseña']) !!}
            @error('password')
            <br>
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('confirm_password', 'reingrese contraseña') !!}
            {!! Form::text('password_confirmation', null, ['type=password', 'class' => 'form-control', 'placeholder' =>'Reinngrese la contraseña']) !!}
            @error('password_confirmation')
            <br>
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        {!! Form::label('Lista de roles', 'Lista de roles') !!}
        <div class="form-group">     
            @foreach($roles as $role)
            <label class="mr-2">
                {!!Form::checkbox('roles[]', $role->id, $user->role,( ['class'=>'mr-2'])) !!}
                {{ $role->name }}
            </label>
            @endforeach       
            
        </div>
        
        {!!Form::submit('Actualizar datos del usuario', ['class' => 'btn btn-primary btn-sm'])!!}
        
        {!!form::close()!!}
        
    </div>
    {{-- atender --le 51 to  58 p 36 of 100  --}}
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
<script>
    function minus(e) {
        e.value = e.value.toLowerCase();
    }
</script>
@stop