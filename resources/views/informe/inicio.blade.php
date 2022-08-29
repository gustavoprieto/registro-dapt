@extends('adminlte::page')

@section('title', 'Registro DAPT - CMN')

@section('content_header')

@stop

@section('content')
<x-app-layout>

                                            
</x-app-layout>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
       Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Your work has been saved',
  showConfirmButton: false,
  timer: 1500
}) 
    </script>
@stop