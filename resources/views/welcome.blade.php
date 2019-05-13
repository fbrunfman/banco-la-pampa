<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token()}}">
        <script>window.Laravel = { csrfToken: '{{csrf_token()}}'}</script>
        <title>Banco De La Pampa - 60 Aniversario</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>

        </style>
    </head>
    <body>
      <div id="app">
        <div class="container">
            <main-page> <main-page/>
        </div>
      </div>

      <script src="{{ asset('js/app.js')}}"></script>
    </body>
</html>
