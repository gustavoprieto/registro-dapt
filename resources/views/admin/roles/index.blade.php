@extends('adminlte::page')

@section('title', 'Registro DAPT - CMN')

@section('plugins.Sweetalert2', true)

@section('content_header')
    @include('admin.partials.cabecera')
        @can('admin.roles.create')
            <a class="float-right mt-3 mr-5 btn btn-secondary btn-sm" href="{{route('admin.roles.create')}}">Agregar rol</a>
        @endcan
    <h1 class="px-5">Lista de roles</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>{{$role->id  }}</td>
                    <td>{{$role->name}}</td>
                    
                    <td width='10px'>
                        @can('admin.roles.edit')    
                            <a class="btn btn-primary btn-sm" href="{{route('admin.roles.edit', $role)}}">Editar</a> 
                        @endcan
                    </td>
                    @if($role->name <>"ADMINISTRADOR")
                    <td width = '10px'>
                        @can('admin.users.destroy')
                            <form action="{{route('admin.roles.destroy', $role)}}" method="POST" class="formulario-eliminar">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        @endcan
                        {{-- ejemplo... otro metodo
                            {!! Form::open(['method'=>'DELETE', 'route' =>['admin.roles.destroy', $role->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Borrar', ['class'=>'btn btn-danger']) !!}
                        {!! form::close() !!} --}}
                    </td>
                    @endif
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-base">
        {{$roles->links()}}
    </div> 
@stop

@section('js')
<script src="{{ asset('js/app.js') }}"></script>

        @if(session('crear') == 'si')
            <script>
                Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'El rol ha sido creado',
                showConfirmButton: false,
                timer: 1500
                })
            </script>
        @endif
    
        @if(session('actualiza') == 'si')
            <script>
                Swal.fire({
                title: 'El rol se actualizó con éxito',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
                })
            </script>
        @endif

@if(session('eliminar') == 'ok')
    <script>
        Swal.fire(
            '¡Eliminado!',
            'El rol ha sido eliminado .',
            'success'
        )   
    </script>
@endif

{{-- @if(session('eliminar') == 'no')
    <script>
        Swal.fire(
            'No ha sido eliminado',
            'Tiene equipos asociados, deberá eliminarlos antes...',
            'warning'      
        )
    </script>
    <script>
      // location.reload()     
       //setInterval("location.reload()",10000);
    </script>
@endif --}}

<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();
        Swal.fire({
        title: '¿Estás seguro?',
        text: "Este rol se eliminará definitivamente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: '¡Sí, eliminar!'
        }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
            // Swal.fire(
            // 'Deleted!',
            // 'Your file has been deleted.',
            // 'success'
            // )
        }
        })
    });
</script>
@stop