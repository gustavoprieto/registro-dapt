@extends('adminlte::page')

@section('title', 'Registro DAPT - CMN')

@section('content_header')
    <h1>Registro DAPT</h1>
@stop

@section('content')
    <p>Welcome  {{auth()->user()->roles()->first()->name}}</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop