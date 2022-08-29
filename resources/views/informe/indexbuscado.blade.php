@extends('adminlte::page')

@section('title', 'Registro DAPT - CMN')

@section('content_header')
    
    
@include('informe.partials.cabecera')

@stop

@section('content')
    <a class="m-3 mr-5 btn btn-secondary btn-sm" href="{{route('informe.buscar')}}">Buscar informe</a>
   
    {{-- a href="{{route('informe.show', $informe)}}"> --}}
    
    <div class="mx-2 mx-auto">
        <!-- SOLO PARA REFERENCIA $informe->Turno->Descripcion   <br> -->
        <!-- $informe->id -- $informe->Fecha-- $informe->Turno->Descripcion  --> 
        <div class="grid grid-cols-1 px-2 py-3 md:grid-cols-2 lg:grid-cols-3">        
            @foreach ($informes as $informe)
                <div class="mx-1 card">
                    <div class="px-1 py-2 card-body bg-green">
                        <table>
                            <tr>
                                <td>
                                    <a href="{{route('informe.show', $informe)}}">
                                        <!-- <div>
                                            <p>Informe:</p>
                                            <span class="inline-block text-base bg-indigo-300">
                                                {{ $informe->id }}.-
                                            </span>   
                                        </div> -->
                                        <div>
                                            <p>Fecha:
                                                <span class="mx-1 text-base">
                                                    {{ $informe->Fecha->format('d-m-Y') }}
                                                </span>
                                            </p>
                                        </div>
                                        <div>
                                            <p>Turno:
                                                <span class="mx-1 text-base">
                                                    {{$informe->Turno->Descripcion}} 
                                                </span>
                                            </p>                                     
                                        </div>
                                        <div>
                                            <p>Pronosticador:
                                                <span class="mx-1 text-base">
                                                    {{$informe->User->name}} 
                                                </span>
                                            </p>                                     
                                        </div>
                                    </a>  
                                </td>
                            </tr>
                        </table>  
                    </div>
                </div>        
            @endforeach
        </div>
    </div>
    <div class="text-base">
        {{$informes->links()}}
    </div>    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop