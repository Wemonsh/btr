@extends('layouts.default')

@section('content')
    <section id="header">
        <h1><img src="/img/avatar.png" alt="">Wemonsh</h1>
        <p class="balance">Ваш баланс: {{ $user->balance }} руб <a href="#">Вывести</a></p>
    </section>
    <section id="content">
        <div class="row">
            <div class="col-6">
                <div class="card bg-light mb-3">
                    <div class="card-header">Последние заказы</div>
                    <div class="card-body">
                        <h5 class="card-title">Light card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card bg-light mb-3">
                    <div class="card-header">Мои кошельки</div>
                    <div class="card-body">
                        <h5 class="card-title">Light card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card bg-light mb-3">
                    <div class="card-header">Управление профилем</div>
                    <div class="card-body">
                        <h5 class="card-title">Light card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection