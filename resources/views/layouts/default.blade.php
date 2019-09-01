<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>

    <link href="{{ asset('css/libs.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main_2.css') }}" rel="stylesheet">

</head>

<body>
<div id="wrapper">
    @include('layouts.elements.navbar')

    <main>

        @yield('content')

    </main>

    <footer>
        <div class="row container-fluid">
            <div class="col-3"></div>
            <div class="col-3">
                <ul>
                    <li><a href="#">О сервисе</a></li>
                    <li><a href="#">Как мы работаем</a></li>
                    <li><a href="#">Отзывы клиентов</a></li>
                    <li><a href="#">Политика конфиденциальности</a></li>
                </ul>
            </div>
            <div class="col-3">
                <ul>
                    <li><a href="#">Подать объявление</a></li>
                    <li><a href="#">Правила сервиса</a></li>
                    <li><a href="#">Помощь</a></li>
                    <li><a href="#">Профиль</a></li>
                </ul>
            </div>
            <div class="col-3"></div>
        </div>
    </footer>

</div>

<script src="{{ asset('js/libs.min.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>

<script src="/js/app.js"></script>

</body>

</html>
