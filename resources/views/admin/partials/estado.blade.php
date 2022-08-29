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
        {!! Form::radio('valor', 100,false) !!}
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