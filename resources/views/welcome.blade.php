<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="/vendor/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/vendor/slick/slick-theme.css">

    <link rel="stylesheet" href="/css/main.css">
    <title>Document</title>
</head>
<body>

<div id="wrapper" class="container-fluid">

    <div class="row no-gutters">
        <div class="col-9">

            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{ url('/home') }}">Navbar</a>
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
                    @guest
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" data-toggle="modal" data-target="#loginModal">Войти</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link btn-border-wrap" data-toggle="modal" data-target="#registerModal"><span>Зарегистрироваться</span></a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav mr-auto">
                            @if(\Auth::user() != null && \Auth::user()->isAdmin('admin'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">Панель администратора</a>
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    @endguest
                    </div>
                </div>
            </nav>



            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/img/carousel/wow.png" class="d-block w-100" >
                        <div class="carousel-caption d-none d-md-block">
                            <h1>Покупайте у игроков</h1>
                            <p>Площадка для покупки и продажи игровой атрибутики, аккаунтов и услуг</p>
                            <a href="#" class="button">Создать аккаунт</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/img/carousel/wow.png" class="d-block w-100">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>Покупайте у игроков</h1>
                            <p>Площадка для покупки и продажи игровой атрибутики, аккаунтов и услуг</p>
                            <a href="#" class="button">Создать аккаунт</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/img/carousel/wow.png" class="d-block w-100" >
                        <div class="carousel-caption d-none d-md-block">
                            <h1>Покупайте у игроков</h1>
                            <p>Площадка для покупки и продажи игровой атрибутики, аккаунтов и услуг</p>
                            <a href="#" class="button">Создать аккаунт</a>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <div class="carousel-search">
                    <form action="#" class="search-block">
                        <input type="text" class="search-input" placeholder="Поиск">
                    </form>
                </div>
            </div>

            <style>
                .carousel-item > img {
                    object-fit: cover;
                }
            </style>


            <p>123</p>

            {{--@foreach($games as $game)--}}
                {{--{{ print_r($game) }}--}}
            {{--@endforeach--}}


        <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h2>Войти</h2>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" name="email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Пароль" name="password">
                                    <a href="#">Забыли пароль?</a>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="remember">
                                            Запомнить меня
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit">Войти</button>
                                </div>
                                <a href="#">У вас нет аккаунта?</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .modal-content {
                    border-radius: 20px;
                    background: #ffffff;
                    padding: 25px 50px;
                }

                .modal-content > .modal-body > h2 {
                    text-align: center;
                    color: #333333;
                    font-size: 48px;
                    font-weight: 400;
                    line-height: 64px;
                }

                .modal-content > .modal-body > form [type='email'], [type='password'], [type='text'] {
                    height: 60px;
                    border-radius: 30px;
                    padding: 0px 30px;
                    font-size: 18px;
                    font-weight: 400;
                    border: none;
                    background-color: #f2f3f6;
                }

                .modal-content > .modal-body > form button {
                    display: block;
                    border: none;
                    text-align: center;
                    margin: 0 auto;
                    font-size: 18px;
                    text-decoration: none;
                    padding: 10px 30px;
                    background: -webkit-linear-gradient(315deg, #0A83FF, #02EFFD);
                    background: -o-linear-gradient(315deg, #0A83FF, #02EFFD);
                    background: linear-gradient(135deg, #0A83FF, #02EFFD);
                    border-radius: 30px;
                    color: #ffffff;
                }

                .modal-body > form > .form-group {
                    position: relative;
                }

                .modal-body > form > .form-group > a{
                    position: absolute;
                    top: 20px;
                    right: 30px;
                    font-size: 14px;
                    font-weight: 400;
                    color: #0994ff;
                }

                .modal-body > form > a {
                    text-align: center;
                    display: block;
                    color: #0994ff;
                }

            </style>

            <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h2>Регистрация</h2>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Никнейм" name="name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" name="email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Пароль" name="password">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Повтор пароля" name="password_confirmation">
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="remember">
                                            Согласен с политикой конфиденциальности
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit">Создать аккаунт</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row games-card">
            @foreach($games as $game)
                <div class="col-md-4">
                    <div class="game-card">
                        <img class="preview" src="{{ $game['card_image'] }}" alt="">
                        <a href="/{{ $game['alias'] }}">
                            <div class="content">
                                <h2>{{ $game['name'] }}</h2>
                                <span>(?) предложений</span>
                                <ul class="breads">
                                    @foreach($game['categories'] as $service)
                                    <a href="/{{ $game['alias'] }}/{{ $service['alias'] }}" class="bread-items">{{ $service['name'] }}</a>
                                    @endforeach
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
            </div>


            <section id="reviews">
                <h2>Отзывы</h2>
                <div class="slider">
                    <div class="review">
                        <p>Имел сделку с этим товарищем, более года назад. Имел сделку с этим товарищем, более года назад. Имел сделку с этим товарищем, более года назад. Имел сделку с этим товарищем, более года назад.</p>
                    </div>
                    <div class="review">
                        <p>Имел сделку с этим товарищем, более года назад. Имел сделку с этим товарищем, более года назад. Имел сделку с этим товарищем, более года назад. Имел сделку с этим товарищем, более года назад.</p>
                    </div>
                    <div class="review">
                        <p>Имел сделку с этим товарищем, более года назад. Имел сделку с этим товарищем, более года назад. Имел сделку с этим товарищем, более года назад. Имел сделку с этим товарищем, более года назад.</p>
                    </div>

                </div>
            </section>

        </div>
        <div class="col-3 sidebar">
            <div class="chat">
                <h2>Общий чат</h2>
                <div class="messages">
                    <div class="message">
                        <div class="header">
                            <div class="row container-fluid">
                                <div class="col-8">
                                    <img src="img/avatar.png" alt=""> <a  href="#" class="author">wemonsh</a>
                                </div>
                                <div class="col-4">
                                    <span class="time">12:22</span>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <p>Куплю аккаунт стим (дешевенький) главное, чтобы не было ограничения на обмен и на торговую площадку, со стим аутентификатором.</p>
                        </div>
                    </div>
                    <div class="message">
                        <div class="header">
                            <div class="row container-fluid">
                                <div class="col-8">
                                    <img src="img/avatar.png" alt=""> <a  href="#" class="author">wemonsh</a>
                                </div>
                                <div class="col-4">
                                    <span class="time">12:22</span>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <p>Куплю аккаунт стим (дешевенький) главное, чтобы не было ограничения на обмен и на торговую площадку, со стим аутентификатором.</p>
                        </div>
                    </div>
                    <div class="message">
                        <div class="header">
                            <div class="row container-fluid">
                                <div class="col-8">
                                    <img src="img/avatar.png" alt=""> <a  href="#" class="author">wemonsh</a>
                                </div>
                                <div class="col-4">
                                    <span class="time">12:22</span>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <p>Куплю аккаунт стим (дешевенький) главное, чтобы не было ограничения на обмен и на торговую площадку, со стим аутентификатором.</p>
                        </div>
                    </div>
                    <div class="message">
                        <div class="header">
                            <div class="row container-fluid">
                                <div class="col-8">
                                    <img src="img/avatar.png" alt=""> <a  href="#" class="author">wemonsh</a>
                                </div>
                                <div class="col-4">
                                    <span class="time">12:22</span>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <p>Куплю аккаунт стим (дешевенький) главное, чтобы не было ограничения на обмен и на торговую площадку, со стим аутентификатором.</p>
                        </div>
                    </div>
                </div>

                <form action="#">
                    <textarea name="" id="" cols="30" rows="3"></textarea>
                    <span>Продажа в чате запрещена</span><button>Отправить</button>
                </form>

            </div>
        </div>
    </div>

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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="vendor/slick/slick.min.js"></script>

<script>
    $('.slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        centerMode: true,
        variableWidth: true
    });
</script>
</body>
</html>