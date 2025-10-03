<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('/assets/images/favicon.png') }}">

    <title>{{ $title ?? 'Welcome' }} | {{ config('app.name') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('kit/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('kit/assets/css/bootstrap-utilities.min.css') }}" rel="stylesheet">
    <link href="{{ asset('kit/assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('kit/assets/css/helpers.css') }}" rel="stylesheet">
    <style>
        body{
            height: 100vh;
        }
        .container{
            height: 100%;
        }
    </style>
</head>
<body data-bs-theme="dark">

    {!! $slot !!}

</body>
</html>
