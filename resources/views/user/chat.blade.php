@extends('layouts.default')

@section('content')

   <div id="app">





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
                @if($id != null)
                <div class="information">
                    <p>Покупатель Semen Semenich оплатил заказ #1234 Aion,продажа аккаунта, стоимость 600₽
                    </p>
                    <p>Скоро с вами свяжется продавец. Не забудьте после выполнения всех договоренностей
                        продавца подтвердить завершения сделки в Мои заказы.</p>
                </div>

                <chats :user="{{ auth()->user() }}" :order="{{ $id }}"></chats>
                @endif
            </div>
        </div>
    </div>
</section>
</div>
@endsection