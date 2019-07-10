@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sliderAdmin') }}">Слайдер</a></li>
            <li class="breadcrumb-item active" aria-current="page">Создать элемент слайдера</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Создать элемент слайдера</h1>
    <hr>
    <form method="post" action="{{ route('sliderCreate') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name" class="form-text">Изображение</label>
            <input name="image" type="file" class="form-control-file mt-3" id="image">
            <hr>
        </div>
        <div class="form-group">
            <label for="headline">Заголовок</label>
            <input name="headline" type="text" class="form-control" id="headline" placeholder="Заголовок">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control" id="description" placeholder="Описание" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="button_text">Текст кнопки</label>
            <input name="button_text" type="text" class="form-control" id="button_text" placeholder="Текст кнопки">
        </div>
        <div class="form-group">
            <label for="link">Ссылка</label>
            <input name="link" type="url" class="form-control" id="link" placeholder="Ссылка">
        </div>
        <div class="form-group">
            <div class="form-check">
                <input name="button_exists" type="checkbox" class="form-check-input" id="button_exists" placeholder="Кнопка активна?">
                <label for="button_exists" >Кнопка активна?</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Создать</button>
    </form>
@endsection