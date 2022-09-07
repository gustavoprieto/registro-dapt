@extends('adminlte::page')

@section('title', 'Registro DAPT - CMN')

@section('plugins.Sweetalert2', true)

@section('content_header')
    @include('admin.partials.cabecera')
        <a class="float-right mt-3 mr-5 btn btn-secondary btn-sm" href="{{route('admin.estados.create')}}">Buscar</a>
    <h1 class="px-5">Lista de Informes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-spriped">
                <thead>
                    <tr>
                        <th>Nro.</th>
                        <th>Descripción</th>
                        <th>Grupo de equipos</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($equipos as $equipo)
                <tr>
                    <td>{{$equipo->id  }}</td>
                    <td>{{$equipo->Nombre}}</td>
                    <td>{{ $equipo->Tipo_equipo->Descripcion}}</td>
                    <td width='10px'>
                        <a class="btn btn-primary btn-sm" href="{{route('admin.equipos.edit', $equipo)}}">Editar</a> </td>
                    <td width = '10px'>
                        <form action="{{route('admin.equipos.destroy', $equipo)}}" method="POST" class="formulario-eliminar">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
<script src="{{ asset('js/app.js') }}"></script>

        @if(session('crear') == 'si')
            <script>
                Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'El equipo ha sido creado',
                showConfirmButton: false,
                timer: 1500
                })
            </script>
        @endif
    
        @if(session('actualiza') == 'si')
            <script>
                Swal.fire({
                title: 'El equipo se actualizó con éxito',
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
            'El equipo ha sido eliminado .',
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
        text: "Este nombre del equipo se eliminará definitivamente!",
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