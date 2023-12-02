<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css') }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
        <!--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>@yield('title')</title>
    </head>
    <body>
        @yield('header')
        @yield('content')
        @yield('footer')
    </body>
</html>