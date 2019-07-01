<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="css/libs.min.css">
    <link rel="stylesheet" href="css/main.css">


</head>

<body>
<div id="wrapper">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
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
                        <a class="nav-link" href="#">Помощь <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Отзывы <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Рейтинг продавцов <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <div class=" my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Мои заказы <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-comments"></i> Мои сообщения <span
                                        class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Семенов Олег <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><span class="button-exit">Выйти</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <section id="faq">
            <div class="header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                           aria-controls="home" aria-selected="true">Часто задаваемые вопросы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="false">Разрешение споров</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                           aria-controls="contact" aria-selected="false">Правила для продавцов</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                           aria-controls="contact" aria-selected="false">Правила для покупателей</a>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="container">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <button class="btn" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <p>Как происходит покупка?</p>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                     data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Внимание! После размещения предложений оставайтесь на нашем сайте (не
                                            закрывайте страницу). В этом случае вы будете иметь статус «online», и
                                            покупатели смогут связываться с вами через внутренний чат.</p>
                                        <p>При продаже в некоторых разделах сайта система сама предлагает участникам
                                            заказа перейти в Discord (нужно просто нажать на ссылку), однако, обмен
                                            контактными данными в чате FunPay или в самом Discord (например,
                                            добавление друг друга в друзья) по-прежнему является нарушением.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <button class="btn" type="button" data-toggle="collapse" data-target="#collapseTwo"
                                            aria-expanded="true" aria-controls="collapseTwo">
                                        <p>Как происходит покупка?</p>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Внимание! После размещения предложений оставайтесь на нашем сайте (не
                                            закрывайте страницу). В этом случае вы будете иметь статус «online», и
                                            покупатели смогут связываться с вами через внутренний чат.</p>
                                        <p>При продаже в некоторых разделах сайта система сама предлагает участникам
                                            заказа перейти в Discord (нужно просто нажать на ссылку), однако, обмен
                                            контактными данными в чате FunPay или в самом Discord (например,
                                            добавление друг друга в друзья) по-прежнему является нарушением.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="container">
                        123
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="container">
                        1234
                    </div>
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

<script src="js/libs.min.js"></script>
<script src="js/common.js"></script>

</body>

</html>
