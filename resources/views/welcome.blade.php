<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">

    <link rel="stylesheet" type="text/css" href="/vendor/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/vendor/slick/slick-theme.css">
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
                                <a class="nav-link" href="{{ route('login') }}">Войти</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link btn-border-wrap" href="{{ route('register') }}"><span>Зарегистрироваться</span></a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav mr-auto">
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

            @foreach($games as $game)
                {{ print_r($game) }}
            @endforeach


            <div class="row games-card">
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Aion.png" alt="">
                        <div class="content">
                            <h2>Aion</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1231" class="bread-items">Кинары</a>
                                <a href="#123213" class="bread-items">Аккаутнты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1231" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Albion Online.png" alt="">
                        <div class="content">
                            <h2>Albion Online</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1231" class="bread-items">Серебро</a>
                                <a href="#123213" class="bread-items">Золото</a>
                                <a href="#1232131" class="bread-items">Аккаутнты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Archeage RU.png" alt="">
                        <div class="content">
                            <h2>Archeage RU</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#123213" class="bread-items">Золото</a>
                                <a href="#1232131" class="bread-items">Аккаутнты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Black Desert RU.png" alt="">
                        <div class="content">
                            <h2>Black Desert RU</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#123213" class="bread-items">Серебро</a>
                                <a href="#1232131" class="bread-items">Аккаутнты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Blade & Soul RU.png" alt="">
                        <div class="content">
                            <h2>Blade & Soul RU</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#123213" class="bread-items">Золото</a>
                                <a href="#1232131" class="bread-items">Аккаутнты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Clash of Clans.png" alt="">
                        <div class="content">
                            <h2>Clash of Clans</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Аккаутнты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Crossout.png" alt="">
                        <div class="content">
                            <h2>Crossout</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Золото</a>
                                <a href="#1232131" class="bread-items">Аккаутнты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/CS GO.png" alt="">
                        <div class="content">
                            <h2>CS GO</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Аккаутнты</a>
                                <a href="#1232131" class="bread-items">Скины</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Destiny 2.png" alt="">
                        <div class="content">
                            <h2>Destiny 2</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Аккаутнты</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Diablo 3.png" alt="">
                        <div class="content">
                            <h2>Diablo 3</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Аккаутнты</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Dota 2.png" alt="">
                        <div class="content">
                            <h2>Dota 2</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Аккаутнты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Elder Scrolls Online.png" alt="">
                        <div class="content">
                            <h2>Elder Scrolls Online</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Золото</a>
                                <a href="#1232131" class="bread-items">Аккаутнты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Escape from Tarkov.png" alt="">
                        <div class="content">
                            <h2>Escape from Tarkov</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Рубли</a>
                                <a href="#1232131" class="bread-items">Доллары</a>
                                <a href="#1232131" class="bread-items">Евро</a>
                                <a href="#1232131" class="bread-items">Биткоины</a>
                                <a href="#1232131" class="bread-items">Аккаутнты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/EVE Online.png" alt="">
                        <div class="content">
                            <h2>EVE Online</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">ISK</a>
                                <a href="#1232131" class="bread-items">Аккаутнты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Fifa.png" alt="">
                        <div class="content">
                            <h2>Fifa</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Монеты</a>
                                <a href="#1232131" class="bread-items">Аккаутнты</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/GTA 5.png" alt="">
                        <div class="content">
                            <h2>GTA 5</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Аккаутнты</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/GTA SAMP, CRMP, RP.png" alt="">
                        <div class="content">
                            <h2>GTA SAMP, CRMP</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Вирты</a>
                                <a href="#1232131" class="bread-items">Аккаутнты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Guild Wars 2.png" alt="">
                        <div class="content">
                            <h2>Guild Wars 2</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Золото</a>
                                <a href="#1232131" class="bread-items">Аккаутнты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Gwent.png" alt="">
                        <div class="content">
                            <h2>Gwent</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Аккаутнты</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Hearthstone.png" alt="">
                        <div class="content">
                            <h2>Hearthstone</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Аккаутнты</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/League of Legends.png" alt="">
                        <div class="content">
                            <h2>League of Legends</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Riot Points</a>
                                <a href="#1232131" class="bread-items">Аккаутнты</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Lineage 2 Classic EU_NA.png" alt="">
                        <div class="content">
                            <h2>Lineage 2 EU/NA</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Адена</a>
                                <a href="#1232131" class="bread-items">Аккаунты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Lineage 2 Classic RU.png" alt="">
                        <div class="content">
                            <h2>Lineage 2 RU</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Адена</a>
                                <a href="#1232131" class="bread-items">Аккаунты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Lineage 2 Free.png" alt="">
                        <div class="content">
                            <h2>Lineage 2 Free</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Адена</a>
                                <a href="#1232131" class="bread-items">Монеты</a>
                                <a href="#1232131" class="bread-items">Аккаунты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Neverwinter online.png" alt="">
                        <div class="content">
                            <h2>Neverwinter online</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Бриллианты</a>
                                <a href="#1232131" class="bread-items">Аккаунты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Overwatch.png" alt="">
                        <div class="content">
                            <h2>Overwatch</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Аккаунты</a>
                                <a href="#1232131" class="bread-items">Скины</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Path of Exile.png" alt="">
                        <div class="content">
                            <h2>Path of Exile</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Сферы возвышения</a>
                                <a href="#1232131" class="bread-items">Сферы хаоса</a>
                                <a href="#1232131" class="bread-items">Сферы прочие</a>
                                <a href="#1232131" class="bread-items">Аккаунты</a>
                                <a href="#1232131" class="bread-items">Билды</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Perfect World (RU).png" alt="">
                        <div class="content">
                            <h2>Perfect World (RU)</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Юани</a>
                                <a href="#1232131" class="bread-items">Аккаунты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/PUBG.png" alt="">
                        <div class="content">
                            <h2>PUBG</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Аккаунты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Revelation Online.png" alt="">
                        <div class="content">
                            <h2>Revelation Online</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Золото</a>
                                <a href="#1232131" class="bread-items">Аккаунты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Tom Clancy's Rainbow Six.png" alt="">
                        <div class="content">
                            <h2>Tom Clancy's Rainbow 6</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Аккаунты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/War Thunder.png" alt="">
                        <div class="content">
                            <h2>War Thunder</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">GAIJIN COINS</a>
                                <a href="#1232131" class="bread-items">Аккаунты</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Warface.png" alt="">
                        <div class="content">
                            <h2>Warface</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Аккаунты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Warframe.png" alt="">
                        <div class="content">
                            <h2>Warframe</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Платина</a>
                                <a href="#1232131" class="bread-items">Аккаунты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/World of Tank.png" alt="">
                        <div class="content">
                            <h2>World of Tank</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Аккаунты</a>
                                <a href="#1232131" class="bread-items">Бонус коды</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/World of Warships.png" alt="">
                        <div class="content">
                            <h2>World of Warships</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Аккаунты</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/WOW FREE.png" alt="">
                        <div class="content">
                            <h2>WOW FREE</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Золото</a>
                                <a href="#1232131" class="bread-items">Аккаунты</a>
                                <a href="#1232131" class="bread-items">Предметы</a>
                                <a href="#1232131" class="bread-items">Услуги</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/WOW RU_EU.png" alt="">
                        <div class="content">
                            <h2>WOW RU/EU</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Золото</a>
                                <a href="#1232131" class="bread-items">Аккаунты</a>
                                <a href="#1232131" class="bread-items">Рейды</a>
                                <a href="#1232131" class="bread-items">Подземелья</a>
                                <a href="#1232131" class="bread-items">Прокачка</a>
                                <a href="#1232131" class="bread-items">PVP</a>
                                <a href="#1232131" class="bread-items">Достижения</a>
                                <a href="#1232131" class="bread-items">Маунты</a>
                                <a href="#1232131" class="bread-items">Прочее</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Epic games.png" alt="">
                        <div class="content">
                            <h2>Epic Games</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Аккаунты</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Origin.png" alt="">
                        <div class="content">
                            <h2>Origin</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Аккаунты</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Steam.png" alt="">
                        <div class="content">
                            <h2>Steam</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Пополнение баланса</a>
                                <a href="#1232131" class="bread-items">Аккаунты</a>
                                <a href="#1232131" class="bread-items">Подарки</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div href="#" class="game-card">
                        <img class="preview" src="img/icons/Uplay.png" alt="">
                        <div class="content">
                            <h2>Uplay</h2>
                            <span>12 предложений</span>
                            <ul class="breads">
                                <a href="#1232131" class="bread-items">Аккаунты</a>
                            </ul>
                        </div>
                    </div>
                </div>

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