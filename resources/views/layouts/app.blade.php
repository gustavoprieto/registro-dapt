<!DOCTYPE html>
<html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Registro DAPT - CNN') }}</title>
        <title>Registro DAPT - CMN</title>
       
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">


        @livewireStyles 

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="jquery-3.6.0.min.js"></script>
        <script src="jquery-ui-1.13.1.custom/jquery-ui.js"></script>
    
    </head>
    <body>
        <main>
            {{ $slot }}
        </main>
      @yield('js')
    </body>

</html>

