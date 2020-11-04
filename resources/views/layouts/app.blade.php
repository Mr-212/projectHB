<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       @include('layouts.header')
    </head>
     <body>
             @include('layouts.body')

    </body>
@include('layouts.footer')
</html>
