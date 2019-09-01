@extends('layouts.main')

@section('content')
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
@endsection
