@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('ordersAdmin') }}">Заказы</a></li>
            <li class="breadcrumb-item active" aria-current="page">Добавление нового заказа</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Добавление нового заказа</h1>
    <hr>
    <form method="post" action="{{ route('ordersCreate') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control" id="description" placeholder="Описание" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="properties">Свойства</label>
            <input name="properties" type="text" class="form-control" id="properties" placeholder="Свойства">
        </div>
        <div class="form-group">
            <label for="cost">Стоимость</label>
            <input name="cost" type="number" class="form-control" id="cost" placeholder="Стоимость">
        </div>
        <div class="form-group">
            <label for="images" class="form-text">Загрузить изображения</label>
            <input id="images" type="file" name="images[]" id="images" multiple>
        </div>
        <div class="form-group">
            <label for="game_id">Игра</label>
            <input name="game_id" type="text" class="form-control" id="game_id" placeholder="Игра">
        </div>
        <div class="form-group">
            <label for="service_id">Категория</label>
            <input name="service_id" type="text" class="form-control" id="service_id" placeholder="Категория">
        </div>
        <div class="form-group">
            <label for="seller_id">Продавец</label>
            <input name="seller_id" type="text" class="form-control" id="seller_id" placeholder="Продавец">
        </div>
        <div class="form-group">
            <label for="customer_id">Покупатель</label>
            <input name="customer_id" type="text" class="form-control" id="customer_id" placeholder="Покупатель">
        </div>
        <div class="form-group">
            <label for="paid">Оплачено?</label>
            <input name="paid" type="text" class="form-control" id="paid" placeholder="Оплачено?">
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
