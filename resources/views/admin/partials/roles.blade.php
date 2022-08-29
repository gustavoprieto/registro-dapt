    <div class="form-group">
        @if(($role->name <>"ADMINISTRADOR")or ($role->name ==""))
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['onkeyup'=>'mayus(this)','class' => 'form-control', 'placeholder' =>'Ingrese el nombre del rol']) !!}
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        @else
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['onkeyup'=>'mayus(this)','class' => 'form-control', 'readonly']) !!}
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('permissions', 'Permisos para este rol:', ['font color'=>'blue']) !!}
        <br/>
        @foreach($permissions as $permission)
            <div>
                <label>
                   @if($role->name <>"ADMINISTRADOR") 
                        {!! Form::checkbox('permissions[]', $permission->id, $role->permission, ['class' =>'mr-1'] )!!}
                        {{$permission->descripcion}}
                    @else
                        {{-- {!! Form::checkbox('permissions[]', $permission->id, $role->permission, ['class' => 'readonly'] )!!} --}} 
                        {{$permission->descripcion}} 
                    @endif
                        
                </label>
            </div>
        @endforeach

    </div>   