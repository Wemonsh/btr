@extends('layouts.default')

@section('content')
<section id="chat">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="chats">
                    @foreach($orders as $value)
                        <div class="chat">
                            <p><strong>Заказ:</strong> {{ '#'.$value->id }}</p>
                            <p><strong>Продавец:</strong> <a href="#"> {{ $value->seller->name }} </a></p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-9">
                <div class="information">
                    <p>Покупатель Semen Semenich оплатил заказ #1234 Aion,продажа аккаунта, стоимость 600₽
                    </p>
                    <p>Скоро с вами свяжется продавец. Не забудьте после выполнения всех договоренностей
                        продавца подтвердить завершения сделки в Мои заказы.</p>
                </div>
                <div class="messages">
                    <div class="message">
                        <img src="/img/avatar.png" alt="">
                        <p><a href="#">Wemonsh</a> <span class="date">20:00</span></p>
                        <p class="text">Привет как дела</p>
                    </div>
                    <div class="message">
                        <img src="/img/avatar.png" alt="">
                        <p><a href="#">Wemonsh</a> <span class="date">20:00</span></p>
                        <p class="text">Привет как дела</p>
                    </div>
                    <div class="message">
                        <img src="/img/avatar.png" alt="">
                        <p><a href="#">Wemonsh</a> <span class="date">20:00</span></p>
                        <p class="text">Привет как дела</p>
                    </div>
                    <form action="#">
                        <textarea name="" placeholder="Написать сообщение …"></textarea>
                        <button type="submit">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection