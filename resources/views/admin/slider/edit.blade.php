@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sliderAdmin') }}">Слайдер</a></li>
            <li class="breadcrumb-item active" aria-current="page">Редактировать элемент слайдера</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Редактировать элемент слайдера</h1>
    <hr>
    <form method="post" action="{{ route('sliderEdit', $id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name" class="form-text">Изображение</label>
            @if($slider->image != null)
                <img src="{{ asset('/storage/' . $slider->image) }}" class="card-img-top rounded" style="object-fit: cover; width: 300px; height: 250px;">
            @else
                <img src="/img/no_image.png" width="100px" height="100px" style="object-fit: cover; width: 300px; height: 250px;" class="mr-3 rounded" alt="Изображение отсутствует">
            @endif
            <p></p>
            <p>Изменить изображение</p>
            <input name="image" type="file" class="form-control-file mt-3" id="image">
            <hr>
        </div>
        <div class="form-group">
            <label for="headline">Заголовок</label>
            <input name="headline" type="text" class="form-control" id="headline" placeholder="Заголовок" value="{{ $slider->headline }}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control" id="description" placeholder="Описание" cols="30" rows="10">{{ $slider->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="button_text">Текст кнопки</label>
            <input name="button_text" type="text" class="form-control" id="button_text" placeholder="Текст кнопки" value="{{ $slider->button_text }}">
        </div>
        <div class="form-group">
            <label for="link">Ссылка</label>
            <input name="link" type="url" class="form-control" id="link" placeholder="Ссылка" value="{{ $slider->link }}">
        </div>
        <div class="form-group">
            <div class="form-check">
                <input name="button_exists" type="checkbox" class="form-check-input" id="button_exists" placeholder="Кнопка активна?" {{ $slider->button_exists ? 'checked' : '' }}>
                <label for="button_exists" >Кнопка активна?</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Редактировать</button>
    </form>
@endsection