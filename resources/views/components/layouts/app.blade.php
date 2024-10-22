<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Seguimeinto de Documento | Municipalidad Distrital de San Clemente' }}</title>

        @livewireStyles


    </head>
    <body>
        {{ $slot }}
    </body>
    @livewireScripts

</html>
