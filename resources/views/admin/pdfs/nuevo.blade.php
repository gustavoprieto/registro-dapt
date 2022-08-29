<?php

use Barryvdh\DomPDF\Facade\Pdf as PDF;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table{
            font-family: sans-serif,;
            text-align: left;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #000;
        }
        th, td {
            width: 25%;
            font-size: x-small;
            padding: 0cm 0cm 0cm 0cm;
        }
        h5{
          padding: 0cm 0cm 0cm 0cm;  
        }
            


    </style>
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
   <h2 margin="66px" >Dirección de Meteorología e Hidrología</h2> 
</div>
<h4>Sistema de Registro del DAPT</h4>
{{-- https://www.youtube.com/watch?v=D5nnrGSDUzI --}}
<div>
    <article>Informe Nro.:
        <span>{{$informe->id}}</span>
    </article>
        <article><span>Fecha:</span>
            <span> {{$informe->Fecha->format('d-m-Y')}}</span>
        </article> 
        <article><span>Turno:</span>
            <span>{{$informe->Turno->Descripcion}}</span>
        </article>
        <article><span>Pronosticador:</span>
            <span> {{$informe->user->name}}</span>
        </article> 
    </div>
    <div>
        <h3>Detalle del informe</h3>
    </div>
    <div>
        @foreach($informeables as $informeable)
            @if($informeable->tipoequipo_id <> $equipo)
                <h5>{{$informeable->tipoequipo->Descripcion}}</h5>
                @php
                    $equipo = $informeable->tipoequipo_id;
                @endphp  
            @endif                
            <table>
                <tr>
                    <td>
                        {{ $informeable->equipo->Nombre }}...
                    </td>
                    <td>
                        @if($informeable->estado->valor == 100)
                                {{ $informeable->estado->Descripcion}}
                        @else
                                @if($informeable->estado->valor == 0)
                                    {{ $informeable->estado->Descripcion}} 
                                @else
                                    {{ $informeable->estado->Descripcion}}
                                @endif
                        @endif
                    </td>
                </tr>                                        
            </table>  
        @endforeach         
    </div>
    <div >
        @if($informe->comentario <> "")
            <h4>Comentario</h4>
            <p>{{$informe->comentario}} </p>
        @else
            <p>Sin comentario</p>  
        @endif
       
    </div>

</body>
</html>