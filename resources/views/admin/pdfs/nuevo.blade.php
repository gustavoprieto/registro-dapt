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
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
<div >
    
<h4 style="float: center; margin: left 120px;">DIRECCION DE METEOROLOGIA E HIDROLOGIA</h4>
  <p> 
        <img src="{{asset('/images/dinaclogo.png')}}" style="float: left" width='90px' >
    </p>    
      <!-- <p> 
        <img src="{{asset('/images/goiernonacional.png')}}" alt=""  width='90px' style="float: right" > 
    </p>  -->
     
    <p> 
        <img src="{{asset('/images/dmh.png')}}" style="float: right; margin-top:-25px" alt="" width='40px'> 
    </p>
  
</div>
<div>

<div>
    <h4 style="text-align: center">Sistema de Registro del DAPT</h4>
</div>
{{-- https://www.youtube.com/watch?v=D5nnrGSDUzI --}}
<div>
    <article>Informe Nro.:
        <span>{{$informe->numero}}</span>
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
        <h4>Detalle del informe</h4>
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
                        {{ $informeable->equipo->Nombre }}
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
	<script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270, 800, "Informe: {{$informe->numero}} "." Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
	</script>
</body>
</html>