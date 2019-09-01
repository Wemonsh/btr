@extends('layouts.main')

@section('content')
    <section id="header" class="header-short">
        <h1>Рейтинг продавцов</h1>
    </section>
    <section id="content" class="content-rank">
        <div class="search">
            <form action="#">
                <input type="text">
            </form>
            <div class="slider-games">
                <a class="game-link" href="#">linage 2 classic</a>
                <a class="game-link active" href="#">Wow RU Server Plus</a>
                <a class="game-link" href="#">Crossaut Game Pass</a>
                <a class="game-link" href="#">Далеко-далеко, за словесными.</a>
                <a class="game-link" href="#">linage 2 classic</a>
                <a class="game-link" href="#">Wow RU Server Plus</a>
                <a class="game-link" href="#">Crossaut Game Pass</a>
                <a class="game-link" href="#">Далеко-далеко, за словесными.</a>
                <a class="game-link" href="#">linage 2 classic</a>
                <a class="game-link" href="#">Wow RU Server Plus</a>
                <a class="game-link" href="#">Crossaut Game Pass</a>
                <a class="game-link" href="#">Далеко-далеко, за словесными.</a>
                <a class="game-link" href="#">linage 2 classic</a>
                <a class="game-link" href="#">Wow RU Server Plus</a>
                <a class="game-link" href="#">Crossaut Game Pass</a>
                <a class="game-link" href="#">Далеко-далеко, за словесными.</a>
                <a class="game-link" href="#">linage 2 classic</a>
                <a class="game-link" href="#">Wow RU Server Plus</a>
                <a class="game-link" href="#">Crossaut Game Pass</a>
                <a class="game-link" href="#">Далеко-далеко, за словесными.</a>
            </div>
        </div>
        <div class="table-rank">
            <h2>ТОП-продавцов:</h2>
            <table class="table-top">
                <thead>
                <tr>
                    <th>Продавец</th>
                    <th>Общий рейтинг</th>
                    <th>Верифицирован</th>
                    <th>Дата регистрации</th>
                    <th>Отзывы</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td> <a class="user-link" href="#"><img src="img/avatar.png" alt="">Александр Дьяченко</a></td>
                    <td>9.9</td>
                    <td><img src="img/check.png" alt=""></td>
                    <td>26 марта 2019</td>
                    <td><span class="positive"> <img src="img/happy.png" alt=""> 5</span><span class="negative"> <img src="img/sad.png" alt=""> 5</span></td>
                </tr>
                <tr>
                    <td> <a class="user-link" href="#"><img src="img/avatar.png" alt="">Александр Дьяченко</a></td>
                    <td>9.9</td>
                    <td><img src="img/check.png" alt=""></td>
                    <td>26 марта 2019</td>
                    <td><span class="positive"> <img src="img/happy.png" alt=""> 5</span><span class="negative"> <img src="img/sad.png" alt=""> 5</span></td>
                </tr>
                <tr>
                    <td> <a class="user-link" href="#"><img src="img/avatar.png" alt="">Александр Дьяченко</a></td>
                    <td>9.9</td>
                    <td><img src="img/check.png" alt=""></td>
                    <td>26 марта 2019</td>
                    <td>
                        <span class="positive"><img src="img/happy.png" alt=""> 5</span>
                        <span class="negative"><img src="img/happy.png" alt=""> 5</span></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="table-rank">
            <h2>Набирающие популярность:</h2>
            <table class="table-popular">
                <thead>
                <tr>
                    <th>Продавец</th>
                    <th>Общий рейтинг</th>
                    <th>Верифицирован</th>
                    <th>Дата регистрации</th>
                    <th>Отзывы</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td> <a class="user-link" href="#"><img src="img/avatar.png" alt="">Александр Дьяченко</a></td>
                    <td>9.9</td>
                    <td><img src="img/check.png" alt=""></td>
                    <td>26 марта 2019</td>
                    <td><span class="positive"> <img src="img/happy.png" alt=""> 5</span><span class="negative"> <img src="img/sad.png" alt=""> 5</span></td>
                </tr>
                <tr>
                    <td> <a class="user-link" href="#"><img src="img/avatar.png" alt="">Александр Дьяченко</a></td>
                    <td>9.9</td>
                    <td><img src="img/check.png" alt=""></td>
                    <td>26 марта 2019</td>
                    <td><span class="positive"> <img src="img/happy.png" alt=""> 5</span><span class="negative"> <img src="img/sad.png" alt=""> 5</span></td>
                </tr>
                <tr>
                    <td> <a class="user-link" href="#"><img src="img/avatar.png" alt="">Александр Дьяченко</a></td>
                    <td>9.9</td>
                    <td><img src="img/check.png" alt=""></td>
                    <td>26 марта 2019</td>
                    <td>
                        <span class="positive"><img src="img/happy.png" alt=""> 5</span>
                        <span class="negative"><img src="img/happy.png" alt=""> 5</span></td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
