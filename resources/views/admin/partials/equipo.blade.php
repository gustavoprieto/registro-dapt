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
