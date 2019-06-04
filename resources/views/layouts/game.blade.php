<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


    <title>Hello, world!</title>
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">О сервисе <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Правила сервиса <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Помощь <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Отзывы <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Рейтинг продавцов <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <div class=" my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Мои заказы <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#"><i class="fas fa-comments"></i> Мои сообщения <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Семенов Олег <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#"><span class="button-exit">Выйти</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <main>
        @yield('header')
        <div class="container">
            @yield('content')
        </div>
    </main>

    <style>
        .container {
            max-width: 1643px;
        }
        main > .container {
            margin-top: -270px;
        }
    </style>

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

<style>

    .button-exit {
        color: #333333;
        padding: 5px 10px;
        border-radius: 30px;
        border: 2px solid #333333;
        text-decoration: none;
    }

    main {

        min-height: 140vh;
        background-color: #f2f3f6;
    }
    main > .container {
        position: relative;
    }
    main > .container > .custom-table{
        top: -95px;
        text-align: center;
        background-color: #ffffff;
        border-radius: 5px;
        box-shadow: 0px 20px 40px -20px #bec6de;
        position: absolute;

    }
    .custom-table > thead > tr > th{
        border-top: none;
        border-bottom: solid 1px #f9f9f9;
        font-size: 18px;
        font-weight: 400;
        line-height: 40px;
    }
    .custom-table > tbody > tr > td{
        border-bottom: solid 1px #f9f9f9;
        font-size: 18px;
        font-weight: 400;
        line-height: 40px;
    }

    .custom-table > tbody > tr > td > a{
        color: #333333;
        font-size: 18px;
        padding: 10px 20px;
        border-radius: 30px;
        border: 2px solid #02EDFD;
        text-decoration: none;
    }


    .profile-header > .head-buttons {
        margin: 30px;
        padding: 0;
        list-style: none;
        text-align: center;
    }
    .profile-header > .head-buttons > .button-item {
        display: inline-block;
        margin: 0px 5px;
    }

    .profile-header > .head-buttons > .button-item > a{
        color: #ffffff;
        font-size: 18px;
        padding: 10px 20px;
        border-radius: 30px;
        border: 2px solid #ffffff;
        text-decoration: none;
    }

    .profile-header > .head-buttons > .button-item > a:hover{

    }

    .profile-header > .head-buttons > .active-item > a{
        background-color: #ffffff;
        color: #333333;
    }

    footer {
        padding: 20px 0px;
        height: 180px;
        background: #ffffff; }
    footer ul {
        list-style: none; }
    footer ul li a {
        color: #9b9b9b;
        font-size: 18px;
        font-weight: 400;
        line-height: 34px; }

</style>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>