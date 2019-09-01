<nav class="navbar navbar-expand-lg navbar-light">
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
                <li class="nav-item {{ Request::is('main/about') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('about') }}">О сервисе <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ Request::is('main/rules') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('rules') }}">Правила сервиса <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ Request::is('main/faq') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('faq') }}">Помощь <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ Request::is('main/reviews') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('reviews') }}">Отзывы <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ Request::is('main/rank') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('rank') }}">Рейтинг продавцов <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <div class=" my-2 my-lg-0">

                @guest
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" data-target="#loginModal">Войти</a>
                        </li>
                        <li class="nav-item">
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
                            <a class="nav-link" href="/profile">{{ Auth::user()->name }} <span class="sr-only">(current)</span></a>
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
