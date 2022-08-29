@extends('adminlte::page')

@section('title', 'Registro DAPT - CMN')

@section('content_header')
    @include('admin.partials.cabecera')
    <h1 class="px-5">Buscar informes</h1>
@stop
<!-- Descripcion -->
@section('content')
    <div class="card">
        <div class="car-body">
          {{-- {!! Form::open(['route' => 'admin.informes.indexbusca']) !!}  --}}
         {!! Form::open(['route' => ['admin.informes.indexbusca']]) !!}
            <div class="form-group">
                <label class="control-label" for="date">Fecha desde</label>
                {{-- <input type="date" id="calendario" value="Y-m-d"  min="2022-05-01" max="2022-05-31"> --}}
                <input type="date" id="fecha_desde" name='fecha_desde' value={{$hoy}} min="2022-05-01" max= {{$hoy}} >
            </div>
            <div class="form-group">
                <label class="control-label" for="date">Fecha hasta</label>
               
                {{-- <input type="date" id="calendario" value="Y-m-d"  min="2022-05-01" max="2022-05-31"> --}}
                <input type="date" id="fecha_hasta" name='fecha_hasta' value={{$hoy}}  min="2022-05-01" max= {{$hoy}}>
                  @error('fecha_hasta')
                    <br>
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
            <div  class="hidden form-group">
                {!! Form::label('Turnos', 'turnos', ['class'=> 'form-control']) !!}
                {!! form::select('turnos', $turnos, null, ['class' => 'form-control', 'placeholder'=>'Todos', 'x-bind:disabled'=>'true']) !!}
            
            <div  class="hidden form-group">
                {!! Form::label('Pronosticador', 'Pronosticador', ['class'=> 'form-control']) !!}
                {!! form::select('Pronosticador', $users, null, ['class' => 'form-control', 'placeholder'=>'Todos', 'x-bind:disabled'=>'true']) !!}
                
                @error('pronosticador')
                    <br>
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- <a class="m-3 mr-5 btn btn-primary btn-sm" href="{{route('admin.informes.indexbusca')}}">Buscar informes</a> --}}
            {!!Form::submit('Buscar informe', ['class' => 'btn btn-primary btn-sm'])!!}
            {!! Form::close() !!}
        </div>
    </div> 
@stop

@section('css')
    
@stop

@section('js')

@stop



{{-- copy

https://www.youtube.com/watch?v=MxhasqDtq1s
https://www.youtube.com/watch?v=anSqU9w3BD0
https://www.youtube.com/watch?v=0sHSrqyZCnM&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh
    
{!! Form::open(array('url'=>'ventas/presupuesto', 'method'=>'GET', 'autcomplete'=>'off', 'role'=>'search'))!!}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar" value="{{$searchText}}">
		 <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
          <div class="form-group"> 
        <label class="control-label" for="date">Fecha De Emision</label>
        <input class="form-control" id="fechaInicial" name="fechaInicial"  placeholder="AA/MM/DD" value="{{$f1}}" type="text"/>
      </div>
         </div>
      <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
          <div class="form-group"> 
        <label class="control-label" for="date">Fecha De Expiracion</label>
        <input class="form-control" id="fechaFinal" name="fechaFinal" placeholder="AA/MM/DD" value="{{$f2}}" type="text"/>
      </div>
         </div>
		<span class="input-group-btn"><button type="submit" class="btn btn-primary">Buscar</button></span>
	</div>
</div>
 @push ('scripts') <!-- Trabajar con el script definido en el layout-->
  <script>
$(document).ready(function(){
      var date_input=$('input[name="fechaInicial"]');
      var date_inputt=$('input[name="fechaFinal"]');  //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
        date_inputt.datepicker(options);
    })

    </script>
  @endpush
{{Form::close()}} --}}