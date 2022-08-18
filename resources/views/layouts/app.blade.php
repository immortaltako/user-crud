<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/sass/app.scss'])
        <title>{{config('app.name', 'JELLO')}}</title>
    </head>
    <body>
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
    </body>
</html>
