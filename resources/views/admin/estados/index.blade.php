@extends('adminlte::page')

@section('title', 'Registro DAPT - CMN')

@section('plugins.Sweetalert2', true)

@section('content_header')
    @include('admin.partials.cabecera')
        @can('admin.estados.create')    
            <a class="float-right mt-3 mr-5 btn btn-secondary btn-sm" href="{{route('admin.estados.create')}}">Agregar Estado</a>
        @endcan
    <h1 class="px-5">Lista de estados</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Valor</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($estados as $estado)
                <tr>
                    <td>{{$estado->id  }}</td>
                    <td>{{$estado->Descripcion}}</td>
                    <td>{{ $estado->valor }}</td>
                    <td width='10px'>
                        @can('admin.estados.edit')    
                            <a class="btn btn-primary btn-sm" href="{{route('admin.estados.edit', $estado)}}">Editar</a> 
                        @endcan 
                        </td>  
                    <td width = '10px'>
                        @can('admin.estados.destroy')
                            <form action="{{route('admin.estados.destroy', $estado)}}" class="formulario-eliminar" method="POST">
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
@stop

@section('js')
<script src="{{ asset('js/app.js') }}"></script>

        @if(session('crear') == 'si')
            <script>
                Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'El estado ha sido creado',
                showConfirmButton: false,
                timer: 1500
                })
            </script>
        @endif
    
        @if(session('actualiza') == 'si')
            <script>
                Swal.fire({
                title: 'El estado se actualizó con éxito',
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
            'El estado ha sido eliminado .',
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
        text: "Este nombre del estado se eliminará definitivamente!",
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