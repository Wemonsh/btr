<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/libs.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
<div id="wrapper">
    @include('layouts.elements.navbar')
    <main>
        @yield('content')
    </main>
    @include('layouts.elements.footer')
</div>

<script src="{{ asset('js/libs.min.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>

</body>

</html>
