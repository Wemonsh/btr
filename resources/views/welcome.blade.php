<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>

    <link rel="stylesheet" href="css/libs.min.css">
    <link rel="stylesheet" href="css/main.css">


</head>

<body>

<div id="wrapper">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
                <img src="/img/logo.svg" height="35" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">О сервисе <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Правила сервиса <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faq">Помощь <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Отзывы <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
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
                                <a class="nav-link btn-border-wrap" data-toggle="modal"
                                   data-target="#registerModal"><span>Зарегистрироваться</span></a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Мои заказы <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-comments"></i> Мои сообщения <span
                                            class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{ Auth::user()->name }} <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"><span class="button-exit">Выйти</span></a>
                            </li>
                        </ul>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <main>
        <section id="main">

            <div class="content">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($slider as $item)
                            @if(head($slider) == $item)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $counter++ }}" class="active"></li>
                            @else
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $counter++ }}"></li>
                            @endif
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                    @foreach($slider as $value)
                        @if(head($slider) == $value)
                            <div class="carousel-item active">
                                <img src="storage/{{ $value['image'] }}" class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                    <h1>{{ $value['headline'] }}</h1>
                                    <p>{{ $value['description'] }}</p>
                                    @if($value['button_exists'] != 0)
                                    <a href="{{ $value['link'] }}" class="button">{{ $value['button_text'] }}</a>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="carousel-item">
                                <img src="storage/{{ $value['image'] }}" class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                    <h1>{{ $value['headline'] }}</h1>
                                    <p>{{ $value['description'] }}</p>
                                    @if($value['button_exists'] != 0)
                                        <a href="{{ $value['link'] }}" class="button">{{ $value['button_text'] }}</a>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                       data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                       data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <div class="carousel-search">
                        <form action="#" class="search-block">
                            <input type="text" class="search-input" placeholder="Поиск">
                        </form>
                    </div>
                </div>

                <div class="row no-gutters group_game containerItems">
                    @foreach($games as $game)
                        <div data-search="{{ strtolower($game['name']) }}" class="col-md-4">
                            <div class="game_card">
                                <img class="preview" src="{{ $game['card_image'] }}" alt="">
                                <div class="card_content">
                                    <h2 class="title">{{ $game['name'] }}</h2>
                                    <span class="offers">10 предложений</span>
                                    <ul class="breads">
                                        @foreach($game['categories'] as $service)
                                            <a href="/{{ $game['alias'] }}/{{ $service['alias'] }}" class="bread-item">{{ $service['name'] }}</a>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="reviews">
                    <h2>Отзывы</h2>
                    <div class="slider">
                        <div class="card">
                            <div class="card-body">
                                <ul class="links">
                                    <li class="link">
                                        <a href="#">Aion</a>
                                    </li>
                                    <li class="link">
                                        <a href="#">Аккаунты</a>
                                    </li>
                                </ul>
                                <span class="date"><i class="far fa-calendar-alt"></i> 22 марта 2017</span>
                                <h5 class="card-title">Wemonsh</h5>
                                <p class="card-text">Далеко-далеко за словесными горами в стране гласных и согласных
                                    живут
                                    рыбные тексты. Последний реторический свое, мир своих букв его предложения.
                                    Курсивных,
                                    все знаках. Своего щеке маленький заглавных имени образ необходимыми она
                                    большой?</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <ul class="links">
                                    <li class="link">
                                        <a href="#">Aion</a>
                                    </li>
                                    <li class="link">
                                        <a href="#">Аккаунты</a>
                                    </li>
                                </ul>
                                <span class="date"><i class="far fa-calendar-alt"></i> 22 марта 2017</span>
                                <h5 class="card-title">Wemonsh</h5>
                                <p class="card-text">Далеко-далеко за словесными горами в стране гласных и согласных
                                    живут
                                    рыбные тексты. Последний реторический свое, мир своих букв его предложения.
                                    Курсивных,
                                    все знаках. Своего щеке маленький заглавных имени образ необходимыми она
                                    большой?</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <ul class="links">
                                    <li class="link">
                                        <a href="#">Aion</a>
                                    </li>
                                    <li class="link">
                                        <a href="#">Аккаунты</a>
                                    </li>
                                </ul>
                                <span class="date"><i class="far fa-calendar-alt"></i> 22 марта 2017</span>
                                <h5 class="card-title">Wemonsh</h5>
                                <p class="card-text">Далеко-далеко за словесными горами в стране гласных и согласных
                                    живут
                                    рыбные тексты. Последний реторический свое, мир своих букв его предложения.
                                    Курсивных,
                                    все знаках. Своего щеке маленький заглавных имени образ необходимыми она
                                    большой?</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <ul class="links">
                                    <li class="link">
                                        <a href="#">Aion</a>
                                    </li>
                                    <li class="link">
                                        <a href="#">Аккаунты</a>
                                    </li>
                                </ul>
                                <span class="date"><i class="far fa-calendar-alt"></i> 22 марта 2017</span>
                                <h5 class="card-title">Wemonsh</h5>
                                <p class="card-text">Далеко-далеко за словесными горами в стране гласных и согласных
                                    живут
                                    рыбные тексты. Последний реторический свое, мир своих букв его предложения.
                                    Курсивных,
                                    все знаках. Своего щеке маленький заглавных имени образ необходимыми она
                                    большой?</p>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="sidebar">
                <a href="#" class="menu-btn"><img src="img/burger.png" alt=""></a>
                <div id="app" class="chat">
                    <h2>Общий чат</h2>
                    <div class="messages">
                        <div class="message">
                            <div class="header">
                                <div class="row">
                                    <div class="col-8">
                                        <img src="img/avatar.png" alt=""> <a href="#" class="author">wemonsh</a>
                                    </div>
                                    <div class="col-4">
                                        <span class="time">12:22</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <p>Куплю аккаунт стим (дешевенький) главное, чтобы не было ограничения на обмен и на
                                    торговую площадку, со стим аутентификатором.</p>
                            </div>
                        </div>
                        <div class="message">
                            <div class="header">
                                <div class="row">
                                    <div class="col-8">
                                        <img src="img/avatar.png" alt=""> <a href="#" class="author">wemonsh</a>
                                    </div>
                                    <div class="col-4">
                                        <span class="time">12:22</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <p>Куплю аккаунт стим (дешевенький) главное, чтобы не было ограничения на обмен и на
                                    торговую площадку, со стим аутентификатором.</p>
                            </div>
                        </div>
                        <div class="message">
                            <div class="header">
                                <div class="row">
                                    <div class="col-8">
                                        <img src="img/avatar.png" alt=""> <a href="#" class="author">wemonsh</a>
                                    </div>
                                    <div class="col-4">
                                        <span class="time">12:22</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <p>Куплю аккаунт стим (дешевенький) главное, чтобы не было ограничения на обмен и на
                                    торговую площадку, со стим аутентификатором.</p>
                            </div>
                        </div>
                        <div class="message">
                            <div class="header">
                                <div class="row">
                                    <div class="col-8">
                                        <img src="img/avatar.png" alt=""> <a href="#" class="author">wemonsh</a>
                                    </div>
                                    <div class="col-4">
                                        <span class="time">12:22</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <p>Куплю аккаунт стим (дешевенький) главное, чтобы не было ограничения на обмен и на
                                    торговую площадку, со стим аутентификатором.</p>
                            </div>
                        </div>
                    </div>

                    <form action="#">
                        <textarea name="" id="" cols="30" rows="3" disabled></textarea>
                        <span> <img src="/img/info.png" alt=""> Продажа в чате
								запрещена</span><button>Отправить</button>
                    </form>

                </div>
            </div>

        </section>

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


<!-- Modals -->

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
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
                        <input type="password" class="form-control" placeholder="Повтор пароля"
                               name="password_confirmation">
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

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
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


<script src="js/libs.min.js"></script>
<script src="js/common.js"></script>


</body>

</html>