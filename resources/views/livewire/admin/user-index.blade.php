<div>
    <div class="card">
        <div class="card-header">
            <input wire:model ="search" class="form-control" placeholder ="Ingrese el nombre del usuario...">
        </div>
    @if ($users->count()) 
                {{-- contar usuarios  --}}
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Rol</th>
                        <th>email</th>
                        {{-- <th>Rol</th>
                        <th>Alcance</th> --}}
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                       <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                @if($user->getRoleNames()=="ADMINISTRADOR")
                                    {{ "sin rol" }}
                                @else
                                    {{ $user->getRoleNames() }}
                                @endif
                            </td>
                            <td>{{ $user->email }}</td>
                            {{-- <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $rolName)
                                        <h5><span class="badge badge-dark">{{ $rolName }}</span></h5>
                                    @endforeach
                                @endif
                            </td> 
                            <td></td>--}}
                            <td width = '10px'>
                                @can('admin.users.edit')
                                    <a class="btn btn-primary btn-sm " href="{{ route('admin.users.edit', $user) }}">Editar</a>
                                @endcan
                            </td>
                            <td width = '10px'>
                                @can('admin.users.destroy')
                                    <form action="{{route('admin.users.destroy', $user)}}" class="formulario-eliminar" method="POST">
                                        @csrf
                                        @method('delete')    
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        
                                    </form>
                                @endcan
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $users->links() }}
        </div>
    @else
        <div class="cad-body">
            <strong>No hay registros...</strong>
        </div>
    @endif
</div>
