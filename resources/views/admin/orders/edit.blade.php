@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('ordersAdmin') }}">Заказы</a></li>
            <li class="breadcrumb-item active" aria-current="page">Редактирование заказа № {{ $order->id }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Редактирование заказа № {{ $order->id }}</h1>
    <hr>
    <form method="post" action="{{ route('ordersEdit', $id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control" id="description" placeholder="Описание" cols="30" rows="10">{{ $order->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="properties">Свойства</label>
            <input name="properties" type="text" class="form-control" id="properties" placeholder="Свойства" disabled value="{{ $order->properties }}">
        </div>
        <div class="form-group">
            <label for="cost">Стоимость</label>
            <input name="cost" type="number" class="form-control" id="cost" placeholder="Стоимость" value="{{ $order->cost }}">
        </div>
        <hr>
        <div class="form-group">
            <label for="images">Изображения</label>
            <br>
            @if($order->images != null)
                @foreach(json_decode($order->images) as $image)
                    <img src="{{ asset('/storage/' . $image->path) }}" class="card-img-top rounded" style="object-fit: cover; width: 300px; height: 250px;" alt="Изображение">
                @endforeach
            @else
                <img src="/img/no_image.png" width="100px" height="100px" style="object-fit: cover; width: 300px; height: 250px;" class="mr-3 rounded" alt="Изображение отсутствует">
            @endif
        </div>
        <div class="form-group">
            <label for="images" class="form-text">Загрузить изображения</label>
            <input id="images" type="file" name="images[]" id="images" multiple>
        </div>
        <hr>
        <div class="form-group">
            <label for="game_id">Игра</label>
            <input name="game_id" type="text" class="form-control" id="game_id" placeholder="Игра" disabled value="{{ $order->game->name }}">
        </div>
        <div class="form-group">
            <label for="service_id">Категория</label>
            <input name="service_id" type="text" class="form-control" id="service_id" placeholder="Категория" disabled value="{{ $order->service->name }}">
        </div>
        <div class="form-group">
            <label for="seller_id">Продавец</label>
            <input name="seller_id" type="text" class="form-control" id="seller_id" placeholder="Продавец" disabled value="{{ $order->seller->name }}">
        </div>
        <div class="form-group">
            <label for="customer_id">Покупатель</label>
            @if($order->customer != null)
                <input name="customer_id" type="text" class="form-control" id="customer_id" placeholder="Покупатель" disabled value="{{ $order->customer->name }}">
            @else
                <input name="customer_id" type="text" class="form-control" id="customer_id" placeholder="Покупатель" disabled value="-">
            @endif
        </div>
        <div class="form-group">
            <label for="paid">Оплачено?</label>
            <input name="paid" type="text" class="form-control" id="paid" placeholder="Оплачено?" value="{{ $order->paid }}">
        </div>
        <button type="submit" class="btn btn-primary mb-3">Изменить</button>
    </form>
@endsection
