@extends('adminlte::page')

@section('title', 'Registro DAPT - CMN')

@section('plugins.Sweetalert2', true)

@section('content_header')
    @include('admin.partials.cabecera')
        @can('admin.turnos.create')
            <a class="float-right mt-3 mr-5 btn btn-secondary btn-sm" href="{{route('admin.turnos.create')}}">Agregar Turnos</a>
        @endcan('')
        <h1 class="px-5">Lista de turnos</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="mb-2 alert-success">
            <strong class="mx-4" width='20px'>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($turnos as $turno)
                <tr>
                    <td>{{$turno->id  }}</td>
                    <td>{{$turno->Descripcion}}</td>
                    <td width='10px'>
                        @can('admin.turnos.edit')    
                            <a class="btn btn-primary btn-sm" href="{{route('admin.turnos.edit', $turno)}}">Editar</a> </td>
                        @endcan
                    <td width = '10px'>
                        @can('admin.turnos.destroy')
                            <form action="{{route('admin.turnos.destroy', $turno)}}" class="formulario-eliminar" method="POST">
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
    </div>
    @yield('js')
@stop

@section('js')
<script src="{{ asset('js/app.js') }}"></script>

        @if(session('crear') == 'si')
            <script>
                Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'El turno ha sido creado',
                showConfirmButton: false,
                timer: 1500
                })
            </script>
        @endif
    
        @if(session('actualiza') == 'si')
            <script>
                Swal.fire({
                title: 'El turno se actualizó con éxito',
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
            'El turno ha sido eliminado .',
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
        text: "Este nombre de grupo se eliminará definitivamente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
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