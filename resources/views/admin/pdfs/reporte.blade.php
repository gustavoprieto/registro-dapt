<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf</title>
    <link rel="stylesheet" href="{{public_path('css/app.css') }}" type="text/css">
</head>
<body>
<div style="float: left" class="mr-8">
    <img src="{{asset('/images/dinaclogo.png')}}" alt="" width='90px'>
</div>&nbsp;
<div style="float: left">
    <img src="{{asset('/images/metconrayo.png')}}" alt="" width='40px'>
</div>


<div style="float: right">
    <img src="{{asset('/images/goiernonacional.png')}}" alt=""  width='90px'>
</div> 
<div>
   <h3 class="mx-48">Dirección de Meteorología e Hidrología</h3> 
</div>
<h4>Sistema de Registro del DAPT</h4>

<div>
    <article><strong>Informe Nro.:</strong>
        <span>{{$informe->id}}</span>
    </article>
        <article><strong>Fecha:</strong>
            <span> {{$informe->Fecha->format('d-m-Y')}}</span>
        </article> 
        <article><strong>Turno:</strong>
            <span>{{$informe->Turno->Descripcion}}</span>
        </article>
        <article><strong>Pronosticador:</strong>
            <span> {{$informe->user->name}}</span>
        </article> 
    </div>
    <div>
    <center><h3>Detalle del informe</h3></center>
    <table>

        @foreach($informeables as $informeable)
            @if($informeable->tipoequipo_id <> $equipo)
            <thead>
                <tr>
                    <th>
                        {{$informeable->tipoequipo->Descripcion}} 
                    </th>
                </tr>
                @php
                 $equipo = $informeable->tipoequipo_id   
                @endphp
            @endif
            </thead>
            <tbody>
                <tr>
                    <td>
                        {{ $informeable->equipo->Nombre }}...
                        @if($informeable->estado->valor == 100)
                            <span style="color:green">{{ $informeable->estado->Descripcion}}</SPan>
                        @else
                            @if($informeable->estado->valor == 0)
                                <span style="color:red">{{ $informeable->estado->Descripcion}}</span> 
                            @else
                                <span style="color:orange">{{ $informeable->estado->Descripcion}}</span>
                            @endif
                        @endif   
                    </td>
                </tr>    
            </tbody>
        @endforeach
    </table>
    <div>
        @if($informe->comentario <> "")
            <h4>COMENTARIO</h4>
            {{$informe->comentario}}
        @else
            Sin comentario 
        @endif
    </div>
</body>
</html>