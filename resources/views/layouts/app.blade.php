<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{ asset($favicon) }}">
    <title>@yield('title') - {{ config('app.name') }}</title>
    @include('layouts.components.css')
    @stack('css')
</head>

<body class="ps-loading">
    @include('layouts.components.header')
    @yield('content')
    @include('layouts.components.footer')
    @include('layouts.components.script')
    @stack('js')
</body>

</html>
