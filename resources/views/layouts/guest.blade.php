<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </head>
    <body>
        <x-layout.header-home-layout />

        {{ $slot }}

        <x-layout.footer />

        <script>
            $(document).ready(function () {
                $('#btn-login').click(function () {
                    $('#modal-login').fadeIn('slow');
                });

                $('#close-login').click(function () {
                    $('#modal-login').fadeOut('fast');
                })

                $('#btn-register').click(function () {
                   $('#modal-register').fadeIn('slow');
                });

                $('#close-register').click(function () {
                    $('#modal-register').fadeOut('fast');
                });
            });
        </script>
        <script src="{{ secure_asset(asset('assets/utils.js')) }}"></script>
    </body>
</html>
